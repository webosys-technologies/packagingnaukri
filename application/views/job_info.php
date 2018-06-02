     <style>
         #content_body{
             padding:15px;
         }
         
                .job_info{
    color:#707B7C;
}
     </style>
       
        
         <div class="row" id="content_body">        
		<div class="container">
                    <div class="col-md-9 col-md-offset-1">
		    			  <form action="" id="skill_form">  
            <!--<img src="" height="50px" weight="150px"><br>-->                                   
          <h4 style="color:#5DADE2" id="job_title"><?php echo $job_info->job_title; ?></h4>
          <h5 id="company_name" class="job_info"><?php echo $job_info->company_name; ?></h5>
          <div class="row">
              <div class="col-md-3">
          <label >Eligibility </label>
          </div>: <span id="eligibility" class="job_info"> <?php echo  $job_info->job_education; ?> </span><br>
          </div>
              <div class="row">
          <div class="col-md-3">        
          <label >Job Skills </label>
          </div>: <span id="skills" class="job_info">  </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Experience </label>
          </div>: <span id="experience" class="job_info"> <?php echo $job_info->job_experience; ?> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Salary </label>
          </div>: <span id="salary" class="job_info"> <?php echo $job_info->job_salary; ?> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label>Job Location </label>
          </div>: <span id="location" class="job_info"> <?php echo $job_info->job_city; ?> </span><br>
                    </div>

          <div class="row">
            <div class="col-md-3">
               <label>Job Profile </label>
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

            <div class="row">
              <div class="col-md-3">
          <label> Contact </label>
          </div>: <span id="contact" class="job_info"> <?php echo $job_info->company_contact; ?> </span><br>     
                    </div>
           
          <div class="row">
              <div class="col-md-3">
          <label> Email </label>
          </div>: <span id="email" class="job_info"> <?php echo $job_info->company_email; ?> </span><br>     
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label> Address </label>
          </div>: <span id="address" class="job_info"> <?php echo $job_info->company_address; ?> </span><br> 
          </div>
                   
                          </form>
                         <div class="pull-right"><button type='button' class='btn btn-primary' onclick='apply("<?php echo $job_info->job_id; ?>")'>Apply</button>
                    <!--<button type='button' class='btn btn-danger' onclick='close()'>Close</button>-->
                    </div>
                    </div>
                   
                    </div> <br><br>
             
           
		
        </div>
        
        