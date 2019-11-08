<?php 

class Database
{
	public function GetList($tsql, $params = array())
	{
            global $db;	
            try 
            {
                /* Execute the query. */  
                $stmt = $db->prepare($tsql);
                foreach ($params as $key => &$val) {
                    $stmt->bindParam((int)$key + 1, $val);
                }
                $stmt->execute();
                $arr = $stmt->fetchAll();
                return $arr;
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                exit();
            }
	}
	public function Execute($tsql, $params = array())
	{
            global $db;	
            try 
            {
                /* Execute the query. */  
                $stmt = $db->prepare($tsql);
                foreach ($params as $key => &$val) {
                    $stmt->bindParam((int)$key + 1, $val);
                }
                return $stmt->execute();
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                exit();
                return false;
            }
	}
	public function ExecuteScalar($tsql, $params = array())
	{
            global $db;	
            $arr = [];
            try 
            {
                /* Execute the query. */  
                $stmt = $db->prepare($tsql);
                foreach ($params as $key => &$val) {
                    $stmt->bindParam((int)$key + 1, $val);
                }
                $stmt->execute();
                $arr = $db->fetch(\PDO::FETCH_ASSOC);
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
                return false;
            }
	    return $arr[0];
	}
        function GetColumns($tableName)
	{
            global $db;	
            $tsql = "SELECT COLUMN_NAME 
                FROM information_schema.columns 
                WHERE table_schema='cyberreal' AND table_name='".$tableName."' ";  
	    return $this->GetList($tsql);
	}
        public function GetListWithColumnName($tsql, $tableName, $params = array())
	{
            global $conn;
            $columns = $this->GetColumns($tableName);
            $arr = $this->GetList($tsql, $params);
            $result = [];
            foreach($arr as $row)
            {
                $item = [];
                for($i = 0; $i < count($row); $i++)
                {
                    $item[$columns[$i][0]] = $row[$i];
                }
                $result[] = $item;
            }
	    return $result;
	}
}

