<?php 
    include_once 'model/class.locationManager.php';
    $locationManager = new LocationManager();

    switch($action)
    {
        case "GetDistrictsByProvince":
        {
            $model = $locationManager->GetDistrictsByProvince($_POST['Province']);
            include 'partial/loadlocation.php'; 
            exit();
        }
        case "GetWardsByDistrict":
        {
            $model = $locationManager->GetWardsByDistrict($_POST['District']);
            include 'partial/loadlocation.php'; 
            exit();
        }
        case "GetStreetsByDistrict":
        {
            $model = $locationManager->GetStreetsByDistrict($_POST['District']);
            include 'partial/loadlocation.php'; 
            exit();
        }
    }

