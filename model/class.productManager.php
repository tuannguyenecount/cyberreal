<?php 
class ProductManager
{
	public function GetList($status = null)
	{
        $params = array();
        if($status == null)
        {
            $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    ORDER BY A.Id desc";  
        }
        else 
        {
             $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = ?
                    ORDER BY A.Id desc"; 
             $params = array($status);
        }
        $database_Model = new Database();
	    return $database_Model->GetList($tsql, $params);
	}
    public function GetListNew()
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                FROM product A LEFT JOIN category B  
                ON A.CategoryId = B.Id
                LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                LEFT JOIN direction F ON A.Direction = F.Id 
                WHERE A.Status = 1
                ORDER BY A.Id desc LIMIT 0,9";         
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }
    public function GetListByUserCreated($UserName)
    {
        $params = array();
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                FROM product A LEFT JOIN category B  
                ON A.CategoryId = B.Id
                LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                LEFT JOIN direction F ON A.Direction = F.Id 
                WHERE A.UserCreated = ?
                ORDER BY A.Id desc";  
        $params = array($UserName);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
    public function Search($Name, $District, $Ward, $Street, $Rank, $Price, $Direction, $Room, 
        $HandoverTime)
    {
        $whereQuery = "WHERE A.Status = 1 ";
        $params = array();
        if(!empty($Name))
        {
            $whereQuery .= " AND A.Name LIKE ? ";
            $params[] = "%".$Name."%";
        }
        if(!empty($District))
        {
            $whereQuery .= " AND A.District = ? ";
            $params[] = $District;
        }
        if(!empty($Ward))
        {
            $whereQuery .= " AND A.Ward = ? ";
            $params[] = $Ward;
        }
        if(!empty($Street))
        {
            $whereQuery .= " AND G.id = ? ";
            $params[] = $Street;
        }
        if(!empty($Rank))
        {
            $whereQuery .= " AND A.Rank = ? ";
            $params[] = $Rank;
        }
        else if(!empty($Price))
        {
            switch($Price)
            {
                case "duoi1ty":
                    $whereQuery .= " AND A.Price < 1000000000 "; 
                    break;
                case "1den3ty":
                    $whereQuery .= " AND A.Price >= 1000000000 AND A.Price <= 3000000000"; 
                    break;
                case "3den5ty":
                    $whereQuery .= " AND A.Price >= 3000000000 AND A.Price <= 5000000000"; 
                    break;
                case "5den10ty":
                    $whereQuery .= " AND A.Price >= 5000000000 AND A.Price <= 10000000000"; 
                    break;
                case "tren10ty":
                    $whereQuery .= " AND A.Price >= 10000000000 "; 
                    break;
            }
        }
        else if(!empty($Direction))
        {
            $whereQuery .= " AND A.Direction = ? ";
            $params[] = $Direction;
        }
        else if(!empty($Room))
        {
            if($Room != "5phongtrolen")
            {
                $whereQuery .= " AND A.Room = ? ";
                $params[] = $Room;
            }
            else 
            {
                $whereQuery .= " AND A.Room >= 5 ";
            }
        }
        else if(!empty($HandoverTime))
        {
            $whereQuery .= " AND A.HandoverTime = ? ";
            $params[] = $HandoverTime;
        }
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    LEFT JOIN street G ON G._name = A.Street
                    $whereQuery
                    ORDER BY A.Id desc"; 
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
    public function GetProductsShowByDistrict($districtId, $skip, $take)
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = 1 AND A.District = ?
                    ORDER BY A.SortOrder ASC, A.Id DESC LIMIT $skip, $take"; 
        $params = array($districtId);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
    public function GetRelatedProducts($productId, $districtId)
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = 1 AND A.Id <> ? AND A.District = ?
                    ORDER BY A.SortOrder ASC, A.Id DESC LIMIT 0, 6"; 
        $params = array($productId, $districtId);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
    public function GetProductsHot()
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = 1 AND A.HOT = 1
                    ORDER BY A.SortOrder ASC, A.Id DESC LIMIT 0, 6"; 
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }
    public function CountProductsShowByDistrict($districtId)
    {
        $tsql = "SELECT COUNT(*)
                    FROM product A 
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    WHERE A.Status = 1 AND A.District = ?"; 
        $params = array($districtId);
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql, $params);
    }
    public function GetProductsShowByStreet($street, $skip, $take)
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = 1 AND A.Street = ?
                    ORDER BY A.Id desc LIMIT $skip, $take"; 
        $params = array($street);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
    public function CountProductsShowByStreet($street)
    {
        $tsql = "SELECT COUNT(*)
                    FROM product A 
                    WHERE A.Status = 1 AND A.Street = ?"; 
        $params = array($street);
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql, $params);
    }
    public function GetProductsShowByDirection($direction, $skip, $take)
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Status = 1 AND A.Direction = ?
                    ORDER BY A.Id desc LIMIT $skip, $take"; 
        $params = array($direction);
        $database_Model = new Database();
        return $database_Model->GetList($tsql, $params);
    }
     public function CountProductsShowByDirection($direction)
    {
        $tsql = "SELECT COUNT(*)
                    FROM product A 
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    WHERE A.Status = 1 AND A.Direction = ?"; 
        $params = array($direction);
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql, $params);
    }
	public function CountAll($status = null)
	{
        $params = array();
        if($status == null)
        {
            $tsql = "SELECT COUNT(*) as CNT
                    FROM product";   
        }
        else 
        {
            $tsql = "SELECT COUNT(*) as CNT
                            FROM product
                            WHERE Status = ? ";
            $params = array($status);
        }
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params);
	}
    public function CountProductNotShow()
    {
        $tsql = "SELECT COUNT(*) as CNT
                        FROM product
                        WHERE Status = 0 ";
        
        $database_Model = new Database();
        return (int)$database_Model->ExecuteScalar($tsql);
    }
	public function GetById($id)
	{
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Id = ?
                    ORDER BY A.Id desc";  
        $params = array($id);
        $database_Model = new Database();
	    $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) > 0 ? $rows[0] : null;
	}

	public function GetByAlias($alias)
	{
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Alias = ?
                    ORDER BY A.Id desc";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
	    return count($rows) == 1 ? $rows[0] : null;
	}

    public function GetProductShowByAlias($alias)
    {
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN district C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN direction F ON A.Direction = F.Id 
                    WHERE A.Alias = ? AND A.Status = 1 
                    ORDER BY A.Id desc";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) == 1 ? $rows[0] : null;
    }

    public function GetListNameProducts()
    {
        $tsql = "SELECT A.Name
                    FROM product A
                    WHERE A.Status = 1 ";   
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

	public function CheckExistsName($name)
	{
        $tsql = "SELECT COUNT(*) AS CNT
                FROM product
                WHERE Name = ? ";  
        $params = array($name);
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

	public function CheckExistsAlias($alias)
    {
        $tsql = "SELECT COUNT(*)  AS CNT
                FROM product
                WHERE Alias = ? ";  
        $params = array($alias);
        $database_Model = new Database();
	    return (int)$database_Model->ExecuteScalar($tsql, $params) > 0;
	}

    public function AddTemp($Name, $UserCreated)
    {
        $tsql = "INSERT INTO product(Name, UserCreated) VALUES (?,?)";
        $database_Model = new Database();
        $params = array($Name, $UserCreated);
        return $database_Model->Execute($tsql, $params);
    }

	public function Add($model)
	{
        $tsql ="INSERT INTO product(Name,CategoryId,Area,Direction,Rank,Address,Province,District,Ward,Street,GeneralInformation,Location,Structure,ServiceCharge,Advantages,Price,PriceOn1m2,Image,Alias,Status,UserCreated, SortOrder, HOT, SeoTitle, SeoDescription, SeoKeyword)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";   

        $params = array($model['Name'], $model['CategoryId'], $model['Area'], $model['Direction'], $model['Rank'], $model['Address'], $model['Province'], $model['District'], $model['Ward'], $model['Street'], $model['GeneralInformation'], $model['Location'], $model['Structure'], $model['ServiceCharge'], $model['Advantages'], $model['Price'], $model['PriceOn1m2'], $model['Image'] , $model['Alias'], $model['Status'], $model['UserCreated'], $model['SortOrder'], $model['HOT'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword']);

        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

    public function GetByName($Name)
    {
        $tsql = "SELECT * from product WHERE Name = ? ";
        $database_Model = new Database();
        $params = array($Name);
        $rows = $database_Model->GetList($tsql, $params);
        if(count($rows) > 0)
        {
            return $rows[0];
        }
        return null;
    }

	public function Edit($model)
	{

        $tsql = "UPDATE `product` SET `Name` = ?,`CategoryId`= ?,`Area` = ?,`Room` = ?,`Address` = ?,`Province` = ?,`District` = ?,`Ward` = ?,`Street`=?, `GeneralInformation`=?,`Location`=?,`Utilities`=?,`Ground`=?,`PriceInformation`=?, `Price`=?, `PriceOn1m2` = ?, `Image`=?, `HandoverTime` = ?, `Alias`=?,`Status`=?,`SortOrder`=?,`HOT`=?, `SeoTitle` = ?, `SeoDescription` = ?, `SeoKeyword` = ? WHERE `Id` = ? ";   

        $params =  array($model['Name'], $model['CategoryId'], $model['Area'], $model['Room'], $model['Address'], $model['Province'], $model['District'], $model['Ward'], $model['Street'], $model['GeneralInformation'], $model['Location'], $model['Utilities'], $model['Ground'], $model['PriceInformation'], $model['Price'], $model['PriceOn1m2'], $model['Image'], $model['HandoverTime'], $model['Alias'], $model['Status'], $model['SortOrder'], $model['HOT'], $model['SeoTitle'], $model['SeoDescription'], $model['SeoKeyword'], $model['Id']);

        $database_Model = new Database();
	    $result = $database_Model->Execute($tsql, $params);
        return $result;
	}

    public function UpdateContentByColumnAsync($Id, $columnName, $content)
    {
        try 
        {
            $tsql = "UPDATE `product` SET `".$columnName."` = ? WHERE `Id` = ? ";
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

	public function Delete($id)
	{
        $tsql = "DELETE FROM product WHERE Id = ? ";  
        $params = array($id);
        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

    public function GetImagesProductByProductId($productId)
    {
        $tsql = "SELECT * FROM `imagesproducts` Where `ProductId` = ? Order by OrderNum ";  
        $database_Model = new Database();
        $params = array($productId);
        return $database_Model->GetList($tsql, $params);
    }

    public function GetListCountImagesFromAllProduct()
    {
        $tsql = "SELECT A.Id, A.Name, A.Alias, C.Alias CategoryAlias, Count(B.Id) AS CNT
                    FROM `product` A
                    LEFT JOIN  `imagesproducts` B
                    ON A.`Id` = B.`ProductId`
                    LEFT JOIN `category` C
                    ON A.`CategoryId` = C.`Id`
                    GROUP BY A.Id, A.Name, A.Alias, C.`Alias`";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListCountImagesFromProductByUserCreated($UserName)
    {
        $tsql = "SELECT A.Id, A.Name, A.Alias, C.Alias CategoryAlias, Count(B.Id) AS CNT
                    FROM `product` A
                    LEFT JOIN  `imagesproducts` B
                    ON A.`Id` = B.`ProductId`
                    LEFT JOIN `category` C
                    ON A.`CategoryId` = C.`Id`
                    WHERE A.UserCreated = ?
                    GROUP BY A.Id, A.Name, A.Alias, C.`Alias`";  
        $database_Model = new Database();
        $params = array($UserName);
        return $database_Model->GetList($tsql, $params);
    }

    public function AddImage($model)
    {
        $tsql ="INSERT INTO imagesproducts(ProductId,Image,OrderNum) VALUES(?,?,?) ";   
        $params = array($model['ProductId'], $model['Image'], $model['OrderNum']);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function DeleteImage($id)
    {
        $tsql ="DELETE FROM imagesproducts Where Id = ? ";   
        $params = array($id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function UpdateOrderNumImage($Id, $OrderNum)
    {
        $tsql ="UPDATE imagesproducts SET OrderNum = ? Where Id = ? ";   
        $params = array($OrderNum, $Id);
        $database_Model = new Database();
        return $database_Model->Execute($tsql, $params);
    }

    public function GetListArea($take)
    {
        $tsql = "SELECT DISTINCT Area FROM product  WHERE Area <> '' Order by Area limit 0, $take ";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListRank()
    {
        $tsql = "SELECT DISTINCT Rank FROM product  WHERE Rank <> '' Order by Rank";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

    public function GetListPrice($take)
    {
        $tsql = "SELECT DISTINCT Price FROM product  WHERE Price <> '' limit 0, $take ";  
        $database_Model = new Database();
        return $database_Model->GetList($tsql);
    }

	public function GetErrorsMessage($model, $checkexistsName, $checkexistsAlias)
	{
        $errors = array();
        if(empty($model['Name']))
        {
            $errors[] = "Tên dự án không được để trống.";
        }
        else if($checkexistsName && $this->CheckExistsName($model['Name']))
        {
            $errors[] = "Tên dự án đã tồn tại. Hãy đặt tên khác.";
        }
        if(empty($model['CategoryId']))
        {
            $errors[] = "Bạn chưa chọn loại dự án.";
        }
        if(empty($model['Alias']))
        {
            $errors[] = "Bí danh không được để trống.";
        }
        else if($checkexistsAlias && $this->CheckExistsAlias($model['Alias']))
        {
            $errors[] = "Bí danh đã tồn tại. Hãy sửa lại bí danh.";
        }
        return $errors;
	}
}

