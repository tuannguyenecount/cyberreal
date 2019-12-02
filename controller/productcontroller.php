<?php 
    include_once 'model/class.productManager.php';
    include_once 'model/class.locationManager.php';
    include_once 'model/class.directionManager.php';
    include_once 'model/class.feeManager.php';
    include_once 'model/class.bookingManager.php';

    $productManager = new ProductManager();
    $locationManager = new LocationManager();
    $directionManager = new DirectionManager();
    $feeManager = new FeeManager();
    $bookingManager = new BookingManager();

    switch($action)
    {
        case "index":
        {
            $view_data['title'] = "Index";
            $view_data['view_name'] = "product/index.php";
            break;
        }
        case "details":
        {
            $view_data['title'] = "Bài viết";
            $view_data['view_name'] = "product/details.php";
            $view_data['model'] = $productManager->GetProductShowByAlias($_GET['aliasProduct']);
            if($view_data['model'] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404/index.html");
            }
            $view_data['imagesProduct'] = $productManager->GetImagesProductByProductId($view_data['model']['Id']);
            $view_data['streets'] = $locationManager->GetStreetsOnProductByDistrict($view_data['model']['District']);
            $view_data['fees'] = $feeManager->GetListByProductId($view_data['model']['Id']);
            $view_data['directions'] = $directionManager->GetList();
            $view_data['section_scripts'] = "product/scripts.php"; 
            $view_data['section_styles'] = "product/styles.php"; 
            break;
        }
        case "select":
        {
            $Id = (int)$_GET['id'];
            $productObject = $productManager->GetById($Id);
            if(!isset($_SESSION['productSaved']))
            {
                $_SESSION['productSaved'] = array();
            }
            if(!isset($_SESSION['productSaved'][$productObject['Id']]))
            {
                $_SESSION['productSaved'][$productObject['Id']] = $productObject;
            }
            include 'partial/messageSaved.php';
            exit();
        }
        case "viewProductsSaved":
        {
            $view_data['title'] = "Danh sách căn hộ đã lưu";
            $view_data['view_name'] = "product/viewProductsSaved.php";
            $view_data['section_scripts'] = "product/viewProductsSavedScripts.php";
            $view_data['model'] = $_SESSION['productSaved'];
            if(!isset($_SESSION['productSaved']) || count($_SESSION['productSaved']) == 0)
            {
               header("Location: ".base_url);
            }
            else if(isset($_POST['Name']))
            {
                $view_data['errors'] = $bookingManager->GetErrorsMessage($_POST);
                $_POST['BookingCode'] = NEWGUID();
                if(count($view_data['errors']) == 0)
                {
                    $result = $bookingManager->Add($_POST);
                    if($result)
                    {
                        foreach($_SESSION['productSaved'] as $item)
                        {
                            $bookingObject = $bookingManager->GetByBookingCode($_POST['BookingCode']);
                            $bookingDetailObject = new BookingDetail();
                            $bookingDetailObject['BookingId'] = $bookingObject['Id'];
                            $bookingDetailObject['ProductId'] = $item['Id'];
                            $bookingDetailObject['ProductImage'] = $item['Image'];
                            $bookingDetailObject['ProductName'] = $item['Name'];
                            $bookingDetailObject['ProductPrice'] = $item['Price'];
                            $bookingDetailObject['ProductLink'] = base_url."/".$item['CategoryAlias']."/".$item['Alias'].".html";
                            $bookingDetailObject['ProductAddress'] = "Đường ".$item['Street'].", ".$item['WardName'].", ".$item['DistrictName'];
                            $bookingDetailObject['DayToSee'] = $_POST['DayToSee'.$item['Id']];
                            $bookingManager->AddDetail($bookingDetailObject);
                        }
                        header("Location: ")
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
    }

