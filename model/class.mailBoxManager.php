<?php

class MailBoxManager {

    public function GetList($UserName) {        
        $tsql = "SELECT A.*, IFNULL(B.MailBoxId, 0) AS IsConfirm   
                FROM mailbox A
                LEFT JOIN confirmmailbox B 
                ON A.Id = B.MailBoxId AND B.UserName = ?
                ORDER BY IFNULL(B.MailBoxId, 0) ASC, A.Id Desc";
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
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

    public function Confirm($UserName, $MailBoxId)
    {
        $tsql = "INSERT INTO confirmmailbox(UserName, MailBoxId)
                VALUES(?, ?)";

        $params = array($UserName,$MailBoxId);
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
