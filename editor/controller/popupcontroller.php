<?php 
  include '../model/class.popupManager.php';
  $popupManager = new PopupManager();
  switch($action)
  {
  	case "index":
  	{
        $view_data['title'] = "Bảng Tin";
        $view_data['view_name'] = "popup/index.php";
        $view_data['section_scripts'] = "popup/script_index.php";
        $view_data['section_styles'] = "popup/style_index.php";
        $view_data['model'] = $popupManager->Get();
        if(count($_POST) > 0)
        {
          $_POST['IsShow'] = isset($_POST['IsShow']);
          $result = $popupManager->Edit($_POST);
          header("Location: ".base_url_editor."/popup");
        }
  		break;
  	}
    
  }

?>