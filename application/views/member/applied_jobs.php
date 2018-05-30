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
    var id;
    
    function delete_job(id)
    {
        $("#delete_job").attr('onclick','remove_job('+id+')');
        $("#myModal").modal('show')
    }
    
    function remove_job(id)
    {
        
      
       
        url = '<?php echo base_url() ?>member/Jobs/remove_job/'+id;
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(json)
            {

                location.reload();

                          
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    
    }
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Applied Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Applied Jobs</li>
      </ol>
        
       
    </section>
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
        
      

           
               <div class="container">
                   <?php if(isset($jobs)){
                       foreach($jobs as $job){?>
                   <div class="row">
                       <div class="col-md-offset-2 col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                          <a href="#" onclick="job_info()"> <span class="job_name"><?php echo $job->job_title;?></span></a><br>
                          <span class="comp_name"><?php echo $job->company_name;?></span>
                           </div>
                               <div class="col-md-2"><button type="button" onclick="delete_job('<?php echo $job->job_id; ?>')" class="btn btn-danger btn-sm">Remove</button></div>
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
<!--                            <div class="col-md-1">
                                <input class="star" type="checkbox" title="save job" name="save">
                              </div>  -->
                              <div class="col-md-3" style="padding-top: 10px;">
                                  <span class="fa fa-inr"></span> <?php echo $job->job_salary;?>
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By </span> <a href="#"><img src='<?php if(file_exists($job->recruiter_profile_pic)){echo base_url().$job->recruiter_profile_pic;}else{ echo base_url()."profile_pic/avatar.png";}?>' width="20px" height="20px"> <?php echo ucfirst(strtolower($job->recruiter_fname))." ".ucfirst(strtolower($job->recruiter_lname));?></a>
                              </div>
                               <div class="col-md-3 col-md-offset-1" style="padding-top: 10px;">
                                  <span class="skill">Applied On: <?php echo $job->apply_at; ?></span>
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
 
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#ABB2B9" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong><span class='delete_name'></span></strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this Job <span class='delete_name'></span> ?</label> <br>
                  <button class="btn btn-default" id="delete_job">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>