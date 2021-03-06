
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 50%;
      overflow-y: initial !important
}
.modal-body{
  height:480px;
  overflow-y: auto;
}

</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Applicants </strong>
        <!--<small>Add, Edit, Delete <?php  ?></small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Applicants</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    
    <section class="content">   
        <div class="row">
        <div class="col-md-2">
     <a href="<?php echo base_url()?>admin/Jobs" class="btn btn-info"><< BACK</a><br>
     </div>
     </div><br>
   
<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" width="100%" cellspacing="0">
      <thead>
         
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>NAME</th>        
          <th width="100px">APPLIED FOR</th>
          <th>CURRENT COMPANY</th>
          <th>DESIGNATION</th>
          <th>EXPERIENCE</th>
          <th style="display:none;">EXP</th>
          <th>LOCATION</th>
          <th>SALARY</th>
          <th style="display:none;">SAL</th>
          <th>CITY</th>
          <th>EMAIL</th>
          <th>MOBILE</th>
          <th>INSTITUTE</th>
          <th>QUALIFICATION</th>         
          <th>RESUME</th>
          <th>APPLY AT</th>
          <!--<th>STATUS</th>-->
<th width="25px">ACTION</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($members)) {
            
          
         foreach($members as $res){
             if($res->member_status=='1'){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->member_id; ?>" class="" ></td> --> 
                                        <td><?php echo $res->member_id;?></td>
                                        <td style="cursor:pointer;" title="member info" onclick="view_member(<?php echo $res->member_id;?>)"><?php echo $res->member_fname.' '. $res->member_lname; ?></td>
                                        <td><?php echo $res->job_title; ?></td>
                                        <?php $emp=$this->Employments_model->get_employment(array('member_id'=>$res->member_id))?>
                                        <td><?php if(!empty($emp->employment_organization)){
                                            echo $emp->employment_organization;
                                        }; ?></td>
                                        <td><?php if(!empty($emp->employment_designation)){ echo $emp->employment_designation;} ?></td>
                                        <?php if(!empty($res->member_experience) && $res->member_experience!='0.0')
                                            {
                                            $exp=explode(".",$res->member_experience);
                                            
                                             if($exp[0]=="0")
                                            {
                                             $experience=$exp[1]." Month";  
                                            }elseif($exp[1]=="0")
                                            {
                                              $experience=$exp[0]." Year";  
                                            }else
                                            {
                                            $experience=$exp[0]." Year ". $exp[1]." Month";  
                                            }                                           
                                            
                                            } else{
                                            $experience="Not Mentioned";
                                            }
                                            ?>
                                         <td style="display:none;"><span><?php echo $res->member_experience; ?></span></td>
                                        <td><?php echo $experience; ?></td>
                                        <td><?php if(!empty($emp->employment_city)){echo $emp->employment_city;} ?></td>
                                         <?php if(!empty($res->member_anual_salary) && $res->member_anual_salary!='0.0' ){
                                          $sal=explode(".",$res->member_anual_salary);                                         
                                          if($sal[0]=="0")
                                            {
                                             $salary= $sal[1]." Thousand PA";  
                                            }elseif($sal[1]=="0")
                                            {
                                              $salary= $sal[0]." Lac PA";  
                                            }else
                                            {
                                           $salary= $sal[0]." Lac ". $sal[1]."Thousand PA";  
                                            }
                                            }
                                            else
                                            { $salary= "Not Mentioned";}
                                         
                                         ?>
                                        <td style="display:none;">
                                            <span><?php echo $res->member_anual_salary;?></span>
                                        </td>
                                        <td> 
                                           <?php echo $salary; ?>
                                        </td>
                                        <td><?php echo $res->member_city;?></td>
                                        <td><?php echo $res->member_email;?></td>
                                        <td><?php echo $res->member_mobile;?></td>
                                        <?php $education=$this->Educations_model->get_education_by_member($res->member_id);?>
                                        <td><?php foreach($education as $edu){ echo $edu->education_institute_name."<br>";}?></td>
                                        <td><?php foreach($education as $edu){echo $edu->education_degree; if(isset($edu->education_name)){echo "(".$edu->education_name.")";}} ?><br></td>
                                       <td><a href="<?php echo base_url().$res->member_resume; ?>" target="_blank">Resume</a></td>
                                       <td><?php echo $res->apply_at;?></td>
<!--                                       <td>
                                           <?php 
                                       if($res->member_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>-->
                                       <td>
                 
                  <button class="btn btn-info btn-xs" onclick="view_member(<?php echo $res->member_id;?>)" data-toggle="tooltip" data-placement="bottom" title="view applicants"><i class="glyphicon glyphicon-eye-open"></i></button>
                 

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
   $('#table_id').DataTable();
  });  
 
 

    function view_member(id)
    {
    
          $.ajax({
            url : "<?php echo site_url('admin/Jobs/member_info')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
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
               
            }
        });

      }
      
     
      </script>

   
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
                </div>-->
<!--                <div class="row">
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