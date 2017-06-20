<?php  
include "auth_site.php";
$loginid=getSession("loginid");
if(isset($_REQUEST['mail'])){ $mail=$_REQUEST['mail']; }
$mail_otp=activation_code( $length = 6 );
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
          Welcome to your O9Coin!
        </td>
      </tr>
      <tr>
        <td style="padding:20px 30px 40px 30px;line-height:1.8;text-align:center;color:#000;">
            <p>Your Account Mail Verification <br>Your E-Mail OTP is : <strong>'.$mail_otp.'</strong>.</p>
            <p></p>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
   
  <table style="width:90%;width:600px;margin:0 auto;font-size:10px;table-layout:fixed;border-spacing:0">
    <tbody>
      <tr style="text-align:center">
        <td style="padding-top:20px">Copyright @ 2017 O9Coin. All rights reserved.</td>
      </tr>
      
    </tbody>
  </table><div class="yj6qo"></div><div class="adL">
</div></div>';
//------------------------------------------------------------------------------
    updateMailOtpById($mail_otp,$loginid);
    $headers="";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: info@O9Coin.com';
    Mail($mail,'O9Coin',$content,$headers,"-f info@O9Coin.com" );
    sleep(2);
?>

<h5 class="pull-right"><b><?php echo $mail; ?></b></h5>
<p class="pull-right"><button type="button" onclick="verifyEmailOTP()" class="btn btn-primary">Verify</button></p>


