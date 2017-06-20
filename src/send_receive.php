<?php  
    $loginid=getSession("loginid");
    $wallet_addr=getFieldVal(TBL__PREFIX1."create_wallet", "WalletAddress", "Id=".$loginid);
    //echo $wallet_addr; exit;
?>
<!--send transaction code-->
<div id="my-modal2" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
		    <div class="modal-content" id='changeview'>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="smaller lighter blue no-margin"> </h3>
					<p>Instantly Send O9Coin to any O9Coin Address.</p>

			
				</div>

<div class="modal-body">
<div class="row ">
    <form class="inline" name="sendfrm">
    <div class="form-group col-md-12 col-sm-12">
      <label class="col-md-1 co-sm-1 col-xs-12" for="usr">To</label>
      <input class="col-md-11 col-sm-11 col-xs-12"  type="text" onblur="checkToWalletAddress();" name="toaddress" id="toaddress" placeholder="To" maxlength="40" >
      <p id="checkaddr" style="padding-left: 46px;"></p>
    </div>
    <div class="form-group col-md-6 col-sm-6 col-xs-12">
      <label class="col-md-2 col-xs-12" for="pwd">O9C</label>
      <input class="col-md-10 col-xs-12" type="text" onkeyup="rateConverterUSDtoAMC()" name="amcval" onblur="checkAmcBalance();" id="amcval" placeholder="O9C" maxlength="15">
      <p id="checkbal" style="padding-left: 46px;"></p>
    </div>

	<div class="form-group col-md-6 col-sm-6 col-xs-12">

      <label class="col-md-2 col-xs-12" for="usr">USD</label>
      <input class="col-md-10 col-xs-12" type="text" onkeyup="rateConverterAMCtoUSD()"   name="usdval" id="usdval" placeholder="USD" maxlength="15">
    </div>
    <div class="form-group col-md-12 col-xs-12">
      <label class="col-md-2 col-xs-12 " style="display: inline-block;" for="pwd">Description</label>
      <textarea class="col-md-10 col-xs-12" name="description" id="description" placeholder="description" maxlength="200"></textarea>
    </div>
    </form>			
  </div>			
</div>

<div class="modal-footer">
<!--    <button class="btn btn-sm btn-primary pull-left" data-dismiss="modal">
	    Advanced send
    </button>-->
<?php  
$verificat=getUserVerification($loginid);
$veri=  mysqli_fetch_assoc($verificat);
if($veri['MailVerify']==1){
?>
    <button class="btn btn-sm btn-danger" data-dismiss="modal">
	    Close
    </button>
    <button class="btn btn-sm btn-primary " onclick="sendCoin();"  type="button">	
	Submit
    </button>
<?php  
}else{
?>
<div class="alert alert-info">
    If you want to send coin, Please verify your E-code verification.
</div>
<?php  
}
?>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!--send transaction code-->

<!--receive transaction code-->

<div id="my-modal1" class="modal fade" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 class="smaller lighter blue no-margin">Receive</h3>
	</div>

	<div class="modal-body">
	<div class="row">
		<p align="center">  <input id="text" type="text" value="<?php echo $wallet_addr; ?>" style="display:none;"/></p>
	<p align="center"><?php echo $wallet_addr; ?></p>

	<p align="center" id="qrcode"></p>

	
	</div>	
	
	</div>

	<div class="modal-footer">
		<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
			<i class="ace-icon fa fa-times"></i>
			Close
		</button>
	</div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!--receive transaction code-->

<script src="assets/qrcode/jquery.min.js" type="text/javascript"></script>
<script src="assets/qrcode/qrcode.min.js" type="text/javascript"></script>
<script>
var qrcode = new QRCode("qrcode");

$("#text").on("keyup", function () {
    qrcode.makeCode($(this).val());
}).keyup().focus();
</script>

<script>
function sendCoin(){
if(document.sendfrm.toaddress.value =="")
{
alert("Enter To Wallet Address");
 return false;
} 
if(document.sendfrm.amcval.value =="")
{
alert("Enter O9C Value");
 return false;
} 
if(document.sendfrm.usdval.value =="")
{
alert("Enter USD Value");
 return false;
} 
    var toaddr = document.getElementById("toaddress").value;
    var amc = document.getElementById("amcval").value;
    var usd = document.getElementById("usdval").value;
    var description = document.getElementById("description").value;
    var params="to="+toaddr+"&amc="+amc+"&usd="+usd+"&description="+description;
    //alert(params); exit;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("changeview").innerHTML = this.responseText;
	var balamc = document.getElementById("ajaxamc").value;
	document.getElementById("bal_amc").innerHTML = balamc;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_coin_ajax.php?"+params, true);
xmlhttp.send();
}

function checkToWalletAddress(){
    var toaddr = document.getElementById("toaddress").value;
    var params="to="+toaddr;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("checkaddr").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_addresscheck_ajax.php?"+params, true);
xmlhttp.send();
}

function checkAmcBalance(){
    var amc = document.getElementById("amcval").value;
    var params="amc="+amc;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        document.getElementById("checkbal").innerHTML = this.responseText;
    }else{
        //alert('Product added to cart');
    }
}; 
xmlhttp.open("GET", "send_balance_ajax.php?"+params, true);
xmlhttp.send();
}


function rateConverterAMCtoUSD(){
    var rate = document.getElementById("usdval").value;
    var params="usd="+rate;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
       //alert(this.responseText);
        document.getElementById("amcval").value = this.responseText;
    }
}; 
xmlhttp.open("GET", "rate_converter.php?"+params, true);
xmlhttp.send();
}

function rateConverterUSDtoAMC(){
    var rate = document.getElementById("amcval").value;
    var params="amc="+rate;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if(this.readyState == 4 && this.status == 200) {
        //alert(this.responseText);       
        document.getElementById("usdval").value = this.responseText;
    }
}; 
xmlhttp.open("GET", "rate_converter.php?"+params, true);
xmlhttp.send();
}
</script>
<script>
    
function doNumericsend()
{
    if(isNaN(document.sendfrm.amcval.value))
     {
     alert("Enter Numberic Value Only")
     document.sendfrm.amcval.value = ""
     document.sendfrm.amcval.focus();
     }
     
     if(isNaN(document.sendfrm.usdval.value))
     {
     alert("Enter Numberic Value Only")
     document.sendfrm.usdval.value = ""
     document.sendfrm.usdval.focus();
     }

}    
    </script>