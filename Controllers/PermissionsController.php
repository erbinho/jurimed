<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Permissions;

class PermissionsController extends Controller {
    private $user;
    private $arrayInfo;
    
	public function __construct(){     
		parent::__construct();
        $this->user = new Users();

        if(!$this->user->verifyLogin()){
            header("Location: ".BASE_URL."/Login?error=2");
            exit;
        }

        if(!$this->user->hasPermissions('permission_view')){
            header("Location: ".BASE_URL."/Dashboard");
            exit;
        }

        $this->arrayInfo = array(
            'tpl' => 'admin/template',
            'user' => $this->user,
            'menuActive' => 'permission'
        );

	}

// ======= INICIO DAS FUNÇÕES DOS GRUPOS DE PERMISSÕES ===== //
// ========================================================================== //

    // == LISTA DE GRUPOS DE PERMISSÕES == //
	public function index() {
        $perm = new Permissions();
        $this->arrayInfo['listGroup'] = $perm->getAllGroups(); // <-- Armazena a Lista dos Grupos
        $this->arrayInfo['subMenuActive'] = 'grup_perm';
        $this->loadTemplate("admin/permissions",  $this->arrayInfo); // <-- Exibe a Tela
    }

    // == CADASTRA UM NOVO GRUPOS DE PERMISSÕES == //
    public function add(){
        if($this->user->hasPermissions('permission_group_add')){
            $this->arrayInfo['subMenuActive'] = 'grup_perm';
            $this->arrayInfo['errorItens'] = array(); // <-- Define a variavel Error vazia
            $perm = new Permissions();

            $this->arrayInfo['permission_params'] = $perm->getAllParams(); // <-- Armazena a Lista dos Parametros
            $this->arrayInfo['permission_params_categ'] = $perm->getAllCategParams(); // <-- Armazena a Lista dos Parametros

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){ // <-- Verifica se tem Mensagem de Erro
                $this->arrayInfo['errorItens'] = $_SESSION['formError']; // <-- Armazena a Mensagem de erro
                unset($_SESSION['formError']); // <-- Limpa a SESSION de mensagem de erro
            }
            $this->loadTemplate("admin/permissionsAdd", $this->arrayInfo); // <-- Exibe a Tela que está VIEWS/ADMIN/PERMISSIONSADD.PHP
        }else{
            header("Location: ".BASE_URL."/Permissions");
        }
    }

    // == RECEBE OS DADOS DA VIEWS/ADMIN/PERMISSIONSADD.PHP PARA O CADATRO DE UM NOVO GRUPO == //
    public function add_Action(){
        if($this->user->hasPermissions('permission_group_add')){
            $perm = new Permissions();
            if(!empty($_POST['name'])){
                $name = $_POST['name'];
                $id = $perm->addGroup($name);
                if(isset($_POST['itens']) && count($_POST['itens']) > 0 ){
                    $itens = $_POST['itens'];
                    foreach ($itens as $item) {
                        $perm->linkParamToGroup($item, $id);
                    }
                }
                header("Location: ".BASE_URL."/Permissions");
            }else{
                $_SESSION['formError'] = array('name');
                header("Location: ".BASE_URL."/Permissions/add");
                exit;
            }
        }else{
            header("Location: ".BASE_URL."/Permissions");
        }
    }

    // == EDIÇÃO DOS DADOS DOS GRUPOS DE PERMISSÕES == //
    public function edit($id){
        if($this->user->hasPermissions('permission_group_edit')){
            if(!empty($id)){ // <-- VERIFICA SE FOI MANDADO UM ID PARA EDIÇÃO
                $this->arrayInfo['subMenuActive'] = 'grup_perm';
                $this->arrayInfo['errorItens'] = array(); // <-- Define a variavel Error vazia
                $perm = new Permissions();
                $this->arrayInfo['permission_group_id'] = $id; // <-- Armazena o ID do Grupo selecionado
                $this->arrayInfo['permission_group_name'] = $perm->getPermissionGroupName($id); // <-- Armazena o Nome do Grupo selecionado
                $this->arrayInfo['permission_params'] = $perm->getAllParams(); // <-- Armazena todos os Parametros cadastrados
                $this->arrayInfo['permission_group_params'] = $perm->getPermissions($id); // <-- Armazena todos os Parametros atribuidos do Grupo
                $this->arrayInfo['permission_params_categ'] = $perm->getAllCategParams();
                if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){ // <-- Verifica se tem Mensagem de Erro
                    $this->arrayInfo['errorItens'] = $_SESSION['formError']; // <-- Armazena a Mensagem de erro
                    unset($_SESSION['formError']); // <-- Limpa a SESSION de mensagem de erro
                }
                $this->loadTemplate("admin/permissionsEdit", $this->arrayInfo); // <-- Exibe a Tela que está VIEWS/ADMIN/PERMISSIONSEDIT.PHP
            }
        }else{
            header("Location: ".BASE_URL."/Permissions");
            exit;
        }
    }
    // == RECEBE OS DADOS DA VIEWS/ADMIN/PERMISSIONSEDIT.PHP PARA O EDIÇÃO DO GRUPO == //
    public function edit_Action($id){
        if(!empty($id)){
            $perm = new Permissions();
            if(!empty($_POST['name'])){
                $name = $_POST['name'];
                $perm->editGroupName($id, $name);
                $perm->clearLinkPerm($id);
                if(isset($_POST['itens']) && count($_POST['itens']) > 0 ){
                    $itens = $_POST['itens'];
                    foreach ($itens as $item) {
                        $perm->linkParamToGroup($item, $id);
                    }
                }
                header("Location: ".BASE_URL."/Permissions");
            }else{
                $_SESSION['formError'] = array('name');
                header("Location: ".BASE_URL."/Permissions/edit/".$id);
                exit;
            }
        }else{
            header("Location: ".BASE_URL."/Permissions");
            exit;
        }
    }

    // == DELETA UM GRUPO DE PERMISSÃO == //
    public function del($id_group){
        $perm = new Permissions();
        $perm->DeleteGroup($id_group); // <-- Função de deletar que está MODELS/PERMISSIONS.PHP
        header("Location: ".BASE_URL."/Permissions");
        exit;
    }
// ========================================================================== //
// ======= FIM DAS FUNÇÕES DOS GRUPOS DE PERMISSÕES ========================= //


// ======= INICIO DAS FUNÇÕES DOS PARAMETROS DE PERMISSÕES ================== //
// ========================================================================== //
    // == LISTA DOS PARAMETROS DE PERMISSÕES == //
    public function parametros(){
        $perm = new Permissions();
        $this->arrayInfo['subMenuActive'] = 'params_perm';
        $this->arrayInfo['listGroup'] = $perm->getAllParams();
        $this->arrayInfo['permission_params_categ'] = $perm->getAllCategParams(); 
        $this->loadTemplate("admin/permissionsParams", $this->arrayInfo);
    }

    // == CADASTRA UM NOVO GRUPOS DE PERMISSÕES == //
    public function parametrosAdd(){
        if($this->user->hasPermissions('permission_group_add')){
            $this->arrayInfo['subMenuActive'] = 'params_perm';
            $this->arrayInfo['errorItens'] = array(); // <-- Define a variavel Error vazia
            $perm = new Permissions();
            $this->arrayInfo['permission_params_categ'] = $perm->getAllCategParams(); 
            $this->arrayInfo['permission_params'] = $perm->getAllParams(); // <-- Armazena a Lista dos Parametros

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){ // <-- Verifica se tem Mensagem de Erro
                $this->arrayInfo['errorItens'] = $_SESSION['formError']; // <-- Armazena a Mensagem de erro
                unset($_SESSION['formError']); // <-- Limpa a SESSION de mensagem de erro
            }
            $this->loadTemplate("admin/permissionsParamsAdd", $this->arrayInfo); // <-- Exibe a Tela que está VIEWS/ADMIN/PERMISSIONSADD.PHP
        }else{
            header("Location: ".BASE_URL."/Permissions");
        }
    }

    public function parametrosAdd_Action(){
        $perm = new Permissions();
        if(!empty($_POST['nameParams']) && !empty($_POST['slugParams'])){
            $id = addslashes($_POST['paramCateg']);
            $name = addslashes($_POST['nameParams']);
            $slug = addslashes($_POST['slugParams']);
            $perm->addParams($id, $name, $slug);
            header("Location: ".BASE_URL."/Permissions/parametros");
        }else{
            $_SESSION['formError'] = array('name', 'slug');
            header("Location: ".BASE_URL."/Permissions/parametrosAdd");
            exit;
        }
    }

    // == EDIÇÃO DOS DADOS DOS PARAMETROS DE PERMISSÕES == //
    public function permissionsParamsEdit($id){
        if(!empty($id)){ // <-- VERIFICA SE FOI MANDADO UM ID PARA EDIÇÃO
            $this->arrayInfo['subMenuActive'] = 'params_perm';
            $this->arrayInfo['errorItens'] = array(); // <-- Define a variavel Error vazia
            $perm = new Permissions();
            $this->arrayInfo['permission_params_id'] = $id; // <-- Armazena o ID do Parametro selecionado
            $this->arrayInfo['permission_params'] = $perm->getPermissionParamsName($id); // <-- Retorna os dados do Parametro selecionado
            $this->arrayInfo['permission_params_categ'] = $perm->getAllCategParams(); // <-- Retorna todos as Categorias de Permissão cadastrados

            if(isset($_SESSION['formError']) && count($_SESSION['formError']) > 0){ // <-- Verifica se tem Mensagem de Erro
                $this->arrayInfo['errorItens'] = $_SESSION['formError']; // <-- Armazena a Mensagem de erro
                unset($_SESSION['formError']); // <-- Limpa a SESSION de mensagem de erro
            }
            $this->loadTemplate("admin/permissionsParamsEdit", $this->arrayInfo); // <-- Exibe a Tela que está VIEWS/ADMIN/PERMISSIONSPARAMSEDIT.PHP
        }else{
            header("Location: ".BASE_URL."/Permissions/parametros");
            exit;
        }
    }

    public function permissionsParamsEdit_Action($id){
        if(!empty($id)){
            $perm = new Permissions();
            if(!empty($_POST['name'])){
                $name = $_POST['name'];
                $id_categ = $_POST['paramCateg'];
                $perm->editParams($id, $id_categ, $name);
                header("Location: ".BASE_URL."/Permissions/parametros");
            }else{
                $_SESSION['formError'] = array('name');
                header("Location: ".BASE_URL."/Permissions/permissionsParamsEdit/".$id);
                exit;
            }
        }else{
            header("Location: ".BASE_URL."/Permissions");
            exit;
        }
    }

}