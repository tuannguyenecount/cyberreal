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
        catch (Exception $ex)
        {
            echo $ex->getMessage();
            exit();
        }
    }
    public function GetListArray($tsql, $params = array(), $fetchMode)
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
            $arr = $stmt->fetchAll($fetchMode);
            return $arr;
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
        }
        catch (Exception $ex)
        {
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
            $result = $stmt->execute();
            return $result;
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            exit();
            //return false;
        }
        catch(Exception $ex){
            echo $ex->getMessage();
            exit();
            //return false;
        }
    }
    public function ExecuteScalar($tsql, $params = array())
    {
        try 
        {
            $arr = $this->GetList($tsql, $params);
            if(count($arr) > 0)
            {
                return $arr[0][0];
            }
            return NULL;
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
            exit();
        }
        catch (Exception $ex)
        {
            echo $ex->getMessage();
            exit();
        }
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

