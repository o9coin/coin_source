<?php 
include 'auth_log.php';
$userid=$alert=$walletid= '';
if(isset($_REQUEST['id'])){
    $id =  decoder($_REQUEST['id']);
    setSession('consumerid', $id);
    //echo $id; exit;
}
$log1 = getSession('consumerid');
//echo $log1; exit;
$log2 = getSession('loginid');
//echo $log2; exit;
if($log2!='') $userid = getSession('loginid');
elseif ($log1!='') $userid = getSession('consumerid');
else $userid='';
if($userid != ''){
    //echo $userid; exit;
    
    //echo $walletid; exit;
}

if(isset($_POST['submitlogin'])){
    if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){ 
    if(isset($_POST['walletinput'])){ $walletid=mysqli_real_escape_string($con, $_POST['walletinput']); }
    if(isset($_POST['passinput'])){ $password=mysqli_real_escape_string($con, $_POST['passinput']); }
    $result = checkLogin($walletid,$password);
    
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------
    setTwoStepMailOtp($mail_otp,$user['Id']);
    $headers="";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@O9Coin.com';
    Mail($email,'O9Coin',$content,$headers,"-f info@O9Coin.com" );
    setSession("wrong_alert", "<span style='color:blue;'>OTP Sent your Email, Verify and Login...</span>");
    echo '<script> location.replace("message_board.php"); </script>';    
	//header("location:".__SITEPATH."message_board.php");  
	}else{
	    // mobile otp
	    
	    $mobile_otp=  randomNum( $length = 6 );
	    setTwoStepMobileOtp($mobile_otp,$user['Id']);
	    setSession("wrong_alert", "<span style='color:blue;'>OTP Sent your Mobile Number, Submit and Login...  </span>");
	    echo '<script> location.replace("login_twostep2.php"); </script>'; 
	}
    }else $alert="<span style='color:red'>Your Wallet Id or Password is Not valid</span>";
    
    else $alert="<span style='color:red'>Your Captcha code is not valid</span>";
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>login</title>

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
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>                
	</head>

	<body class="login-layout">

			<div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
		  <h1><a href="<?php echo __SITEPATH1; ?>index.php">
                  <i class="ace-icon fa fa-leaf green"></i>
                </h1>
             
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-lock green"></i>
                        Please Enter Your Information
                      </h4>
                      <div class="space-6"></div>
<?php if($alert!=''){ ?>
<div>
<?php echo $alert; ?>
</div>
<?php } ?>
                      <form name="loginform" action="login.php" method="post">
                        <fieldset>
                          <label class="block clearfix">
			      <label for='message'>Wallet Id :</label>
                          <span class="block input-icon input-icon-right">
			      <input type="text" class="form-control" value="<?php echo $walletid; ?>" name="walletinput" required="" maxlength="36" placeholder="Wallet Id">
                          <i class="ace-icon fa fa-user"></i>
                          </span>
                          </label>
                          <label class="block clearfix">
			      <label for='message'>Password :</label>
                          <span class="block input-icon input-icon-right">
                          <input class="form-control"  id="pass_input" type="password" name="passinput"  required="" maxlength="10"  placeholder="*****">
                          <i class="ace-icon fa fa-lock"></i>
                          </span>
                          </label>
                          <div class="space"></div>
                          <div class="clearfix">
                            <div>
				<img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
				  <label for='message'>Enter the code above here :</label>
				  <br>
				  <input class="form-control" id="captcha_code" name="captcha_code" type="text" required="" maxlength="10">
				  <br>
				  Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
			    </div>
								     <div class="space"></div>
									 <div align="center">
                            <button type="submit" class="width-35 btn btn-sm btn-primary" onclick="return checkValidation()" name="submitlogin" >
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110" >Login</span>
                            </button>
							</div>
                          </div>
                          <div class="space-4"></div>
                        </fieldset>
                      </form>
                    
                    </div>
                    <!-- /.widget-main -->
                    <div class="toolbar clearfix">                   
                      <div>
			  <a href="signup.php" class="user-signup-link">
                            I want to Register
                             <i class="ace-icon fa fa-arrow-right"></i>
                          </a>
                      </div>
                    </div>
                    </div>
                  </div>
                  <!-- /.widget-body -->
                </div>
                <!-- /.login-box -->
                
              </div>
              <!-- /.position-relative -->
              
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.main-content -->


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
<script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
      	e.preventDefault();
      	var target = $(this).data('target');
      	$('.widget-box.visible').removeClass('visible');//hide others
      	$(target).addClass('visible');//show target
       });
      });
      
      
      
      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
      	$('body').attr('class', 'login-layout');
      	$('#id-text2').attr('class', 'white');
      	$('#id-company-text').attr('class', 'blue');
      	
      	e.preventDefault();
       });
       $('#btn-login-light').on('click', function(e) {
      	$('body').attr('class', 'login-layout light-login');
      	$('#id-text2').attr('class', 'grey');
      	$('#id-company-text').attr('class', 'blue');
      	
      	e.preventDefault();
       });
       $('#btn-login-blur').on('click', function(e) {
      	$('body').attr('class', 'login-layout blur-login');
      	$('#id-text2').attr('class', 'white');
      	$('#id-company-text').attr('class', 'light-blue');
      	
      	e.preventDefault();
       });
       
      });
    </script>
    
    <script> 
function checkValidation()
{
if(document.loginForm.walletinput.value =="")
{
alert("Enter wallet id");
//document.signupForm.username.focus();
 return false;;
}
if(document.loginForm.passinput.value =="")
{
alert("Enter Password");
//document.signupForm.username.focus();
 return false;;
}

if(document.loginForm.captcha_code.value =="")
{
alert("Enter Captcha code");
//document.signupForm.username.focus();
 return false;;
}
}
</script>

		<!-- inline scripts related to this page -->
	</body>
</html>

