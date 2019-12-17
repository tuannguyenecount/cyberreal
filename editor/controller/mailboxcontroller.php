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
      $view_data['model'] = $mailBoxManager->GetList($_SESSION['UserLogged']['UserName'], "Liên hệ");
      break;
  	}
    case "dangkyxemnhamau":
    {
      $view_data['title'] = "Đăng ký xem nhà mẫu";
      $view_data['view_name'] = "mailbox/dangkyxemnhamau.php";  
      $view_data['section_styles'] = "mailbox/style_index.php";
      $view_data['section_scripts'] = "mailbox/script_dangkyxemnhamau.php";
      $view_data['model'] = $mailBoxManager->GetList($_SESSION['UserLogged']['UserName'], "Đăng ký xem nhà mẫu");
      break;
    }
    case "dangkynhanbanggia":
    {
      $view_data['title'] = "Đăng ký nhận bảng giá";
      $view_data['view_name'] = "mailbox/dangkynhanbanggia.php";  
      $view_data['section_styles'] = "mailbox/style_index.php";
      $view_data['section_scripts'] = "mailbox/script_dangkynhanbanggia.php";
      $view_data['model'] = $mailBoxManager->GetList($_SESSION['UserLogged']['UserName'], "Đăng ký nhận bảng giá");
      break;
    }
    case "hoithemthongtin":
    {
      $view_data['title'] = "Hỏi thêm thông tin";
      $view_data['view_name'] = "mailbox/hoithemthongtin.php";  
      $view_data['section_styles'] = "mailbox/style_index.php";
      $view_data['section_scripts'] = "mailbox/script_hoithemthongtin.php";
      $view_data['model'] = $mailBoxManager->GetList($_SESSION['UserLogged']['UserName'], "Hỏi thêm thông tin");
      break;
    }
    case "confirm":
    {
      $mailBoxManager->Confirm($_SESSION['UserLogged']['UserName'], (int)$_GET['id']);
      header("Location: ".base_url_editor."/mailbox");
      break;
    }
    
  }

?>