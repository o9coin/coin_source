<?php 
include "auth.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title>transaction</title>

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
<a href="send.php">Transaction</a>
</li>
<li class="active">Send O9Coin</li>
</ul><!-- /.breadcrumb -->

<div class="nav-search" id="nav-search">
<form class="form-search">
<span class="input-icon">
<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
<i class="ace-icon fa fa-search nav-search-icon"></i>
</span>
</form>
</div><!-- /.nav-search -->
</div>

<div class="page-content">


<?php include('settings_container.php'); ?><!-- /.ace-settings-box -->
<!-- /.ace-settings-container -->

<div class="page-header">
<h1>
O9Coin
<small>
<i class="ace-icon fa fa-angle-double-right"></i>
Transaction
</small>
</h1>
</div><!-- /.page-header -->
<div class="page-header">
<?php  
$loginid=getSession("loginid");
//start sender amount info
$bal_amc=getAmcBalance($loginid);
//end sender amount info
?>
    <h4><b>BE YOUR OWN BANK <span class="pull-right"><?php echo $bal_amc; ?>  O9C</span></b></h4>    
<div><a href="#my-modal" role="button" class="btn btn-default" data-toggle="modal">
<i class="ace-icon fa fa-send"></i>&nbsp; Send &nbsp;
</a>
<a href="#my-modal1" role="button" class="btn btn-default" data-toggle="modal">
<i class="ace-icon fa fa-repeat"></i>Receive
</a>
    <span class="pull-right"><b></b></span>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="tabbable">
<div class="tab-content no-border padding-24">
<!--start content here-->




<a href="#my-modal" role="button" class="bigger-125 bg-primary white" data-toggle="modal">
&nbsp; Send &nbsp;
</a>

<div id="my-modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
		    <div class="modal-content" id='changeview'>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="smaller lighter blue no-margin"> </h3>
					<p>Instantly Send O9Coin to any O9Coin Address.</p>
			
				</div>

<div class="modal-body">
<div class="row ">
    <form class="" name="sendfrm">
    <div class="form-group col-md-12 col-sm-12 col-xs-12">
      <label class="col-md-1 co-sm-1 col-xs-3" for="usr">To</label>
      <input class="col-md-11 col-sm-11 col-xs-9" type="text" onblur="checkToWalletAddress();" name="toaddress" id="toaddress" placeholder="To">
      <p id="checkaddr" style="padding-left: 46px;"></p>
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label class="col-md-2 col-xs-3" for="pwd">O9C</label>
      <input class="col-md-10 col-xs-9" type="text"  name="amcval" onblur="checkAmcBalance();" id="amcval" placeholder="AME">
      <p id="checkbal" style="padding-left: 46px;"></p>
    </div>

	<div class="form-group col-md-6 col-sm-6 col-xs-12">

      <label class="col-md-2 col-xs-3" for="usr">USD</label>
      <input class="col-md-10 col-xs-9" type="text"   name="usdval" id="usdval" placeholder="USD">
    </div>
    <div class="form-group col-md-12 col-xs-12">
      <label class="col-md-2 col-xs-3 " style="display: inline-block;" for="pwd">Description</label>
      <textarea class="col-md-10 col-xs-9" name="description" placeholder="description" ></textarea>
    </div>
    </form>			
  </div>			
</div>

<div class="modal-footer">
<!--    <button class="btn btn-sm btn-primary pull-left" data-dismiss="modal">
	    Advanced send
    </button>-->
    <button class="btn btn-sm btn-danger" data-dismiss="modal">
	    Close
    </button>
    <button class="btn btn-sm btn-primary " onclick="sendCoin();"  type="button">	
	Submit
    </button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<!--	<div id="aside-inside-modal" class="modal" data-placement="bottom" data-background="true" data-backdrop="false" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 white">
							<h3 class="lighter no-margin"></h3>

							<br />
							<br />
						</div>
					</div>
				</div>
			</div> /.modal-content 

			<button class="btn btn-default btn-app btn-xs ace-settings-btn aside-trigger" data-target="#aside-inside-modal" data-toggle="modal" type="button">
				<i data-icon2="fa-arrow-down" data-icon1="fa-arrow-up" class="ace-icon fa fa-arrow-up bigger-110 icon-only"></i>
			</button>
		</div> /.modal-dialog 
	</div>-->

	
	<!--receive-->
<?php  
    $loginid=getSession("loginid");
    $wallet_addr=getFieldVal(TBL__PREFIX1."create_wallet", "WalletAddress", "Id=".$loginid);
    //echo $wallet_addr; exit;
?>
	<p><a href="#my-modal1" role="button" class="bigger-125 bg-primary white" data-toggle="modal">
	Receive
								</a></p>
<div id="my-modal1" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="smaller lighter blue no-margin">Receive</h3>
	</div>

	<div class="modal-body">
	<div class="row">
		<p align="center">  <input id="text" type="text" value="<?php echo $wallet_addr; ?>" style="display:none;"/></p>
	<p align="center"><?php echo $wallet_addr; ?></p>

	<p align="center" id="qrcode"></p>

	
</div>	
	
	</div>

	<div class="modal-footer">
		<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
			<i class="ace-icon fa fa-times"></i>
			Close
		</button>
	</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<div id="aside-inside-modal" class="modal" data-placement="bottom" data-background="true" data-backdrop="false" tabindex="-2">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-body">
		<div class="row">
			<div class="col-xs-12 white">
				<h3 class="lighter no-margin">Inside another modal</h3>

				<br />
				<br />
			</div>
		</div>
	</div>
</div><!-- /.modal-content -->

<button class="btn btn-default btn-app btn-xs ace-settings-btn aside-trigger" data-target="#aside-inside-modal" data-toggle="modal" type="button">
	<i data-icon2="fa-arrow-down" data-icon1="fa-arrow-up" class="ace-icon fa fa-arrow-up bigger-110 icon-only"></i>
</button>
</div><!-- /.modal-dialog -->
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


	<script type="text/javascript">
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal > .modal-dialog'});
				
				//$('#top-menu').modal('show')
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
				
				
				//make content sliders resizable using jQuery UI (you should include jquery ui files)
				//$('#right-menu > .modal-dialog').resizable({handles: "w", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});
			})
		</script>
		
		<!--receive-->
			<script type="text/javascript">
			jQuery(function($) {
				$('.modal.aside').ace_aside();
				
				$('#aside-inside-modal').addClass('aside').ace_aside({container: '#my-modal1 > .modal-dialog'});
				
				//$('#top-menu').modal('show')
				
				$(document).one('ajaxloadstart.page', function(e) {
					//in ajax mode, remove before leaving page
					$('.modal.aside').remove();
					$(window).off('.aside')
				});
				
				
				//make content sliders resizable using jQuery UI (you should include jquery ui files)
				//$('#right-menu > .modal-dialog').resizable({handles: "w", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});
			})
		</script>
		


<script src="assets/qrcode/jquery.min.js" type="text/javascript"></script>
<script src="assets/qrcode/qrcode.min.js" type="text/javascript"></script>
<script>
var qrcode = new QRCode("qrcode");

$("#text").on("keyup", function () {
    qrcode.makeCode($(this).val());
}).keyup().focus();
</script>

<script>
    
function valAll(){
    if(document.sendfrm.toaddress.value =="")
{
alert("Enter To Wallet Address");
//document.signupform.username.focus();
 return false;
} 
//    var toaddr = document.getElementById("toaddress").value;
//    var amc = document.getElementById("amcval").value;
//    var usd = document.getElementById("usdval").value;

}

function sendCoin(){
    var toaddr = document.getElementById("toaddress").value;
    var amc = document.getElementById("amcval").value;
    var usd = document.getElementById("usdval").value;
    var params="to="+toaddr+"&amc="+amc+"&usd="+usd;
    //alert(params); exit;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("changeview").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_coin_ajax.php?"+params, true);
xmlhttp.send();
}

function checkToWalletAddress(){
    var toaddr = document.getElementById("toaddress").value;
    var params="to="+toaddr;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("checkaddr").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_addresscheck_ajax.php?"+params, true);
xmlhttp.send();
}

function checkAmcBalance(){
    var amc = document.getElementById("amcval").value;
    var params="amc="+amc;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("checkbal").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_balance_ajax.php?"+params, true);
xmlhttp.send();
}
</script>
</body>
</html>

