<?php 
  include "auth_site.php";
  
  
  
  
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>FAQ - Support</title>
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
		  <a href="faq_question.php">FAQ Question</a>
              </li>
            </ul>
            <!-- /.breadcrumb -->
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
<!-- /.page-header -->
            <!-- /.page-header -->
            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <div class="tabbable">
                  <div class="tab-content no-border padding-24">
                    <div id="faq-tab-1" class="tab-pane fade in active">
                      <h4 class="blue">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Questions List
                      </h4>
                      <div class="space-8"></div>
                      <div id="faq-list-1" class="panel-group accordion-style1 accordion-style2">
                        <div class="panel panel-default table-responsive">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Edit</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php  
                                $i=1;
                                $faq=getFaq();
                                while($quetion =  mysqli_fetch_array($faq)){
                                ?>
                              <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $quetion['Question'];?></td>
                                <td>
                                  <?php echo $quetion['Answer'];?>
                                </td>
                                <td>
                                  <a href="faq_questionedit.php?id=<?php echo encoder($quetion['Id']); ?>" title="Edit" class="fa fa-pencil-square-o" ></a>
                                </td>
                                <td>
                                  <?php 
                                    $flaq_number =$quetion['Flag'];
                                    if($flaq_number==0)
                                    {
                                    ?>
                                  <span class="label label-sm label-inverse arrowed-in" id="chngstatus<?php echo $quetion['Id']; ?>"  >New</span>
                                  <?php 		
                                    }
                                    
                                    elseif($flaq_number==1)
                                    {
                                    ?>
                                  <span class="label label-sm label-inverse arrowed-in" id="chngstatus<?php echo $quetion['Id']; ?>"  >Live</span>
                                  <?php }
                                    elseif($flaq_number==2)
                                    {
                                    
                                    ?>
                                  <span class="label label-sm label-inverse arrowed-in" id="chngstatus<?php echo $quetion['Id']; ?>"  >Block</span>
                                  <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                  <?php 
                                    $flaq_number =$quetion['Flag'];
                                    if($flaq_number==0)
                                    {
                                    	?>
                                  <span id="chngbtn<?php echo $quetion['Id']; ?>"  ><label title="Publish" class="label label-success" onclick="showSubcat(<?php echo $quetion['Id']; ?>)"  >Publish</label></span>
                                  <?php 		
                                    }
                                    
                                    elseif($flaq_number==1)
                                    {
                                    ?>
                                  <span id="chngbtn<?php echo $quetion['Id']; ?>"  ><label title="block" class="label label-danger" onclick="blackajax(<?php echo $quetion['Id']; ?>)"  >Block</label></span>
                                  <?php }
                                    elseif($flaq_number==2)
                                    {
                                    	
                                    	?>
                                  <span id="chngbtn<?php echo $quetion['Id']; ?>"  ><label class="label label-warning" onclick="unblackajax(<?php echo $quetion['Id']; ?>)"  >Unblack</label></span>
                                  <?php
                                    }
                                    ?>
                                </td>
                              </tr>
                              <?php  
                                $i++;
                                }
                                ?>	
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- PAGE CONTENT ENDS -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.page-content -->
        </div>
      </div>
      <!-- /.main-content -->
<!-- send & receive -->
<?php include ('send_receive.php'); ?>
<!-- /.send & receive -->         
<?php include('footer.php'); ?>
      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
      <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div>
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
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/buttons.colVis.min.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
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
    <script>
      /*publish ajax*/
         function showSubcat(questionid){
      	var xmlhttp=new XMLHttpRequest();	
      	xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("chngbtn"+questionid).innerHTML = this.responseText;
                  }
      	    
              };
      	xmlhttp.open("GET", "publish_ajax.php?id="+questionid, true);
      	xmlhttp.send();
      	
          }
    </script>
    <script>
      /*black ajax*/
         function blackajax(questionid){
      	var xmlhttp=new XMLHttpRequest();	
      	xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("chngbtn"+questionid).innerHTML = this.responseText;
                      document.getElementById("chngstatus"+questionid).innerHTML = 'Block';
                  }
      	    
              };
      	xmlhttp.open("GET", "publish_blackajax.php?id="+questionid, true);
      	xmlhttp.send();
      	
          }
    </script>
    <script>
      /*unblack ajax*/
         function unblackajax(questionid){
      	var xmlhttp=new XMLHttpRequest();	
      	xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("chngbtn"+questionid).innerHTML = this.responseText;
                      document.getElementById("chngstatus"+questionid).innerHTML = 'Live';
                  }
      	    
              };
      	xmlhttp.open("GET", "publish_unblackjax.php?id="+questionid, true);
      	xmlhttp.send();
      	
          }
    </script>
    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
      	//initiate dataTables plugin
      	var myTable = 
      	$('#dynamic-table')
      	//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
      	.DataTable( {
      		bAutoWidth: false,
      		"aoColumns": [
      		  { "bSortable": false },
      		  null, null,null, null, null,
      		  { "bSortable": false }
      		],
      		"aaSorting": [],
      		
      		
      		//"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php"	,
      
      		//,
      		//"sScrollY": "200px",
      		//"bPaginate": false,
      
      		//"sScrollX": "100%",
      		//"sScrollXInner": "120%",
      		//"bScrollCollapse": true,
      		//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
      		//you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
      		//"iDisplayLength": 50
      
      
      		select: {
      			style: 'multi'
      		}
          } );
      
      	
      	
      	$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
      	
      	new $.fn.dataTable.Buttons( myTable, {
      		buttons: [
      		  {
      			"extend": "colvis",
      			"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
      			"className": "btn btn-white btn-primary btn-bold",
      			columns: ':not(:first):not(:last)'
      		  },
      		  {
      			"extend": "copy",
      			"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
      			"className": "btn btn-white btn-primary btn-bold"
      		  },
      		  {
      			"extend": "csv",
      			"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
      			"className": "btn btn-white btn-primary btn-bold"
      		  },
      		  {
      			"extend": "excel",
      			"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
      			"className": "btn btn-white btn-primary btn-bold"
      		  },
      		  {
      			"extend": "pdf",
      			"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
      			"className": "btn btn-white btn-primary btn-bold"
      		  },
      		  {
      			"extend": "print",
      			"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
      			"className": "btn btn-white btn-primary btn-bold",
      			autoPrint: false,
      			message: 'This print was produced using the Print button for DataTables'
      		  }		  
      		]
      	} );
      	myTable.buttons().container().appendTo( $('.tableTools-container') );
      	
      	//style the message box
      	var defaultCopyAction = myTable.button(1).action();
      	myTable.button(1).action(function (e, dt, button, config) {
      		defaultCopyAction(e, dt, button, config);
      		$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
      	});
      	
      	
      	var defaultColvisAction = myTable.button(0).action();
      	myTable.button(0).action(function (e, dt, button, config) {
      		
      		defaultColvisAction(e, dt, button, config);
      		
      		
      		if($('.dt-button-collection > .dropdown-menu').length == 0) {
      			$('.dt-button-collection')
      			.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
      			.find('a').attr('href', '#').wrap("<li />")
      		}
      		$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
      	});
      
      	////
      
      	setTimeout(function() {
      		$($('.tableTools-container')).find('a.dt-button').each(function() {
      			var div = $(this).find(' > div').first();
      			if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
      			else $(this).tooltip({container: 'body', title: $(this).text()});
      		});
      	}, 500);
      	
      	
      	
      	
      	
      	myTable.on( 'select', function ( e, dt, type, index ) {
      		if ( type === 'row' ) {
      			$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
      		}
      	} );
      	myTable.on( 'deselect', function ( e, dt, type, index ) {
      		if ( type === 'row' ) {
      			$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
      		}
      	} );
      
      
      
      
      	/////////////////////////////////
      	//table checkboxes
      	$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
      	
      	//select/deselect all rows according to table header checkbox
      	$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
      		var th_checked = this.checked;//checkbox inside "TH" table header
      		
      		$('#dynamic-table').find('tbody > tr').each(function(){
      			var row = this;
      			if(th_checked) myTable.row(row).select();
      			else  myTable.row(row).deselect();
      		});
      	});
      	
      	//select/deselect a row when the checkbox is checked/unchecked
      	$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
      		var row = $(this).closest('tr').get(0);
      		if(this.checked) myTable.row(row).deselect();
      		else myTable.row(row).select();
      	});
      
      
      
      	$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
      		e.stopImmediatePropagation();
      		e.stopPropagation();
      		e.preventDefault();
      	});
      	
      	
      	
      	//And for the first simple table, which doesn't have TableTools or dataTables
      	//select/deselect all rows according to table header checkbox
      	var active_class = 'active';
      	$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
      		var th_checked = this.checked;//checkbox inside "TH" table header
      		
      		$(this).closest('table').find('tbody > tr').each(function(){
      			var row = this;
      			if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
      			else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
      		});
      	});
      	
      	//select/deselect a row when the checkbox is checked/unchecked
      	$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
      		var $row = $(this).closest('tr');
      		if($row.is('.detail-row ')) return;
      		if(this.checked) $row.addClass(active_class);
      		else $row.removeClass(active_class);
      	});
      
      	
      
      	/********************************/
      	//add tooltip for small view action buttons in dropdown menu
      	$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
      	
      	//tooltip placement on right or left
      	function tooltip_placement(context, source) {
      		var $source = $(source);
      		var $parent = $source.closest('table')
      		var off1 = $parent.offset();
      		var w1 = $parent.width();
      
      		var off2 = $source.offset();
      		//var w2 = $source.width();
      
      		if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
      		return 'left';
      	}
      	
      	
      	
      	
      	/***************/
      	$('.show-details-btn').on('click', function(e) {
      		e.preventDefault();
      		$(this).closest('tr').next().toggleClass('open');
      		$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
      	});
      	/***************/
      	
      	
      	
      	
      	
      	/**
      	//add horizontal scrollbars to a simple table
      	$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
      	  {
      		horizontal: true,
      		styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
      		size: 2000,
      		mouseWheelLock: true
      	  }
      	).css('padding-top', '12px');
      	*/
      
      
      })
    </script>                
  </body>
</html>