Home | Packaging Naukri</title>
              
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
    
 <header class="header" id="header">
  <div class="container">
  <nav class="navbar navbar-default navbar-fixed-top" id="nav_header">
  <div class="container-fluid"  style="background:#002863">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>profile_pic/naukri_logo.png" width="200px" height="50px"></a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
        <li><a href="recruiter">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Post Your Resume</a></li>
         <li><a href="#">Post Your Requirement</a></li>
          <li><a href="#">Contact Us</a></li>
                    
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
<!--      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>  
  </div> 
</nav>
  </div>
   
</header>   
    
    

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
                            <h3>Recruiter Registration</h3>
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
					<label for="name">Center Name</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_name" id="recruiter_name" minlength="2"  required="" placeholder="Enter Center Name" type="text" value="<?php echo set_value('recruiter_name'); ?>" />
                    <span class="text-danger" id="recruiter_name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_name'); ?></span>
				</div>
                    </div>
                     <div class="col-md-6">
				
				<div class="form-group">
					<label for="email">Email ID</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_email" id="email" required="" placeholder="Email-ID" type="text" value="<?php echo set_value('recruiter_email'); ?>" />
                    <span class="text-danger" id="email_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_email'); ?></span>
				</div>
                    </div>
                    </div>
                            <div class="row">
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