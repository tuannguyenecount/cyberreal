<?php

class SlideManager {

    public function GetList() 
    {
        $tsql = "SELECT *
                    FROM slide
                    ORDER BY SortOrder";

        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListShow() 
    {  
        $tsql = "SELECT *
                    FROM slide
                    WHERE Status = 1
                    ORDER BY SortOrder";    
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetById($id) 
    {
        $tsql = "SELECT *
                FROM slide
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
        $tsql = "INSERT INTO slide
                (Image, SortOrder, Status)
                VALUES(?, ?, ?) ";

        $params = array($model['Image'], $model['SortOrder'], $model['Status']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) 
    {
        $tsql = "UPDATE slide
                    SET Image = ?, Status = ?, SortOrder = ?	
                    WHERE Id = ? ";

        $params = array($model['Image'], $model['Status'], $model['SortOrder'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Confirm($Id) 
    {
        $tsql = "UPDATE slide
                    SET Status = 1   
                    WHERE Id = ? ";

        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function UnConfirm($Id) 
    {
        $tsql = "UPDATE slide
                    SET Status = 0   
                    WHERE Id = ? ";

        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) 
    {
        $tsql = "DELETE FROM slide WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

}

