<?php 
include "auth.php";
$loginid=getSession("loginid");
$user_det=getUserDetailsById($loginid); 
$item=  mysqli_fetch_assoc($user_det);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>preference</title>

<meta name="description" content="frequently asked questions using tabs and accordions" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- page specific plugin styles -->

<!-- text fonts -->
<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

<!--[if lte IE 9]>
  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="assets/js/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body class="no-skin">
<?php include('topmenu.php'); ?>

<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
try{ace.settings.loadState('main-container')}catch(e){}
</script>

<?php include('leftmenu.php'); ?>

<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
<li>
<i class="ace-icon fa fa-home home-icon"></i>
<a href="index.php">Home</a>
</li>

<li>
    <a href="preference.php">Settings</a>
</li>
<li class="active">Preference</li>
</ul><!-- /.breadcrumb -->

<?php include "top_search1.php";  ?>
<!-- /.nav-search -->
</div>

<div class="page-content">
<?php include 'settings_container.php'; ?>  					    
<!-- /.ace-settings-container -->
<!-- page-header -->
<?php  

include "send_receive_top.php";
?>
<!-- /.page-header -->	

<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="tabbable">
<div class="tab-content no-border padding-24">
<!--start content here-->
<!--<div class="alert alert-info">
    Customize your wallet experience
</div>-->
<div class="col-xs-12 col-md-12 col-sm-12">
<form name="preference" method="post" action="preference.php">   
<div class="row">
<div class="col-xs-12 col-md-12 col-sm-12">
<div class="col-xs-12 col-md-6 col-sm-8">
<?php  
if($item['MailVerify']=='0'){
?>
    <h5><b>E-code Verification </b> <span id="mail_verified"><span class="label label-danger">Unverified</span></span></h5>
<?php  
}else{
?>
    <h5><b>E-code Verification </b> <span class="label label-success">Verified</span></h5>
<?php  
}
?>    
    <p>Your verified email address is used to send login codes when suspicious or unusual activity is detected, to remind you of your wallet login ID, and to send O9Coin payment alerts when you receive funds.</p>
    
</div>
<div class="col-xs-0 col-md-3 col-sm-0"></div>    
<div class="col-xs-12 col-md-3 col-sm-4">
<div class="" id="mail_hide">
<div class="row">
<h5 class="pull-right"><b><?php echo $item['Email']; ?></b></h5>
</div>
<div class="row">
<p class="pull-right" id="changed1">
<?php  
if($item['MailVerify']=='0'){
if($item['MailVerifyOTP']!=''){
?>  
    <button type="button" onclick="verifyEmailOTP()" class="btn btn-primary ">Verify</button> 
<?php  
}else{
?>	
	<button type="button" onclick="changeEmail()" class="btn btn-primary">Verify</button>
<?php  
}}
?>    
</p>
</div>
</div> 
<div class="row" id="mail_show" style="display: none;">
    <h5>E-code Verification</h5>
    <p>Submit your Email we sent you a verification code to your email.</p>
    <input type="text" name="mail_change" id="mail_change" readonly="" placeholder="Email Address" value="<?php echo $item['Email']; ?>" class="col-xs-12 col-md-12 col-sm-12">
    <div class="pull-right" style="margin-top: 12px;">
	<a href="javascript:void(0)" onclick="mailCancel()" >Cancel</a>
	<button type="button" name="mail_submit" onclick="submitEmail();" class="btn btn-primary">Submit</button>
    </div>
</div>  
<div class="row" id="mail_otp" style="display: none;" >
    <p id="invalid_mail"></p>
    <p>We have sent your email with a verification code. Enter the code below to verify your email address.</p>
    <input type="text" id="mail_code" name="mail_code" placeholder="Email code" class="col-xs-12 col-md-12 col-sm-12">
    <div class="pull-right" style="margin-top: 12px;">
	<a href="javascript:void(0)" onclick="mailCancel()" >Cancel</a>
	<button type="button" name="mail_verify" onclick="checkMailVerify()" class="btn btn-primary ">Verify</button>    
    </div>
</div>    
</div>
</div>
</div>
<hr>
<div class="row">
<div class="col-xs-12 col-md-12 col-sm-12">
<div class="col-xs-12 col-md-6 col-sm-8">
<?php  
if($item['MobileVerify']=='0'){
?>    
    <h5><b>Mobile Number </b> <span id="mobile_verified"><span class="label label-danger">Unverified</span></span></h5>
<?php  
}else{
?>    
    <h5><b>Mobile Number </b> <span class="label label-success">Verified</span></h5>
<?php  
}
?>    
    <p>Your mobile phone can be used to enable two-factor authentication, helping to secure your wallet from unauthorized access, and to send O9Coin payment alerts when you receive funds.</p>
    
</div>
<div class="col-xs-0 col-md-3 col-sm-0"></div>    
<div class="col-xs-12 col-md-3 col-sm-4">
<div class="" id="hide_mob" >
    <div class="row">
    <h5 class="pull-right"><b><?php echo $item['MobileCode']." ".$item['Mobile']; ?></b></h5>
    </div>
 <div class="row">    
<p class="pull-right" id="changed2">
<?php  

if($item['MobileVerifyOTP']!='0'){
?>     
    <button type="button" onclick="verifyMobileOTP()" class="btn btn-primary">Verify</button> 
<?php  
}else{
?>	
    <button type="button" onclick="changeMobile()" class="btn btn-primary">Change</button>
<?php  
}
?>    
</p>
</div>
</div> 
<div class="row" id="show_mob" style="display: none;">
				<h5>Mobile Number</h5>
				<select class="form-control" onclick="showMobileCode(this.value)"  name="country" required="" id="country">
<?php  
$country_name=getCountry();
while($count_name=  mysqli_fetch_array($country_name)){
?>
		    <option value="<?php  echo $count_name['CountryName'];  ?>" <?php  if($count_name['CountryName']== $item['Country']) echo 'selected';  ?>><?php  echo $count_name['CountryName'];  ?></option>
<?php  
}
?>
				</select><br>
				<span id="mobilecode" class="col-xs-3 col-md-4 col-sm-3" style="padding-right: 0;">  
	<input class="form-control" value="<?php echo $item['MobileCode'];  ?>" name="country_code" type="text" required="" maxlength="5" readonly="" id="country_code">
    </span>
    <input type="text" id="mobile_change" name="mobile_change" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Mobile Number" value="<?php echo $item['Mobile']; ?>" class="col-xs-9 col-md-8 col-sm-9">
    <div class="pull-right" style="margin-top: 12px;">
	<a href="javascript:void(0)" onclick="mobileCancel()" >Cancel</a>
    <button type="button" name="mobile_submit" onclick="submitMobile();" class="btn btn-primary ">Submit</button>    
    </div>
</div> 
<div class="row" id="otp_mob" style="display: none;" >
    <p id="invalid_mob"></p>
    <p>We have sent your mobile phone an SMS message with a verification code. Enter the code below to verify your mobile phone number.</p>
    <input type="text" id="mobile_otp" name="mobile_otp"  placeholder="Mobile code" class="col-xs-12 col-md-12 col-sm-12">
    <div class="pull-right" style="margin-top: 12px;">
<!--    <a href="preference.php" >Resend</a>-->
<a href="javascript:void(0)" onclick="mobileCancel()" >Cancel</a>
    <button type="button" name="mobile_verify" onclick="checkMobileVerify()" class="btn btn-primary ">Verify</button>    
    </div>
</div>     
</div>
</div>
</div>
<hr>
</form> 
</div>
<!--end content here-->
</div>
</div>

<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<!-- send & receive -->
<?php include ('send_receive.php'); ?>
<!-- /.send & receive -->
<?php  include('footer.php'); ?>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
	<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<!-- ask question function-->

<!-- inline scripts related to this page -->
<script>
function changeEmail(){
    document.getElementById("mail_hide").style.display="none";
    document.getElementById("mail_show").style.display="block";
}  
function verifyEmailOTP(){
    document.getElementById("mail_hide").style.display="none";
    document.getElementById("mail_show").style.display="none";
    document.getElementById("mail_otp").style.display="block";
}
function mailCancel(){
    document.getElementById("mail_hide").style.display="block";
    document.getElementById("mail_show").style.display="none";
    document.getElementById("mail_otp").style.display="none";
}
function changeMobile(){
    document.getElementById("hide_mob").style.display="none";
    document.getElementById("show_mob").style.display="block";
}  
function verifyMobileOTP(){
    document.getElementById("hide_mob").style.display="none";
    document.getElementById("show_mob").style.display="none";
    document.getElementById("otp_mob").style.display="block";
}
function mobileCancel(){
    document.getElementById("hide_mob").style.display="block";
    document.getElementById("show_mob").style.display="none";
    document.getElementById("otp_mob").style.display="none";
}



function submitEmail(){
var email = document.getElementById("mail_change").value;
//alert(email); 
var params="mail="+email;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("mail_show").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
	document.getElementById("mail_show").innerHTML = '<div style="position: absolute; left: 50%"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div>';
    }
}; 
xmlhttp.open("GET", "mail_verify_ajax.php?"+params, true);
xmlhttp.send();
}

function submitMobile(){
var country = document.getElementById("country").value;
var mobile = document.getElementById("mobile_change").value;

var params="country="+country+"&mobile="+mobile;
//alert(params);
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("show_mob").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
	document.getElementById("show_mob").innerHTML = '<div style="position: absolute; left: 50%"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><div>';
    }
}; 
xmlhttp.open("GET", "mobile_verify_ajax.php?"+params, true);
xmlhttp.send();
}

function checkMailVerify(){
var code = document.getElementById("mail_code").value;
//alert(email); 
var params="code="+code;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      var mail_res = this.responseText;
      if(mail_res==0){
	document.getElementById("invalid_mail").innerHTML="Your Mail Verification Code is Invalid";
	}else{
	    document.getElementById("mail_verified").innerHTML='<span class="label label-success">Verified</span>';	    
	    document.getElementById("mail_hide").style.display="block";
	document.getElementById("mail_otp").style.display="none";
	document.getElementById("changed1").innerHTML='';
	}
    }
}; 
xmlhttp.open("GET", "mail_verifycode_ajax.php?"+params, true);
xmlhttp.send();
}

function checkMobileVerify(){
var code = document.getElementById("mobile_otp").value;
//alert(code); 
var params="code="+code;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
      var mob_res = this.responseText;
      if(mob_res==0){
	document.getElementById("invalid_mob").innerHTML="Your Mobile Verification Code is Invalid";
	}else{
	    document.getElementById("mobile_verified").innerHTML='<span class="label label-success">Verified</span>';
	    document.getElementById("hide_mob").style.display="block";
	document.getElementById("otp_mob").style.display="none";
	document.getElementById("changed2").innerHTML='<button type="button" onclick="changeMobile()" class="btn btn-primary">Change</button>';
	}
    }
}; 
xmlhttp.open("GET", "mobile_verifycode_ajax.php?"+params, true);
xmlhttp.send();
}

function showMobileCode(countryname){
    var params="country="+countryname;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("mobilecode").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "country_code_ajax.php?"+params, true);
xmlhttp.send();
}
</script>    
</body>
</html>

