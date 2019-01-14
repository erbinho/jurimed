<?php
namespace Controllers;

use \Core\Controller;
use \Models\Users;
use \Models\Company;
use \Models\Empresa;

class RequestAjaxController extends Controller {
    private $user;
    private $arrayInfo;

    public function __construct(){
        parent::__construct();
        
        error_reporting(E_ALL);
        ini_set("display_errors", "On");

        $this->user = new Users();
        if(!$this->user->verifyLogin()){
            header("Location: ".BASE_URL."/Login?error=6");
            exit;
        }
        
        $this->arrayInfo = array(
            'tpl' => 'admin/template',
            'user' => $this->user,
            'menuActive' => 'home'
        );
    }
    
    // == FUNÇÃO PARA CADASTRAR A NOVA SKIN DO PAINEL == //
    public function ConfigSkin(){
        $id = $this->user->getUid();
        if(!empty($_POST['skin'])){
            $skinActive = addslashes($_POST['skin']);
            $this->user->skinActive($id, $skinActive);
        }
    }
    
    // == FUNÇÃO PARA MONTAR E LISTAR A LISTA DE USUÁRIOS;
    public function listaUser(){
        (!$this->user->hasPermissions('edit_users')) ? $item = 'disabled' : $item = ''; // <-- Atribui a opção desabled do input de acordo com a permissão -- //
        $coluna = array(0 => 'id', 1 => 'retrato_foto', 2 => 'nome', 3 => 'id',); // <-- Define as colunas para montar a tabela -- //

        $termo = addslashes($_POST['search']['value']);
        $order = addslashes($_POST['order'][0]['column']);
        $order = $coluna[$order];
        $dir = addslashes($_POST['order'][0]['dir']);
        $start = addslashes($_POST['start']);
        $length = addslashes($_POST['length']);
        
        $array = $this->user->getAllUsers($order, $dir, $start, $length, $termo); // <-- AJUSTA O as colunas para montar a tabela -- //
        $totalData = $array['totalRes'];
        if(!empty($array)){
            foreach ($array['listaUsers'] as $value) {
                $dado[3] = '<a href="'.BASE_URL.'/Usuarios/accessUser/'.$value['id'].'" class="btn btn-xs btn-danger">Acesso</a>'
                         . '<a href="'.BASE_URL.'/Usuarios/accessUser/'.$value['id'].'" class="btn btn-xs btn-default">Guias</a>'
                         . '<a href="'.BASE_URL.'/Usuarios/editUser/'.$value['id'].'" class="btn btn-xs btn-primary" '.$item.'>Editar</a>';
                
                $dado[2] = $value['nome'];
                
                if (!empty($value['retrato_foto'])){
                    $dado[1] = '<img src="'.BASE_URL.'/assets/images/fotoUser/'.$value['retrato_foto'].'" class="img-circle" alt="User Image" width="45" height="50">';
                }else{
                    $dado[1] = '<img src="'.BASE_URL.'/assets/images/fotoUser/default.jpg" class="img-circle" alt="User Image" width="45">';
                }
                
                $dado[0] = $value['id'];
                
                $dados[] = $dado;
            }
        }else{
            $totalData = 0;
            $totalFilter = 0;
            $dados = array();
        }
        $arrayJson = array(
            "recordsTotal" => intval($totalData),
            "recordsFiltered"=> intval($totalData),
            "data"=> $dados
        );
        echo json_encode($arrayJson);
        exit;
    }

    // FUNÇÃO QUE BUSCA DADOS DA EMPRESA PARA EXIBIÇÃO E EDIÇÃO
    public function ajaxGetEmpresa(){
        
        $emp = new Empresa;
        $id = addslashes($_POST['id']);

        $empresa = $emp->getEmpresa($id);

        $json = [
            'error'         => 0,
            'msg'           => 'ESTA FUNCIONANDO',
            'id'            => $id, 
            'razaoSocial'   => $empresa[0]['razaoSocial'],
            'nomeFantasia'  => $empresa[0]['nomeFantasia'],
            'cnpj'          => $empresa[0]['cnpj'],
            'cep'           => $empresa[0]['Cep'],
            'numeroEndereco'=> $empresa[0]['NumeroEndereco'],
            'endereco'      => $empresa[0]['Endereco'],
            'bairro'        => $empresa[0]['Bairro'],
            'cidade'        => $empresa[0]['Cidade'],
            'estado'        => $empresa[0]['Estado'],
            'siglaEstado'   => $empresa[0]['siglaEstado'],
            'telefoneFixo'  => $empresa[0]['TelefoneFixo'],
            'celular'       => $empresa[0]['Celular'],
            'idBairro'      => $empresa[0]['idBairro'],
            'idCidade'      => $empresa[0]['idCidade'],
            'idEndereco'    => $empresa[0]['idEndereco'],
            'idEstado'      => $empresa[0]['idEstado'],
            'idCep'         => $empresa[0]['idCep'],
            'idUser'        => $this->user->getUserDados()['id'],
            'abre'          => $emp->getAtd($id)[0]['abre'],
            'fecha'         => $emp->getAtd($id)[0]['fecha']
        ];

        echo json_encode($json);

    }

    // FUNÇÃO PARA ATUALIZAR OS DADOS DA EMPRESA
    public function ajaxUpdateEmp(){
        
        if(isset($_POST['id']) && !empty($_POST['id'])){
            $emp = new Empresa();

            if(isset($_POST['abre']) && is_array($_POST['abre'])){
                $data['abre'] = formataAtd($_POST['abre']);
                $data['fecha'] = formataAtd($_POST['fecha']);
            }            

            if(isset($_FILES) && !empty($_FILES)){
                $arq       = $_FILES['logo'];
                $novo_nome = md5($arq['name']).time().'.jpg';
                $tipo      = ['image/jpg','image/jpeg','image/png','image/gif'];
                if(in_array($arq['type'], $tipo)){
                    move_uploaded_file($arq['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/assets/images/imgGuia/logos/'.$novo_nome);
                }else{
                    $data['erro'] = 'Tipo de arquivo não permitido';
                }
                $data['logo'] = $novo_nome;
            }

            $data['id']         = addslashes($_POST['id']);
            $data['id_user']    = addslashes($_POST['id_user']);
            $data['idEndereco'] = addslashes($_POST['id_endereco']);
            $data['idCep']      = addslashes($_POST['id_cep']);
            $data['idEstado']   = addslashes($_POST['id_estado']);
            $data['idBairro']   = addslashes($_POST['id_bairro']);
            $data['fan']        = addslashes($_POST['nomeFantasia']);
            $data['tel']        = addslashes($_POST['telefone']);
            $data['cel']        = addslashes($_POST['celular']);
            $data['endereco']   = addslashes($_POST['endereco']);
            $data['cep']        = addslashes($_POST['cep']);
            $data['estado']     = addslashes($_POST['estado']);
            $data['bairro']     = addslashes($_POST['bairro']);
            $data['num']        = addslashes($_POST['numeroEndereco']);

            $emp->updateEmpresa($data);
            $json = [
                'erro' => 0,
                'msg' => 'Dados atualizados com sucesso'
            ];
            echo json_encode($json);
        }else{
            $json = [
                'erro' => 1,
                'msg' => 'Erro'
            ];

            echo json_encode($json);
        }

    }

}