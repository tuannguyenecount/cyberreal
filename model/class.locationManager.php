<?php

class LocationManager {

    public function GetDistrictsByProvince($province) {
        
        $tsql = "SELECT `district`.* 
                 FROM `district` 
                 INNER JOIN `province` 
                 ON `district`.`_province_id` = `province`.`id` AND `province`.`id` = ? ";
        $params = array($province);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetWardsByDistrict($district) {
        
        $tsql = "SELECT `ward`.* 
                 FROM `ward` 
                 INNER JOIN `district` 
                 ON `ward`.`_district_id` = `district`.`id` AND `district`.`id` = ? ";
        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetStreetsByDistrict($district) {
        
        $tsql = "SELECT `street`.* 
                 FROM `street` 
                 INNER JOIN `district` 
                 ON `street`.`_district_id` = `district`.`id` AND `district`.`id` = ? ";
        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetStreetsOnProductByDistrict($district) {
        
        $tsql = "SELECT DISTINCT `street`.* 
                 FROM `street` 
                 INNER JOIN `product`
                 ON `street`.`_name` = `product`.`Street`
                 INNER JOIN `district` 
                 ON `street`.`_district_id` = `district`.`id` AND `district`.`id` = ? 
                 
                 ";
        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetListStreetNameByDistrict($district){
         $tsql = "SELECT DISTINCT _name FROM `street` 
                    WHERE  `_district_id` = ? ";

        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetListArray($tsql, $params,PDO::FETCH_COLUMN);
    }

    public function CheckExistStreetName($streetName){
        $tsql = "SELECT COUNT(*) AS CNT FROM `street` 
                    WHERE  `_name` = ? ";

        $params = array($streetName);
        $database_Model = new Database();
        $result = (int)$database_Model->ExecuteScalar($tsql, $params);
        return $result > 0;
    }

}

