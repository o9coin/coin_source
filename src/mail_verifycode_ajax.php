<?php  
include "auth_site.php";
$loginid=getSession("loginid");
if(isset($_REQUEST['code'])){ $mail_code=$_REQUEST['code']; }

    $otp=checkMailOtp($mail_code,$loginid);
    if(mysqli_num_rows($otp)>0){
	updateMailOtp($loginid);
	echo 1; 
    }else{
        echo 0;
    }
?>