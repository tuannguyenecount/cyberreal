<?php 
    include_once 'model/class.newManager.php';
    include_once 'model/class.locationManager.php';

    $newManager = new NewManager();
    $locationManager = new LocationManager();

    switch($action)
    {
        case "index":
        {
            $view_data['title'] = "Tin tức";
            $view_data['view_name'] = "new/index.php";
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $take = 10;
            $skip = 10 * ($page - 1);
            $view_data['model'] = $newManager->GetListArticleShow($skip, $take);
            $view_data['totalPage'] = $newManager->GetTotalPage(10);
            $view_data['urlCurrent'] = base_url."/tin-tuc.html";
            break;
        }
        case "getbytag":
        {
            $tag = $_GET['tag'];
            $view_data['title'] = "Tin tức theo tag ".$tag;
            $view_data['view_name'] = "new/index.php";
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $take = 10;
            $skip = 10 * ($page - 1);
            $view_data['model'] = $newManager->GetListByTag($tag, $skip, $take);
            $view_data['totalPage'] = $newManager->GetTotalPage(10);
            $view_data['urlCurrent'] = base_url."/tin-tuc/tin-theo-tag/".$tag;
            break;
        }
        case "details":
        {
            $view_data['model'] = $newManager->GetArticleShowByAlias($_GET['alias']);
            $view_data['districtsOnProduct'] = $locationManager->GetDistrictsOnProduct();
            $view_data['streetsOnProduct'] = $locationManager->GetStreetsOnProduct();
            $view_data['section_meta'] = "new/metadetail.php";
            if($view_data['model'] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404/index.html");
            }
            if(empty($view_data['model']['Tags']) == false)
            {
                $view_data['articleSameTag'] = $newManager->GetListArticleSameTag($view_data['model']['Id'], $view_data['model']['Tags']);  
            }
            else {
                $view_data['articleSameTag'] = array();
            }
            $view_data['title'] = $view_data['model']['Title'];
            $view_data['section_styles'] = "new/styles.php";
            $view_data['view_name'] = "new/details.php";
            break;
        }
    }

