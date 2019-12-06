<?php 
  include '../model/class.productManager.php';
  include '../model/class.newManager.php';
  include '../model/class.bookingManager.php';

  $productManager = new ProductManager();
  $newManager = new NewManager();
  $bookingManager = new BookingManager();
  
  switch($action)
  {
  	case "index":
  	{
  		$view_data['title'] = "Bảng Điều Khiển";
  		$view_data['view_name'] = "dashboard/index.php";	
  		$view_data['section_styles'] = "dashboard/style_index.php";
  		$view_data['section_scripts'] = "dashboard/script_index.php";
  		break;
  	}
    
  }

?>