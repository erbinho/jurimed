<?php
namespace Models;

use \Core\Model;
use \Models\Permissions;

class Company extends Model {

    public function getRespEmpresa($idUser){
        $array = array(0 => array('raz' => 'Nenhuma Empresa'));
        $sql = "SELECT sis_emp.id, sis_emp.raz FROM sis_res INNER JOIN sis_emp ON sis_emp.id = sis_res.cnpj 
                WHERE sis_res.`status` = 'a' AND sis_res.cpf = :idUser ORDER BY sis_res.pos ASC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':idUser', $idUser);
        $sql->execute();
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }
        return $array;
    }
}
	// == ID DO USUARIO LOGADO == //

