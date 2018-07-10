   <style>
       #label{
           padding:12px;
       }
           </style>
        
        <div class="row" id="label">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h3 style="color:#02B645;"><b>Contact Us</b></h3>
			</div> 
               
		
        </div>
            </div>
           <div style="background:white">
          <div class="container">    
              <div class="row">
		<div class="col-md-5 col-md-offset-1">
		<h5 style="color:#02B645;">Home <i class="fas fa-angle-double-right"></i> Contact Us</h5>
               
                
               
               
		</div>
            
                  </div>
                  <div class="row">
              <div class="col-md-6 col-md-offset-2">
         <?php
        $this->load->helper('form');
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            
        <div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?> 
  </div>
        <?php }?>
             
              <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>           
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?> 
  </div>
        <?php }?>
             
             
       
        </div>
      </div>
                          
               <div class="row">
                   <form action="<?php echo base_url()?>Home/send_msg" method="post">
                    <div class="col-md-5 col-md-offset-1">
                                <h4 style="color:#02B645;">Get a Free Consultation</h4><hr style="border-top: 1px solid #ccc;">
                       
                    <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Name:</label><span style="color:red">*</span>
					<input class="form-control" name="name" id="fname" minlength="2" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                                
                                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Email Id:</label><span style="color:red">*</span>
					<input class="form-control" name="email" id="email" minlength="2" required="" type="email"  value="<?php echo set_value('recruiter_fname'); ?>" required /><span class="text-danger" id="name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                                
                                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Mobile No:</label><span style="color:red">*</span>
                                        <input class="form-control"  name="mobile" id="mobile" minlength="10" maxlength="11" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="mobile_err"><?php echo form_error('recruiter_fname'); ?></span>
          <span class="text-success" id="mobile_success"></span>
				</div>
                        </div>
                  </div>
                                
                                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Comment:</label><span style="color:red">*</span>
                                        <textarea class="form-control" name="comment"  rows="4" cols="50" value="<?php echo set_value('recruiter_address'); ?>" required>
                                        </textarea>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                          <div class="row" id="otp_div" style="display: none">
                    <div class="col-md-12">
                                <div class="form-group">
          <label for="name">OTP:</label><span style="color:red">*</span>
                                        <input class="form-control"  name="otp" id="otp" minlength="6" maxlength="11" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
          <span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
        </div>
                        </div>
                  </div>
                        <button type="button" id="send_btn" class="btn btn-info" onclick="send_otp()">Send OTP</button>        
                    <input type="submit" class="btn btn-success" name="submit" id="submit" style="display: none">
                    </div>
                       
                       </form>
                    <div class="col-md-5 col-md-offset-1" style="color:#02B645;">
				 <h4 >Contact us for business queries :</h4><hr style="border-top: 1px solid #ccc;">
                                 <b>Contact:</b> Ms. Preeti Singh<br>
                                <b>Land Line:</b> +91-22-25701724<br>
                                <b>Address:</b> 1076, Heera Pana Centre, Hiranandani Gardens, Powai, Mumbai - 400076 (INDIA)<br>
                                <b>Email:</b> preeti@packagingnaukri.com
                        </div>
                </div>
              
              
              <br>
           
		
        </div>   <br>
               </div>
           
           
         
           
		
        </div>
        
        
        <script type="text/javascript">
          function send_otp()
          {

    var mobile= $('[name="mobile"]').val();
//   alert(mobile);
    var x=mobile.toString().length;
    //alert(x);
        if(x == 10 || x == 11)
        {
           $.ajax({
       url : "<?php echo site_url('index.php/Otp/contact_otp')?>/" ,        
       type: "post",
        data:{contact_mobile : mobile},
       dataType: "JSON",
       success: function(data)
       {            
          // alert(data.mobile_error);
          if (data.send) {
          $('#mobile_success').html(data.send);
          $('#mobile_err').html("");

            $('#submit').show();
            $('#otp_div').show();
            $('#send_btn').hide();
        }
        else{
          $('#mobile_success').html("");
          $('#mobile_err').html(data.error);            
        }

       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         // alert('Error...!');
         $("#ajax").html("Error While Sending Otp");
       }
     });
        }
        else
        {
         $("#mobile_err").html("Not a valid Phone Number");
         return false;
        }
     
            $('#submit').show();
            $('#otp_div').show();
            $('#send_btn').hide();

          }
        </script>