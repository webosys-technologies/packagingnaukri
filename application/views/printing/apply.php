   <style>
       #label{
           padding:12px;
       }
           </style>
           <script>
                 function member_login() {  
      
        //var val= member_log_validation();
       
        if(true)
        {
       var data = new FormData(document.getElementById("apply_job"));
       var url = "<?php echo site_url('index.php/Home/apply_job/loginMe')?>";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(data)
        {  var success;
            var email_error;
            var pass_error;
            var val_error;
           
                 
          
            
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
                                        <input class="form-control" name="title" id="fname" minlength="2" required="" type="text"  value="<?php if(isset($job_title)){ echo $job_title->job_title; } ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                            
                                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Mobile No:</label><span style="color:red">*</span>
					<input class="form-control" name="mobile" id="fname" minlength="2" required="" type="text"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                                
                                 <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
					<label for="name">Upload CV:</label><span style="color:red">*</span>
					<input class="form-control" name="resume" id="fname" minlength="2" required="" type="file"  value="<?php echo set_value('recruiter_fname'); ?>" /><span class="text-danger" id="name_err"></span>
					<span class="text-danger"><?php echo form_error('recruiter_fname'); ?></span>
				</div>
                        </div>
                  </div>
                                                          
                    <input type="submit" class="btn btn-success" name="submit">
                    </div>
                       
                       </form>
                   
                </div>
              
              
              <br>
           
		
        </div>   <br>
               </div>
           
           
         
           
		
        </div>
        
        
        