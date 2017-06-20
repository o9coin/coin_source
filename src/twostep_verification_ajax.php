<?php  
include "auth_site.php";
$loginid=getSession("loginid");
if(isset($_REQUEST['veri'])){ $verify=$_REQUEST['veri']; }

    change2StepStatus($verify,$loginid);
    echo 1;
?>