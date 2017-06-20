<?php  
include "auth_site.php";
$loginid=getSession("loginid");
if(isset($_REQUEST['code'])){ $mob_code=$_REQUEST['code']; }

    $otp=checkMobileOtp($mob_code,$loginid);
    if(mysqli_num_rows($otp)>0){
	updateMobileOtp($loginid);
	echo 1; 
    }else{
        echo 0;
	
    }
?>