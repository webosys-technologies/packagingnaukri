     <style>
         #content_body{
             padding:15px;
         }
     </style>
    <div class="banner-container"> 
  	<div id="carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1" ></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="item active"><img src="<?php echo base_url(); ?>assets/images/a.jpg"  width="100%" height="50%" alt="banner" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/b.jpg"  width="100%" height="50%" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/c.jpg" width="100%" height="50%" alt="banner" /></div>
  </div>
  
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>	
  </div>
        
        <div class="row" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h3 style="color:#0BA1DC;">Enjoy building your career with lots of ready jobs!</h3>
			<p>To provide the right opportunity to the every qualified packaging professional.</p>   
		</div>  <br>
                <div class="col-md-2">
            <a href="" class="btn btn-info">GO!</a>
            </div>
		
        </div>
            </div>
         <div class="row" id="content_body">        
		<div class="col-md-8">
		<h4 style="color:#0BA1DC;">Welcome to Packaging Naukri</h4><hr style="border-top: 1px solid #ccc;">
			
<h5 style="color:#0BA1DC;">Objective</h5>
<p>
We intend and aim to place the candidate as per the precise need of the position in terms of experience, expertise, and budget resulting in a symbiotic business relationship between the employee and the employer.<br><br>

Packaging and related businesses has seen a phenomenal growth trajectory in the last decade and the momentum is increasing on a daily basis and so is the need for qualified and experienced professionals on this front. Being a vast and diversified field it is difficult to find talent suited to a particular requirement with the required expertise. This is were we step in.<br><br>

To provide the right opportunity to the every qualified packaging professional, to achieve his/her career objective. At the same time to provide the suitable candidate as per employer’s business need and develop a win-win relationship</p>   
		</div> <br><br>
             <div class="col-md-4">
                 
                 
                    
                   <div class="panel panel-default">
			<div class="panel-heading" style="">
      <h3>Member Login</h3>
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
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <form action="<?php echo base_url(); ?>member/index/loginMe" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="member_email" placeholder="Username or Email" name="member_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="member_password" required /><span class="text-danger" id="password_err"></span>
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

        <a href="<?php echo base_url() ?>forgotPassword">Forgot Password</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
                 
                 
             </div><br>
           
		
        </div>
        
        