<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;

class LoginController extends Controller {
    public function __construct(){
        parent::__construct();
        //header("Location: ".BASE_URL."/Login?error=1"); // <-- Redireciona para o Login com Variável ERROR Definida -- //
        //exit;
    }

    //== FUNCÃO PARA O CONTROLE DE LOGIN DO SITE ==//
    public function index() {
        $array = array('msg' => ''); // <-- Cria uma variavel vazia dentro do ARRAY -- //

        if(!empty($_GET['error'])){ // <-- Verifica se a Variável ERROR existe -- //
            if($_GET['error'] == '1'){
                $array['msg'] = 'Dados de acesso são inválidos!';
            }else if ($_GET['error'] == '2'){
                $array['msg'] = '<strong>Você não está logado</strong><br> ou <br> Seu Login foi usado em outra maquina!';
            }else if ($_GET['error'] == '3'){
                $array['msg'] = 'Não foi informado o Login e/ou Senha!';
            }else if ($_GET['error'] == '4'){
                $array['msg'] = 'Sessão do sistema encerrada com Sucesso!';
            }else if ($_GET['error'] == '5'){
                $array['msg'] = 'É Preciso estar logado para ter acesso aos demais conteúdos do Site!';
            }else if ($_GET['error'] == '6'){
                $array['msg'] = 'Você não tem permissão de acesso ao Sistema SIS!';
            }
        }

        $this->loadView("siteHome/login/login", $array); // <-- Carrega a VIEW Login enviando o ARRAY com a Mensagem de Erro caso ocorra -- //
    }

    // == FUNÇÃO QUE REALIZA O LOGIN DA PESSOA NO SISTEMA ==//
    public function signin(){
        $array['tpl'] = 'siteHome/template'; // <-- Define o Template a utilizar -- //
        $user = new Users();
        // == IF - VERIFICA O LOGIN REALIZADO PELO CARTÃO == //
        if((isset($_POST['cartao']) && !empty($_POST['cartao'])) && (isset($_POST['senha']) && !empty($_POST['senha']))) {
            $login = addslashes($_POST['cartao']);
            $senha = addslashes($_POST['senha']);
            if($user->validateUser($login, $senha)){
                header("Location: ".BASE_URL."/Dashboard/"); // <-- Redireciona para o Index do Painel Admin.-- //
                exit;
            }else{
                header("Location: ".BASE_URL."/Login?error=1"); // <-- Redireciona para o Login com Variável ERROR Definida -- //
                exit;
            }

        // == ELSE IF - Verifica o Login realizado pelo E-mail == //
        }else if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['senha']) && !empty($_POST['senha']))){
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if($user->validateUser($email, $senha)){
                header("Location: ".BASE_URL."/GuiaEmpresa/"); // <-- Redireciona para o Guia Empresas -- //
                exit;
            }else{
                header("Location: ".BASE_URL."/Login?error=1"); // <-- Redireciona para o Login com Variável ERROR Definida -- //
                exit;
            }
        }else{
            header("Location: ".BASE_URL."/Login?error=3"); // <-- Redireciona para o Login com Variável ERROR Definida -- //
            exit;
        }
    }

    //-- FUNÇÃO QUE DESLOGA O USUÁRIO --//
    public function logout(){
        unset($_SESSION['hashLogin']);
        unset($_SESSION['infoUserLogon']);
        header("Location: ".BASE_URL."/Login?error=4");
    }

    //-- FUNÇÃO PARA ENVIO DO EMAIL PARA O RESET DA SENHA DO SITE --//
    public function forget() {
        $user = new Users();
        if(isset($_POST['email']) && !empty($_POST['email'])){
            $email = addslashes($_POST['email']);
            $array = $user->verifyEmail($email);
            if(!empty($array['dadosUser'])){
                $assunto = "Link para redefinir senha - AVISO";
                $message = "Prezados(as),\r\n\r\n";
                $message .= "Este e-mail foi enviado com base em seu cadastro de acesso ao SIS do usuário ".$array['dadosUser']['nome'];
                $message .= ", para confirmar sua solicitação, acesse o link abaixo para ser redirecionado.\r\n";
                $message .= "Caso esta ação não seja do seu conhecimento, entre em contato conosco imediatamente ou acesse o link abaixo para desfazer a alteração.\r\n\r\n";
                $message .= $array['link']."\r\n\r\n";
                $message .= "Equipe da JURIMED.\r\nwww.jurimed.com.br/home\r\n\r\n";
                $message .= "* Este e-mail foi enviado automaticamente pelo Sistema da JURIMED. Favor não responder. ";
                $header = 'From: suporte.jurimed@outlook.com'."\r\n".
                          'Replay-To: '.$email."\r\n".
                          'X-Mailer: PHP/'.phpversion();

                mail($email, $assunto, $message, $header);
            }
            $array['tpl'] = 'siteHome/template';
            $this->loadTemplate("siteHome/login/sendMsg", $array);
            exit;
        }else{
            $array['tpl'] = 'siteHome/template';
            $this->loadTemplate("siteHome/login/forget", $array);
            exit;
        }
    }

    //-- VERIFICAÇÃO DO TOKEN PARA O RESET DE SENHA --//
    public function reset() {
        $user = new Users();
        if(isset($_GET['token']) && !empty($_GET['token'])){
            $token = addslashes($_GET['token']);
            $array = $user->verifyToken($token);
            $array['tpl'] = 'siteHome/template';
            if(!empty($array['dadosUser'])){
                $this->loadTemplate("siteHome/login/reset", $array);
            }else{
                $this->loadTemplate("siteHome/login/sendMsg", $array);
            }
        }else{
            header("Location:".BASE_URL);
        }
    }

    //-- FUNÇÃO QUE CRIA UMA NOVA SENHA PARA A PESSOA --//
    public function NewPassword() {
        $user = new Users();
        if(isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['user']) && !empty($_POST['user'])){
            $idUser = addslashes($_POST['user']);
            $senha = addslashes($_POST['senha']);
            $array = $user->updateSenha($idUser, $senha);
            $_SESSION = array(
                'PrevUrl' => ' /guia/admin/indexadmin.php',
                'MM_Username' => $array['usuario'],
                'MM_UserGroup' => $array['nivel']
            );
            header("Location: ../../guia/admin/indexadmin.php");
        }else{
            header("Location:".BASE_URL);
        }
    }

    //-- FUNÇÃO QUE CADASTRA A PESSOA --//
    public function register() {
        $user = new Users();
        if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
            $nome = addslashes($_POST['nome']);
            $cpf = addslashes($_POST['cpf']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);
            if(!$user->userExists($cpf, $email)){
                $array = $user->registerUser($nome, $cpf, $email, $senha);
                if(!empty($array['dadosUser'])){
                    $assunto = "BEM VINDO - Link para Ativar a sua Conta";
                    $message = "Prezados(as),\r\n\r\n";
                    $message .= "Este e-mail foi enviado com base em seu cadastro de acesso ao SIS para conta do usuário ".$array['dadosUser']['nome'];
                    $message .= ", para confirmar sua solicitação, acesse o link abaixo para ser redirecionado para ativação da conta.\r\n";
                    $message .= "Caso esta ação não seja do seu conhecimento, favor desconsiderar este E-mail.\r\n\r\n";
                    $message .= $array['link']."\r\n\r\n";
                    $message .= "Equipe SIS.\r\nwww.jurimed.com.br/home\r\n\r\n";
                    $message .= "* Este e-mail foi enviado automaticamente pelo Sistema SIS. Favor não responder. ";
                    $header = 'From: suporte.jurimed@outlook.com'."\r\n".
                              'Replay-To: '.$email."\r\n".
                              'X-Mailer: PHP/'.phpversion();

                    mail($email, $assunto, $message, $header);
                }
            }else{
                $array['avisoNoToken'] = 'Você já possui um cadastro, tente realizar um reset de senha ou entre em contato conosco.';
            }
            $array['tpl'] = 'siteHome/template';
            $this->loadTemplate("siteHome/login/sendMsg", $array);
            exit;
        }else{
            $array['tpl'] = 'siteHome/template';
            $this->loadTemplate("siteHome/login/registro", $array);
        }
    }

    //-- ATIVAÇÃO DA CONTA DO USUÁRIO --//
    public function active() {
        $user = new Users();
        if(isset($_GET['token']) && !empty($_GET['token'])){
            $token = addslashes($_GET['token']);
            $array = $user->verifyToken($token);
            $array['tpl'] = 'siteHome/template';
            if(!empty($array['dadosUser'])){
                $array = $user->ativaConta($array['dadosUser']['id_user']);
                $array['tpl'] = 'siteHome/template';
                $this->loadTemplate("siteHome/login/sendMsg", $array);
            }else{
                $this->loadTemplate("siteHome/login/sendMsg", $array);
            }
        }else{
            header("Location:".BASE_URL);
        }
    }
}
