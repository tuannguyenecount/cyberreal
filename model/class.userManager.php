<?php

class UserManager {
    
    public function AdminSignIn($userName, $passwordHash)
    {
        $tsql = "SELECT *
                FROM user
                WHERE UserName = ? And PasswordHash = ? And Role = 'Quản Trị Viên' ";
        $params = array($userName, $passwordHash);
        $database_Model = new Database();
        $cnt =  count($database_Model->GetList($tsql, $params));
        return $cnt > 0;
    }

    public function EditorSignIn($userName, $passwordHash)
    {
        $tsql = "SELECT *
                FROM user
                WHERE UserName = ? And PasswordHash = ? And Role = 'Biên Tập Viên' ";
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
   
    public function Add($model) {
        $tsql = "INSERT INTO user
                (UserName, PasswordHash, FullName, Email, Phone, Avatar, Role)
                VALUES(?, ?, ?, ?, ?, ?, ?) ";
        $params = array($model['UserName'], $model['PasswordHash'], $model['FullName'], $model['Email'], $model['Phone'], $model['Avatar'], $model['Role']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }
    
    public function IsInRole($UserName, $Role)
    {
        $tsql = "SELECT *
                FROM user
                WHERE UserName = ? And Role = ? ";
        $params = array($UserName, $Role);
        $database_Model = new Database();
        $cnt =  count($database_Model->GetList($tsql, $params));
        return $cnt > 0;
    }


    public function EditInformation($model) {
        $tsql = "UPDATE user
                SET FullName = ?,  Email = ?, Phone = ?, Avatar = ?, Role = ?
                WHERE UserName = ? ";
        $params = array($model['FullName'], $model['Email'], $model['Phone'], $model['Avatar'], $model['Role'], $model['UserName']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function ChangePassword($UserName, $NewPassword) {
        $tsql = "UPDATE user
                SET PasswordHash = ?
                WHERE UserName = ? ";
        $params = array($NewPassword, $UserName);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($UserName) {
        $tsql = "DELETE FROM user WHERE UserName = ? ";
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($UserName, $Password) {
        $errors = array();
        if (empty($UserName)) {
            $errors[] = "Bạn chưa nhập tài khoản!";
        }
        if (empty($Password)) {
            $errors[] = "Bạn chưa nhập mật khẩu!";
        }
        return $errors;
    }

}

