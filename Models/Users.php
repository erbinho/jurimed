<?php
namespace Models;

use \Core\Model;
use \Models\Permissions;

class Users extends Model {
	// == ID DO USUARIO LOGADO == //
	private $uid;
	private $userDados;
	private $permissions;

	// -- RETORNA O ID DO USUÁRIO LOGADO-- //
	public function getUid(){
		return $this->uid;
	}

	// == RETORNA OS DADOS DO USUÁRIOS LOGADO == //
	public function getUserDados(){
		return $this->userDados;
	}

	// == RETORNA A LISTA DE TODOS OS USUÁRIOS == //
	public function getAllUsers($order, $dir, $start, $length, $termo){
            $array = array();
            $sql = "SELECT sis_users.id, sis_users.nome, sis_users.cpf, sis_users.retrato_foto, sis_users.`status` FROM sis_users WHERE sis_users.`status` = 'a'";
            $res = $this->db->query($sql);
            if(!empty($termo)){
                $sql .= " AND (id LIKE '%".$termo."%' OR cpf LIKE '%".$termo."%' OR nome LIKE '%".$termo."%')";
            }
            $sql .= " ORDER BY ".$order." ".$dir." LIMIT ".$start.", ".$length."";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            if($sql->rowCount() > 0) {
                $array['listaUsers'] = $sql->fetchAll(\PDO::FETCH_ASSOC);
                $array['totalRes'] = $res->rowCount();
            }
            return $array;
	}

	// == RETORNA OS DADOS DE UM USUÁRIOS ESPECIFICO == //
	public function getDadosUser($id){
		$array = array();
		$sql = "SELECT Usuario.id, Usuario.nome, Usuario.apelido, Usuario.usuario AS Username, Usuario.senha AS Senha, sis_perm_group.id AS id_permission_group, sis_perm_group.`name` AS permission_group, Usuario.email AS EmailUser, Usuario.datanas AS DataNascimento, Usuario.estciv AS EstadoCivil, Usuario.sexo AS Sexo, Usuario.cpf AS CPF, Usuario.tel AS Telefone, Usuario.cel AS Celular, EnderecoUsuario.id AS id_EnderecoUser, EnderecoUsuario.`end` AS EnderecoUser, Usuario.num AS NumeroCasa, Usuario.comp AS Complemento, BairroUsuario.id AS id_BairroUser, BairroUsuario.bai AS BairroUser, CidadeUsuario.id AS idCidade, CidadeUsuario.cid AS cidade, Usuario.rg AS RG, Usuario.ctps AS CarteiraTrabalho, Usuario.retrato_foto, sis_cep.cep AS CepUser, sis_cep.id AS id_CepUser, Usuario.home, sis_uf.id AS idUf, sis_uf.uf, sis_uf.est AS estado, Usuario.`status`, Usuario.pispas AS PISPAS
				FROM sis_users AS Usuario INNER JOIN sis_cid AS CidadeUsuario ON Usuario.cid = CidadeUsuario.id INNER JOIN sis_bai AS BairroUsuario ON BairroUsuario.id = Usuario.bai INNER JOIN sis_end AS EnderecoUsuario ON EnderecoUsuario.id = Usuario.`end` INNER JOIN sis_perm_group ON Usuario.id_permission = sis_perm_group.id INNER JOIN sis_cep ON Usuario.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = Usuario.uf WHERE Usuario.id = :idUser";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idUser', $id);
		$sql->execute();
		if($sql->rowCount() > 0){
            $array = $sql->fetch(\PDO::FETCH_ASSOC);
        }
		return $array;
	}

	// == FUNÇÃO QUE ATRIBUI A PERMISSÃO AO USUÁRIO
	public function addLiberacao($idUser,$idPermission){
            $sql = "UPDATE sis_users SET id_permission = :idPermission WHERE id = :idUser";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':idUser', $idUser);
            $sql->bindValue(':idPermission', $idPermission);
            $sql->execute();
	}

	// == FUNÇÃO QUE VERIFICA SE O USUÁRIOS ESTÁ LOGADO E RETORNA OS DADOS DO USUÁRIO PELA $_SESSION == //
	public function verifyLogin() {
		$perm = new Permissions();
		if(!empty($_SESSION['hashLogin'])){
			$hashLogin = $_SESSION['hashLogin'];
			$sql = "SELECT * FROM sis_users_token WHERE hash = :hashLogin AND type = 'login'";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':hashLogin', $hashLogin);
			$sql->execute();
        	if($sql->rowCount() > 0){
				$data = $sql->fetch();
				$sql = "SELECT Usuario.id, Usuario.usuario AS Username, Usuario.senha AS Senha, Usuario.nome AS NomeUser, Usuario.email AS EmailUser, Usuario.datanas AS DataNascimento, Usuario.estciv AS EstadoCivil, Usuario.sexo AS Sexo, Usuario.cpf AS CPF, Usuario.tel AS Telefone, Usuario.cel AS Celular, EnderecoUsuario.id AS id_EnderecoUser, EnderecoUsuario.`end` AS EnderecoUser, Usuario.num AS NumeroCasa, Usuario.comp AS Complemento, BairroUsuario.id AS id_BairroUser, BairroUsuario.bai AS BairroUser, CidadeUsuario.id AS id_CidadeUser, CidadeUsuario.cid AS CidadeUser, Usuario.rg AS RG, Usuario.ctps AS CarteiraTrabalho, Usuario.retrato_foto, Usuario.id_permission, Usuario.skinsPainel FROM sis_users AS Usuario INNER JOIN sis_cid AS CidadeUsuario ON Usuario.cid = CidadeUsuario.id INNER JOIN sis_bai AS BairroUsuario ON BairroUsuario.id = Usuario.bai INNER JOIN sis_end AS EnderecoUsuario ON EnderecoUsuario.id = Usuario.`end` WHERE Usuario.id = :idUser";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':idUser', $data['id_user']);
				$sql->execute();
				if($sql->rowCount() > 0){
					$data = $sql->fetch();
					$this->uid = $data['id'];
					$this->userDados = $data;
					$this->permissions = $perm->getPermissions($data['id_permission']);
				}
        		return true;
        	}else{
        		return false;
        	}
		}else{
			return false;
		}	
	}

	// == LAYOUT DO USUÁRIO == //
	public function skinActive($id, $skinActive) {
		$sql = "UPDATE sis_users SET skinsPainel = :skinActive WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->bindValue(':skinActive', $skinActive);
		$sql->execute();
	}

	// == VERIFICA SE O USUÁRIO POSSUI PERMISSIÕES DE ACESSO == //
	public function hasPermissions($permission_slug){
		if(in_array($permission_slug, $this->permissions)){
			return true;
		}else{
			return false;
		}
	}

	// -- GERA TOKEN OU HASH DE LOGIN PARA USUÁRIOS -- //
	private function geraToken($id, $hashLogin = array()){
		if(!empty($hashLogin)){
			$sql = "SELECT * FROM sis_users_token WHERE id_user = :id_user";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_user', $id);
			$sql->execute();
			if($sql->rowCount() > 0) {
				$sql = "UPDATE sis_users_token SET id_user = :id_user, hash = :hashLogin, used = '1', expirado_em = :expirado_em, type = 'login' WHERE id_user = :id_user";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_user', $id);
				$sql->bindValue(':hashLogin', $hashLogin);
				$sql->bindValue(':expirado_em', date('Y-m-d H:i', strtotime('+1 months')));
				$sql->execute();
			}else{
				$sql = "INSERT INTO sis_users_token (id_user, hash, used, expirado_em, type) VALUES (:id_user, :hashLogin, '1', :expirado_em, 'login')";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_user', $id);
				$sql->bindValue(':hashLogin', $hashLogin);
				$sql->bindValue(':expirado_em', date('Y-m-d H:i', strtotime('+1 months')));
				$sql->execute();
			}
		}else{
			$sql = "SELECT * FROM sis_users_token WHERE id_user = :id_user";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id_user', $id);
			$sql->execute();
			if($sql->rowCount() > 0) {
				$token = md5(time().rand(0, 99999).rand(0, 99999));
				$sql = "UPDATE sis_users_token SET id_user = :id_user, hash = :hash, used = '0', expirado_em = :expirado_em WHERE id_user = :id_user";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_user', $id);
				$sql->bindValue(':hash', $token);
				$sql->bindValue(':expirado_em', date('Y-m-d H:i', strtotime('+1 months')));
		        $sql->execute();
		        if($sql->rowCount() > 0) {
					return $token;
				}
			}else{
				$token = md5(time().rand(0, 99999).rand(0, 99999));
				$sql = "INSERT INTO sis_users_token (id_user, hash, expirado_em) VALUES (:id_user, :hash, :expirado_em)";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':id_user', $id);
				$sql->bindValue(':hash', $token);
				$sql->bindValue(':expirado_em', date('Y-m-d H:i', strtotime('+1 months')));
		        $sql->execute();
		        if($sql->rowCount() > 0) {
					return $token;
				}
			}
		}
	}


	// -- FUNÇÃO QUE VALIDA O LOGIN DO USUÁRIO -- //
	public function validateUser($login, $senha){
		$sql = "SELECT * FROM sis_users WHERE usuario = :login AND senha = :senha";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':login', $login);
		$sql->bindValue(':senha', $senha);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$infoUser = $sql->fetch();
			$hashLogin = md5(rand(0,99999).time().$infoUser['id']);
			$this->geraToken($infoUser['id'], $hashLogin);
			$_SESSION['hashLogin'] = $hashLogin;
			return true;
			exit;
		}else{
			$sql = "SELECT * FROM sis_users WHERE email = :login AND senha = :senha";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':login', $login);
			$sql->bindValue(':senha', $senha);
			$sql->execute();
			if($sql->rowCount() > 0) {
				$infoUser = $sql->fetch();
				$hashLogin = md5(rand(0,99999).time().$infoUser['id']);
				$this->geraToken($infoUser['id'], $hashLogin);
				$_SESSION['hashLogin'] = $hashLogin;
				return true;
				exit;
			}else{
				return false;
				exit;
			}
		}
	}


	// -- FUNÇÃO QUE VERIFICA SE EXISTE O EMAIL E GERA UM TOKEN DE VALIDAÇÃO -- //
	public function verifyEmail($email) {
		$array = array();
		$sql = "SELECT * FROM sis_users WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
        $sql->execute();
		if($sql->rowCount() > 0){
			$array['dadosUser'] = $sql->fetch();
			$token = $this->geraToken($array['dadosUser']['id']);
	        $array['avisoYes'] = "O Link para redefinir sua Senha, foi encaminhado para seu E-mail!";
	        $array['link'] = BASE_URL."/Login/reset?token=".$token;
		}else{
			$array['avisoNo'] = $email;
		}
		return $array;
	}

	// -- FUNÇÃO QUE VERIFICA SE O TOKEN DE VALIDAÇÃO EXISTE OU SE JÁ FOI USADO -- //
	public function verifyToken($token) {
		$array = array();
		$sql = "SELECT * FROM sis_users_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':hash', $token);
        $sql->execute();
		if($sql->rowCount() > 0){
			$array['dadosUser'] = $sql->fetch();
		}else{
			$array['avisoNoToken'] = 'Link está Expirado ou não é mais valido!';
		}
		return $array;		
	}

	// -- FUNÇÃO QUE ATUALIZA A SENHA DE UM USUÁRIO -- //
	public function updateSenha($idUser, $senha) {
		$array = array();
		$sql = "UPDATE sis_users SET senha = :senha WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':senha', $senha);
		$sql->bindValue(':id', $idUser);
        $sql->execute();

        $sql = "UPDATE sis_users_token SET used = 1 WHERE id_user = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $idUser);
        $sql->execute();

        $array = $this->getUser($idUser);
		return $array;		
	}

	// -- VERIFICA SE O USUÁRIO JÁ TEM CADASTRO NO SISTEMA --//
	public function userExists($cpf, $email){
		$sql = "SELECT * FROM sis_users WHERE cpf = :cpf OR email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':email', $email);
		$sql->execute();
		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}

	// -- FUNÇÃO QUE REGISTRA O USUÁRIO NO SISTEMA -- //
	public function registerUser($nome, $cpf, $email, $senha){
		$array = array();
		$sql = "INSERT INTO sis_users (nome, email, cpf, senha) VALUES (:nome, :email, :cpf, :senha)";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':cpf', $cpf);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$id = $this->db->lastInsertId();
			$token = $this->geraToken($id);
			$array['dadosUser'] = $this->getUser($id);
			$array['avisoCadYes'] = "O Link para ativação da sua Conta, foi encaminhado para seu E-mail!";
	        $array['link'] = BASE_URL."/Login/active?token=".$token;
	        return $array;
		}
	}

	// -- FUNÇÃO QUE ATIVA A CONTA DO USUÁRIO -- //
	public function ativaConta($idUser) {
		$array = array();
		$sql = "UPDATE sis_users SET nivel = 'us', status = 'a' WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $idUser);
        $sql->execute();

        $sql = "UPDATE sis_users_token SET used = 1 WHERE id_user = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $idUser);
        $sql->execute();

        $array['avisoAtivYes'] = "Sua conta foi Ativada! Comece agora logando no seu perfil!";
        return $array;
	}

}

