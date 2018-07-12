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
<script>
    
    var resume;
     $(document).ready(function(){
       
        
         $('#resume').change(function(e){
            var fileName = e.target.files[0].name;
            
            var ext=fileName.split('.').pop();
            
           
            if(ext=="pdf" || ext=="doc" || ext=="docx" || ext=="rtf")
            {     
                resume=true;
 
             $("#resume_err").html("");
            }else{
                  resume=false;
                   $("#resume").val("");
                 $("#resume_err").html("This Type of file is not allowed"); 
                 
            }
             });
             
    
             
        });
    
    
    
    
    </script>
<div class="container">
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php echo $this->session->flashdata('verify_msg'); ?>
	</div>
   
</div>
    <br>
    <br>
    
       <?php       
        $success = $this->session->flashdata('signup_success');
        if($success)
        { ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
    

    <div class="row" >
    	<div class="col-md-8 col-md-offset-2" >
    		<div class="panel panel-default" >
    			<div class="panel-heading" style="background-color: #0461A8;color: white">
    				<h3 ><strong> Member Registration</strong></h3>
    				
    			</div>
    			<div class="panel-body">
    				<form method="post" id="form" action="<?php echo base_url('member/Index/register'); ?>" enctype="multipart/form-data">
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
                     <div class="row">
                         <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label" >Password</label><span style="color:red">*</span>
                        <input class="form-control" name="password" id="password" required="" placeholder="Password" type="password" value="<?php echo set_value('password'); ?>" />
                        <span class="text-danger" id="password_err"></span>
                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                    </div>
                             </div>
                         <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label" >Confirm Password</label><span style="color:red">*</span>
                        <input class="form-control" name="confirm_password" id="password" required="" placeholder="Confirm Password" type="password" value="<?php echo set_value('confirm_password'); ?>" />
                        <span class="text-danger" id="password_err"></span>
                        <span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
                    </div>
                         </div>
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
                                    
                            <div class="row">                                    
                                    <div class="col-md-6">
                                    <label for="fname">Total Work Experience<span style="color:red">*</span></label>
                        <div class="row"><div class="col-md-6">                                
                                    <div class="form-group">
                                       <!--<label></label>-->
                                       <select name="min_exp" id="min_exp" required="required" class="form-control">
                                           <option value="">select year</option>
                                            <script>
                               var exp = 0;
                               var exp_end = 30;
                                var options = "";
                                for(var dim = exp ; dim <=exp_end; dim++){
//                                    alert(dim);
                            $("#min_exp").append('<option value="'+dim+'">'+ dim +' year</option>');
//                             $("#thsalary").append('<option value="'+dim+'">'+ dim +'</option>');
                              }
                               </script>
                                           </select>
                                        <span class="text-danger" id="min_err"></span>
                                        
                                    </div>
                                                                      
                                </div>     
                                     <div class="col-md-6">                                
                                    <div class="form-group">
                                       <!--<label></label>-->
                                       <select name="max_exp"  id="max_exp" class="form-control">
                                           <option value="0">select month</option>
                                            <script>
                               var exp = 1;
                               var exp_end = 11;
                                var options = "";
                                for(var dim = exp ; dim <=exp_end; dim++){
//                                    alert(dim);
                            $("#max_exp").append('<option value="'+dim+'">'+ dim +' month</option>');
//                             $("#thsalary").append('<option value="'+dim+'">'+ dim +'</option>');
                              }
                               </script>
                                           </select>
                                        
                                        
                                    </div>
                                                                     
                                </div> 
                            <span class="text-danger" id="exp_err"></span> 
                            </div>
                            </div>
                                    

                    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Current Location<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Current Location" value="" class="form-control required"  name="location" required="required">
                                        <span class="text-danger" id="location_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>
                   </div>
                                
                                
                                
                                
                              <div class="row">  
                                  <div class="col-md-6">
                                       <label>Current CTC (in Laks)<span style="color:red">*</span></label>
                                      <div class="row">
                                     
                                  <div class="col-md-6">
                        <!--<label class="form-label">Salary</label> <span style="font-size:12px;">(per anual)</span>-->
                            <!--<label class="form-label">MIN Salary</label><span style="font-size:11px;">(per anual)</span>-->
                         <select type="text" name="min_salary"  id="min_salary" class="form-control required" required="required">
                             <option value="0">0 Lac</option>
                           <script>
                               var sal = 1;
                               var sal_end = 99;
                                var options = "";
                                for(var dim = sal ; dim <=sal_end; dim++){

                            $("#min_salary").append('<option value="'+dim+'">'+ dim +' Lac</option>');

                              }
                               </script>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                                        
                    <div class="col-md-6" style="top-padding:15px"> 
                        <!--<label class="form-label">MAX Salary</label><span style="font-size:11px;">(per anual)</span>-->
                       <select type="text" id="max_salary" name="max_salary" class="form-control">
                           <option value="0">0 Thousand</option>
                           <option value="10">10 Thousand</option>
                           <option value="20">20 Thousand</option>
                           <option value="30">30 Thousand</option>
                           <option value="40">40 Thousand</option>
                           <option value="50">50 Thousand</option>
                           <option value="60">60 Thousand</option>
                           <option value="70">70 Thousand</option>
                           <option value="80">80 Thousand</option>
                           <option value="90">90 Thousand</option>

                        </select>
                        
                    </div> </div>
                                      <span class="text-danger" id="current_err"></span>
                                      </div>
                                  
                                  
                      <div class="col-md-6">
                                      
                                      <label>Expected CTC (in Laks)</label>
                                      <div class="row">
                                  <div class="col-md-6">
                        <!--<label class="form-label">Salary</label> <span style="font-size:12px;">(per anual)</span>-->
                            <!--<label class="form-label">MIN Salary</label><span style="font-size:11px;">(per anual)</span>-->
                         <select type="text" name="expected_min_salary" id="expected_min_salary" class="form-control">
                             <option value="0">0 Lac</option>
                           <script>
                               var sal = 1;
                               var sal_end = 99;
                                var options = "";
                                for(var dim = sal ; dim <=sal_end; dim++){

                            $("#expected_min_salary").append('<option value="'+dim+'">'+ dim +' Lac</option>');

                              }
                               </script>
                        </select>
                        <span class="text-danger"></span>
                    </div>
                                        
                    <div class="col-md-6" style="top-padding:15px"> 
                        <!--<label class="form-label">MAX Salary</label><span style="font-size:11px;">(per anual)</span>-->
                       <select type="text" id="expected_max_salary" name="expected_max_salary" class="form-control">
                           <option value="0">0 Thousand</option>
                           <option value="10">10 Thousand</option>
                           <option value="20">20 Thousand</option>
                           <option value="30">30 Thousand</option>
                           <option value="40">40 Thousand</option>
                           <option value="50">50 Thousand</option>
                           <option value="60">60 Thousand</option>
                           <option value="70">70 Thousand</option>
                           <option value="80">80 Thousand</option>
                           <option value="90">90 Thousand</option>

                        </select>
                        
                    </div> </div>
                                      <span class="text-danger" id="current_err"></span>
                                      </div>              

                                  </div>
                                <br>
                                <div class="row">
                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Notice Period<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Notice Period" class="form-control required"  name="notice"  required="required">
                                        <span class="text-danger" id="notice_err"></span>
                                        
                                    </div>                                   
                                </div>
                                    
                                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">Upload CV:</label><span style="color:red">*</span>
					<input class="form-control" name="resume" id="resume"  required="required" type="file"  value="" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="resume_err"></span>
				</div>
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
                                        { ?>
                                           <option value="<?php echo $country->countryID; ?>"><?php echo $country->countryName; ?></option>
                                       <?php }
                                    }?>
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('country'); ?></span>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label><span style="color: red">*</span>
                        <select name="state" id="state" class="form-control" required>
                                    <option value="">-- Select state --</option>
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
    $('#city').html(" ");
              $("#city").append('<option value="">--Select City--</option>');
    
var state= $('#state option:selected').val();
//alert(state);          
      $.ajax({
       url : "<?php echo site_url('index.php/home/show_cities')?>/" + state,        
       type: "GET",        
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {
            //alert(row.city_name);           
              $("#city").append('<option value="'+ row.cityName +'">' + row.cityName + '</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
       //  alert('Error...!');
       }
     });      
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