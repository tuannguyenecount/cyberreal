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
                    LEFT JOIN District C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN Ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN Direction F ON A.Direction = F.Id 
                    ORDER BY A.Id desc";  
        }
        else 
        {
             $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A LEFT JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN District C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN Ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN Direction F ON A.Direction = F.Id 
                    WHERE A.Status = ?
                    ORDER BY A.Id desc"; 
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
	public function GetById($id)
	{
        $tsql = "SELECT DISTINCT A.*, B.Name AS CategoryName, B.Alias AS CategoryAlias, CONCAT(C._prefix,' ', C._name) AS DistrictName, CONCAT(D._prefix ,' ',D._name) AS WardName, F.Name As DirectionName
                    FROM product A INNER JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN District C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN Ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN Direction F ON A.Direction = F.Id 
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
                    FROM product A INNER JOIN category B  
                    ON A.CategoryId = B.Id
                    LEFT JOIN District C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN Ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN Direction F ON A.Direction = F.Id 
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
                    LEFT JOIN District C ON A.District = C.id AND C._province_id = 1
                    LEFT JOIN Ward D ON A.Ward = D.id AND D._district_id = C.id
                    LEFT JOIN Direction F ON A.Direction = F.Id 
                    WHERE A.Alias = ? AND A.Status = 1 
                    ORDER BY A.Id desc";   
        $params = array($alias);
        $database_Model = new Database();
        $rows = $database_Model->GetList($tsql, $params);
        return count($rows) == 1 ? $rows[0] : null;
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

	public function Add($model)
	{
        $tsql ="INSERT INTO product(Name,CategoryId,Area,Direction,Rank,Address,Province,District,Ward,Street,GeneralInformation,Location,Structure,ServiceCharge,Advantages,Price,Image,Alias,Status,UserCreated)
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";   

        $params = array($model['Name'], $model['CategoryId'], $model['Area'], $model['Direction'], $model['Rank'], $model['Address'], $model['Province'], $model['District'], $model['Ward'], $model['Street'], $model['GeneralInformation'], $model['Location'], $model['Structure'], $model['ServiceCharge'], $model['Advantages'], $model['Price'], $model['Image'] , $model['Alias'], $model['Status'], $model['UserCreated']);

        $database_Model = new Database();
	    return $database_Model->Execute($tsql, $params);
	}

	public function Edit($model)
	{

        $tsql = "UPDATE `product` SET `Name`= ?,`CategoryId`=?,`Area`=?,`Direction`=?,`Rank`=?,`Address`=?,`Province`=?,`District`=?,`Ward`=?,`Street`=?,`GeneralInformation`=?,`Location`=?,`Structure`=?,`ServiceCharge`=?,`Advantages`=?, `Price`=?,`Image`=?,`Alias`=?,`Status`=? WHERE `Id` = ? ";   

        $params =  array($model['Name'], $model['CategoryId'], $model['Area'], $model['Direction'], $model['Rank'], $model['Address'], $model['Province'], $model['District'], $model['Ward'], $model['Street'], $model['GeneralInformation'], $model['Location'], $model['Structure'], $model['ServiceCharge'], $model['Advantages'], $model['Price'], $model['Image'] , $model['Alias'], $model['Status'], $model['Id']);

        $database_Model = new Database();
	    $result = $database_Model->Execute($tsql, $params);
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
        $tsql = "SELECT DISTINCT Area FROM product Order by Area limit 0, $take ";  
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

