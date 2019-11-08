<?php

class UserManager {
    
    public function SignIn($userName, $passwordHash)
    {
        $tsql = "SELECT *
                FROM user
                WHERE IsDeleted = 0 AND UserName = ? And PasswordHash = ? ";
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
                WHERE IsDeleted = 0
                ORDER BY CreatedDate desc";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetById($id) {
        $tsql = "SELECT *
                FROM user
                WHERE IsDeleted = 0 AND Id = ?";
        $params = array($id);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }
    
    public function GetByUserName($UserName) {
        $tsql = "SELECT *
                FROM user
                WHERE IsDeleted = 0 AND UserName = ?";
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params)[0];
    }
   
    public function Add($Id, $UserName, $PasswordHash, $FullName, $Avatar, $Email, $Phone) {
        $tsql = "INSERT INTO user
                (Id, UserName, PasswordHash, FullName, Avatar, Email, Phone, CreatedDate)
                VALUES(?, ?, ?, ?, ?, ?, ?, NOW()) ";
        $params = array($Id, $UserName, $PasswordHash, $FullName, $Avatar, $Email, $Phone);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function IsInRole($userId, $roleId)
    {
        $tsql = "SELECT *
                FROM userrole
                WHERE IsDeleted = 0 AND UserId = ? And RoleId = ? ";
        $params = array($userId, $roleId);
        $database_Model = new Database();
        $cnt =  count($database_Model->GetList($tsql, $params));
        return $cnt > 0;
    }
    
    public function AddToRole($userId, $roleId)
    {
        $tsql = "INSERT INTO userrole
                (UserId, RoleId)
                VALUES(?, ?) ";
        $params = array($userId, $roleId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function DeleteFromRole($userId, $roleId)
    {
        $tsql = "DELETE userrole
                 WHERE UserId = ? And RoleId = ? ";
        $params = array($userId, $roleId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function EditInformation($Id, $FullName, $Avatar, $Email, $Phone) {
        $tsql = "UPDATE user
                SET FullName = ?, Avatar = ?, Email = ?, Phone = ? 
                WHERE IsDeleted = 0 And Id = ? ";
        $params = array($FullName, $Avatar, $Email, $Phone, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = "UPDATE user Set IsDeleted = 1 WHERE Id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($UserName, $PasswordHash, $FullName) {
        $errors = array();
        if (empty($UserName)) {
            $errors[] = "Bạn chưa nhập tài khoản!";
        }
        if (empty($PasswordHash)) {
            $errors[] = "Bạn chưa nhập mật khẩu!";
        }
        if (empty($FullName)) {
            $errors[] = "Bạn chưa nhập họ tên!";
        }
        return $errors;
    }

}

