<?php 
    include_once 'model/class.productManager.php';
    include_once 'model/class.categoryManager.php';
    include_once 'model/class.locationManager.php';
    include_once 'model/class.directionManager.php';
    include_once 'model/class.feeManager.php';
    include_once 'model/class.bookingManager.php';

    $productManager = new ProductManager();
    $categoryManager = new CategoryManager();
    $locationManager = new LocationManager();
    $directionManager = new DirectionManager();
    $feeManager = new FeeManager();
    $bookingManager = new BookingManager();

    switch($action)
    {
        case "search":
        {

            $view_data['title'] = "Kết quả tìm kiếm";
            $view_data['view_name'] = "product/search.php";
            $Name = isset($_POST['Name']) ? $_POST['Name'] : "";
            $District = isset($_POST['District']) ? $_POST['District'] : "";
            $Ward = isset($_POST['Ward']) ? $_POST['Ward'] : "";
            $Street = isset($_POST['Street']) ? $_POST['Street'] : "";
            $Area = isset($_POST['Area']) ? $_POST['Area'] : "";
            $Price = isset($_POST['Price']) ? $_POST['Price'] : "";
            $Direction = isset($_POST['Direction']) ? $_POST['Direction'] : "";
            $view_data['model'] = $productManager->Search($Name, $District, $Ward, $Street, $Area, $Price, $Direction);
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            break;
        }
        case "index":
        {
            $view_data['title'] = "Index";
            $view_data['view_name'] = "product/index.php";
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            break;
        }
        case "getByDistrict":
        {
            $view_data['district'] = $locationManager->GetDistrictByAlias($_GET['alias']);
            $view_data['title'] = "Căn hộ ".$view_data['district']['_prefix']." ".$view_data['district']['_name'];
            $view_data['model'] = $productManager->GetProductsShowByDistrict($view_data['district']['id']);
            $view_data['view_name'] = "product/getByDistrict2.php";
            break;
        }
        case "getByStreet":
        {
            $view_data['street'] = $locationManager->GetStreetByAlias($_GET['alias']);
            $view_data['title'] = "Căn hộ đường ".$view_data['street']['Street'];
            $view_data['model'] = $productManager->GetProductsShowByStreet($view_data['street']['Street']);
            $view_data['view_name'] = "product/getByStreet.php";
            break;
        }
        case "getByDirection":
        {
            $view_data['direction'] = $locationManager->GetDirectionByAlias('huong-'.$_GET['alias']);
            $view_data['title'] = "Căn hộ ".$view_data['direction']['Name'];
            $view_data['model'] = $productManager->GetProductsShowByDirection($view_data['direction']['Id']);
            $view_data['view_name'] = "product/getByDirection.php";
            break;
        }
        case "details":
        {
            $view_data['view_name'] = "product/details.php";
            $view_data['model'] = $productManager->GetProductShowByAlias($_GET['aliasProduct']);
            if($view_data['model'] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404/index.html");
            }
            $view_data['title'] = $view_data['model']['Name'];
            $view_data['category'] = $categoryManager->GetById($view_data['model']['CategoryId']);
            $view_data['imagesProduct'] = $productManager->GetImagesProductByProductId($view_data['model']['Id']);
            $view_data['streets'] = $locationManager->GetStreetsOnProductByDistrict($view_data['model']['District']);
            $view_data['fees'] = $feeManager->GetListByProductId($view_data['model']['Id']);
            $view_data['section_scripts'] = "product/scripts.php"; 
            $view_data['section_styles'] = "product/styles.php"; 
            $view_data['section_meta'] = "product/metadetail.php"; 
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

    }

