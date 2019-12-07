<?php

class PopupManager {

    public function Get() 
    {
        $tsql = "SELECT *
                    FROM popup
                    LIMIT 0, 1";
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql);
        return count($rows) > 0 ? $rows[0] : null;
    }

    public function Edit($model) 
    {
        $tsql = "UPDATE popup
                    SET Content = ?, IsShow = ?, Timeout = ? ";
        $params = array($model['Content'], $model['IsShow'], $model['Timeout']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

}

