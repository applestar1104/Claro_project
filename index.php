<?php include('ini.php'); 
include_once('config/phplogin/classes/login.class.php'); ?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 3.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" >
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $titulo; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="backoffice/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/admin/pages/css/login-soft.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="backoffice/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="backoffice/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
<link href="backoffice/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->

<div class="row">
	


	
		<form class="login-form" action="index.php" method="post">

			<h3 class="form-title">Login to your account</h3>

<?php if(isset($_GET["block"])){?>

<?php if($_GET["block"]==1){?>


<div class="alert-danger" id="mostra">		
			<span id="aqui">		
			<div class="alert alert-error" id="errophp">User Bloqueado</div>
			 </span>
		</div>


		<?php } 

		if($_GET["block"]==2){?>


<div class="alert-danger" id="mostra">		
			<span id="aqui">		
			<div class="alert alert-error" id="errophp">Nível Bloqueado</div>
			 </span>
		</div>

<?php }} ?>



		<div class="alert-danger" id="mostra">
		
			<span id="aqui">
			 </span>
		</div>
					<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" id ="username" name="username"/>

			</div>
		</div>
		<input type="hidden"  id ="browser" name="browser"/>
		
				<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>

				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password"  id="password" name="password"/>
			</div>
		</div>

		<input type="hidden" name="token" value="<?php echo $_SESSION['jigowatt']['token']; ?>"/>
	

		<div class="form-actions">
			<label class="checkbox">
			<input type="checkbox" id="remember" name="remember" value="1"/> Remember me </label>
			<button type="submit"  id="login-submit" name="login" value="login" class="btn blue pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>

		<div class="forget-password">
			<h4>Forgot your password ?</h4>
			<p>
				 no worries, click <a href="javascript:;" id="forget-password">
				here </a>
				to reset your password.
			</p>
		</div>
		</form>
	

	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->

	<form class="forget-form" action="forgot.php" method="post">
		<h3>Forget Password ?</h3>
		<p>
			 Enter your e-mail address below to reset your password.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>

			
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" id="usernamemail" name="usernamemail" />
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Back </button>
			<button type="submit" class="btn blue pull-right">
			Submit <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->

</div>
</div>


<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2019 &copy; <?php echo $nomeapp; ?> - Desenvolvido por BonusCloud.
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="backoffice/assets/global/plugins/respond.min.js"></script>
<script src="backoffice/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="backoffice/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="backoffice/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="backoffice/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="backoffice/assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="backoffice/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="backoffice/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="backoffice/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="backoffice/assets/admin/pages/scripts/login-soft.js" type="text/javascript"></script>
<script src="backoffice/assets/detect.min.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>




		jQuery(document).ready(function() { 
			jQuery("#errophp").appendTo('#aqui'); 
			jQuery(".alert-success").appendTo('#aqui'); 
			jQuery(".alert-error").appendTo('#aqui'); 
		  Metronic.init(); // init metronic core components
Layout.init(); // init current layout
  Login.init();
       // init background slide images
       $.backstretch([
        "backoffice/assets/admin/pages/media/bg/1.jpg",
        "backoffice/assets/admin/pages/media/bg/2.jpg",
        "backoffice/assets/admin/pages/media/bg/3.jpg",
        "backoffice/assets/admin/pages/media/bg/4.jpg"
        ], {
          fade: 1000,
          duration: 8000
    }
    );
b = detect.parse(navigator.userAgent);
var bo=('Browser: ' + b.browser.name + '-' +
        'Device: ' + b.device.type + '-' +
        'SO: ' + b.os.name ); 
  $("#browser").val(bo);
		});
	</script>
<!-- END JAVASCRIPTS -->

</body>
<!-- END BODY -->
</html>
