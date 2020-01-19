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

    public function GetListByUserCreated($UserName)
    {
        $tsql = "SELECT *
                    FROM new 
                    WHERE UserCreated = ?
                    ORDER BY Id desc";  
        $database_Model = new Database();
        $params = array($UserName);
        return $database_Model->GetList($tsql, $params);
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

    public function GetListByTag($tag, $skip, $take)
    {
        $params = array();
        $tsql = "SELECT *
                    FROM new 
                    WHERE Status = 1 AND Tags LIKE ?
                    ORDER BY Id desc LIMIT $skip, $take"; 
        $database_Model = new Database();
        $params = array("%".$tag.",%");
        return $database_Model->GetList($tsql, $params);
    }

    public function GetListArticleSameTag($productId, $tags)
    {
        $tagArray = explode(",",$tags);
        for($i = 0; $i < count($tagArray); $i++)
        {
            $tagArray[$i] = "%".$tagArray[$i].",%";
        }
        $whereTags = " WHERE Status = 1 AND Id <> ? AND ( ";

        foreach($tagArray as $tagItem)
        {
            $whereTags .= " (Tags LIKE ?) OR ";
        }

        $whereTags .= " 1 <> 1 ) ";

        $tsql = "SELECT *
                        FROM new ".$whereTags."
                        ORDER BY Id desc ";


        $database_Model = new Database();
        $params = array($productId);
        $params = array_merge($params, $tagArray);
        $lst = $database_Model->GetList($tsql, $params);
        return $lst;
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

    public function GetTopNew($take)
    {
        $params = array();
        $tsql = "SELECT *
                FROM new 
                WHERE Status = 1
                ORDER BY Id desc LIMIT 0,$take";  
        
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

    public function CountArticleNotShow()
    {
        $tsql = "SELECT COUNT(*) as CNT FROM new WHERE Status = 0 ";
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql);
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

    public function GetByTitle($Title)
    {
        $tsql = "SELECT * from new WHERE Title = ? ";
        $database_Model = new Database();
        $params = array($Title);
        $rows = $database_Model->GetList($tsql, $params);
        if(count($rows) > 0)
        {
            return $rows[0];
        }
        return null;
    }

    public function AddTemp($Title, $UserCreated)
    {
        $tsql = "INSERT INTO new(Title, UserCreated) VALUES (?,?)";
        $database_Model = new Database();
        $params = array($Title, $UserCreated);
        return $database_Model->Execute($tsql, $params);
    }

	public function Add($model)
	{
        $tsql ="INSERT INTO new(Title, Description, Image, Content, UserCreated, Status, Alias, SeoTitle, SeoDescription, SeoKeyword, Tags)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";   
        $params = array($model['Title'], $model['Description'], $model['Image'], $model['Content'], $model['UserCreated'], $model['Status'], $model['Alias'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword'], $model['Tags']);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Edit($model)
	{
        $tsql ="UPDATE new
                SET	Title = ?, Description = ?, Image = ?, Content = ?, 
                    Status = ?, Alias = ?, SeoTitle = ?, SeoDescription = ?, SeoKeyword = ?, Tags = ?
                WHERE Id = ? ";   
        $params = array($model['Title'], $model['Description'], $model['Image'], $model['Content'], $model['Status'], $model['Alias'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword'], $model['Tags'], $model['Id']);
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

    public function UpdateContent($Id, $content)
    {
        try 
        {
            $tsql = "UPDATE `new` SET `Content` = ? WHERE `Id` = ? ";
            $params = array($content, $Id);  
            $database_Model = new Database();
            $result = $database_Model->Execute($tsql, $params);
        }
        catch (PDOException $e) {
          echo "DataBase Error: ".$e->getMessage();
          exit();
        } catch (Exception $e) {
          echo "General Error: ".$e->getMessage();
          exit();
        }
        return $result;
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

