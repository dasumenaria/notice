<?php
@session_start();
require_once("database.php");
require_once("auth.php");
include("functions.php");

if(isset($_SESSION["id"])) {
	if(isLoginSessionExpired()) {
		header("Location:logout.php?session_expired=1");
	}
}

 //$session_name=$_SESSION['name'];
?>

<?php function css() { ?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>


<meta charset="utf-8"/>
 
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
 

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/Lato2OFLWeb/Lato2OFLWeb/Lato/latofonts.css" rel="stylesheet" type="text/css"/> 
<link href="assets/global/css/fonts/font.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>

<link href="<?php echo $url;?>" rel="stylesheet" type="text/css"id="theme_css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/jquery-multi-select/css/multi-select.css"/>
<link rel="stylesheet" href="assets/global/css/demo-styles.css" />






<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag-->
<link rel="stylesheet" type="text/css"href="assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
<link href="assets/global/css/components.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>

<!-- END THEME STYLES -->
<link rel="shortcut icon" href=""/>
<!-- END THEME STYLES -->
</head>


<style>
body{
font-family: 'LatoWeb', sans-serif;
font-size:14px;
}
.capitalize {
    text-transform: capitalize;
}
.content
{
	margin-top: 20px;
}
@media print
{
	.box
	{
		border-top:none;
	}
	.box-body{
		padding: 0px !important;
	}
	.container 
	{
		padding-right:  0px !important;
		padding-left:  0px !important;
		margin-right: 0px !important;
		margin-left: 0px !important;
		width:100%;
	}
	.contain
	{
		padding-right:  0px !important;
		padding-left:  0px !important;
		margin-right: 0px !important;
		margin-left: 0px !important;
		margin-top: 0px !important;
	}
}
.align_center{
	text-align:center;
}
.align_right{
	text-align:right;
	padding-right:5px;
}
.box.box-primary {
    border-top-color: #187D79;
}
.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #FFF;
}
</style>
<!-- Disable Right Click   
 oncontextmenu="return false"
--->
<?php } ?>
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square"> 
<?php 
function contant_start()
{
 ?>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<div class="page-logo">
			<a href="index1.php"> </a>
		</div>
		<!-- END RESPONSIVE MENU TOGGLER -->
	<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		
		<!-- BEGIN PAGE TOP -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">




			<!------Start Notification code------------>
			<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<span class="badge badge-default" style="background-color:red;" id="count">
					</span>
					</a>-->
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold" id="total_notification" style="color:#FFF"></span></h3>
							<!--<a href="extra_profile.html">view all</a>-->
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283" id="notifications">
								

							</ul>
						</li>
					</ul>
				</li>
			
			
			
			<!---------End Notification code--------->
			<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username"><strong>Welcome
                   </strong><?php //echo $login_details['0']['login']['name']; ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
<li>
							<a class="tooltips" href="update_profile.php" data-placement="bottom" data-original-title="Update Your Profile">
							<i class="icon-user"></i> My Profile </a>
						</li>
						<li>
                            <a href="logout.php" tite="Logout"><i class="icon-key"></i>  &nbsp;Logout</i></a>
						</li>
					</ul>
				</li>
            </ul>
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>

<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->



<div class="" >
	<div class="page-container">
	<?php } ?>
	
<?php 
function menu() {
?>

		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<div class="page-sidebar navbar-collapse collapse">
				<!-- BEGIN SIDEBAR MENU -->
				<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
				<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
				<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
				<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
             
			  
               	<?php  $page_name_from_url=basename($_SERVER['PHP_SELF']);
							@$fac_id=$_SESSION['id'];
						      $role_id=$_SESSION['category'];
							 $selecto7=mysql_query("select * from `user_management` where `role_id`='$role_id'");
			        while($reco7=mysql_fetch_array($selecto7))
			       {
					   $mng_mdul_id[]=$reco7['module_id'];
				   }
				    
				 $sel_module2=mysql_query("select `main_menu` from `modules` where `page_name_url`='".$page_name_from_url."'");
				$arr_module2=mysql_fetch_array($sel_module2);
				 $main_menu_active=$arr_module2['main_menu'];			
				
					$selecto3=mysql_query("select * FROM `modules` ORDER BY id");
                      while($data=mysql_fetch_array($selecto3))
					  {
                      $main_menu_arr[]='';
                     if(in_array($data['id'],$mng_mdul_id))
					 {
                        if(empty($data['main_menu']) && empty($data['sub_menu']))
                        {
							
                            ?>
                            <li class="<?php if($page_name_from_url==$data['page_name_url']){ echo 'active'; } ?>">
  <a href="<?php echo $data['page_name_url']; ?>"><i class="<?php echo $data['icon_class_name']; ?>"></i><?php echo $data['name']; if($page_name_from_url==$data['page_name_url']){ echo '<span class="selected"></span>'; } ?></a>
                            </li>
                            <?php
                        }
                      
                        if(!empty($data['main_menu']) && empty($data['sub_menu']))
                        {
                            if(in_array($data['main_menu'], $main_menu_arr))
                            {
                               
                            }
                            else
                            {
                                $main_menu_arr[]=$data['main_menu'];
                                  ?>
                                <li class="<?php if($main_menu_active==$data['main_menu']){ echo 'active'; } ?>">
                                    <a href="javascript:;">
                                    <i class="<?php echo $data['main_menu_icon']; ?>"></i>
                                    <?php echo $data['main_menu']; ?> <span class="arrow"></span>					
					                <span class="selected"></span>
                                    </a>
                                    <ul  class="sub-menu">
                                    <?php
									$selecto4=mysql_query("select * FROM `modules` where `main_menu`='".$data['main_menu']."'");
									while($data_value=mysql_fetch_array($selecto4))
									{
										if(in_array($data_value['id'],$mng_mdul_id))
										{			
                                    
                                         ?>
                                                <li class="<?php if($page_name_from_url==$data_value['page_name_url']){ echo 'active'; } ?>">
                                                    <a href="<?php echo $data_value['page_name_url']; ?>"> <i class="<?php echo $data_value['icon_class_name']; ?>"></i><?php echo $data_value['name']; ?></a>
                                                </li>
                                                <?php
										}
                                    }
                                    ?>
									
                                    </ul>
                                </li>
                                <?php
                            }
                        }
					 }
					  }
					  ?>
					
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<?php } ?>
		<!-- END SIDEBAR -->

<!-- --------------------------------end  menu  header--------------------------------------------- -->
<!-- BEGIN CONTENT -->
                      
					
 <!-- --------------------------------start  footer menu--------------------------------------------- -->
  
 <!-- BEGIN FOOTER -->
 <?php
function footer()
{?>
 <div class="page-footer" style="background-color:#B0ADAD !important;">
		<div class="page-footer-inner" style="color:#FFF !important;">
			 2014 &copy; PHP POETS. All Rights Reserved.
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
        
	</div>
	</div></div>
	<?php } ?>
    
   
   
   
   
        
    <!-- END FOOTER -->
	<!-- END CONTAINER -->
	
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
</body>
<?php  
function scripts()
{?>

   <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script><!--nil-->
<script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<script type="text/javascript" src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
 <script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
 <script type="text/javascript" src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<script type="text/javascript" src="js/comma_separater.js"></script>

<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>

<script type="text/javascript" src="assets/global/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
 
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="assets/admin/pages/scripts/components-dropdowns.js"></script>
<script src="assets/admin/pages/scripts/components-pickers.js"></script>
<!-- END PAGE LEVEL SCRIPTS --> 

<script>

jQuery(document).ready(function() {
	 
		 
	  Metronic.init();
	  ComponentsPickers.init();
	 Layout.init();
	  ComponentsFormTools.init();	  
	ComponentsDropdowns.init();
 
});
</script>
 
 <?php } ?>
<!-- END JAVASCRIPTS -->


<!-- END BODY -->
</html>
