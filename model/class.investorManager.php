<?php
class InvestorManager {

    public function GetList() {
        $tsql = "SELECT * FROM investor ORDER BY SortOrder";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }
    
    public function GetById($Id) {
        $tsql = "SELECT * FROM investor WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        $arr = $database_Model->GetList($tsql, $params);
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }

    public function Add($model) {
        $tsql = "INSERT INTO investor(Logo, SortOrder) VALUES(?, ?) "; 
        $params = array($model['Logo'], $model['SortOrder']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) {
        $tsql = "UPDATE investor SET Logo = ?, SortOrder = ? WHERE Id = ? ";
        $params = array($model['Logo'], $model['SortOrder'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "DELETE FROM investor WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($SortOrder) {
        $errors = array();
        if (!is_numeric($SortOrder)) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        return $errors;
    }

}
