     <style>
         #content_body{
             padding:15px;
         }
         
                .job_info{
    color:#707B7C;
}
     </style>
   
     <script>
         CKEDITOR.disableAutoInline = true;
         $(document).ready(function(){
               $("#editor1").ckeditor();
      
         });
       
     </script>
         <div class="row" id="content_body">        
		<div class="container">
                    <div class="col-md-9 col-md-offset-1">
		    			  <form action="" id="skill_form">  
            <!--<img src="" height="50px" weight="150px"><br>-->                                   
          <h4 style="color:#5DADE2" id="job_title"><?php echo $job_info->job_title; ?></h4>
          <h5 id="company_name" class="job_info"><?php echo $job_info->company_name; ?></h5>
        
          <div class="row">
              <div class="col-md-3">
          <label >Qualification </label>
          </div>: <span id="eligibility" class="job_info"> <?php echo  $job_info->job_education; ?> </span><br>
          </div>
          <?php if(!empty($job_info->job_skill_name)){?>
              <div class="row">
          <div class="col-md-3">        
          <label > Skills </label>
          </div>: <span id="skills" class="job_info"> <?php echo $job_info->job_skill_name; ?>  </span><br>
                    </div>
          <?php }?>

          <div class="row">
              <div class="col-md-3">
          <label >Experience </label>
          </div>: <span id="experience" class="job_info"> <?php echo $job_info->job_experience; ?> </span><br>
                    </div>
         <?php if(!empty($job_info->job_salary)){?>
          <div class="row">
              <div class="col-md-3">
          <label >Salary </label>
          </div>: <span id="salary" class="job_info"> <?php echo $job_info->job_salary; ?> </span><br>
                    </div>
           <?php }?>

          <div class="row">
              <div class="col-md-3">
          <label>Location </label>
          </div>: <span id="location" class="job_info"> <?php echo $job_info->job_city; ?> </span><br>
                    </div>

          <div class="row">
            <div class="col-md-3">
               <label>Job Description </label>
               </div><div class="col-md-9">
               : <span id="job_desc" class="job_info"> <?php echo $job_info->job_description; ?> </span>
                   </div>
                             </div>

           <br><br>
           <div class="row">
               <div class="col-md-3">
          <label> Website </label>
          </div>
               : <span id="website" class="job_info"><a href="http://<?php echo $job_info->company_website;?>" target="_blank"><?php echo $job_info->company_website;?></a></span><br> 
                    </div>

           
                          </form>
                         <div class="pull-right"><button type='button' data-toggle="modal" data-target="#myModal" class='btn btn-primary' onclick='apply("<?php echo $job_info->job_id; ?>","login_to_apply")'>Login to Apply</button>
                     <!--<button type='button' class='btn btn-info' onclick='apply("<?php echo $job_info->job_id; ?>"."register_to_apply")'>Register to Apply</button>-->
                   
                    </div>
                    </div>
                   
                    </div> <br><br>
             
           
		
        </div>
        
     <script>
         var id;
         var method;
         $("#show_otp_box").hide();
        function apply(id,method)
         {
             
//             alert(method);
             $("#job_id").val(id);

         }
         </script>