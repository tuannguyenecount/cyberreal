<?php 
  include '../model/class.productManager.php';
  include '../model/class.categoryManager.php';
  include '../model/class.locationManager.php';
  include '../model/class.directionManager.php';
  include '../model/class.feeManager.php';
  include '../model/nocsrf.php';

  $categoryManager = new CategoryManager();
  $productManager = new ProductManager();
  $locationManager = new LocationManager();
  $directionManager = new DirectionManager();
  $feeManager = new FeeManager();

  switch($action)
  {
    case "countProductNotShow":
    {
      $cnt = $productManager->CountProductNotShow();
      echo $cnt;
      exit();
    }
  	case "index":
  	{
  		$view_data['title'] = "Danh Sách Dự Án";
  		$view_data['view_name'] = "product/index.php";	
  		$view_data['section_styles'] = "product/style_index.php";
  		$view_data['section_scripts'] = "product/script_index.php";
  		$view_data['model'] = $productManager->GetListByUserCreated($_SESSION['UserLogged']['UserName']);
  		break;
  	}
    case "create":
    {
      $mt = microtime(true);
      $mt =  $mt*1000; //microsecs
      $ticks = (string)$mt*10; //100 Nanosecs
      $Name = "Tên dự án mới ".$ticks;
      $productManager->AddTemp($Name, $_SESSION['UserLogged']['UserName']);
      $product  = $productManager->GetByName($Name);
      header("Location: ".base_url_editor."/product/edit/".$product['Id']);
      break;
    }
    case "details":
    {
      $view_data['title'] = "Thông Tin Dự Án";
      $view_data['view_name'] = "product/details.php";
      $view_data['section_scripts'] = "product/script_form.php";
      $view_data['model'] = $productManager->GetById((int)$_GET['id']);
      if($view_data['model'] == null || $view_data['model']['UserCreated'] != $_SESSION['UserLogged']['UserName'] )
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      $view_data['directions'] = $directionManager->GetList();
      $view_data['categories'] = $categoryManager->GetList();
      $view_data['fees'] = $feeManager->GetListByProductId((int)$_GET['id']);
      break;
    }
    case "edit":
    {
      $view_data['title'] = "Sửa Dự Án";
      $view_data['view_name'] = "product/edit.php";
      $view_data['section_scripts'] = "product/script_form.php";
      $view_data['model'] = $productManager->GetById((int)$_GET['id']);
      if($view_data['model'] == null || $view_data['model']['UserCreated'] != $_SESSION['UserLogged']['UserName'] )
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      $view_data['directions'] = $directionManager->GetList();
      $view_data['categories'] = $categoryManager->GetList();
      $view_data['fees'] = $feeManager->GetListByProductId((int)$_GET['id']);
      if(isset($_POST['Name']))
      {
        try 
        {  
          $_POST['Status'] = 0;
          $view_data['errors'] = $productManager->GetErrorsMessage($_POST, $_POST['Name_Old'] != $_POST['Name'], $_POST['Alias_Old'] != $_POST['Alias'] );

          if(!empty($_POST['Street']) && $locationManager->CheckExistStreetName($_POST['Street']) == false){
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

          foreach($view_data['fees'] as $item)
          {
            $feeManager->UpdateOrInsertFeeProduct((int)$_GET['id'], $item['Id'], $_POST['Fee'.$item['Id']]);
          }

          if(count($view_data['errors']) == 0)
          {
            $result = $productManager->Edit($_POST);
            if($result)
              header("Location: ".base_url_editor."/product"); 
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
          $view_data['model'] = $productManager->GetById($id);
          if($view_data['model']['UserCreated'] != $_SESSION['UserLogged']['UserName'])
          {
            header('Location:'.base_url_editor."/product");
          }
          else 
          {
    				$result = $productManager->Delete($id);
    				if($result)
    				 	header('Location:'.base_url_editor."/product");
    				else 
    					$view_data['errors'][] = "Đã có lỗi xảy ra";
          }
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
    case "listcountimages":
    {
      $view_data['title'] = "Hình Ảnh Toàn Bộ Dự Án";
      $view_data['model'] = $productManager->GetListCountImagesFromProductByUserCreated($_SESSION['UserLogged']['UserName']);
      $view_data['view_name'] = "product/listcountimages.php";
      $view_data['section_styles'] = "product/style_index.php";
      $view_data['section_scripts'] = "product/script_index.php";
      break;
    }

    case "images":
    {
      $id = (int)$_GET['id'];
      $product = $productManager->GetById($id);
      if($product == null || $product['UserCreated'] != $_SESSION['UserLogged']['UserName'])
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      $view_data['title'] = "Hình Ảnh Của Dự Án ". $product['Name'];
      $view_data['model'] = $productManager->GetImagesProductByProductId($id);
      $view_data['view_name'] = "product/images.php";
      $view_data['section_styles'] = "product/style_index.php";
      $count = count($view_data['model']);
      if(isset($_FILES['files']) && count($_FILES["files"]['name']) > 0 && !empty($_FILES['files']['tmp_name'][0])) 
      {
        for($i = 0; $i < count($_FILES["files"]['name']); $i++)
        {
          $check = getimagesize($_FILES["files"]["tmp_name"][$i]);
          if($check !== false)
          {
            $name = $_FILES["files"]["name"][$i];
            $ext = end((explode(".", $name))); # extra () to prevent notice
            $mt = microtime(true);
            $mt =  $mt*1000; //microsecs
            $ticks = (string)$mt*10; //100 Nanosecs
            $fileName = $product['Alias']. $ticks.".".$ext;
            $result = UploadImageFileMultiple(SITE_PATH."/images/products/slides/".$fileName, "files", $i);
            if($result != 1)
            {
              $view_data['errors'][] = $result;
            } 
            else 
            {
              $imageProduct = array();
              $imageProduct['ProductId'] = $id;
              $imageProduct['Image'] =  $fileName;
              $imageProduct['OrderNum'] = (++$count) + 1;
              $result = $productManager->AddImage($imageProduct);
              if($result == false)
              {
                $view_data['errors'][] = "Xảy ra lỗi khi thêm vào CSDL.";
              }
            }
          }
          else 
          {
            $view_data['errors'][] = $check;
          }
        }
        if(count($view_data['errors']) == 0)
        {
          header("Location: ".base_url_editor."/product/images/".$id);
        }
      }
      break;
    }
    case "deleteimage":
    {
      $id = (int)$_POST['ProductId'];
      $product = $productManager->GetById($id);
      if($product == null || $product['UserCreated'] != $_SESSION['UserLogged']['UserName'])
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      else 
      {
        $productManager->DeleteImage($_POST['Id']);
        header("Location: ".base_url_editor."/product/images/".$id);
      }
      exit();
    }
    case "changeOrderNumImage":
    {
      $id = (int)$_POST['ProductId'];
      $product = $productManager->GetById($id);
      if($product == null || $product['UserCreated'] != $_SESSION['UserLogged']['UserName'])
      {
        header("HTTP/1.0 404 Not Found");
        header("Location: ".base_url."/pages/404/index.html");
      }
      else 
      {
        $productManager->UpdateOrderNumImage((int)$_POST['Id'], (int)$_POST['OrderNum']);
      }
      header("Location: ".base_url_editor."/product/images/".$_POST['ProductId']);
    }
    
  }

?>