<style>
    
     .modal-backdrop {background: none;}
    .data{
        padding:20px;
         line-height: 22px;
    }
    
    .space{
        padding:8px;
        width:50%;
    }
    
.shadow {
   
    /*padding: 20px;*/
    /*{border-style: groove;}*/
    border: 1px solid #EAEDED;
    /*border-color: 1px #CCD1D1;*/
    box-shadow: 5px 5px 10px #CCD1D1;
}

#sideinfo {
    border: 1px solid #EAEDED;
    padding: 10px;
    box-shadow: 5px 5px 10px #CCD1D1;
}

#resume_border{
     width: 400px;
     text-align:center;
    margin-left: 150px;
    border: 1px solid #EAEDED;
    /*padding-left: 145px;*/
    padding-top:20px;
   
}

a:hover {
    color:blue;
    background:#D6DBDF;
}

@media (min-width: 768px){
  #left {
    position: relative;
    top: 0px;
    bottom: 0;
    left: 0;
    height:75%;
    width: 100%;
    /*overflow-y: scroll;*/ 
  }
  
  .btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
}

.modal-dialog{
     width: 450px;
     
}

 #myModal{
            background: none;
                margin:150px;
               
            }
            
    #success_Modal{
            background: none;
            margin:20px;
            margin-left:600px;
               
            }



</style>

  <div  class="content-wrapper" style="background:white">
        <section class="content-header">
      <h1>
        Profile
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
             </section>
<!--<hr style="border-top: 1px solid #ccc;">-->
      <section class="content" >

         <script>
              $(document).ready(function(){
                  
                  
                 $('#resume').change(function(e){
            var fileName = e.target.files[0].name;
            
            var ext=fileName.split('.').pop();
            if(ext=="pdf" || ext=="doc" || ext=="docx" || ext=="rtf")
            {
               $("#resume_name").html(fileName);
            $("#resume_btn").prop('hidden',false); 
             save_method="resume_update";
                  data=new FormData(document.getElementById("resume_form"));
                  save(data,save_method);
            }else{
//                 $("#resume_btn").prop('hidden',true); 
                 $("#resume_name").html("This file is not allowed"); 
                 
            }
        });
        
        
//         <?php
        $this->load->helper('form');
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>//
//                    alert(<?php $success; ?>);
//        $("#success_msg").html(<?php $success; ?>);
//        $('#success_Modal').modal('show');      
//        setTimeout(function() {$('#success_Modal').modal('hide');}, 3000);
//                  
//        <?php }?>            
                  
                  var start = 1975;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += '<option value="'+year+'">'+ year +'</option>';
  
}

document.getElementById("passin").innerHTML = options;
document.getElementById("passout").innerHTML = options;
document.getElementById("from").innerHTML = options;
document.getElementById("to").innerHTML = options;
$("#emp_from").innerHTML = options;
$("#emp_to").innerHTML = options;



                  
                  $("#city").val('<?php if(isset($member_data)){echo $member_data->member_city;}?>');
                  $("#passin").val('<?php if(isset($member_data)){echo $member_data->education_passing_in;}?>');
                  $("#passout").val('<?php if(isset($member_data)){echo $member_data->education_passing_out;}?>');  
                  $("#emp_from").val('<?php if(isset($member_data)){echo $member_data->employment_from;}?>');                  
                  $("#emp_to").val('<?php if(isset($member_data)){echo $member_data->employment_to;}?>');                  
                  var gen='<?php if($member_data){echo $member_data->member_gender;}?>' 
                   if(gen=="Male"){$("#Male").prop('checked',true);}
                   if(gen=="Female"){$("#Female").prop('checked',true);}


       $("#edit_personal").click(function(){               
               $(".edit_field").prop("hidden",true);
                $("#personal_btn").prop("hidden",false);
               $(".show_field").prop("hidden",false);
       }
       );
       
       
        $("#cancel_personal").click(function(){
               
               $(".edit_field").prop("hidden",false);
                $("#personal_btn").prop("hidden",true);
               $(".show_field").prop("hidden",true);
       }
       );
       
       
       
        $("#edit_education").click(function(){               
               $(".edit_education_field").prop("hidden",true);
                $("#education_btn").prop("hidden",false);
               $(".show_education_field").prop("hidden",false);
       }
       ); 
       
              $("#cancel_education").click(function(){
               
               $(".edit_education_field").prop("hidden",false);
                $("#education_btn").prop("hidden",true);
               $(".show_education_field").prop("hidden",true);
       }
       );
       
       
       $("#edit_employment").click(function(){               
               $(".edit_employment_field").prop("hidden",true);
                $("#employment_btn").prop("hidden",false);
               $(".show_employment_field").prop("hidden",false);
       }
       ); 
       
       
       $("#cancel_employment").click(function(){
               
               $(".edit_employment_field").prop("hidden",false);
                $("#employment_btn").prop("hidden",true);
               $(".show_employment_field").prop("hidden",true);
       }
       );
       
       
       $("#add_project").click(function(){ 
          $("#add_more").prop('hidden',false);
      });
      
       $("#cancel_new_project").click(function(){ 
          $("#add_more").prop('hidden',true);
      });
       
       
       $("#edit_project").click(function(){               
               $(".edit_project_field").prop("hidden",true);
                $("#project_btn").prop("hidden",false);
               $(".show_project_field").prop("hidden",false);
       }
       ); 
       
      
       
       $("#cancel_project").click(function(){
               
               $(".edit_project_field").prop("hidden",false);
                $("#project_btn").prop("hidden",true);
               $(".show_project_field").prop("hidden",true);
       }
       );
       
              
       
       $("#cancel_resume").click(function(){
               
               $("#resume_name").html("");
               $("#resume_btn").prop("hidden",true);
              
       }
       );
       
       $("#cancel_new_skill").click(function(){
               
               $("#new_skill_form").prop('hidden',true);
               
       }
       );
       
       
       
       $("#add_skill").click(function(){      
          
               $("#new_skill_form").prop("hidden",false);
                 }
       );
       
       
       $("#save_personal").click(function(){
               save_method=$("#save_personal").val();
               data=new FormData(document.getElementById("personal_form"));
                save(data,save_method);
             }
       );
        $("#save_education").click(function(){
               save_method=$("#save_education").val();
               data=new FormData(document.getElementById("education_form"));
                save(data,save_method);
             });
                     
        $("#save_employment").click(function(){
               save_method=$("#save_employment").val();
               data=new FormData(document.getElementById("employment_form"));
                save(data,save_method);
             }
         );
                     
                      $("#save_resume").click(function(){
               save_method=$("#save_resume").val();
               data=new FormData(document.getElementById("resume_form"));
                save(data,save_method);
             }
       );
       
                $("#save_project").click(function(){
               save_method=$("#save_project").val();
               data=new FormData(document.getElementById("project_form"));
                save(data,save_method);
             }
       );
       
         $("#save_new_project").click(function(){
               save_method=$("#save_new_project").val();
               data=new FormData(document.getElementById("new_project_form"));
                save(data,save_method);
             }
       );
       
        $("#save_new_skill").click(function(){
               save_method=$("#save_new_skill").val();
               data=new FormData(document.getElementById("new_skill_form"));
                save(data,save_method);
             }
       );
       
            
});
     var save_method;
     var data;
    
   
        function save(data,save_method)
    {     
     
      var url;
    
        url = '<?php echo base_url() ?>member/Profile/'+save_method;
      
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
//                alert(json.success);
               if(json.success)
               {                   
              location.reload();// for reload a page

               }
               if(json.error)
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

    var id;
    var method;
     function delete_project(id,method)
     {
         $('.delete_name').html("Project");
         save_method=method;
         $("#myModal").modal('show');
         $("#project_delete").attr('onclick','delete_menu('+id+')');
     }
     
      function delete_skill(id,method)
     {
        $('.delete_name').html("Skill");
        save_method=method;
         $("#myModal").modal('show');
         $("#project_delete").attr('onclick','delete_menu('+id+')');
         
     }
     
     function delete_resume(id,method)
     {
        $('.delete_name').html("Resume");
         save_method=method;
         $("#myModal").modal('show');
         $("#project_delete").attr('onclick','delete_menu('+id+')');
         
     }
     
     function delete_menu(id,method)
     {
           
          $.ajax({
            url : "<?php echo base_url();?>member/Profile/"+save_method+"/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               // alert('Error deleting data');
            }
        });
    
     }
        
             </script>
             
             
         
             <div class="row content">
             <section class="col-md-4 sidenav" id="sideinfo" >
      
                 
                 <div class="box box-solid" style="background:#3c8dbc"   >
                 
                  <div class="box-header" style="color:white">
              <i class="fa fa-book"></i>

              <h3 class="box-title">Manage Profile</h3>
             </div>
                 
                 
                 
                 
           <div class="box-footer text-black" id="left">       
                 
      <ul class="nav nav-pills nav-stacked" >
         
         <li id="topic_font">         
           <a href="#personal" id="personal_box">Personal Details</a> 
           <a href="#education" id="education_box">Education Details</a> 
           <a href="#resume" id="">Upload Resume</a> 
           <a href="#employment" id="employment_box">Employment Details</a>
            <a href="#project" id="project_box">Project Details</a>
           <a href="#skill" id="skill_box">Skills Details</a> 


 
         </li>
             
      </ul><br>
      </div>                      
     </div>                
                
             </section>
         <!--</div>-->
     <div class="row content">
      <div class="col-md-8" style="color:white" id="info">
          
        <div class="shadow" id="personal"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Personal Details</u></b></h3><div class="pull-right"><a href="#personal" id="edit_personal"><span class="fa fa-pencil"> edit </span></a></div>
             </div>
      <form action="" id="personal_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; "  width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Name</th><td ><span class="edit_field"><?php echo $member_data->member_fname." ".$member_data->member_lname?></span><span class="show_field" hidden><input type="text" name="fname" id="fname" style=" " placeholder="First Name" value="<?php echo $member_data->member_fname;?>" autofocus="autofocus"><input type="text" name="lname" id="lname" style=" " placeholder="Last Name" value="<?php echo $member_data->member_lname;?>"></span></td><tr>
       <tr><th class="space">Email  </th><td> <span class="edit_field"><?php echo $member_data->member_email;?></span><span class="show_field"hidden><input type="text" name="email" id="email" style=" " value="<?php echo $member_data->member_email;?>"></span> </td></tr>
                   <tr><th class="space">Mobile</th><td><span class="edit_field"><?php echo $member_data->member_mobile;?></span><span class="show_field"hidden><input type="text" name="mobile" id="mobile" style=" " value="<?php echo $member_data->member_mobile;?>"></span></td></tr>

              <tr><th class="space">Date Of Birth  </th> <td><span class="edit_field"><?php echo $member_data->member_dob;?></span><span class="show_field"hidden><input type="date" name="dob" id="dob" style=" " placeholder="DOB" value="<?php echo $member_data->member_dob;?>"></span></td></tr>

              <tr><th class="space">Location  </th><td><span class="edit_field"><?php echo $member_data->member_city;?></span><span class="show_field"hidden><select style="" id="city" name="city"><?php if(isset($cities)){foreach($cities as $city){ echo '<option value="'.$city->city_name.'">'.$city->city_name.'</option>';}}?></select></span></td></tr>

                            <tr><th class="space">Gender  </th><td><span class="edit_field"><?php echo $member_data->member_gender;?></span><span class="show_field"hidden>Male<input type="radio" name="gen" id="Male" value="Male"> / Female <input type="radio" name="gen" id="Female" value="Female"></span></td></tr>
            <?php }?>                   
        </table>

                       <div class="pull-right" id="personal_btn" hidden><button type="button" class="btn btn-success btn-xs" value="member_update" id="save_personal">Save</button> <input type="button" id="cancel_personal" class="btn btn-danger btn-xs" value="cancel"></div>  
             
           </div>
          </form>
          </div><br>
          
          
            <div class="shadow" id="education"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Education Details</u></b></h3><div class="pull-right"><a href="#education" id="edit_education"><span class="fa fa-pencil"> edit </span></a> </div>
             </div>
      <div class="box-footer text-black data" >
      <form action="" id="education_form">
     
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Qualification</th><td ><span class="edit_education_field"><?php echo $member_data->education_degree?></span><span class="show_education_field" hidden><input type="text" size="40" name="degree" id="degree" style=" " value="<?php echo $member_data->education_degree;?>" placeholder="Qualification" autofocus="autofocus"></span></td><tr>
            <tr><th class="space">Education Name  </th><td> <span class="edit_education_field"><?php echo $member_data->education_name;?></span><span class="show_education_field"hidden><input type="text" size="40" name="education_name" id="education_name" style=" " placeholder="Education Name" value="<?php echo $member_data->education_name;?>"></span> </td></tr>
                   <tr><th class="space">Specialization</th><td><span class="edit_education_field"><?php echo $member_data->education_specialization;?></span><span class="show_education_field"hidden><input type="text" size="40" name="specialization" id="specialization" style=" " placeholder="Specialization Field" value="<?php echo $member_data->education_specialization;?>"></span></td></tr>
               <tr><th class="space">University  </th><td> <span class="edit_education_field"><?php echo $member_data->education_university;?></span><span class="show_education_field"hidden><input type="text" name="university" size="40" id="university" style=" " placeholder="University" value="<?php echo $member_data->education_university;?>"></span> </td></tr>
              <tr><th class="space">Education Type  </th><td><span class="edit_education_field"><?php echo $member_data->education_type;?></span><span class="show_education_field"hidden><select style="" id="type" name="type"><option value="Full Time">Full Time</option><option value="Part Time">Part Time</option></select></span></td></tr>
              <tr><th class="space">Academic Year  </th>
                  <td><span class="edit_education_field"><div class="row"><div class="col-md-6"><label>Addmission</label><br><?php echo $member_data->education_passing_in;?></div><div class="col-md-6"><label>Pass Out</label><br><?php echo $member_data->education_passing_out;?></div></div></span>
                      <span class="show_education_field"hidden><div class="row"><div class="col-md-6"><label>Addmission</label><br><select id="passin" name="passin" style="border:none;"></select></div><div class="col-md-6"><label>Pass Out</label><br><select id="passout" name="passout" style="border:none;"></select></div></div></span></td></tr>
               <tr ><th class="space">Percentage </th><td ><span class="edit_education_field"><?php echo $member_data->education_percentage?></span><span class="show_education_field" hidden><input type="text" name="percentage" id="percentage" style=" " value="<?php echo $member_data->education_percentage;?>" placeholder="Percentage"></span></td><tr>
               
  <?php }?>                   
        </table>

          <div class="pull-right" id="education_btn" hidden><button type="button" class="btn btn-success btn-xs" value="education_update" id="save_education">Save</button> <input type="button" id="cancel_education" class="btn btn-danger btn-xs" value="cancel"></div>  
               
          </form>
                 </div>
          </div><br>
          
          
          
          
           <div class="shadow" id="resume"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Resume</u></b></h3><div class="pull-right"></div>
             </div>
      <form action="" id="resume_form" enctype="multipart/form-data">
      <div class="box-footer text-black data" >
        <div class='row'>
            <?php if(isset($member_data)){?>
            <div class="col-md-8"><label><?php if (!empty($member_data->member_resume)){ $resume=explode('/',$member_data->member_resume);echo $resume[1];}?></label><br>
            <span style="color:#B2BABB;">Uploaded On : <?php if (!empty($member_data->member_resume)){ $resume=explode('_',$member_data->member_resume);echo $resume[2];}?></span></div>
           <?php if (!empty($member_data->member_resume)){?> <div class="pull-right"><a href='<?php echo base_url().$member_data->member_resume;?>'><span style='font-size: 18px' class='fa fa-download'></span></a> </div>
           <br><div class="pull-right"><a href='#resume' onclick='delete_resume(<?php echo "$member_data->member_id"; ?>,"resume_delete")'><span class=''> DELETE RESUME</span></a></div><?php } ?>
                                        
           
  <?php }?>  </div>                 
        <br>
          <div id="resume_border">
             <label class="btn-bs-file btn btn-sm btn-info">
                            Upload Resume
                            <input type="file" name="resume" id="resume" value=""/>
                        </label>             
          <span id="resume_name" style="color:black"></span> <br>
          <span style='color:#B2BABB;'>Format Support: pdf,doc,docx,rtf</span>
          </div>
             
           </div>
          
          </form>
          </div><br>
          
          
          
           <div  class="shadow" id="employment">               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Employment Details</u></b></h3><div class="pull-right"><a href="#employment" id="edit_employment"><span class="fa fa-pencil"> edit </span></a> </div>
             </div>
      <form action="" id="employment_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Organization</th><td ><span class="edit_employment_field"><?php echo $member_data->employment_organization;?></span><span class="show_employment_field" hidden><input type="text" name="organization" size="40" id="organization" style=" " value="<?php echo $member_data->employment_organization;?>" placeholder="Company Name" autofocus="autofocus"></span></td><tr>
              <tr><th class="space">Company Location</th><td><span class="edit_employment_field"><?php echo $member_data->employment_city;?></span><span class="show_employment_field"hidden><input type="text" name="city" size="40" id="city" style=" " placeholder="Company Location" value="<?php echo $member_data->employment_city;?>"></span></td></tr>
               <tr><th class="space">Designation  </th><td> <span class="edit_employment_field"><?php echo $member_data->employment_designation;?></span><span class="show_employment_field"hidden><input type="text" name="designation" size="40" id="designation" style=" " placeholder="Job Post" value="<?php echo $member_data->employment_designation;?>"></span> </td></tr>
              <tr ><th class="space">Work Profile </th><td ><span class="edit_employment_field"><?php echo $member_data->employment_profile?></span><span class="show_employment_field" hidden><input type="text" name="profile" id="profile" size="40" style=" " value="<?php echo $member_data->employment_profile;?>" placeholder="Profile"></span></td><tr>
              <tr><th class="space">Work From  </th><td><span class="edit_employment_field"><div class="row"><div class="col-md-6"><label>From</label><br><?php echo $member_data->employment_from;?></div><div class="col-md-6"><label>To</label><br><?php echo $member_data->employment_to;?></div></div></span><span class="show_employment_field"hidden><div class="row"><div class="col-md-6"><label>From</label><br><select id="from" name="from" style="border:none;"></select></div><div class="col-md-6"><label>To</label><br><select id="to" name="to" style="border:none;"></select></div></div></span></td></tr>
               <tr ><th class="space">Notice Period </th><td ><span class="edit_employment_field"><?php echo $member_data->employment_notice_period?></span><span class="show_employment_field" hidden><input type="text" name="period" id="period" style=" " value="<?php echo $member_data->employment_notice_period;?>" placeholder="2 Month"></span></td><tr>
               
  <?php }?>                   
        </table>
          <div class="pull-right" id="employment_btn" hidden><button type="button" class="btn btn-success btn-xs" value="employment_update" id="save_employment">Save</button> <input type="button" id="cancel_employment" class="btn btn-danger btn-xs" value="cancel"></div>  
            
           </div>
          </form>
          </div><br>
          
          
          <div  class="shadow" id="project">               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Project Details</u></b></h3><div class="pull-right"><a href="#project" id="add_project"><span class="fa fa-plus"> Add </span></a> </div>
             </div>
              
               
              
       <div class="box-footer text-black data" > 
           <div id="add_more" hidden>
                  <form id="new_project_form" action="">
               <table style="font-size:13px; " width="100%" id="table_data">  
              <tr><th class="space">Project Name </th><td ><input type="text" size="40" name="project_name" id="project_name" style=" " value="" placeholder="Project Name" autofocus="autofocus"></td></tr>
              <tr><th class="space">Project With </th><td><select name="emp_id"><option value="0">Self</option><?php if(isset($employments)){foreach($employments as $emp){
                  echo '<option value="'.$emp->employment_id.'">'.$emp->employment_organization.'</option>';
              }}?> </select>
              <tr><th class="space">Client Name </th><td ><input type="text" size="40" name="client" id="project_name" style=" " value="" placeholder="Client Name" ></td></tr>
              <tr><th class="space">Duration</th><td ><div class="row"><div class="col-md-6"><label>Start</label><br><input type="date" name="from" id="" style=" " value="" ></div><div class="col-md-6"><label>End</label></div><br><input type="date" name="to" id="" style=" " value=""></div></td></tr>
              <tr><th class="space">Project Description </th><td><textarea name="desc" rows="5" cols="40"></textarea></td></tr>
               </table>
               <div class="pull-right"><button type="button" class="btn btn-success btn-xs" value="new_project_add" id="save_new_project" name="save">save</button> <input type="button" id="cancel_new_project" class="btn btn-danger btn-xs" value="cancel"></div>          
               </form>
             <br>  <hr style="border-top: 1px solid #ccc;">
           </div>
           
           
      <form action="" id="project_form">
                <?php $i=1; if(isset($project_data)){ foreach($project_data as $pro){?>
          <div class="pull-right"><a href="#" onclick='delete_project(<?php echo $pro->project_id;?>,"project_delete")'><span class="fa fa-times" > delete </span></a></div>
       
          <table style="font-size:13px; " width="100%" id="table_data">  
              <tr ><th class="space">Project Name</th><td ><span class="edit_project_field"><?php echo $pro->project_name;?></span></td></tr>
              <tr ><th class="space">Project With</th><td ><span class="edit_project_field"><?php echo $pro->employment_organization;?></span></td></tr>
              <tr ><th class="space">Client Name</th><td ><span class="edit_project_field"><?php echo $pro->project_client_name;?></span></td></tr>
              <tr ><th class="space">Project Duration</th><td ><div class="row"><div class="col-md-6"><label>Start</label><br><?php echo $pro->project_start;?></div><div class="col-md-6"><label>End</label><br><?php echo $pro->project_to;?></span></div></div></td></tr>
              <tr ><th class="space">Project Description</th><td ><span class="edit_project_field"><?php echo $pro->project_description;?></span></td></tr>
          </table>
          <!--<div class="pull-right" id="project_btn" hidden><button type="button" class="btn btn-success btn-xs" value="project_update" id="save_project" name="save">save</button> <input type="button" id="cancel_project" class="btn btn-danger btn-xs" value="cancel"></div>-->          
                <hr style="border-top: 1px solid #ccc;"><?php $i++; }}?>
        </form>             
           </div>
              
              
          </div><br>
          
          
          <div class="modal fade" id="success_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div  class="modal-header" style="background:#36AB62;">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong><span id="success_msg"></span></strong></h4>
      </div>
    
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
          
          
          
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#ABB2B9" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong><span class='delete_name'></span></strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this <span class='delete_name'></span> ?</label> <br>
                  <button class="btn btn-default" id="project_delete">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><br>
          
          
          
          
          
          <div class="shadow" id="skill">               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Skills</u></b></h3><div class="pull-right"><a href="#skill" id="add_skill"><span class="fa fa-plus"> Add </span> </a></div>
             </div>
              
      <div class="box-footer text-black data" >
          
           <form id="new_skill_form" hidden>
            <table style="font-size:13px; " width="100%" id="table_data"> 
                 <tr ><th class="space">Skill Name</th>
                <td><input type="text" size="40" style="" value="" name="skill_name"></td><tr>
                 <tr ><th class="space">Skill Description</th>
                <td><textarea type="text"  rows="5" cols="40" value="" name="desc"></textarea></td><tr>
            </table>
               <div class="pull-right"><button type="button" class="btn btn-success btn-xs" value="add_new_skill" id="save_new_skill" name="save">save</button> <input type="button" id="cancel_new_skill" class="btn btn-danger btn-xs" value="cancel"></div>          
          <br>  <hr style="border-top: 1px solid #ccc;">
           </form>
          
          
          
          <form action="" id="skills">
               <h5><b><u>Computer Languages & Skills</u></b></h5>
               <?php if(isset($skills)){ foreach($skills as $skill){?>
               <div class="pull-right"><a href="#skills" onclick='delete_skill(<?php echo $skill->skill_id;?>,"skill_delete")'><span class="fa fa-times" style="color:red" > delete </span></a></div>
        <table style="font-size:13px; " width="100%" id="table_data">          
            <tr ><th class="space"><span class="edit_skill_field"><?php echo $skill->skill_name;?></span></th>
                <td><?php echo $skill->skill_description;?></td><tr>
                          
        </table><hr style="border-top: 1px solid #ccc;">
               <?php }}?>    

                       <!--<div class="pull-right" id="education_btn" hidden><input type="button" class="btn btn-success btn-xs" value="save" id="save_education" name="save"> <input type="button" id="cancel_education" class="btn btn-danger btn-xs" value="cancel"></div>-->  
              </form>
          
         
           </div>
             
          </div>
          
        
                  
          </div>
         
      
         
        
         
         </div>
         
         
         
   
        
       </div>  
             
   </section>
      
  </div> 