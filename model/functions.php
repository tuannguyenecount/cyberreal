<?php 

	function RequestSendOTP($user)
	{
		global $account_InfoModel;
		global $historySendOTP;
		$view_data['model'] = $user;
		$view_data['errors'] = array();
		$cPhone = $_POST['Phone'];
        if((int)$view_data['model']['nExtPoint3'] <= 0)
        {
            $view_data['errors'][] = "Không đủ 1 điểm OTP để nhận OTP!";
        }
        else if(empty($cPhone))
        {
            $view_data['errors'][] = "Bạn chưa nhập số điện thoại hiện tại!";
        }
        else if($cPhone != $_SESSION['_UserLogged']['cPhone'])
        {
            $view_data['errors'][] = "Số điện thoại hiện tại không chính xác";
        }
        else if($account_InfoModel->CheckPhoneIsLockedOTP($cPhone))
        {
            $view_data['errors'][] = "Số điện thoại này bị khoá gửi OTP!";       
        }
        else if($historySendOTP->CountSendInDate($cPhone, date("Y-m-d")) >= 10)
        {
            $view_data['errors'][] = "Số lần yêu cầu vượt quá giới hạn!";
        }
        else if(isset($_SESSION['OTP_ExpirationTime']))
        {
            $totalMinutes = GetTotalMinutes(new DateTime(), $_SESSION['OTP_ExpirationTime']);
            if($totalMinutes < 1)  
            {
                $view_data['errors'][] = "Bạn vừa gửi yêu cầu OTP trước đó. Vui lòng chờ 1 phút sau !";
            }
        }
        if(count($view_data['errors']) == 0)
        {
            $OTP = rand(123456, 999999);
            $content = "Ma OTP cua ban la: ".$OTP;
            $url = "http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post/";
            $data = array('Phone' => $cPhone, 'Content' => $content, 'ApiKey' => ApiKey,'SecretKey' => SecretKey, 'IsUnicode' => '0', 'Brandname' => 'Verify','SmsType' => '2');

            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            if ($result === FALSE) 
            {
                $view_data['errors'][] = "Lỗi gửi tin nhắn!";
            }
            else 
            {
                $result = json_decode($result,true);
                if($result['CodeResult'] == "100")
                {
                    $historySendOTP->Add($OTP, $cPhone);
                    $minutes_to_add = 5;
                    $ExpirationTime = new DateTime();
                    $ExpirationTime->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                    $_SESSION['OTP_ExpirationTime'] = $ExpirationTime;
                    $view_data['model']['nExtPoint3'] -= 1;
                    $view_data['modelUpdate'] = array();
                    $view_data['modelUpdate']['cAccName'] = $view_data['model']['cAccName']; 
                    $view_data['modelUpdate']['nExtPoint3'] = $view_data['model']['nExtPoint3']; 
                    $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $view_data['model']['cAccName']);
                    $_SESSION['OTP'] = $OTP;
                }
            }
        }
        return $view_data['errors'];
	}
	function generate_password($length = 20){
	   	$alphabet = 'abcdefghijklmnopqrstuvwxyz';
    	$pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 4; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
    	}
    	$alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 4; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
    	}
    	$alphabet = '1234567890@#$%^&*!';
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 8; $i < 12; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
    	}
    	$alphabet = '@#$%^&*!';
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 8; $i < 12; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
    	}
    	return implode($pass); //turn the array into a string
	}
	function CheckValidatePassword($password)
	{
		return preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password);
	}
	function vn_to_str ($str){
 
		$unicode = array(

		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

		'd'=>'đ',

		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

		'i'=>'í|ì|ỉ|ĩ|ị',

		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',

		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

		'D'=>'Đ',

		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',

		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);

		foreach($unicode as $nonUnicode=>$uni){

		$str = preg_replace("/($uni)/i", $nonUnicode, $str);

		}
		$str = str_replace(' ','-',$str);
		$str = str_replace('?','',$str);
		return $str;

	}

	function UploadImageFile($target_dir)
	{
		$target_file = $target_dir;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["file"])) {
		    $check = getimagesize($_FILES["file"]["tmp_name"]);
		    if($check !== false) {
		        return "File is an image - " . $check["mime"] . ".";
		    } else {
		        return "File is not an image.";
		    }
		}
		// Check file size
		if ($_FILES["file"]["size"] > 500000) {
		    return "Sorry, your file is too large.";
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    return "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		        $uploadOk = 1;
		    } else {
		        return "Sorry, there was an error uploading your file.";
		    }
		}
		return $uploadOk;
	}

	function CheckRecaptchav2()
	{
		try 
		{
	        $response = $_POST["g-recaptcha-response"];
	        $url = 'https://www.google.com/recaptcha/api/siteverify';
	        $data = array(
	            'secret' => '6LffNIMUAAAAAAtpmsXkOb-9CYsCe6mh5djnnBxr',
	            'response' => $_POST["g-recaptcha-response"]
	        );
	        $query = http_build_query($data);
	        $options = array(
	            'http' => array (
	    	        'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
	                    		"Content-Length: ".strlen($query)."\r\n".
	                    		"User-Agent:MyAgent/1.0\r\n",
	                'method' => 'POST',
	                'content' => $query
	            )
	        );
	        $context  = stream_context_create($options);
	        $verify = file_get_contents($url, false, $context);
	        $captcha_success=json_decode($verify);
	        if ($captcha_success->success==false) {
	            return false;
	        }
	    }
	    catch (Exception $ex)
	    {
	    	return false;
	    }
        return true;
	}

	function CardChargeAsync($type,$cost,$pin,$serial,$userkey,$apitype,$transaction_note)
	{
		try 
		{
	        $url = 'https://epbank.vn/Api/cardv2/insert';
	        $data = array(
	            'type' => $type,
	            'cost' => $cost,
	            'pin' => $pin,
	            'serial' => $serial,
	            'userkey' => $userkey,
	            'apitype' => $apitype,
	            'transaction_note' => $transaction_note
	        );
	        $query = http_build_query($data);
	        $options = array(
	            'http' => array (
	    	        'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
	                    		"Content-Length: ".strlen($query)."\r\n".
	                    		"User-Agent:MyAgent/1.0\r\n",
	                'method' => 'POST',
	                'content' => $query
	            )
	        );
	        $context  = stream_context_create($options);
	        $result = file_get_contents($url, false, $context);
	        return json_decode($result);
	        
	    }
	    catch (Exception $ex)
	    {
	    	return false;
	    }
        return true;
	}

	function GetTotalMinutes($dateA, $dateB)
	{
		$diff = $dateA->diff($dateB);
		$minutes = ($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i;
		return $minutes;
	}

	function ConvertListErrorToString($errors)
	{
		$messages = "";
		foreach($errors as $errorItem)
		{
			$messages .= "<li class='text-danger'>".$errorItem."</li>";
		}
		$result = "<ul>".$messages."</ul>";
		return $result;
	}
	function get_client_ip() {
	    $ipaddress = '';
	    if (isset($_SERVER['HTTP_CLIENT_IP']))
	        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_X_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
	    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
	    else if(isset($_SERVER['HTTP_FORWARDED']))
	        $ipaddress = $_SERVER['HTTP_FORWARDED'];
	    else if(isset($_SERVER['REMOTE_ADDR']))
	        $ipaddress = $_SERVER['REMOTE_ADDR'];
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

?>