<?php 
    include_once 'model/class.slideManager.php';
    include_once 'model/class.productManager.php';
    include_once 'model/class.newManager.php';
    include_once 'model/class.mailBoxManager.php';
    include_once 'model/class.slideManager.php';
    include_once 'phpMailer/class.phpmailer.php';
    include_once 'model/class.popupManager.php';

    $slideManager = new SlideManager();
    $productManager = new ProductManager();
    $newManager = new NewManager();
    $productManager = new ProductManager();
    $mailBoxManager = new MailBoxManager();
    $popupManager = new PopupManager();
    
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
            $view_data['news'] = $newManager->GetTopNew();
            if(count($view_data['news']) > 0)
            {
                $view_data['firstNew'] = $view_data['news'][0];
            }
            $view_data['slides'] = $slideManager->GetListShow();
            $view_data['productsHOT'] = $productManager->GetProductsHot();
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
                    $result = $mailBoxManager->AddContact($_POST);
                    if($result)
                    {
                        // try 
                        // {

                        //     $mail = new PHPMailer();
                        //     $mail->SMTPOptions = array(
                        //         'ssl' => array(
                        //             'verify_peer' => false,
                        //             'verify_peer_name' => false,
                        //             'allow_self_signed' => true
                        //         )
                        //     );
                        //     $mail->IsSMTP();
                        //     $mail->CharSet = 'UTF-8';
                        //     $mail->Host = "sng122.hawkhost.com"; // SMTP server example
                        //     $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
                        //     $mail->SMTPAuth = true;                  // enable SMTP authentication
                        //     $mail->Port = 465;                    // set the SMTP port for the GMAIL server
                        //     $mail->Username = "contact@canho247.com.vn"; // SMTP account username example
                        //     $mail->Password = "v4O}-3?.S5Bu";        // SMTP account password example
                        //     $mail->SMTPSecure = "ssl";
                        //     $subject = "Khách hàng ".$_POST['Name']. " đã gửi lời nhắn đến website canho247.com.vn";    
                        //     $body = "Họ tên: <b>" . $_POST['Name'] . "</b><br/>Email: <b>" . $_POST['Email'] . "</b><br/>Điện thoại: <b>".$_POST['Phone']."</b><br/> Nội dung: <b>" . $_POST['Content'] . "</b><br/>Gửi vào lúc " .date("d/m/Y H:i:s A");
                        //     $mail->SetFrom($mail->Username, "CanHo247.Com.Vn");
                        //     $mail->AddAddress("admin@canho247.com.vn", $subject);
                        //     $mail->Subject = $subject;
                        //     $mail->IsHTML(true);
                        //     $mail->Body = $body;
                        //     $result = $mail->Send();
                        //     echo "send";
                        //     exit();
                        // } 
                        // catch (Exception $ex) 
                        // {
                        //     echo $ex->getMessage();
                        //     exit();
                        // }
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
        case "showpopup":
        {
            $view_data['model'] = $popupManager->Get();
            if($view_data['model'] == null || $view_data['model']['IsShow'] == false )
            {
                echo "";
                exit();
            }
            include 'partial/_popup.php';
            exit();
        }
    }

