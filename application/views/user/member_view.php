
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

</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Members Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Members</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    <section class="content">
        <div class="row">

  <!--<button type="button" class="btn btn-primary">Open Modal</button>-->

         <div class="col-md-4">
    <!--<button class="btn btn-primary"  onclick="add_member()" data-toggle="tooltip" data-placement="bottom" title="Add Member">      <i class="glyphicon glyphicon-plus"></i> Add Member</button>-->
<button type="button"  id="bt" class="btn btn-primary" onclick="add_member()"><i></i>Add Member</button>
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
          <th>NAME</th>
          <th>EMAIL</th>
          <th>MOBILE</th>
          <th>CITY</th>
          <th>CREATED AT</th>
          <th>STATUS</th>

          <th style="width:125px;">ACTION
          </p></th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($members)) {
            
          
         foreach($members as $res){
             if($res->member_status=='1'){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->member_id; ?>" class="" ></td> --> 
                                        <td><?php echo $res->member_id;?></td>
                                        <td><?php echo $res->member_fname.' '. $res->member_lname; ?></td>
                                        <td><?php echo $res->member_email;?></td>
                                       <td><?php echo $res->member_mobile;?></td>
                                       <td><?php echo $res->member_city;?></td>
                                       <td><?php echo $res->member_created_at;?></td>
                                       <td>
                                           <?php 
                                       if($res->member_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
                  <button class="btn btn-success" onclick="edit_member(<?php echo $res->member_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Member"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_menu(<?php echo $res->member_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Member"><i class="glyphicon glyphicon-trash"></i></button>
                 

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
 
 
  $(".state").change(function() {
        
   var el = $(this) ;
              $(".city").html("");


var state=el.val();

        if(state)
        {
            
      $.ajax({
       url : "<?php echo site_url('index.php/user/Members/show_cities')?>/" + state,        
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
    var id;


function view_member(id)
    {
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/member/Student/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
            $('#fname').html(data.member_fname);
            $('#lname').html(data.member_lname); 
            $('#email').html(data.member_email);
            $('#mobile').html(data.member_mobile);
            $('#gender').html(data.member_gender);
            $('#address').html(data.member_address);
            $('#city').html(data.member_city);
            $('#pincode').html(data.member_pincode);
            $('#state').html(data.member_state);
            $('#experience').html(data.member_experience);
            $('#salary').html(data.member_anual_salary);
            if(data.member_profile_pic)
            {
              alert('having');
            $('#profile_pic').attr("src", "<?php  echo base_url();?>/profile_pic"+data.member_profile_pic);
             }
             else
             {
              alert('blank');
               $('#profile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
            // $('#remove_pic').attr("onclick","remove_profile_pic("+data.member_id+")");
            // $('#sdob').html(data.member_dob);
            // $('#susername').html(data.member_username);
            // $('#spassword').html(data.member_password);
            // $('#smember_last_education').html(data.member_last_education);
            // $('#saddress').html(data.member_address);  
            // $('#scity').html(data.member_city);
            // $('#sstate').html(data.member_state);
            // $('#spincode').html(data.member_pincode);
            
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }

    function add_member()
    {  
        save_method="add";        
       $('#form')[0].reset();
        $("#title").text("Add Member");
        $('#myModal').modal('show');
//        $("#bt").attr("data-toggle","modal");
//        $("#bt").attr("data-target","#myModal");
         
    }

    function edit_member(id)
    {     
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
      $('#city').html("");
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/Members/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
       
            $("#append_city").remove();     
            $('[name="member_id"]').val(data.member_id);
            $('[name="fname"]').val(data.member_fname);
            $('[name="lname"]').val(data.member_lname);
            $('[name="email"]').val(data.member_email);
            $('[name="mobile"]').val(data.member_mobile);
            $('[name="password"]').val(data.member_password);
            $('[name="status"]').val(data.member_status);
            $('.city').append('<option value="'+data.member_city+'">'+data.member_city+'</option>');
            $('[name="state"]').val(data.member_state);
            $('[name="address"]').val(data.member_address);
            
                        
           $("#title").text("Edit Member");
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
        url = "<?php echo site_url('index.php/user/Members/member_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/user/Members/member_update')?>";
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

    function delete_member(id)
    {
    
          $.ajax({
            url : "<?php echo site_url('index.php/user/Members/member_delete')?>/"+id,
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
        $("#delete_member").attr('onclick','delete_member('+id+')');  
             
    }


  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body" id="modal_body">
         
            
          	
    		<div class="panel panel-default">
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" value="" name="member_id">
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
                                              <textarea name="address" class="form-control" required></textarea>
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
                                    <label>Status<span style="color: red">*</span></label>
                                     <select name="status" class="form-control" >
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                  </div>
                                </div>
                                
                            </div>
                    </form>
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
                      <label>DOB</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>
                    <div class="col-md-7">
                      <span id="dob" class="text_color"></span>
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
                      <label>Marital Status</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="marital" class="text_color"></span>
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
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Experience</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="experience" class="text_color"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Anual Salary</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="salary" class="text_color"></span>
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
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Member</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this member ?</label> <br>
                  <button class="btn btn-default" id="delete_member">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

