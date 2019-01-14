<?php

namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Company;
use \Models\Empresa;

class DashboardController extends Controller {
    private $user;
    private $company;
    private $arrayInfo;

	public function __construct(){
		parent::__construct();

        $this->user = new Users();
        $this->company = new Company();
        if(!$this->user->verifyLogin()){
            header("Location: ".BASE_URL."/Login?error=2");
            exit;
        }else{
            if(!$this->user->hasPermissions('dashboard_view')){
                header("Location: ".BASE_URL."/Login?error=6");
                exit;
            }
        }

        $this->arrayInfo = array(
            'tpl' => 'admin/template',
            'user' => $this->user,
            'menuActive' => 'home'
        );
	}

	public function index() {

        $empresa = new Empresa();

        $idUser = $this->user->getUserDados()['id'];
        $totalEmpresas = isset($this->company->getRespEmpresa($idUser)[0]['id']) ? count($this->company->getRespEmpresa($idUser)) : '0';

        $this->arrayInfo['subMenuActive'] = 'grup_perm';
        $this->arrayInfo['dataUser'] = $this->user->getUserDados();

        $this->arrayInfo['totalEmpresas'] = $totalEmpresas;

        
     	$this->loadTemplate("admin/home", $this->arrayInfo);
    }

    // ROTA PARA VISUALIZAR E EDITAR EMPRESAS
    public function empresas(){
        
        $idUser = $this->user->getUserDados()['id'];

        $this->arrayInfo['subMenuActive'] = 'grup_perm';
        $this->arrayInfo['empresas'] = $this->company->getRespEmpresa($idUser);

        $this->loadTemplate("admin/empresas", $this->arrayInfo);
        
    }

}