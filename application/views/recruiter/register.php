       
        <style>
            #par{
                margin:120px;
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

    <div class="row">
    	<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3><strong> Recruiter Registration</strong></h3>
    				
    			</div>
    			<div class="panel-body">
    				<form method="post" action="">
    				        <div class="form-group">
    					<label for="email" class="form-label">Name</label><span style="color:red">*</span>
    					<div class="row">
                                            
    					<div class="col-md-6">
    					<input class="text" name="fname" id="fname" required="" class='form-control' placeholder="First Name" type="text" value="" />  
                                        <span class="text-danger" id="fname_err"></span>
                                        </div>

    					<div class="col-md-6">			
    					<input class="text" name="lname" id="lname" required="" class="form-control" placeholder="Last Name" type="text" value="" />
                                        <span class="text-danger" id="lname_err"></span>

    					</div>
                                                </div>
    					</div>
    					<span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
                	         


					<div class="form-group">
    					<label for="email" class="form-label" >Email ID</label><span style="color:red">*</span>
    					<input class="text" name="email" id="email" required="" placeholder="Email-ID" type="email" value="<?php echo set_value('email'); ?>" />
                        <span class="text-danger" id="email_err"></span>
    					<span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
                	</div>

                    <div class="form-group">
                        <label for="email" class="form-label" >Password</label><span style="color:red">*</span>
                        <input class="text" name="password" id="password" required="" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                        <span class="text-danger" id="password_err"></span>
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                	<div class="form-group">
    					<label for="email" class="form-label" >Mobile</label><span style="color:red">*</span>
    					<input class="text" name="mobile" id="mobile" required="" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
                        <span class="text-danger" id="email_err"></span>
    					<span class="text-danger"><?php echo form_error('mobile'); ?></span>
                	</div>

                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">State</label><span style="color: red">*</span>
                        <select name="state" id="state" class="form-control" required>
                                    <option value="">-- Select State --</option>
                                    <?php if(isset($states)){
                                        foreach($states as $state)
                                        {
                                           echo '<option value="">'.$state->city_state.'</option>';
                                        }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
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
                    </div>
                    </div>
                    </div>

                    <hr style="border-top: 1px solid #ccc;">
                            
                    <div class="row">
                        <div class="col-md-5" > 
                        <div class="form-group">
                            <button name="submit" type="submit" class="btn btn-success">Signup</button>
                            <button name="cancel" type="reset" class="btn btn-danger">Clear</button>
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
