   <style>
       #label{
           padding:12px;
       }
           </style>
         
           
           <script>
          
          
          
          
          var resume;
          var mobile;
          var email;
               
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
       
     
    var job_id;
   function login_to_apply(job_id)
   {
       $("#show_pass_box").hide();
       $("#job_id").val(job_id);
       $("#myModal").modal('show');
//       $(".apply").hide('modal');
       
   }
   
   function otp_to_apply()
   { $("#job_err").html("");
       var data = new FormData(document.getElementById("otp_apply_form"));
       var url = "<?php echo site_url('index.php/Home/apply_job_with_otp')?>";
           
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
           
           if(data.otp_err)
           {
               $("#otp_err").html(data.otp_err);
           }
           
            if(data.success)
            {
                location.reload();
//                $("#mobile_err").html(data.mobile_err);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
          alert('Error...!');
        }
      }); 
   }
   
   function register_to_apply()
   {
       var val=validation();
       if(val)
       {
                  var data = new FormData(document.getElementById("register_to_apply"));
       var url = "<?php echo site_url('index.php/Home/register_to_apply')?>";
           
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
             $("#apply_btn").attr('data-target',"");
             if(data.otp_err)
             {
                 $("#otp_err").html(data.otp_err);
             }
          
            
            if(data.success)
            {
                location.reload();
//                $("#mobile_err").html(data.mobile_err);
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
//          alert('Error...!');
        }
      });
           
       }
       
   }
   
   function validation()
   {
       var fname;
       var lname;
       var location;
       var current;
       var expected;
       var exp;
       var notice;
       
    var number=$("#mobile").val();
      var num_length=number.length;
        if(number!='')
            {                
                if(isNaN(number))
                {
                    
                 mobile=false;                 
                 $("#mobile_err").html("Please Enter Valid Mobile Number");
                }else if(num_length<10 || num_length>11)
                {
                    mobile=false;   
                     $('#mobile_err').html("Mobile no digit should be 10 or 11 digit");
                }else{
                    
                    mobile=true;
                    $("#mobile_err").html("");
                }
            }else{
                 mobile=false;                 
                 $("#mobile_err").html("Please Enter Mobile Number");
             }
             
          if($('[name="location"]').val()!="")
          {
             
              location=true;
              $("#location_err").html("");
          }else{
               location=false;
              $("#location_err").html("Please Enter Location");
          }
          
          if($('[name="current"]').val()!="")
          {
               current=true;
              $("#current_err").html("");
          }else{
               current=false;
              $("#current_err").html("Please Enter Current CTC");
          }
          
                   
          if($('[name="exp"]').val()!="")
          {
               exp=true;
              $("#exp_err").html("");
          }else{
               exp=false;
              $("#exp_err").html("Please Enter Experience");
          }
          
          
          if($('[name="notice"]').val()!="")
          {
              notice=true;
              $("#notice_err").html("");
          }else{
              notice=false;
              $("#notice_err").html("Please Enter Notice Period.");
          }
          
          if($('[name="fname"]').val()!="")
          {
               fname=true;
              $("#fname_err").html("");
          }else{
              fname=false;
              $("#fname_err").html("Please Enter First Name");
          }
           
          if($('[name="lname"]').val()!="")
          {
               lname=true;
              $("#lname_err").html("");
          }else{
               lname=false;
              $("#lname_err").html("Please Enter Last Name");
          }
             
             
             if(mobile==true && fname==true && lname==true && location==true && exp==true && notice==true && current==true)
             {
//                 alert();
                 return true;
             }else{
                 return false;
             }
   }
   
     
               
                 function apply() { 
         $("#job_err").html("");            
     var sEmail=$("#email").val();
     
        if(sEmail!='')
            {  sEmail = $('#email').val();
                  
                   var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                   if (filter.test(sEmail))                    
                    {    
                        
                      $('#email_id_err').html("");
                      email=true;                 
                    }
                    else
                    {   
                        email=false;
                       $('#email_id_err').html("Invalid Email Id"); 
                     }
            }else{
                 
                 $("#email_id_err").html("Please Enter Email ID");
                 email=false;
             }
             
            
      
        if(email==true)
        {
       var data = new FormData(document.getElementById("apply_job"));
       var url = "<?php echo site_url('index.php/Home/apply_job')?>";
           
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
             $("#apply_btn").attr('data-target',"");
           
           if(data.email_id_err)
           {
               $('[name="member_email"]').val(sEmail);
               $('#apply_job_id').val(data.job_id);
               $("#email_id_err").html(data.email_id_err);
                $("#apply_btn").attr('data-target',"#register_modal");
               $("#register_modal").modal('show');
           }else{
                $("#email_id_err").html("");
           }
           
           if(data.email)
           {
               $("#job_id").val(data.job_id);
               $("#apply_btn").attr('data-target',"#myModal");
               $("#myModal").modal('show');
           }else{
           }
           
            if(data.job_err)
            {
                $("#job_err").html(data.job_err);
            }else{
                $("#job_err").html("");
            }
            
            if(data.success)
            {
                location.reload();
//                $("#mobile_err").html(data.mobile_err);
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
        
        <div class="row" id="label">
        <div class="container">        
		<div class="col-md-9 col-md-offset">
		<h3 style="color:#02B645;"><b>Apply</b></h3>
			</div> 
        </div>
            </div>
           <div style="background:white">
          <div class="container">    
              <div class="row">
		<div class="col-md-9 col-md-offset">
		<h5 style="color:#02B645;">Home <i class="fas fa-angle-double-right"></i> apply</h5>
                <h3 style="color:#02B645;">Upload Resume</h3>
		</div>            
              </div>
              
          </div>
               
            <br>
               
               
              
              
            
<div class="container">
<?php if($this->session->flashdata('success')){
    echo "<span class=text-success>".$this->session->flashdata('succecc')."</span>";
}
?>
     <form action="" id="apply_job">
     <input type="hidden" name="job_id" value="<?php if(isset($job_title)){ echo $job_title->job_id; }?>">
	 <div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">Job_title:</label><span style="color:red">*</span>
                                        <input class="form-control" name="title" id="title" minlength="2" required="" type="text"  value="<?php if(isset($job_title)){ echo $job_title->job_title; } ?>" readonly="" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="job_err"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                            
                               
                        
    <div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">Email</label><span style="color:red">*</span>
					<input class="form-control" name="email" id="email" required="" type="text"  value="" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="email_id_err"></span>
				</div>
                        </div>
    </div>
                                
<!--                                 <div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
					<label for="name">Upload CV:</label><span style="color:red">*</span>
					<input class="form-control" name="resume" id="resume" minlength="2" required="" type="file"  value="" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="resume_err"></span>
				</div>
                        </div>
                                 </div>-->
     <br><br>
    <div class="row">
        <div class="col-md-6">
            
    <button type="button" onclick="apply()" id="apply_btn" data-toggle="modal"  class="btn btn-success btn-sm" name="submit">Apply</button>
                                &nbsp;<button type="button" data-toggle="modal" data-target="#myModal" onclick="login_to_apply(<?php echo $job_title->job_id; ?>)" class="btn btn-sm" style="background:#778899;color:white;" name="log">Login To Apply</button>   
    </div>
        </div>
     </form>
</div>
    <br>
    <br>
    
                    
              
        </div>   
           
            <!-- Bootstrap modal -->
  <div class="modal fade" id="otp_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Enter OTP To Apply Job</h3></center>
       
      </div>
      <div class="modal-body form">
        <form id="otp_apply_form" method="" action="">
          
                        <div class="form-group">
                            <label class="control-label col-md-3">Mobile Number</label>
                            <div class="col-md-7">
                                 <span style="color:green;">OTP is successfully send to this Mobile Number </span><br>
                                 <input type="text" name="otpmobile" id="otpmobile" readonly="" value="<?php echo $this->session->flashdata('mobile');?>" class="form-control" ><br>
                               <input type="hidden" value="" name="apply_id" id="apply_id">
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label class="control-label col-md-3">Enter OTP<span class="text-danger"> *</span></label>
                            <div class="col-md-7">
                                <input type="text" name="otp" required="" minlength="6" maxlength="6" class="form-control" >
                                <span id="otp_err" class="text-danger"></span>
                            </div>
                        </div>
                        <br><br><br>               
             <center>
                        <button type="button" onclick="otp_to_apply()" id="otp_apply"  class="btn btn-primary">Apply Job</button>
                         
          </center>
                          

          </form>
      
           <br>
         
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal --></div>    
            
            
            
     <!-- Bootstrap modal -->
  <div class="modal fade" id="register_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Register  To Apply</h3></center>
       
      </div>
      <div class="modal-body form">
       <div class="row">
	
		
			<!--<hr style="border-top: 1px solid #ccc;">-->
		
			     <form action="" id="register_to_apply">
                    <div class="col-md-12">
                                <!--<h4 style="color:#02B645;">Upload Resume</h4>-->
                                <!--<hr style="border-top: 1px solid #ccc;">-->
                                <input type="hidden" value="" id="member_email" name="member_email">
                                <input type="hidden" name="apply_job_id" id="apply_job_id"  value="">
                   <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">First Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="First Name" class="form-control required"  name="fname" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Last Name" class="form-control"   name="lname" maxlength="128" required>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                    <span style="color:red" id="text_field2_error"></span>
                                </div>
                            </div>
                             
                            
                                <div class="row">
                     <div class="col-md-6  ">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Mobile No" class="form-control required" id="mobile"  name="mobile" maxlength="11" required>
                                        <span class="text-danger" id="mobile_err"></span>                                        
                                    </div>
                                    
                                    
                     </div>                
                   
                  </div>
                          
                                <div class="row">
                    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Total Work Experience<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Total Work Experience" class="form-control required"  name="exp" required>
                                        <span class="text-danger" id="exp_err"></span>
                                        
                                    </div>
                                                     
                                </div>  
                    <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Current Location<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Current Location" value="" class="form-control required"  name="location" required>
                                        <span class="text-danger" id="location_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>
                   </div>
                              <div class="row">  
                               <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Current CTC (in Laks)<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Current CTC" class="form-control required" value=""  name="current"  required>
                                        <span class="text-danger" id="current_err"></span>
                                        
                                    </div>                                   
                                </div>
                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Expected CTC (in Laks)</label>
                                        <input type="text" placeholder="Expected CTC" class="form-control required"  name="expected"  required>
                                        <span class="text-danger" id="mobile_err"></span>
                                        
                                    </div>                                   
                                </div>
                                  </div>
                                
                                <div class="row">
                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Notice Period<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Notice Period" class="form-control required"  name="notice"  required>
                                        <span class="text-danger" id="notice_err"></span>
                                        
                                    </div>                                   
                                </div>
                                    </div>
                                <div class="row">
                                    <span class="text-success">OTP is successfully send to your Email Address</span>
                                </div>
                                <div class="row">
                                    
                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        
                                        <label for="fname">Enter OTP<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Enter OTP" class="form-control required"  name="otp"  required>
                                        <span class="text-danger" id="notice_err"></span>
                                        
                                    </div>                                   
                                </div>
                                    </div>
                                
                                               
                               
                             
                    </div>
                       
                       </form>
                   
        </div>
    
        </div><!-- /.modal-content -->
        <div class="modal-footer">
             <button type="button" onclick="register_to_apply()" class="btn btn-success btn-sm" name="submit">Apply</button>
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal --></div>     
  </div>
         
           
        