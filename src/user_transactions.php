<?php 
include "auth.php";
//setSession('changerate', 'amc');

?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title> O9Coin | Transactions </title>

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
<style>.tag-address {
    display: inline-block;
    vertical-align: bottom;
    text-overflow: ellipsis;
    width: 125px;
    overflow: hidden;
}





@media only screen and (max-width: 600px) {
    .hidden-phone{
       display:none;
    }
	.hash-link {
    overflow: hidden;
    text-overflow: ellipsis;
    width: 250px;
}
	.hash-link {
    float: left;
    font-size: 12px;
    font-weight: normal;
    white-space: nowrap;
}
}


</style>
<style>
    .in {
	display: inline-block !important;
    }
    .out {
	display: none !important;
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
							    <a href="user_transactions.php">Transaction</a>
							</li>
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
	<div class="row">
		<div class="col-xs-12">
			<div class="tabbable">
	    <ul id="inbox-tabs" class="inbox-tabs nav nav-tabs padding-16 tab-size-bigger tab-space-1">
<!--												<li class="li-new-mail pull-right">
			    <a data-toggle="tab" href="#write" data-target="write" class="btn-new-mail">
				    <span class="btn btn-purple no-border">
					    <i class="ace-icon fa fa-envelope bigger-130"></i>
					    <span class="bigger-110">Write Mail</span>
				    </span>
			    </a>
		    </li> /.li-new-mail -->

		    <li class="active">
			<a data-toggle="tab" href="#inbox" onclick="showAll();" data-target="inbox">
				    <i class="blue ace-icon fa fa-inbox bigger-130"></i>
				    <span class="bigger-110">All</span>
			    </a>
		    </li>

		    <li>
			    <a data-toggle="tab" href="#sent" onclick="showSend();" data-target="sent">
				    <i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
				    <span class="bigger-110">Sent</span>
			    </a>
		    </li>

		    <li>
			    <a data-toggle="tab" href="#draft" onclick="showReceive();" data-target="draft">
				    <i class="green ace-icon fa fa-refresh bigger-130"></i>
				    <span class="bigger-110">Receive</span>
			    </a>
		    </li>

</ul>

<div class="tab-content no-border no-padding">
<div id="inbox" class="tab-pane in active">
<div class="message-container">
<div id="id-message-list-navbar" class="message-navbar clearfix">
</div>
<div class="message-list-container">
<?php  
$loginid=getSession("loginid");
$all_detail=getAllTransactionAddress($loginid);
$send_detail=getSendTransaction($loginid);
?>
<div class="message-list" id="message-list">
    <div class="message-item message-unread">
	<div class="row">
    <div class="col-md-12 ">
<table class="table table-striped" cellpadding="0" cellspacing="0" style="padding:0px;float:left;margin:0px;width:100%">
  <tbody>
<?php  
if(mysqli_num_rows($all_detail)){
      while ($item = mysqli_fetch_array($all_detail)){
	  if($item['SenderWalletId']!=''){
          $sender = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['SenderWalletId']);
	  }else{
	      $sender='';
	  }
          $receiver = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['ReceiverWalletId']);
?>
    <tr>
        <th colspan="3" align="left"><a class="hash-link" href="hash1.php?value=<?php echo $item['HashKey']; ?>"><?php echo $item['HashKey']; ?></a> <span class="pull-right"><?php echo $item['SentDateTime']; ?></span></th>
    </tr>
    <tr>
        <td width="500px" class="txtd hidden-phone"><b>
                
<?php
if($loginid==$item['SenderWalletId']){
?>
                <?php echo $sender; ?>
<?php
}else{
?>
                <a href="address1.php?value=<?php echo $sender; ?>"><?php echo $sender; ?></a>
<?php
}
?>                 
            
            </b></td>
<?php
if($loginid==$item['SenderWalletId']){
?>	    
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/arrow.png"></td>
<?php
}else{
?>
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/left_arrow.png"></td>
<?php
}
?> 
      <td class="txtd"><b>
<?php
if($loginid==$item['ReceiverWalletId']){
?>
                <?php echo $receiver; ?>
<?php
}else{
?>
                <a href="address1.php?value=<?php echo $receiver; ?>"><?php echo $receiver; ?></a>
<?php
}
?>               
          </b>
<?php if($item['VirtualConfirmation']=='1'){ ?>          
          
<?php }elseif ($item['ReceiverConfirmation']=='1'){?>
	<span class="label label-success form-group">Pending 2/3</span>	      
 <?php  }elseif($item['SenderConfirmation']=='1'){ ?> 
	<span class="label label-info form-group">Pending 1/3</span>	
 <?php }else{ ?>
	<span class="label label-warning form-group">Pending</span>	
 <?php } ?> 	
          <span class="in pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></span>
<!--	  <span class="out pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></span>-->
	  <br>
      <div style="padding-bottom:30px;width:100%;text-align:right;clear:both"> 
	  <button class="in btn btn-success cb"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></button>
<!--	  <button class="out btn btn-success cb"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></button>-->
      </div>
      </td>
      
    </tr>
    
<?php
      }
}
?>
  </tbody>
</table>
  
  
  </div>
</div>
    </div>
																									</div>
<div class="message-list" id="message-list1" style="display: none;">
    <div class="message-item message-unread">
	<div class="row">
    <div class="col-md-12 ">
<table class="table table-striped" cellpadding="0" cellspacing="0" style="padding:0px;float:left;margin:0px;width:100%">
  <tbody>
<?php  


if(mysqli_num_rows($send_detail)){
      while ($item = mysqli_fetch_array($send_detail)){
          if($item['SenderWalletId']!=''){
          $sender = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['SenderWalletId']);
	  }else{
	      $sender='';
	  }
          $receiver = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['ReceiverWalletId']);
?>
    <tr>
        <th colspan="3" align="left"><a class="hash-link" href="hash1.php?value=<?php echo $item['HashKey']; ?>"><?php echo $item['HashKey']; ?></a> <span class="pull-right"><?php echo $item['SentDateTime']; ?></span></th>
    </tr>
    <tr>
        <td width="500px" class="txtd hidden-phone"><b><?php echo $sender; ?></b></td>
<?php
if($loginid==$item['SenderWalletId']){
?>	    
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/arrow.png"></td>
<?php
}else{
?>
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/left_arrow.png"></td>
<?php
}
?> 
      <td class="txtd"><b><a href="address.php?value=<?php echo $receiver; ?>" class=""><?php echo $receiver; ?></a></b>
<?php if($item['VirtualConfirmation']=='1'){ ?>          
          
<?php }elseif ($item['ReceiverConfirmation']=='1'){?>
	<span class="label label-success form-group">Pending 2/3</span>	      
 <?php  }elseif($item['SenderConfirmation']=='1'){ ?> 
	<span class="label label-info form-group">Pending 1/3</span>	
 <?php }else{ ?>
	<span class="label label-warning form-group">Pending</span>	
 <?php } ?>         
          <span class="pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></span>
<!--	  <span class="pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></span>-->
	  <br>
      <div style="padding-bottom:30px;width:100%;text-align:right;clear:both"> <button class="btn btn-success cb"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></button>
<!--      <button class="btn btn-success cb"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></button>-->
      </div>
      </td>
      
    </tr>
    
<?php
      }
}
?>
  </tbody>
</table>
  
  
  </div>
</div>
    </div>
																									</div>
<div class="message-list" id="message-list2" style="display: none;">
    <div class="message-item message-unread">
	<div class="row">
    <div class="col-md-12 ">
<table class="table table-striped" cellpadding="0" cellspacing="0" style="padding:0px;float:left;margin:0px;width:100%">
  <tbody>
<?php  
$receive_detail=getReceiveTransaction($loginid);
if(mysqli_num_rows($receive_detail)){
      while ($item = mysqli_fetch_array($receive_detail)){
          if($item['SenderWalletId']!=''){
          $sender = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['SenderWalletId']);
	  }else{
	      $sender='';
	  }
          $receiver = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletAddress', 'Id = '.$item['ReceiverWalletId']);
?>
      
   
    <tr>
        <th colspan="3" align="left"><a class="hash-link" href="hash1.php?value=<?php echo $item['HashKey']; ?>"><?php echo $item['HashKey']; ?></a> <span class="pull-right"><?php echo $item['SentDateTime']; ?></span></th>
    </tr>
    <tr>
        <td width="500px" class="txtd hidden-phone"><b><a href="address.php?value=<?php echo $sender; ?>"><?php echo $sender; ?></a></b></td>
<?php
if($loginid==$item['SenderWalletId']){
?>	    
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/arrow.png"></td>
<?php
}else{
?>
      <td width="48px" class="hidden-phone" style="padding:4px;text-align:center;vertical-align:middle;"><img src="assets/images/left_arrow.png"></td>
<?php
}
?> 
      <td class="txtd"><b><?php echo $receiver; ?></b>
<?php if($item['VirtualConfirmation']=='1'){ ?>          
          
<?php }elseif ($item['ReceiverConfirmation']=='1'){?>
	<span class="label label-success form-group">Pending 2/3</span>	      
 <?php  }elseif($item['SenderConfirmation']=='1'){ ?> 
	<span class="label label-info form-group">Pending 1/3</span>	
 <?php }else{ ?>
	<span class="label label-warning form-group">Pending</span>	
 <?php } ?>   	
          <span class="pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></span>
<!--	  <span class="pull-right hidden-phone"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></span>-->
	  <br>
      <div style="padding-bottom:30px;width:100%;text-align:right;clear:both"> <button class="btn btn-success cb"><span data-c="1459718305" data-time="1490101310000"><?php echo $item['AMCValue']; ?> AME</span></button>
<!--      <button class="btn btn-success cb"><span data-c="1459718305" data-time="1490101310000">$<?php //echo $item['USDValue']; ?> </span></button>-->
      </div>
      </td>
      
    </tr>
    
<?php
}
      
}
?>
  </tbody>
</table>
  
  
  </div>
</div>
    </div>
																									</div>   
</div>


														
													</div>
												</div>
											</div><!-- /.tab-content -->
										</div><!-- /.tabbable -->
									</div><!-- /.col -->
								</div><!-- /.row -->


								<div class="hide message-content" id="id-message-content">
									<div class="message-header clearfix">
										<div class="pull-left">
											<span class="blue bigger-125"> Clik to open this message </span>

											<div class="space-4"></div>

											<i class="ace-icon fa fa-star orange2"></i>

											&nbsp;
											<img class="middle" alt="John's Avatar" src="assets/images/avatars/avatar.png" width="32" />
											&nbsp;
											<a href="#" class="sender">John Doe</a>

											&nbsp;
											<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
											<span class="time grey">Today, 7:15 pm</span>
										</div>

										<div class="pull-right action-buttons">
											<a href="#">
												<i class="ace-icon fa fa-reply green icon-only bigger-130"></i>
											</a>

											<a href="#">
												<i class="ace-icon fa fa-mail-forward blue icon-only bigger-130"></i>
											</a>

											<a href="#">
												<i class="ace-icon fa fa-trash-o red icon-only bigger-130"></i>
											</a>
										</div>
									</div>

									<div class="hr hr-double"></div>

									<div class="message-body">
										<p>
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
										</p>

										<p>
											Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</p>

										<p>
											Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
										</p>

										<p>
											Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</p>

										<p>
											Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
										</p>

										<p>
											Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										</p>
									</div>

									<div class="hr hr-double"></div>

									<div class="message-attachment clearfix">
										<div class="attachment-title">
											<span class="blue bolder bigger-110">Attachments</span>
											&nbsp;
											<span class="grey">(2 files, 4.5 MB)</span>

											<div class="inline position-relative">
												<a href="#" data-toggle="dropdown" class="dropdown-toggle">
													&nbsp;
													<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
												</a>

												<ul class="dropdown-menu dropdown-lighter">
													<li>
														<a href="#">Download all as zip</a>
													</li>

													<li>
														<a href="#">Display in slideshow</a>
													</li>
												</ul>
											</div>
										</div>

										&nbsp;
										<ul class="attachment-list pull-left list-unstyled">
											<li>
												<a href="#" class="attached-file">
													<i class="ace-icon fa fa-file-o bigger-110"></i>
													<span class="attached-name">Document1.pdf</span>
												</a>

												<span class="action-buttons">
													<a href="#">
														<i class="ace-icon fa fa-download bigger-125 blue"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
													</a>
												</span>
											</li>

											<li>
												<a href="#" class="attached-file">
													<i class="ace-icon fa fa-film bigger-110"></i>
													<span class="attached-name">Sample.mp4</span>
												</a>

												<span class="action-buttons">
													<a href="#">
														<i class="ace-icon fa fa-download bigger-125 blue"></i>
													</a>

													<a href="#">
														<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
													</a>
												</span>
											</li>
										</ul>

										<div class="attachment-images pull-right">
											<div class="vspace-4-sm"></div>

											<div>
												<img width="36" alt="image 4" src="assets/images/gallery/thumb-4.jpg" />
												<img width="36" alt="image 3" src="assets/images/gallery/thumb-3.jpg" />
												<img width="36" alt="image 2" src="assets/images/gallery/thumb-2.jpg" />
												<img width="36" alt="image 1" src="assets/images/gallery/thumb-1.jpg" />
											</div>
										</div>
									</div>
								</div><!-- /.message-content -->

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->


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
		<script src="assets/js/bootstrap-tag.min.js"></script>
		<script src="assets/js/jquery.hotkeys.index.min.js"></script>
		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
<!-- ask question function-->
		<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
<script>
function showAll(){
    document.getElementById("message-list1").style.display="none";
    document.getElementById("message-list2").style.display="none";
    document.getElementById("message-list").style.display="block";
}   
function showSend(){
    
    document.getElementById("message-list2").style.display="none";
    document.getElementById("message-list").style.display="none";
    document.getElementById("message-list1").style.display="block";
}
function showReceive(){
    document.getElementById("message-list1").style.display="none";
    document.getElementById("message-list").style.display="none";
    document.getElementById("message-list2").style.display="block";
    
}
</script>	

		<!-- inline scripts related to this page -->
	</body>
</html>

