<?php

class DirectionManager {

    public function GetList() {        
        $tsql = "SELECT * FROM direction ORDER BY Sort_Order";
        
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }


    public function Add($model) {
        $tsql = "INSERT INTO direction
                (Name, Sort_Order)
                VALUES(?, ?) ";

        $params = array($model['Name'], $model['Sort_Order']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) {
        $tsql = "UPDATE direction
                SET Name = ?,Sort_Order = ?	
                WHERE Id = ? ";

        $params = array($model['Name'], $model['Sort_Order'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "DELETE direction WHERE Id = ? ";

        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($model) {
        $errors = array();
        if (empty($model['Name'])) {
            $errors[] = "Tên hướng không được để trống!";
        }
        if (!is_numeric($model['Sort_Order'])) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        return $errors;
    }

}

