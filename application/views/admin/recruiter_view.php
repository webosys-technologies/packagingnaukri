
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 700px;
      overflow-y: initial !important
}
.modal-body{
  height: 500px;
  overflow-y: auto;
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Recruiters Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Recruiters</li>
      </ol>
    </section><br>
    <section class="content">
        <div class="row">
         <div class="col-md-4">
    <button class="btn btn-primary" onclick="add_student()" data-toggle="tooltip" data-placement="bottom" title="Add Recruiter">      <i class="glyphicon glyphicon-plus"></i> Add Recruiters</button>
<!--    <button class="btn btn-success" onclick="add_student()"><i class="glyphicon glyphicon-plus"></i> Payment</button>-->
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
    <br><br>
<!--    <div class="form-group" style="width:350px" >
            <label for="name">SEARCH</label>
        <input id="myName" class="form-control" type="text" placeholder="Search..." >
        </div>-->
<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>RECRUITER NAME</th>
          <th>EMAIL </th>
          <th>MOBILE</th>
          <th>PASSWORD</th>
          <th>CREATED AT</th>
          <th>STATUS</th
          <!--class=" badge bg-yellow"-->

          <th style="width:125px;">ACTION
          </p></th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($recruiters)) {
            
          
         foreach($recruiters as $res){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->recruiter_id; ?>" class="" ></td> -->
                                        <td><?php echo $res->recruiter_id;?></td>
                                        <td><?php echo $res->recruiter_fname.' '. $res->recruiter_lname; ?></td>
                                        <td><?php echo $res->recruiter_email;?></td>
                                       <td><?php echo $res->recruiter_mobile;?></td>
                                       <td><span class="badge badge-secondary"><?php echo $res->recruiter_password;?></span></td>
                                       <td><?php echo $res->recruiter_created_at;?></td>
                                       <td>
                                           <?php 
                                       if($res->recruiter_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
                  <button class="btn btn-success" onclick="edit_recruiter(<?php echo $res->recruiter_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="Edit Recruiter"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_recruiter(<?php echo $res->recruiter_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Recruiter"><i class="glyphicon glyphicon-trash"></i></button>
                  <!--<button type="button" class="btn btn-info" onclick="view_recruiter(<?php echo $res->recruiter_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="View Recruiter"><i class="glyphicon glyphicon-eye-open"></i></button>-->

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


function view_recruiter(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/recruiter/Student/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#sfname').html(data.student_fname);
            $('#slname').html(data.student_lname); 
            $('#scourse_name').html(data.course_name);
            $('#semail').html(data.student_email);
            $('#smobile').html(data.student_mobile);
            $('#sgender').html(data.student_gender);
            $('#saddmission_month').html(data.student_payment_date);
            $('#scourse_end_date').html(data.student_course_end_date);
            $('#slast_education').html(data.student_last_education);
            if(data.student_profile_pic)
            {
            $('#sprofile_pic').attr("src", "<?php  echo base_url();?>"+data.student_profile_pic);
             }
             else
             {
               $('#sprofile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
            $('#remove_pic').attr("onclick","remove_profile_pic("+data.student_id+")");
            $('#sdob').html(data.student_dob);
            $('#susername').html(data.student_username);
            $('#spassword').html(data.student_password);
            $('#sstudent_last_education').html(data.student_last_education);
            $('#saddress').html(data.student_address);  
            $('#scity').html(data.student_city);
            $('#sstate').html(data.student_state);
            $('#spincode').html(data.student_pincode);
            
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }

    function add_student()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Recruiters'); // Set Title to Bootstrap modal title
    }

    function edit_recruiter(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Recruiters/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
//            $("#append_city").remove();     
            $('[name="recruiter_id"]').val(data.recruiter_id);
            $('[name="recruiter_fname"]').val(data.recruiter_fname);
            $('[name="recruiter_name"]').val(data.recruiter_name);
            $('[name="recruiter_lname"]').val(data.recruiter_lname);
            $('[name="recruiter_email"]').val(data.recruiter_email);
            $('[name="recruiter_mobile"]').val(data.recruiter_mobile);
            $('[name="recruiter_gender"]').val(data.recruiter_gender);
            $('[name="recruiter_dob"]').val(data.recruiter_dob);
            $('[name="recruiter_address"]').val(data.recruiter_address);  
            $('[name="recruiter_password"]').val(data.recruiter_password);
             $('[name="status"]').val(data.recruiter_status);
            $('[name="recruiter_cpassword"]').val(data.recruiter_password);
            $('[name="recruiter_city"]').val(data.recruiter_city);
//             $("#recruiter_city").append('<option value="'+ data.recruiter_city +'" id="append_city">' + data.recruiter_city + '</option>');
            $('[name="recruiter_state"]').val(data.recruiter_state);
            $('[name="recruiter_pincode"]').val(data.recruiter_pincode);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Recruiters'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax 1');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
        url = "<?php echo site_url('index.php/admin/Recruiters/recruiter_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Recruiters/recruiter_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                if(data.status)
                {
               
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
                 }
                 else
                 {
                      alert("Failed to Save.");
                 }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_recruiter(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Recruiters/recruiter_delete')?>/"+id,
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


   function show_password() {
  
    var x =$("#password").prop('readonly');
    if(x == true)
     {
         
        $("#password").prop('readonly',false);
    }
    else
    {
        
        $("#password").prop('readonly',true);
   }
   }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <recruiter><h3 class="modal-title">Recruiter Form</h3></recruiter>
      </div>
      <div class="modal-body form">
        <form action="#" name="form_student" id="form" class="form-horizontal">
          <input type="hidden" value="" name="student_id"/>
          <input type="hidden" value="" name="recruiter_id"/>

          <div class="box-body">
                           
                            <div class="row">
                                <div class="form-group">
                            <div class="col-md-5 col-md-offset-1">
                                
					<label for="name">First Name</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_fname" id="fname" placeholder="First Name" required="" type="text"  value="" /><span class="text-danger" id="fname_err" style="text-transform:uppercase"></span>
					
				
                             </div>
                          <div class="col-md-5 ">
				
					<label for="name">Last Name</label><span style="color:red">*</span>
                                        <input class="form-control" name="recruiter_lname" id="lname" required="" placeholder="Last Name" type="text" value=""><span class="text-danger" id="lname_err" style="text-transform:uppercase"></span>
			</div>
                        </div>
                             </div>
                            
                            
                    <div class="row">
                        <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                                <label for="name">Recruiter Name</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_name" id="recruiter_name" required="" placeholder="Enter Recruiter Name" type="text" value="" style="text-transform:uppercase" />
                                         <span class="text-danger" id="recruiter_name_err"></span>
                   				
                    </div>
                     <div class="col-md-5">
				
				
					<label for="email">Email ID</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_email" id="email" required="" placeholder="Email-ID" type="text" value="" />
                                        <span class="text-danger" id="email_err"></span>
                          	</div>
                    </div>
                    </div>
                            <div class="row">
                                 <div class="form-group"> 
                            <div class="col-md-5 col-md-offset-1" >
                                 	<label for="mobile">Mobile</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_mobile" id="mobile" required="" minlength="10" maxlength="11" placeholder="Enter Mobile Number" type="text" value="" />
                    <span class="text-danger" id="mobile_err"></span>			
				
                                </div>
                                <div class="col-md-5">
                            <label for="subject">Password<span style="color:red">*</span><input type="checkbox" name="ch" id="chkpass" onclick="show_password()" ></label>
                              <input class="form-control" name="recruiter_password" value="" id="password" required="" minlength="8" placeholder="Password" type="text" readonly="true" />
                                <span class="text-danger" id="password_err"></span>
          
                                 </div>
                                </div>
                                     </div>
                            
                            <div class="row">
                                <div class="form-group">
                                <div class="col-md-5 col-md-offset-1">
                                
                                <label for="text">Gender</label><span style="color:red">*</span>
                                <select name="recruiter_gender" required="" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                </select>
                                </div>
                               
                             
                                <div class="col-md-5">                          
                               
                                  
                                <label for="dob">DOB</label><span style="color:red">*</span>
				<input class="form-control required digits" name="recruiter_dob" type="Date" value="" />
				
                                  
                                    </div>
                                </div>
                            </div>
                                               
                            
                            
                                <div class="form-group">
                                  <div class="col-md-10 col-md-offset-1">
					<label for="text">Address</label><span style="color:red">*</span>
                                        <textarea class="form-control" name="recruiter_address"   rows="4" cols="50" value="">
                                        </textarea>
                    </div>                     
				</div>   
                            
                            <div class="row">
                                 <div class="col-md-5 col-md-offset-1" >
                                <div class="form-group">
                                <label for="text">State</label><span style="color:red">*</span>
                                <select name="recruiter_state" id="state" class="form-control">
                                    <option value="">-- Select State --</option>
                                  <option value="Maharashtra">Maharashtra</option>
                                </select>
                                </div>
                                </div>
                                <div class="col-md-5 ">                            
                                <div class="form-group">
                                <label for="text">City</label><span style="color:red">*</span>
                                <select class="form-control" id="city_name" name="recruiter_city">
                                  <option value="">-- Select City --</option>
                                 <?php 
                                            foreach($cities as $row)
                                            { 
                                              echo '<option value="'.$row->city_name.'">'.$row->city_name.'</option>';
                                            }
                                            ?>
                                  <!--<option id="city_names"></option>-->
                                </select>
                                </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                             <div class="form-group">
                                 <div class="col-md-5 col-md-offset-1" >
					<label for="text">Pincode</label><span style="color:red">*</span>
					<input class="form-control" name="recruiter_pincode" id="pincode" maxlength="6" placeholder="Enter Pincode" type="text" value="" />
                                        <span class="text-danger" id="pincode_err"></span>
					
                            </div>
                               
                
                                  <div class="col-md-5">
              <label class=" col-md-6">Status</label>
                     <select name="status" class="form-control">
                      <option value="1">Active</option>
                      <option value="0">Not Active</option>
                  </select>
              
            </div>
                       </div>
                            </div>                       
                        </div><!-- /.box-body -->
    
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal -->
  
  
    <div class="modal fade" id="modal_form2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <recruiter> <h3 class="modal-title">Course Form</h3></recruiter>
      </div>
         <form action="#" name="form_student" id="form2" class="form-horizontal">
      <div class="modal-body form">
       
         
          <input type="hidden" value="" name="recruiter_id"/>

          <div class="box-body">
                            
              
              
              <div class="row">
                
                  <div class="col-md-3 col-md-offset-1"  >
                      <!--<img src="<?php echo base_url(); ?><?php if (!empty($res->student_profile_pic)){echo $res->student_profile_pic;} else{echo "profile_pic/avatar.png";}?>" class="avatar img-responsive"  width="100px" height="100px">-->
                      <img id='sprofile_pic' src='' width="100px" hieght="100px" >
                  </div><br><br>
                 <button id='remove_pic' value="" onclick="" class="btn btn-danger">Remove Profile Photo</button>
                   
              </div>
            
              <br>
               <div class="row">
                   <div class="col-md-5 col-md-offset-1"> 
                <label for="pincode"> Name :</label><span id="sfname"></span>&nbsp;<span id="slname"></span>
                   </div>
                                   

                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Course :</label><span id="scourse_name"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Admission Month :</label><span id="saddmission_month"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Course End Date :</label><span id="scourse_end_date"></span>
                     </div>
               </div>
              <br>
              
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Username :</label><span id="susername"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Password :</label><span id="spassword"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Email :</label><span id="semail"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Mobile Number :</label><span id="smobile"></span>
                     </div>
               </div>
              
              <br>
               <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Gender :</label><span id="sgender"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">DOB :</label><span id="sdob"></span>
                     </div>
               </div>
              <br>
              <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">Last Education :</label><span id="slast_education"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">Address :</label><span id="saddress"></span>
                     </div>
               </div>
              <br>
              <div class="row">
                   <div class="col-md-5 col-md-offset-1">                                    
                   <label for="pincode">City :</label><span id="scity"></span>                                 
                   </div>
                   
                   <div class="col-md-5">                                   
                    <label for="pincode">State :</label><span id="sstate"></span>
                     </div>
               </div>
              
              
              
                       
        
        
        
        
        
              
              
               </div><!-- /.box-body -->
    
        
          </div>
<!--          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()"  class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>-->
          </form>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div

  </body>
</html>

<script>
    
    </script>