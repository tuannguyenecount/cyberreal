<?php 
  include '../model/class.advertisementManager.php';
  
  $advertisementManager = new AdvertisementManager();
  
 
  switch($action)
  {
  	case "index":
  	{
      $view_data['title'] = "Danh sách quảng cáo";
      $view_data['view_name'] = "advertisement/index.php";	
      $view_data['model'] = $advertisementManager->GetList();
      break;
  	}
    case "create":
    {
      $view_data['title'] = "Tạo mới quảng cáo";
      $view_data['view_name'] = "advertisement/create.php";
      if(isset($_POST['Name']))
      {
        try 
        {
          $view_data['errors'] = $advertisementManager->GetErrorsMessage($_POST);
          $_POST['Image'] = null;
          if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) {
              $check = getimagesize($_FILES["file"]["tmp_name"]);
              if($check !== false)
              {
                $mt = microtime(true);
                $mt =  $mt*1000; //microsecs
                $ticks = (string)$mt*10; //100 Nanosecs
                $name = $_FILES["file"]["name"];
                $ext = end((explode(".", $name))); # extra () to prevent notice
                $_POST['Image'] = $ticks.".".$ext;
                $result = UploadImageFile(SITE_PATH."/images/advertisements/".$_POST['Image']);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          else 
          {
            $view_data['errors'][] = "Vui lòng chọn hình!";
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $advertisementManager->Add($_POST);
            if($result)
            {
              header("Location: ".base_url_admin."/advertisement");
            }           
            else 
            {
              $view_data['errors'][] = "Đã có lỗi xảy ra";
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
      $view_data['title'] = "Sửa quảng cáo";
      $view_data['view_name'] = "advertisement/edit.php";
      $view_data['model'] = $advertisementManager->GetById($_GET['id']);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['Name']))
      {
        try 
        {
          $_POST['Id'] = $_GET['id'];
          $view_data['errors'] = $advertisementManager->GetErrorsMessage($_POST);
          if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) {
              $check = getimagesize($_FILES["file"]["tmp_name"]);
              if($check !== false)
              {
                $mt = microtime(true);
                $mt =  $mt*1000; //microsecs
                $ticks = (string)$mt*10; //100 Nanosecs
                $name = $_FILES["file"]["name"];
                $ext = end((explode(".", $name))); # extra () to prevent notice
                $_POST['Image'] = $ticks.".".$ext;
                $result = UploadImageFile(SITE_PATH."/images/advertisements/".$_POST['Image']);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $advertisementManager->Edit($_POST);
            if($result)
            {
              header("Location: ".base_url_admin."/advertisement");
            }           
            else 
            {
              $view_data['errors'][] = "Đã có lỗi xảy ra";
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
			$result = $advertisementManager->Delete($id);
		 	header('Location:'.base_url_admin."/advertisement");
  		break;
  	}
  }

?>