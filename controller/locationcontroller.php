<?php 
    include_once 'model/class.locationManager.php';
    $locationManager = new LocationManager();

    switch($action)
    {
        case "GetDistrictsByProvince":
        {
            $model = $locationManager->GetDistrictsByProvince($_POST['Province']);
            $dataSelected = $_POST['dataSelected'];
            $showValueAll = isset($_POST['showValueAll']) ? (int)$_POST['showValueAll'] : 0;
            $textValueAll = "Tất cả quận huyện";
            include 'partial/loadlocation.php'; 
            exit();
        }
        case "GetWardsByDistrict":
        {
            $model = $locationManager->GetWardsByDistrict($_POST['District']);
            $dataSelected = $_POST['dataSelected'];
            $showValueAll = isset($_POST['showValueAll']) ? (int)$_POST['showValueAll'] : 0;
            $textValueAll = "Tất cả phường xã";
            include 'partial/loadlocation.php'; 
            exit();
        }
        case "GetStreetsByDistrict":
        {
            $model = $locationManager->GetStreetsByDistrict($_POST['District']);
            $dataSelected = $_POST['dataSelected'];
            $showValueAll = isset($_POST['showValueAll']) ? (int)$_POST['showValueAll'] : 0;
            $textValueAll = "Tất cả đường";
            include 'partial/loadlocation.php'; 
            exit();
        }
        case "GetListStreetNameByDistrict":
        {
            $model = $locationManager->GetListStreetNameByDistrict($_POST['District']);
            echo json_encode($model);
            exit();
        }
    }

