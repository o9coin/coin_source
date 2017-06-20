<?php  
include "model.php";

$tot_send=totalSendAmc();
$send=  mysqli_fetch_assoc($tot_send);

$tot_receive=totalReceiveAmc();
$receive=  mysqli_fetch_assoc($tot_receive);
if($send['amcvalue']<$receive['amcvalue']){
    header("location:".__SITEPATH1."page_404.php");    
}


?>
