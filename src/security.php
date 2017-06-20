<?php 
include "auth.php";
$loginid=getSession("loginid");
//$loginid = 12;
//echo $loginid; exit;
$user_det=getUserDetailsById($loginid); 
$item=  mysqli_fetch_assoc($user_det);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>security</title>

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

<style>
 .og_label .col-md-2 label img{
	 height:128px;
	 width:158px;
 }
 label > input{ /* HIDE RADIO */
  visibility: hidden; /* Makes input not-clickable */
  position: absolute; /* Remove input from document flow */
}
label > input + img{ /* IMAGE STYLES */
  cursor:pointer;
  border:2px solid transparent;
}
label > input:checked + img{ /* (RADIO CHECKED) IMAGE STYLES */
  border:2px solid #f00;
}
 </style>
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
    <a href="security.php">Settings</a>
</li>
<li class="active">Security</li>
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
    Customize your wallet security
</div>-->
<div class="col-xs-12 col-md-12 col-sm-12">
    <form name="preference" method="post" action="security.php">   
<div class="row">
<div class="col-xs-12 col-md-12 col-sm-12">
<div class="col-xs-12 col-md-6 col-sm-8">
        <h5><b>2-Step Verification </b> <span id="mail_verified">
<?php  
if($item['TwoStepVerify']=='0'){
?>
<span class="label label-danger">Disable</span>
<?php  
}else{
?>
    <span class="label label-success">Enabled</span>
<?php  
}
?>  
	</span>
    </h5>
    <p>Protect your wallet from unauthorized access by enabling 2-Step Verification. You can choose email or your mobile phone number to secure your wallet.</p>
    
</div>
<div class="col-xs-0 col-md-3 col-sm-0"></div>    
<div class="col-xs-12 col-md-3 col-sm-4">
<div class="row " id="mail_hide">
    <h5 class="pull-right"><b><?php //echo $item['Email']; ?></b></h5>
    <p class="pull-right" id="changed">
<?php  
if($item['TwoStepVerify']=='0'){    
?>	
	<a href="#my-modal" role="button" data-toggle="modal" class="navbar-toggle1 btn btn-primary">Enable</a>
<?php  
}else{
?>  
	<a href="#my-modal" role="button" onclick="showEnable();" class="btn btn-primary">Disable</a>
<?php  
}
?>     
	</p>
</div> 
    
<!-- popup open  -->   

<!-- popup close  -->   



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
<div id="popup-model" class="out" tabindex="-1" >
     <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close navbar-toggle1" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="smaller lighter blue no-margin">2-Step Verification via!</h3>
		</div>

		<div class="modal-body">
		    <div class="row">
		    <div class=" col-md-6  col-sm-6 col-xs-6">
		    <label class="pull-right">
		    <input type="radio" name="verify" id="verify_radio1" value="1" />
		    <img type="radio" class="img-thumbnail"  src="assets/images/icons/message.png" alt="Email" >
		    </label>
		    </div>
		    <div class=" col-md-6  col-sm-6 col-xs-6">
		    <label>
		    <input type="radio" name="verify" id="verify_radio2" value="2" />
		    <img type="radio" class="img-thumbnail"  src="assets/images/icons/smartphone-call.png" alt="Phone" >
		    </label>
		    </div>
<!--		    <div class="col-md-6 col-sm-6 col-xs-12">
			<label class="pull-right">
			    <input type="radio" id="verify_radio1" class="col-md-2 col-xs-3" name="verify" value="1"> 
			    <img src="assets/images/icons/message.png" class="col-md-10 col-xs-9" >
			</label>
		    </div>
		    <div class="form-group col-md-6 col-sm-6 col-xs-12">
			<label>
			    <input type="radio" id="verify_radio2" class="col-md-2 col-xs-3" name="verify" value="2"> 
			    <img src="assets/images/icons/smartphone-call.png" class="col-md-10 col-xs-9" >
			</label>
		    </div>-->
		    </div>
		</div>

		<div class="modal-footer">
		    <div class="pull-right">
		    <span id="btn_submit">
			<button class="btn btn-sm btn-success navbar-toggle1" onclick="checkVerify();"  type="button">
			    Submit
		    </button></span>
		    <button class="btn btn-sm btn-danger navbar-toggle1" data-dismiss="modal">
			    <i class="ace-icon fa fa-times"></i>
			    Close
		    </button>
		    </div>
		</div>
            
	</div><!-- /.modal-content -->
        
</div>   
<!-- /.modal-dialog -->
</div>
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
$('.navbar-toggle1').click(function() {
    $("#popup-model").toggleClass('in out');
});
</script>
<script>
    
    
    function checkVerify(){
	//alert(123); 
	var email = document.getElementById("verify_radio1").checked;
	var phone = document.getElementById("verify_radio2").checked;
	if(email == true)
	{
	   value = '1';
	}
	if(phone == true)
	{
	   value = '2';
	}
	//alert(value);
	var params="veri="+value;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	   var mob_res = this.responseText;
	  if(mob_res==1){
	      
		document.getElementById("mail_verified").innerHTML='<span class="label label-success">Enabled</span>';
	    document.getElementById("changed").innerHTML='<a href="#my-modal" role="button" onclick="showEnable();" class="btn btn-primary">Disable</a>';	if(this.readyState == 4 && this.status == 200) {

	    
	    //$("#my-modal").toggleClass("fade in");
	    //$("#my-modal").attr('fade in', '');
	    //$("#td_id").removeClass('Old_class').addClass('New_class');
	    //document.getElementById("my-modal").style.display="none";
	    }else{
		//document.getElementById("invalid_mob").innerHTML="Your Mobile Verification Code is Invalid";	    
	    }
	    }
	}; 
	xmlhttp.open("GET", "twostep_verification_ajax.php?"+params, true);
	xmlhttp.send();
	
    }
    
    function showEnable(){
	//alert(123); 
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	if(this.readyState == 4 && this.status == 200) {
	   var mob_res = this.responseText;
	  if(mob_res==1){
	    document.getElementById("mail_verified").innerHTML='<span class="label label-danger">Disable</span>';
	    document.getElementById("changed").innerHTML='<a href="#my-modal" role="button" data-toggle="modal" class="navbar-toggle1 btn btn-primary">Enable</a>';
	    }else{
		//document.getElementById("invalid_mob").innerHTML="Your Mobile Verification Code is Invalid";	    
	    }
	    }
	}; 
	xmlhttp.open("GET", "twostep_verification_ajax1.php", true);
	xmlhttp.send();
	
    }
    
</script>    

</body>
</html>

