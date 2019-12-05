<?php

class MailBoxManager {

    public function GetList() {        
        $tsql = "SELECT * 
                FROM mailbox 
                ORDER BY Id Desc";
        
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }


    public function Add($model) {
        $tsql = "INSERT INTO mailbox
                (Name, Email, Phone, Content)
                VALUES(?, ?, ?, ?) ";

        $params = array($model['Name'], $model['Email'], $model['Phone'], $model['Content']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($model) {
        $tsql = "UPDATE mailbox
                SET Name = ?, Email = ?, Phone = ?, Content = ?	
                WHERE Id = ? ";

        $params = array($model['Name'], $model['Email'], $model['Phone'], $model['Content'], $model['Id']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "DELETE mailbox WHERE Id = ? ";

        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($model) {
        $errors = array();
        if (empty($model['Name'])) {
            $errors[] = "Họ tên không được để trống.";
        }
        if (empty($model['Email'])) {
            $errors[] = "Email không được để trống.";
        }
        else if (!filter_var($model['Email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ.";
        }
        if (empty($model['Phone'])) {
            $errors[] = "Điện thoại không được để trống.";
        }
        if (empty($model['Content'])) {
            $errors[] = "Lời nhắn không được để trống..";
        }
        return $errors;
    }

}

