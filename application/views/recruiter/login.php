
    
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

 <script>
     $(document).ready(function(){
         
         $("#otp_btn").click(function(){
           
    
        var otp_val;
        otp_val=rec_email_validation();
        if(otp_val)
        { 
       var data = new FormData(document.getElementById("recruiter_form"));
       var url = "<?php echo site_url('index.php/recruiter/Index/send_otp')?>";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(data)
        {           
            if(data.send)
            {
             $("#otp_stat").html(data.send);
             $("#otp_field").show();
             $("#password_field").hide();
             $("#pass_btn").show();
             $("#otp_btn").hide();
            }
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
//          alert('Error...!');
        }
      });
  }              
         });
         
         $("#pass_btn").click(function(){
//             alert();
             $("#otp_field").hide();
             $("#password_field").show();
             $("#pass_btn").hide();
              $("#otp_btn").show();
         });
     });
     
     var val;
     
       function recruiter_login() {  
       if(!($('#otp_field').css('display') == 'none'))
        {
            val=otp_validation();
        
        }else{
            val= recruiter_log_validation();
        }
      
 
        if(val)
        {
       var data = new FormData(document.getElementById("recruiter_form"));
       var url = "<?php echo site_url('index.php/recruiter/Index/loginMe')?>";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(data)
        {  var success;
            var email_error;
            var pass_error;
            var log_error;
             
            if(data.log_error)
            {
                $("#log_err").html(data.log_error);
            }
            if(data.otp_error)
            {
                $("#otp_error").html(data.otp_error);
            }
                   
            
            if(data.status)
            {
             window.location="<?php echo site_url('index.php/recruiter/Dashboard')?>";
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
        
        <form id="recruiter_form" action="" method="post">
            <span id="log_err" style="color:red"></span>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" placeholder="Email or Mobile No" name="recruiter_email" required/><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
          <div class="form-group has-feedback" id="password_field" >
            <input type="password" class="form-control" placeholder="Password" id="rec_password" name="recruiter_password"/><span style="color:red" id="pass_err"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           
             <div class="form-group has-feedback" id="otp_field" style="display:none">
            <input type="text" class="form-control" placeholder="OTP" id="rec_otp" name="rec_otp" /><span style="color:green" id="otp_stat"></span><span style="color:red" id="otp_error"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
          <div class="row">
            <div class="col-xs-8">    
                <a id="otp_btn" type="button" class="btn btn-warning btn-xs">Login with otp</a>   
                <a id="pass_btn" type="button" class="btn btn-warning btn-xs" style="display:none;">Login with Password</a>
            </div>  
            <div class="col-xs-4">
              <input type="button" onclick="recruiter_login()" class="btn btn-primary btn-block btn-flat" value="Sign In" />
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
                   
