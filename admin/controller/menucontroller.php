<?php 
  include '../model/class.menuManager.php';

  $menuManager = new MenuManager();
  
  switch($action)
  {
    case "getListJson":
    {
      $menu = $menuManager->GetList(); 
      echo json_encode($menu);
      exit();
    }
    case "getEditForm":
    {
      
      $view_data['model'] = $menuManager->GetById($_GET['id']);
      $view_data['menus'] = $menuManager->GetList();
      include "partial/_formEditMenu.php";
      exit();
    }
  	case "index":
  	{
  		$view_data['title'] = "Danh sách Menu";
  		$view_data['view_name'] = "menu/index.php";	
  		$view_data['section_styles'] = "menu/style_index.php";
  		$view_data['section_scripts'] = "menu/script_index.php";
  		$view_data['model'] = $menuManager->GetList();
  		break;
  	}
    case "create":
    {

      $view_data['errors'] = $menuManager->GetErrorsMessage($_POST['Name']);
      $_POST['IsShow'] = isset($_POST['IsShow']);
      $_POST['MenuParentId'] = isset($_POST['MenuParentId']) && $_POST['MenuParentId'] != "" ? $_POST['MenuParentId'] : null;
      if(count($view_data['errors']) == 0)
      {
        $result = $menuManager->Add($_POST);
        if($result)
        {
          echo "1";
          exit();
        }  
        else 
        {
          $view_data['errors'][] = "Đã có lỗi xảy ra";
        }
      }    
      echo ConvertListErrorToString($view_data['errors']);
      exit();
    }
    case "edit":
    {
      $view_data['errors'] = $menuManager->GetErrorsMessage($_POST['Name']);
      $_POST['IsShow'] = isset($_POST['IsShow']);
      $_POST['MenuParentId'] = isset($_POST['MenuParentId']) && $_POST['MenuParentId'] != "" ? $_POST['MenuParentId'] : null;
      if(count($view_data['errors']) == 0)
      {
        $result = $menuManager->Edit($_POST);
        if($result)
        {
          echo "1";
          exit();
        }  
        else 
        {
          $view_data['errors'][] = "Đã có lỗi xảy ra";
        }
      }    
      echo ConvertListErrorToString($view_data['errors']);
      exit();
    }
  	case "delete":
  	{
			$result = $menuManager->Delete($_GET['id']);
			if($result)
			{
        echo "1";
        exit();
      }	
			else 
				$view_data['errors'][] = "Đã có lỗi xảy ra";

  		echo ConvertListErrorToString($view_data['errors']);
      exit();
  		
  	}
    
  }

?>