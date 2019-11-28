<?php 
    include_once 'model/class.slideManager.php';
    include_once 'model/class.productManager.php';
    include_once 'model/class.newManager.php';

    $slideManager = new SlideManager();
    $productManager = new ProductManager();
    $newManager = new NewManager();

    switch($action)
    {

        case "index":
        {
            $view_data['title'] = "Trang Chủ";
            $view_data['view_name'] = "home/index.php";	
			$view_data['section_styles'] = "home/styles.php";
			$view_data['section_scripts'] = "home/scripts.php";
            $view_data['products'] = $productManager->GetList(1);
            $view_data['news'] = $newManager->GetTop10New();
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

