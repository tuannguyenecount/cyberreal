<?php 
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
//        $view_data['section_scripts'] = "project/scripts.php"; 
//        $view_data['section_styles'] = "project/styles_detail.php"; 
        break;
    }
  }

