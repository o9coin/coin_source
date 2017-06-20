<?php 
include "auth.php";
$loginid=getSession("loginid");
$success = getSession("success_alert");

    if ($success != '')
    {
            unsetSession("success_alert");
    }
	
if (isset($_POST['phrase_submit']))
    {
            if (isset($_POST['phrase_value']))
            {
                    if (trim($_POST['phrase_value']) != '')
                    {
                            $phrase_value = trim($_POST['phrase_value']);
                    }
            }

       $data = insert_phrase($phrase_value,$loginid);
            if($data != ''){
           setSession('success_alert', "Successfully Added");
           header('location:phrase_code.php' );
            } else{
                setSession('success_alert', "Successfully Updated");
           header('location:phrase_code.php' );
            }
    }

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>O9Coin | Phrase Code</title>
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
							<li class="active">Phrase Code</li>
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
								




<?php

    if ($success != '')
    {
    ?>
        <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
          <?php
            echo $success; ?>
        </div>  
        <?php
    } ?>



<form  action="phrase_code.php" name="phrase" method="post">

    


    <div class="form-group">
	<h4 style="padding-left: 10px;"><b>PHRASE CODE</b></h4>
        
 

        <input id="Order" type="button" value="Order" name="no"  class="btn btn-success"style="margin-bottom: 10px; margin-left:10px;" onclick="moveAlpha(this.value); this.disabled = 'disabled'; "> 
        
	<input  id="I" type="button" value="I" name="no"class="btn btn-info"   style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Stay" type="button" value="Stay" name="no" class="btn btn-primary"     style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
	<input id="Am" type="button" value="Am" name="no" class="btn" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
		<input id="Lonely" type="button" value="Lonely" name="no" class="btn btn-warning"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
                
	<input id="Brother" type="button" value="Brother" name="no"  class="btn btn-danger" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Easy" type="button" value="Easy" name="no" class="btn btn-inverse" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Arrive" type="button" value="Arrive" name="no"  class="btn btn-pink"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
		<input id="Expire" type="button" value="Expire" name="no" class="btn btn-yellow"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 

	
	<input id="Hill" type="button" value="Hill" name="no" class="btn btn-grey"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
	<input id="Rice" type="button" value="Rice" name="no" class="btn btn-light"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Young" type="button" value="Young" name="no"   class="btn btn-danger" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Escape" type="button" value="Escape" name="no"   class="btn btn-success" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
	
	<input id="Cycle" type="button" value="Cycle" name="no" class="btn btn-primary"   style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Lake" type="button" value="Lake" name="no"  class="btn btn-grey" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="To" type="button" value="To" name="no"  class="btn btn-warning" style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
	<input id="subway" type="button" value="subway" name="no" class="btn btn-light"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';">  
        
	<input id="Want" type="button" value="Want" name="no" class="btn btn-info"  style="margin-bottom: 10px; margin-left:10px;"onclick="moveAlpha(this.value); this.disabled = 'disabled';"> 
        
			
	
	</div>
		    <div class="form-group col-md-12 col-sm-12 col-xs-12">
	
	<?php //<input class="col-md-12"type="text" name="phrase_value" id="result"> ?>
	
                      <textarea class="form-control disbled"  name="phrase_value" rows="5" id="result"  required="required" readonly="readonly"></textarea>
	
	</div>
	   <div class="form-group col-md-12 col-sm-12 col-xs-12">
	<button type="submit" name="phrase_submit" onclick="return submitAlert()" class="btn btn-primary">Submit</button>
		  <button type="button" id="buttonid" class="btn btn-primary">Delete </button>
	</div>
</form>








								<div class="hr hr32 hr-dotted"></div>

								

								<div class="hr hr32 hr-dotted"></div>

								    

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

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
<!-- ask question function-->

<script>
function moveAlpha(num) { 
var txt=document.getElementById("result").value; 
txt=txt +" "+ num; 
document.getElementById("result").value=txt; 



} 
</script>

<script>
function validInfo() { 
var txt=document.getElementById("result").value; 
txt=txt +" "+ num; 
document.getElementById("result").value=txt; 



} 
</script>
<script>
$('#buttonid').on('click', function () { 
    var textVal = $('#result').val().split(' ');	
    var text1=textVal.pop();
	$('#'+text1).removeAttr('disabled');
    $('#result').val(textVal.join(' '));
});
</script>
<script>
function submitAlert()
{
	if(document.phrase.phrase_value.value=='')
	 {
	 alert("Please form the phrase");
         return false;
	 }
  
}
</script>

		<!-- inline scripts related to this page -->
	</body>
</html>

