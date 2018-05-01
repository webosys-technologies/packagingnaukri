<title> Home | Packaging Naukri</title>
              
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
        <script src="<?php echo base_url()?>assets/jquery/jquery-3.1.0.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-2.1.4.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/validation1.js"); ?>"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
        <style>
            #header{
                margin:25px;
            }
/*            #nav_header{
                padding:12px;
            }
           */
           
           a:active { 
    background-color: yellow;
             }
           
            #logo{
                padding-top:0px;
               
            }
            </style>
</head>

</script>

<script>
    $(document).ready(function() {

//  $("#state").change(function() {
//
//    var el = $(this) ;
//
//    if(el.val() === "Maharashtra" ) {
//var state=el.val();
//           
//       $.ajax({
//        url : "<?php echo site_url('index.php/recruiter/Index/show_cities')?>/" + state,        
//        type: "GET",
//               
//        dataType: "JSON",
//        success: function(data)
//        {
//         
//           $.each(data,function(i,row)
//           {
//            
//               $("#city_name").append('<option value="'+ row.city_name +'">' + row.city_name + '</option>');
//           }
//           );
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//          alert('Error...!');
//        }
//      });
//    }
//     
//  });

});
 
</script>
    
    
<body style="background:#d2d6de"> 
    
    
    

<div class="container">
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
   
</div>
    <br>
    <br>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default">
			<div class="panel-heading" style="">
                            <h3>Member Registration</h3>
                            </div>
			<!--<hr style="border-top: 1px solid #ccc;">-->
			<div class="panel-body">
				<?php $attributes = array("name" => "registrationform");
				echo form_open("recruiter/Index/register", $attributes);?>
		<div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">First Name</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_fname" id="fname" placeholder="First Name" minlength="2" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="fname_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                    <div class="col-md-6">
				<div class="form-group">
					<label for="name">Last Name</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_lname" id="lname" required="" placeholder="Last Name" minlength="2"  type="text" value="<?php echo set_value('recruiter_lname'); ?>" /><span class="text-danger" id="lname_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_lname'); ?></span>
				</div>
                        </div>
                </div>
                            
                            
                    <div class="row">
                            
                             <div class="col-md-6">
                				
                				<div class="form-group">
                					<label for="email">Email ID</label><span style="color:red">*</span>
                					<input class="form-control" name="recruiter_email" id="email" required="" placeholder="Email-ID" type="text" value="<?php echo set_value('recruiter_email'); ?>" />
                                    <span class="text-danger" id="email_err"></span>
                					<span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
                				</div>
                            </div>
                            <div class="col-md-6" >
                                      <div class="form-group">
                                    <label for="mobile">Mobile</label><span style="color:red">*</span>
                                    <input class="form-control" name="recruiter_mobile" id="mobile" required="" minlength="10" maxlength="11" placeholder="Enter Mobile Number" type="text" value="<?php echo set_value('recruiter_mobile'); ?>" />
                                    <span class="text-danger" id="mobile_err"></span>
                                    <span class="text-danger"><?php echo form_error('recruiter_mobile'); ?></span>
                                </div>
                            </div>
                    </div> 
                            
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label for="text">Gender</label><span style="color:red">*</span>
                                <select  required name="recruiter_gender" required="" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
                                </div>
                                </div>
                             
                                <div class="col-md-6">                          
                                <div class="form-group">
                                  
                                <label for="dob">DOB</label><span style="color:red">*</span>
				<input required class="form-control required digits" name="recruiter_dob" type="Date" value="<?php echo set_value('recruiter_dob'); ?>" />
				<span class="text-danger"><?php echo form_error('recruiter_dob'); ?></span>
                                  
                                    </div>
                                </div>
                            </div>
                                                   
                            
                            <div class="row">
				<div class="form-group">
                                    <div class="col-md-6">
					<label for="subject">Password</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_password" id="password" required="" minlength="8" placeholder="Password" type="password" /><span class="text-danger" id="password_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_password'); ?></span>
				    </div>
                                    <div class="col-md-6">
					<label for="subject">Confirm Password</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_cpassword" id="cpassword" required="" placeholder="Confirm Password" type="password" /><span class="text-danger" id="cpassword_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_cpassword'); ?></span>
				
                                    </div>
                                    </div>
                               </div>
                                <div class="form-group">
					<label for="text">Address</label><span style="color:red">*</span>
                                        <textarea required class="form-control" name="recruiter_address"   rows="4" cols="50" value="<?php echo set_value('recruiter_address'); ?>">
                                        </textarea>
                                        <span class="text-danger"><?php echo form_error('recruiter_address'); ?></span>
				</div>   
                            
                            <div class="row">
                                 <div class="col-md-6" >
                                <div class="form-group">
                                <label for="text">State</label><span style="color:red">*</span>
                                <select name="recruiter_state" id="state" class="form-control" required>
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
                                </div>
                                <div class="col-md-6">                            
                                <div class="form-group">
                                <label for="text">City</label><span style="color:red">*</span>
                                <select required class="form-control" id="city_name" name="recruiter_city">
                                  <option value="">-- Select City --</option>
                                 <?php 
                                            foreach($cities as $row)
                                            { 
                                              echo '<option value="'.$row->city_name.'">'.$row->city_name.'</option>';
                                            }
                                            ?>
                                  <!--<option id="city_names"></option>-->
                                </select>
                                </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-6" >
                            <div class="form-group">
					<label for="text">Pincode</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_pincode" id="pincode" maxlength="6" placeholder="Enter Pincode" type="text" value="<?php echo set_value('recruiter_pincode'); ?>" /><span class="text-danger" id="pincode_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_pincode'); ?></span>
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
                            </div>
				<?php echo form_close(); ?>
				<?php echo $this->session->flashdata('msg'); ?>
			</div>
        </div>
</div>
    
			</div>
                  
              

  

</body>
</html>