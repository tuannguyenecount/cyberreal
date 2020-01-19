<?php 
  include '../model/class.newManager.php';
  include '../model/nocsrf.php';

  $newManager = new NewManager();
 
  switch($action)
  {
    case "countArticleNotShow":
    {
      $cnt = $newManager->CountArticleNotShow();
      echo $cnt;
      exit();
    }
  	case "index":
  	{
  		$view_data['title'] = "Tin Tức";
  		$view_data['view_name'] = "new/index.php";	
  		$view_data['section_styles'] = "new/style_index.php";
  		$view_data['section_scripts'] = "new/script_index.php";
  		$view_data['model'] = $newManager->GetList();
  		break;
  	}
    case "create":
    {
      $mt = microtime(true);
      $mt =  $mt*1000; //microsecs
      $ticks = (string)$mt*10; //100 Nanosecs
      $Title = "Tin tức mới ".$ticks;
      $newManager->AddTemp($Title, $_SESSION['UserLogged']['UserName']);
      $new  = $newManager->GetByTitle($Title);
      header("Location: ".base_url_admin."/new/edit/".$new['Id']);
      break;
    }
    case "edit":
    {
      $view_data['title'] = "Sửa Bài Viết (Tin Tức)";
      $view_data['view_name'] = "new/edit.php";
      $view_data['section_scripts'] = "new/script_form.php";
      $view_data['section_styles'] = "new/style_form.php";
      $id = (int)$_GET['id'];
      $view_data['model'] = $newManager->GetById($id);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['Title']))
      {
        try 
        {
          $_POST['Id'] = $_GET['id'];
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;
          $view_data['errors'] = $newManager->GetErrorsMessage($_POST['Title'], $_POST['Alias'], $_POST['Title_Old'] != $_POST['Title'], $_POST['Alias_Old'] != $_POST['Alias']);
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
                $result = UploadImageFileWithResize(SITE_PATH."/images/news/".$_POST['Image'], 600,400);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $newManager->Edit($_POST);

            if($result)
              header("Location: ".base_url_admin."/new");       
            else 
              $view_data['errors'][] = "Đã có lỗi xảy ra";
          }
        }
        catch(Exception $ex)
         {
            $view_data['errors'][] = $ex->getMessage();
         } 
      } 
      break;
    }
    case "updateContent":
    {
      try 
        { 
          $result = $newManager->UpdateContent($_GET['id'], $_POST['Content']);
          if($result)
            echo "Update async success";
          else 
            echo "Auto save error!";
        }
        catch(Exception $ex)
        {
          echo $ex->getMessage();
        }
        exit();
    }
  	case "delete":
  	{
  		if(isset($_POST['id']))
  		{
  			try 
  			{
  				$id = (int)$_POST['id'];
  				$result = $newManager->Delete($id);

  				if($result)
  				 	header('Location:'.base_url_admin."/new");
  				else 
  					$view_data['errors'][] = "Đã có lỗi xảy ra";
  			}
  			catch ( Exception $e )
        {
            $view_data['errors'][] = $e->getMessage();
        }        
  		}
      $view_data['title'] = "Bài viết";
      $view_data['view_name'] = "new/index.php";  
      $view_data['section_styles'] = "new/style_index.php";
      $view_data['section_scripts'] = "new/script_index.php";
      $view_data['model'] = $newManager->GetList();
  		break;
  	}
    
  }

?>