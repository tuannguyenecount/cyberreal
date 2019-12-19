<?php 
  include '../model/class.investorManager.php';
  $investorManager = new InvestorManager();
  
  switch($action)
  {
  	case "index":
  	{
  		$view_data['title'] = "Danh Sách Chủ Đầu Tư";
  		$view_data['view_name'] = "investor/index.php";	
  		$view_data['model'] = $investorManager->GetList();
  		break;
  	}
    case "create":
    {
      $view_data['title'] = "Thêm Chủ Đầu Tư";
      $view_data['view_name'] = "investor/create.php";
      if(isset($_POST['SortOrder']))
      {
        try 
        {
          $view_data['errors'] = $investorManager->GetErrorsMessage($_POST['SortOrder']);
          $_POST['Logo'] = null;
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
                $result = UploadImageFile(SITE_PATH."/images/investors/".$_POST['Logo']);
                if($result != 1)
                  $view_data['errors'][] = $result;
              }
          }
          if(count($view_data['errors']) == 0)
          {
            $result = $investorManager->Add($_POST);
            if($result)
            {
               header("Location: ".base_url_admin."/investor"); 
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
      $view_data['title'] = "Sửa Chủ Đầu Tư";
      $view_data['view_name'] = "investor/edit.php";
      $id = (int)$_GET['id'];
      $view_data['model'] = $investorManager->GetById($id);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['SortOrder']))
      {
        try 
        {
      		$view_data['errors'] = $investorManager->GetErrorsMessage($_POST['SortOrder']);
          	if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) 
          	{
              	$check = getimagesize($_FILES["file"]["tmp_name"]);
              	if($check !== false)
              	{
                	$mt = microtime(true);
                	$mt =  $mt*1000; //microsecs
                	$ticks = (string)$mt*10; //100 Nanosecs
                	$name = $_FILES["file"]["name"];
                	$ext = end((explode(".", $name))); # extra () to prevent notice
                	$_POST['Logo'] = $ticks.".".$ext;
                	$result = UploadImageFile(SITE_PATH."/images/investors/".$_POST['Logo']);
                	if($result != 1)
                  		$view_data['errors'][] = $result;
              	}
          	}
          	if(count($view_data['errors']) == 0)
          	{	
            	$result = $investorManager->Edit($_POST);
            	if($result)
              		header("Location: ".base_url_admin."/investor"); 
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
  	case "delete":
  	{
  		if(isset($_POST['Id']))
  		{
  			try 
  			{
  				$result = $investorManager->Delete($_POST['Id']);
  				if($result)
  				 	header('Location:'.base_url_admin."/investor");
  				else 
  					$view_data['errors'][] = "Đã có lỗi xảy ra";
  			}
  			catch (Exception $e )
	        {
	            $view_data['errors'][] = $e->getMessage();
	        }  
  		}
  		$view_data['title'] = "Danh Sách Chủ Đầu Tư";
  		$view_data['view_name'] = "investor/index.php";	
  		$view_data['model'] = $investorManager->GetList();
  		break;
  	}
    
  }

?>