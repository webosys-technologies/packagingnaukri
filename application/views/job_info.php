     <style>
         #content_body{
             margin-top: 15px;
             margin-bottom: 15px;
             padding:15px;
             border-style:solid; 
             border-color: #ccc;
             border-width: 1px;
             box-shadow: 5px 5px 10px #CCD1D1;
             background:white;
             line-height: 15px;
             /*font-family:georgia,serif;*/
             height:500px;
              }
         
                .job_info{
                /*color:#707B7C;*/
                    }
     </style>
   
     <script>
         CKEDITOR.disableAutoInline = true;
         $(document).ready(function(){
               $("#editor1").ckeditor();
      
         });
       
     </script>
         <div class="row" style="background:#F2F3F4;" >        
		<div class="container">
                    <div class="col-md-9 col-xs-12  col-md-offset-1" id="content_body">
		    			  <form action="" id="skill_form">  
            <?php if(isset($job_info->company_logo)){?><img src="<?php echo base_url().$job_info->company_logo;?>" height="50px" width="150px"><?php } ?>                                  
          <h4 style="color:#02B645;" id="job_title"><?php echo $job_info->job_title; ?></h4>
          <h5 id="company_name" class="job_info"><?php echo $job_info->company_name; ?></h5>
        
          <div class="row">
              <div class="col-md-3 col-xs-3">
          <label >Qualification </label>
          </div><div class="col-md-9 col-xs-9"> :<span id="eligibility" class="job_info"> <?php echo  $job_info->job_education; ?> </span></div><br>
          </div>
          <?php if(!empty($job_info->job_skill_name)){?>
              <div class="row">
          <div class="col-md-3 col-xs-3">        
          <label > Skills </label>
          </div><div class="col-md-9 col-xs-9">: <span id="skills" class="job_info"> <?php echo $job_info->job_skill_name; ?>  </span></div><br>
                    </div>
          <?php }?>

          <div class="row">
              <div class="col-md-3 col-xs-3">
          <label >Experience </label>
          </div><div class="col-md-9 col-xs-9">: <span id="experience" class="job_info"> <?php echo $job_info->job_experience; ?> </span></div><br>
                    </div>
         <?php if(!empty($job_info->job_salary)){
            $sal=explode(".",$job_info->job_salary);
            if($sal[0]!=0 && !empty($sal[0])){
                
                $salary=$sal[0]." Lac ".$sal[1]." Thousand ";
            }else{
                 $salary=$sal[1]." Thousand ";
            }
?>
          
          <div class="row">
              <div class="col-md-3 col-xs-3">
          <label >Salary </label>
          </div><div class="col-md-9 col-xs-9">: <span id="salary" class="job_info"> <?php echo $salary;?> </span></div><br>
                    </div>
           <?php }?>

          <div class="row">
              <div class="col-md-3 col-xs-3">
          <label>Location </label>
          </div><div class="col-md-9 col-xs-9">: <span id="location" class="job_info"> <?php echo $job_info->job_city; ?> </span></div><br>
                    </div>

           <script>
//               $("#job_desc").text('');
               
           </script>
          
          <div class="row">
            <div class="col-md-3 col-xs-3">
               <label>Job Description </label>
               </div>
               <div class="col-md-9 col-xs-9">: <span id="job_desc">  <?php echo $job_info->job_description; ?></span> </div>                 
                             </div>

           
           <div class="row">
               <div class="col-md-3 col-xs-3">
          <label> Website </label>
          </div>
         <div class="col-md-9 col-xs-9">    : <span id="website" class="job_info"><a href="http://<?php echo $job_info->company_website;?>" target="_blank"><?php echo $job_info->company_website;?></a></span></div><br> 
         </div>

           
                          </form>
                         <div class="pull-right"><button type='button' data-toggle="modal" data-target="#myModal" class='btn btn-primary btn-sm' onclick='apply("<?php echo $job_info->job_id; ?>","login_to_apply")'>Login to Apply</button>
                     <!--<button type='button' class='btn btn-info' onclick='apply("<?php echo $job_info->job_id; ?>"."register_to_apply")'>Register to Apply</button>-->
                   
                    </div>
                    </div>
                   
                    </div> 
             
           
		
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