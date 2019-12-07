<?php

class BookingManager {

    public function GetList($UserName) {
        
        $tsql = "SELECT A.*, IFNULL(B.BookingId, 0) AS IsConfirm   
                FROM booking A
                LEFT JOIN confirmbooking B 
                ON A.Id = B.BookingId AND B.UserName = ?
                ORDER BY IFNULL(B.BookingId, 0) ASC, A.Id Desc";
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetListDetail($BookingId)
    {
        $tsql = "SELECT A.*   
                FROM bookingdetails A
                Where BookingId = ?
                ORDER BY DayToSee";
        $params = array($BookingId);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetById($Id) {
        $tsql = "SELECT *
                        FROM booking 
                        WHERE `Id` = ? ";
        $params = array($Id);
        $database_Model = new Database();
        $arr = $database_Model->GetList($tsql, $params);
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }

    public function GetByBookingCode($BookingCode) {
        $tsql = "SELECT *
                        FROM booking 
                        WHERE `BookingCode` = ? ";
        $params = array($BookingCode);
        $database_Model = new Database();
        $arr = $database_Model->GetList($tsql, $params);
        if(count($arr) > 0)
            return $arr[0];
        return null;
    }

    public function Add($model) {
        $tsql = "INSERT INTO booking
                (BookingCode, Name, Email, Phone, Note)
                VALUES(?, ?, ?, ?, ?) ";
        $params = array($model['BookingCode'], $model['Name'], $model['Email'], $model['Phone'], $model['Note']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

     public function AddDetail($model) {
        $tsql = "INSERT INTO `bookingdetails`(`BookingId`, `ProductId`, `ProductImage`, `ProductName`, `ProductAddress`, `ProductLink`, `ProductPrice`, `DayToSee`)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?) ";
        $params = array($model['BookingId'], $model['ProductId'], $model['ProductImage'], $model['ProductName'], $model['ProductAddress'], $model['ProductLink'], $model['ProductPrice'], $model['DayToSee']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Edit($Id, $Name, $Email, $Phone, $Note) {
        $tsql = "UPDATE booking
                SET Name = ?, Email = ?, Phone = ?, Note = ?
                WHERE Id = ? ";
        $params = array($Name, $Email, $Phone, $Note, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }


    public function Confirm($BookingId, $UserName) {
        $tsql = "INSERT INTO confirmbooking(BookingId, UserName)
                 VALUES(?, ?)";
        $params = array($BookingId, $UserName);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function Delete($Id) {
        $tsql = " DELETE FROM booking WHERE Id = ? ";
        $params = array($Id, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetErrorsMessage($model) {
        $errors = array();
        if (empty($model['Name'])) {
            $errors[] = "Bạn chưa nhập họ tên.";
        }
        if (empty($model['Email'])) {
            $errors[] = "Bạn chưa nhập email.";
        }
        else if (!filter_var($model['Email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email không hợp lệ.";
        }
        if (empty($model['Phone'])) {
            $errors[] = "Bạn chưa nhập số điện thoại.";
        }
        return $errors;
    }

}

