<?php  
include "auth.php";
$loginid=getSession("loginid");
  $success = getSession("success_alert");
  
      if ($success != '')
      {
              unsetSession("success_alert");
      }

  if (isset($_POST['submit_img']))
      {
              if (isset($_POST['user_img']))
              {
                      if (trim($_POST['user_img']) != '')
                      {
                              $user_img = $_POST['user_img'];
                      }
              }
  
         insert_imageauth($user_img,$loginid);
              
             setSession('success_alert', "Image Authentication Successfully Updated");
                 header('location:image_auth.php' );
      }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>O9Coin | image authentication</title>
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
              <li class="active">Image Authentication</li>
            </ul>
            <!-- /.breadcrumb -->
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
              <div class="col-xs-12 col-md-12 col-sm-12">
      
	  



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
  <form action="image_auth.php" method="post" name="img_form" class="og_label" onsubmit="return validateForm()">
  <h4 style="padding-left: 10px;"><b>IMAGE SELECTION</b></h4>
    <div class=" col-md-2  col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="KTM.jpg" />
 <img type="radio" class="img-thumbnail"  src="assets/files/security_image/KTM.jpg" alt="Lights" >
  </label>
  
    </div>
	    <div class=" col-md-2  col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="BMW.jpg" />
 <img type="radio" class="img-thumbnail"  src="assets/files/security_image/BMW.jpg" alt="Lights" >
  </label>
  
    </div>
	
	
	    <div class=" col-md-2 col-sm-3 col-xs-6" >
      <label>
    <input type="radio" name="user_img" value="iphone.jpg" />
 <img type="radio" class="img-thumbnail"  src="assets/files/security_image/iphone.jpg" alt="Lights" >
  </label>
  
    </div>
	
	 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="usa_airways.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/usa_airways.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="bus.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/bus.jpg" alt="Lights" >
  </label>
    </div>
	 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="ambrosio_cycle.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/ambrosio_cycle.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="bengal_tigers.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/bengal_tigers.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="peacock.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/peacock.jpg" alt="Lights" >
  </label>
    </div>
		<div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="cat.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/cat.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="horse.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/horse.jpg" alt="Lights" >
  </label>
    </div>
	<div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="dog.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/dog.jpg" alt="Lights" >
  </label>
    </div>
		<div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="elephant.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/elephant.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="wrestling.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/wrestling.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="tennis.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/tennis.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="basketball.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/basketball.jpg" alt="Lights" >
  </label>
    </div>
	 <div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="swimming.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/swimming.jpg" alt="Lights" >
  </label>
    </div>
	 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="kabaddi.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/kabaddi.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6 ">
      <label>
    <input type="radio" name="user_img" value="football.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/football.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="cricket.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/cricket.jpg" alt="Lights" >
  </label>
    </div>

	 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="river.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/river.jpg" alt="Lights" >
  </label>
    </div>
		 <div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="tree.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/tree.jpg" alt="Lights" >
  </label>
    </div>
	<div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="taj_mahal.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/taj_mahal.jpg" alt="Lights" >
  </label>
    </div>
	<div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="moon.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/moon.jpg" alt="Lights" >
  </label>
    </div>
		<div class="form-group col-md-2 col-sm-3 col-xs-6">
      <label>
    <input type="radio" name="user_img" value="sun.jpg" />
	<img type="radio" class="img-thumbnail" src="assets/files/security_image/sun.jpg" alt="Lights" >
  </label>
    </div>
  <div class="form-group col-md-12 col-sm-12 col-xs-12">
 <button type="submit" name="submit_img"class="btn btn-primary">Submit</button>
  </div>
  </form>


	  
                <div class="hr hr32 hr-dotted"></div>
                <div class="hr hr32 hr-dotted"></div>
                <!-- PAGE CONTENT ENDS -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.page-content -->
        </div>
      </div>
      <!-- /.main-content -->
<!-- send & receive -->
<?php include ('send_receive.php'); ?>
<!-- /.send & receive -->      
      <?php include ('footer.php'); ?>
      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div>
    <!-- /.main-container -->
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
	
	

 
 <script>
function validateForm() {
    var x = document.forms["img_form"]["user_img"].value;
    if (x == "") {
        alert("select Image");
        return false;
    }
}
</script>
  </body>
</html>