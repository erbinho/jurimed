<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Empresa;

class AjaxController extends Controller {
	private $user;
	public function __construct(){
		parent::__construct();

        $this->user = new Users();
        if(!$this->user->verifyLogin()){
            header("Location: ".BASE_URL."/Login?error=6");
            exit;
        }
	}

    public function index(){
        $arrayJson = array(
            "draw" => 0,
            "recordsTotal" => 0,
            "recordsFiltered"=> 0,
            "data"=> array()
        );
        echo json_encode($arrayJson);
        exit;
    }

    public function avalie() {
    	$array = array();
    	$comp = new Empresa();
    	$idUser = addslashes($_POST['idUser']);
    	$idEmpresa = addslashes($_POST['idEmpresa']);
    	$score = addslashes($_POST['score']);
    	$comentario = addslashes($_POST['comentario']);
    	$array = $comp->saveAvalia($idUser, $idEmpresa, $score, $comentario);
    	echo json_encode($array);
        exit;
    }

    public function verifyAvalie() {
    	$array = array();
    	$comp = new Empresa();
    	$idUser = addslashes($_POST['idUser']);
    	$idEmpresa = addslashes($_POST['idEmpresa']);
    	$array['userAvalia'] = $comp->getAvaliaUser($idUser, $idEmpresa);
    	echo json_encode($array);
        exit;
    }

    public function listaEmp(){
        $comp = new Empresa();

        $coluna = array(
            0 => 'status',
            1 => 'cnpj',
            2 => 'fan',
            0 => 'id'
        );

        $order = addslashes($_POST['order'][0]['column']);
        $dir = addslashes($_POST['order'][0]['dir']);
        $start = addslashes($_POST['start']);
        $length = addslashes($_POST['length']);
        $status = addslashes($_POST['status']);
        $order = $coluna[$order];

        if(!empty($_POST['search']['value'])){
            $termo = addslashes($_POST['search']['value']);
            $array = $comp->getAllEmp($order, $dir, $start, $length, $status, $termo);
            $totalData = $array['totalResul'];
            $totalFilter = $array['totalResul'];
        }else{            
            $array = $comp->getAllEmp($order, $dir, $start, $length, $status);
            $totalData = $array['totalResul'];
            $totalFilter = $array['totalResul'];
        }

        if(!empty($array['dadosEmp'])){
            foreach ($array['dadosEmp'] as $value) {
                $dado = array(); 
                if($value['status'] != 'i'){
                    $dado[3] = '<a href="'.BASE_URL.'/Dashboard/EditarEmpresa/'.$value['id'].'" class="btn btn-success btn-xs">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a href="'.BASE_URL.'/Dashboard/ConfigEmpresa/'.$value['id'].'" class="btn bg-purple btn-xs">
                                    <i class="fa fa-cogs"></i> Config
                                </a>';

                    $dado[2] = $value['fan'];
                    $dado[1] = $value['cnpj'];
                    $dado[0] = '<input type="checkbox" data-id="'.$value['id'].'" value="'.$value['status'].'" checked>';
                 }else{
                    $dado[3] = '<a href="'.BASE_URL.'/Dashboard/EditarEmpresa/'.$value['id'].'" class="btn btn-default btn-xs disabled">
                                    <i class="fa fa-edit"></i> Editar
                                </a>
                                <a href="'.BASE_URL.'/Dashboard/ConfigEmpresa/'.$value['id'].'" class="btn btn-default btn-xs disabled">
                                    <i class="fa fa-cogs"></i> Config
                                </a>';
                    $dado[2] = $value['fan'];
                    $dado[1] = $value['cnpj'];
                    $dado[0] = '<input type="checkbox" data-id="'.$value['id'].'" value="'.$value['status'].'" disabled>';
                 }
                $dados[] = $dado;
            }
        }else{
            $totalData = 0;
            $totalFilter = 0;
            $dados = array();
        }
        $arrayJson = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered"=> intval($totalFilter),
            "data"=> $dados
        );
        echo json_encode($arrayJson);
        exit;
    }

    public function listaGestao(){
        $comp = new Empresa();
        $coluna = array('sis_fra.id', 'sis_fra.cid', 'sis_emp.cnpj', 'sis_emp.fan', 'sis_emp.cnpj', 'sis_emp.cnpj', 'sis_emp.cnpj', 'sis_emp.cnpj', 'sis_emp.cnpj');

        $order = addslashes($_POST['order'][0]['column']);
        $dir = addslashes($_POST['order'][0]['dir']);
        $start = addslashes($_POST['start']);
        $length = addslashes($_POST['length']);
        $status = addslashes($_POST['status']);
        $order = $coluna[$order];

        if(!empty($_POST['search']['value'])){
            $termo = addslashes($_POST['search']['value']);
            $array = $comp->allFranquias($order, $dir, $start, $length, $status, $termo);
            $totalData = $array['totalResul'];
            $totalFilter = $array['totalResul'];
        }else{            
            $array = $comp->allFranquias($order, $dir, $start, $length, $status);
            $totalData = $array['totalResul'];
            $totalFilter = $array['totalResul'];
        }
        if(!empty($array['dadosEmp'])){
            foreach ($array['dadosEmp'] as $value) {
                $dado = array(); 
                $dado[0] = $value['idFran'];
                $dado[1] = $value['cid'];
                $dado[2] = $value['fan'];
                if($value['status'] != 'i'){
                    $dado[3] = '<a href="#!" class="btn btn-default" data-toggle="tooltip" title="Configuração de acesso a impressão do aso da Gestão!"><i class="fa fa-gear"></i></a>
                                <a href="#!" class="btn btn-default" data-toggle="tooltip" title="(Financeiro) Duplicatas"><i class="fa fa-copy"></i></a>';

                    $dado[4] = '<a href="#!" class="btn btn-twitter" data-toggle="tooltip" title="Prestadores"><i class="fa fa-users"></i> Pres.</a></td>';
                    $dado[5] = '<a href="#!" class="btn btn-danger" data-toggle="tooltip" title="Profissionais"><i class="fa fa-user-md"></i> Prof.</a>';
                    $dado[6] = '<a href="#!" class="btn btn-bitbucket" data-toggle="tooltip" title="Configuração de acesso na Gestão"><i class="fa fa-unlock-alt"></i></a>';

                    $dado[7] = '<div class="btn-group">
                                    <a href="#!" class="btn btn-success" data-toggle="tooltip" title="Lista de Empresas"><i class="fa fa-building"></i></a>
                                    <a href="#!" class="btn btn-success btn-flat" data-toggle="tooltip" title="Mais informações das Empresas"><i class="fa fa-info"></i></a>
                                </div>';
                    $dado[8] = '<div class="btn-group">
                                    <a href="#!" class="btn btn-orange" data-toggle="tooltip" title="Mapeamento da Empresas"><i class="fa fa-map"></i> Mapa</a>
                                    <a href="#!" class="btn btn-orange btn-flat" data-toggle="tooltip" title="Editar Informações da Gestão"><i class="fa fa-edit"></i> Editar</a>
                                </div>';
                }else{
                    $dado[3] = '<a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Configuração de acesso a impressão do aso da Gestão!"><i class="fa fa-gear"></i></a>
                                <a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="(Financeiro) Duplicatas"><i class="fa fa-copy"></i></a>';

                    $dado[4] = '<a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Prestadores"><i class="fa fa-users"></i> Pres.</a></td>';
                    $dado[5] = '<a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Profissionais"><i class="fa fa-user-md"></i> Prof.</a>';
                    $dado[6] = '<a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Configuração de acesso na Gestão"><i class="fa fa-unlock-alt"></i></a>';

                    $dado[7] = '<div class="btn-group">
                                    <a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Lista de Empresas"><i class="fa fa-building"></i></a>
                                    <a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Mais informações das Empresas"><i class="fa fa-info"></i></a>
                                </div>';
                    $dado[8] = '<div class="btn-group">
                                    <a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Mapeamento da Empresas"><i class="fa fa-map"></i> Mapa</a>
                                    <a href="#!" class="btn btn-default disabled" data-toggle="tooltip" title="Editar Informações da Gestão"><i class="fa fa-edit"></i> Editar</a>
                                </div>';

                }
                $dados[] = $dado;
            }
        }else{
            $totalData = 0;
            $totalFilter = 0;
            $dados = array();
        }
        $arrayJson = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData),
            "recordsFiltered"=> intval($totalFilter),
            "data"=> $dados
        );
        echo json_encode($arrayJson);
        exit;
    }
}