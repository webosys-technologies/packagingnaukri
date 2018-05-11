
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
    <!--<button class="btn btn-primary"  onclick="add_job()" data-toggle="tooltip" data-placement="bottom" title="Add User">      <i class="glyphicon glyphicon-plus"></i> Add User</button>-->
<button type="button"  id="bt" class="btn btn-primary" onclick="add_job()"><i></i>Add User</button>
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
                                            <td><?php echo $job->job_education?></td>
                                            <td><?php echo $job->job_experience?></td>
                                            <td><?php echo $job->job_city?></td>
				            <td><?php echo $job->job_created_at?></td>
                                           
                <td>  <button class="btn btn-success" onclick="edit_job(<?php echo $job->job_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Job"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_job(<?php echo $job->job_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Job"><i class="glyphicon glyphicon-trash"></i></button>
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
       url : "<?php echo site_url('index.php/admin/Users/show_cities')?>/" + user_type,        
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
         alert('Error...!');
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
            $('#sfname').html(data.user_fname);
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
            alert('Error get data from ajax 1');
        }
    });
    }

    function add_job()
    {  
        save_method="add";        
       $('#form')[0].reset();
        $("#title").text("Add User");
        $('#myModal').modal('show');

    }

    function edit_job(id)
    {     
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Users/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
       
            $("#append_city").remove();     
            $('[name="user_id"]').val(data.user_id);
            $('[name="fname"]').val(data.user_fname);
            $('[name="lname"]').val(data.user_lname);
            $('[name="email"]').val(data.user_email);
            $('[name="mobile"]').val(data.user_mobile);
            $('[name="password"]').val(data.user_password);
            $('[name="status"]').val(data.user_status);
            $('[name="user_type"]').val(data.user_type);
            $('#gender').val(data.user_gender);
                        
           $("#title").text("Edit User");
           $('#myModal').modal('show');
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }



    function save()
    {
        
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {         
        url = "<?php echo site_url('index.php/admin/Users/user_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Users/user_update')?>";
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
                alert('Error adding / update data');
            }
        });
    }

    function delete_job(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Users/user_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }



  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body">
         
            
          	
    		<!--<div class="panel panel-default">-->
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" value="" name="user_id">
    				 <div class="row">
                                <div class="col-md-6  ">                                
                                    <div class="form-group">
                                        <label for="fname">First Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="First Name" class="form-control required" id="fname" name="fname" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Last Name" class="form-control" id="lname"  name="lname" maxlength="128" required>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                    <span style="color:red" id="text_field2_error"></span>
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-12  ">                                
                                    <div class="form-group">
                                        <label for="fname">Email Id<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Email Id" class="form-control required" id="email" name="email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                               </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile No<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Mobile No" class="form-control required" id="mobile" name="mobile" maxlength="128" required>
                                        <span class="text-danger" id="mobile_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                        </div>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="fname">Password<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Password" class="form-control required" id="password" name="password" maxlength="128" required>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                
                            </div>
                                    
                                   
                                    
                                    
                     <div class="row">
                          <div class="col-md-6">
                        <label class="form-label">Gender</label><span style="color: red">*</span>
                        <select name="gender" id="gender" class="form-control" required>
                                    <option value="">-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>                                                                   
                        </select>
                        <span class="text-danger" id="gen_err"></span>

                    </div>
                         
                         
                    <div class="col-md-6">
                        <label class="form-label">Type</label><span style="color: red">*</span>
                        <input type="text" value="" placeholder="Admin/Staff" name="user_type" class="form-control">
                        <span class="text-danger"><?php echo form_error('user_type'); ?></span>

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
   




