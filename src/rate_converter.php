<?php
include('auth_site.php');
$amc=$usd='';
if(isset($_GET['amc'])) $amc= $_GET['amc'];
if(isset($_GET['usd'])) $usd= $_GET['usd'];


if($amc!=''){
    $result = rateConversionAMCtoUSD($amc);
    echo returnCurrencyFormat($result);
}
if($usd!=''){
    $result = rateConversionUSDtoAMC($usd);
    echo returnCurrencyFormat($result);
}

?>
