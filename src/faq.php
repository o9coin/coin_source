<?php  
include "auth.php";
$loginid=getSession("loginid");

$success = getSession("success_alert");

    if ($success != '')
    {
            unsetSession("success_alert");
    }
	
if (isset($_POST['user_submit']))
    {
            if (isset($_POST['user_question']))
            {
                    if (trim($_POST['user_question']) != '')
                    {
                            $user_question = $_POST['user_question'];
                    }
            }

       insert_question($user_question);
            
           setSession('success_alert', "Successfully");
               header('location:faq.php' );
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title> FAQ </title>

		<meta name="description" content="frequently asked questions using tabs and accordions" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
<?php include('topmenu.php'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

<?php include('leftmenu.php'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">Home</a>
							</li>

							<li>
							    <a href="faq.php">FAQ</a>
							</li>
						</ul><!-- /.breadcrumb -->

<?php include "top_search1.php";  ?>
<!-- /.nav-search -->
					</div>

					<div class="page-content">
<?php include 'settings_container.php'; ?>  					    
<!-- /.ace-settings-container -->
<!-- page-header -->
<?php  

include "send_receive_top.php";
?>
<!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
<div class="tabbable">
									

<div class="tab-content no-border padding-24">
        <div id="faq-tab-1" class="tab-pane fade in active">
            <div class="row">
            <div class="col-lg-10 col-sm-9 col-md-12">
                <h4 class="blue">
		<i class="ace-icon fa fa-check bigger-110"></i>
		General Questions
                </h4>
            </div>
            <div class="col-lg-2 col-sm-3 col-md-12">
		<button onclick="myFunction()" class="label label-primary" style="border: none;">ASK Question</button>

            </div>
            </div>
<?php

if ($success != '')
{
?>
<div class="alert alert-success fade in">
<button data-dismiss="alert" class="close close-sm" type="button"><i class="icon-remove"></i></button>
<?php
echo $success; ?>
</div>  
<?php
} ?>

	
 <form id="myDIV" action="faq.php" method="post" style="display:none;">
    

      <label for="user_question">Enter Your Quastion:</label>


	
 
	<div class="form-group">
    <textarea class="form-control" id="user_question" name="user_question" style="padding-left:0px!important;"  name="" placeholder="" required="required" ></textarea>
</div>
  


  
    <button type="submit" name="user_submit"class="btn btn-primary">Submit</button>
  </form>
<div class="space-8"></div>

<div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">

        <div class="panel panel-default">
<?php  
$faq=displayFaq();
while($quetion =  mysqli_fetch_array($faq)){
?>
            
            
<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#faq-list-1-sub-<?php echo $quetion['Id'];?>" data-parent="#faq-list-nested-1" data-toggle="collapse" class="accordion-toggle collapsed">
        <i class="ace-icon fa fa-plus smaller-80 middle" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>
        &nbsp;<?php echo $quetion['Question'];?>
        </a>
    </div>
    <div class="panel-collapse collapse" id="faq-list-1-sub-<?php echo $quetion['Id'];?>">
            <div class="panel-body">
    <?php echo $quetion['Answer'];?>
            </div>
    </div>
</div>

        

		





<?php  
}
?>						
     
</div>



										

									

							
											</div>
										</div>


										
	
										
										
										
										
										
										
										

										<div id="faq-tab-4" class="tab-pane fade">
											<h4 class="blue">
												<i class="purple ace-icon fa fa-magic bigger-110"></i>
												Miscellaneous Questions
											</h4>

											<div class="space-8"></div>

											<div id="faq-list-4" class="panel-group accordion-style1 accordion-style2">
												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-1" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-hand-o-right" data-icon-hide="ace-icon fa fa-hand-o-down" data-icon-show="ace-icon fa fa-hand-o-right"></i>&nbsp;
						Enim eiusmod high life accusamus terry richardson?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-1">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-2" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-frown-o bigger-120" data-icon-hide="ace-icon fa fa-smile-o" data-icon-show="ace-icon fa fa-frown-o"></i>&nbsp;
					  Single-origin coffee nulla assumenda shoreditch et?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-2">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-3" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Sunt aliqua put a bird on it squid?
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-3">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>

												<div class="panel panel-default">
													<div class="panel-heading">
														<a href="#faq-4-4" data-parent="#faq-list-4" data-toggle="collapse" class="accordion-toggle collapsed">
															<i class="ace-icon fa fa-plus smaller-80" data-icon-hide="ace-icon fa fa-minus" data-icon-show="ace-icon fa fa-plus"></i>&nbsp;
					  Br
														</a>
													</div>

													<div class="panel-collapse collapse" id="faq-4-4">
														<div class="panel-body">
															Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
														</div>
													</div>
												</div>
												
												
												
									
						
											</div>
										</div>
									</div>
								
			 


								
								
								
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
<!-- send & receive -->
<?php include ('send_receive.php'); ?>
<!-- /.send & receive -->			

<?php include ('footer.php'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	

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
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>
<!-- ask question function-->
		<script>
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}
</script>
		<!-- inline scripts related to this page -->
	</body>
</html>

