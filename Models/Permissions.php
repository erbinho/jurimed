<?php

namespace Models;

use \Core\Model;

class Permissions extends Model {
    public function getPermissionGroupName($id_permission){
        $sql = "SELECT name FROM sis_perm_group WHERE id = :id_permission";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_permission', $id_permission);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            return $data['name'];
        }else{
            return '';
        }
    }

    public function getPermissionParamsName($id_params){
        $sql = "SELECT id_perm_categ, name, slug FROM sis_perm_params WHERE id = :id_params";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_params', $id_params);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            return $data;
        }else{
            return '';
        }
    }

    public function getPermissions($id_permission){
        $array = array();
        $sql = "SELECT id_perm_params FROM sis_perm WHERE id_perm_group = :id_permission";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_permission', $id_permission);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();
            foreach($data as $data_item){
                $ids[] = $data_item['id_perm_params'];
            }
            $sql = "SELECT slug FROM sis_perm_params WHERE id IN (".implode(',',$ids).")";
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0){
                $data = $sql->fetchAll();
                foreach($data as $data_item){
                    $array[] = $data_item['slug'];
                }
            }
        }
        return $array;
    }

    public function getAllGroups(){
        $array = array();

        $sql = "SELECT sis_perm_group.*, (
                    SELECT count(sis_users.id_permission) FROM sis_users WHERE sis_users.id_permission = sis_perm_group.id
                ) as total_users FROM sis_perm_group ORDER BY sis_perm_group.name ASC";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function getAllParams(){
        $array = array();

        $sql = "SELECT sis_perm_params.id, sis_perm_categ.id AS idCateg, sis_perm_categ.categoria, sis_perm_params.`name`, sis_perm_params.slug 
        FROM sis_perm_params INNER JOIN sis_perm_categ ON sis_perm_params.id_perm_categ = sis_perm_categ.id";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }

    public function addGroup($name){
        $array = array();
        $sql = "INSERT INTO sis_perm_group (name) VALUES (:name)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':name', $name);
        $sql->execute();
        
        return $this->db->lastInsertId();
    }


    public function addParams($id_params_categ, $name, $slug){
        $array = array();
        $sql = "INSERT INTO sis_perm_params (id_perm_categ, name, slug) VALUES (:id_categ, :name, :slug)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_categ', $id_params_categ);
        $sql->bindValue(':name', $name);
        $sql->bindValue(':slug', $slug);
        $sql->execute();
    }


    public function editGroupName($id, $newName){
        $sql = "UPDATE sis_perm_group SET name = :name WHERE id = :id_group";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_group', $id);
        $sql->bindValue(':name', $newName);
        $sql->execute();
    }

    public function editParams($id, $id_categ, $newName){
        $sql = "UPDATE sis_perm_params SET id_perm_categ = :id_categ, name = :name WHERE id = :id_params";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_params', $id);
        $sql->bindValue(':id_categ', $id_categ);
        $sql->bindValue(':name', $newName);
        $sql->execute();
    }

    public function deleteGroup($id_group){
        $sql = "SELECT id FROM sis_users WHERE id_permission = :id_group";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_group', $id_group);
        $sql->execute();

        if($sql->rowCount() === 0){
            $sql = "DELETE FROM sis_perm WHERE id_perm_group = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_group', $id_group);
            $sql->execute();

            $sql = "DELETE FROM sis_perm_group WHERE id = :id_group";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_group', $id_group);
            $sql->execute();

        }
    }
    public function clearLinkPerm($id){
        $sql = "DELETE FROM sis_perm WHERE id_perm_group = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function linkParamToGroup($id_item, $id_group){
        $array = array();
        $sql = "INSERT INTO sis_perm (id_perm_group, id_perm_params) VALUES (:id_group, :id_item)";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_group', $id_group);
        $sql->bindValue(':id_item', $id_item);
        $sql->execute();
    }

    public function getAllCategParams(){
        $array = array();

        $sql = "SELECT * FROM sis_perm_categ";
        $sql = $this->db->query($sql);
        if($sql->rowCount() > 0){
            $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
        return $array;
    }
}