<?php
  session_start(); 
  require_once 'model/config.php';
  require_once 'model/connection.php';
  require_once 'model/class.database.php';
  include_once 'model/nocsrf.php'; 
  include_once 'model/functions.php'; 
  require_once 'model/htmlpurifier-4.10.0/library/HTMLPurifier.auto.php';
  // try 
  // {
    $controller = isset($_GET['controller']) ? $_GET['controller'] : "home";
    $action = isset($_GET['action']) ? $_GET['action'] : "index";

    $view_data = array();
    $view_data['layout'] = "shared/_layout.php";
    $view_data['errors'] = array();

    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    if(count($_POST) > 0)
    {
      foreach($_POST as $key => $value)
      {
    		if($key != "Password" && $key != "password" && $key != "Password2" && $key != "PasswordConfirm" && $key != "Password2Confirm" && $key != "NewPasswordConfirm" && $key != "NewPassword2" && $key != "NewPassword2Confirm" && $key != "NewPassword" && $key != "Pass1" && $key != "Pass2" && $key != "NewPass1" && $key != "NewPass1Confirm")
    		{
    			$clean_html = $purifier->purify($value);
    			$_POST[$key] = $clean_html;
    		}      
      }
    }
    require_once 'controller/'.$controller."controller.php";
    if(isset($view_data['layout']))
    {	
        include_once 'view/'.$view_data['layout'];
    }
  // }
  // catch(Error  $e) {
  //   $trace = $e->getTrace();
  //   $errorMessage =  $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
  //   $myfile = fopen(SITE_PATH."/log/errors.txt", "w") or die("Unable to open file!");
  //   fwrite($myfile, $errorMessage."\n");
  //   fclose($myfile); 
  // }


