<?php

class AdvertisementManager {

    public function GetList() 
    {
        $tsql = "SELECT *
                    FROM advertisement
                    ORDER BY SortOrder";

        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetById($id) 
    {
        $tsql = "SELECT *
                FROM advertisement
                WHERE Id = ?";
        
        $database_Model = new Database();
        $params = array($id);
        $arr = $database_Model->GetList($tsql, $params);
        
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }

    public function Add($model) 
    {
        $tsql = "INSERT INTO advertisement
                (Name, Image, SortOrder, Description)
                VALUES(?, ?, ?, ?) ";

        $params = array($model['Name'], $model['Image'], $model['SortOrder'], $model['Description']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) 
    {
        $tsql = "UPDATE advertisement
                    SET Name = ?, Image = ?, SortOrder = ?, Description = ?	
                    WHERE Id = ? ";

        $params = array($model['Name'], $model['Image'], $model['SortOrder'], $model['Description'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function Delete($Id) 
    {
        $tsql = "DELETE FROM advertisement WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($model) 
    {
        $errors = array();
        if (empty($model['Name'])) {
            $errors[] = "Tên quảng cáo không được để trống!";
        }
        if (!is_numeric($model['SortOrder'])) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        return $errors;
    }

}

