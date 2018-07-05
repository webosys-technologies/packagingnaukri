
<style type="text/css">
 .modal fade{
    display: block !important;
}
#modal_dialog,#modal_dialog1{
     width: 60%;
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
.text_color{
  color: #707B7C;
}

@media (max-width:800px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:768px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:320px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
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
      <?php
      if(isset($_GET['Search']))
      {        
        $exp_from=$_GET['experience_from'];  
        $exp_to=$_GET['experience_to'];  
        $sal_from=$_GET['salary_from'];
        $sal_to=$_GET['salary_to']; 
        $data=array('salary_from'=>$_GET['salary_from'],
                    'salary_to'=>$_GET['salary_to'],
                    'experience_from'=>$_GET['experience_from'],
                    'experience_to'=>$_GET['experience_to']);
        
        $members=$this->Members_model->search_members($data);
      }      
      ?>
      
        <form action="" method="get" onsubmit="return validateForm()">
        <div class="row">
           
            <div class="col-md-4 col-md-offset-2">
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-6">
                        <label>Experince From</label>
                        <select name="experience_from" id="experience_from" class="form-control">
                            <option>Experience From</option>
                         <script>
                                var i=1;
                                for(i; i<21; i++)
                                {
                                   $('[name="experience_from"]').append('<option value="'+i+'">'+i+ " Year"+'</option>');
                                }
                               
                               <?php
                               if(isset($exp_from))
                               { ?>
                                 $('[name="experience_from"]').val('<?php echo $exp_from;?>');  
                              <?php }
                               ?>
                                                  
                            </script>                            
                        </select>
                        <span class="text-danger" id="exp_from_err"></span>
                    </div>
                        <div class="col-md-6">
                        <label>Experince To</label>
                        <select name="experience_to" class="form-control">
                            <option>Experience To</option>
                         <script>
                                var i=1;
                                for(i; i<21; i++)
                                {
                                   $('[name="experience_to"]').append('<option value="'+i+'">'+i+ " Year"+'</option>');
                                }
                                 <?php
                               if(isset($exp_to))
                               { ?>
                                 $('[name="experience_to"]').val('<?php echo $exp_to;?>');  
                              <?php }
                               ?>
                            </script>
                            <option>greater than 20</option>
                        </select>
                        <span class="text-danger" id="exp_to_err"></span>
                    </div>
                    </div>                    
             </div>
            </div>
                            
            
                     
            <div class="col-md-4">
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-6">
                        <label>Salary From</label>
                        <select name="salary_from" class="form-control">
                            <option>Salary From</option>

                            <script>
                                var i=1;
                                for(i; i<100; i++)
                                {
                                   $('[name="salary_from"]').append('<option value="'+i+'">'+i+ " Lac"+'</option>');
                                }
                                
                                 <?php
                               if(isset($sal_from))
                               { ?>
                                 $('[name="salary_from"]').val('<?php echo $sal_from;?>');  
                              <?php }
                               ?>
                            </script>
                        </select>
                        <span class="text-danger" id="sal_from_err"></span>
                    </div>
                        <div class="col-md-6">
                        <label>Salary To</label>
                        <select name="salary_to" class="form-control">
                             <option>Salary To</option>

                        <script>
                                var i=1;
                                for(i; i<100; i++)
                                {
                                   $('[name="salary_to"]').append('<option value="'+i+'">'+i+ " Lac"+'</option>');
                                }
                                 <?php
                               if(isset($sal_to))
                               { ?>
                                 $('[name="salary_to"]').val('<?php echo $sal_to;?>');  
                              <?php }
                               ?>
                            </script>
                        </select>
                        <span class="text-danger" id="sal_to_err"></span>
                        
                    </div>
                    </div>                    
             </div>
                
             </div>
           
        </div>
         <div class="row">
             
                     <div class="col-md-offset-4">
                    <div class="form-group">
                    <div class="col-md-2">
                        <input type="submit" value="Search" name="Search" class="btn btn-info">
                    </div>
                        <div class="col-md-2">
                            <a href="<?php echo base_url();?>admin/Members" class="btn btn-danger">Reset</a>
                    </div>
                    </div>    
                         </div>
            
             </div>
             <div class="row">
             <div class="col-md-offset-4"><span id="field_err" class="text-danger"></span></div>
             </div>
         </form><br>
      
<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
         
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>NAME</th>
          <th>CURRENT COMPANY</th>
          <th>DESIGNATION</th>
          <th>EXPERIENCE</th>
          <th>LOCATION</th>
          <th>SALARY</th>
          <th>EMAIL</th>
          <th>MOBILE</th>
          <th>CITY</th>
          <th>INSTITUTE</th>
          <th>QUALIFICATION</th>
          <th>RESUME</th>
          <th>CREATED AT</th>
          <th>STATUS</th>
          <th>SOURCE</th>


          <th style="width:80px;">ACTION
          </p></th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($members)) {
          // print_r($members);  
          
         foreach($members as $res){?>
             <tr>   
                                        <td><?php echo $res->member_id;?></td>
                                        <td><?php echo $res->member_fname.' '. $res->member_lname; ?></td>
                                         <?php $emp=$this->Employments_model->get_employment(array('member_id'=>$res->member_id))?>
                                        <td><?php if(isset($emp->employment_organization)){echo $emp->employment_organization; }?></td>
                                        <td><?php if(isset($emp->employment_designation)){echo $emp->employment_designation;} ?></td>
                                        
                                        <?php if(!empty($res->member_experience) && $res->member_experience!='0.0')
                                            {
                                            $exp=explode(".",$res->member_experience);
                                            
                                             if($exp[0]=="0")
                                            {
                                             $experience=$exp[1]." Month ";  
                                            }elseif($exp[1]=="0")
                                            {
                                              $experience=$exp[0]." Year ";  
                                            }else
                                            {
                                            $experience=$exp[0]." Year ". $exp[1]." Month ";  
                                            }                                           
                                            
                                            } else{
                                            $experience="Not Mentioned";
                                            }
                                            ?>
                                        
                                        <td><?php echo $experience; ?></td>
                                        <td><?php if(isset($emp->employment_city)){echo $emp->employment_city;} ?></td>
                                         <?php if(!empty($res->member_anual_salary) && $res->member_anual_salary!='0.0' ){
                                          $sal=explode(".",$res->member_anual_salary);                                         
                                          if($sal[0]=="0")
                                            {
                                             $salary= $sal[1]." Thousand";  
                                            }elseif($sal[1]=="0")
                                            {
                                              $salary= $sal[0]." Lac ";  
                                            }else
                                            {
                                           $salary= $sal[0]." Lac ". $sal[1]."Thousand PA";  
                                            }
                                            }
                                            else
                                            { $salary= "Not Mentioned";}
                                         
                                         ?>
                                        <td>
                                            <?php echo $salary;?>
                                        </td>
                                        <td><?php echo $res->member_email;?></td>
                                       <td><?php echo $res->member_mobile;?></td>
                                       <td><?php echo $res->member_city;?></td>
                                       <?php $edu=$this->Educations_model->get_by_id($res->member_id);?>
                                       <td><?php if($edu){echo $edu->education_institute_name;}?></td>
                                       <td><?php if($edu){echo $edu->education_name."(".$edu->education_degree.")";}?></td>
                                       <td><?php if($res->member_resume){?><a href="<?php echo base_url().$res->member_resume;?>" target="_blank">resume</a><?php } ?></td>
                                           
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
                                       <td><?php echo $res->member_source; ?></td>
                                       <td>
                  <button class="btn btn-success btn-xs" onclick="edit_member(<?php echo $res->member_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Member"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-danger btn-xs" onclick="delete_menu(<?php echo $res->member_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Member"><i class="glyphicon glyphicon-trash"></i></button>

                  <button class="btn btn-info btn-xs" onclick="view_member(<?php echo $res->member_id;?>)" data-toggle="tooltip" data-placement="bottom" title="View Member"><i class="fa fa-eye"></i></button>
                 

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
      
      
             function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

     var ext = input.files[0].name.split('.').pop().toLowerCase();
    if(ext=="jpg" || ext=="jpeg" || ext=="png")
            {

    reader.onload = function(e) {
      $('#member_pic').attr('src', e.target.result);
      $('#member_pic').attr('hidden',false);
      $("#pic_err").html("");
    }
  }else{
        $("#pic_err").html("This format is not allowed");
//       $('#photo').attr('src'," ");
       $('#photo').val("");
      $('#member_pic').attr('hidden',true);
  }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#photo").change(function() {
  readURL(this);
}); 
 
 
  $('.state').change(function() {
        // alert();
   var el = $(this) ;
              $('.city').html("");
              $(".city").append('<option value="">--Select City--</option>');              
var state=el.val();
        if(state)
        {
          // alert(state);            
      $.ajax({
       url : "<?php echo site_url('index.php/Home/show_cities')?>/" + state,        
       type: "GET",              
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {          
              $('.city').append('<option value="'+ row.cityName +'">' + row.cityName+'</option>');
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

    $(".country").change(function() {        
   var el = $(this) ;
              $(".state").html("");
              $(".city").html("");
              $(".state").append('<option value="">--Select State--</option>');
              $(".city").append('<option value="">--Select City--</option>');

var country=el.val();
        if(country)
        {            
      $.ajax({
       url : "<?php echo site_url('index.php/home/show_states')?>/" + country,        
       type: "GET",              
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {          
              $(".state").append('<option value="'+ row.stateID +'">' + row.stateName+'</option>');
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

            

 
 
      var table=$('#table_id').DataTable();
      
       $('#min, #max').keyup( function() {
        table.draw();
    } );
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

  function validateForm()
  {
     
//        var exp_from;
       if($('[name="salary_from"]').val()=="Salary From" && $('[name="salary_to"]').val()=="Salary To" && $('[name="experience_from"]').val()=="Experience From"  && $('[name="experience_to"]').val()=="Experience To")
       {
           $("#field_err").html("Please Select Anyone Field.");
           return false;
       }else{
           return true;
           }
//      if($('[name="experience_from"]').val()!="" && $('[name="experience_from"]').val()!="Experience From")
//      {
//          if($('[name="experience_to"]').val()!="" && $('[name="experience_to"]').val()!="Experience To")
//          {
//             return true;
//          }else{
//              $("#exp_to_err").html("Experience To Required");   
//             return false;
//                }
//              
//      }else{
//           $("#exp_from_err").html("Experience From Required");         
//          return false;
//      }
      
//      $("#sal_to_err").html("Salary TO Required");
//      $("#exp_from_err").html("Experience From Required");
//      $("#exp_to_err").html("Experience TO Required");
// $("#sal_from_err").html("Salary From Required");
//     return false;
  }


function view_member(id)
    {
      // save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Members/ajax_edit/')?>/" + id,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {          
          // alert();
            $('#source').html(data.member_source);
            $('#fname').html(data.member_fname);
            $('#lname').html(data.member_lname); 
            $('#email').html(data.member_email);
            $('#mobile').html(data.member_mobile);
            $('#gender').html(data.member_gender);
            $('#dob').html(data.member_dob);
            $('#address').html(data.member_address);
            $('#city').html(data.member_city);
            $('#pincode').html(data.member_pincode);
            $('#state').html(data.member_state);
            $('#marital').html(data.member_marital_status);
            $('#experience').html(data.member_experience+' year ');
              if(data.member_anual_salary)
              {
                  var salary=data.member_anual_salary.split('.');
                  $("#salary").html(salary[0]+' Lac '+salary[1]+' Thousand');
              }
            if(data.member_profile_pic)
            {
            $('#profile_pic').attr("src", "<?php  echo base_url();?>"+data.member_profile_pic);
             }
             else
             {
               $('#profile_pic').attr("src", "<?php echo base_url(); ?>profile_pic/avatar.png");
             }
              if(data.member_resume)
            {
                $("#resume_name").html("resume");
            $('#resume').attr("href", "<?php  echo base_url();?>"+data.member_resume);
             }
           
            
            $('#viewModal').modal('show'); // show bootstrap modal when complete loaded
            $('#viewtitle').text('Member Details'); // Set title to Bootstrap modal title

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
     
       $("#fname_err").html(""); 
        $("#lname_err").html(""); 
        $("#city_err").html(""); 
        $("#state_err").html(""); 
        $("#source_err").html(""); 
      $("#pic_err").html("");
      $('#photo').val("");
      $('#member_pic').attr('hidden',true);
      $("#remove_btn").html("");
         
    }

    function edit_member(id)
    { 
         $("#fname_err").html(""); 
        $("#lname_err").html(""); 
        $("#city_err").html(""); 
        $("#state_err").html(""); 
        $("#source_err").html(""); 
        
       $("#pic_err").html("");
       $('#photo').val("");
       $('#member_pic').attr('hidden',true);
       $("#remove_btn").html("");
        
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals
      $('.city').html("");
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Members/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            // $("#append_city").remove();    
            $('[name="member_id"]').val(data.member_id);
            $('[name="fname"]').val(data.member_fname);
            $('[name="lname"]').val(data.member_lname);
            $('[name="email"]').val(data.member_email);
            $('[name="mobile"]').val(data.member_mobile);
            $('[name="password"]').val(data.member_password);
            $('[name="address"]').val(data.member_address);
            $('[name="pincode"]').val(data.member_pincode);
            $('[name="country"]').val(data.member_country);
            $('[name="status"]').val(data.member_status);
              // $('.city').append('<option value="'+ data.member_city +'">' + data.member_city +'</option>');
              // $('.state').append('<option value="'+ data.stateName +'">' + data.stateName +'</option>');
            $('[name="source"]').val(data.member_source);

              
            if(data.member_profile_pic)
            {
                $("#member_pic").attr('src',"<?php echo base_url();?>"+data.member_profile_pic);
                $("#member_pic").prop('hidden',false);
            $("#remove_btn").append(' <a href="<?php echo base_url();?>admin/Members/delete_pic/'+data.member_id+'" id="remove_photo" class="btn btn-danger btn-xs pull-right">Remove Photo</a>');
            }

            $.each(data.state.states, function (i,row){

              if (data.member_state == row.stateID) {
               $('[name="state"]').append('<option value="'+row.stateID+'" selected>'+row.stateName+'</option>');                
              }else{
                $('[name="state"]').append('<option value="'+row.stateID+'">'+row.stateName+'</option>');                
              }

            });


            $.each(data.state.cities, function (i,row){

              if (data.member_city == row.cityName) {
               $('[name="city"]').append('<option value="'+row.cityName+'" selected>'+row.cityName+'</option>');                
              }else{
                $('[name="city"]').append('<option value="'+row.cityName+'">'+row.cityName+'</option>');                
              }

            });
                        
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
       $("#save_btn").attr('disabled',true);
       
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {         
        url = "<?php echo site_url('index.php/admin/Members/member_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Members/member_update')?>";
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
              if(json.state_err)
                {
                $("#state").focus();
                $("#state_err").html(json.state_err);
              }else{
                   $("#state_err").html("");
              }
              
              if(json.city_err)
              {
                  $("#city").focus();
               $("#city_err").html(json.city_err); 
              }else{
                  $("#city_err").html(""); 
              }
              
              if(json.fname_err)
              {
                   $('[name=fname]').focus();
               $("#fname_err").html(json.fname_err); 
              }else{
                   $("#fname_err").html(""); 
              }
              
              if(json.email_err)
              {
                   $('[name=email]').focus();
               $("#email_err").html(json.email_err); 
              }else{
                   $("#email_err").html(""); 
              }
              
               if(json.mobile_err)
              {
                   $('[name=mobile]').focus();
               $("#mobile_err").html(json.mobile_err); 
              }else{
                   $("#mobile_err").html(""); 
              }
              
               if(json.lname_err)
              {
                   $('[name=lname]').focus();
               $("#lname_err").html(json.lname_err); 
              }else{
                   $("#lname_err").html(""); 
              }
               if(json.source_err)
              {
                   $('[name=source]').focus();
               $("#source_err").html(json.source_err); 
              }else{
                   $("#source_err").html(""); 
              }
            
              if(json.success)
              {
              location.reload();// for reload a page
              }else{
                   $("#save_btn").attr('disabled',false);
              }
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               alert('Error adding / update data');
            }
        });
    }

    function delete_member(id)
    {
    
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Members/member_delete')?>/"+id,
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
        <div class="modal-header"style="background:#3c8dbc; color: white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body" id="modal_body">
         
            
          	
    		<div class="">
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" value="" name="member_id">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Source<span style="color: red">*</span></label>
                                  <select name="source" class="form-control source">
                                    <option>--Select Source--</option>
                                    <option value="Packaging">Packaging</option>
                                    <option value="Printing">Printing</option>
                                    <option value="Plastic">Plastic</option>
                                  </select>
                                   <span id="source_err" class="text-danger"></span>
                                </div>
                                 
                              </div>
                            </div>
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
                                    
                                    
                                </div>
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Mobile No<span style="color:red">*</span></label>
                                        <input type="text" placeholder="Mobile No" class="form-control required"  name="mobile" maxlength="11" minlength="10" required>
                                        <span class="text-danger" id="mobile_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>
                               </div>
                                    
                                    <div class="row">
                                          <div class="col-md-6">
                                            <div class="form-group">
                                              <label>Address<span style="color: red">*</span></label>
                                              <textarea rows="5" cols="6" name="address" class="form-control" required></textarea>
                                            </div>
                                          </div>
                                         <div class="col-md-6">                                
                                    <div class="form-group">
                                       <label>Profile Picture</label>                                       
                                    <input type="file" name="photo" id="photo" value="">
                                   <div id="remove_btn"></div>
                                        <span class="text-danger" id="pic_err"></span>                                        
                                    </div> 
                                    <img src="" id="member_pic" width="90px" height="100px" hidden>
                                </div> 
                                        </div>
                                    
                                    
                                            
                             <div class="row">
                            <div class="col-md-6">
                      <div class="form-group">

                                <label class="form-label">Country</label><span style="color: red">*</span>
                                <select name="country"  class="form-control country" required>
                                    <option value="">-- Select Country --</option>
                                    <?php if(isset($country)){
                                        foreach($country as $country)
                                        { ?>
                                           <option value="<?php echo $country->countryID; ?>"><?php echo $country->countryName; ?></option>
                                       <?php }
                                    }?>
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                         <span class="text-danger" id="state_err"><?php echo form_error('country'); ?></span>    
                      </div>
                                 
                    </div>
                            <div class="col-md-6">
                      <div class="form-group">

                                <label class="form-label">State</label><span style="color: red">*</span>
                                <select name="state"  class="form-control state" required>
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                         <span class="text-danger" id="state_err"><?php echo form_error('state'); ?></span>    
                      </div>
                                 
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-label">City</label><span style="color: red">*</span>
                        <select name="city"  class="form-control city" required>
                                    <option value="">-- Select City --</option>
                           </select>                        
                        <span class="text-danger" id="city_err"><?php echo form_error('city'); ?></span>
                      </div>                        
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"> 
                      <label class="form-label">Pincode</label>
                      <input type="text" name="pincode" class="form-control" placeholder="Pincode" required>                     
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
    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" id="save_btn" onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   
<!--                      View model      -->

<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog1">
    
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
                      <label>Source</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>
                    <div class="col-md-7">
                      <span id="source" class="text_color"></span>
                    </div>
                  </div>
                </div>
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
<!--                <div class="row">
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
                </div>-->
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
                      <span id="gender" class="text_color"></span>
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
<!--                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Address</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="address" class="text_color"></span>
                    </div>
                  </div>
                </div>-->
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
<!--                <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Pincode</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                      <span id="pincode" class="text_color"></span>
                    </div>
                  </div>
                </div>-->
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
              <div class="row">
                  <div class="form-group">
                    <div class="col-md-3">
                      <label>Resume</label>
                    </div>
                    <div class="col-md-1"><strong>:</strong></div>                    
                    <div class="col-md-7">
                        <a href="" id="resume"  target="_blank"><span id="resume_name"></span></a>
                    </div>
                  </div>
                </div>
            </form>
            
          </div>
                            </div>
          
        </div>         
<!--       <div class="modal-footer">
             <button type="button" class="btn btn-primary"  onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>-->
    </div>           
           
        </div>        
      </div>
   

   <!--                   End View Model            -->


<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#3c8dbc;" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Member</strong></h4></center>
      </div>
      <div  style="background:#F2F3F4" class="modal-body">
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

