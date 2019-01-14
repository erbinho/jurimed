<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Permissions;
use \Models\Company;

class UsuariosController extends Controller {
    private $user;
    private $arrayInfo;

    public function __construct(){
        parent::__construct();
        error_reporting(E_ALL);
        ini_set("display_errors", "On");
        $this->user = new Users();
        if(!$this->user->verifyLogin()){
            header("Location: ".BASE_URL."/Login?error=2");
            exit;
        }else{
            if(!$this->user->hasPermissions('users_view')){
                header("Location: ".BASE_URL."/Login?error=6");
                exit;
            }
        }

        $this->arrayInfo = array(
            'tpl' => 'admin/template',
            'user' => $this->user,
            'menuActive' => 'users'
        );
    }

    public function index() {
        $this->arrayInfo['subMenuActive'] = 'listaUser';
        $this->loadTemplate("admin/usuarios", $this->arrayInfo);
    }

    public function accessUser($id) {
        $perm = new Permissions;
        $comp = new Company;
        $this->arrayInfo['subMenuActive'] = 'listaUser';
        $this->arrayInfo['dadosUser'] = $this->user->getDadosUser($id);
        $this->arrayInfo['listEmpresas'] = $comp->getRespEmpresa($id);
        $this->arrayInfo['listGrop'] = $perm->getAllGroups();
        $this->arrayInfo['permission_params'] = $perm->getAllParams();
        $this->arrayInfo['permission_group_params'] = $perm->getPermissions($this->arrayInfo['dadosUser']['id_permission_group']);

        $this->loadTemplate("admin/usuariosLiberacao", $this->arrayInfo);
    }

    public function accessUser_Action() {
        if(!empty($_POST['id_usuario'])){
            $idUser = $_POST['id_usuario'];
            $idPermission = $_POST['group_permission'];
            $this->user->addLiberacao($idUser,$idPermission);
            header("Location: ".BASE_URL."/Usuarios/accessUser/".$idUser);
        }else{
            $_SESSION['formError'] = array('name');
            header("Location: ".BASE_URL."/Usuarios");
            exit;
        }
    }

    public function editUser($id) {
        if($this->user->hasPermissions('edit_users')){
            $perm = new Permissions;
            $comp = new Company;
            $this->arrayInfo['dadosUser'] = $this->user->getDadosUser($id);
            $this->arrayInfo['listEmpresas'] = $comp->getRespEmpresa($id);
            $this->loadTemplate("admin/usuariosEditar", $this->arrayInfo);
        }else{
            header("Location: ".BASE_URL."/Usuarios");
            exit;
        }

    }

}
