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
    case "create":
    {
      $view_data['title'] = "Tạo mới người dùng";
      $view_data['view_name'] = "user/create.php";
      if(isset($_POST['UserName']))
      {
        try 
        {
          $view_data['errors'] = $userManager->GetErrorsMessage($_POST['UserName'], $_POST['Password']);
          if(empty($_POST['ConfirmPassword']))
          {
            $view_data['errors'][] = "Bạn chưa nhập nhập lại mật khẩu.";
          }
          else if($_POST['ConfirmPassword'] != $_POST['Password'])
          {
            $view_data['errors'][] = "Nhập lại mật khẩu không khớp.";
          }
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
            $_POST['PasswordHash'] = md5($_POST['Password']);
            $_POST['Role'] = $_POST['Role'] == 1 ? "Biên Tập Viên" : "Quản Trị Viên";
            $result = $userManager->Add($_POST);
            if($result)
            {
              header("Location: ".base_url_admin."/user");
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
    case "edit":
    {
      $view_data['title'] = "Sửa thông tin người dùng";
      $view_data['view_name'] = "user/edit.php"; 
      $view_data['model'] = $userManager->GetByUserName($_GET['userName']);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['UserName']))
      {
        try 
        {
            $_POST['Role'] = $_POST['Role'] == 1 ? "Biên Tập Viên" : "Quản Trị Viên";
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
                if($_GET['userName'] == $_SESSION['UserLogged']['UserName'])
                {
                  $_SESSION['UserLogged'] = $userManager->GetByUserName($_GET['userName']);
                }
                header("Location: ".base_url_admin."/user");
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
                header("Location: ".base_url_admin."/user");
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
    case "setpassword":
    {
      $view_data['title'] = "Cấp lại mật khẩu thành viên ".$_GET['userName'];
      $view_data['model'] = $userManager->GetByUserName($_GET['userName']);
      $view_data['view_name'] = "user/setpassword.php"; 
      if(isset($_POST['NewPassword']))
      {
        try 
        {
            if(empty($_POST['NewPassword']))
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
                header("Location: ".base_url_admin."/user/setpassword&userName=".$_GET['userName']."&messageSuccess=Cấp lại mật khẩu thành công.");
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
  	case "delete":
  	{
			$id = (int)$_POST['id'];
			$result = $slideManager->Delete($id);
		 	header('Location:'.base_url_admin."/slide");
  		break;
  	}
  }

?>