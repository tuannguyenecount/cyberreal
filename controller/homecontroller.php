<?php 
    include_once 'model/class.slideManager.php';
    include_once 'model/class.productManager.php';
    include_once 'model/class.newManager.php';
    include_once 'model/class.mailBoxManager.php';

    $slideManager = new SlideManager();
    $productManager = new ProductManager();
    $newManager = new NewManager();
    $productManager = new ProductManager();
    $mailBoxManager = new MailBoxManager();
    
    switch($action)
    {

        case "index":
        {
            $view_data['title'] = "Trang Chủ";
            $view_data['view_name'] = "home/index.php";	
			$view_data['section_styles'] = "home/styles.php";
			$view_data['section_scripts'] = "home/scripts.php";
            $view_data['section_meta'] = "home/meta.php";
            $view_data['products'] = $productManager->GetList(1);
            $view_data['news'] = $newManager->GetTop10New();
            break;
        }
        case "contact":
        {
            $view_data['title'] = "Liên Hệ";
            $view_data['view_name'] = "home/contact.php";
            $view_data['section_scripts'] = "home/contact_scripts.php";

            if(isset($_POST['Name']))
            {
                $view_data['errors'] = $mailBoxManager->GetErrorsMessage($_POST);
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $result = $mailBoxManager->Add($_POST);
                    if($result)
                    {
                        header("location: ".base_url."/lien-he-thanh-cong.html");
                    }
                } 
            }

            break;
        }
        case "contactsuccess":
        {
            $view_data['title'] = "Liên hệ";
            $view_data['view_name'] = "home/contactsuccess.php";
            break;
        }
    }

