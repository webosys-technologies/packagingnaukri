<style>
      #modal_dialog{
     width: 700px;
      overflow-y: initial !important
}
#job_body{
  /*height: 500px;*/
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

.job_info{
    color:#707B7C;
}

a:link, a:visited{    
    text-decoration: none;
}

#cont{
    padding-left: 0px;
}

@media (max-width:800px){
    #modal_dialog{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:768px){
    #modal_dialog{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:320px){
    #modal_dialog{
     width: 100%;
      overflow-y: initial !important
}
}
</style>

<script>
    $(document).ready(function(){
      
        $(".description").text(function(index, currentText) {
    return currentText.substr(0, 200);
//    $(".description").html("....");


});

  
        <?php
        if(isset($jobs))
        { foreach($jobs as $job)
        {
        ?>
        $('#save<?php echo $job->job_id;?>').click(function(){
            check=$('#save<?php echo $job->job_id;?>').prop('checked');
            id=$('#save<?php echo $job->job_id;?>').val();  
             job_status(check,id);            
         });
        <?php } 
        }?>
    });
    
    
    
    
    var url;
    var data;
    var id;
    var check;
    
    function validateForm()
    {
    if($('#exp').val()!="" && $("#title").val()=="")
    {
       $("#title").focus();
        return false;
    }
    
    if($('#salary').val()!="" && $("#title").val()=="")
    {
       $("#title").focus();
        return false;
    }
    }
    
    
    function job_status(check,id)
    {
       
             if(check)
            {             
                
                url="<?php echo base_url();?>member/Jobs/save_job/"+id;
            }else{
                url="<?php echo base_url();?>member/Jobs/unsave_job/"+id;
            }
            
            $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
//               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               // alert('Error deleting data');
            }
            
        });
   }
   
   function search_title()
    {
        $("#data_list").html("");
       var title=$("#title").val();
    
                       url="<?php echo base_url();?>member/Jobs/search_title/"+title;
        $.ajax({
            url : url,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
            $.each(data,function(i,row)
           {            
               
               $("#data_list").append('<option>'+row.member_email+'</option>');
           }
           );
                
           },
            error: function (jqXHR, textStatus, errorThrown)
            {
               // alert('Error deleting data');
            }
            
        });
    }
    
   
    function job_info(id)
    {
        $("#salary_field").prop('hidden',true);
              
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
               
                                    if(data.job_experience)
                                    {
                                        var exp=data.job_experience.split(".");
                                        if(exp[0]=="0" && exp[1]=="0")
                                        {
                                        $("#experience").html("Not Mentioned");                                       
                                        }else if(exp[0]==exp[1]){
                                              $("#experience").html(exp[0]+" Year");
                                        }else{
                                             $("#experience").html(exp[0]+"-"+exp[1]+" Year" );
                                        }
                                    }
                                   
                          if(data.job_salary)
                                    {
                                        var sal=data.job_salary.split(".");
                                        if(sal[0]=="0" && sal[1]=="0")
                                        {
                                        $("#job_salary").html("Not Mentioned");                                       
                                        }else if(sal[0]==sal[1]){
                                              $("#job_salary").html(sal[0]+" Lac PA");
                                        }else{
                                             $("#job_salary").html(sal[0]+" Lac -"+sal[1]+" Lac PA" );
                                        }
                                    }
                  
                  
//                 $("#salary").html(data.job_salary);
                
                 $("#location").html(data.job_city);
                 $("#website").html('<a target="_blank" href="http://'+data.company_website+'">'+data.company_website+'</a>');
                 $("#email").html(data.company_email);
                 $("#contact").html(data.company_contact);
                 $("#address").html(data.company_address);
                 alert(data.company_logo);
                 if(data.company_logo)
                 {
                  $("#cmp_logo").attr("src","<?php echo base_url();?>"+data.company_logo);
                 }
                 
             
            
          $("#job_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
       
    }
    
     function recruiter_info(id)
    {
        
       
           $.ajax({
       url : "<?php echo site_url('index.php/member/Jobs/recruiter_info')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
          $("#recruiter_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
       
    }
    
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
    
    </script>
    
    
  
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background:#F2F4F4">
      <h1>
        Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>member/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs</li>
      </ol>
        
        <form action="<?php echo base_url();?>member/Jobs/search_jobs" onsubmit="return validateForm()" method="post" id="query_form">
    <div class="form-group form-group-md">   
    <div class="row">
        <div class="col-md-offset-1">
     <datalist id="data_list">  
    <option>PHP</option><option>JAVA</option><option>DOT NET</option>  
     </datalist>
            <input list="data_list" value="<?php echo set_value('title');?>" id="title" onkeyup="search_title()" type="text" placeholder="Skills,Designation,Companies" class="text_design" name="title"><input  type="text" placeholder="Location" name="location" value="<?php echo set_value('location');?>" class="text_design"><input  type="text" placeholder="Experience" id="exp" name="exp" value="<?php echo set_value('exp');?>" class="text_design"><input  type="text" placeholder="Salary" name="salary" value="<?php echo set_value('salary');?>" class="text_design" id="salary"><button type="submit" class="btn btn-info btn-md">Search Job <span class="fa fa-search"></span></button>
       
     </div>
        </div>
    <br>
   
    <div class="row">
        <div class="col-md-offset-1">
    <label>Full Time</label>
    <input type="checkbox" name="full" value="Full Time">&nbsp; &nbsp; &nbsp;
     <label>Part Time</label>
    <input type="checkbox" name="part" value="Part Time">&nbsp; &nbsp; &nbsp;
    <label>Internship</label>
    <input type="checkbox" name="intern" value="Intrernship">&nbsp; &nbsp; &nbsp;
    <label>Temporary</label>
    <input type="checkbox" name="temp" value="Temporary">&nbsp; &nbsp; &nbsp;
        </div></div>
</div>
           
</form>
    </section>
    
    
    
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
  <div id="search_result">
      <div id="no" hidden>
          <center><h1 style="color:#CCD1D1">Search Jobs</h1></center>
      </div>
      
            <?php if(isset($jobs)){
              
             foreach($jobs as $job)
           {
                 $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($job->job_created_at);
            $interval = $datetime1->diff($datetime2);
            if($interval->format('%y')=='0' && $interval->format('%m')=='0' )
            {
                $post=$interval->format('%d days'); 
            }
             if($interval->format('%y')=='0' && $interval->format('%m')!='0')
            {
                $post=$interval->format('%m month %d days'); 
            }
             if($interval->format('%y')!='0')
            {
                $post=$interval->format('%y yrs %m month %d days'); 
            }
           
?>
      <div class="container" class="job_info_div" style="padding-left:50px" id="cont<?php echo $job->job_id;?>">
                   <div class="row">
                       <div class=" col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                               <img src="<?php echo base_url().$job->company_logo;?>" width="120px" height="40px"><br>
                           <span class="job_name"><a href="#cont<?php echo $job->job_id;?>" onclick="job_info(<?php echo $job->job_id;?>)"><?php echo $job->job_title;?></a></span><br>
                          <span class="comp_name"><?php echo $job->company_name;?></span>
                           </div>
                               <div class="col-md-2" id='apply_btn<?php echo $job->job_id;?>'><button type="button" id='apply<?php echo $job->job_id;?>' onclick="apply(<?php echo $job->job_id;?>)" class="btn btn-warning btn-sm"><span id='apply_stat<?php echo $job->job_id;?>'>Apply</span></button></div>
                           </div>
                           
                           <?php if(!empty($job->job_experience))
                                            {
                                            $exp=explode(".",$job->job_experience);
                                           
                                                $experience=$exp[0]."-".$exp[1]." Year";
                                                                                     
                                            }else{
                                                $experience="Not Mentioned";
                                            }
                                            
                                            ?>
                           
                          <div class="row" class="">
                              <div class="col-md-2 experience"><i class="fa fa-suitcase" aria-hidden="true"></i> <?php echo $experience;?>
                              </div>
                              <div class="col-md-8 experience"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $job->job_city;?>
                          </div>
                       </div>
                           
<!--                          <div class="row" class="">
                              <div class="col-md-2 skill">key skills: 
                              </div>
                              <div class="col-md-8 skill"><?php echo  $job->job_skill_name;?>
                          </div>
                       </div> -->
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
                              <div class="col-md-3" style="padding-top: 10px;">
                                  <?php if(isset($job->job_salary)){
                                                               $sal=explode('.', $job->job_salary);
                                                               if($sal[0]!="0" && $sal[1]!='0')
                                                               {
                                                                   $salary=$sal[0]." Laks - ".$sal[1]." Laks ";
                                                               }else{
                                                                    $salary="Not Mentioned";
                                                               }
                                  }?>
                                  <span class="fa fa-inr"> <?php echo $salary;?></span>  /-
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By</span> <a href="#"><img src='<?php if(file_exists($job->recruiter_profile_pic)){echo base_url().$job->recruiter_profile_pic;}else{ echo base_url()."profile_pic/avatar.png";}?>' width="20px" height="20px"> <?php echo ucwords(strtolower($job->recruiter_fname))." ".ucwords(strtolower($job->recruiter_lname));?></a>
                              </div>
                               <div class="col-md-3" style="padding-top: 10px;">
                                   <span class="skill"><?php if(isset($post)){echo  $post;}?> ago</span>
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
            <img id="cmp_logo" src="" height="50px" width="150px"><br>                                   
          <h4 style="color:#5DADE2" id="job_title"></h4>
          <h5 id="company_name" class="job_info"></h5>
          <div class="row">
              <div class="col-md-3">
          <label >Eligibility </label>
          </div>: <span id="eligibility" class="job_info"> </span><br>
          </div>
<!--              <div class="row">
          <div class="col-md-3">        
          <label >Job Skills </label>
          </div>: <span id="skills" class="job_info"> </span><br>
                    </div>-->

          <div class="row">
              <div class="col-md-3">
          <label >Experience </label>
          </div>: <span id="experience" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Salary </label>
          </div>: <span id="job_salary" class="job_info"> </span><br>
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

<!--            <div class="row">
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
          </div>-->
                   
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