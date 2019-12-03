<?php 
class NewManager
{
	public function GetList()
	{
        $tsql = "SELECT *
                    FROM new 
                    ORDER BY Id desc";  
        $database_Model = new Database();
	    return $database_Model->GetList($tsql);
	}

    public function GetListArticleShow($skip, $take)
    {
        $params = array();
        $tsql = "SELECT *
                    FROM new 
                    WHERE Status = 1
                    ORDER BY Id desc LIMIT $skip, $take"; 
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetTotalPage($take)
    {
        $params = array();
        $tsql = "SELECT CEIL(COUNT(*) / $take) AS CNT
                    FROM new 
                    WHERE Status = 1"; 
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql);
    }

    public function GetTop10New()
    {
        $params = array();
        $tsql = "SELECT *
                FROM new 
                WHERE Status = 1
                ORDER BY Id desc LIMIT 0,10";  
        
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
	public function CountAll($status = null)
	{
        $params = array();
        if($status == null)
            $tsql = "SELECT COUNT(*) as CNT FROM new";   
        else 
        {
            $tsql = "SELECT COUNT(*) as CNT FROM new WHERE Status = ? ";
            $params = array($status);
        }
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params);
	}
	
    public function GetById($id)
    {
        $tsql = "SELECT *
                FROM new
                WHERE id = ? ";  
        $params = array($id);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) == 1 ? $rows[0] : null;
    }

	public function GetByAlias($alias)
	{
        $tsql = "SELECT *
                FROM new
                WHERE Alias = ?";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) == 1 ? $rows[0] : null;
	}

    public function GetArticleShowByAlias($alias)
    {
        $tsql = "SELECT *
                FROM new
                WHERE Alias = ? And Status = 1";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) == 1 ? $rows[0] : null;
    }

	public function CheckExistsTitle($title)
	{
        $tsql = "SELECT COUNT(*) AS CNT
                FROM new
                WHERE Title = ? ";  
        $params = array($title);
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

	public function CheckExistsAlias($alias)
	{
        $tsql = "SELECT COUNT(*) AS CNT
                FROM new
                WHERE Alias = ? ";  
        $params = array($alias);
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

	public function Add($model)
	{
        $tsql ="INSERT INTO new(Title, Description, Content, UserCreated, Status, Alias)
                VALUES(?, ?, ?, ?, ?, ?) ";   
        $params = array($model['Title'], $model['Description'], $model['Content'], $model['UserCreated'], $model['Status'], $model['Alias']);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Edit($model)
	{
        $tsql ="UPDATE new
                SET	Title = ?, Description = ?, Content = ?, 
                    Status = ?, Alias = ?
                WHERE Id = ? ";   
        $params = array($model['Title'], $model['Description'], $model['Content'], $model['Status'], $model['Alias'], $model['Id']);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Delete($id)
	{
        $tsql = "DELETE FROM new WHERE Id = ? ";  
        $params = array($id);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function GetErrorsMessage($Title, $Alias, $checkexiststitle, $checkexistsalias)
	{
        $errors = array();
        if(empty($Title))
        {
            $errors[] = "Tiêu đề không được để trống!";
        }
        else if($checkexiststitle && $this->CheckExistsTitle($Title))
        {
            $errors[] = "Tiêu đề đã tồn tại. Bạn hãy đặt tiêu đề khác cho bài viết.";
        }
        if(empty($Alias))
        {
            $errors[] = "Bí danh không được để trống.";
        }
        else if($checkexistsalias && $this->CheckExistsAlias($Alias))
        {
            $errors[] = "Bí danh đã tồn tại. Bạn hãy đặt bí danh khác cho bài viết.";
        }
        return $errors;
	}
}
