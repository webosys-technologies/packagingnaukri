
<style type="text/css">
 .modal fade{
    display: block !important;
}
#modal_dialog{
     width: 800px;
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
        <i class="fa fa-users"></i><strong> University/Institute Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>/user/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage University/Institute</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    <section class="content">
        <div class="row">

  <!--<button type="button" class="btn btn-primary">Open Modal</button>-->

         <div class="col-md-4">
    <!--<button class="btn btn-primary"  onclick="add_member()" data-toggle="tooltip" data-placement="bottom" title="Add Member">      <i class="glyphicon glyphicon-plus"></i> Add Member</button>-->

        <button class="btn btn-primary" onclick="add_insti()" data-toggle="tooltip" data-placement="bottom" title="Add Institute"><i class="glyphicon glyphicon-plus"></i> Add Institute</button>
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
          <th>UNIVERSITY/INSTITUTE</th>
          <th>DESCRIPTION</th>
          <th>STATUS</th>
          <th style="width:125px;">ACTION</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($insti)) {
            
          
         foreach($insti as $res){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->member_id; ?>" class="" ></td> --> 
                                        <td><?php echo $res->institute_id;?></td>
                                        <td><?php echo $res->institute_name;?></td>
                                       <td><?php echo $res->institute_university;?></td>
                                       <td><?php echo $res->institute_description;?></td>
                                       <td>
                                           <?php 
                                       if($res->institute_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td>
                  <button class="btn btn-success" onclick="edit_insti(<?php echo $res->institute_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Member"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger" onclick="delete_menu(<?php echo $res->institute_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Member"><i class="glyphicon glyphicon-trash"></i></button>
                 

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

  $(document).ready( function () {   

  		  var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td class="col-md-11"><div class="form-group"><label class="control-label col-md-3">University / Institute<span style="color:red">*</span></label><div class="col-md-9"><select required class="form-control" name="university[]" ><option value="University"> University</option><option value="Institute">Institute</option></select></div></div><br><br> <div class="form-group"><label class="control-label col-md-3">Name<span style="color:red">*</span></label><div class="col-md-7"><input type="text" name="name[]" class="form-control" ></div></div><br><br><div class="form-group"><label class="control-label col-md-3">Description<span style="color:red">*</span></label><div class="col-md-9"><input type="text"required class="form-control" name="desc[]"/></div></div><br><br><div class="form-group"><label class="control-label col-md-3">Status<span style="color:red">*</span></label><div class="col-md-9"><select name="status[]" class="form-control"><option value="1">Active</option><option value="0">Not Active</option></select></div></div><br><br></td><td class="col-md-1"><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });

      


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


// function view_member(id)
//     {
//       save_method = 'update';
//      $('#form')[0].reset(); // reset form on modals

//       //Ajax Load data from ajax
//       $.ajax({
//         url : "<?php echo site_url('index.php/member/Student/ajax_edit/')?>/" + id,        
//         type: "GET",
               
//         dataType: "JSON",
//         success: function(data)
//         {          
//             $('#sfname').html(data.member_fname);
//             $('#slname').html(data.member_lname); 
//             $('#scourse_name').html(data.course_name);
//             $('#semail').html(data.member_email);
//             $('#smobile').html(data.member_mobile);
//             $('#sgender').html(data.member_gender);
//             $('#saddmission_month').html(data.member_payment_date);
//             $('#scourse_end_date').html(data.member_course_end_date);
//             $('#slast_education').html(data.member_last_education);
//             if(data.member_profile_pic)
//             {
//             $('#sprofile_pic').attr("src", "<?php  echo base_url();?>"+data.member_profile_pic);
//              }
//              else
//              {
//                $('#sprofile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
//              }
//             $('#remove_pic').attr("onclick","remove_profile_pic("+data.member_id+")");
//             $('#sdob').html(data.member_dob);
//             $('#susername').html(data.member_username);
//             $('#spassword').html(data.member_password);
//             $('#smember_last_education').html(data.member_last_education);
//             $('#saddress').html(data.member_address);  
//             $('#scity').html(data.member_city);
//             $('#sstate').html(data.member_state);
//             $('#spincode').html(data.member_pincode);
            
//             $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
//             $('.modal-title').text('Student Data'); // Set title to Bootstrap modal title

//         },
//         error: function (jqXHR, textStatus, errorThrown)
//         {
// //            alert('Error get data from ajax 1');
//         }
//     });
//     }

    function add_insti()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#add_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Institute'); // Set Title to Bootstrap modal title
    }

    function edit_insti(id)
    {     
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
      $('#city').html("");
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/Institute/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
       
            // $("#append_city").remove();     
            $('#id').val(data.institute_id);
            $('#name').val(data.institute_name);
            $('#university').val(data.institute_university);
            $('#desc').val(data.institute_description);
            $('#status').val(data.institute_status);
                        
           $(".modal-title").text("Edit Institute");
           $('#edit_form').modal('show');
            

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
        url = "<?php echo site_url('index.php/user/Institute/insti_add')?>";
        var data = new FormData(document.getElementById("form"));

      }
      else
      {
        url = "<?php echo site_url('index.php/user/Institute/insti_update')?>";
        var data = new FormData(document.getElementById("form2"));

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

    function delete_insti(id)
    {
    
          $.ajax({
            url : "<?php echo site_url('index.php/user/Institute/insti_delete')?>/"+id,
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
        $("#delete_member").attr('onclick','delete_insti('+id+')');  
             
    }


  </script>


     <!-- Bootstrap modal -->
  <div class="modal fade" id="add_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Topics Form</h3></center>
       
      </div>
      <div class="modal-body form">
        <form id="form" method="" action="">
            <table class="table" id="dynamic_field">
                <tr >
                    <td class="col-md-8">
                        <!--div class="top-row"-->
                        <div class="form-group">
                            <label class="control-label col-md-3">University / Institute<span style="color:red">*</span></label>
                            <div class="col-md-9">
                            <select required class="form-control" name="university[]" >
                              <option value="University">University</option>
                              <option value="Institute">Institute</option>
                            </select>
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="control-label col-md-3">Name<span style="color:red">*</span></label>
                            <div class="col-md-7">
                              <input type="text" name="name[]" class="form-control" >
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="control-label col-md-3">Description<span style="color:red">*</span></label>
                            <div class="col-md-9">
                            <input type="text"required class="form-control" name="desc[]"/>
                            </div>
                        </div><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3">Status<span style="color:red">*</span></label>
                          <div class="col-md-9">
                              <select name="status[]" class="form-control">
                                  <option value="1">Active</option>
                                  <option value="0">Not Active</option>
                              </select>
                          </div>
                        </div><br><br>

                    </td>
                </tr>
            </table>
          </form>
      
           
          <div class="modal-footer">
              <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal --></div>



     <!-- Bootstrap modal -->
  <div class="modal fade" id="edit_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="color:#fff; background-color:#338cbf" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <center> <h3 class="modal-title">Topics Form</h3></center>
       
      </div>
      <div class="modal-body form">
        <form id="form2" method="" action="">
            <table class="table" >
                <tr >
                    <td class="col-md-8">
                        <!--div class="top-row"-->

                        <div class="form-group">
                            <label class="control-label col-md-3">University/Institute<span style="color:red">*</span></label>
                            <div class="col-md-9">
                              <select name="university" class="form-control" id="university">
                                <option value="University">University</option>
                                <option value="Institute">Institute</option>
                              </select>
                            </div>
                        </div><br><br>

                        <input type="hidden" name="id" value="" id="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Name<span style="color:red">*</span></label>
                            <div class="col-md-7">
                            <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div><br><br>

                        <div class="form-group">
                            <label class="control-label col-md-3">Description<span style="color:red">*</span></label>
                            <div class="col-md-9">
                            <input type="text"required class="form-control" name="desc" id="desc" />
                            </div>
                        </div><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3">Status<span style="color:red">*</span></label>
                          <div class="col-md-9">
                              <select name="status" class="form-control" id="status">
                                  <option value="1">Active</option>
                                  <option value="0">Not Active</option>
                              </select>
                          </div>
                        </div><br><br>

                    </td>
                </tr>
            </table>
          </form>
      
           
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- End Bootstrap modal --></div>







<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="color:#fff; background-color:#338cbf" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Institute</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this Institute ?</label> <br>
                  <button class="btn btn-default" id="delete_edu">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

