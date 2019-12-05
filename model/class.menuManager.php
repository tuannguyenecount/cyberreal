<?php 
class MenuManager
{
    public function GetList()
    {
        $tsql = "SELECT * FROM menu ORDER BY SortOrder";  
        $params = array();
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

	public function GetListByParentId($MenuParentId = null)
	{
        $tsql = "SELECT *
                    FROM menu 
                    Where MenuParentId = ?
                    ORDER BY SortOrder";  
        $params = array($MenuParentId);
        $database_Model = new Database();
	    return $database_Model->GetList($tsql, $params);
	}

    public function GetListMenuShow()
    {
        $tsql = "SELECT *
                    FROM menu 
                    Where IsShow = 1 ";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListMenuShowByParentIsNull()
    {
        $tsql = "SELECT *
                    FROM menu 
                    Where IsShow = 1 AND MenuParentId is null
                    ORDER BY SortOrder";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListMenuShowByParentId($MenuParentId)
    {
        $tsql = "SELECT *
                    FROM menu 
                    Where IsShow = 1 AND MenuParentId = ?
                    ORDER BY SortOrder";  
        $params = array($MenuParentId);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
	
    public function GetById($Id)
    {
        $tsql = "SELECT *
                FROM menu
                WHERE Id = ? ";  
        $params = array($Id);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) > 0 ? $rows[0] : null;
    }

	public function GetMenuShowByAlias($alias)
	{
        $tsql = "SELECT *
                FROM menu
                WHERE IsShow = 1 AND Alias = ?";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) > 0 ? $rows[0] : null;
	}

	public function Add($model)
	{
        $tsql ="INSERT INTO menu(Name, URL, SortOrder, IsShow, MenuParentId)
                VALUES(?, ?, ?, ?, ?) ";   
        $params = array($model['Name'], $model['URL'], $model['SortOrder'], $model['IsShow'], $model['MenuParentId']);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Edit($model)
	{
        $tsql ="UPDATE menu
                SET	Name = ?, URL = ?, SortOrder = ?, 
                    IsShow = ?, MenuParentId = ?
                WHERE Id = ? ";   
        $params = array($model['Name'], $model['URL'], $model['SortOrder'], $model['IsShow'], $model['MenuParentId'], $model['Id']);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Delete($Id)
	{
        $tsql = "DELETE FROM menu WHERE Id = ? ";  
        $params = array($Id);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function GetErrorsMessage($Name)
	{
        $errors = array();
        if(empty($Name))
        {
            $errors[] = "Tên menu không được để trống!";
        }
        return $errors;
	}
}

