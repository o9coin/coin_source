<?php  
include "auth_site.php";
//print_r($_GET); exit;
$loginid=getSession("loginid");
if(isset($_REQUEST['country'])){ $country=$_REQUEST['country']; }
if(isset($_REQUEST['mobile'])){ $mobile=$_REQUEST['mobile']; }
$country_code=countryname_to_code($country); // country name
//echo $country; 
$mobile_code=countrycode_to_mobile($country_code);
updateMobileInfo($country,$mobile_code,$mobile,$loginid);
$mobile_otp=randomNum( 6 );
setMobileOtpById($loginid,$mobile_otp);
sleep(2);
?>
<div class="row">
<h5 class="pull-right"><b><?php echo $mobile_code." ".$mobile; ?></b></h5>
</div>
<p class="pull-right">
<button type="button" onclick="verifyMobileOTP()" class="btn btn-primary">Verify</button>
</p>