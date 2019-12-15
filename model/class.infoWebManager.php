<?php

class InfoWebManager {
    
    public function Get()
    {
        $tsql = "SELECT *
                FROM infoweb
                LIMIT 0,1";
        $database_Model = new Database();
        return $database_Model->GetList($tsql)[0];
    }

    public function Edit($model) {
        $tsql = "UPDATE infoweb 
                 Set WebName = ?, Logo = ?, Phone = ?, Zalo = ?, Email = ?, Address = ?,
                 Fanpage = ?, GoogleMap = ?, CopyRight = ?, ViTriDangHot = ?, SeoTitle = ?, SeoDescription = ?, SeoKeyword = ? ";
        $params = array($model['WebName'], $model['Logo'], $model['Phone'], $model['Zalo'], $model['Email'], $model['Address'], $model['Fanpage'], $model['GoogleMap'], $model['CopyRight'], $model['ViTriDangHot'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

}

