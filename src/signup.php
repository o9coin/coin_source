<?php 
include "auth_site.php";
//echo __SITEPATH1; exit;
$name=$email=$mobile_code=$mobile=$alert="";
$ip="49.206.112.94";
//$ip=get_client_ip();
//echo $ip; 
$addr=getLocationInfoByIp($ip); // country code
//echo $addr['country'];
$country=code_to_country($addr['country']); // country name
//echo $country; 
$mobile_code=countrycode_to_mobile($addr['country']); //mobile code
//echo $mobile_code;    exit;
  if(isset($_POST['register_submit'])){
    if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){ 
    if(isset($_POST['username'])){ $name=$_POST['username']; }
    if(isset($_POST['email'])){ $email=$_POST['email']; }
    if(isset($_POST['country'])){ $country=$_POST['country']; }
    if(isset($_POST['mobile'])){ $mobile=$_POST['mobile']; }
    if(isset($_POST['mobile_code'])){ $mobile_code=$_POST['mobile_code']; }

$check=checkMailId($email,$mobile);
$activation_code=activation_code( $length = 4 );
$link=__SITEPATH.'activation_form.php?activationcode='.encoder($activation_code).'&mail='.encoder($email);

if(mysqli_num_rows($check)==0){
    $walletid = generateWalletId($insert_id,$email);
    
//------------------------------------------------------------------------------

//------------------------------------------------------------------------------    
    $headers="";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@O9Coin.com';
    Mail($email,'O9Coin Registration',$content,$headers,"-f info@O9Coin.com" );
    setSession("wrong_alert", "<span style='color:blue;'>Successfully Registered Activation Mail sent your Email...  </span>");
    echo '<script> location.replace("message_board.php"); </script>';
}else{
    setSession("wrong_alert", "<span style='color:red;'>Already registered Email / Mobile number</span>");
    echo '<script> location.replace("message_board.php"); </script>';
    
}
}else{
    if(isset($_POST['username'])){ $name=$_POST['username']; }
    if(isset($_POST['email'])){ $email=$_POST['email']; }
    if(isset($_POST['country'])){ $country= $_POST['country']; }
    if(isset($_POST['mobile'])){ $mobile=$_POST['mobile']; }
    $alert="<span style='color:red'>The Validation code does not match!</span>";// Captcha verification is incorrect.	
}
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>signup</title>
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->
    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
      <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

        
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
                  <span class="red">Amazee</span>
                  <span class="white" id="id-text2">Coin</span></a>
                </h1>
             
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-edit green"></i>
                        Create your Wallet

                      </h4>
			<p>Sign up for a free wallet below</p>
	    <?php if($alert!=''){ ?>
	    <div>
	    <?php echo $alert; ?>
	    </div>
	    <?php } ?>
                      <div class="space-6"></div>
                      <form name="signupform" action="signup.php" method="post">
                        <fieldset>
                          <label class="block clearfix">
			      <label for='message'>Name :</label>
                          <span class="block input-icon input-icon-right">
                          <input type="text" name="username" class="form-control" value="<?php  echo $name;  ?>" onblur="checkName();"  placeholder="Name" required="" maxlength="30" />
                          <i class="ace-icon fa fa-user"></i>
                          </span>
                          </label>
                          <label class="block clearfix">
			      <label for='message'>Email Id :</label>
                          <span class="block input-icon input-icon-right">
			      <input type="email" value="<?php  echo $email;  ?>" name="email" class="form-control" placeholder="Email" required="" maxlength="60" />
                          <i class="ace-icon fa fa-lock"></i>
                          </span>
                          </label>
						  <label class="block clearfix">
						       <label for='message'>Country :</label>
                          <select class="form-control" onchange="showMobileCode(this.value)"  name="country" required="" id="country">
<?php  
$country_name=getCountry();
while($count_name=  mysqli_fetch_array($country_name)){
?>
		    <option value="<?php  echo $count_name['CountryName'];  ?>" <?php  if($count_name['CountryName'] == $country) echo 'selected';  ?>><?php  echo $count_name['CountryName'];  ?></option>
<?php  
}
?>
                              </select>		      
                          </label>
						   
						   <div class="row">
                                  <div class="col-lg-3">
				      <label for='message'>Mobile :</label>
				      <span id="mobilecode">  
					  <input class="form-control" value="<?php echo $mobile_code;  ?>" name="mobile_code" type="text" required="" maxlength="5" readonly="" id="country_code">
				      </span>
				      
                                  </div>
                                  <div class="col-lg-9">
				      <label for='message'>&nbsp;</label>
                                      <input class="form-control" value="<?php  echo $mobile;  ?>" name="mobile" type="text" maxlength="12" required="" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="Mobile">
                                  </div>
                              </div>
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
			      <div class="group mb-15" style="margin-top: 10px;"><div class="item check"><input name="agreement" type="checkbox" ng-model="fields.acceptedAgreement" required="" class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"> <label class="em-300 mbn mls right-align" translate="ACCEPT_TOS"> &nbsp;I have read and agree to the <a href="#" target="_blank" rel="noopener noreferrer">Terms of Service</a></label></div></div>
								     <div class="space"></div>
									 <div align="center">
                            <button type="submit" class="width-35 btn btn-sm btn-primary"  name="register_submit"  
                           onclick="return checkValidation();" >
                            <span class="bigger-110" translate="CONTINUE" name="submitlogin">Signup</span>
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
                        <a href="login.php" class="user-signup-link">
                       Login
                        <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
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
      </div>
      <!-- /.main-content -->
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
    <!-- inline scripts related to this page -->
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
if(document.signupform.username.value =="")
{
alert("Enter Your Name");
//document.signupform.username.focus();
 return false;;
}
re =/^[A-Za-z ]+$/; 
        if(!re.test(signupform.username.value)) {
          alert("Name Not valid");
          //document.signupform.username.focus();
          return false;
    }
if(document.signupform.email.value =="")
{
alert("Enter Your Mail Id");
//document.signupform.username.focus();
 return false;;
}    
if(document.signupform.mobile.value =="")
{
alert("Enter Your Mobile");
//document.signupform.username.focus();
 return false;;
}  
}

function checkName()
{
if(document.signupform.username.value =="")
{
alert("Enter Your Name");
//document.signupform.username.focus();
 return false;
}
re =/^[A-Za-z ]+$/; 
        if(!re.test(signupform.username.value)) {
          alert("Name Not valid");
          return false;
    }
}

//function valEmail()
//{
//     re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//	if(!re.test(document.signupform.email.value)) {
//	  alert("Email Not Valid");
//	  return false;
//	}
//}

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