<?php 
  include '../model/class.feeManager.php';
  $feeManager = new FeeManager();
  
  switch($action)
  {
  	case "index":
  	{
  		$view_data['title'] = "Các Loại Phí";
  		$view_data['view_name'] = "fee/index.php";	
  		$view_data['model'] = $feeManager->GetList();
  		break;
  	}
    case "create":
    {
      $view_data['title'] = "Thêm Loại Phí";
      $view_data['view_name'] = "fee/create.php";
      $view_data['section_scripts'] = "fee/script_form.php";
      if(isset($_POST['Name']))
      {
        try 
        {
          $view_data['errors'] = $feeManager->GetErrorsMessage($_POST['Name'], $_POST['SortOrder']);
          if(count($view_data['errors']) == 0)
          {
            $result = $feeManager->Add($_POST);
            if($result)
            {
               header("Location: ".base_url_admin."/fee"); 
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
      $view_data['title'] = "Sửa Loại Phí";
      $view_data['view_name'] = "fee/edit.php";
      $id = (int)$_GET['id'];
      $view_data['model'] = $feeManager->GetById($id);
      if($view_data['model'] == null)
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      if(isset($_POST['Name']))
      {
        try 
        {
          $view_data['errors'] = $feeManager->GetErrorsMessage($_POST['Name'], $_POST['SortOrder']);
          if(count($view_data['errors']) == 0)
          {
            $result = $feeManager->Edit($_POST);
            if($result)
              header("Location: ".base_url_admin."/fee"); 
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
  				$result = $feeManager->Delete($_POST['Id']);
  				if($result)
  				 	header('Location:'.base_url_admin."/fee");
  				else 
  					$view_data['errors'][] = "Đã có lỗi xảy ra";
  			}
  			catch ( Exception $e )
        {
            $view_data['errors'][] = $e->getMessage();
        }  
  		}
  		$view_data['title'] = "Các Loại Phí";
      $view_data['view_name'] = "fee/index.php";  
      $view_data['model'] = $feeManager->GetList();
  		break;
  	}
    
  }

?>