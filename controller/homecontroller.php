<?php 
    include_once 'model/class.slideManager.php';
    
    $slide = new Slide();
    switch($action)
    {

        case "index":
        {
            $view_data['title'] = "Trang Chủ";
            $view_data['view_name'] = "home/index.php";	
//		$view_data['section_styles'] = "home/styles.php";
//		$view_data['section_scripts'] = "home/scripts.php";
            break;
        }
        case "contact":
        {
            $view_data['title'] = "Liên Hệ";
            $view_data['view_name'] = "home/contact.php";
            $view_data['section_scripts'] = "home/contact_scripts.php";
            break;
        }
    }

