<?php 
	include '../model/class.locationManager.php';

	$locationManager = new LocationManager();

	switch($action)
	{
		case "districts":
		{
		  $view_data['title'] = "Danh mục Quận/Huyện";
		  $view_data['view_name'] = "location/districts.php"; 
		  $view_data['model'] = $locationManager->GetDistrictsByProvince(1);
		  break;
		}  
		case "changeSortOrderDistrict":
		{
			$locationManager->UpdateSortOrderDistrict($_GET['id'], $_POST['sortorder']);
			header("Location: ".base_url_admin."/location/districts");
		  	break;
		}
		case "editIntroduceDistrict":
		{
			$view_data['model'] = $locationManager->GetDistrictById($_GET['id']); 
			$view_data['title'] = "Soạn bài viết giới thiệu dự án ".$view_data['model']['_name'];
		  	$view_data['view_name'] = "location/editIntroduceDistrict.php";
  			$view_data['section_scripts'] = "location/script_editIntroduceDistrict.php";
		  	if(isset($_POST['introduce']))
		  	{
		  		$result = $locationManager->UpdateIntroduce($_GET['id'], $_POST['introduce']);
		  		if($result)
		  		{
		  			header("Location: ".base_url_admin."/location/editIntroduceDistrict/".$_GET['id']);
		  		}
		  		else 
		  		{
		  			$view_data['errors'][] = "Xảy ra lỗi.";
		  		}
		  	} 
			break;
		}
		case "updateIntroduceDistrictAsync":
		{
			$result = $locationManager->UpdateIntroduce($_GET['id'], $_POST['introduce']);
			exit();
		}
		case "ghimDistrict":
		{
		  	$locationManager->GhimDistrict($_GET['id']);
		  	header("Location: ".base_url_admin."/location/districts");
		  	break;
		}
		case "removeGhimDistrict":
		{
		  	$locationManager->RemoveGhimDistrict($_GET['id']);
		  	header("Location: ".base_url_admin."/location/districts");
		  	break;
		}
	}
		
