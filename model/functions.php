<?php 
	function SendMail($mailTo, $subject, $body)
	{
		include_once 'phpMailer/class.phpmailer.php';
		$mail = new PHPMailer();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.gmail.com"; // SMTP server example
        $mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->Port = 465;                    // set the SMTP port for the GMAIL server
        $mail->Username = "chuyenlaptrinh@gmail.com"; // SMTP account username example
        $mail->Password = "Y5AWqBb455yKkZSy";        // SMTP account password example
        $mail->SMTPSecure = "ssl";
        $mail->SetFrom($mail->Username, "CanHo247.Com.Vn");
        $mail->AddAddress($mailTo, $subject);
        $mail->Subject = $subject;
        $mail->IsHTML(true);
        $mail->Body = $body;
        $result = $mail->Send();
	}
	function NEWGUID()
	{
	    if (function_exists('com_create_guid') === true)
	    {
	        return trim(com_create_guid(), '{}');
	    }

	    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
	}
	function CheckDeviceIsMobile()
	{
		$useragent=$_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
				return true;
			else 
				return false;
	}
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
		$str = str_replace('%','',$str);
		$str = str_replace('/','-',$str);
		return $str;

	}

	function UploadImageFile($target_dir)
	{
		$target_file = $target_dir;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_FILES["file"]["tmp_name"])) {
		    $check = getimagesize($_FILES["file"]["tmp_name"]);
		    if($check == false) {
		        return "File is not an image.";
		    }
		}
		// Check file size
		if ($_FILES["file"]["size"] > 2000000) {
		    return "Sorry, your file is too large.";
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif") {
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

	function UploadFile($nameInput, $target_dir)
	{
		$target_file = $target_dir;
		$uploadOk = 1;
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    return "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} 
		else {
		    if (move_uploaded_file($_FILES[$nameInput]["tmp_name"], $target_file)) {
		        $uploadOk = 1;
		    } else {
		        return "Sorry, there was an error uploading your file.";
		    }
		}
		return $uploadOk;
	}

	function UploadImageFileWithResize($target_dir, $new_img_width, $new_img_height)
	{
		$target_file = $target_dir;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_FILES["file"]["tmp_name"])) {
		    $check = getimagesize($_FILES["file"]["tmp_name"]);
		    if($check == false) {
		        return "File is not an image.";
		    }
		}
		// Check file size
		if ($_FILES["file"]["size"] > 2000000) {
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
			try 
			{
				$image = new SimpleImage();
			    $image->load($_FILES["file"]['tmp_name']);
			    $image->resize($new_img_width, $new_img_height);
			    $image->save($target_file);
			    $uploadOk = 1;
			}
		    catch(Exception $ex) 
		    {
		        return "Sorry, there was an error uploading your file.";
		    }
		}
		return $uploadOk;
	}

	function UploadImageFileMultiple($target_dir, $inputName, $index)
	{
		$target_file = $target_dir;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_FILES[$inputName]["tmp_name"][$index])) {
		    $check = getimagesize($_FILES[$inputName]["tmp_name"][$index]);
		    if($check == false) {
		        return "File is not an image.";
		    }
		}
		// Check file size
		if ($_FILES[$inputName]["size"][$index] > 500000) {
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
		    if (move_uploaded_file($_FILES[$inputName]["tmp_name"][$index], $target_file)) {
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
	            'secret' => '6LeVicUUAAAAACqPWOWwOWfgj2jHl2TQ-rj3WexW',
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