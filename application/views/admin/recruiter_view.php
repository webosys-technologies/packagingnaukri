
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
}/*
.modal-backdrop {background: none;}*/

#delete_modal{
            background: none;
                margin:150px;
               
            }
</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        <i class="fa fa-users"></i><strong> Recruiters Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Recruiters</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    <section class="content">
        <div class="row">
         <div class="col-md-4">
    <button class="btn btn-primary" id="bt" onclick="add_recruiter()" data-toggle="tooltip" data-placement="bottom" title="Add Recruiter"><i class="glyphicon glyphicon-plus"></i> Add Recruiters</button>
<!--    <button class="btn btn-success" onclick="add_recruiter()"><i class="glyphicon glyphicon-plus"></i> Payment</button>-->
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
          <th>STATUS</th>
          <!--class=" badge bg-yellow"-->

          <th style="width:75px;">ACTION
          </th>
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

                  <button class="btn btn-success btn-xs" onclick="edit_recruiter(<?php echo $res->recruiter_id; ?>)" data-toggle="tooltip" data-placement="bottom" title="Edit Recruiter"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger btn-xs" onclick="delete_menu(<?php echo $res->recruiter_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Recruiter"><i class="glyphicon glyphicon-trash"></i></button>
                 
                  <button class="btn btn-warning btn-xs" onclick="view_recruiter(<?php echo $res->recruiter_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Recruiter"><i class="fa fa-eye"></i></button>

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
      
      
        $(".state").change(function() {
        
   var el = $(this) ;
              $(".city").html("");


var state=el.val();

        if(state)
        {
            
      $.ajax({
       url : "<?php echo site_url('index.php/Home/show_cities')?>/" + state,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
          
              $(".city").append('<option value="'+ row.city_name +'">' + row.city_name+'</option>');
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


function view_recruiter(id)
    {
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Recruiter/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#fname').html(data.recruiter_fname);
            $('#lname').html(data.recruiter_lname); 
            $('#email').html(data.recruiter_email);
            $('#mobile').html(data.recruiter_mobile);
            $('#gender').html(data.recruiter_gender);
            $('#address').html(data.recruiter_address);
            $('#city').html(data.recruiter_city);
            $('#pincode').html(data.recruiter_pincode);
            $('#state').html(data.recruiter_state);

            if(data.recruiter_profile_pic)
            {
            $('#profile_pic').attr("src", "<?php  echo base_url();?>"+data.recruiter_profile_pic);
             }
             else
             {
               $('#profile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
            // $('#remove_pic').attr("onclick","remove_profile_pic("+data.student_id+")");
            // $('#sdob').html(data.student_dob);
            // $('#susername').html(data.student_username);
            // $('#spassword').html(data.student_password);
            // $('#sstudent_last_education').html(data.student_last_education);
            // $('#saddress').html(data.student_address);  
            // $('#scity').html(data.student_city);
            // $('#sstate').html(data.student_state);
            // $('#spincode').html(data.student_pincode);
            
            $('#viewModal').modal('show'); // show bootstrap modal when complete loaded
            $('#viewtitle').text('Recruiter Details'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }

    function add_recruiter()
    {
        save_method="add";     
        $('#form')[0].reset();
        $("#title").text("Edit Recruiter");
        $('#myModal').modal('show');
    }
    function edit_recruiter(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
           //Ajax Load data from ajax
            $(".city").html("");
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Recruiter/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="recruiter_id"]').val(data.recruiter_id);
            $('[name="fname"]').val(data.recruiter_fname);
            $('[name="lname"]').val(data.recruiter_lname);
            $('[name="email"]').val(data.recruiter_email);
            $('[name="mobile"]').val(data.recruiter_mobile);
            $('[name="password"]').val(data.recruiter_password);
            $('[name="address"]').val(data.recruiter_address);
            $('[name="state"]').val(data.recruiter_state);
            $('[name="city"]').val(data.recruiter_city);
            $('[name="status"]').val(data.recruiter_status);
//            $("#city").val(data.recruiter_city);
            $(".city").append('<option value="'+ data.recruiter_city +'">' + data.recruiter_city+'</option>');
            $('[name="state"]').val(data.recruiter_state);
          
            
            $("#title").text("Edit Recruiter");
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
      
      var data=new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {
        url = "<?php echo site_url('index.php/admin/Recruiter/recruiter_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Recruiter/recruiter_update')?>";
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
               if(json.status)
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
    
    function delete_recruiter(id)
    {
         $.ajax({
            url : "<?php echo base_url()?>admin/Recruiter/recruiter_delete/"+id,
            type: "GET",
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
        $("#delete_recruiter").attr('onclick','delete_recruiter('+id+')');  
             
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body" id="modal_body">
         
            
          	
    		<div class="panel panel-default">
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" name="recruiter_id" value="">
    				 <div class="row">
                                <div class="col-md-6  ">                                
                                    <div class="form-group">
                                        <label for="fname">First Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="First Name" class="form-control required"  name="fname" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Last Name" class="form-control"   name="lname" maxlength="128" required>
                                      <span class="text-danger" id="lname_err"></span>
                                    </div>
                                    <span style="color:red" id="text_field2_error"></span>
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-6  ">                                
                                    <div class="form-group">
                                        <label for="fname">Email Id<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Email Id" class="form-control required"  name="email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile No<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Mobile No" class="form-control required"  name="mobile" maxlength="128" required>
                                        <span class="text-danger" id="mobile_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                               </div>
                                    
                                    <div class="row">
                                      <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Address<span style="color: red">*</span></label>
                                        <textarea name="address" class="form-control"  required></textarea>
                                      </div>
                                        </div>
                                        </div>
                                          
                           <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-label">State</label><span style="color: red">*</span>
                              <select name="state"  class="form-control state" required>
                                    <option value="">-- Select State --</option>
                                    <?php if(isset($states)){
                                        foreach($states as $state)
                                        { ?>
                                           <option value="<?php echo $state->city_state; ?>"><?php echo $state->city_state; ?></option>
                                       <?php }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">City</label><span style="color: red">*</span>
                        <select name="city"  class="form-control city" required>
                                    <option value="">-- Select City --</option>                                   
                             </select>
                        <span class="text-danger"><?php echo form_error('city'); ?></span>
                        </div>
                    </div>
                    </div>
                      <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Password<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Password" class="form-control required"  name="password" maxlength="128" required>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Status<span style="color:red">*</span></label>
                                        <select name="status" class="form-control" >
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                    <span style="color:red" id="text_field1_error"></span>
                                    
                                </div>
                                
                            </div>
                          </form>    
    				
    			</div>
                   
                            </div>
    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary"  onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   

<!--                      View model      -->

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="viewtitle" class="modal-title"></h4></center>
        </div>
        <div class="modal-body" id="modal_body">
         
            
            
        <div class="">
          
          <div class="panel-body">
            <form method="post" action="" id="form">
              <div>
                <img src="" id="profile_pic" width="100px" height="100px">
              </div>
              <br>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Name</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>
                    <div class="col-md-7">
                      <span id="fname" class="text_color"></span>&nbsp<span class="text_color" id="lname"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Email-Id</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="email" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Mobile</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="mobile" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Gender</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="name" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Address</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="address" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>City</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="city" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Pincode</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="pincode" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>State</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="state" class="text_color"></span>
                    </div>
                  </div>
                </div>
            </form>
            
          </div>
                            </div>
          
        </div>         
       <div class="modal-footer">
             <button type="button" class="btn btn-primary"  onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   

   <!--                   End View Model            -->


<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#ABB2B9" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Recruiter</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this recruiter ?</label> <br>
                  <button class="btn btn-default" id="delete_recruiter">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
