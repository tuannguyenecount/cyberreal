<?php 
    include_once 'model/class.locationManager.php';
    include_once 'model/class.directionManager.php';
    include_once 'model/class.productManager.php';

    $locationManager = new LocationManager();
    $directionManager = new DirectionManager();
    $productManager = new ProductManager();

    switch($action)
    {

        case "_searchPartial":
        {
            $view_data['districts'] = $locationManager->GetDistrictsByProvince(1);
            $view_data['directions'] = $directionManager->GetList();
            $view_data['areas'] = $productManager->GetListArea(10);
            include 'partial/search.php';
            exit();
        }
    }

