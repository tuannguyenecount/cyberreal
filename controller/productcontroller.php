<?php 
    include_once 'model/class.productManager.php';
    include_once 'model/class.locationManager.php';
    include_once 'model/class.directionManager.php';

    $productManager = new ProductManager();
    $locationManager = new LocationManager();
    $directionManager = new DirectionManager();

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
            $view_data['model'] = $productManager->GetProductShowByAlias($_GET['alias']);
            if($view_data['model'] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404.html");
            }
            $view_data['imagesProduct'] = $productManager->GetImagesFromProduct($view_data['model']['Id']);
            $view_data['streets'] = $locationManager->GetStreetsOnProductByDistrict($view_data['model']['District']);
            $view_data['directions'] = $directionManager->GetList();
            $view_data['section_scripts'] = "product/scripts.php"; 
            $view_data['section_styles'] = "product/styles.php"; 
            break;
        }
    }

