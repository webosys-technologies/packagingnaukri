
    
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
  function send_otp()
    {
      var mobile=$('[name="recruiter_email"]').val(); 
     // alert(mobile);
            // otp_val=rec_email_validation();
        if(!isNaN(mobile))
        { 
          $("#no_err").html(" ");
          var x=mobile.toString().length;

         // alert(x);
          if(x == 10 || x == 11)
        {
          $("#no_err").html(" ");

          // alert('valid');
               $.ajax({
           url : "<?php echo site_url('index.php/recruiter/index/send_otp')?>/" ,        
           type: "post",
            data:{member_email : mobile},
           dataType: "JSON",
           success: function(data)
           {            
              // alert(data.mobile_error);
              if (data.send) {
              $('#email_success').html(data.send);
              $('#no_err').html("");
            }
            else{
              $('#email_success').html("");
              $('#no_err').html(data.mobile_error);            
            }

           },
           error: function (jqXHR, textStatus, errorThrown)
           {
             //alert('Error...!');
             $("#ajax").html("Error While Registration");
           }
         
      });
  }          
            else
            {
              $("#no_err").html("Not a valid Phone Number");
             // alert("Not a valid Phone Number");
             // return false;
            }

  }    else{
          // alert('exit');

    $("#no_err").html("Please Enter Mobile No For OTP Login");
  }  

    }
     $(document).ready(function(){
         
         // $("#send_otp").click(function(){
         //   alert
    
                
         // });
             // $("#otp_div").hide();


         
         $("#pass_btn").click(function(){
             $("#otp_field").hide();
             $("#password_field").show();
             $("#otp_div").hide();
             $("#pass_btn").hide();
              $("#otp_btn").show();
         });

         $("#otp_btn").click(function(){
             //alert();
             $("#otp_div").show();
             $("#otp_field").show();
             $("#password_field").hide();
             $("#pass_btn").show();
              $("#otp_btn").hide();
         });
     });
     
     var val;
     
    //    function recruiter_login() {  
    //    if(!($('#otp_field').css('display') == 'none'))
    //     {
    //         val=otp_validation();
        
    //     }else{
    //         val= recruiter_log_validation();
    //     }
      
 
    //     if(val)
    //     {
    //    var data = new FormData(document.getElementById("recruiter_form"));
    //    var url = "<?php echo site_url('index.php/recruiter/Index/loginMe')?>";
           
    //    $.ajax({               
    //         url : url,
    //         type: "POST",
    //         async: false,
    //         processData: false,
    //         contentType: false,            
    //         data: data,
    //         dataType: "JSON",
    //     success: function(data)
    //     {  var success;
    //         var email_error;
    //         var pass_error;
    //         var log_error;
             
    //         if(data.log_error)
    //         {
    //             $("#log_err").html(data.log_error);
    //         }
    //         if(data.otp_error)
    //         {
    //             $("#otp_error").html(data.otp_error);
    //         }
                   
            
    //         if(data.status)
    //         {
    //          window.location="<?php echo site_url('index.php/recruiter/Dashboard')?>";
    //         }
            
    //     },
    //     error: function (jqXHR, textStatus, errorThrown)
    //     {            
    //       alert('Error...!');
    //     }
    //   });
    //   }
    // }

 </script>


<div class="col-md-4 col-md-offset-4" id="login">
                   <div class="panel panel-default">
			<div class="panel-heading" style="background-color: #0461A8;color: white">
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
                <!-- <a href="<?php echo base_url();?>recruiter/index/resend_email/<?php echo $recruiter_email?>">Click here to Resend verification link</a> -->
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
        
        <form id="recruiter_form" action="<?php echo base_url(); ?>/recruiter/index/loginMe" method="post">
            <span id="log_err" style="color:red"></span>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="email" placeholder="Email or Mobile No" name="recruiter_email" required/><span class="text-danger" id="email_err"></span>
            <span class="text-danger" id="no_err"></span>
            <span class="text-success" id="email_success"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
           <div class="form-group" id="otp_div" style="display:none;"> <center><a class="label label-success" id="send_otp"     onclick="send_otp()" >Send OTP</a></center></div>
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
            </div>  
            <div class="col-xs-4">
                <!-- <a id="pass_btn" type="button" class="btn btn-warning btn-xs" style="display:none;">Login with Password</a> -->

            </div> 
          </div>
              <input type="submit"  class="btn btn-primary btn-block btn-flat" value="Sign In" />
              
               <center> <h3><a id="otp_btn" type="button" class="btn btn-warning btn-xs">Login with otp</a> </h3>  </center>
               <center> 
                <a id="pass_btn" type="button" class="btn btn-warning btn-xs" style="display:none;">Login with Password</a>
               </center>
            <br>
            
                   <div class="form-group has-feedback">
        <a href="<?php echo base_url(); ?>recruiter/Index/forgotPassword">Forgot Password</a>
        <div class="pull-right"><a href="<?php echo base_url();?>recruiter/index">Sign Up</a></div>
        </div>
        
    
        </form>
      
      </div>
    </div>  
                       </div>
                   
