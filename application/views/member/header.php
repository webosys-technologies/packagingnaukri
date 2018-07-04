
<html>
  <head>
    <meta charset="UTF-8">
    <title>Member|Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    

  <!-- If you'd like to support IE8 -->
 
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
 <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />  
 <!--<script src="<?php echo base_url("assets/js/jquery-3.2.1.min.js");?>"></script>-->
  
  <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> 
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>

     <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
     <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-2.1.4.min.js"); ?>"></script>
     
      
   
  </head>

  
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url(); ?>member/Dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Pack</b></span>
          <!-- logo for regular state and mobile devices -->
          <!--<span class="logo-lg"><b>Packagingnaukri</b></span>-->
          <img src="<?php if(isset($system)){ echo base_url($system->system_logo); }?>" width="210px" height='55px'> 
        </a>
        
        
        
        
                
        
        
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>   
          </a>

        
        
              
      
         
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src='<?php if(file_exists($member_data->member_profile_pic)){ echo base_url().$member_data->member_profile_pic; }else{echo base_url()."profile_pic/avatar.png";}?>' width='90px' height='90px'class='user-image' alt='user-image'>
                    <span class="hidden-xs"><?php if(isset($member_data)){echo ucfirst(strtolower($member_data->member_fname))." ".ucfirst(strtolower($member_data->member_lname));}?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                   <img src='<?php if(file_exists($member_data->member_profile_pic)){ echo base_url().$member_data->member_profile_pic; }else{echo base_url()."profile_pic/avatar.png";}?>' class='img-circle' alt='user-image'>
                    <p><?php if(isset($member_data)){echo ucfirst(strtolower($member_data->member_fname))." ".ucfirst(strtolower($member_data->member_lname));}?>
                     
                      <small> <?php echo 'Member'; ?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#password_modal"><i class="fa fa-key"></i> Change Password</button>
                    </div>
                     
                    <div class="pull-right">
                      <a href="<?php echo base_url(); ?>member/Index/signout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
        
 
        
        
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
<!--            <li class="treeview">
              <a href="<?php echo base_url(); ?>member/Dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>-->
            
<!--             <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Post Resume</span></i>
              </a>
            </li>-->
          
            <li class=" treeview">
                <a href="<?php echo base_url();?>member/Jobs">
            <i class="fa fa-search"></i> <span>Search Jobs</span>
<!--            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>-->
          </a>
<!--          <ul class="treeview-menu">
            <li><a href="<?php echo base_url(); ?>member/Jobs"><i class="fa fa-circle-o"></i>Add jobs</a></li>
            <li><a href="<?php echo base_url(); ?>member/Jobs/view_jobs"><i class="fa fa-circle-o"></i>View All Jobs</a></li>
          </ul>-->
        </li>     
                      
          
          
           <li class="treeview">
                 <a href="<?php echo base_url();?>member/Jobs/saved_jobs" >
                <i class="fa fa-star"></i>
                <span>Saved Jobs</span>
              </a>
            </li>
            <li class="treeview">
                 <a href="<?php echo base_url();?>member/Jobs/applied_jobs" >
                <i class="fa fa-suitcase"></i>
                <span>Applied Jobs</span>
              </a>
            </li>

           
            
          
             <li class="treeview">
                 <a href="<?php echo base_url();?>member/Profile" >
                <i class="fa fa-child"></i>
                <span>Manage profile</span>
              </a>
            </li>
            
          
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <script>
          
          function change_password()
          {
   
                 var pass_val;
           
                 var pass=$('#password').val();
                 var cpass=$('#cpassword').val();
                     var length=pass.length;
                   //  var confirm_pass=$('#cpassword').val();
                   //  var lenght1=confirm_pass.length;
                     if(length<8)
                     {
                     $("#password_err").html("Enter Password at least 8 character");
                      pass_val=false;
                     }else if(pass!=cpass)
                     {
                         $("#password_err").html("");
                          $("#cpassword_err").html("Password does not match");
                           pass_val=false;
                     }else{
                         $("#password_err").html("");
                         $("#cpassword_err").html("");
                          pass_val=true;
                     }
                         
                 
                                            
                    
                    
          
          
          
          
   if(pass_val)
   {
       var data = new FormData(document.getElementById("password_form"));
       var url = "<?php echo base_url()?>member/Index/change_password";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(json)
        {  
           if(json.success)
           {
               location.reload();
           }
          
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
//          alert('Error...!');
        }
      }); 
   }
   }
          
      </script>
      
     <div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_dialog7">
    <div class="modal-content">
      <div style="background:#3c8dbc" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Change Password</strong></h4></center>
      </div>
      <div style="background:#F2F3F4" class="modal-body">
          <form action="" method="post" id="password_form">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                          <label>New Password :</label>
                      <input type="password" class="form-control" name="password" id="password">
                      <span class="text-danger" id="password_err"></span>
                      </div>
                          
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                           <label>Confirm Password :</label>
                  <input type="password" class="form-control" name="cpassword" id="cpassword">
                  <span class="text-danger" id="cpassword_err"></span>
                  </div>
                          
                          </div>
                  </div>
                 </div>
              <div class="col-md-2">
              </div>
     
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
  <div class="modal-footer">
      <button onclick="change_password()" class="btn btn-primary">Submit</button>
  </div>
</div> 
         </div>
         </div>

     
      

  
 


      
      
      
    

