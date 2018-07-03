<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">-->
  <!-- jvectormap -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">-->
  <!-- Date Picker -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">-->
  <!-- Daterange picker -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">-->
  <!-- bootstrap wysihtml5 - text editor -->
  <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
   <!--<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!--<link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />-->
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <!--<link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />-->
     <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <!--<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">-->

    <!-- Data tables.. -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
   
  <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<script src="<?php echo base_url("assets/js/validation1.js"); ?>">
</script>
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">PKG</span>
      <!-- logo for regular state and mobile devices -->
      <!--<span class="logo-lg"><i><b>Packaging</b></i><i style="color:#0F5397;"><b>naukri.com</b></i></span>-->
      <img src="<?php if(isset($system)){echo base_url($system->system_logo) ;} ?>" width="210px" height='55px'> 
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
       
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
       

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <!-- Messages: style can be found in dropdown.less-->
        
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--<img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                <img src='<?php if((file_exists($user_data->user_profile_pic))){echo base_url(); echo $user_data->user_profile_pic;}else{ echo base_url()."profile_pic/boss.png"; }?>' class="user-image" alt="User Image"/>
               <span class="hidden-xs"><?php if(isset($user_data)){echo ucfirst(strtolower($user_data->user_fname))." ".ucfirst(strtolower($user_data->user_lname));}else{echo "NO NAME";}?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!--<img src="<?php echo base_url(); ?>profile_pic/boss.png" class="img-circle" alt="User Image">-->
  <img src='<?php if(file_exists($user_data->user_profile_pic)){echo base_url(); echo $user_data->user_profile_pic;}else{ echo base_url()."profile_pic/boss.png"; }?>' class="img-circle" alt="User Image"/>
                <p>
                 <?php if(isset($user_data)){echo ucfirst(strtolower($user_data->user_fname))." ".ucfirst(strtolower($user_data->user_lname));}else{echo "NO NAME";}?>
                  <small>Admin</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="<?php echo base_url(); ?>admin/Profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>admin/Index/signout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
    
 
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php if(file_exists($user_data->user_profile_pic)){echo base_url(); echo $user_data->user_profile_pic;}else{ echo base_url()."profile_pic/boss.png"; }?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php if(isset($user_data)){echo ucfirst(strtolower($user_data->user_fname))." ".ucfirst(strtolower($user_data->user_lname));}else{echo "NO NAME";}?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="search_field" id="search_field1" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree" id="search_area">
        <!--<li class="header">MAIN NAVIGATION</li>-->
        <li >
          <a href="<?php echo base_url(); ?>admin/Dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>          
          </a>         
        </li>
     
        <li>
          <a href="<?php echo base_url(); ?>admin/Members">
            <i class="fa fa-users"></i> <span>Member Masters</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
         <li>
          <a href="<?php echo base_url(); ?>admin/Jobs">
            <i class="fa fa-folder"></i> <span>Manage Jobs</span>            
          </a>
         </li>
         
          <li>
          <a href="<?php echo base_url(); ?>admin/Users">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li> 
        <li>
          <a href="<?php echo base_url(); ?>admin/Companies">
            <i class="fa fa-folder"></i> <span>Companies</span>            
          </a>
         </li>
        
        <li>
          <a href="<?php echo base_url(); ?>admin/Recruiter">
            <i class="fa fa-institution"></i> <span>Recruiters</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
            
         <li>
          <a href="<?php echo base_url(); ?>admin/Institute">
            <i class="fa fa-folder"></i> <span>Manage University/Institute</span>            
          </a>
         </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/Education">
            <i class="fa fa-folder"></i> <span>Manage Education</span>            
          </a>
         </li>         
         <li>
          <a href="<?php echo base_url(); ?>admin/Customer">
            <i class="fa fa-folder"></i> <span>Manage Customer</span>            
          </a>
         </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/Profile">
            <i class="fa fa-users"></i> <span>Profile</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         
        <li class=" treeview">
          <a href="<?php echo base_url(); ?>admin/System/index">
            <i class="fa fa-folder"></i> <span>System</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>admin/System/index"><i class="fa fa-circle-o"></i>Packaging</a></li>
            <li><a href="<?php echo base_url(); ?>admin/System/printing"><i class="fa fa-circle-o"></i> Printing</a></li>
            <li><a href="<?php echo base_url(); ?>admin/System/plastic"><i class="fa fa-circle-o"></i>Plastic</a></li>
             </ul>
        </li>
        
         <li>
          <a href="<?php echo base_url(); ?>admin/Setting">
            <i class="fa fa-users"></i> <span>Setting</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       


      </ul>
    </section>
   
  </aside>
 
  <script>
     $("#search_field1").on("keyup", function() {
           var value = $(this).val().toLowerCase();
    $("#search_area li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    </script>