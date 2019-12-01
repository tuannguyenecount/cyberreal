<?php
include_once 'model/class.account.php';
include_once 'model/class.account_info.php';
include_once 'model/class.question.php';
include_once 'model/class.historySendOTP.php';
$account = new Account();
$account_InfoModel = new Account_Info();
$questionModel = new question();
$historySendOTP = new historySendOTP();
$view_data['title'] = "Quản Lý Tài Khoản";
$view_data['layout'] = "shared/_layoutaccount2.php";
if(!isset($_SESSION["_UserLogged"]))
{
    header('Location:'.base_url."/account/login");
    exit();
}
$view_data['model'] = $account_InfoModel->GetByCAccName($_SESSION['_UserLogged']['cAccName']);
if($view_data['model']== null)
{
    header("HTTP/1.0 404 Not Found");
    header("Location: ".base_url."/pages/404/index.html");
}

switch($action)
{
    case "getFormUpdatePhone":
    {
        $view_data['errors'] = RequestSendOTP($view_data['model']);
        include 'partial/_GetFormUpdatePhone.php';
        exit();
    }
    case "getFormForgotPass2":
    {
        $view_data['errors'] = RequestSendOTP($view_data['model']);
        include 'partial/_GetFormForgotPass2.php';
        exit();
    }
    case "getFormLockUnLockUser":
    {
        $view_data['errors'] = RequestSendOTP($view_data['model']);
        include 'partial/_GetFormLockUnLockUser.php';
        exit();
    }
    case "getFormMoKhoaTrangBi":
    {
        $view_data['errors'] = RequestSendOTP($view_data['model']);
        include 'partial/_GetFormMoKhoaTrangBi.php';
        exit();
    }
    case "dashboard":
    {
        $view_data['title'] = "Bảng Điều Khiển";
        $view_data['view_name'] = "manage/dashboard/index.php"; 
        break;
    }
    case "lichsunapthe":
    {
        $view_data['recentCharge'] = $account_InfoModel->GetAllHistoryCharge($_SESSION["_UserLogged"]['cAccName']);
        $view_data['title'] = "Lịch Sử Nạp Thẻ";
        $view_data['view_name'] = "manage/lichsunapthe.php"; 
        break;
    }
    case "lichsuchuyenxu":
    {
        include_once 'model/class.HistoryTransferCoin.php';
        $HistoryTransferCoin_Model = new HistoryTransferCoin();
        $view_data['model'] = $HistoryTransferCoin_Model->GetListByFrom($_SESSION["_UserLogged"]['cAccName']);
        $view_data['title'] = "Lịch Sử Chuyển Xu";
        $view_data['view_name'] = "manage/lichsuchuyenxu.php"; 
        break;
    }
    case "napthe":
    {
        $view_data['title'] = "Nạp Thẻ Zing";
        $view_data["view_name"] = "manage/napthe.php";
        if(count($_POST) > 0)
        {
            include_once 'model/class.historyZing.php';
            $historyZingModel = new historyZing();
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                if(empty($_POST['Seri']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập seri!";
                }
                if(empty($_POST['Code']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mã thẻ!";
                }
                if(empty($_POST['Cost']))
                {
                    $view_data['errors'][] = "Bạn chưa chọn mệnh giá!";
                }
                else if((int)$_POST['Cost'] < 1 || (int)$_POST['Cost'] > 9)
                {
                    $view_data['errors'][] = "Mệnh giá thẻ không hợp lệ!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $type = 4;
                    $cost = (int)$_POST['Cost'];
                    $code = $_POST['Code'];
                    $seri = $_POST['Seri'];
                    $userkey = "7300a2e53776ffeee85841fbd472a865";
                    $apitype = 0;
                    $transaction_note = "Tài khoản ".$_SESSION['_UserLogged']['cAccName']." nạp thẻ ZING ";
                    $result = CardChargeAsync($type, $cost, $code, $seri, $userkey, $apitype, $transaction_note);
                    $resCode = $result->code;
                    if($resCode == 200 || $resCode == 201)
                    {
                        if($result->cardStatus == 2)
                        {
                            $result->cardProcessCost /= 2;
                        }
                        try 
                        {
                            $view_data['modelUpdate'] = array();
                            $view_data['modelUpdate']['nExtPoint1'] = $view_data['model']['nExtPoint1'] +  ((int)($result->cardProcessCost) / 1000);
                            $xu = ((int)($result->cardProcessCost) / 1000);
                            $resultUpdate = $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $view_data['model']['cAccName']);
                            if($resultUpdate)
                            {
                                $result = $historyZingModel->Add($view_data['model']['cAccName'], $seri, $code, $resCode, $result->message." (".$result->cardStatusText.")", $result->transactionID, $result->cardProcessCost);
                                $_SESSION['_UserLogged']['nExtPoint1'] = $view_data['modelUpdate']['nExtPoint1'];
                                header("Location: ".base_url."/manage/napthe&successMessage=Nạp thành công ".$xu. " xu");
                            }
                            else 
                            {
                                $view_data['errors'][] = "Lỗi cập nhật thông tin user!";
                            }
                        }
                        catch(Exception $ex)
                        {
                            $view_data['errors'][] = $ex->getMessage();
                        } 
                    }
                    else 
                    {
                        $view_data['errors'][] = $result->message;
                        $historyZingModel->Add($view_data['model']['cAccName'], $seri, $code, $resCode, $result->message, $result->transactionID, 0);
                        
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
    case "chuyenxu":
    {
        $view_data['view_name'] = "manage/chuyenxu.php";
        $view_data['title'] = "Chuyển Xu";
        $accNguoiGui = $account_InfoModel->GetByCAccName($_SESSION['_UserLogged']['cAccName']);
        if(count($_POST) > 0)
        {
            try 
            {
                $pass2 = $_POST['pass2'];
                $tkNguoiNhan = $_POST['tkNguoiNhan'];
                $xu = (int)$_POST['xu'];

                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
				else if($view_data['model']['iClientID'] != 0)
                {
                    $view_data['errors'][] = "Bạn cần thoát game để thực hiện chuyển xu!";
                }
                else if(empty($pass2))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 2!";
                }
                else if($pass2 != $_SESSION['_UserLogged']['PassCap2'])
                {
                    $view_data['errors'][] = "Mật khẩu cấp 2 không đúng!";    
                }
                else if(empty($tkNguoiNhan))
                {
                    $view_data['errors'][] = "Bạn chưa nhập tài khoản người nhận!";
                }
                else if($tkNguoiNhan == $accNguoiGui['cAccName'])
                {
                    $view_data['errors'][] = "Không thể tự gửi cho chính mình!";
                }
                else if($account_InfoModel->GetByCAccName($tkNguoiNhan) == null)
                {
                    $view_data['errors'][] = "Tài khoản người nhận không tồn tại!";
                }
                else if(empty($xu))
                {
                    $view_data['errors'][] = "Bạn chưa nhập số xu!";
                }
                else if($xu <= 0)
                {
                    $view_data['errors'][] = "Số xu muốn chuyển phải > 0";
                }
                else if($accNguoiGui['nExtPoint1'] < $xu)
                {
                    $view_data['errors'][] = "Bạn không đủ xu để chuyển!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $view_data['modelSession'] = array();
                    $view_data['modelSession']['nExtPoint1'] = $accNguoiGui['nExtPoint1'] - (int)$xu;
                    $result = $account_InfoModel->UpdateInfo($view_data['modelSession'], $_SESSION['_UserLogged']['cAccName']);

                    $accNguoiNhan = $account_InfoModel->GetByCAccName($tkNguoiNhan);
                    $view_data['modelUpdate'] = array();
                    $view_data['modelUpdate']['nExtPoint1'] = (int)$accNguoiNhan['nExtPoint1'] + (int)$xu;
                    $result = $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $tkNguoiNhan);

                    if($result)
                    {
                        $_SESSION['_UserLogged']['nExtPoint1'] = $view_data['modelSession']['nExtPoint1'];
                        include_once 'model/class.HistoryTransferCoin.php';
                        $HistoryTransferCoin_Model = new HistoryTransferCoin();
                        $HistoryTransferCoin_Model->Add($_SESSION['_UserLogged']['cAccName'],$tkNguoiNhan, $xu );
                        header("Location: ".base_url."/manage/chuyenxu&successMessage=Chuyển thành công ".$xu. " xu");
                        exit();
                    } 
                    else {
                        $view_data['errors'][] = "Xảy ra lỗi";
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
    case "doigiochoi":
    {
        $view_data['title'] = "Đổi Ngày/Giờ Chơi";
        $view_data["view_name"] = "manage/doigiochoi.php";    
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                else if($view_data['model']['iClientID'] != 0)
                {
                    $view_data['errors'][] = "Vui lòng thoát game và thử đăng nhập lại để nạp!";
                }
                else if((!isset($_POST['hour_exchange']) || $_POST['hour_exchange'] == 0 )  && (!isset($_POST['day_exchange']) || $_POST['day_exchange'] == 0) )
                {
                    $view_data['errors'][] = "Bạn chưa chọn cách thức đổi!";
                }
                else 
                {
                    $cachdoi = 0;
                    $hour_exchange = (int)$_POST['hour_exchange'];
                    $day_exchange = (int)$_POST['day_exchange'];
                    if($hour_exchange == 7)
                    {
                        $cachdoi = 1;
                        if($view_data['model']['nExtPoint1'] < $hour_exchange)
                        {
                            $view_data['errors'][] = "Bạn không đủ ".$hour_exchange." xu";
                        }
                    }
                    else if($day_exchange == 7 || $day_exchange == 30)
                    {
                        $cachdoi = 2;
                        if($view_data['model']['nExtPoint1'] < $day_exchange)
                        {
                            $view_data['errors'][] = "Bạn không đủ ".$day_exchange." xu";
                        }
                    }
                    if(count($view_data['errors']) == 0)
                    {
                        if($cachdoi == 1)
                        {
                            $view_data['modelUpdate'] = array();
                            $view_data['modelUpdate']['nExtPoint1'] = $view_data['model']['nExtPoint1'] - $hour_exchange;
                            $result = $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $view_data['model']['cAccName']);
                            if($result)
                            {
                                $params = array($view_data['model']['iLeftSecond'] + _coin2dayPercentHour, $view_data['model']['dEndDate'], $view_data['model']['dBeginDate'], $view_data['model']['cAccName']);
                                $result = $account_InfoModel->UpdateAccountHabitus($params);
                                if($result)
                                {
                                    $_SESSION['_UserLogged']['iLeftSecond'] = $view_data['model']['iLeftSecond'] + _coin2dayPercentHour;
                                    header("Location: ".base_url."/manage/doigiochoi&successMessage=Đổi thành công");
                                     exit();
                                }
                            }
                        }
                        else if($cachdoi == 2)
                        {
   
                            $view_data['modelUpdate'] = array();
                            $view_data['modelUpdate']['nExtPoint1'] = $view_data['model']['nExtPoint1'] - $day_exchange;
                            $result = $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $view_data['model']['cAccName']);
                            if($result)
                            {
                                 if($view_data['model']['dEndDate'] < new DateTime())
                                {
                                    $view_data['model']['dEndDate'] = new DateTime();
                                }
                                $params = array($view_data['model']['iLeftSecond'], $view_data['model']['dEndDate']->modify('+'.$day_exchange.' day'), $view_data['model']['dBeginDate'], $view_data['model']['cAccName']);
                                $result = $account_InfoModel->UpdateAccountHabitus($params);
                                if($result)
                                {
                                    $_SESSION['_UserLogged']['dEndDate'] = $view_data['model']['dEndDate']->modify('+'.$day_exchange.' day');
                                     header("Location: ".base_url."/manage/doigiochoi&successMessage=Đổi thành công");
                                     exit();
                                }
                            }
                        }
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
    case "mokhoatrangbi":
    {
        $view_data['title'] = "Mở Khoá Trang Bị";
        $view_data["view_name"] = "manage/mokhoatrangbi.php";   
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                else if(empty($_POST['OTP']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mã OTP!";
                }
                else if($_POST['OTP'] != $_SESSION['OTP'])
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
                if($view_data['model']['nExtPoint1'] < 10)
                {
                    $view_data['errors'][] = "Bạn không đủ 10 xu!";
                }
                else if($view_data['model']['iClientID'] != 0)
                {
                    $view_data['errors'][] = "Vui lòng thoát game và thử đăng nhập lại để nạp!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $view_data['modelUpdate'] = array();
                    $view_data['modelUpdate']['nExtPoint1'] = $view_data['model']['nExtPoint1'] - 10;
                    $view_data['modelUpdate']['nExtPoint2'] = $view_data['model']['nExtPoint2'] + 10;
                    $result = $account_InfoModel->UpdateInfo($view_data['modelUpdate'], $view_data['model']['cAccName']);
                    if($result)
                    {
                        $_SESSION['_UserLogged']['nExtPoint1'] = $view_data['modelUpdate']['nExtPoint1'];
                        $_SESSION['_UserLogged']['nExtPoint2'] = $view_data['modelUpdate']['nExtPoint2'];
                        header("Location: ".base_url."/manage/mokhoatrangbi&successMessage=Đổi thành công.");
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
    case "doiOTP":
    {
        $view_data['title'] = "Đổi Điểm OTP";
        $view_data["view_name"] = "manage/doiOTP.php";
        if(count($_POST) > 0)
        {
            try 
            {
                NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if(CheckRecaptchav2() == false)
                {
                    $view_data['errors'][] = "Mã xác nhận không đúng!";
                }
                else if($view_data['model']['nExtPoint1'] < 10)
                {
                    $view_data['errors'][] = "Bạn không đủ 10 xu để đổi!";
                }
                else if($view_data['model']['iClientID'] != 0)
                {
                    $view_data['errors'][] = "Vui lòng thoát game và thử đăng nhập lại để nạp!";
                }
                if(count($view_data['errors']) == 0)
                {
                    $view_data['modelUpdate'] = array();
                    $view_data['modelUpdate']['nExtPoint1'] = $view_data['model']['nExtPoint1'] - 10;
                    $view_data['modelUpdate']['nExtPoint3'] = $view_data['model']['nExtPoint3'] + 20;
                    $result = $account_InfoModel->UpdateInfo($view_data['modelUpdate'],$view_data['model']['cAccName']);
                    if($result){
                        $_SESSION['_UserLogged']['nExtPoint1'] = $view_data['modelUpdate']['nExtPoint1'];
                        $_SESSION['_UserLogged']['nExtPoint3'] = $view_data['modelUpdate']['nExtPoint3'];
                        header("Location:".base_url."/manage/doiOTP&successMessage=Đổi thành công.");
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
    case "ajax_updateinfo":
    {
        if(count($_POST) > 0)
        {
            try 
            {
                $model = array();
                $model['cTenNguoiDung'] = $_POST['cTenNguoiDung'];
                $model['cBirthDate'] = $_POST['cBirthDate'];
                $result = $account_InfoModel->Update($model, $_SESSION['_UserLogged']['cAccName']);
                echo "Cập nhật thông tin thành công";
                
            }
            catch (Exception $ex)
            {
                echo  $ex->getMessage();
            }
        }
       exit();
    }
    case "ajax_updatepass1":
    {
        if(count($_POST) > 0)
        {
            try 
            {
                $model = array();
                if(empty($_POST['Password']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu hiện tại.<br/>";
                }
                else if(empty($_POST['NewPassword']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu mới.<br/>";         
                }
                else if(CheckValidatePassword($_POST['NewPassword']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu mới cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt!<br/>";
                }
                else if($_POST['NewPasswordConfirm'] != $_POST['NewPassword'])
                {
                    $view_data['errors'][] = "Nhập lại mật khẩu mới không khớp với mật khẩu mới.<br/>";                         
                }
                else if($_POST['Password'] != $_SESSION['_UserLogged']['PassCap1'])
                {
                    $view_data['errors'][] = "Mật khẩu hiện tại không đúng.<br/>";
                }
                if(count($view_data['errors']) > 0)
                {
                    echo ConvertListErrorToString($view_data['errors']);
                    exit();
                }
                $result = $account_InfoModel->ChangePassword($_SESSION['_UserLogged']['cAccName'], $_POST['NewPassword']);
                if($result)
                {
                    $_SESSION['_UserLogged']['PassCap1'] = $_POST['NewPassword'];
                    $_SESSION['_UserLogged']['cPassWord'] = md5($_POST['NewPassword']);
                    echo "<span class='text-success'>Đổi mật khẩu cấp 1 thành công</span>";
                }
            }
            catch (Exception $ex)
            {
                echo "<span class='text-danger'>".$ex->getMessage()."</span>";
            }
        }
       exit();
    }
    case "requestOTPCode":
    {
        if(count($_POST) > 0)
        {
            try 
            {
                $cPhone = $view_data['model']['cPhone'];
                // NoCSRF::check( 'csrf_token', $_POST, true, 60*10, false );
                if((int)$view_data['model']['nExtPoint3'] <= 0)
                {
                    $view_data['errors'][] = "Không đủ 1 điểm OTP để nhận OTP!";
                }
                if(empty($_POST['phone'])){
                    $view_data['errors'][] = "Bạn chưa nhập SĐT";
                }
                else {
                    if ($_POST['phone'] != $cPhone)
                        $view_data['errors'][] = "Số điện thoại bạn nhập không khớp với tài khoản này!";
                    if($account_InfoModel->CheckPhoneIsLockedOTP($cPhone))
                        $view_data['errors'][] = "Số điện thoại này bị khoá gửi OTP!";       
                    if($historySendOTP->CountSendInDate($cPhone, date("Y-m-d")) >= 10)
                        $view_data['errors'][] = "Số lần yêu cầu vượt quá giới hạn!";
                }

                if(isset($_SESSION['OTP_ExpirationTime']))
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
                            if(isset($_POST['returnUrl']))
                            {
                                header("Location: ".$_POST['returnUrl']);
                            }
                            else 
                            {
                                header("Location: ".base_url."/manage/dashboard&successMessage=Gửi OTP thành công.");
                            }
                            exit();
                        }
                    }
                }
            }
            catch(Exception $ex)
            {
                $view_data['errors'][] =  $ex->getMessage();
            }
        }
        break;
    }
    case "ajax_updatepass2":
    {
        if(count($_POST) > 0)
        {
            try 
            {
                if(empty($_POST['Password2']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 2 cũ!";
                }
                else if(empty($_POST['NewPassword2']))
                {
                    $view_data['errors'][] = "Bạn chưa nhập mật khẩu cấp 2 mới!";
                }
                else if(CheckValidatePassword($_POST['NewPassword2']) == false)
                {
                    $view_data['errors'][] = "Mật khẩu cấp 2 mới cần tối thiểu 8 ký tự. Bao gồm chữ hoa, thường, số và ký tự đặc biệt!";
                }
                else if($_POST['NewPassword2Confirm'] != $_POST['NewPassword2'])
                {
                    $view_data['errors'][] = "Nhập lại mật khẩu cấp 2 mới không khớp mật khẩu cấp 2 mới!";
                }  
                else if($_POST['Password2'] != $_SESSION['_UserLogged']['PassCap2'])
                {
                    $view_data['errors'][] = "Mật khẩu cấp 2 cũ không đúng.<br/>";
                }
                if(count($view_data['errors']) > 0)
                {
                    echo ConvertListErrorToString($view_data['errors']);
                    exit();
                }
                else 
                {
                    $result = $account_InfoModel->UpdatePassword2($_SESSION['_UserLogged']['cAccName'],$_POST['NewPassword2'] );
                    if($result == false)
                    {
                        echo "<span class='text-danger'>Xảy ra lỗi!</span>";
                    }
                    else 
                    {
                        $_SESSION['_UserLogged']['PassCap2'] = $_POST['NewPassword2'];
                        echo "<span class='text-success'>Đổi mật khẩu cấp 2 thành công.</span>";
                    }
                }
            }
            catch(Exception $ex)
            {
                echo "<span class='text-danger'>".$ex->getMessage()."</span>";
            }

        }
        exit();
    }
    case "ajax_forgotpass2":
    {
        if(count($_POST) > 0)
        {
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
            if(count($view_data['errors']) > 0)
            {
                echo ConvertListErrorToString($view_data['errors']);
                exit();
            }
            else 
            {
                $passrandom = generate_password();
                $result = $account_InfoModel->UpdatePassword2($_SESSION['_UserLogged']['cAccName'], $passrandom);
                if($result == false)
                {
                    echo "<span class='text-danger'>Xảy ra lỗi!</span>";
                }
                else 
                {
                    $_SESSION['_UserLogged']['PassCap2'] = $passrandom;
                    echo "<span class='text-success'>Mật khẩu cấp 2 mới của bạn là ".$passrandom."</span>";
                }
            }            
        }
        exit();
    }
    case "ajax_updateSDT":
    {
        if(count($_POST) > 0)
        {
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
				else if(empty($_POST['NewPhone']))
				{
					$view_data['errors'][] = "Bạn chưa số điện thoại mới!";
				}
				else if($_POST['NewPhone'] != $_POST['NewPhoneConfirm'])
				{
					$view_data['errors'][] = "Xác nhận số điện thoại mới không khớp với số điện thoại mới!";
				}
            }
            
            if(count($view_data['errors']) > 0)
            {
                echo ConvertListErrorToString($view_data['errors']);
                exit();
            }
            else 
            {
                $view_data['modelUpdate'] = array();
                $view_data['modelUpdate']['cPhone'] = $_POST['NewPhone'];
                $result = $account_InfoModel->Update($view_data['modelUpdate'], $_SESSION['_UserLogged']['cAccName']);
                if($result == false)
                {
                    echo "<span class='text-danger'>Xảy ra lỗi!</span>";
                }
                else 
                {
                    $_SESSION['_UserLogged']['cPhone'] = $_POST['NewPhone'];
                    echo "<span class='text-success'>Đổi số điện thoại thành công.</span>";
                }
            }            
        }
        exit();        
    }
    case "ajax_lock_unlock":
    {
        if(count($_POST) > 0)
        {
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
            if(count($view_data['errors']) > 0)
            {
                echo ConvertListErrorToString($view_data['errors']);
                exit();                
            }
            else 
            {
                $view_data['model'] = $account_InfoModel->GetByCAccName($_SESSION['_UserLogged']['cAccName']);
                $view_data['modelUpdate'] = array();
                $view_data['modelUpdate']['bIsBanned'] = !$view_data['model']['bIsBanned'];
                $result = $account_InfoModel->Update($view_data['modelUpdate'], $_SESSION['_UserLogged']['cAccName']);
                if($result == false)
                {
                    echo "<span class='text-danger'>Xảy ra lỗi!</span>";
                }
                else 
                {
                    $_SESSION['_UserLogged']['bIsBanned'] = !$view_data['model']['bIsBanned'];
                    echo "<span class='text-success'>Xử lý thành công.</span>";
                }                
            }
        }
        exit();
    }
}


?>