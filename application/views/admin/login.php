<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin System Log in</title>
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
  </head>
 <script src="<?php echo base_url("assets/js/validation1.js"); ?>">
  
</script>


  
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      <!--  <a href="#"><b>CodeInsect</b><br>Admin System</a>  -->
      <a href="#"><b>Admin Login</b><br></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign In</p>
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
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <form action="<?php echo base_url(); ?>admin/Index/loginMe" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" id="email" placeholder="Email" name="user_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('user_email'); ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Enter Password" id="password" name="user_password" required /><span class="text-danger" id="password_err"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <span class="text-danger"></span>
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
            </div><!-- /.col -->
          </div>
        </form>

        <a href="<?php echo base_url(); ?>admin/Index/forgotPassword">Forgot Password</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    
   </body>
</html>