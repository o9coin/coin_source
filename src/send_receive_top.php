<div class="row page-header">
<?php  
$loginid=getSession("loginid");
//start sender amount info
$bal_amc=getAmcBalance($loginid);
//end sender amount info
$amc_val=returnCurrencyFormat($bal_amc);

$result = rateConversionAMCtoUSD($amc_val);
    $usd_val= returnCurrencyFormat($result);
?>
    <div class="col-lg-6 col-xm-12 col-sm-6">
<div><a href="#my-modal2" role="button" class="btn btn-default" data-toggle="modal">
<i class="ace-icon fa fa-send"></i>&nbsp; Send &nbsp;
</a>
<a href="#my-modal1" role="button" class="btn btn-default" data-toggle="modal">
<i class="ace-icon fa fa-repeat"></i>Receive
</a>
    <span class="pull-right"><b></b></span>
</div>
    </div>
    <div class="col-lg-6 col-xm-12 col-sm-6">
	<p style="margin: 0 15px; font-size: 30px;" class="pull-right"><b><span id="bal_amc"><?php echo $amc_val; ?></span>  O9C</b></p>
<!--	<p style="margin: 0 15px; font-size: 30px;" class="pull-right"><b><span id="bal_amc">$<?php //echo $usd_val; ?></span></b></p>-->
    </div>
</div><!-- /.page-header -->