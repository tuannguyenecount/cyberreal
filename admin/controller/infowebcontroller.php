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
        if(isset($_FILES["fileLogoFooter"]) && !empty($_FILES['fileLogoFooter']['tmp_name'])) {
            $check = getimagesize($_FILES["fileLogoFooter"]["tmp_name"]);
            if($check !== false)
            {
              $mt = microtime(true);
              $mt =  $mt*1000; //microsecs
              $ticks = (string)$mt*10; //100 Nanosecs
              $name = $_FILES["fileLogoFooter"]["name"];
              $ext = end((explode(".", $name))); # extra () to prevent notice
              $_POST['LogoFooter'] = $ticks.".".$ext;
              $result = UploadFile("fileLogoFooter",SITE_PATH."/images/".$_POST['LogoFooter']);
              if($result != 1)
                $view_data['errors'][] = $result;
            }
        }
        if(isset($_FILES["fileFavicon"]) && !empty($_FILES['fileFavicon']['tmp_name'])) {
            $check = getimagesize($_FILES["fileFavicon"]["tmp_name"]);
            if($check !== false)
            {
              $mt = microtime(true);
              $mt =  $mt * 1000; //microsecs
              $ticks = (string)$mt*10; //100 Nanosecs
              $name = $_FILES["fileFavicon"]["name"];
              $ext = end((explode(".", $name))); # extra () to prevent notice
              $_POST['Favicon'] = "favico".$ticks.".".$ext;
              $result = UploadFile("fileFavicon", SITE_PATH."/images/".$_POST['Favicon']);
              if($result != 1)
                $view_data['errors'][] = $result;
            }
        }
        if(count($view_data['errors']) == 0)
        {
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
      }
      break;
    }
    case "editRobots":
    { 
      $view_data['title'] = "Chỉnh sửa file robots.txt";
      $view_data['view_name'] = "infoweb/editRobots.php";
      if(isset($_POST['Content']))
      {
        try
        {
          $myfile = fopen(SITE_PATH."/robots.txt", "w") or die("Unable to open file!");
          fwrite($myfile, $_POST['Content']);
          fclose($myfile);
        } 
        catch(Exception $ex)
        {
          $view_data['errors'][] = $ex->getMessage();
        }
      }
      $myfile = fopen(SITE_PATH."/robots.txt", "r") or die("Unable to open file!");
      $view_data['model']  = fread($myfile,filesize(SITE_PATH."/robots.txt"));
      fclose($myfile);
      break;
    }
    
  }

?>