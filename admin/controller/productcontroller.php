<?php 
  include '../model/class.productManager.php';
  include '../model/class.categoryManager.php';
  include '../model/class.locationManager.php';
  include '../model/class.directionManager.php';
  include '../model/nocsrf.php';

  $categoryManager = new CategoryManager();
  $productManager = new ProductManager();
  $locationManager = new LocationManager();
  $directionManager = new DirectionManager();

  switch($action)
  {
  	case "index":
  	{
  		$view_data['title'] = "Danh Sách Dự Án";
  		$view_data['view_name'] = "product/index.php";	
  		$view_data['section_styles'] = "product/style_index.php";
  		$view_data['section_scripts'] = "product/script_index.php";
  		$view_data['model'] = $productManager->GetList();
  		break;
  	}
    case "create":
    {
      $view_data['title'] = "Thêm Dự Án";
      $view_data['view_name'] = "product/create.php";
      $view_data['categories'] = $categoryManager->GetList();
      $view_data['directions'] = $directionManager->GetList();
      $view_data['section_scripts'] = "product/script_form.php";
      if(isset($_POST['Name']))
      {
        try 
        {  
          $view_data['errors'] = $productManager->GetErrorsMessage($_POST, true, true);

          if($locationManager->CheckExistStreetName($_POST['Street']) == false){
             $view_data['errors'][] = "Tên đường này không tồn tại. Vui lòng kiểm tra và nhập lại cho đúng.";
          }     

          $_POST['Image'] = null;
          if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name'])) {
              $check = getimagesize($_FILES["file"]["tmp_name"]);
              if($check !== false)
              {
                $name = $_FILES["file"]["name"];
                $ext = end((explode(".", $name))); # extra () to prevent notice
                $_POST['Image'] = $_POST['Alias'].".".$ext;
                $result = UploadImageFile(SITE_PATH."/images/products/".$_POST['Image']);
                if($result != 1)
                {
                  $view_data['errors'][] = $result;
                }
              }
          }

          $_POST['UserCreated'] = $_SESSION['UserLogged']['UserName'];
          $_POST['Status'] = isset($_POST['Status']) ? 1 : 0;

          if(count($view_data['errors']) == 0)
          {
            $result = $productManager->Add($_POST);
            
            if($result)
            {
               header("Location: ".base_url_admin."/product"); 
               exit();
            }
            else 
              $view_data['errors'][] = "Đã có lỗi xảy ra";
          }
        }
        catch(Exception $ex)
        {
          $view_data['errors'][] = $ex->getMessage();
        }
      } 
      break;
    }
    case "edit":
    {
      $view_data['title'] = "Sửa Dự Án";
      $view_data['view_name'] = "product/edit.php";
      $view_data['section_scripts'] = "product/script_form.php";
      $view_data['model'] = $productManager->GetById((int)$_GET['id']);
      if($view_data['model'] == null)
      {
        header("Location: ".base_url."/pages/404");
      }
      $view_data['directions'] = $directionManager->GetList();
      $view_data['categories'] = $categoryManager->GetList();
      
      if(isset($_POST['Name']))
      {
        try 
        {  
          $view_data['errors'] = $productManager->GetErrorsMessage($_POST, $_POST['Name_Old'] != $_POST['Name'], $_POST['Alias_Old'] != $_POST['Alias'] );

          if($locationManager->CheckExistStreetName($_POST['Street']) == false){
             $view_data['errors'][] = "Tên đường này không tồn tại. Vui lòng kiểm tra và nhập lại cho đúng.";
          }

          if(isset($_FILES["file"]) && !empty($_FILES['file']['tmp_name']))
          {
              $check = getimagesize($_FILES["file"]["tmp_name"]);
              if($check !== false)
              {
                $name = $_FILES["file"]["name"];
                $ext = end((explode(".", $name))); # extra () to prevent notice
                $_POST['Image'] = $_POST['Alias']. (microtime(true) * 10000000).".".$ext;
                $result = UploadImageFile(SITE_PATH."/images/products/".$_POST['Image']);
                
                if($result != 1)
                  $view_data['errors'][] = $result; 
              }
          }

          if(count($view_data['errors']) == 0)
          {
            $result = $productManager->Edit($_POST);
            if($result)
              header("Location: ".base_url_admin."/product"); 
            else 
              $view_data['errors'][] = "Đã có lỗi xảy ra";
            
          }
        }
        catch(Exception $ex)
        {
          $view_data['errors'][] = $ex->getMessage();
        }
      } 
      break;
    }
  	case "delete":
  	{
  		if(isset($_POST['Id']))
  		{
  			try 
  			{
  				$id = (int)$_POST['Id'];
  				$result = $productManager->Delete($id);
  				if($result)
  				 	header('Location:'.base_url_admin."/product");
  				else 
  					$view_data['errors'][] = "Đã có lỗi xảy ra";
  			}
  			catch (Exception $ex)
        {
            $view_data['errors'][] = $ex->getMessage();
        }  
  		}
      $view_data['title'] = "Danh Sách Dự Án";
      $view_data['view_name'] = "product/index.php";  
      $view_data['section_styles'] = "product/style_index.php";
      $view_data['section_scripts'] = "product/script_index.php";
      $view_data['model'] = $productManager->GetList();
  		break;
  	}
    
  }

?>