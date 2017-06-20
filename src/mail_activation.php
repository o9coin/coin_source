<?php  
include 'auth_log.php';
$user_id='';
if(isset($_GET['id'])){
    $user_id=  decoder($_GET['id']);
}
//echo $user_id; exit;    
updateActivationCodeById($user_id);
if(isset($_POST['submit_unicode'])){
    //echo $email; exit;
    if(isset($_POST['newpsw'])){ $newpsw= $_POST['newpsw']; }
    if(isset($_POST['confirmpsw'])){ $confirmpsw= $_POST['confirmpsw']; }
    $enc_pwd=  md5($newpsw);// exit;
    insertUnicode($user_id,$enc_pwd);
    $email = getFieldVal(TBL__PREFIX1."create_wallet", 'Email', 'Id = '.$user_id);
    $walletid = getFieldVal(TBL__PREFIX1."create_wallet", 'WalletId', 'Id = '.$user_id);
    generateWalletAddress($user_id,$email);
    $link=__SITEPATH1.'login.php?id='.encoder($user_id);
    
    $content='<div style="font-family:Arial,sans-serif;background-color:#f9f9f9;color:#424242;text-align:center">
  <table style="table-layout:fixed;width:90%;width:600px;margin:0 auto;background:#fff;font-size:14px;border:2px solid #e8e8e8;text-align:left;table-layout:fixed;padding-bottom:67px;border-spacing:0">
    <tbody>
      <tr>
        <td style="background-color:#153a62;height:75px;text-align:center;font-size:34px;font-weight:600">
            <span style="color: #fff; font-size: 50px;">O9Coin</span>
<!--            <img src="https://ci5.googleusercontent.com/proxy/eeKV_wRIn_9DTyRAlU6pFs2RWDlc4d2VPUVLRLgU3tHm7RxPLv_D_K0fgxrlGJyDUL9e8-e-wrWV01oj9ph41ldj7JDVE1JEvnE=s0-d-e1-ft#https://PMC Cloud.info/Resources/logo_txt_white.png" alt="" style="width:300px;height:auto" class="CToWUd a6T" tabindex="0">-->
            <div class="a6S" dir="ltr" style="opacity: 0.01; left: 510.5px; top: 4px;"><div id=":183" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Download attachment " data-tooltip-class="a1V" data-tooltip="Download"><div class="aSK J-J5-Ji aYr"></div></div></div>
        </td>
      </tr>
      <tr>
        <td style="padding:50px 30px 0px 30px;text-align:center;color:#000;font-weight:bold;font-size:1.9em">
          Welcome to your O9Coin Wallet!
        </td>
      </tr>
      <tr>
        <td style="padding:20px 30px 40px 30px;line-height:1.8;text-align:center;color:#000;">
            <p>Thank you for creating a O9Coin Wallet. <br> Your Wallet Id is created.</p>
            <p></p>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="table-layout:fixed;width:90%;width:600px;margin:0 auto;background:#fff;font-size:14px;border:2px solid #e8e8e8;text-align:left;table-layout:fixed;border-spacing:0">
    <tbody>
      <tr>
        <td style="padding:30px 30px 10px 30px;line-height:1.8;text-align:center">
          <strong>Your Wallet ID: <a href="'.$link.'" target="_blank" data-saferedirecturl="#">'. $walletid .'</a></strong>
        </td>
      </tr>
      <tr>
        <td style="text-align:center;padding:0px 0px 30px 0px">Use your unique Wallet ID to login to your O9Coin wallet.</td>
      </tr>
    </tbody>
  </table>

  
  <table style="width:90%;width:600px;margin:0 auto;font-size:10px;table-layout:fixed;border-spacing:0">
    <tbody>
      <tr style="text-align:center">
        <td style="padding-top:20px">Copyright @ 2017 O9Coin. All rights reserved.</td>
      </tr>
      
    </tbody>
  </table><div class="yj6qo"></div><div class="adL">
</div></div>';
    
    $headers="";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@O9Coin.com';
    Mail($email,'O9Coin Wallet Generation',$content,$headers,"-f info@O9Coin.com" );
    //setSession("wrong_alert", "Your WalletId is generated and sent your Email, Please check and login");   
    //echo '<script> location.replace("message_board.php"); </script>';
    header("location:".__SITEPATH1."login.php?id=".encoder($user_id));
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login </title>
    <link rel="stylesheet" href="assets/css/style.css" />
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
<style>
.strength_meter{
	height:7px;
	margin-top:6px;
	width:415px;
  div{
    display:flex;
    justify-content:center;
    line-height:35px;
    color:white;
    padding-left:20px;
  }
}

.weakest{
	background-color: #e60000;
	border-color: #F04040;
	color: #fff;    
}
.weak{
	background-color: #FF8000;
	border-color: #FF853C;
	color: #fff;
}
.good{
	background-color: #ffcc00;
	border-color: #ffff00;
	color: #000;
}
.great{
	background-color: #339933;
	border-color: #030;
	color: #fff;
}


</style>
        

  </head>
  
  <body class="login-layout">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1><a href="<?php echo __SITEPATH1; ?>index.html">
                  <img src="assets/images/logo.png" class="">
                </h1>
             
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger center">
                        <i class="ace-icon fa fa-key green"></i>
                        Create Wallet Password 
                      </h4>
                      <div class="space-6"></div>
                      <div class="login-box mhs" ui-view="contents">
	<header>
            <form name="mailcheck" method="post" action="mail_activation.php?id=<?php echo encoder($user_id); ?>">
	    
	    <div class="flex-center flex-justify flex-column" ng-show="state === &#39;success&#39;" style="">
		<div class="level-complete flex-center flex-justify">
		    <i class="ti-check bright-green"></i>
		</div>
		<h4 class="em-300 mtl" translate="SUCCESS">Success!</h4>
		<p class="em-300" translate="EMAIL_VERIFIED_SUCCESS">You have successfully verified your email! </p>
	    </div>
		
            <div class="group mb-15" >
                <div class="item">
                    <label>Password</label>
                    <div>
                        <input class="form-control" id="myPassword"  name="newpsw" onblur="checkPsw();" type="password" maxlength="12" required="" onpaste="return false" oncopy="return false">
                        <span class="help-block">
                            <div class="ng-hide">
                                <p class="ng-hide"></p>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="group mb-15" >
                <div class="item">
                    <label>Confirm Password </label>
                    <div>
<!--                        <input class="form-control" name="confirmpsw" onblur="checkConfirmPsw();"  type="password" required="" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'');">-->
			<input class="form-control" name="confirmpsw" onblur="checkConfirmPsw();"  type="password" required="" maxlength="12" onpaste="return false">
                        <span class="help-block">
                            <div class="ng-hide">
                                <p class="ng-hide"></p>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="group mb-15 full">
                <button class="width-35 btn btn-sm btn-primary" onclick="return checkValidation()" type="submit" name="submit_unicode" >
                            <span class="bigger-110" >Continue</span>
                            </button>
            </div>
          </form>
	</header>
    </div>
                    
                    </div>
                    <!-- /.widget-main -->
                    
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
<script type="text/javascript"> 

function checkPsw()
{
if(document.mailcheck.newpsw.value =="")
{
alert("Enter Your Password");
 return false;;
}

if(document.mailcheck.newpsw.value !="" && document.mailcheck.newpsw.value.length < 8)
{

alert("Password Lenght Must 8 Characters");
//document.mailcheck.newpsw.value ="";
//document.mailcheck.newpsw.focus();
return false;;
}

} 

function checkConfirmPsw()
{
if(document.mailcheck.confirmpsw.value !="")
{
if(document.mailcheck.confirmpsw.value.length < 8)
{
alert("Passwords Not Match");
return false;;
}
 return false;;
}

} 

function checkValidation(){
if(document.mailcheck.newpsw.value =="")
{
alert("Enter Your Password");
 return false;;
}
if(document.mailcheck.confirmpsw.value =="")
{
alert("Enter Your Confirm Password");
 return false;;
}

if(document.mailcheck.newpsw.value == document.mailcheck.confirmpsw.value ==""){
alert("Passwords Not Match");
return false;;
}
}
</script>  
<script>
;(function ( $, window, document, undefined ) {
    var pluginName = "strength",
        defaults = {
            strengthClass: 'strength',
            strengthMeterClass: 'strength_meter'
        };
    function Plugin( element, options ) {
        this.element = element;
        this.$elem = $(this.element);
        this.options = $.extend( {}, defaults, options );
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
    Plugin.prototype = {
        init: function() {
            var characters = 0;
            var capitalletters = 0;
            var loweletters = 0;
            var number = 0;
            var special = 0;
            var upperCase= new RegExp('[A-Z]');
            var lowerCase= new RegExp('[a-z]');
            var numbers = new RegExp('[0-9]');
            var specialchars = new RegExp('([!,%,&,@,#,$,^,*,?,_,~])');
            function GetPercentage(a, b) {
                    return ((b / a) * 100);
                }
                function check_strength(thisval,thisid){
                    if (thisval.length > 2) { characters = 1; } else { characters = -1; };
                  
                    if (thisval.match(upperCase)) { capitalletters = 1} else { capitalletters = 0; };
                    if (thisval.match(lowerCase)) { loweletters = 1}  else { loweletters = 0; };
                    if (thisval.match(numbers)) { number = 1}  else { number = 0; };
                    var total = characters + capitalletters + loweletters + number + special;
                    var totalpercent = GetPercentage(7, total).toFixed(0);
                    if (!thisval.length) {total = -1;}
                    get_total(total,thisid);
                }
            function get_total(total,thisid){
                var thismeter = $('div[data-meter="'+thisid+'"]');
                    if (total <= 1) {
                   thismeter.removeClass();
                   thismeter.addClass('weakest').html('Password Strength: Very Weak');
                } else if (total == 2){
                    thismeter.removeClass();
                   thismeter.addClass('weak').html('Password Strength: Weak');
                } else if(total == 3){
                    thismeter.removeClass();
                   thismeter.addClass('good').html('Password Strength: Good');

                } else {
                     thismeter.removeClass();
                   thismeter.addClass('great').html('Password Strength: Great');
                }
                
                if (total == -1) { thismeter.removeClass().html('Password Strength:'); }
            }
            thisid = this.$elem.attr('id');
            this.$elem.addClass(this.options.strengthClass).attr('data-password',thisid).after('<input style="display:none" class="'+this.options.strengthClass+'" data-password="'+thisid+'" type="text" name="" value=""><a data-password-button="'+thisid+'" href="" class="'+this.options.strengthButtonClass+'">'+'</a><div class="'+this.options.strengthMeterClass+'"><div data-meter="'+thisid+'"></div></div>');

            this.$elem.bind('keyup keydown', function(event) {
                thisval = $('#'+thisid).val();
                $('input[type="text"][data-password="'+thisid+'"]').val(thisval);
                check_strength(thisval,thisid);

            });
             $('input[type="text"][data-password="'+thisid+'"]').bind('keyup keydown', function(event) {
                thisval = $('input[type="text"][data-password="'+thisid+'"]').val();
                console.log(thisval);
                $('input[type="password"][data-password="'+thisid+'"]').val(thisval);
                check_strength(thisval,thisid);
            });
            
        }
    };
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );
$(document).ready(function($) {
  $('#myPassword').strength({
    strengthClass: 'strength',
    strengthMeterClass: 'strength_meter'
  });
  $('#confirm-password').strength({
    strengthClass: 'strength',
    strengthMeterClass: 'strength_meter'
  });
});
//variant of Strength.js

</script>	
	
	
 </body>
</html>






