       
        <style>
            #par{
                margin:120px;
            }
            </style>
            
            <script>
              $(document).ready( function () {
                        $("#state").change(function() {
   var el = $(this) ;
             $("#city").html("");
var state=el.val();
        // alert(state);
        if(state)
        {
          $('#city').html("");            
              $("#city").append('<option value="">--Select City--</option>');
          
      $.ajax({
       url : "<?php echo site_url('index.php/home/show_cities')?>/" + state,        
       type: "GET",              
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {          
              $("#city").append('<option value="'+ row.cityName +'">' + row.cityName+'</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
        // alert('Error...!');
       }
     });
     }    
 });  

    $("#country").change(function() {        
   var el = $(this) ;
              $("#state").html("");
              $("#city").html("");
              $("#state").append('<option value="">--Select State--</option>');
              $("#city").append('<option value="">--Select City--</option>');

var country=el.val();
        if(country)
        {            
      $.ajax({
       url : "<?php echo site_url('index.php/home/show_states')?>/" + country,        
       type: "GET",              
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {          
              $("#state").append('<option value="'+ row.stateID +'">' + row.stateName+'</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
     }    
 });

 });


    function send_otp()
    {
    var mobile= $('[name="mobile"]').val();
   // alert(mobile);
    var x=mobile.toString().length;
    //alert(x);
        if(x == 10 || x == 11)
        {
           $.ajax({
       url : "<?php echo site_url('index.php/Otp/send_otp_recruiter')?>/" ,        
       type: "post",
        data:{member_email : mobile},
       dataType: "JSON",
       success: function(data)
       {            
          // alert(data.mobile_error);
          if (data.send) {
          $('#mobile_success').html(data.send);
          $('#mobile_err').html("");
        }
        else{
          $('#mobile_success').html("");
          $('#mobile_err').html(data.mobile_error);            
        }

       },
       error: function (jqXHR, textStatus, errorThrown)
       {
         // alert('Error...!');
         $("#ajax").html("Error While Registration");
       }
     });
        }
        else
        {
         $("#mobile_err").html("Not a valid Phone Number");
         return false;
        }
        
    }
            </script>
        <div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
   
</div>
    <br>
    <br>

    <div class="row">
    	<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3><strong> Recruiter Registration</strong></h3>
    				
    			</div>
    			<div class="panel-body">
                            <form method="post" action="<?php echo base_url();?>recruiter/index/register">
    	                				 <div class="row">
                                <div class="col-md-6  ">                                
                                    <div class="form-group">
                                        <label for="fname">First Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="First Name" class="form-control required" id="fname" name="fname" value="<?php echo set_value('fname'); ?>" required>
                                        <span class="text-danger" id="fname_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Last Name" class="form-control" id="lname"  name="lname" value="<?php echo set_value('lname'); ?>" required>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                    <span style="color:red" id="text_field2_error"></span>
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-12  ">                                
                                    <div class="form-group">
                                        <label for="fname">Email Id<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Enter Your Email Id" class="form-control required" id="email" name="email" value="<?php echo set_value('email'); ?>" required>
                                        <span class="text-danger" id="email_err"></span>
                                        <span class="text-danger"><?php echo form_error('email'); ?></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                               </div>
                                    
                                   
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Password<span style="color:red">*</span></label>
                                        <input type="password" placeholder="Enter Your Password" class="form-control required" id="password" name="password" minlength="8" value="<?php echo set_value('password'); ?>" required>
                                        <span class="text-danger" id="password_err"></span>
                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Confirm  Password<span style="color:red">*</span></label>
                                        <input type="password" placeholder="Confirm Your Password" class="form-control required" id="cpassword" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" required>
                                        <span class="text-danger" id="password_err"></span>
                                        <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                                                
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                        </div>

                                         <div class="row">
                                <div class="col-md-8">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile No<span style="color:red">*</span></label>
                                        <input type="number" placeholder="Enter Mobile No" class="form-control required" id="mobile" name="mobile" minlength="10" maxlength="11" value="<?php echo set_value('mobile'); ?>" required>
                                        <span class="text-success" id="mobile_success"></span>
                                        <span class="text-danger" id="mobile_err"></span>
                        <span class="text-danger"><?php echo form_error('mobile'); ?></span>

                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"><br>
                                        <button type="button" class="btn btn-warning" onclick="send_otp()">Send Otp</button>
                                    </div>
                                    
                                </div>
                                        </div>
                                         <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Enter Otp<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Enter OTP" class="form-control required" id="otp" name="otp" maxlength="6" value="<?php echo set_value('otp'); ?>" required>
                                        <span class="text-danger" id="otp_err"></span>
                        <span class="text-danger"><?php echo form_error('otp'); ?></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                        </div>
                                    
                                    
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Country</label><span style="color: red">*</span>
                        <select name="country" id="country" class="form-control" required>
                                    <option value="">-- Select Country --</option>
                                    <?php if(isset($country)){
                                        foreach($country as $country)
                                        {
                                           echo '<option value="'.$country->countryID.'">'.$country->countryName.'</option>';
                                        }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label><span style="color: red">*</span>
                        <select name="state" id="state" class="form-control" required>
                                    <option value="">-- Select State --</option>
                                   
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>

                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                        <label class="form-label">City</label><span style="color: red">*</span>
                        <select name="city" id="city" class="form-control" required>
                                    <option value="">-- Select City --</option>
                                   
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('city'); ?></span>

                    </div>
                      </div>
                      
                    </div>

                    <hr style="border-top: 1px solid #ccc;">
                            
                    <div class="row">
                        <div class="col-md-5" > 
                        <div class="form-group">
                            <button name="submit" value="submit" type="submit" class="btn btn-success">Signup</button>
                            <button name="cancel" value="reset" type="reset" class="btn btn-danger">Clear</button>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="<?php echo base_url();?>recruiter/index/login">I already have an account? Sign in here.</a>    
                        </div>
                    </div>
    				</form>
    			</div>
    			
    		</div>
    		
    	</div>
    	
    </div>
	
</div>
