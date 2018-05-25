<style type="text/css">
	.form-label{

		font-size: 100%;
	}
	.text   {
		 width: 100%;
    padding: 8px 12px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
	}
</style>
<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
   
</div>
    <br>
    <br>

    <div class="row" >
    	<div class="col-md-6 col-md-offset-3" >
    		<div class="panel panel-default" >
    			<div class="panel-heading" style="background-color: #0461A8;color: white">
    				<h3 ><strong> Member Registration</strong></h3>
    				
    			</div>
    			<div class="panel-body">
    				<form method="post" id="form" action="<?php echo base_url('member/Index/register'); ?>">
    				<div class="form-group">
    					<label for="email" class="form-label">Name</label><span style="color:red">*</span>
    					<div class="row">
    					<div class="col-md-6">
    					<input class="form-control" name="fname" id="fname" required="" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>" />  
                        <span class="text-danger" id="fname_err"></span>
                        <span class="text-danger"><?php echo form_error('fname'); ?></span>

                        </div>

    					<div class="col-md-6">			
    					<input class="form-control" name="lname" id="lname" required="" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" />
                        <span class="text-danger" id="lname_err"></span>
                        <span class="text-danger"><?php echo form_error('lname'); ?></span>


    					</div>
    					</div>
                	</div>


					<div class="form-group">
    					<label for="email" class="form-label" >Email ID</label><span style="color:red">*</span>
    					<input class="form-control" name="email" id="email" required="" placeholder="Email-ID" type="email" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger" id="email_err"></span>
    					<span class="text-danger"><?php echo form_error('email'); ?></span>
                	</div>

                    <div class="form-group">
                        <label for="email" class="form-label" >Password</label><span style="color:red">*</span>
                        <input class="form-control" name="password" id="password" required="" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                        <span class="text-danger" id="password_err"></span>
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label" >Confirm Password</label><span style="color:red">*</span>
                        <input class="form-control" name="confirm_password" id="password" required="" placeholder="Confirm Password" type="password" value="<?php echo set_value('confirm_password'); ?>" />
                        <span class="text-danger" id="password_err"></span>
                        <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                    </div>
                    <div class="form-group">                    
                    <div class="row">
                        <div class="col-md-8">
    					<label for="email" class="form-label" >Mobile</label><span style="color:red">*</span>
    					<input class="form-control" name="mobile" id="mobile" required="" placeholder="Mobile" type="number" value="<?php echo set_value('mobile'); ?>" minlength="10" maxlength="11"  />
                        <span class="text-danger" id="mobile_err"></span>
                        <span class="text-success" id="mobile_success"></span>
    					<span class="text-danger"><?php echo form_error('mobile'); ?></span>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button type="button" class="btn btn-warning" onclick="send_otp()">Send Otp</button>
                        </div>
                	</div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label" >Enter OTP </label><span style="color:red">*</span>
                        <input class="form-control" name="otp" id="otp" required="required" placeholder="Enter OTP" type="text" value="<?php echo set_value('otp'); ?>"  maxlength="6" />
                        <span class="text-danger" id="otp_err"></span>
                        <span class="text-danger"><?php echo form_error('otp'); ?></span>
                    </div>
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">State</label><span style="color: red">*</span>
                        <select name="state" id="state" class="form-control" required>
                                    <option value="">-- Select State --</option>
                                    <?php if(isset($states)){
                                        foreach($states as $state)
                                        { ?>
                                           <option value="<?php echo $state->city_state; ?>"><?php echo $state->city_state; ?></option>
                                       <?php }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">City</label><span style="color: red">*</span>
                        <select name="city" id="city" class="form-control" required>
                                    <option value="">-- Select City --</option>
                                    <?php if(isset($city)){
                                        foreach($city as $city)
                                        {
                                           echo '<option value="">'.$state->city_state.'</option>';
                                        }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('city'); ?></span>

                    </div>
                    </div>
                    </div>

                    <hr style="border-top: 1px solid #ccc;">
                    <span class="text-danger" id="ajax"></span>
                            
                    <div class="row">
                        <div class="col-md-5" > 
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-success">Signup</button>
                            <button name="cancel" type="reset" onclick="" class="btn btn-danger">Clear</button>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <a href="<?php echo base_url();?>Home">I already have an account? Login here.</a>    
                        </div>
                    </div>
    				</form>
    			</div>
    			
    		</div>
    		
    	</div>
    	
    </div>
	
</div>
<script>
    $(document).ready(function() {

 $("#state").change(function() {

   var el = $(this) ;

   //if(el.val() === "Maharashtra" ) {
var state= $('#state option:selected').val();
//alert(state);
          
      $.ajax({
       url : "<?php echo site_url('index.php/member/Index/show_cities')?>/" + state,        
       type: "GET",
        
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
            //alert(row.city_name);
           
              $("#city").append('<option value="'+ row.city_name +'">' + row.city_name + '</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
       //  alert('Error...!');
       }
     });
  // }
    
 });

});

    function send_otp()
    {
    var mobile= $('[name="mobile"]').val();
    //alert(mobile);
    var x=mobile.toString().length;
   // alert(x);
        if(x == 10 || x == 11)
        {
           $.ajax({
       url : "<?php echo site_url('index.php/Otp/send_otp')?>/" ,        
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
         //alert('Error...!');
         $("#ajax").html("Error While Registration");
       }
     });
        }
        else
        {
          $("#mobile_err").html("Not a valid Phone Number");
         // alert("Not a valid Phone Number");
         // return false;
        }
        
    }

    function reset()
    {
      alert('dj');
      $('#form').reset[0];
    }
 
</script>