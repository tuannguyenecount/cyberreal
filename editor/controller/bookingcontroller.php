<?php 
  include '../model/class.bookingManager.php';
  
  $bookingManager = new BookingManager();
  
 
  switch($action)
  {
  	case "index":
  	{
      $view_data['title'] = "Lịch hẹn xem";
      $view_data['view_name'] = "booking/index.php";	
      $view_data['section_styles'] = "booking/style_index.php";
      $view_data['section_scripts'] = "booking/script_index.php";
      $view_data['model'] = $bookingManager->GetList($_SESSION['UserLogged']['UserName']);
      break;
  	}
    case "viewdetail":
    {
      $view_data['model'] = $bookingManager->GetListDetail($_GET['id']);
      $view_data['id'] = $_GET['id'];
      include 'partial/booking/viewdetail.php';
      exit();
    }
  }

?>