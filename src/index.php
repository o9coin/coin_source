<?php  
include "auth.php";
//setSession("loginid", "32");
$loginid=getSession("loginid");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>dashboard</title>

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
		.am_td a
		{
			color:#fff;
			
		}
		</style>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
							<li class="active">Dashboard</li>
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
								

<div class="col-md-12 infobox-container" style="margin-top:10px;">
	<?php 
if($loginid!=''){
$mail_verify=getFieldVal(TBL__PREFIX1."create_wallet", "MailVerify", "Id=".$loginid);
$userdetail=get_imageauth($loginid);
$userdetail2 =  mysqli_fetch_assoc($userdetail);
?>	
		<div class="infobox infobox-green ">
			<div class="infobox-icon">
				<i class=" ace-icon fa fa-file-image-o " aria-hidden="true"></i>
			</div>

			<div class="infobox-data">
                            
                       <?php if($userdetail2['Image'] !=''){ ?> 
                <span class="label label-success arrowed-in arrowed-in-right">verified</span>   
<?php }else{ ?> 
               
                    <span class="am_td label label-danger arrowed"><a href="image_auth.php">  unverified</a></span>
                 
                         
<?php } ?>
				
                      
				<div class="infobox-content">Image</div>
			</div>

		
		</div>

		<div class="infobox infobox-blue">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-dot-circle-o"></i>
			</div>

			<div class="infobox-data">
			<?php if($userdetail2['Phrase'] !=''){ ?> 
                <span class=" label label-success arrowed-in arrowed-in-right">verified</span>
<?php }else{ ?> 
                            
                <span class="am_td label label-danger arrowed">  <a href="phrase_code.php">  unverified</a></span>
<?php } ?>
			
				<div class="infobox-content">Phrase</div>
			</div>
		</div>

		

		<div class="infobox infobox-red">
			<div class="infobox-icon">
				<i class="ace-icon fa fa-envelope"></i>
			</div>

			<div class="infobox-data">
			<?php if($mail_verify !='0'){ ?> 
                <span class="label label-success arrowed-in arrowed-in-right">verified</span> 
<?php }else{ ?> 
                            
                <span class="am_td label label-danger arrowed">  <a href="preference.php">  unverified</a></span>  
<?php } ?>
				
				
				<div class="infobox-content">E-code</div>
			</div>
		</div>
	

		
<?php
  }
?>
		

		<div class="space-6"></div>

	
	</div>
									
								</div>
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<!-- send & receive -->
<?php include ('send_receive.php'); ?>
<!-- /.send & receive -->

<?php include ('footer.php'); ?>

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

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.index.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		
	</body>
</html>
