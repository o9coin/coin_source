<?php  
include "auth_site.php";
$loginid=getSession("loginid");

    update2StepStatus($loginid);
    echo 1;
?>