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
      $view_data['model'] = $mailBoxManager->GetListContact($_SESSION['UserLogged']['UserName']);
      break;
  	}
  	case "delete":
  	{
  		foreach($_POST['dsXoa'] as $Id)
      {
          $mailBoxManager->Delete($Id);
      }
      header("Location: ".base_url_admin."/mailbox");
  		break;
  	}
    case "confirm":
    {
      $mailBoxManager->Confirm($_SESSION['UserLogged']['UserName'], (int)$_GET['id']);
      header("Location: ".base_url_admin."/mailbox");
      break;
    }
    
  }

?>