<?php 
  include '../model/class.newManager.php';
  include '../model/nocsrf.php';

  $newManager = new NewManager();
 
  switch($action)
  {
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
      $view_data['title'] = "Viết Bài Mới (Tin Tức)";
      $view_data['view_name'] = "new/create.php";
      $view_data['section_scripts'] = "new/script_form.php";
      if(isset($_POST['Title']))
      {
        try 
        {
          $_POST['UserCreated'] = $_SESSION['UserLogged']['UserName'];
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;
          $view_data['errors'] = $newManager->GetErrorsMessage($_POST['Title'], $_POST['Alias'], true, true);

          if(count($view_data['errors']) == 0)
          {
            $result = $newManager->Add($_POST);

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
    case "edit":
    {
      $view_data['title'] = "Sửa Bài Viết (Tin Tức)";
      $view_data['view_name'] = "new/edit.php";
      $view_data['section_scripts'] = "new/script_form.php";
      if(isset($_POST['Title']))
      {
        try 
        {
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;
          $view_data['errors'] = $newManager->GetErrorsMessage($_POST['Title'], $_POST['Alias'], $_POST['Title_Old'] != $_POST['Title'], $_POST['Alias_Old'] != $_POST['Alias']);

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
      else 
      {
        $id = (int)$_GET['id'];
        $view_data['model'] = $newManager->GetById($id);
        if($view_data['model'] == null)
        {
          header("HTTP/1.0 404 Not Found");
          header("Location: ".base_url."/pages/404/index.html");
        }
      }
      break;
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