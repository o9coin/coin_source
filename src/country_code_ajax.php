<?php  
include "model.php";
if(isset($_REQUEST['country'])){ $country=$_REQUEST['country']; }
$country_code=countryname_to_code($country);
$mobile_code=countrycode_to_mobile($country_code);
?>
<input class="form-control" value="<?php echo $mobile_code;  ?>" name="country_code" type="text" required="" readonly="" id="country_code">


