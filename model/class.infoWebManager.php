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
                 Set WebName = ?, Logo = ?, Phone = ?, Email = ?, Address = ?,
                 Fanpage = ?, GoogleMap = ?, CopyRight = ?, SeoTitle = ?, SeoDescription = ?, SeoKeyword = ? ";
        $params = array($model['WebName'], $model['Logo'], $model['Phone'], $model['Email'], $model['Address'], $model['Fanpage'], $model['GoogleMap'], $model['CopyRight'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

}

