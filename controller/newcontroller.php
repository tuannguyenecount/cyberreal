<?php 
    include_once 'model/class.newManager.php';

    $newManager = new NewManager();

    switch($action)
    {
        case "index":
        {
            $view_data['title'] = "Tin tức";
            $view_data['view_name'] = "new/index.php";
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $take = 10;
            $skip = 10 * ($page - 1);
            $view_data['model'] = $newManager->GetListArticleShow($skip, $take);
            $view_data['totalPage'] = $newManager->GetTotalPage(10);
            $view_data['urlCurrent'] = base_url."/tin-tuc.html";
            break;
        }
        case "details":
        {
            $view_data['model'] = $newManager->GetArticleShowByAlias($_GET['alias']);
            if($view_data['model'] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404/index.html");
            }
            $view_data['title'] = $view_data['model']['Title'];
            $view_data['view_name'] = "new/details.php";
            break;
        }
         case "getbycategory":
        {
            $alias = $_GET['alias'];
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $view_data['pageCurrent'] = $page;
            $view_data['urlCurrent'] = base_url.$alias.".html";
            $categoryModel = $category->GetByAlias($alias);
            if($categoryModel[0] == null)
            {
                header("HTTP/1.0 404 Not Found");
                header("Location: ".base_url."/pages/404/index.html");
            }
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $view_data['pageCurrent'] = $page;
            $view_data['categories'] = $category->GetList(1);
            $take = 10;
            $view_data['articles'] = $article->GetListByCategoryId($categoryModel[0],  $take * ($page - 1), $take); 
            $view_data['categoryModel'] = $categoryModel;
            $view_data['view_name'] = "article/index.php";
            $view_data['section_styles'] = "article/styles.php";
            $view_data['section_scripts'] = "article/scripts.php";
            $view_data['title'] = $categoryModel[1];
            $view_data['totalPage'] = ceil(count($article->GetListByCategoryId($categoryModel[0])) / $take);
            break;
        }
    }

