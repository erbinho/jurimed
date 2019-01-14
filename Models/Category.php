<?php
namespace Models;

use \Core\Model;

class Category extends Model {
	public function getAllCategorias(){
		$array = array();
		$sql = "SELECT sis_cid_cat.id AS idCat, sis_cid_cat.cat AS nomeCat, sis_cid_cat.thumb AS icoCat FROM sis_cid_cat ORDER BY nomeCat ASC";
		$sql = $this->db->prepare($sql);
		$sql->execute();
		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
}