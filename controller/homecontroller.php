<?php 
    include_once 'model/class.slideManager.php';
    include_once 'model/class.productManager.php';
    include_once 'model/class.newManager.php';
    include_once 'model/class.mailBoxManager.php';
    include_once 'model/class.slideManager.php';
    include_once 'model/class.popupManager.php';
    include_once 'model/class.advertisementManager.php';
    include_once 'model/class.investorManager.php';

    $slideManager = new SlideManager();
    $productManager = new ProductManager();
    $newManager = new NewManager();
    $productManager = new ProductManager();
    $mailBoxManager = new MailBoxManager();
    $popupManager = new PopupManager();
    $avertisementManager = new AdvertisementManager();
    $investorManager = new InvestorManager();
    
    switch($action)
    {

        case "index":
        {
            $view_data['title'] = "Trang Chủ";
            $view_data['view_name'] = "home/index.php";	
			$view_data['section_styles'] = "home/styles.php";
			$view_data['section_scripts'] = "home/scripts.php";
            $view_data['section_meta'] = "home/meta.php";
            $view_data['products'] = $productManager->GetListNew();
            $view_data['news'] = $newManager->GetTopNew(4);
            $view_data['advertisements'] = $avertisementManager->GetList();
            if(count($view_data['news']) > 0)
            {
                $view_data['firstNew'] = $view_data['news'][0];
            }
            $view_data['slides'] = $slideManager->GetListShow();
            $view_data['productsHOT'] = $productManager->GetProductsHot();
            $view_data['investors'] = $investorManager->GetList();
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
                // if(CheckRecaptchav2() == false)
                // {
                //     $view_data['errors'][] = "Mã xác nhận không đúng!";
                // }
                if(empty($_POST['Content']))
                {
                    $view_data['errors'][] = "Lời nhắn không được để trống!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $_POST['TenForm'] = "Liên hệ";
                    $_POST['DuAnQuanTam'] = null;
                    $_POST['Link'] = null;
                    $_POST['NhanBaoGiaChiTiet'] = false;
                    $_POST['NhanPhanTichDuAn'] = false;
                    $result = $mailBoxManager->Add($_POST);
                    if($result)
                    {
                        try 
                        {
                            $subject = "Khách hàng ".$_POST['Name']. " đã gửi lời nhắn đến website canho247.com.vn";    
                            $body = "Họ tên: <b>" . $_POST['Name'] . "</b><br/>Email: <b>" . $_POST['Email'] . "</b><br/>Điện thoại: <b>".$_POST['Phone']."</b><br/> Nội dung: <b>" . $_POST['Content'] . "</b><br/>Gửi vào lúc " .date("d/m/Y H:i:s A");
                            SendMail("nguyenaituan95@gmail.com",$subject, $body);
                        } 
                        catch (Exception $ex) 
                        {
                            echo $ex->getMessage();
                            exit();
                        }
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

        case "dangkyxemnhamau":
        {
            if(isset($_POST['Name']))
            {
                $_POST['TenForm'] = "Đăng ký xem nhà mẫu";   
                $productObj = $productManager->GetById($_GET['id']);             
                $_POST['DuAnQuanTam'] = $productObj['Name'];
                $_POST['Link'] = base_url."/".$productObj['CategoryAlias']."/".$productObj['Alias'].".html";
                $_POST['NhanBaoGiaChiTiet'] = false;
                $_POST['NhanPhanTichDuAn'] = false;
                $_POST['Content'] = null;
                $view_data['errors'] = $mailBoxManager->GetErrorsMessage($_POST);
                if(count($view_data['errors']) == 0)
                {
                    $result = $mailBoxManager->Add($_POST);
                    if($result)
                    {
                        echo "1";
                        $subject = "Khách hàng ".$_POST['Name']. " vừa thực hiện đăng ký xem nhà mẫu dự án ".$_POST['DuAnQuanTam'];    
                        $body = "Họ tên: <b>" . $_POST['Name'] . "</b><br/>Email: <b>" . $_POST['Email'] . "</b><br/>Điện thoại: <b>".$_POST['Phone']."</b><br/> Dự án khách quan tâm: <b><a href='".$_POST['Link']."' rel='nofollow' target='_blank'>" . $_POST['DuAnQuanTam'] . "</a></b><br/>Gửi vào lúc " .date("d/m/Y H:i:s A");
                        SendMail("nguyenaituan95@gmail.com",$subject, $body);
                    }
                    else 
                    {
                        echo "Đã có lỗi xảy lỗi.";
                    }
                }
                else 
                {
                    echo ConvertListErrorToString($view_data['errors']);
                }  
            }
            else 
            {
                include 'partial/dangkyxemnhamau.php';
            }
            exit();
        }
        case "dangkynhanbanggia":
        {
            if(isset($_POST['Name']))
            {
                $_POST['TenForm'] = "Đăng ký nhận bảng giá";   
                $productObj = $productManager->GetById($_GET['id']);             
                $_POST['DuAnQuanTam'] = $productObj['Name'];
                $_POST['Link'] = base_url."/".$productObj['CategoryAlias']."/".$productObj['Alias'].".html";
                $_POST['NhanBaoGiaChiTiet'] = isset($_POST['NhanBaoGiaChiTiet']);
                $_POST['NhanPhanTichDuAn'] = isset($_POST['NhanPhanTichDuAn']);
                $_POST['Content'] = null;
                $view_data['errors'] = $mailBoxManager->GetErrorsMessage($_POST);
                if(count($view_data['errors']) == 0)
                {
                    $result = $mailBoxManager->Add($_POST);
                    if($result)
                    {
                        echo "1";
                        $subject = "Khách hàng ".$_POST['Name']. " vừa thực hiện đăng ký nhận bảng giá dự án ".$_POST['DuAnQuanTam'];    
                        $body = "Họ tên: <b>" . $_POST['Name'] . "</b><br/>Email: <b>" . $_POST['Email'] . "</b><br/>Điện thoại: <b>".$_POST['Phone']."</b><br/> Dự án khách quan tâm: <b><a href='".$_POST['Link']."' rel='nofollow' target='_blank'>" . $_POST['DuAnQuanTam'] . "</a></b><br/>Nhận báo giá chi tiết: <b>".($_POST['NhanBaoGiaChiTiet'] ? "Có" : "Không")."</b><br/>Nhận phân tích dự án từ chuyên gia: <b>".($_POST['NhanPhanTichDuAn'] ? "Có" : "Không")."</b> <br/>Gửi vào lúc " .date("d/m/Y H:i:s A");
                        SendMail("nguyenaituan95@gmail.com",$subject, $body);
                    }
                    else 
                    {
                        echo "Đã có lỗi xảy lỗi.";
                    }
                }   
                else 
                {
                    echo ConvertListErrorToString($view_data['errors']);
                }      
            }
            else 
            {
                include 'partial/dangkynhanbanggia.php';
            }           
            exit();
        }
        case "hoithemthongtin":
        {
            if(isset($_POST['Name']))
            {
                $_POST['TenForm'] = "Hỏi thêm thông tin";   
                $productObj = $productManager->GetById($_GET['id']);             
                $_POST['DuAnQuanTam'] = $productObj['Name'];
                $_POST['Link'] = base_url."/".$productObj['CategoryAlias']."/".$productObj['Alias'].".html";
                $_POST['NhanBaoGiaChiTiet'] = false;
                $_POST['NhanPhanTichDuAn'] = false;
                $view_data['errors'] = $mailBoxManager->GetErrorsMessage($_POST);
                if(count($view_data['errors']) == 0)
                {
                    $result = $mailBoxManager->Add($_POST);
                    if($result)
                    {
                        echo "1";
                        $subject = "Khách hàng ".$_POST['Name']. " vừa thực hiện hỏi thêm thông tin về dự án ".$_POST['DuAnQuanTam'];    
                        $body = "Họ tên: <b>" . $_POST['Name'] . "</b><br/>Email: <b>" . $_POST['Email'] . "</b><br/>Điện thoại: <b>".$_POST['Phone']."</b><br/> Dự án khách quan tâm: <b><a href='".$_POST['Link']."' rel='nofollow' target='_blank'>" . $_POST['DuAnQuanTam'] . "</a></b><br/> Nội dung: <b>" . $_POST['Content'] . "</b><br/>Gửi vào lúc " .date("d/m/Y H:i:s A");
                        SendMail("nguyenaituan95@gmail.com",$subject, $body);
                    }
                    else 
                    {
                        echo "Đã có lỗi xảy lỗi.";
                    }
                }   
                else 
                {
                    echo ConvertListErrorToString($view_data['errors']);
                }      
            }
            else 
            {
                include 'partial/hoithemthongtin.php';
            }
            exit();
        }

    }

