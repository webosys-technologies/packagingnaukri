<style>
     #modal_dialog{
     width: 700px;
      overflow-y: initial !important
}
#job_body{
  height: 500px;
  overflow-y: auto;
}
    
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
   
     function job_info(id)
    {
              
           $.ajax({
       url : "<?php echo site_url('index.php/member/Jobs/job_info')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
           
             $("#company_name").html(data.company_name);
                     $("#job_title").html(data.job_title);
////             $("#j_desc").html();
              $("#job_desc").html(data.job_description);
               $("#eligibility").html(data.job_education);
////                $("#skills").html();
                 $("#salary").html(data.job_salary);
                 $("#experience").html(data.job_experience);
                 $("#location").html(data.job_city);
                 $("#website").html('<a target="_blank" href="http://'+data.company_website+'">'+data.company_website+'</a>');
                 $("#email").html(data.company_email);
                 $("#contact").html(data.company_contact);
                 $("#address").html(data.company_address);
          $("#job_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
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
          <li><a href="<?php echo base_url();?>member/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
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

 
           
               <div class="container" >
                   <?php if(isset($saved)){
                       foreach($saved as $save){
                           
                               $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($save->job_created_at);
            $interval = $datetime1->diff($datetime2);
            if($interval->format('%y')=='0' && $interval->format('%m')=='0' )
            {
                $post=$interval->format('%d day'); 
            }
             if($interval->format('%y')=='0' && $interval->format('%m')!='0')
            {
                $post=$interval->format('%m month %d day'); 
            }
             if($interval->format('%y')!='0')
            {
                $post=$interval->format('%y yrs %m month %d day'); 
            }
                           
                           ?>
                   <div class="row">
                       <div class="col-md-offset-1 col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                               <img src="<?php echo base_url().$save->company_logo;?>" width="120px" height="40px"><br>
                          <a href="#" onclick='job_info("<?php echo $save->job_id;?>")'> <span class="job_name"><?php echo $save->job_title;?></span></a><br>
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
                              <div class="col-md-3" style="padding-top: 10px;">
                                  <span class="fa fa-inr"></span> <?php echo $save->job_salary;?>
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By </span><a href="#"><img src='<?php if(file_exists($save->recruiter_profile_pic)){echo base_url().$save->recruiter_profile_pic;}else{ echo base_url()."profile_pic/avatar.png";}?>' width="20px" height="20px"> <?php echo ucfirst(strtolower($save->recruiter_fname))." ".ucfirst(strtolower($save->recruiter_lname));?></a>
                              </div>
                               <div class="col-md-3" style="padding-top: 10px;">
                                  <span class="skill"><?php echo $post;?> ago</span>
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
 
            
 
 <div class="modal fade" id="job_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Company Details</h4></center>
        </div>
        <div class="modal-body" id="skill_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="skill_form">  
            <!--<img src="" height="50px" weight="150px"><br>-->                                   
          <h4 style="color:#5DADE2" id="job_title"></h4>
          <h5 id="company_name" class="job_info"></h5>
          <div class="row">
              <div class="col-md-3">
          <label >Eligibility </label>
          </div>: <span id="eligibility" class="job_info"> </span><br>
          </div>
              <div class="row">
          <div class="col-md-3">        
          <label >Job Skills </label>
          </div>: <span id="skills" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Experience </label>
          </div>: <span id="experience" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Salary </label>
          </div>: <span id="salary" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label>Job Location </label>
          </div>: <span id="location" class="job_info"></span><br>
                    </div>

          <div class="row">
            <div class="col-md-3">
               <label>Job Profile </label>
               </div><div class="">
               : <span id="job_desc" class="job_info"></span>
                   </div>
                             </div>

           <br><br>
           <div class="row">
               <div class="col-md-3">
          <label> Website </label>
          </div>
               : <span id="website" class="job_info"> </span><br> 
                    </div>

            <div class="row">
              <div class="col-md-3">
          <label> Contact </label>
          </div>: <span id="contact" class="job_info"> </span><br>     
                    </div>
           
          <div class="row">
              <div class="col-md-3">
          <label> Email </label>
          </div>: <span id="email" class="job_info"> </span><br>     
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label> Address </label>
          </div>: <span id="address" class="job_info"></span><br> 
          </div>
                   
                          </form>
    			</div>                              			
    		</div>         
<!--    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="skill_update" onclick="apply()" id="job_apply">Apply</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>-->
    </div>             
        </div>        
      </div>
       