<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 3.5
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
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

<title><?php include('../ini.php'); echo $titulo; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />

<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>

        <!-- END GLOBAL MANDATORY STYLES -->

        <!-- BEGIN THEME LAYOUT STYLES -->

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
<body class="page-header-fixed page-quick-sidebar-over-content ">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.php">
            </a>
            <div class="menu-toggler sidebar-toggler hide">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                    7 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3><span class="bold">12 pending</span> notifications</h3>
                            <a href="extra_profile.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    New user registered. <span class="time">
                                    Just now </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Server #12 overloaded. <span class="time">
                                    15 mins </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Server #2 not responding. <span class="time">
                                    22 mins </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    Application error. <span class="time">
                                    40 mins </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Database overloaded 68%. <span class="time">
                                    2 hrs </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    2 user IP blocked. <span class="time">
                                    5 hrs </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-warning">
                                    <i class="fa fa-bell-o"></i>
                                    </span>
                                    Storage Server #4 not responding. <span class="time">
                                    45 mins </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                    System Error. <span class="time">
                                    55 mins </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="label label-sm label-icon label-danger">
                                    <i class="fa fa-bolt"></i>
                                    </span>
                                    Database overloaded 68%. <span class="time">
                                    2 hrs </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">
                            See all notifications <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN INBOX DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-envelope-open"></i>
                    <span class="badge badge-default">
                    4 </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <p>
                                 You have 12 new messages
                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/admin/layout/img/avatar2.jpg" alt=""/>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">
                                    Just Now </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/admin/layout/img/avatar3.jpg" alt=""/>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">
                                    16 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/admin/layout/img/avatar1.jpg" alt=""/>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Bob Nilson </span>
                                    <span class="time">
                                    2 hrs </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/admin/layout/img/avatar2.jpg" alt=""/>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">
                                    40 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor 40% nibh congue nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/admin/layout/img/avatar3.jpg" alt=""/>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">
                                    46 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="inbox.html">
                            See all messages <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END INBOX DROPDOWN -->
                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-calendar"></i>
                    <span class="badge badge-default">
                    3 </span>
                    </a>
                    <ul class="dropdown-menu extended tasks">
                        <li>
                            <p>
                                 You have 12 pending tasks
                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;">
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    New release v1.2 </span>
                                    <span class="percent">
                                    30% </span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    40% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Application deployment </span>
                                    <span class="percent">
                                    65% </span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    65% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Mobile app release </span>
                                    <span class="percent">
                                    98% </span>
                                    </span>
                                    <span class="progress">
                                    <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    98% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Database migration </span>
                                    <span class="percent">
                                    10% </span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    10% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Web server upgrade </span>
                                    <span class="percent">
                                    58% </span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    58% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    Mobile development </span>
                                    <span class="percent">
                                    85% </span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    85% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                    <span class="task">
                                    <span class="desc">
                                    New UI release </span>
                                    <span class="percent">
                                    18% </span>
                                    </span>
                                    <span class="progress progress-striped">
                                    <span style="width: 18%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">
                                    18% Complete </span>
                                    </span>
                                    </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="external">
                            <a href="#">
                            See all tasks <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-language">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" src="assets/global/img/flags/<?php echo $cod_lingua; ?>.png">
                              
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                
                                <?php 
                        $db0 = Xcrud_db::get_instance();
                        $query0 = 'SELECT *  FROM linguas';
                        $db0->query($query0);
                        $result0 = $db0->result();
                        foreach ($result0 as $key => $item){
                         $lingua_code=$item['cod_lingua']; 
                         $lingua=$item['id_lingua']
                                ?>
                                 <li>
                                  <a href="pages/changelinguas.php?lingua=<?php echo  $lingua; ?><?php if(isset( $_GET['page'])) echo"&page=".$_GET['page'];?>">
                                 <img alt="" src="assets/global/img/flags/<?php echo  $lingua_code; ?>.png"> <?php echo  $lingua_code; ?> </a>
                                </li>
                                <?php
                                    }
                                    ?>
                             
                            </ul>
                        </li>

                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="assets/admin/layout/img/avatar3_small.jpg"/>
                    <span class="username">
               <?php
                    echo $user_activo;
                    ?></span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?page=editar_perfil">
                            <i class="icon-user"></i> O meu perfil</a>
                        </li>
                        <li>
                            <a href="page_calendar.html">
                            <i class="icon-calendar"></i> My Calendar </a>
                        </li>
                        <li>
                            <a href="inbox.html">
                            <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                            3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                            7 </span>
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="extra_lock.html">
                            <i class="icon-lock"></i> Lock Screen </a>
                        </li>
                        <li>
                            <a href="../logout.php">
                            <i class="icon-key"></i> Sair </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                <li class="dropdown dropdown-quick-sidebar-toggler">
                    <a href="javascript:;" class="dropdown-toggle">
                    <i class="icon-logout"></i>
                    </a>
                </li>
                <!-- END QUICK SIDEBAR TOGGLER -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                <li class="sidebar-search-wrapper">
                    <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                    <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                    <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                    <form class="sidebar-search" action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                       
                    </form>
                    <!-- END RESPONSIVE QUICK SEARCH FORM -->
                </li>
               
               

              <?php include('sidebar.php');?>
                  


            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                             Widget settings form goes here
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn blue">Save changes</button>
                            <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
           
            <!-- BEGIN PAGE HEADER-->
        
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <!--<div class="note note-success">
                        <p>
                             Please try to re-size your browser window in order to see the tables in responsive mode.
                        </p>
                    </div>-->

        
                <?php 

                include('pages/'.$page.".php") ?>       

                  
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->
                    
</div>

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">
           2019 &copy; <?php echo $nomeapp; ?> - Desenvolvido por BonusCloud. Versão: IB<?php echo $vframework; ?>.
       
      
      
    </div>


    <div class="page-footer-tools">
        <span class="go-top">
        <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>

                                       
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!--<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>-->
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<!--<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>-->
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>-->
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<!--<zscript src="assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/fuelux/js/spinner.min.js"></script>
<!--<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery.input-ip-address-control-1.0.min.js"></script>-->

<script src="assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<!--<script src="assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/ckeditor/ckeditor.js"></script>-->
<script src="assets/admin/pages/scripts/components-form-tools.js"></script>

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>

<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<!--<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL SCRIPTS -->


<script src="assets/jquery.multicheck.js" type="text/javascript"></script>
<script src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/jQuery.select2OptionPicker.js"></script>
<link rel="stylesheet" type="text/css" href="assets/select2OptionPicker.css" />








<script>
jQuery(document).ready(function() {   
    //$('select').multicheck();
 // QuickSidebar.init(); // init quick sidebar
   // initiate layout and plugins
   Demo.init(); // init demo features
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
 ComponentsFormTools.init();
});


jQuery(document).on("xcrudbeforerequest", function(event, container) {
     // Metronic.init(); 

    if (container) {
        jQuery(container).find("select").select2("destroy");
    } else {
        jQuery(".xcrud").find("select").select2("destroy");
    }

 //$('select').select2OptionPicker();
});
jQuery(document).on("ready xcrudafterrequest", function(event, container) {
     Metronic.init(); 




    //$('select[name= Y2xpZW50ZXMuaWRfZW1wcmVzYQ--').select2OptionPicker();
    



   if (container) {
         jQuery(container).find("select").select2({
           // placeholderOption: 'first'
        });
    } else {
        
        jQuery(".xcrud").find("select").select2({
           // placeholderOption: 'first'
        });
    }



});
jQuery(document).on("xcrudbeforedepend", function(event, container, data) {
     Metronic.init(); 

    jQuery(container).find('select[name="' + data.name + '"]').select2("destroy");

// $('select').select2OptionPicker();
});
jQuery(document).on("xcrudafterdepend", function(event, container, data) {
     // Metronic.init(); 
    jQuery(container).find('select[name="' + data.name + '"]').select2({
        placeholderOption: 'first'
    });

//$('select').select2OptionPicker();
});


</script>
</body>
<!-- END BODY -->
</html>
