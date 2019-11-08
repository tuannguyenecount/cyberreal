<?php
include_once 'model/class.account.php';
include_once 'model/class.account_info.php';
include_once 'model/class.historySendOTP.php';
$accountModel = new Account();
$account_infoModel = new Account_Info();
$historySendOTP = new historySendOTP();
$view_data['layout'] = "shared/_layoutaccount2.php";
switch($action)
{
    case "register":
    {
        $view_data['title'] = "Đăng ký thành viên";
        $view_data['view_name'] = "account/register.php";
		$view_data['section_scripts'] = "account/scripts.php";
        $view_data['section_styles'] = "account/styles.php";
        $view_data['layout'] = "shared/_registerlayout.php";
        include_once 'model/class.question.php';
        $questionModel = new Question();
        $view_data['questions'] = $questionModel->GetList();
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                if(empty($_POST['UserName']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập tài khoản!";
                }
                else if( !ctype_alnum($_POST['UserName']) )
                {
                    $view_data['errors'][] = "Tài khoản chỉ được chứa ký tự a-z, A-Z, hoặc 0-9!";
                }
                else if(strlen($_POST['UserName']) < 6)
                {
                    $view_data['errors'][] = "Tài khoản phải tối thiểu 6 ký tự!";
                }
                else if($account_infoModel->GetByCAccName($_POST['UserName']) != null)
                {
                    $view_data['errors'][] = "Tài khoản đã tồn tại trong hệ thống!";
                }
                if(empty($_POST['Password']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu!";
                }
                else if(CheckValidatePassword($_POST['Password']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu cấp 1 cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt.";
					$view_data['errors'][] = "Ví Dụ : Volampk@2019";
                }
                else if($_POST['PasswordConfirm'] != $_POST['Password'])
                {
                    $view_data['errors'][] = "Xác nhận mật khẩu cấp 1 không khớp!";
                }
                if(empty($_POST['Password2']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 2!";
                }
                else if(CheckValidatePassword($_POST['Password2']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu cấp 2 cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt.";
					$view_data['errors'][] = "Ví Dụ : @Volampk2020";
                } 
                if(empty($_POST['Phone']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập số điện thoại!";
                }
                else if(strlen($_POST['Phone']) > 20)
                {
                    $view_data['errors'][] = "Số điện thoại chỉ được phép tối đa 20 ký tự!";
                }
               
                if(count($view_data['errors']) == 0)
                {
                    $result = $account_infoModel->Register($_POST['UserName'], $_POST['Password'], $_POST['Password2'], $_POST['Phone']);
                    if($result)
                    {
                        header("location:".base_url."/account/register&messageSuccess=Chúc mừng bạn đã đăng ký thành công. Bạn có thể chơi game ngay bây giờ.");
                    }
                    else 
                    {
                        $view_data['errors'][] = "Xảy ra lỗi";
                    }
                }
            }
            catch(Exception $ex)
            {
                $view_data['errors'][] = $ex->getMessage();
            }
        }
        break;
    }
    case "login":
    {
        $view_data['title'] = "Đăng nhập";
        $view_data["view_name"] = "account/login.php";
        $view_data['layout'] = "shared/_loginlayout.php";
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check('csrf_token', $_POST, true, 60*10, false );
                if($_POST["username"] != "" && $_POST["password"] != "")
                {
                    $user = $accountModel->Login($_POST["username"], $_POST["password"]);
                    if($user != null) 
                    {
                        $_SESSION['_UserLogged'] = $user;
                        header('Location:'.base_url."/manage/dashboard");
                        exit();
                    }
                    else 
                    {
                        $view_data['errors'][] = "Sai tài khoản hoặc mật khẩu!";
                    }
                }
                else 
                {
                    $view_data['errors'][] = "Bạn hãy nhập đủ tài khoản và mật khẩu để đăng nhập!";
                }
            }
            catch(Exception $ex)
            {
                $view_data['errors'][] = $ex->getMessage();
            }
        }
        break;
    }
    case "logoff":
    {
        unset($_SESSION['_UserLogged']);
        header("Location: ".base_url."/manage");
    }
    case "reset":
    {
        $view_data['title'] = "Lấy lại mật khẩu cấp 1";
        $view_data['view_name'] = "account/reset.php";
        $view_data['section_scripts'] = "account/script_resetpass.php";
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(empty($_POST['OTP']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mã OTP!";
                }
                else
                {
                    if($_POST['OTP'] != $_SESSION['OTP'])
                    {
                        $view_data['errors'][] = "Mã OTP bạn nhập không đúng!";
                    }
                    else 
                    {
                        $dtimeNow = new DateTime();
                        if($_SESSION['OTP_ExpirationTime'] < $dtimeNow)
                        {
                            $view_data['errors'][] = "OTP này đã hết hạn!";
                        }
                    }
                }
                if(empty($_POST['NewPass1']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 1 mới!";
                }
                else if(CheckValidatePassword($_POST['NewPass1']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu cấp 1 mới cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt.";
                }
                else if($_POST['NewPass1Confirm'] != $_POST['NewPass1'])
                {
                    $view_data['errors'][] = "Xác nhận mật khẩu cấp 1 mới không khớp!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $result = $account_infoModel->ChangePassword($_POST['cAccName'],$_POST['NewPass1']);
                    if($result)
                    {
                        header("Location: ".base_url."/account/reset&message=Lấy lại mật khẩu thành công.");
                        exit();
                    }
                }
            }
            catch (Exception $ex)
            {
                $view_data['errors'][] = $ex->getMessage();
            }
        }
        break;
    }
    case "resetpass2":
    {
        $view_data['title'] = "Lấy lại mật khẩu cấp 2";
        $view_data['view_name'] = "account/resetpass2.php";
        $view_data['section_scripts'] = "account/script_resetpass.php";
        if(count($_POST) > 0)
        {
            try 
            {

                NoCSRF::check('csrf_token', $_POST, true, 60*10, false );
                if(empty($_POST['OTP']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mã OTP!";
                }
                else if($_POST['OTP'] != $_SESSION['OTP'])
                {
                    $view_data['errors'][] = "Mã OTP không đúng!";
                }
                else 
                {
                    $dtimeNow = new DateTime();
                    if($_SESSION['OTP_ExpirationTime'] < $dtimeNow)
                    {
                        $view_data['errors'][] = "OTP này đã hết hạn!";
                    }
                }
                if(empty($_POST['NewPass2']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 2 mới!";
                }
                else if(CheckValidatePassword($_POST['NewPass2']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu cấp 2 mới cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt.";
                }
                else if($_POST['NewPass2Confirm'] != $_POST['NewPass2'])
                {
                    $view_data['errors'][] = "Nhập lại mật khẩu cấp 2 không khớp!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $result = $account_infoModel->UpdatePassword2($_SESSION['cAccNameResetPass2'], $_POST['NewPass2']);
                    if($result)
                    {
                        header("Location: ".base_url."/account/resetpass2&message=Reset mật khẩu cấp 2 thành công.");
                        exit();
                    }
                }
            }
            catch (Exception $ex)
            {
                $view_data['errors'][] = $ex->getMessage();
            }
        }
        break;
    }
    case "RequestOTPResetPass":
    {
        if(count($_POST) > 0)
        {
            try 
            {
                $cPhone = $_POST['cPhone'];
                if(empty($cPhone))
                {
                    $view_data['errors'][] = "Bạn chưa nhập SĐT";
                }
                else if($account_infoModel->CheckExistsPhone($cPhone) == false)
                {
                    $view_data['errors'][] = "SĐT không tồn tại!";
                }
                else if($account_infoModel->CheckPhoneIsLockedOTP($cPhone))
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
                else if(empty($_POST['cAccName']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập tài khoản!";
                }
                else 
                {
                    $account_infoRecord = $account_infoModel->GetByCAccName($_POST['cAccName']);
                    if($account_infoRecord == null)
                        $view_data['errors'][] = "Tài khoản không tồn tại trong hệ thống!";
                    else if($account_infoRecord['cPhone'] != $cPhone)
                    {
                        $view_data['errors'][] = "Số điện thoại không khớp với tài khoản!";
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
                            $_SESSION['OTP'] = $OTP;
                            if($_POST['type'] == "resetpass1")
                                $_SESSION['cAccNameResetPass1'] = $_POST['cAccName'];
                            else if($_POST['type'] == "resetpass2")
                                $_SESSION['cAccNameResetPass2'] = $_POST['cAccName'];
                            else {
                                echo "0";
                            }
                            echo "1";
                            exit();
                        }
                    }
                }
                if(count($view_data['errors']) > 0)
                {
                    echo ConvertListErrorToString($view_data['errors']);
                    exit();
                }
            }
            catch (Exception $ex)
            {
                echo "<span class='text-danger'>".$ex->getMessage()."</span>";
            }
        }
        exit();
    }
    case "GetFormFormInputOTPResetPass1":
    {
        if(isset($_SESSION["cAccNameResetPass1"]))
        {
            include 'partial/_GetFormFormInputOTPResetPass1.php';
            exit();
        }
        echo "Không có dữ liệu hợp lệ!";
        exit();
    }
    case "GetFormFormInputOTPResetPass2":
    {
        if(isset($_SESSION["cAccNameResetPass2"]))
        {
            include 'partial/_GetFormFormInputOTPResetPass2.php';
            exit();
        }
        echo "Không có dữ liệu hợp lệ!";
        exit();
    }
    
}


?>