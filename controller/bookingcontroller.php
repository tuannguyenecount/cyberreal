<?php 
    include_once 'model/class.productManager.php';
    include_once 'model/class.bookingManager.php';

    $productManager = new ProductManager();
    $bookingManager = new BookingManager();

    switch($action)
    {
        case "viewProductsSaved":
        {       
            $view_data['title'] = "Danh sách căn hộ đã lưu";
            $view_data['view_name'] = "booking/viewProductsSaved.php";
            $view_data['section_scripts'] = "booking/viewProductsSavedScripts.php";
            $view_data['model'] = isset($_SESSION['productSaved']) ? $_SESSION['productSaved'] : array();
            if(isset($_POST['Name']))
            {

                $view_data['errors'] = $bookingManager->GetErrorsMessage($_POST);
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                $_POST['BookingCode'] = NEWGUID();
                if(count($view_data['errors']) == 0)
                {
                    $result = $bookingManager->Add($_POST);
                    if($result)
                    {
                        foreach($_SESSION['productSaved'] as $item)
                        {
                            $bookingObject = $bookingManager->GetByBookingCode($_POST['BookingCode']);
                            $bookingDetailObject =  array();
                            $bookingDetailObject['BookingId'] = $bookingObject['Id'];
                            $bookingDetailObject['ProductId'] = $item['Id'];
                            $bookingDetailObject['ProductImage'] = $item['Image'];
                            $bookingDetailObject['ProductName'] = $item['Name'];
                            $bookingDetailObject['ProductPrice'] = $item['Price'];
                            $bookingDetailObject['ProductLink'] = base_url."/".$item['CategoryAlias']."/".$item['Alias'].".html";
                            $bookingDetailObject['ProductAddress'] = "Đường ".$item['Street'].", ".$item['WardName'].", ".$item['DistrictName'];
                            $bookingDetailObject['DayToSee'] = $_POST['DayToSee'.$item['Id']];
                            $result = $bookingManager->AddDetail($bookingDetailObject);
                        }
                        $_SESSION['productSaved'] = array();
                        header("Location: ".base_url."/cam-on.html");
                    }
                    else 
                    {
                        $view_data['errors'][] = "Thêm lịch hẹn xem bị lỗi!";
                    }
                }
            }
            break;
        }
        case "removeSaved":
        {
            unset($_SESSION['productSaved'][$_GET['id']]);
            header("Location: ".base_url."/hen-di-xem.html");
            break;
        }
        case "thankyou":
        {
            $view_data['title'] = "Chân thành cám ơn";
            $view_data['view_name'] = "booking/thankyou.php";
            break;
        }
    }

