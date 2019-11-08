<?php 

    $serverName = "localhost"; 
    $uid = 'root';   
    $pwd = '';  
    $databaseName = "cyberreal"; 
    $dsn= "mysql:host=$serverName;dbname=$databaseName";

    try
    {
        // create a PDO connection with the configuration data
        $db = new PDO($dsn, $uid, $pwd);
        $db->exec("set names utf8");
    }
    catch (PDOException $e)
    {
        // report error message
         echo $e->getMessage();
    }

?>