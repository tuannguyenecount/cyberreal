<?php 
    include_once 'model/class.locationManager.php';
    include_once 'model/class.directionManager.php';
    include_once 'model/class.productManager.php';
    include_once 'model/class.categoryManager.php';
    include_once 'model/class.menuManager.php';

    $locationManager = new LocationManager();
    $directionManager = new DirectionManager();
    $productManager = new ProductManager();
    $categoryManager = new CategoryManager();
    $menuManager = new menuManager();

    switch($action)
    {

        case "_searchPartial":
        {
            if(CheckDeviceIsMobile())
            {
                $view_data['districts'] = $locationManager->GetDistrictIsGhim();
            }
            else 
            {
              $view_data['districts'] = $locationManager->GetDistrictsByProvince(1);
            }
            $view_data['directions'] = $directionManager->GetList();
            $view_data['areas'] = $productManager->GetListArea(10);
            $view_data['prices']  = $productManager->GetListPrice(10);
            include 'partial/search.php';
            exit();
        }
        case "navbar":
        {
            $view_data['districts'] = $locationManager->GetDistrictsByProvince(1);
            $view_data['menuParentHead'] = $menuManager->GetListMenuShowByParentIsNull();
            $view_data['menu'] = $menuManager->GetList(null);
            include 'partial/navbar.php';
            exit();
        }
        case "filters":
        {
            $view_data['directions'] = $directionManager->GetList();
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            include 'partial/filters.php';
            exit();
        }
    }

