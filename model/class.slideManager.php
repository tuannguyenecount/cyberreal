<?php

class SlideManager {

    public function GetList($status = null) {
        
        if ($status == null) {
            $tsql = "SELECT *
                            FROM slide
                            ORDER BY Order";
        } else {
            $tsql = "SELECT *
                            FROM slide
                            WHERE Status = $status
                            ORDER BY Order";
        }
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetById($id) {
        $tsql = "SELECT *
                FROM slide
                WHERE Id = ?";
        $params = array($id);
        $database_Model = new Database();
        $arr = $database_Model->GetList($tsql, $params);
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }

    public function Add($Title, $Description, $Image, $Status, $Order) {
        $tsql = "INSERT INTO slide
                (Title, Description, Image, Status, Order)
                VALUES(?, ?, ?, ?, ?, ?) ";

        $params = array($Title, $Description, $Image, $Price, $Status, $Order);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($Id, $Title, $Description, $Image, $Status, $Order) {
        $tsql = "UPDATE slide
                SET Title = ?, Description = ?, Image = ?, Status = ?, Order = ?	
                WHERE Id = ? ";

        $params = array($Title, $Description, $Image, $Status, $Order, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "DELETE slide WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($Title, $Status, $Order) {
        $errors = array();
        if (empty($Title)) {
            $errors[] = "Tên hình không được để trống!";
        }
        if (!is_numeric($Order)) {
            $errors[] = "Thứ tự phải là 1 con số!";
        }
        if (!is_numeric($Status) && $Status != 0 && $Status != 1) {
            $errors[] = "Trạng thái chỉ có giá trị là 0 hoặc 1!";
        }
        return $errors;
    }

}

