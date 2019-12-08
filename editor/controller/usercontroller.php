<?php 
  include '../model/class.userManager.php';
  
  $userManager = new UserManager();
  
 
  switch($action)
  {
  	case "index":
  	{
      $view_data['title'] = "Danh sách người dùng";
      $view_data['view_name'] = "user/index.php";	
      $view_data['model'] = $userManager->GetList();
      break;
  	}

    case "edit":
    {
      $view_data['title'] = "Sửa thông tin người dùng";
      $view_data['view_name'] = "user/edit.php"; 
      $view_data['model'] = $userManager->GetByUserName($_SESSION['UserLogged']['UserName']);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['UserName']))
      {
        try 
        {
            $_POST['Role'] =  $view_data['model']['Role'];
            if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) {
              $check = getimagesize($_FILES["file"]["tmp_name"]);
              if($check !== false)
              {
                $mt = microtime(true);
                $mt =  $mt*1000; //microsecs
                $ticks = (string)$mt*10; //100 Nanosecs
                $name = $_FILES["file"]["name"];
                $ext = end((explode(".", $name))); # extra () to prevent notice
                $_POST['Avatar'] = $ticks.".".$ext;
                $result = UploadImageFileWithResize(SITE_PATH."/images/users/".$_POST['Avatar'], 64, 64);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
            }
            if(count($view_data['errors']) == 0)
            {
              $result = $userManager->EditInformation($_POST);
              if($result)
              {
                $_SESSION['UserLogged'] = $userManager->GetByUserName($_SESSION['UserLogged']['UserName']);
                header("Location: ".base_url_editor."/user");
              }
              else 
              {
                $view_data['errors'][] = "Đã có lỗi xảy ra!";
              }
            }
        }
        catch(Exception $ex)
        {
          $view_data['errors'][] = $ex->getMessage();
        }
      } 
      break;
    } 
    case "profile":
    {
      $view_data['title'] = "Hồ sơ cá nhân";
      $view_data['view_name'] = "user/profile.php"; 
      $view_data['model'] = $userManager->GetByUserName($_SESSION['UserLogged']['UserName']);
      break;
    }
    case "changepassword":
    {
      $view_data['title'] = "Đổi mật khẩu";
      $view_data['model'] = $userManager->GetByUserName($_SESSION['UserLogged']['UserName']);
      $view_data['view_name'] = "user/changepassword.php"; 
      if(isset($_POST['CurrentPassword']))
      {
        try 
        {
            if(empty($_POST['CurrentPassword']))
            {
              $view_data['errors'][] = "Bạn chưa nhập mật khẩu hiện tại.";
            }
            else if(md5($_POST['CurrentPassword']) != $view_data['model']['PasswordHash'])
            {
              $view_data['errors'][] = "Mật khẩu hiện tại không chính xác.";
            }
            else if(empty($_POST['NewPassword']))
            {
              $view_data['errors'][] = "Bạn chưa nhập mật khẩu mới.";
            }
            else if($_POST['ConfirmNewPassword'] != $_POST['NewPassword'])
            {
              $view_data['errors'][] = "Nhập lại mật khẩu mới không khớp.";
            }
            if(count($view_data['errors']) == 0)
            {
              $NewPassword = md5($_POST['NewPassword']);
              $result = $userManager->ChangePassword($view_data['model']['UserName'], $NewPassword);
              if($result)
              {
                $_SESSION['UserLogged']['PasswordHash'] = $NewPassword;
                header("Location: ".base_url_editor."/user");
              }
              else 
              {
                $view_data['errors'][] = "Đã có lỗi xảy ra!";
              }
            }
        }
        catch(Exception $ex)
        {
          $view_data['errors'][] = $ex->getMessage();
        }
      } 
      break;
    }
   
  }

?>