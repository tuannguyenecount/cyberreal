<?php 
  include '../model/class.slideManager.php';
  
  $slideManager = new SlideManager();
  
 
  switch($action)
  {
  	case "index":
  	{
      $view_data['title'] = "Danh sách Slide";
      $view_data['view_name'] = "slide/index.php";	
      // $view_data['section_styles'] = "slide/style_index.php";
      // $view_data['section_scripts'] = "slide/script_index.php";
      $view_data['model'] = $slideManager->GetList();
      break;
  	}
    case "create":
    {
      $view_data['title'] = "Tạo mới Slide";
      $view_data['view_name'] = "slide/create.php";
      // $view_data['section_scripts'] = "slide/script_form.php";
      if(isset($_POST['SortOrder']))
      {
        try 
        {
          $_POST['Image'] = null;
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;
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
                $result = UploadImageFile(SITE_PATH."/images/slides/".$_POST['Image']);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $slideManager->Add($_POST);
            if($result)
            {
              header("Location: ".base_url_admin."/slide");
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
      $view_data['title'] = "Sửa Slide";
      $view_data['view_name'] = "slide/edit.php";
      $view_data['model'] = $slideManager->GetById($_GET['id']);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['SortOrder']))
      {
        try 
        {
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;
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
                $result = UploadImageFile(SITE_PATH."/images/slides/".$_POST['Image']);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $slideManager->Edit($_POST);
            if($result)
            {
              header("Location: ".base_url_admin."/slide");
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
			$result = $slideManager->Delete($id);
		 	header('Location:'.base_url_admin."/slide");
  		break;
  	}
    case "confirm":
    {
      $slideManager->Confirm((int)$_GET['id']);
      header('Location:'.base_url_admin."/slide");
      break;
    }
    case "unconfirm":
    {
      $slideManager->UnConfirm((int)$_GET['id']);
      header('Location:'.base_url_admin."/slide");
      break;
    }
  }

?>