<?php 
  include '../model/class.mailBoxManager.php';
  
  $mailBoxManager = new MailBoxManager();
  
 
  switch($action)
  {
  	case "index":
  	{
      $view_data['title'] = "Hộp thư";
      $view_data['view_name'] = "mailbox/index.php";	
      $view_data['section_styles'] = "mailbox/style_index.php";
      $view_data['section_scripts'] = "mailbox/script_index.php";
      $view_data['model'] = $mailBoxManager->GetList();
      break;
  	}
  	case "delete":
  	{
  		if(isset($_POST['id']) && isset($_POST['csrf_token']))
  		{
  			try 
  			{
  				$id = (int)$_POST['id'];
  				$result = $bannerModel->Delete($id);
  				if($result)
  				 	header('Location:'.base_url_admin."/banner");
  				else 
  					$view_data['errors'][] = "Đã có lỗi xảy ra";
  			}
  			catch ( Exception $e )
        {
            $view_data['errors'][] = $e->getMessage();
        }  
  		}
  		$view_data['title'] = "Banner";
  		$view_data['view_name'] = "banner/index.php";	
  		$view_data['section_styles'] = "banner/style_index.php";
  		$view_data['section_scripts'] = "banner/script_index.php";
  		$view_data['model'] = $bannerModel->GetList();
  		break;
  	}
    
  }

?>