<?php
namespace Models;

use \Core\Model;

class Empresa extends Model {
	public function getEmpPremium(){
		$array = array();
		$sql = "SELECT sis_emp.id AS idEmpresa, sis_emp.raz AS razaoSocial, sis_emp.fan AS nomeFantasia, sis_emp.cnpj, sis_emp.datafun AS dataDeFundacao, sis_cep.id AS idCep, sis_cep.cep AS Cep, sis_emp.num AS NumeroEndereco, sis_end.id AS idEndereco, sis_end.`end` AS Endereco, sis_bai.id AS idBairro, sis_bai.bai AS Bairro, sis_cid.id AS idCidade, sis_cid.cid AS Cidade, sis_uf.id AS idEstado, sis_uf.uf AS siglaEstado, sis_uf.est AS Estado, sis_emp.cel AS Celular, sis_emp.fax, sis_emp.tel AS TelefoneFixo, sis_emp.email, sis_cid_cat.id AS idCategoria, sis_cid_cat.cat AS Categoria, sis_emp.cat_desde, sis_emp.cat_status, sis_emp.logo, sis_emp.logo_topo, sis_emp.home, sis_emp.`status`, sis_emp.palavra_chave, sis_emp.status_pub_half AS premium FROM sis_emp INNER JOIN sis_cep ON sis_emp.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = sis_emp.uf INNER JOIN sis_cid ON sis_cid.id = sis_emp.cid INNER JOIN sis_bai ON sis_emp.bai = sis_bai.id INNER JOIN sis_end ON sis_emp.`end` = sis_end.id INNER JOIN sis_cid_cat ON sis_emp.cat = sis_cid_cat.id WHERE sis_emp.`status` = 'a' AND sis_emp.status_pub_half = 'a'";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getAllEmpresas(){
		$array = array();
		$sql = "SELECT sis_emp.id AS idEmpresa, sis_emp.raz AS razaoSocial, sis_emp.fan AS nomeFantasia, sis_emp.cnpj, sis_emp.datafun AS dataDeFundacao, sis_cep.id AS idCep, sis_cep.cep AS Cep, sis_emp.num AS NumeroEndereco, sis_end.id AS idEndereco, sis_end.`end` AS Endereco, sis_bai.id AS idBairro, sis_bai.bai AS Bairro, sis_cid.id AS idCidade, sis_cid.cid AS Cidade, sis_uf.id AS idEstado, sis_uf.uf AS siglaEstado, sis_uf.est AS Estado, sis_emp.cel AS Celular, sis_emp.fax, sis_emp.tel AS TelefoneFixo, sis_emp.email, sis_cid_cat.id AS idCategoria, sis_cid_cat.cat AS Categoria, sis_emp.cat_desde, sis_emp.cat_status, sis_emp.logo, sis_emp.logo_topo, sis_emp.home, sis_emp.`status`, sis_emp.palavra_chave, sis_emp.status_pub_half AS premium FROM sis_emp INNER JOIN sis_cep ON sis_emp.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = sis_emp.uf INNER JOIN sis_cid ON sis_cid.id = sis_emp.cid INNER JOIN sis_bai ON sis_emp.bai = sis_bai.id INNER JOIN sis_end ON sis_emp.`end` = sis_end.id INNER JOIN sis_cid_cat ON sis_emp.cat = sis_cid_cat.id WHERE sis_emp.`status` = 'a' LIMIT 18";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getEmpresa($idEmp){
		$array = array();
		$sql = "SELECT sis_emp.id AS idEmpresa, sis_emp.raz AS razaoSocial, sis_emp.fan AS nomeFantasia, sis_emp.cnpj, sis_emp.datafun AS dataDeFundacao, sis_cep.id AS idCep, sis_cep.cep AS Cep, sis_emp.num AS NumeroEndereco, sis_end.id AS idEndereco, sis_end.`end` AS Endereco, sis_bai.id AS idBairro, sis_bai.bai AS Bairro, sis_cid.id AS idCidade, sis_cid.cid AS Cidade, sis_uf.id AS idEstado, sis_uf.uf AS siglaEstado, sis_uf.est AS Estado, sis_emp.cel AS Celular, sis_emp.fax, sis_emp.tel AS TelefoneFixo, sis_emp.email, sis_cid_cat.id AS idCategoria, sis_cid_cat.cat AS Categoria, sis_emp.cat_desde, sis_emp.cat_status, sis_emp.logo, sis_emp.logo_topo, sis_emp.home, sis_emp.`status`, sis_emp.palavra_chave, sis_emp.status_pub_half AS premium FROM sis_emp INNER JOIN sis_cep ON sis_emp.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = sis_emp.uf INNER JOIN sis_cid ON sis_cid.id = sis_emp.cid INNER JOIN sis_bai ON sis_emp.bai = sis_bai.id INNER JOIN sis_end ON sis_emp.`end` = sis_end.id INNER JOIN sis_cid_cat ON sis_emp.cat = sis_cid_cat.id WHERE sis_emp.`status` = 'a' AND sis_emp.id = :uidEmp";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':uidEmp', $idEmp);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function seachEmpresa($busca, $catergoy = array()){
		$array = array();
		$sql = "SELECT sis_emp.id AS idEmpresa, sis_emp.raz AS razaoSocial, sis_emp.fan AS nomeFantasia, sis_cep.id AS idCep, sis_cep.cep AS Cep, sis_emp.num AS NumeroEndereco, sis_end.id AS idEndereco, sis_end.`end` AS Endereco, sis_bai.id AS idBairro, sis_bai.bai AS Bairro, sis_cid.id AS idCidade, sis_cid.cid AS Cidade, sis_uf.id AS idEstado, sis_uf.uf AS siglaEstado, sis_uf.est AS Estado, sis_emp.cel AS Celular, sis_emp.fax, sis_emp.tel AS TelefoneFixo, sis_emp.email, sis_cid_cat.id AS idCategoria, sis_cid_cat.cat AS Categoria, sis_emp.cat_desde, sis_emp.cat_status, sis_emp.logo, sis_emp.logo_topo, sis_emp.`status`, sis_emp.palavra_chave, sis_emp.status_pub_half AS premium, sis_emp.clientedesde FROM sis_emp INNER JOIN sis_cep ON sis_emp.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = sis_emp.uf INNER JOIN sis_cid ON sis_cid.id = sis_emp.cid INNER JOIN sis_bai ON sis_emp.bai = sis_bai.id INNER JOIN sis_end ON sis_emp.`end` = sis_end.id INNER JOIN sis_cid_cat ON sis_emp.cat = sis_cid_cat.id WHERE	sis_emp.`status` = 'a' AND ((sis_cid_cat.id LIKE '%$catergoy%') AND ((sis_emp.fan LIKE '%$busca%')	OR (sis_emp.raz LIKE '%$busca%'))) ORDER BY nomeFantasia ASC";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}else{
			$array['msgAviso'] = 'Não há resultados correspondentes para o termo de busca: "'.$busca.'"';
		}
		return $array;
	}

	public function getEmpresaCateg($idCategoria){
		$array = array();
		$sql = "SELECT sis_emp.id AS idEmpresa, sis_emp.raz AS razaoSocial, sis_emp.fan AS nomeFantasia, sis_emp.cnpj, sis_emp.datafun AS dataDeFundacao, sis_cep.id AS idCep, sis_cep.cep AS Cep, sis_emp.num AS NumeroEndereco, sis_end.id AS idEndereco, sis_end.`end` AS Endereco, sis_bai.id AS idBairro, sis_bai.bai AS Bairro, sis_cid.id AS idCidade, sis_cid.cid AS Cidade, sis_uf.id AS idEstado, sis_uf.uf AS siglaEstado, sis_uf.est AS Estado, sis_emp.cel AS Celular, sis_emp.fax, sis_emp.tel AS TelefoneFixo, sis_emp.email, sis_cid_cat.id AS idCategoria, sis_cid_cat.cat AS Categoria, sis_emp.cat_desde, sis_emp.cat_status, sis_emp.logo, sis_emp.logo_topo, sis_emp.home, sis_emp.`status`, sis_emp.palavra_chave, sis_emp.status_pub_half AS premium, sis_emp.clientedesde FROM sis_emp INNER JOIN sis_cep ON sis_emp.cep = sis_cep.id INNER JOIN sis_uf ON sis_uf.id = sis_emp.uf INNER JOIN sis_cid ON sis_cid.id = sis_emp.cid INNER JOIN sis_bai ON sis_emp.bai = sis_bai.id INNER JOIN sis_end ON sis_emp.`end` = sis_end.id INNER JOIN sis_cid_cat ON sis_emp.cat = sis_cid_cat.id WHERE sis_emp.`status` = 'a' AND sis_cid_cat.id = :idCategoria ORDER BY nomeFantasia ASC";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idCategoria', $idCategoria);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}else{
			$array['msgAviso'] = 'Não há resultados para esta Categoria';
		}
		return $array;
	}

	public function saveAvalia($idUser, $idEmpresa, $score, $comment = array()){
		$verifyAvalia = $this->getAvaliaUser($idUser, $idEmpresa);
		if(!empty($verifyAvalia)){
			$sql = "UPDATE sis_avalia SET idUser = :idUser, idEmpresa = :idEmpresa, pontos = :score, comment = :comment  WHERE idUser = :idUser AND idEmpresa = :idEmpresa";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idUser', $idUser);
			$sql->bindValue(':idEmpresa', $idEmpresa);
			$sql->bindValue(':score', $score);
			$sql->bindValue(':comment', $comment);
			$sql->execute();
			if($sql->rowCount() > 0) {
				$array['msg'] = 'Avaliação foi Atualizada com Sucesso.';
			}else{
				$array['msg'] = 'Não houve alteração dos dados da sua avaliação.';
			}
		}else{
			$sql = "INSERT INTO sis_avalia (idUser, idEmpresa, pontos, comment) VALUES (:idUser, :idEmpresa, :score, :comment)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':idUser', $idUser);
			$sql->bindValue(':idEmpresa', $idEmpresa);
			$sql->bindValue(':score', $score);
			$sql->bindValue(':comment', $comment);
			$sql->execute();
			if($sql->rowCount() > 0) {
				$array['msg'] = 'Sua avaliação foi salva com Sucesso';
			}else{
				$array['msg'] = 'Erro ao salvar os dados de Avaliação, tente novamente mais tarde.';
			}
		}
		return $array;
	}

	public function getAvaliaCompany($idEmpresa){
		$array = array();
		$sql = "SELECT * FROM sis_avalia WHERE idEmpresa = :idEmpresa";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idEmpresa', $idEmpresa);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getAvaliaUser($idUser, $idEmpresa){
		$sql = "SELECT * FROM sis_avalia WHERE idUser = :idUser AND idEmpresa = :idEmpresa";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':idUser', $idUser);
		$sql->bindValue(':idEmpresa', $idEmpresa);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	public function getAllEmp($order, $dir, $start, $length, $status, $termo = array()){
		if($status == ""){
			$status = 'a';
		}
		$array = array();		
		$sql = "SELECT status, cnpj, fan, id FROM sis_emp WHERE sis_emp.`status` = '".$status."'";
		$reg = $this->db->prepare($sql);
		$reg->execute();
		$array['totalResul'] = $reg->rowCount();	
		if(!empty($termo)){
			$sql .= " AND (id LIKE '%".$termo."%' OR fan LIKE '%".$termo."%' OR cnpj LIKE '%".$termo."%')";
			$bus = $this->db->prepare($sql);
			$bus->execute();
			$array['totalResul'] = $bus->rowCount();	
		}
		$sql .= " ORDER BY ".$order." ".$dir." LIMIT ".$start.", ".$length."";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':order', $order);
		$sql->execute();
		$array['totalEmp'] = $sql->rowCount();
		if($sql->rowCount() > 0) {
			$array['dadosEmp'] = $sql->fetchAll();
		}
		return $array;
	}

	public function totalEmp(){
		$array = array();
		$sql = "SELECT id FROM sis_emp WHERE sis_emp.`status` = 'a'";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		$array = $sql->rowCount();
		return $array;
	}

	public function allFranquias($order= array(), $dir= array(), $start= array(), $length= array(), $status= array(), $termo = array()){
		$sql = "SELECT sis_fra.id AS idFran, sis_cid.cid, sis_emp.id AS idFraEmp, sis_emp.cnpj, sis_emp.fan, sis_fra.`status` FROM sis_fra INNER JOIN sis_emp ON sis_fra.cnpj = sis_emp.id INNER JOIN sis_cid ON sis_cid.id = sis_fra.cid WHERE sis_fra.`status` = '".$status."'";
		$reg = $this->db->prepare($sql);
		$reg->execute();
		$array['totalResul'] = $reg->rowCount();
		if(!empty($termo)){
			$sql .= " AND (sis_fra.id LIKE '%".$termo."%' OR sis_cid.cid LIKE '%".$termo."%' OR sis_emp.cnpj LIKE '%".$termo."%' OR sis_emp.fan LIKE '%".$termo."%')";
			$bus = $this->db->prepare($sql);
			$bus->execute();
			$array['totalResul'] = $bus->rowCount();	
		}
		$sql .= " ORDER BY ".$order." ".$dir." LIMIT ".$start.", ".$length."";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':order', $order);
		$sql->execute();
		$array['totalEmp'] = $sql->rowCount();
		if($sql->rowCount() > 0) {
			$array['dadosEmp'] = $sql->fetchAll();
		}
		return $array;
	}

	public function updateEmpresa($data = array()){

		if(is_array($data) && !empty($data['logo']) > 0){
			$sql = "UPDATE sis_emp SET logo = :logo WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':logo',$data['logo']);
			$sql->bindValue(':id',$data['id']);
			$sql->execute();
		}
		if(is_array($data) && !empty($data['id']) > 0){
			$sql = "UPDATE sis_emp SET fan = :fan, tel = :tel, cel = :cel, num = :num WHERE id = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':fan',$data['fan']);
			$sql->bindValue(':tel',$data['tel']);
			$sql->bindValue(':cel',$data['cel']);
			$sql->bindValue(':num',$data['num']);
			$sql->bindValue(':id',$data['id']);
			$sql->execute();
		}

		if(is_array($data) && !empty($data['idBairro'])){
			$sql = "UPDATE sis_bai SET bai = :bai WHERE id = :id_bairro";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':bai',$data['bairro']);
			$sql->bindValue(':id_bairro',$data['idBairro']);
			$sql->execute();
		}

		if(is_array($data) && !empty($data['idEndereco'])){
			$sql = "UPDATE sis_end SET end = :end WHERE id = :id_endereco";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':end',$data['endereco']);
			$sql->bindValue(':id_endereco',$data['idEndereco']);
			$sql->execute();
		}

		if(is_array($data) && !empty($data['idCep'])){
			$sql = "UPDATE sis_cep SET cep = :cep WHERE id = :id_cep";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':cep',$data['cep']);
			$sql->bindValue(':id_cep',$data['idCep']);
			$sql->execute();
		}

		if(is_array($data) && !empty($data['idEstado'])){
			$sql = "UPDATE sis_uf SET est = :estado WHERE id = :id_estado";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':estado',$data['estado']);
			$sql->bindValue(':id_estado',$data['idEstado']);
			$sql->execute();
		}

		if(is_array($data) && !empty($data['abre']) || !empty($data['fecha'])){

			$sql = "SELECT * FROM sis_emp_atd WHERE id_emp = :id";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':id',$data['id']);
			$sql->execute();
			if($sql->rowCount() > 0){
				$sql = "UPDATE sis_emp_atd SET abre = :abre, fecha = :fecha WHERE id_emp = :id_emp";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':abre',$data['abre']);
				$sql->bindValue(':fecha',$data['fecha']);
				$sql->bindValue(':id_emp',$data['id']);
				$sql->execute();
			}else{
				$sql = "INSERT INTO sis_emp_atd SET id_emp = :id_emp, id_user = :id_user, abre = :abre, fecha = :fecha";
				$sql = $this->db->prepare($sql);
				$sql->bindValue(':abre',$data['abre']);
				$sql->bindValue(':fecha',$data['fecha']);
				$sql->bindValue(':id_user',$data['id_user']);
				$sql->bindValue(':id_emp',$data['id']);
				$sql->execute();
			}

		}

	}

	public function getAtd($id){
		$sql = "SELECT * FROM sis_emp_atd WHERE id_emp = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id',$id);
		$sql->execute();
		if($sql->rowCount() > 0){
			$sql = $sql->fetchAll(\PDO::FETCH_ASSOC);
			return $sql;
		}
	}
}

