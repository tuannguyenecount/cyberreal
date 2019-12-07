<?php

class UserManager {
    
    public function SignIn($userName, $passwordHash)
    {
        $tsql = "SELECT *
                FROM user
                WHERE UserName = ? And PasswordHash = ? ";
        $params = array($userName, $passwordHash);
        $database_Model = new Database();
        $cnt =  count($database_Model->GetList($tsql, $params));
        return $cnt > 0;
    }
    
    public function SignOut()
    {
        unset($_SESSION['UserLogged']);
    }

    public function GetList() {
        $tsql = "SELECT *
                FROM user
                ORDER BY CreatedDate desc";
                
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }
    
    public function GetByUserName($UserName) {
        $tsql = "SELECT *
                FROM user
                WHERE UserName = ?";

        $database_Model = new Database();
        $params = array($UserName);
        $arr = $database_Model->GetList($tsql, $params);
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }
   
    public function Add($UserName, $PasswordHash, $FullName, $Email, $Phone) {
        $tsql = "INSERT INTO user
                (UserName, PasswordHash, FullName, Email, Phone)
                VALUES(?, ?, ?, ?, ?) ";
        $params = array($UserName, $PasswordHash, $FullName, $Email, $Phone);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function IsInRole($UserName, $RoleId)
    {
        $tsql = "SELECT *
                FROM userrole
                WHERE UserName = ? And RoleId = ? ";
        $params = array($UserName, $RoleId);
        $database_Model = new Database();
        $cnt =  count($database_Model->GetList($tsql, $params));
        return $cnt > 0;
    }
    
    public function AddToRole($UserName, $RoleId)
    {
        $tsql = "INSERT INTO userrole
                (UserName, RoleId)
                VALUES(?, ?) ";
        $params = array($UserName, $RoleId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function DeleteFromRole($UserName, $RoleId)
    {
        $tsql = "DELETE userrole
                 WHERE UserName = ? And RoleId = ? ";
        $params = array($UserName, $RoleId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function EditInformation($model) {
        $tsql = "UPDATE user
                SET FullName = ?,  Email = ?, Phone = ? 
                WHERE UserName = ? ";
        $params = array($model['FullName'], $model['Email'], $model['Phone'], $model['UserName']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($UserName) {
        $tsql = "DELETE FROM user WHERE UserName = ? ";
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($UserName, $PasswordHash) {
        $errors = array();
        if (empty($UserName)) {
            $errors[] = "Bạn chưa nhập tài khoản!";
        }
        if (empty($PasswordHash)) {
            $errors[] = "Bạn chưa nhập mật khẩu!";
        }
        return $errors;
    }

}

