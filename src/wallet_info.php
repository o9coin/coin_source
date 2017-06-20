<?php 
include "auth.php";
$role= getSession("loginid");
//echo $role; exit;
$result=get_walletID($role);
//print_r($result); exit;
$result_value=  mysqli_fetch_assoc($result);
//print_r($result_value); exit;
$walletid=$result_value['WalletId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>Wallet Information</title>

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
#qrcode  img{
width:150px!important;
height:150px !important;
margin-top:15px;
 margin-right: -130px;
    margin-top: 60px;
}
#text {
display: block;
width: 50%;
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
    <a href="wallet_info.php">Settings</a>
</li>
<li class="active">Wallet Information</li>
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

<div class="col-xs-12 col-md-12 col-sm-12">
  <form name="wallet_info" method="post" action="wallet_info.php">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="col-xs-12 col-md-6 col-sm-8">
          <h4><b>Wallet ID</b></h4>
          <p>Wallet ID is your unique identifier.It is completely individual to you,and it is what you will use to log in and access your wallet. It is <b>not</b> a O9Coin address for sending or receiving. Do not share your Wallet ID with others.</p>
        </div>

        <div class="col-xs-12 col-md-6 col-sm-4">
<?php 



?>
            <h5 class="pull-right"><b><?php echo  $walletid; ?></b>
              
            </h5>
            <p><input id="texter" type="text" value="<?php echo $walletid; ?>" style="display:none;"/></p>
       
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-sm-12">
        <div class="col-xs-12 col-md-6 col-sm-8">
          <h4><b>Mobile App Pairing Code</b></h4>
          <p>Scan the code (click on 'Show Pariring Code') with your O9Coin Wallet (Android) for a seamless connection to your wallet.Download the  Androdid app here.Do not share your Pairing Code with other.</p>
        </div>
        <div class="col-xs-0 col-md-3 col-sm-0"></div>
        <div class="col-xs-12 col-md-3 col-sm-4">
          <div class="row pull-right" >
            <button type="button" onclick="pairicng()" class="btn btn-primary"><span id="hide1">Show</span> Pairing Code</button></p>
          </div>
          <div class="row pull-right" id="qrcode1" style="display: none;">
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
<script src="assets/qrcode/jquery.min.js" type="text/javascript"></script>
<script src="assets/qrcode/qrcode.min.js" type="text/javascript"></script>
<!-- inline scripts related to this page -->

<script>
var qrcode = new QRCode("qrcode1");

$("#texter").on("keyup", function () {
    qrcode.makeCode($(this).val());
}).keyup().focus();
</script>
<!-- inline scripts related to this page -->
<script>
function pairicng() {
    var x = document.getElementById('qrcode1');
    if (x.style.display === 'none') {
        x.style.display = 'block';
		document.getElementById('hide1').innerHTML='Hide'; 
    } else {
        x.style.display = 'none';
		document.getElementById('hide1').innerHTML='Show'; 
    }
}
</script> 

</body>
</html>


