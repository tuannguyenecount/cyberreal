<?php

class LocationManager {

    public function GetDistrictIsGhim()
    {
        $tsql = "SELECT `district`.* 
                 FROM `district` 
                 WHERE `district`.`ghim` = 1 
                 ORDER By sortorder";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function UpdateSortOrderDistrict($districtId, $sortOrder)
    {
        $tsql = "UPDATE `district` SET `sortorder` = ? WHERE id = ? ";
        $params = array($sortOrder, $districtId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

     public function UpdateIntroduce($districtId, $introduce)
    {
        $tsql = "UPDATE `district` SET `introduce` = ? WHERE id = ? ";
        $params = array($introduce, $districtId);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }


    public function GhimDistrict($Id)
    {
        $tsql = "UPDATE `district` SET `ghim` = 1 WHERE id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function RemoveGhimDistrict($Id)
    {
        $tsql = "UPDATE `district` SET `ghim` = 0 WHERE id = ? ";
        $params = array($Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetDistrictByAlias($alias) {
        
        $districts = $this->GetDistrictsByProvince(1);
        $result = array();
        foreach($districts as $item)
        {
            if(strtolower(vn_to_str($item['_name'])) == $alias)
            {
                $result = $item;
                break;
            }
        }
        return $result;
    }

    public function GetStreetByAlias($alias) {
        
        $streets = $this->GetStreetsOnProduct();
        $result = array();
        foreach($streets as $item)
        {
            if(strtolower(vn_to_str($item['Street'])) == $alias)
            {
                $result = $item;
                break;
            }
        }
        return $result;
    }

    public function GetDirectionByAlias($alias) { 
        $tsql = "SELECT * 
                 FROM `direction` 
                 WHERE `Alias` = ? ";
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) > 0 ? $rows[0] : null;
    }

    public function GetDistrictsByProvince($province) {

        $tsql = "SELECT DISTINCT `district`.* 
                 FROM `district` 
                 INNER JOIN `province` 
                 ON `district`.`_province_id` = `province`.`id` AND `province`.`id` = ? 
                 ORDER By `district`.`sortorder` ";
        $params = array($province);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetDistrictById($Id) {
        
        $tsql = "SELECT `district`.* 
                 FROM `district` 
                 WHERE `district`.`id` = ? ";
        $params = array($Id);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) > 0 ? $rows[0] : null;
    }

    public function GetWardsByDistrict($district) {
        
        $tsql = "SELECT DISTINCT `ward`.* 
                 FROM `ward` 
                 INNER JOIN `district` 
                 ON `ward`.`_district_id` = `district`.`id` AND `district`.`id` = ? ";
        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetStreetsByDistrict($district) {
        
        $tsql = "SELECT DISTINCT `street`.* 
                 FROM `street` 
                 INNER JOIN `district` 
                 ON `street`.`_district_id` = `district`.`id` AND `district`.`id` = ? ";
        $params = array($district);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetStreetsByProvince($province) {
        
        $tsql = "SELECT DISTINCT `street`.* 
                 FROM `street` 
                 INNER JOIN `province` 
                 ON `street`.`_province_id` = `province`.`id` AND `province`.`id` = ? ";
        $params = array($province);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }

    public function GetDistrictsOnProduct() {
        
        $tsql = "SELECT DISTINCT `district`.* 
                 FROM `district` 
                 INNER JOIN `product`
                 ON `district`.`id` = `product`.`District` AND `product`.Status = 1
                 ORDER BY `district`.`sortorder`
                 ";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetStreetsOnProduct() {
        
        $tsql = "SELECT DISTINCT Street
                 FROM `product` 
                 WHERE `product`.Status = 1
                 ";
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetStreetsOnProductByDistrict($district) {
        
        $tsql = "SELECT DISTINCT`street`.* 
                 FROM `street` 
                 INNER JOIN `product`
                 ON `street`.`_name` = `product`.`Street` AND `product`.Status = 1
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

