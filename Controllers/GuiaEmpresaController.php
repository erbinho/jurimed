<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Category;
use \Models\Empresa;

class GuiaEmpresaController extends Controller {
    //-- Armazena os dados do Usuário --//
    private $user;
    private $arrayInfo;

    //-- Verifica se o usuário está logado no sistema --//
    public function __construct(){
//        error_reporting(E_ALL);
//        ini_set("display_errors", "On");

        parent::__construct();
        $this->user = new Users();

        if(!$this->user->verifyLogin()){
            $_SESSION['hashLogin'] = '';
        }else{
            $_SESSION['infoUserLogon'] = $this->user->getUserDados();
        }

        $this->arrayInfo = array(
            'tpl' => 'siteGuia/template',
            'user' => $this->user,
            'menuActive' => 'permission'
        );
    }

    //-- Acrescenta um Array['totalStars'] da Média e o Total de Avaliações --//
    private function getStarEmp($listaEmp){
        $emp = new Empresa();
        $array = array();
        foreach ($listaEmp as $value) {
            $somaScore = 0;
            $value['mediaStars'] = 0;
            $evaluation = $emp->getAvaliaCompany($value['idEmpresa']);
            $value['totalAvalia'] = count($evaluation);
            if(!empty($evaluation)){
                for($i = 0; $i < count($evaluation); $i++){
                    $somaScore += $evaluation[$i]['pontos'];
                }
                $resultAvalie = round(($somaScore/count($evaluation)));
                $value['mediaStars'] = $resultAvalie;
            }
            array_push($array, $value);
        }
        return $array;
    }

    //-- Pagina INICIAL do GUIA --//
    public function index() {
    	$ctg = new Category();
    	$emp = new Empresa();

        $this->arrayInfo['listCategory'] = $ctg->getAllCategorias();
        $this->arrayInfo['listEmpresas'] = $emp->getAllEmpresas();

     	$this->loadTemplate("siteGuia/home", $this->arrayInfo);
    }

    //-- Pagina do DADOS da Empresa selecionada --//
    public function empresa($id) {
        $ctg = new Category();
        $emp = new Empresa();

        $abre = explode(',',$emp->getAtd($id)[0]['abre']);
        $fecha = explode(',',$emp->getAtd($id)[0]['fecha']);
       
        $array['listCategory'] = $ctg->getAllCategorias();
        $array['infoCompany']  = $emp->getEmpresa($id);
        $array['totalAvalia']  = $emp->getAvaliaCompany($id)[0]['pontos'] ?? null;
        $array['diasAtd']      = exibeAtd($abre,$fecha);
        $array['abre']         = $abre[diaAtendimento()];
        $array['fecha']        = $fecha[diaAtendimento()];

        $array['user']         = $this->user;
        $array['tpl']          = 'siteGuia/template';
        $this->loadTemplate('siteGuia/empresa',$array);
    }

    public function lista($idCategoria = array()) {
        $ctg = new Category();
        $emp = new Empresa();
        $array['listaBusca'] = array();

        $array['user'] = $this->user;

        if((isset($_GET['busca']) && !empty($_GET['busca'])) || (isset($_GET['categoria']) && !empty($_GET['categoria']))){
            $busca = addslashes($_GET['busca']);
            $categoria = addslashes($_GET['categoria']);
            $array['typeBusca'] = 'Busca';
            $array['listaEmp'] = $emp->seachEmpresa($busca, $categoria);
            if(empty($array['listaEmp']['msgAviso'])){
                $array['listaBusca'] = $this->getStarEmp($array['listaEmp']);
            }else{
                $array['listaBusca'] = $array['listaEmp'];
            }
        }else if(isset($idCategoria) && !empty($idCategoria)){
            $array['listaEmp'] = $emp->getEmpresaCateg($idCategoria);
            if(empty($array['listaEmp']['msgAviso'])){
                $array['listaBusca'] = $this->getStarEmp($array['listaEmp']);
            }else{
                $array['listaBusca'] = $array['listaEmp'];
            }
        }
    	$array['tpl'] = 'siteGuia/template';
    	$array['listCategory'] = $ctg->getAllCategorias();
    	$this->loadTemplate("siteGuia/lista", $array);
    }
}
