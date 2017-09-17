<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Automation System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Automation System " name="description" />
        <meta content="Laurensius Dede Suhardiman" name="author" />
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
        <link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url();?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
       <script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        
        <link rel="shortcut icon" href="favicon.ico" /> 
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?php echo base_url();?>assets/layouts/layout/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"><?php echo $this->session->userdata("session_aalsystem_nama_lengkap"); ?></span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="page_user_profile_1.html">
                                            <i class="icon-user"></i> My Profile </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a href="<?php echo site_url();?>/adi/monitoringketingian/logout/">
                                            <i class="icon-key"></i> Log Out 
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="page-container">
                <div class="page-sidebar-wrapper">
                    <div class="page-sidebar navbar-collapse collapse">
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <li class="nav-item start">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Monitoring</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start">
                                        <a href="<?php echo site_url(); ?>/monitoringketinggian/index/" class="nav-link ">
                                            <i class="icon-clone"></i>
                                            <span class="title">Monitoring Sensor</span>
                                        </a>
                                    </li>
                                    <li class="nav-item start ">
                                        <a href="<?php echo site_url(); ?>/monitoringketinggian/system_log/" class="nav-link ">
                                            <i class="icon-graph"></i>
                                            <span class="title">Today System Log</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
							<li class="nav-item start">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Laporan</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start">
                                        <a href="<?php echo site_url(); ?>/monitoringketinggian/system_laporan/" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">Cek Laporan Periode</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                