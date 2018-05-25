
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 700px;
      overflow-y: initial !important
}
.modal-body{
  height: 420px;
  overflow-y: auto;
}
td{
    font-family: times;
}
</style>
<script>
function applicants(id)
{
    window.location='<?php echo base_url()?>recruiter/Jobs/applicants/'+id;
}
</script>
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
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                            <th>Action</th>
         
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($jobs)) {
            
          
         foreach($jobs as $job){
             if($job->job_status=='1'){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->user_id; ?>" class="" ></td> --> 
                                        <td><?php echo $job->job_id?></td>
                                            <td><?php echo $job->job_title?></td>
                                            <td><?php echo $job->company_name?></td>
                                            <td style="cursor:pointer;" onclick="applicants(<?php echo $job->job_id ?>)">
                                                <?php echo count($this->Applied_jobs_model->get_by_job_id($job->job_id));?></td>
                                            <td><?php echo $job->job_education?></td>
                                            <td><?php echo $job->job_experience?></td>
                                            <td><?php echo $job->job_city?></td>
                            <td><?php echo $job->job_created_at?></td>
                                           
                <td>  <button class="btn btn-success btn-sm" onclick="edit_job(<?php echo $job->job_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Job"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger btn-sm" onclick="delete_job(<?php echo $job->job_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Job"><i class="glyphicon glyphicon-trash"></i></button>
                             </td>
              </tr>
          <?php }}}?>



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


function view_job(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/Student/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#sfname').html(data.job_title);
            $('#slname').html(data.user_lname); 
            $('#scourse_name').html(data.course_name);
            $('#semail').html(data.user_email);
            $('#smobile').html(data.user_mobile);
            $('#sgender').html(data.user_gender);
            $('#saddmission_month').html(data.user_payment_date);
            $('#scourse_end_date').html(data.user_course_end_date);
            $('#slast_education').html(data.user_last_education);
            if(data.user_profile_pic)
            {
            $('#sprofile_pic').attr("src", "<?php  echo base_url();?>"+data.user_profile_pic);
             }
             else
             {
               $('#sprofile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
            $('#remove_pic').attr("onclick","remove_profile_pic("+data.user_id+")");
            $('#sdob').html(data.user_dob);
            $('#susername').html(data.user_username);
            $('#spassword').html(data.user_password);
            $('#suser_last_education').html(data.user_last_education);
            $('#saddress').html(data.user_address);  
            $('#scity').html(data.user_city);
            $('#suser_type').html(data.user_user_type);
            $('#spincode').html(data.user_pincode);
            
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }

    function add_job()
    {  
        save_method="add";        
       $('#form')[0].reset();
        $("#title").text("Add Job");
        $('#myModal').modal('show');

    }

    function edit_job(id)
    {     
      
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/recruiter/Jobs/ajax_edit/')?>/" + id,
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
        url = "<?php echo site_url('index.php/recruiter/Jobs/job_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/recruiter/Jobs/job_update')?>";
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
               
              
              location.reload();// for reload a page
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    }

    function delete_job(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/recruiter/Jobs/job_delete')?>/"+id,
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
    }



  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body">
         
            
            
            <!--<div class="panel panel-default">-->
                
                <div class="panel-body">
                    <form method="post" action="" id="form">
                                    <input type="hidden" value="" name="job_id">
                     <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label>Job Title: (*)</label>
                                    <input name="jobtitle" class="form-control" placeholder="Job Title" value="">
                                        <span class="text-danger" id="fname_err"></span>
                                        
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
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                   
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-12  ">                                
                                    <div class="form-group">
                                        <label>Qualification: (*)</label>
                                    <input name="qualification" placeholder="Qualification" class="form-control" value="">
                                        <span class="text-danger" id="email_err"></span>
                                        
                                    </div>
                                                                       
                                </div>
                               </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                       <label>Experience: (*)</label>
                                       <input name="experience" placeholder="Experience 0-2 year" class="form-control" value="">
                                        <span class="text-danger" id="mobile_err"></span>
                                        
                                    </div>
                                                                      
                                </div>
                                        </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                       <label>Job Description: (*)</label>
                                    <textarea cols="80" id="editor" class="form-control" name="jobdesc" rows="10"></textarea>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>
                                
                            </div>
                                    
                                   
                                    
                                    
                     <div class="row">
                          <div class="col-md-12">
                       <label>Job Location: (*)</label>
                                    <input name="joblocation" placeholder="Job Location" class="form-control" value="">
                        <span class="text-danger" id="gen_err"></span>

                    </div>         
                    </div>
                                    
                     <div class="row">
                          <div class="col-md-6">
                       <label>Job Type: (*)</label>
                                    <input name="jobtype" placeholder="Full Time/Part Time" class="form-control" value="">
                        <span class="text-danger" id="gen_err"></span>

                    </div>  
                         <div class="col-md-6">
                       <label>Job Salary: (*)</label>
                                    <input name="jobsalary" placeholder="Job Salary" class="form-control" value="">
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
   




