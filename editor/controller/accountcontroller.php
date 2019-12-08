<?php 
  include_once('../model/nocsrf.php');
  include_once('../model/class.userManager.php');
  $userManager = new UserManager();
  switch($action)
  {
    case "logout":
    {
        $view_data['title'] = "Đăng nhập";
        $view_data["view_name"] = "account/login.php";
        try
        {
            $userManager->SignOut();
            header('Location: '.base_url_editor);
            exit();
        }
        catch ( Exception $e )
        {
            $view_data['errors'][] = $e->getMessage();
        }   
        break;
    }
  }
