
    
    <style>
/*            #header{
                margin:25px;
            }
            
            #nav_header{
                padding:12px;
            }
            #logo{
                padding-top:0px;
               
            }*/
            
            #login{
                margin-top:120px;
            }
            
            </style>
 
    

 <script src="<?php echo base_url("assets/js/validation1.js"); ?>">
</script>

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
                   
