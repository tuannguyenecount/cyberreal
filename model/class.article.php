<?php 
class Article
{
	public function GetList($status = null)
	{
            $params = array();
            if($status == null)
            {
                $tsql = "SELECT *
                        FROM Article 
                        WHERE IsDeleted = 0
                        ORDER BY Id desc";  
            }
            else 
            {
                 $tsql = "SELECT *
                        FROM Article 
                        WHERE IsDeleted = 0 AND Status = ?
                        ORDER BY Id desc"; 
                 $params = array($status);
            }
            $database_Model = new Database();
	    return $database_Model->GetList($tsql, $params);
	}
	public function CountAll($status = null)
	{
            $params = array();
            if($status == null)
            {
                $tsql = "SELECT COUNT(*) as CNT
                        FROM Article";   
            }
            else 
            {
                $tsql = "SELECT COUNT(*) as CNT
                                FROM Article
                                WHERE Status = ? ";
                $params = array($status);
            }
            $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params);
	}
	public function GetById($id)
	{
            $tsql = "SELECT *
                    FROM Article
                    WHERE id = ?  ";  
            $params = array($id);
            $database_Model = new Database();
	    $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) == 1 ? $rows[0] : null;
	}

	public function GetByAlias($alias)
	{
            $tsql = "SELECT *
                    FROM Article
                    WHERE Alias = ? and Status = 1";   
            $params = array($alias);
            $database_Model = new Database();
            $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) == 1 ? $rows[0] : null;
	}

	public function CheckExistsTitle($title)
	{
            $tsql = "SELECT COUNT(*)
                    FROM Article
                    WHERE Title = ? ";  
            $params = array($title);
            $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

	public function CheckExistsAlias($alias)
	{
            $tsql = "SELECT COUNT(*)
                    FROM Article
                    WHERE Alias = ? ";  
            $params = array($alias);
            $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

	public function Add($title, $description, $content, $image, $sort_order, $status, $alias)
	{
            $tsql ="INSERT INTO article(Title, Description, Content, Image, Sort_Order, Status, Alias)
                    VALUES(?, ?, ?, ?, ?, ?, ?) ";   
            $params = array($title, $description, $content, $image, $sort_order, $status, $alias);
            $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);

	}

	public function Edit($id, $title, $description, $content, $image, $sort_order, $status, $alias)
	{
            $tsql ="UPDATE article
                    SET	Title = ?, Description = ?, Content = ?, Image = ?,
                        Sort_Order = ?, Status = ?, Alias = ?
                    WHERE Id = ? ";   
            $params = array($title, $description, $content, $image, $sort_order, $status, $alias, $id);
            $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Delete($id)
	{
            $tsql = "UPDATE article Set IsDeleted = 1 WHERE Id = ? ";  
            $params = array($id);
            $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function GetErrorsMessage($title, $cat_id, $alias, $status, $checkexiststitle, $checkexistsalias)
	{
            $errors = array();
            if(empty($title))
            {
                $errors[] = "Tiêu đề không được để trống!";
            }
            else if($checkexiststitle && $this->CheckExistsTitle($title))
            {
                $errors[] = "Tiêu đề đã tồn tại!";
            }
            if(empty($cat_id))
            {
                $errors[] = "Bạn chưa chọn chuyên mục!";
            }
            else if(!is_numeric($cat_id))
            {
                $errors[] = "Mã chuyên mục phải là 1 con số!";
            }
            if(empty($alias))
            {
                $errors[] = "Bí danh không được để trống!";
            }
            else if($checkexistsalias && $this->CheckExistsAlias($alias))
            {
                $errors[] = "Bí danh đã tồn tại!";
            }
            if(!is_numeric($status) && $status != 0 && $status != 1)
            {
                $errors[] = "Trạng thái chỉ có giá trị là 0 hoặc 1!";
            }
            return $errors;
	}
}

