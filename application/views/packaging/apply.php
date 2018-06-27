   <style>
       #label{
           padding:12px;
       }
           </style>
           <script>
          
          var resume;
          var mobile;
               
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
       
       
   }
               
               
                 function apply() {  
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
             
             if(resume!=true)
             {
              $("#resume_err").html("Please Select File");    
             }
       
        if(mobile==true && resume==true)
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
            if(data.mobile_err)
            {
                $("#mobile_err").html(data.mobile_err);
            }else{
                $("#mobile_err").html("");
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
          alert('Error...!');
        }
      });
      
    }
    }
               </script>
        
        <div class="row" id="label">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h3 style="color:#02B645;"><b>Apply</b></h3>
			</div> 
               
		
        </div>
            </div>
           <div style="background:white">
          <div class="container">    
              <div class="row">
		<div class="col-md-5 col-md-offset-1">
		<h5 style="color:#02B645;">Home <i class="fas fa-angle-double-right"></i> apply</h5>
               
                
               
               
		</div>
            
                  </div>
              
                          
               <div class="row">
                   <form action="" id="apply_job">
                    <div class="col-md-5 col-md-offset-1">
                                <h4 style="color:#02B645;">Upload Resume</h4>
                                <!--<hr style="border-top: 1px solid #ccc;">-->
                                <input type="hidden" name="job_id" value="<?php if(isset($job_title)){ echo $job_title->job_id; }?>">
                    <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Job_title:</label><span style="color:red">*</span>
                                        <input class="form-control" name="title" id="title" minlength="2" required="" type="text"  value="<?php if(isset($job_title)){ echo $job_title->job_title; } ?>" readonly="" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="job_err"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                            
                                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Mobile No:</label><span style="color:red">*</span>
					<input class="form-control" name="mobile" id="mobile" minlength="2" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="mobile_err"></span>
				</div>
                        </div>
                  </div>
                                
                                 <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Upload CV:</label><span style="color:red">*</span>
					<input class="form-control" name="resume" id="resume" minlength="2" required="" type="file"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger" id="resume_err"></span>
				</div>
                        </div>
                  </div>
                                     <br>                     
                                <button type="button" onclick="apply()" class="btn btn-success btn-sm" name="submit">Apply</button>
                                &nbsp;<button type="button" data-toggle="modal" data-target="#myModal" onclick="login_to_apply(<?php echo $job_title->job_id; ?>)" class="btn btn-sm" style="background:#778899;color:white;" name="log">Login To Apply</button>
                    </div>
                       
                       </form>
                   
                </div>
              
              
              <br>
           
		
        </div>   <br>
               </div>
           
           
         
           
		
        </div>
        
        
        