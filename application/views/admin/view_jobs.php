
<style type="text/css">
 .modal fade{
    display: block !important;
}
#modal_dialog{
     width: 700px;
      overflow-y: initial !important
}
#modal_body{
  height: 420px;
  overflow-y: auto;
}
.modal-backdrop {background: none;}

#delete_modal{
            background: none;
                margin:150px;
               
            }
            
   .job_info{
    color:#707B7C;
}


</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Jobs Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Jobs</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    <section class="content">
        <div class="row">

  <!--<button type="button" class="btn btn-primary">Open Modal</button>-->

         <div class="col-md-4">
    <!--<button class="btn btn-primary"  onclick="add_job()" data-toggle="tooltip" data-placement="bottom" title="Add Job">      <i class="glyphicon glyphicon-plus"></i> Add Job</button>-->
<button type="button"  id="bt" class="btn btn-primary" onclick="add_job()"><i></i>Add Job</button>
    </div>
    <div class="col-md-6">
         <?php
        $this->load->helper('form');
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            
        <div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?> 
  </div>
        <?php }?>
             
              <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>           
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?> 
  </div>
        <?php }?>
             
             
       
        </div>
        </div>
    <br>
   
<div class="table-responsive">
    <table id="table_id" class="table table-bordered table-hover" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff">
           <th>ID</th>
                                            <th>Job Title</th>
                                            <th>Company Name</th>
                                            <th>Applicants</th>
                                            <th>Qualification</th>
                                            <th>Experience</th>
                                            <th>Location</th>
					    <th>Posted Date</th>
                                            <th>Status</th>
                                            <th style="width:75px;">Action</th>
         
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($jobs)) {
            
          
         foreach($jobs as $job){
            
             ?>
                                                         <tr <?php if($job->job_status==0) {?> style="color:#99A3A4; "<?php }?> >   <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->user_id; ?>" class="" ></td> --> 
                                        <td><?php echo $job->job_id?></td>
                                            <td><?php echo $job->job_title?></td>
                                            <td><?php echo $job->company_name?></td>
                                            <td style="cursor:pointer; :hover{background-color: red;}"  onclick="applicants(<?php echo $job->job_id ?>)">
                                                <?php echo count($this->Applied_jobs_model->get_by_job_id($job->job_id))." Members";?></td>
                                            <td><?php echo $job->job_education?></td>
                                            <td><?php echo $job->job_experience?></td>
                                            <td><?php echo $job->job_city?></td>
				            <td><?php echo $job->job_created_at?></td>
                                            <td><?php 
                                       if($job->job_status==1)
                                       {
                                           echo "Open";
                                       }
                                       else 
                                       {
                                           echo '<b style="color:red;">Closed</b>';
                                       }
                                       ?></td>
                                           
                <td> <?php if($job->job_status==0){?><button class="btn btn-success btn-xs" onclick="edit_job(<?php echo $job->job_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Job" disabled ><i class="glyphicon glyphicon-pencil"></i></button> <?php }else{?>
                <button class="btn btn-success btn-xs" onclick="edit_job(<?php echo $job->job_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Job"><i class="glyphicon glyphicon-pencil"></i></button><?php }?>
                    <button class="btn btn-info btn-xs" onclick="job_info(<?php echo $job->job_id;?>)" data-toggle="tooltip" data-placement="bottom" title="View Job"><i class="fa fa-eye"></i></button>              
                    <button class="btn btn-danger btn-xs" onclick="delete_menu(<?php echo $job->job_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Job"><i class="glyphicon glyphicon-trash"></i></button>
                 
                             </td>
              </tr>
          <?php }}?>



      </tbody>

    </table>
    </div>
    
    
    
</section>
  </div>

  <script type="text/javascript">
  $(document).ready( function () {   
 
 
  $("#user_type").change(function() {
        
   var el = $(this) ;
              $("#city").html("");


var user_type=el.val();

        if(user_type)
        {
            
      $.ajax({
       url : "<?php echo site_url('index.php/admin/Jobs/show_cities')?>/" + user_type,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
          
              $("#city").append('<option value="'+ row.city_name +'">' + row.city_name+'</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
     }
    
 });  
  
 
 
 
      $('#table_id').DataTable();
  } );

    $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
    var save_method; //for save method string
    var table;
    var id;




   function applicants(id)
{
    window.location='<?php echo base_url()?>admin/Jobs/applied_members/'+id;
}

    function add_job()
    {  
        save_method="add";        
       $('#form')[0].reset();
        $("#title").text("Add Job");
        $('#myModal').modal('show');
        $("#loc_err").html("");
        $("#exp_err").html("");
        $("#comp_err").html("");
        $("#job_err").html("");
        $("#qua_err").html("");

    }

    function edit_job(id)
    {    
        $("#loc_err").html("");
        $("#exp_err").html("");
        $("#comp_err").html("");
        $("#job_err").html("");
        $("#qua_err").html("");
       
      
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Jobs/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {     
          
            $('[name="job_id"]').val(data.job_id);
            $('[name="jobtitle"]').val(data.job_title);
            $('[name="jobdesc"]').val(data.job_description);
            $('[name="joblocation"]').val(data.job_city);
            $('[name="jobtype"]').val(data.job_type);
            $('[name="jobsalary"]').val(data.job_salary);
            $('[name="company"]').val(data.company_id);
            $('[name="qualification"]').val(data.job_education);
            $('[name="experience"]').val(data.job_experience);
            $('[name="status"]').val(data.job_status);
            $('[name="skill"]').val(data.job_skill_name);
           
                        
           $("#title").text("Edit Job");
           $('#myModal').modal('show');
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }



    function save()
    {
        
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {         
        url = "<?php echo site_url('index.php/admin/Jobs/job_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Jobs/job_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,   
            data: data,
            dataType: "JSON",
            success: function(json)
            { 
                if(json.loc_err)
                {
                     $("#loc_err").html(json.loc_err);
                }else{
                     $("#loc_err").html("");
                }
                if(json.exp_err)
                {
                     $("#exp_err").html(json.exp_err);
                }else{
                     $("#exp_err").html("");
                }
                if(json.comp_err)
                {
                     $("#comp_err").html(json.comp_err);
                }else{
                    $("#comp_err").html("");
                }
                if(json.qua_err)
                {
                    $("#qua_err").html(json.qua_err);
                }else{
                    $("#qua_err").html("");
                }
                if(json.job_err)
                {
                    $("#job_err").html(json.job_err);
                }else{
                    $("#job_err").html("");
                }
                
             if(json.success)
             {
              location.reload();// for reload a page
             }  
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    }

    function delete_job(id)
    {
   
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Jobs/job_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error deleting data');
            }
        });

    }
 function delete_menu(id)
    {
        $("#delete_modal").modal('show');
        $("#delete_job").attr('onclick','delete_job('+id+')');  
             
    }


    function job_info(id)
    {
              
           $.ajax({
       url : "<?php echo site_url('index.php/admin/Jobs/job_info')?>/" + id,        
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
                   if(data.company_logo)
            {
                $("#comp_logo").attr('src',"<?php echo base_url();?>"+data.company_logo);
               
            }
                 
             
            
          $("#job_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
       
    }

  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body" id="modal_body">
         
            
          	
    		<!--<div class="panel panel-default">-->
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" value="" name="job_id">
    				 <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label>Job Title: (*)</label>
                                    <input name="jobtitle" class="form-control" placeholder="Job Title" value="">
                                        <span class="text-danger" id="job_err"></span>
                                        
                                    </div>
                                                                       
                                </div>
                                     </div>
                                    <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Company Name: (*)</label>
                                        <select name="company" class="form-control">
                                            <option>-- Select Company --</option>
                                            <?php
                                            if(isset($companies))
                                            {
                                                foreach($companies as $comp)
                                            
                                            {
                                                echo '<option value="'.$comp->company_id.'">'.$comp->company_name.'</option>';
                                            }
                                            }
                                            ?>
                                    </select>
                                      <span class="text-danger" id="comp_err"></span>
                                    </div>
                                   
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label>Qualification: (*)</label>
                                    <input name="qualification" placeholder="Qualification" class="form-control" value="">
                                        <span class="text-danger" id="qua_err"></span>
                                                                               
                                    </div>
                                                                       
                                </div>
                              
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                       <label>Experience: (*)</label>
                                       <input name="experience" placeholder="Experience 0-2 year" class="form-control" value="">
                                        <span class="text-danger" id="exp_err"></span>
                                        
                                    </div>
                                                                      
                                </div>
                                        </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                       <label>Job Description: (*)</label>
                                    <textarea cols="80" id="editor" class="form-control" name="jobdesc" rows="6"></textarea>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>
                                
                            </div>
                                    
                                   
                                    
                                    
                     <div class="row">
                          <div class="col-md-6">
                       <label>Job Location: (*)</label>
                                    <input name="joblocation" placeholder="Job Location" class="form-control" value="">
                        <span class="text-danger" id="loc_err"></span>

                    </div>   
                          <div class="col-md-6">
                       <label>Job Type: (*)</label>
                                    <select name="jobtype" id="job_type" class="form-control" value="">
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Internship">Internship</option>
                                        <option value="Temporary">Temporary</option>                                       
                                    </select>
                        <span class="text-danger" id="gen_err"></span>

                    </div>  
                     </div><br>
                                    
                     <div class="row">
                         
                         <div class="col-md-6">
                       <label>Job Salary: (*)</label>
                                    <input name="jobsalary" placeholder="Job Salary" class="form-control" value="">
                        <span class="text-danger" id="gen_err"></span>

                    </div>  
                        
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Status<span style="color: red">*</span></label>
                                     <select name="status" class="form-control" >
                                            <option value="1">Open</option>
                                            <option value="0">Close</option>
                                        </select>
                                  </div>
                                </div>
                                  
                    </div>
                     <div class="row">                         
                         <div class="col-md-12">
                       <label>Job Skills: (*)</label>
                      <input name="skill" placeholder="Skill Name" id="skill" class="form-control" value="">
                        <span class="text-danger" id="gen_err"></span>

                    </div>  
                         </div>
                             
    				
    			</div>
                    </form>
                            <!--</div>-->
    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary"  onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   



<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#3c8dbc;" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Job</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this job ?</label> <br>
                  <button class="btn btn-default" id="delete_job">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
            <img src="" width="150px" id="comp_logo" height="50px"><br>                             
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