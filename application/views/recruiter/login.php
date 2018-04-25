<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recruiter System Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url(); ?>assets/js/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
    <style>
            #header{
                margin:25px;
            }
            
            #nav_header{
                padding:12px;
            }
            #logo{
                padding-top:0px;
               
            }
            
            #login{
                margin-top:130px;
            }
            </style>
    
    
    
  </head>
 <script src="<?php echo base_url("assets/js/validation1.js"); ?>">
</script>

<body style="background:#d2d6de">

     <header class="header" id="header">
  <div class="container">
  <nav class="navbar navbar-default navbar-fixed-top" id="nav_header">
  <div class="container-fluid">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>profile_pic/naukri_logo.png" width="200px" height="50px"></a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li><a href="#">Home</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>  
  </div> 
</nav>
  </div>
   
</header>   
    

<div class="col-md-4 col-md-offset-4" id="login">
                   <div class="panel panel-default">
			<div class="panel-heading" style="">
                            <h3>Recruiter Login</h3>
                            </div>
                            <div class="panel-body">
                              
   
        
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        
         $log_error = $this->session->flashdata('log_error');
         $recruiter_email=$this->session->flashdata('recruiter_email');
         
        if($log_error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $log_error; ?>    <br>
                <a href="<?php echo base_url();?>recruiter/index/resend_email/<?php echo $recruiter_email?>">Click here to Resend verification link</a>
            </div>
        
        <?php }
        
        $success = $this->session->flashdata('email_verify');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php }
        $signup_success=$this->session->flashdata('signup_success');
        if($signup_success)
        {?>
         <div class="alert alert-success alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $signup_success; ?>  
         </div>
        <?php
        }
        ?>
        
        <form action="<?php echo base_url(); ?>recruiter/Index/loginMe" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" id="email" placeholder="Email" name="recruiter_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="recruiter_password" required /><span class="text-danger" id="password_err"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <span class="text-danger"></span>
          <div class="row">
            <div class="col-xs-8">    
              
                
            </div>  
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
            </div> 
          </div>
            <br>
            
                   <div class="form-group has-feedback">
        <a href="<?php echo base_url(); ?>recruiter/Index/forgotPassword">Forgot Password</a>
        <div class="pull-right"><a href="<?php echo base_url();?>recruiter/index">Sign Up</a></div>
        </div>
        
    
        </form>
      
      </div>
    </div>  
                       </div>
                   









    
    
       
  
    
   </body>
</html>