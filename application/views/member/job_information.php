

    
    
    
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background:#F2F4F4">
      <h1>
        Recruiter Information
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>member/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">recruiter information</li>
      </ol>
        
           </section>
    
    
    
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
  <div id="search_result">
     
      
      
      
      <div class="shadow">
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
              </div>

 
           <?php if(isset($jobs)){
              
             foreach($jobs as $job)
           {
?>
<div class="container" id="cont">
                   <div class="row">
                       <div class="col-md-offset col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                           <span class="job_name"><a href="#" onclick="job_info(<?php echo $job->job_id;?>)"><?php echo $job->job_title;?></a></span><br>
                          <span class="comp_name"><?php echo $job->company_name;?></span>
                           </div>
                               <div class="col-md-2" id='apply_btn<?php echo $job->job_id;?>'><button type="button" id='apply<?php echo $job->job_id;?>' onclick="apply(<?php echo $job->job_id;?>)" class="btn btn-warning btn-sm"><span id='apply_stat<?php echo $job->job_id;?>'>Apply</span></button></div>
                           </div>
                          <div class="row" class="">
                              <div class="col-md-2 experience"><i class="fa fa-suitcase" aria-hidden="true"></i> <?php echo $job->job_experience;?>
                              </div>
                              <div class="col-md-8 experience"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $job->job_city;?>
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
                               <div class="col-md-8 description"><?php echo $job->job_description;?>
                          </div>
                       </div> 
                          <div class="row experience" >
                            <div class="col-md-1">
                                <input type="checkbox" class="star" id='save<?php echo $job->job_id;?>' value="<?php echo $job->job_id;?>" title="save job" name="save">
                              </div>  
                              <div class="col-md-4" style="padding-top: 10px;">
                                  <span class="fa fa-inr"></span> <?php echo $job->job_salary;?> /-
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By</span> <a href="#"><img src='<?php if(file_exists($job->recruiter_profile_pic)){echo base_url().$job->recruiter_profile_pic;}else{ echo base_url()."profile_pic/avatar.png";}?>' width="20px" height="20px"> <?php echo $job->recruiter_fname." ".$job->recruiter_lname;?></a>
                              </div>
                               <div class="col-md-2" style="padding-top: 10px;">
                                  <span class="skill">Few hours ago</span>
                              </div>
                             
                          </div>
                        </div>
                   </div>
              </div>
     </div>
                    
      </div>
           <?php } }?>
<?php if(isset($error)){?>
<div id="error" hidden>
    <center><h2 style="font-family: times; color:">We Could not find jobs matching your Search..</h2></center>    
</div>
<?php }?>
    <div class="modal fade" id="job_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" class="modal-title">Job Description</h4></center>
        </div>
        <div class="modal-body" id="job_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="desc_form">  
                              
                                
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-warning" value="" id="apply_job"><span id="stat">Apply</span></button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>

<div class="modal fade" id="recruiter_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" class="modal-title">Recruiter Description</h4></center>
        </div>
        <div class="modal-body" id="job_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="desc_form">  
                              
                                
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-warning" value="" id="apply_job"><span id="stat">Apply</span></button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>

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
        
        $("#apply<?php echo $app->job_id;?>").hide();
        $("#apply_btn<?php echo $app->job_id;?>").html('<span class="text-success">Applied</span>');
//        $("#apply<?php echo $app->job_id;?>").attr('onclick','btn btn-success btn-sm');
//        $("#apply_stat<?php echo $app->job_id;?>").html('Applied');
        
 </script>
       <?php
        }
    }
    ?>