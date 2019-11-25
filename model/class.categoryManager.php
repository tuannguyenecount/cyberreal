<?php
class CategoryManager {

    public function GetList() {
        $tsql = "SELECT *
                    FROM category
                    Order By Sort_Order";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetByName($Name) {
        $tsql = "SELECT *
              		FROM category
            		WHERE Name = ? ";
        $params = array($Name);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }

    public function GetByAlias($Alias) {
        $tsql = "SELECT *
              		FROM category
            		WHERE Alias = ? ";
        $params = array($Alias);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }

    public function GetById($Id) {
        $tsql = "SELECT *
              		FROM category
            		WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }

    public function Add($Name, $Alias, $ParentId, $Sort_Order) {
        $tsql = "INSERT INTO category
                (Name, Alias, ParentId, Sort_Order)
                VALUES(?, ?, ?, ?) ";
                
        $params = array($Name, $Alias, $ParentId, $Sort_Order);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($Id, $Name, $Alias, $ParentId, $Sort_Order) {
        $tsql = "UPDATE category
                SET Name = ?, Alias = ?, ParentId = ?, Sort_Order = ?
                WHERE Id = ? ";
        $params = array($Name, $Alias, $ParentId, $Sort_Order, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "UPDATE category Set IsDeleted = 1 WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($Name, $Alias, $Sort_Order) {
        $errors = array();
        if (empty($Name)) {
            $errors[] = "Tên không được để trống!";
        }
        if (empty($Alias)) {
            $errors[] = "Bí danh không được để trống!";
        }
        if (!is_numeric($Sort_Order)) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        return $errors;
    }

}
