<?php 
  include '../model/class.infoWebManager.php';

  $infoWebManager = new InfoWebManager();
  
  switch($action)
  {
    case "edit":
    {
      $view_data['title'] = "Thông tin website";
      $view_data['view_name'] = "infoweb/edit.php";
      $view_data['model'] = $infoWebManager->Get();
      if(isset($_POST['WebName']))
      {
        $result = $infoWebManager->Edit($_POST);
        if($result)
        {
          $_SESSION['InfoWeb'] = $infoWebManager->Get();
          header("Location: ".base_url_admin."/infoweb/edit");
        }
        else 
        {
          $view_data['errors'][] = "Xảy ra lỗi khi sửa dữ liệu!";
        }
      }
      break;
    }
    
  }

?>