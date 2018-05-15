<style>
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
    box-shadow: 5px 5px 10px #CCD1D1;
}

#sideinfo {
   
    padding: 10px;
    box-shadow: 5px 5px 10px #CCD1D1;
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

      <section class="content" >

         <script>
              $(document).ready(function(){
                  
                  
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
                  
                  $("#city").val('<?php if(isset($member_data)){echo $member_data->member_city;}?>');
//                  $("#dob").val('<?php if(isset($member_data)){echo $member_data->member_dob;}?>');
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
       
       
       
       
        $("#education_box").click(function(){
               $("#education").prop("hidden",false);
             }
       );
       
       $("#resume_box").click(function(){
               $("#resume").prop("hidden",false);
             }
       );
       
       $("#employment_box").click(function(){
               $("#employment").prop("hidden",false);
             }
       );
       
       $("#skill_box").click(function(){
               $("#skill").prop("hidden",false);
             }
       );
       $("#project_box").click(function(){
               $("#project").prop("hidden",false);
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
             }
                     
        $("#save_employment").click(function(){
               save_method=$("#save_employment").val();
               data=new FormData(document.getElementById("employment_form"));
                save(data,save_method);
             }
       );
});
     var save_method;
     var data;YZZ
    
   
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
               if(json.success)
               {                   
              location.reload();// for reload a page
               }
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
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
           <a href="#">Personal Details</a> 
           <a href="#" id="education_box">Education Details</a> 
           <a href="#" id="resume_box">Upload Resume</a> 
           <a href="#" id="employment_box">Employment Details</a>
            <a href="#" id="project_box">Project Details</a>
           <a href="#" id="skill_box">Skills Details</a> 


 
         </li>
             
      </ul><br>
      </div>                      
     </div>                
                
             </section>
         <!--</div>-->
     <div class="row content">
      <section class="col-md-8" style="color:white" id="info">
          
        <div class="shadow" id="personal"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Personal Details</u></b></h3><div class="pull-right"><a href="#" id="edit_personal"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_personal" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
      <form action="" id="personal_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; "  width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Name</th><td ><span class="edit_field"><?php echo $member_data->member_fname." ".$member_data->member_lname?></span><span class="show_field" hidden><input type="text" name="fname" id="fname" style="border: none; text-decoration: underline;" value="<?php echo $member_data->member_fname;?>" autofocus="autofocus"><input type="text" name="lname" id="lname" style="border: none; text-decoration: underline;" value="<?php echo $member_data->member_lname;?>"></span></td><tr>
       <tr><th class="space">Email  </th><td> <span class="edit_field"><?php echo $member_data->member_email;?></span><span class="show_field"hidden><input type="text" name="email" id="email" style="border: none; text-decoration: underline;" readonly value="<?php echo $member_data->member_email;?>"></span> </td></tr>
                   <tr><th class="space">Mobile</th><td><span class="edit_field"><?php echo $member_data->member_mobile;?></span><span class="show_field"hidden><input type="text" name="mobile" id="mobile" style="border: none; text-decoration: underline;" readonly value="<?php echo $member_data->member_mobile;?>"></span></td></tr>

              <tr><th class="space">Date Of Birth  </th> <td><span class="edit_field"><?php echo $member_data->member_dob;?></span><span class="show_field"hidden><input type="date" name="dob" id="dob" style="border: none; text-decoration: underline;" placeholder="DOB" value="<?php echo $member_data->member_dob;?>"></span></td></tr>

              <tr><th class="space">Location  </th><td><span class="edit_field"><?php echo $member_data->member_city;?></span><span class="show_field"hidden><select style="border: none;" id="city" name="city"><?php if(isset($cities)){foreach($cities as $city){ echo '<option value="'.$city->city_name.'">'.$city->city_name.'</option>';}}?></select></span></td></tr>

                            <tr><th class="space">Gender  </th><td><span class="edit_field"><?php echo $member_data->member_gender;?></span><span class="show_field"hidden>Male<input type="radio" name="gen" id="Male" value="Male"> / Female <input type="radio" name="gen" id="Female" value="Female"></span></td></tr>
            <?php }?>                   
        </table>

                       <div class="pull-right" id="personal_btn" hidden><button type="button" class="btn btn-success btn-xs" value="member_update" id="save_personal">Save</button> <input type="button" id="cancel_personal" class="btn btn-danger btn-xs" value="cancel"></div>  
             
           </div>
          </form>
          </div>
          
          
            <div class="shadow" hidden id="education"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Education Details</u></b></h3><div class="pull-right"><a href="#" id="edit_education"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_education" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
      <form action="" id="education_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Qualification</th><td ><span class="edit_education_field"><?php echo $member_data->education_degree?></span><span class="show_education_field" hidden><input type="text" name="degree" id="degree" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_degree;?>" placeholder="Qualification" autofocus="autofocus"></span></td><tr>
            <tr><th class="space">Education Name  </th><td> <span class="edit_education_field"><?php echo $member_data->education_name;?></span><span class="show_education_field"hidden><input type="text" name="education_name" id="education_name" style="border: none; text-decoration: underline;" placeholder="Education Name" value="<?php echo $member_data->education_name;?>"></span> </td></tr>
                   <tr><th class="space">Specialization</th><td><span class="edit_education_field"><?php echo $member_data->education_specialization;?></span><span class="show_education_field"hidden><input type="text" name="specialization" id="specialization" style="border: none; text-decoration: underline;" placeholder="Specialization Field" value="<?php echo $member_data->education_specialization;?>"></span></td></tr>
               <tr><th class="space">University  </th><td> <span class="edit_education_field"><?php echo $member_data->education_university;?></span><span class="show_education_field"hidden><input type="text" name="university" id="university" style="border: none; text-decoration: underline;" placeholder="University" value="<?php echo $member_data->education_university;?>"></span> </td></tr>
              <tr><th class="space">Education Type  </th><td><span class="edit_education_field"><?php echo $member_data->education_type;?></span><span class="show_education_field"hidden><select style="border: none;" id="type" name="type"><option value="Full Time">Full Time</option><option value="Part Time">Part Time</option></select></span></td></tr>
              <tr><th class="space">Academic Year  </th><td><span class="edit_education_field"><div class="row"><div class="col-md-6"><label>Addmission</label><br><?php echo $member_data->education_passing_in;?></div><div class="col-md-6"><label>Pass Out</label><br><?php echo $member_data->education_passing_out;?></div></div></span><span class="show_education_field"hidden><div class="row"><div class="col-md-6"><label>Addmission</label><br><select id="passin" name="passin" style="border:none;"></select></div><div class="col-md-6"><label>Pass Out</label><br><select id="passout" name="passout" style="border:none;"></select></div></div></span></td></tr>
               <tr ><th class="space">Percentage </th><td ><span class="edit_education_field"><?php echo $member_data->education_percentage?></span><span class="show_education_field" hidden><input type="text" name="percentage" id="percentage" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_percentage;?>" placeholder="Percentage"></span></td><tr>
               
  <?php }?>                   
        </table>

          <div class="pull-right" id="education_btn" hidden><button type="button" class="btn btn-success btn-xs" value="education_update" id="save_education">Save</button> <input type="button" id="cancel_education" class="btn btn-danger btn-xs" value="cancel"></div>  
             
           </div>
          </form>
          </div>
          
          
          
          
           <div class="shadow" hidden id="resume"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Resume</u></b></h3><div class="pull-right"><a href="#" id="edit_resume"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_resume" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
      <form action="" id="resume_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><td class="space"><a href="#"><span><?php echo $member_data->member_resume?></span></a></td><td ><span class="edit_education_field"><?php echo $member_data->education_degree?></span><span class="show_education_field" hidden><input type="text" name="degree" id="degree" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_degree;?>" placeholder="Qualification" autofocus="autofocus"></span></td><tr>
           
  <?php }?>                   
        </table>

                       <div class="pull-right" id="education_btn" hidden><input type="button" class="btn btn-success btn-xs" value="save" id="save_education" name="save"> <input type="button" id="cancel_education" class="btn btn-danger btn-xs" value="cancel"></div>  
             
           </div>
          </form>
          </div>
          
          
          
           <div  class="shadow" id="employment" hidden>               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Employement Details</u></b></h3><div class="pull-right"><a href="#" id="edit_employment"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_employment" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
      <form action="" id="employment_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($member_data)){?>
            <tr ><th class="space">Organization</th><td ><span class="edit_employment_field"><?php echo $member_data->employment_organization?></span><span class="show_employment_field" hidden><input type="text" name="organization" id="organization" style="border: none; text-decoration: underline;" value="<?php echo $member_data->employment_organization;?>" placeholder="Company Name" autofocus="autofocus"></span></td><tr>
              <tr><th class="space">Company Location</th><td><span class="edit_employment_field"><?php echo $member_data->employment_city;?></span><span class="show_employment_field"hidden><input type="text" name="city" id="city" style="border: none; text-decoration: underline;" placeholder="Company Location" value="<?php echo $member_data->employment_city;?>"></span></td></tr>
               <tr><th class="space">Designation  </th><td> <span class="edit_employment_field"><?php echo $member_data->employment_designation;?></span><span class="show_employment_field"hidden><input type="text" name="designation" id="designation" style="border: none; text-decoration: underline;" placeholder="Job Post" value="<?php echo $member_data->employment_designation;?>"></span> </td></tr>
              <tr ><th class="space">Work Profile </th><td ><span class="edit_employment_field"><?php echo $member_data->education_degree?></span><span class="show_employment_field" hidden><input type="text" name="percentage" id="percentage" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_percentage;?>" placeholder="Percentage"></span></td><tr>
              <tr><th class="space">Work From  </th><td><span class="edit_employment_field"><div class="row"><div class="col-md-6"><label>From</label><br><?php echo $member_data->education_passing_in;?></div><div class="col-md-6"><label>To</label><br><?php echo $member_data->education_passing_out;?></div></div></span><span class="show_employment_field"hidden><div class="row"><div class="col-md-6"><label>From</label><br><select id="from" style="border:none;"></select></div><div class="col-md-6"><label>To</label><br><select id="to" style="border:none;"></select></div></div></span></td></tr>
               <tr ><th class="space">Notice Period </th><td ><span class="edit_employment_field"><?php echo $member_data->employment_notice_period?></span><span class="show_employment_field" hidden><input type="text" name="period" id="period" style="border: none; text-decoration: underline;" value="<?php echo $member_data->employment_notice_period;?>" placeholder="1 Year 6 month"></span></td><tr>
               
  <?php }?>                   
        </table>
          <div class="pull-right" id="employment_btn" hidden><button type="button" class="btn btn-success btn-xs" value="employment_update" id="save_employment">Save</button> <input type="button" id="cancel_employment" class="btn btn-danger btn-xs" value="cancel"></div>  
            
           </div>
          </form>
          </div>
          
          
          <div  class="shadow" id="project" hidden>               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Project Details</u></b></h3><div class="pull-right"><a href="#" id="edit_project"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_project" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
      <form action="" id="project_form">
      <div class="box-footer text-black data" >
        <table style="font-size:13px; " width="100%" id="table_data">  
            <?php if(isset($project_data)){?>
            <tr ><th class="space">Project Name</th><td ><span class="edit_project_field"><?php echo $member_data->employment_organization?></span><span class="show_employment_field" hidden><input type="text" name="organization" id="organization" style="border: none; text-decoration: underline;" value="<?php echo $member_data->employment_organization;?>" placeholder="Company Name" autofocus="autofocus"></span></td><tr>
              <tr><th class="space"></th><td><span class="edit_project_field"><?php echo $member_data->employment_city;?></span><span class="show_project_field"hidden><input type="text" name="city" id="city" style="border: none; text-decoration: underline;" placeholder="Company Location" value="<?php echo $member_data->employment_city;?>"></span></td></tr>
               <tr><th class="space">Designation  </th><td> <span class="edit_project_field"><?php echo $member_data->employment_designation;?></span><span class="show_project_field"hidden><input type="text" name="designation" id="designation" style="border: none; text-decoration: underline;" placeholder="Job Post" value="<?php echo $member_data->employment_designation;?>"></span> </td></tr>
              <tr ><th class="space">Work Profile </th><td ><span class="edit_project_field"><?php echo $member_data->education_degree?></span><span class="show_project_field" hidden><input type="text" name="percentage" id="percentage" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_percentage;?>" placeholder="Percentage"></span></td><tr>
              <tr><th class="space">Work From  </th><td><span class="edit_project_field"><div class="row"><div class="col-md-6"><label>From</label><br><?php echo $member_data->education_passing_in;?></div><div class="col-md-6"><label>To</label><br><?php echo $member_data->education_passing_out;?></div></div></span><span class="show_project_field"hidden><div class="row"><div class="col-md-6"><label>From</label><br><select id="from" style="border:none;"></select></div><div class="col-md-6"><label>To</label><br><select id="to" style="border:none;"></select></div></div></span></td></tr>
               <tr ><th class="space">Notice Period </th><td ><span class="edit_project_field"><?php echo $member_data->employment_notice_period?></span><span class="show_employment_field" hidden><input type="text" name="period" id="period" style="border: none; text-decoration: underline;" value="<?php echo $member_data->project_notice_period;?>" placeholder="1 Year 6 month"></span></td><tr>
               
  <?php }?>                   
        </table>
          <div class="pull-right" id="project_btn" hidden><input type="button" class="btn btn-success btn-xs" value="save" id="save_project" name="save"> <input type="button" id="cancel_project" class="btn btn-danger btn-xs" value="cancel"></div>  
            
           </div>
          </form>
          </div>
          
          
          <div hidden class="shadow" id="skill">               
         <div class="box-header" >           
             <h3 class="box-title"><b><u>Skills</u></b></h3><div class="pull-right"><a href="#" id="edit_skill"><span class="fa fa-pencil"> edit </span></a> &nbsp;&nbsp;<button type="button" id="close_skill" class="btn btn-danger btn-xs" value="cancel"><i class="fa fa-times"></i></button></div>
             </div>
              
      <div class="box-footer text-black data" >
          <form action="" id="skills">
        <table style="font-size:13px; " width="100%" id="table_data"> 
            <h5><b><u>Computer Languages & Skills</u></5></h5>
            <?php if(isset($skill_data)){?>
            <tr ><th class="space">PHP</th><td ><span class="edit_education_field"><?php echo $member_data->education_degree?></span><span class="show_education_field" hidden><input type="text" name="degree" id="degree" style="border: none; text-decoration: underline;" value="<?php echo $member_data->education_degree;?>" placeholder="Qualification" autofocus="autofocus"></span></td><tr>
            
  <?php }?>                   
        </table>

                       <div class="pull-right" id="education_btn" hidden><input type="button" class="btn btn-success btn-xs" value="save" id="save_education" name="save"> <input type="button" id="cancel_education" class="btn btn-danger btn-xs" value="cancel"></div>  
              </form>
           </div>
             
          </div>
          
        
                  
          </section>
         
      
         
        
         
         </div>
         
         
         
   
        
       </div>  
             
   </section>
      
  </div> 