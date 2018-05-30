<style>
    .star {
        /*padding:10px;*/
    visibility:hidden;
    font-size:20px;
    cursor:pointer;
}

.star:before {
  content: "\2606";
   visibility:visible;
}
.star:checked:before {
     content: "\2605";
     color: green;
   
   
}
    
    .shadow {
   
    padding: 14px;
    border: 1px solid #EAEDED;
    box-shadow: 5px 5px 10px #CCD1D1;
}

.text_design{
 border: 2px solid #D5DBDB;
 padding: 5px;
}

.skill{
     color:#707B7C;
     font-size:12px;
     line-height: 3;
}

.description{
     color:#707B7C;
     font-size:12px;
     
     
}

.job_name{
    /*font-family: normal;*/
    color:#2471A3;
    font-size:15px;
    font-weight:bold;
}

.experience{
     color:#707B7C;
      line-height: 1.9;
}

.comp_name{
    /*font-family: normal;*/
    /*color:#2471A3;*/
    font-size:13px;
     line-height: 1.9;
     color:#707B7C;
  
}

a:link, a:visited{    
    text-decoration: none;
}
</style>

<script>
    $(document).ready(function(){
        
        
        
                
       
    });
    var url;
    var data;
 function apply(id)
    {
          $.ajax({
       url : "<?php echo site_url('index.php/member/Jobs/apply_job')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
         location.reload();
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
    }
    
       function job_status(id)
    {    
             
                url="<?php echo base_url();?>member/Jobs/unsave_job/"+id;
            
            
            $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               // alert('Error deleting data');
            }
            
        });
   }
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Saved Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Saved Jobs</li>
      </ol>
        
      
    </section>
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
      
<!--      <div class="shadow">
           <div class="row content">  
               <div class="box-header">
          <h4 style="color:#5DADE2">Walk in for PHP Developer</h4>
          <h5>Webosys Technologies</h5>
          <label>Eligibility :</label><span> BE</span><br>
          <label>Experience :</label><span> 1-2 year</span><br>
          <label>Salary :</label><span> 12000/-</span><br>
          <label>Job Location :</label><span> Pune</span><br>
              
               <label>Company Profile :</label>
               <p> Softebizz technologies is global services in Web Application Development, E-commerce Development, Content Management Systems, Cloud Solution, Software Testing with its global headquarter at Pune, India.<p>
              </div>
           </div>
              </div>-->

 
           
               <div class="container">
                   <?php if(isset($saved)){
                       foreach($saved as $save){?>
                   <div class="row">
                       <div class="col-md-offset-2 col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                          <a href="#" onclick="job_info()"> <span class="job_name"><?php echo $save->job_title;?></span></a><br>
                          <span class="comp_name"><?php echo $save->company_name;?></span>
                           </div>
                               <div class="col-md-2" id='apply_btn<?php echo $save->job_id;?>'><button type="button" onclick="apply(<?php echo $save->job_id;?>)" class="btn btn-warning btn-sm">Apply</button></div>
                           </div>
                          <div class="row" class="">
                              <div class="col-md-2 experience"><i class="fa fa-suitcase" aria-hidden="true"></i> <?php echo $save->job_experience;?>
                              </div>
                              <div class="col-md-8 experience"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $save->job_city;?>
                          </div>
                       </div>
                          <div class="row" class="">
                              <div class="col-md-2 skill">key skills:
                              </div>
                              <div class="col-md-8 skill">PHP,SQL,HTML,CODEIGNITER
                          </div>
                       </div> 
                           <div class="row" class="">
                              <div class="col-md-2 description">Job Description:
                              </div>
                              <div class="col-md-8 description"><?php echo $save->job_description;?>
                          </div>
                       </div> 
                          <div class="row experience" >
                            <div class="col-md-1">
                                <input class="star" id='save<?php echo $save->job_id;?>' onclick='job_status("<?php echo $save->job_id;?>")' type="checkbox" title="Unsave job" name="save">
                              </div>  
                              <div class="col-md-4" style="padding-top: 10px;">
                                  <span class="fa fa-inr"></span> <?php echo $save->job_salary;?>
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By </span><a href="#"><img src='<?php if(file_exists($save->recruiter_profile_pic)){echo base_url().$save->recruiter_profile_pic;}else{ echo base_url()."profile_pic/avatar.png";}?>' width="20px" height="20px"> <?php echo ucfirst(strtolower($save->recruiter_fname))." ".ucfirst(strtolower($save->recruiter_lname));?></a>
                              </div>
                               <div class="col-md-2" style="padding-top: 10px;">
                                  <span class="skill">Few hours ago</span>
                              </div>
                             
                          </div>
                        </div>
                   </div>
              </div>
     </div>
                   <?php } }?>
                    
      </div>
     

    


  </section>


  </div>
 
<?php
    $saved=$this->Saved_jobs_model->get_jobs_by_member($this->session->userdata('member_id'));
    if(isset($saved))
    {
        foreach($saved as $save)
        {
            ?>
    <script>
        
        $("#save<?php echo $save->job_id;?>").attr('checked',true);
 </script>
       <?php
        }
    }
    ?>

 
 <?php
    $applied=$this->Applied_jobs_model->members_applied_job($this->session->userdata('member_id'));
    if(isset($applied))
    {
        foreach($applied as $app)
        {
            ?>
    <script>
        
//        $("#apply_btn<?php echo $app->job_id;?>").hide();
        $("#apply_btn<?php echo $app->job_id;?>").html('<span class="text-success">Applied</span>');
//        $("#apply<?php echo $app->job_id;?>").attr('onclick','btn btn-success btn-sm');
//        $("#apply_stat<?php echo $app->job_id;?>").html('Applied');
        
 </script>
       <?php
        }
    }
    ?>