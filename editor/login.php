<?php 
    session_start(); 
    include_once '../model/config.php';
    include_once '../model/connection.php';
    require_once '../model/class.database.php';
    include_once('../model/nocsrf.php');
    include_once('../model/class.userManager.php');

    $userManager = new UserManager();
    $view_data = array();
    $view_data['errors'] = array();
    if(isset($_POST['userlogin']) && isset($_POST['passlogin']))
    {
        if($_POST["userlogin"] != "" &&  $_POST["passlogin"] != "")
        {
            try
            {
                $check = $userManager->EditorSignIn($_POST["userlogin"], md5($_POST["passlogin"]));
                if($check) 
                {  
                    $_SESSION['UserLogged'] = $userManager->GetByUserName($_POST["userlogin"]);
                    header('Location:'.base_url_editor."/product");
                    exit();
                }
                else 
                {
                    $view_data['errors'][] = "Sai tài khoản hoặc mật khẩu!";
                }
            }
             catch(Error  $e) {
                
                $view_data['errors'][] =  "Xảy ra lỗi khi xử lý! Hãy thử lại.";
                $trace = $e->getTrace();
                $errorMessage =  $e->getMessage().' in '.$e->getFile().' on line '.$e->getLine().' called from '.$trace[0]['file'].' on line '.$trace[0]['line'];
                $myfile = fopen(SITE_PATH."/log/errors.txt", "w") or die("Unable to open file!");
                fwrite($myfile, $errorMessage."\n");
                fclose($myfile);
            }
        }
        else 
        {
            $view_data['errors'][] = "Bạn cần nhập đầy đủ tài khoản và mật khẩu!";
        }
    }
	include_once '../editor/view/account/login.php';
