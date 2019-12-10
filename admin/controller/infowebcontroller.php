<?php 
  include '../model/class.infoWebManager.php';

  $infoWebManager = new InfoWebManager();
  
  switch($action)
  {
    case "edit":
    {
      $view_data['title'] = "Thông tin website";
      $view_data['view_name'] = "infoweb/edit.php";
      $view_data['model'] = $infoWebManager->Get();
      if(isset($_POST['WebName']))
      {
         if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false)
            {
              $mt = microtime(true);
              $mt =  $mt*1000; //microsecs
              $ticks = (string)$mt*10; //100 Nanosecs
              $name = $_FILES["file"]["name"];
              $ext = end((explode(".", $name))); # extra () to prevent notice
              $_POST['Logo'] = $ticks.".".$ext;
              $result = UploadImageFile(SITE_PATH."/images/".$_POST['Logo']);
              if($result != 1)
                $view_data['errors'][] = $result;
            }
        }
        $result = $infoWebManager->Edit($_POST);
        if($result)
        {
          $_SESSION['InfoWeb'] = $infoWebManager->Get();
          header("Location: ".base_url_admin."/infoweb/edit");
        }
        else 
        {
          $view_data['errors'][] = "Xảy ra lỗi khi sửa dữ liệu!";
        }
      }
      break;
    }
    
  }

?>