<style>
    
    .btn_color{
        color:white;
    }
    
    #profile_info{
         padding: 5px;
    color: white;
    margin-right: 17px;
    margin-left: 2px;
    background: #668cff;
    border-radius: 3px;
    border: 1px solid #7c92d4;
      
}
  .item-details
  {
      padding: 5px;
  }
  .item
  {
      margin-left: 5px;
  }
  .box-header
  {
      background: #3c8dbc;
    color: white;
  }
  
.emp_info{
    line-height: 50px;
}
    
    
     .modal-backdrop {background: none;}
    .data{
        padding:20px;
         line-height: 22px;
    }
    
    .form_label{
        color:#B2BABB;
        font-size: 15px;
        font-family: Times new Roman;
        font-weight: bold;
    }
    
    .space{
        padding:8px;
        width:50%;
    }
    
    #modal_dialog{
     width: 60%;
      overflow-y: initial !important
}
#modal_body{
  height: 420px;
  overflow-y: auto;
}

#education_body{
  height: 420px;
  overflow-y: auto;
}
#personal_body{
  height: 450px;
  overflow-y: auto;
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
     width: 60%;     
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

@media (max-width:800px){
    #modal_dialog,#modal_dialog1,#modal_dialog2,#modal_dialog3,#modal_dialog4,#modal_dialog5,#modal_dialog6,#modal_dialog7{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:768px){
    #modal_dialog,#modal_dialog1,#modal_dialog2,#modal_dialog3,#modal_dialog4,#modal_dialog5,#modal_dialog6,#modal_dialog7{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:320px){
    #modal_dialog,#modal_dialog1,#modal_dialog2,#modal_dialog3,#modal_dialog4,#modal_dialog5,#modal_dialog6,#modal_dialog7{
     width: 100%;
      overflow-y: initial !important
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
        <li><a href="<?php echo base_url(); ?>member/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
             </section>

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

                 $("#resume_name").html("This file is not allowed"); 
                 
            }
        });
        
        
        $('#photo').change(function(e){
            var fileName = e.target.files[0].name;
            
            var ext=fileName.split('.').pop();
            if(ext=="jpg" || ext=="jpeg" || ext=="png")
            {
               $("#photo_name").html(fileName);
            $("#resume_btn").prop('hidden',false); 
             save_method="photo_update";
                  data=new FormData(document.getElementById("photo_form"));
                  save(data,save_method);
            }else{

                 $("#photo_name").html("This file is not allowed"); 
                 
            }
        });
        
        
        
        
        
        
var start = 1975;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += '<option value="'+year+'">'+ year +'</option>';
//  
}
document.getElementById("passout").innerHTML = options;


        $("#present").click(function(){    
            var check=$("#present").prop("checked");
            if(check)
            {
                 $("#to").attr('disabled',true);
             }else{
                 $("#to").attr('disabled',false); 
             }
                 }
              );
        
        


         $("#add_skill").click(function(){      
                 $('#skill_form')[0].reset();
              $("#skill_modal").modal('show');
                 }
       );
       
       
         $("#add_employment").click(function(){
           
             $("#to").attr('disabled',false); 
              $("#period_err").html("");
             $('#employment_form')[0].reset();
              $("#employment_modal").modal('show');
       }
       ); 
            
       
       $("#add_project").click(function(){ 
           $('#project_form')[0].reset();
          $("#project_modal").modal('show');
      });    
        
        
        
        $("#edit_personal").click(function(){ 
           
            id=$("#member_id").val();

            method="edit_member";
            edit_form(id,method);
                
       }
       );
  
       
        $("#add_education").click(function(){ 
            $("#spl_field").prop('hidden',true);
            $('#education_form')[0].reset();
          $("#education_modal").modal('show');
       }
       ); 
       
 
            
     
       
            
       $("#cancel_resume").click(function(){
               
               $("#resume_name").html("");
               $("#resume_btn").prop("hidden",true);
              
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
               
               var s=$("#present").prop('checked');
              if(s==true)
              {
                  if($("#period").val()=="")
                  {
                      $("#period_err").html("Enter Notice Period");
                  }else{
                      $("#period_err").html("");
                      save(data,save_method);
                  }
                    
              }else{
                  save(data,save_method);
              }
             
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
       
              
        $("#save_skill").click(function(){
//            alert($("#save_skill").val());
               save_method=$("#save_skill").val();
               data=new FormData(document.getElementById("skill_form"));
                save(data,save_method);
             }
       );
       
       
       
        $("#state").change(function() {        
   var el = $(this) ;
              $("#city").html("");
              $("#city").append('<option value="">--Select City--</option>');              
var state=el.val();
        if(state)
        {
      $.ajax({
       url : "<?php echo site_url('index.php/member/Profile/show_cities')?>/" + state,        
       type: "GET",              
       dataType: "JSON",
       success: function(data)
       {        
          $.each(data,function(i,row)
          {          
              $("#city").append('<option value="'+ row.cityName +'">' + row.cityName+'</option>');
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

 $("#country").change(function() {        
   var el = $(this) ;
              $("#state").html("");
              $("#city").html("");
              $("#state").append('<option value="">--Select State--</option>');
              $("#city").append('<option value="">--Select City--</option>');

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
              $("#state").append('<option value="'+ row.stateID +'">' + row.stateName+'</option>');
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
 
 
 
 
 
 
   $("#edu_title").change(function() {

    var el = $(this) ;
//     $('#edu_name').prop('selectedIndex',0);
    $("#edu_name").html("");
var title=el.val();
          
       $.ajax({
        url : "<?php echo site_url('index.php/member/Profile/education_name')?>/" + title,        
        type: "GET",
               
        dataType: "JSON",
        success: function(data)
        {
//y          $("#edu_name").html("");
           $.each(data,function(i,row)
           {
            
               $("#edu_name").append('<option value="'+ row.medu_education+'">' + row.medu_education + '</option>');
           }
           );
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//          alert('Error...!');
        }
      });
    
     
  });
  
  
//     $("#university").change(function() {
//
//alert();
//    var el = $(this) ;
//$("#inst_name").val("");
//    
//var title=el.val();
//          
//       $.ajax({
//        url : "<?php echo site_url('index.php/member/Profile/get_university')?>/" + title,        
//        type: "GET",
//               
//        dataType: "JSON",
//        success: function(data)
//        {
////y          $("#edu_name").html("");
//           $.each(data,function(i,row)
//           {
//            
//               $("#data_list").append('<option value="'+ row.institute_name+'">' + row.institute_name + '</option>');
//           }
//           );
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
////          alert('Error...!');
//        }
//      });
//    
//     
//  });
  
  
  
  
  
   $("#edu_name").change(function() {

    var el = $(this) ;   
var edu_name=el.val();
//alert(edu_name);
    if(edu_name=="spl_field")
    {
        $("#spl_field").prop('hidden',false);
    }

     
  });
       
            
});
     var save_method;
     var data;
    
   
        function save(data,save_method)
    {     
        
//        alert($("#organization").val());
        if($("#org_error").val()!=" ")
        {
            $("#org_error").html("");
        }
     
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
//                alert(json.error);
               if(json.success)
               {                   
              location.reload();// for reload a page

               }
               if(json.org_error)
               {                   
             $("#org_error").html(json.org_error);

               }else{
                   $("#org_error").html("");
               }
               if(json.from_err)
               {
                   $("#from_err").html(json.from_err);
               }else{
                   $("#from_err").html("");
               }
                if(json.to_err)
               {
                   $("#to_err").html(json.to_err);
               }else{
                    $("#to_err").html("");
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
     
      function delete_employment(id,method)
     {
        $('.delete_name').html("Employment");
        save_method=method;
         $("#myModal").modal('show');
         $("#project_delete").attr('onclick','delete_menu('+id+')');
         
     }
     
     function delete_education(id,method)
     {
        $('.delete_name').html("Education");
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
     
       function edit_employment(id){   
           $("#to").attr('disabled',false); 
           $("#period_err").html("");
            method="edit_employment";
            edit_form(id,method);
       }
       
              
       function edit_project(id){               
          
            method="edit_project";
            edit_form(id,method);
       }
       
        function edit_education(id){               
       
            method="edit_education";
            edit_form(id,method);
       }
       
       function edit_skill(id){               
          
            method="edit_skill";
            edit_form(id,method);
       }
       
//          function search_title()
//    {
//        
//        $("#data_list").html("");
//       var title=$("#inst_name").val();
//    
//                       url="<?php echo base_url();?>member/Jobs/search_title/"+inst_name;
//        $.ajax({
//            url : url,
//            type: "GET",
//            dataType: "JSON",
//            success: function(data)
//            {
//               
//            $.each(data,function(i,row)
//           {            
//               
//               $("#data_list").append('<option>'+row.member_email+'</option>');
//           }
//           );
//                
//           },
//            error: function (jqXHR, textStatus, errorThrown)
//            {
//               // alert('Error deleting data');
//            }
//            
//        });
//    }
       
     
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
     
     function upload_photo()
     {
         $("#photo_modal").modal('show');
     }
     
     
     function edit_form(id,save_method)
     {
          
          $.ajax({
            url : "<?php echo base_url();?>member/Profile/"+save_method+"/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                $("#fname").val(data.member_fname);
                $("#lname").val(data.member_lname);
                $("#email").val(data.member_email);
                $("#mobile").val(data.member_mobile);
                $("#dob").val(data.member_dob);
                if(data.member_gender)
                {
                $("#gen").val(data.member_gender);
                }
                $("#state").val(data.member_state);
                // $("#city").append('<option value="'+data.member_city+'">'+data.member_city+'</option>');
                // $("#state").append('<option value="'+data.stateID+'">'+data.stateName+'</option>');
                $("#country").val(data.member_country);
                 if(data.member_marital_status)
                {
                $("#marital_status").val(data.member_marital_status);
                }
                $("#pincode").val(data.member_pincode);
                $("#address").val(data.member_address);

                if (data.model == "personal_modal") {
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
          }
                
//                alert(data.education_degree);
                 $("#edu_title").val(data.education_degree);
//                  $("#edu_name").val(data.education_name);
                   if(data.education_name=="")
                    {
                        $("#edu_name").val("spl_field");
                      
                    }else{$("#edu_name").append('<option value="'+data.education_name+'">'+data.education_name+'</option>')
                    $("#edu_name").val(data.education_name);}
                    if(data.education_specialization)
                    {
                        $("#edu_spl").val(data.education_specialization);
                        $("#spl_field").prop('hidden',false);
                    }else{$("#spl_field").prop('hidden',true);}
                $("#education_id").val(data.education_id);
        

                $("#percentage").val(data.education_percentage);
                $("#university").val(data.education_university);
                $("#inst_name").val(data.education_institute_name);
                $("#passout").val(data.education_passing_out);
                
                
                 $("#project_name").val(data.project_name);
                  $("#client").val(data.project_client_name);
                   $("#project_from").val(data.project_start);
                    $("#project_to").val(data.project_to);
                     $("#project_desc").val(data.project_description);
                     $("#project_id").val(data.project_id);
                     
                 $("#organization").val(data.employment_organization);
                 $("#emp_city").val(data.employment_city);
                 $("#designation").val(data.employment_designation);
                  $("#profile").val(data.employment_profile);
                   $("#from").val(data.employment_from);
                  
                   if(data.employment_to=="3000-01-01")
                   {
                       var d="<?php echo date("Y-m-d");?>";
//                       alert(d);
                       $("#to").val(d);
                   }else{
                   $("#to").val(data.employment_to);
                      }
                   if(data.employment_salary){
                       var s=data.employment_salary.split(".");
                        $("#lacsalary").val(s[0]);
                           $("#thsalary").val(s[1]);
                   }
                  

                     $("#period").val(data.employment_notice_period);
                     $("#employment_id").val(data.employment_id);

                     
                                        
                
                $("#skill_name").val(data.skill_name);
                $("#desc").val(data.skill_description);
                $("#skill_id").val(data.skill_id);
                

             $("#"+data.model).modal('show');
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               // alert('Error deleting data');
            }
        });
    
     }
        
             </script>
             
             <div class="row" id="profile_info">
                 <div class="row" style="margin-top:10px; margin-left:10px">
                     <div class="col-md-2 col-sm-2 col-xs-2">
                        
                         <button type="file" onclick="upload_photo()" class="pull-right"><i style="color:#668cff" class="fa fa-camera"></i></button><br>
                         <img src='<?php if(file_exists($member_data->member_profile_pic)){ echo base_url().$member_data->member_profile_pic; }else{echo base_url()."profile_pic/avatar.png";}?>' width='90px' height='90px'class='img-circle' alt='user-image'>
                     </div>
                     <?php
                     $org=$this->Employments_model->get_employment(array('member_id'=>$this->session->userdata('member_id')))
                     ?>
                     
                     <div class="col-md-6 col-sm-6 col-xs-12">
                     <label style="font-size:20px"><?php if(isset($member_data)){echo $member_data->member_fname." ".$member_data->member_lname;} ?></label><br>
                     <span><?php if(isset($org)){echo $org->employment_designation." at ".$org->employment_organization;}else{echo "Fresher";} ?></span>
                    </div>
                </div>
                 <div class="row" style="margin-left:10px">
                     <div class="col-md-2">
                         
                     </div>
                         <div class="col-md-3 col-sm-6 col-xs-12">
                             <div class="item-details"><i class="fa fa-map-marker"></i><span class="item"> <?php if(isset($member_data)){echo $member_data->member_city.",".$member_data->countryName;}?></span></div>
                             
                             <?php if(!empty($member_data->member_experience) && $member_data->member_experience!='0.0')
                                            {
                                            $exp=explode(".",$member_data->member_experience);
                                            
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
                             
                             <div class="item-details"><i class="fa fa-suitcase"></i><span class="item"> <?php echo $experience; ?> </span></div>
                             <?php if(!empty($member_data->member_anual_salary) && $member_data->member_anual_salary!='0.0' ){
                                          $sal=explode(".",$member_data->member_anual_salary);                                         
                                          if($sal[0]=="0")
                                            {
                                             $salary= $sal[1]." Thousand PA";  
                                            }elseif($sal[1]=="0")
                                            {
                                              $salary= $sal[0]." Lac PA";  
                                            }else
                                            {
                                           $salary= $sal[0]." Lac ". $sal[1]." Thousand PA";  
                                            }
                                            }
                                            else
                                            { $salary= "Not Mentioned";}
                                         
                                         ?>
                             <div class="item-details"><i class="fa fa-inr"></i><span class="item"> <?php echo $salary;  ?></span></div>

                         </div>
                         <div class="col-md-3">
                             <div class="item-details"><i class="fa fa-phone"></i><span class="item">&nbsp; <?php if(isset($member_data->member_mobile)){echo $member_data->member_mobile;} ?></span><br></div>
                             <div class="item-details"><i class="glyphicon glyphicon-envelope"></i><span class="item">&nbsp;<?php if(isset($member_data->member_email)){echo $member_data->member_email;} ?> </span></div>
                         </div>
                     </div>
                  <div class="row" style="margin-top:10px; margin-left:10px">
                     <div class="col-md-2">
                         
                     </div>
                     <div class="col-md-6">
                     
                    </div>
                </div>
               
                 
                 </div>
         
             <div class="row content">
             <div class="col-md-4" id="sideinfo" >
      
                 
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
                
             </div>
         <!--</div>-->
    
      <div class="col-md-8" style="color:white" id="info">
          
        <div class="shadow" id="personal"> 
              
         <div class="box-header" > <div class="row">          
          <div class="col-md-9 col-xs-9"><h3 class="box-title"><b>Personal Details</b></h3></div><div class="col-md-3 col-xs-3"><a href="#personal" id="edit_personal" class="btn_color"><span class="fa fa-pencil"> edit </span></a></div>
           </div>  </div>
      
      <div class="box-footer text-black data" >
          
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <input type="hidden" name="member_id" id="member_id" value="<?php echo $member_data->member_id;?>">
                    <Span class="form_label">Name</span><br>
                    <span><?php echo $member_data->member_fname." ".$member_data->member_lname;?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Email</span><br>
                 <span><?php echo $member_data->member_email;?></span>
            </div>   
           </div>
          <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Mobile</span><br>
                    <span><?php echo $member_data->member_mobile;?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Address</span><br>
                 <span><?php echo $member_data->member_address;?></span>
            </div>   
           </div>
          <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Pincode</span><br>
                    <span><?php echo $member_data->member_pincode;?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Marital Status</span><br>
                 <span><?php echo $member_data->member_marital_status;?></span>
            </div>   
           </div>
           <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12" >
                    <Span class="form_label">DOB</span><br>
                    <span><?php echo $member_data->member_dob;?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Gender</span><br>
                 <span><?php echo $member_data->member_gender;?></span>
            </div>   
           </div>
           <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">State</span><br>
                    <span><?php echo $member_data->stateName;?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">City</span><br>
                 <span><?php echo $member_data->member_city;?></span>
            </div>   
           </div>
           
          </div>
            </div><br>
          
          
            <div class="shadow" id="education"> 
              
                <div class="box-header" >   <div class="row">        
            <div class="col-md-9 col-sm-9 col-xs-9"> <h3 class="box-title"><b>Education Details</b></h3></div><div class="col-md-3 col-sm-3 col-xs-3"><a class="btn_color" href="#education" id="add_education"><span class="fa fa-plus"> Add </span></a> </div>
             </div></div>
      <div class="box-footer text-black data" >
         <?php if(isset($educations)){
             foreach($educations as $edu){?>    
           <div class="row">
              <div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-9 col-md-3 col-sm-3 col-xs-3">
                  <a href="#education" onclick='edit_education(<?php echo $edu->education_id;?>)'><span class="fa fa-pencil"></span></a> &nbsp; <a href="#education" onclick='delete_education(<?php echo $edu->education_id;?>,"education_delete")'><span class="fa fa-times"></span></a>
              </div>
          </div>
          <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Education Title</span><br>
                    <span><?php if(isset($edu->education_degree)){echo $edu->education_degree;}?></span>
            </div>   
         </div>
         <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Education Name</span><br>
                    <span><?php if(isset($edu->education_name)){echo $edu->education_name;}?></span>
            </div>   
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Specialization</span><br>
                 <span><?php if(isset($edu->education_specialization)){echo $edu->education_specialization;}?></span>
            </div>   
           </div>
          <div class="row">
<!--                <div class="col-md-6">
                    <Span class="form_label">University/Institute</span><br>
                    <span><?php if(isset($edu->education_university)){ echo $edu->education_university;}?></span>
                </div>   -->
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">University/Institute Name</span><br>
                    <span><?php if(isset($edu->education_institute_name)){echo $edu->education_institute_name;}?></span>
            </div>   
           </div>
           <div class="row">
<!--                <div class="col-md-6">
                    <Span class="form_label">Admission</span><br>
                    <span><?php if(isset($edu->education_passing_in)){ echo $edu->education_passing_in;}?></span>
            </div>   -->
            <div class="col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Percentage</span><br>
                    <span><?php if(isset($edu->education_percentage)){echo $edu->education_percentage."%";}?></span>
            </div>  
                  <div class="col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Pass Out</span><br>
                 <span><?php if(isset($edu->education_passing_out)){echo $edu->education_passing_out;}?></span>
            </div>   
           </div>
           <hr>
         <?php }} ?>
                 </div>
          </div><br>
          
          
          
          
           <div class="shadow" id="resume"> 
              
         <div class="box-header" >           
             <h3 class="box-title"><b>Resume</b></h3>
             </div>
      <form action="" id="resume_form" enctype="multipart/form-data">
      <div class="box-footer text-black data" >
        <div class='row'>
            <?php if(isset($member_data)){?>
            <div class="col-md-8"><label><?php if (!empty($member_data->member_resume)){ $resume=explode('/',$member_data->member_resume);echo $resume[1];}?></label><br>
            <span style="color:#B2BABB;">Uploaded On : <?php if (!empty($member_data->member_resume)){ $resume=explode('_',$member_data->member_resume);echo $resume[1];}?></span></div>
          <div class='col-md-4'> <?php if (!empty($member_data->member_resume)){?> <a href='<?php echo base_url().$member_data->member_resume;?>'><span style='font-size: 18px' class='fa fa-download'></span></a>
           <br><a href='#resume' onclick='delete_resume(<?php echo "$member_data->member_id"; ?>,"resume_delete")'><span class=''> DELETE RESUME</span></a></div><?php } ?>
                                        
           
  <?php }?>  </div>                 
       <br>
          <div id="resume_border">
             <label class="btn-bs-file btn-md btn-xs btn-sm btn-info">
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
         <div class="box-header" >  <div class="row">         
          <div class="col-md-9 col-sm-9 col-xs-9"><h3 class="box-title"><b>Employment Details</b></h3></div><div class="col-md-3 col-sm-3 col-xs-3"><a class="btn_color" href="#employment" id="add_employment"><span class="fa fa-plus"> Add </span></a> </div>
             </div></div>
      
      <div class="box-footer text-black data" >
          <?php if(isset($employments)){$i=1;
              foreach($employments as $emp)
                  {?>
          <div class="row">
              <div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-9 col-md-3 col-sm-3 col-xs-3">
                  <a href="#employment" onclick='edit_employment(<?php echo $emp->employment_id;?>)'><span class="fa fa-pencil"></span></a> &nbsp; <a href="#employment" onclick='delete_employment(<?php echo $emp->employment_id; ?>,"employment_delete")'><span class="fa fa-times"></span></a>
              </div>
          </div>
          
                  <div class="row"> 
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <!--<input type="hidden" name="member_id" id="member_id" value="<?php echo $emp->member_id;?>">-->
                    <Span class="form_label">Organization</span><br>
                    <span><?php echo $emp->employment_organization;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Company Location</span><br>
                 <span><?php echo $emp->employment_city;?></span>
            </div>   
           </div>
          
           <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Designation</span><br>
                    <span><?php echo $emp->employment_designation;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Work Profile</span><br>
                 <span><?php echo $emp->employment_profile;?></span>
            </div>   
           </div>
          
           <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Work From</span><br>
                    <span><?php echo $emp->employment_from;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Work To</span><br>
                 <span><?php 
                 if($emp->employment_to=="3000-01-01"){echo date("Y-m-d");}else{echo $emp->employment_to;}?></span>
            </div>   
           </div>
          
          <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Notice Period</span><br>
                    <span><?php echo $emp->employment_notice_period;?></span>
            </div> 
               <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Salary</span><br>
                    <?php if(!empty($emp->employment_salary) && $emp->employment_salary!='0.0' ){
                                          $sal=explode(".",$emp->employment_salary);                                         
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
                    <span><?php echo $salary;?></span>
            </div> 
                
           </div><hr>
                 <?php  
                 }}?>
        
         
          
           
            
           </div>
         
          </div><br>
          
          
                    <div  class="shadow" id="project">               
              <div class="box-header" > <div class="row">          
            <div class="col-md-9 col-sm-9 col-xs-9"> <h3 class="box-title"><b>Project Details</b></h3></div><div class="col-md-3 col-sm-3 col-xs-3"><a href="#project" class="btn_color" id="add_project"><span class="fa fa-plus"> Add </span></a> </div>
             </div>
                  </div>
              
               
              
       <div class="box-footer text-black data" >        
                  
              
            <?php if(isset($project_data)){
              foreach($project_data as $pro)
                  {?>
           
            <div class="row">
              <div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-9 col-md-3 col-sm-3 col-xs-3">
                  <a href="#project" onclick='edit_project(<?php echo $pro->project_id;?>)'><span class="fa fa-pencil"></span></a> &nbsp; <a href="#project" onclick='delete_project(<?php echo $pro->project_id; ?>,"project_delete")'><span class="fa fa-times"></span></a>
              </div>
          </div>
                  <div class="row"> 
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <!--<input type="hidden" name="member_id" id="member_id" value="<?php echo $pro->member_id;?>">-->
                    <Span class="form_label">Project Name</span><br>
                    <span><?php echo $pro->project_name;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Project With</span><br>
                 <span><?php echo $pro->employment_organization;?></span>
            </div>   
           </div>
          
          
            <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Project Start</span><br>
                    <span><?php echo $pro->project_start;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Project To</span><br>
                 <span><?php echo $pro->project_to;?></span>
            </div>   
           </div>
            <div class="row">
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                    <Span class="form_label">Client Name</span><br>
                    <span><?php echo $pro->project_client_name;?></span>
            </div>   
                  
           </div>
          
           <div class="row">
                <div class="col-md-12">
                    <Span class="form_label">Project Description</span><br>
                    <span><?php echo $pro->project_description;?></span>
            </div>   
                   
           </div>
          
         <hr>
            <?php  
                 }}?>     
              
         </div>
              </div><br>
              
              
              
              
          <div class="shadow" id="skill">               
         <div class="box-header" > <div class="row">
                 <div class="col-md-9 col-sm-9 col-xs-9">
             <h3 class="box-title"><b>Skills</b></h3></div><div class="col-md-3 col-sm-3 col-xs-3"><a class="btn_color" href="#skill" id="add_skill"><span class="fa fa-plus"> Add </span> </a></div>
             </div>
             </div>
              
      <div class="box-footer text-black data" >
                
            <?php if(isset($skills)){
              foreach($skills as $skill)
                  {?>
           <div class="row">
              <div class="col-md-offset-9 col-sm-offset-9 col-xs-offset-9 col-md-3 col-sm-3 col-xs-3">
                  <a href="#skill" onclick='edit_skill(<?php echo  $skill->skill_id;?>)'><span class="fa fa-pencil"></span></a> &nbsp; <a href="#skill" onclick='delete_skill(<?php echo $skill->skill_id; ?>,"skill_delete")'><span class="fa fa-times"></span></a>
              </div>
          </div>
                  <div class="row"> 
                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                    
                    <Span class="form_label">Skill Name</span><br>
                    <span><?php echo $skill->skill_name;?></span>
            </div>   
                  <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                 <Span class="form_label">Skill Description</span><br>
                 <span><?php echo $skill->skill_description;?></span>
            </div>   
           </div>
          
         
        
                 <?php  
                 }}?>
           </div>
             
          </div>
              
      </div>
         </div>
     
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
  <div class="modal-dialog" id="modal_dialog7">
    <div class="modal-content">
      <div style="background:#ABB2B9" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong><span class='delete_name'></span></strong></h4></center>
      </div>
      <div style="background:#F2F3F4" class="modal-body">
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
       
             
             
             <div class="modal fade" id="personal_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog1">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Personal Detail</h4></center>
        </div>
        <div class="modal-body" id="personal_body">         	
    				
    			<div class="panel-body">
                            <form action="" id="personal_form">
                                <div class="form-group">
    			<div class="row">
                             
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">First Name</label>
                                        <input type="text" placeholder="First Name" value="" class="form-control required" id="fname" name="fname" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>                                                          
                                </div>
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Last Name</label>
                                        <input type="text" placeholder="Last Name" value="" class="form-control" id="lname"  name="lname" maxlength="128" required>
                                      <span class="text-danger" id="lname_err"></span>                                   
                                         </div>
                            </div><br>
                                    <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Email</label>
                                        <input type="Email" placeholder="Email" value="" class="form-control required" id="email" name="email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                    </div>                         
                                    
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Mobile</label>
                                        <input type="text" placeholder="Mobile" value='' class="form-control required" id="mobile" name="mobile" maxlength="11" required>
                                        <span class="text-danger" id="mobile_err"></span>                                                          
                                </div>
                                        </div><br>
                                    
                                    	<div class="row">
                             
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">DOB</label>
                                        <input type="date" name='dob' value='' id="dob" placeholder="DOB" class="form-control">
                                        <span class="text-danger" id="dob_err"></span>                                                          
                                </div>
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Gender</label>
                                        <select class="form-control" name='gen'id='gen'>
                                            <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                        </select>
                                      <span class="text-danger" id="lname_err"></span>                                   
                                         </div>
                            </div><br>

                                     <div class="row">                             
                                <div class="col-md-6  ">                             
                                        <label for="fname">Address</label>
                                        <textarea name="address" id="address" value="" class="form-control" rows="5"></textarea>
                                        <span class="text-danger" id="pincode_err"></span>                                                          
                                </div>
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Marital Status</label>
                                        <select class="form-control" name='marital_status' id='marital_status'>
                                             <option value="Unmarried">Unmarried</option>
                                            <option value="Married">Married</option>
                                            
                                        </select>
                                      <span class="text-danger" id="marital_err"></span>                                   
                                         </div>
                                </div><br>
                            
                                     <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Country</label><span style="color: red">*</span>
                        <select name="country" id="country" class="form-control" required>
                                    <option value="">-- Select Country --</option>
                                    <?php if(isset($country)){
                                        foreach($country as $country)
                                        { ?>
                                           <option value="<?php echo $country->countryID; ?>"><?php echo $country->countryName; ?></option>
                                       <?php }
                                    }?>
                                 
                                    
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>

                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State</label><span style="color: red">*</span>
                        <select name="state" id="state" class="form-control" required>
                                    <!--<option value="Maharashtra">Maharashtra</option>-->
                        </select>
                        <span class="text-danger"><?php echo form_error('state'); ?></span>

                    </div>
                    
                    </div><br>
                           
                            <div class="row">
                              <div class="col-md-6">
                                    <label class="form-label">City</label><span style="color: red">*</span>
                                    <select name="city" id="city" class="form-control" required>
                                           
                                     </select>
                                <span class="text-danger"><?php echo form_error('city'); ?></span>

                               </div>                             
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                             
                                        <label for="fname">Pincode</label>
                                        <input type="text" name='pincode' value='' id="pincode" placeholder="Pincode" class="form-control">
                                        <span class="text-danger" id="pincode_err"></span>                                                          
                                </div>
                            </div>
                                    
                        </div>
                                </form>
                            </div>    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="member_update" id="save_personal">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
             
             
             
             
             
     <div class="modal fade" id="education_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog2">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Education</h4></center>
        </div>
        <div class="modal-body" id="educatio_body">         	
    					
    			<div class="panel-body">
                            <form action="" id="education_form">
                                 <div class="form-group">
    			<div class="row">
                             <input type="hidden" name="education_id" id="education_id" value="">
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Title</label>
                                        <select  id="edu_title" name="edu_title" class="form-control">
                                            <option>Select Title</option>
                                            <option value="Graduation">Graduation</option>
                                            <option value="Postgraduation">Post Graduation</option>
                                            <option value="Doctarate">Doctarate</option>
                                        </select>
                                </div>
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Education/Degree</label>
                                       <select id="edu_name" name="edu_name" class="form-control">
                                           <option>--- Select Education ---</option>
                                           <option value="spl_field">other</option>
                                        </select>
                                         </div>
                            </div>
                             <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12" id="spl_field" hidden>                             
                                        <label for="fname">Specialization</label>
<!--                                          <select id="edu_spl" name="edu_spl" class="form-control">
                                           <option>--- Select Specialization ---</option>
                                        </select>-->
                                        <input type="text" id="edu_spl" name="edu_spl" class="form-control">
                                    </div></div><br>
                                    
                                    <div class="row">
<!--                                    <div class="col-md-6  ">                             
                                        <label for="fname">University/Institute</label>
                                        <select class="form-control required" id="university" name="university">
                                            <option>-- Select University/Institute --</option>
                                            <option value="University">University</option>
                                            <option value="Institute">Institute</option>
                                        </select>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                    </div>-->
                                        <div class="col-md-6 col-md-6 col-sm-6 col-xs-12"> 
                                            <label for="fname">University/Institute Name</label>
                                            <select class="form-control"  id="inst_name" name="inst_title">
                                                <?php if(isset($institutes)){
                                                    foreach($institutes as $inst){?>
                                        <option value="<?php echo $inst->institute_name;?>"><?php echo $inst->institute_name;?></option>
                                                <?php } }?>
                                        </select>
                                       <!--<input list="data_list"  type="text" placeholder="University/Institute Name" class="form-control text_design" name="inst_title">-->
                                        </div>
                                    </div>
                                     <div class="row">
<!--                                    <div class="col-md-6  ">                             
                                        <label for="fname">Type</label>
                                       <select class="form-control" name='type' id='type'>
                                            <option value="0">Select Job Type</option>
                                             <option value="Full Time">Full Time</option>
                                             <option value="Part Time">Part Time</option>
                                             <option value="Internship">Internship</option> 
                                             <option value="Temporary">Temporary</option> 
                                        </select>
                                        <span class="text-danger" id="type_err"></span>                                                          
                                </div>-->
                                        </div><br>
                                    
                                    	<div class="row">
                             
<!--                                <div class="col-md-6  ">                             
                                        <label for="fname">Admission</label>
                                        <select class="form-control" name='passin'id='passin'></select>
                                        <span class="text-danger" id="add_err"></span>                                                          
                                </div>-->
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Pass Out</label>
                                        <select class="form-control" name='passout'id='passout'>
                                          
                                        </select>
                                      <span class="text-danger" id="lname_err"></span>                                   
                                         </div>
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Percentage</label>
                                        <input type="text" class="form-control" name="percentage" id="percentage" placeholder="0.1% to 100%" maxlength="6">
                                        <span class="text-danger" id="add_err"></span>                                                          
                                </div>
                            </div><br>
                                     
                                     <div class="row">
                             
                               
                               
                            </div>
                                    
                                                                       
                        </div> 
                            </form>
                            </div>    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="education_update" id="save_education">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>    
             
             
             <div class="modal fade" id="employment_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog3">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Employment</h4></center>
        </div>
        <div class="modal-body" id="employment_body">         	
    					
    			<div class="panel-body">
                            <form action="" id="employment_form">
                                  <div class="form-group">
    			<div class="row">
                             <input type='hidden' id='employment_id' name="employment_id" value="">
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                    <label for="fname">Organization</label> <span class="text-danger"> *</span>
                                        <input type="text" placeholder="Company Name" value="" class="form-control required" id="organization" name="organization" maxlength="128" required>
                                        <span class="text-danger" id="org_error"></span>                                                          
                                </div>
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Location</label>
                                        <input type="text" value="" name="city" id="emp_city" class="form-control">
<!--                                        <select name="city" id="emp_city" class="form-control">
                                            <option value="">Select City</option>
                                            <?php if(isset($cities)){ foreach($cities as $city){?>
                                            <option value="<?php echo $city->city_name;?>"><?php echo $city->city_name; ?></option>
                                            <?php } }?>
                                        </select>-->
                                      <span class="text-danger" id="city_err"></span>                                   
                                         </div>
                            </div><br>
                                    <div class="row">
                                    <div class="col-md-12  ">                             
                                        <label for="fname">Designation</label>
                                        <input type="text" placeholder="Designation" value="" class="form-control required" id="designation" name="designation" maxlength="128" required>
                                        <span class="text-danger" id="designation_err"></span>                                                          
                                </div>
                                        </div><br>
                                    
                                     <div class="row">
                                    <div class="col-md-12  ">                             
                                        <label for="fname">Work Profile</label>
                                        <input type="text" placeholder="Work Profile" value='' class="form-control required" id="profile" name="profile" maxlength="128" required>
                                        <span class="text-danger" id="profile_err"></span>                                                          
                                </div>
                                        </div><br>
                                    
                                    	<div class="row">
                             
                                <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Work From</label> <span class="text-danger"> *</span>
                                        <input type="date" value="" name="from" id="from" class="form-control">
<!--                                        <select class="form-control" name="from" id="from"></select>
                                                                                                 
                                </div>
                                             <div class="col-md-6  ">                             
                                        <label for="fname">Month</label>
                                        <select class="form-control" name="month" id="month">
                                            <option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
                                        </select>-->
                                        <span class="text-danger" id="from_err"></span>                                                          
                                </div>
                                             <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">                                   
                                        <label for="lname">Work To</label> <span class="text-danger"> *</span>
                                        <input type="date" name="to" value="" id="to" max="<?php echo date("Y-m-d");?>" class="form-control"><br>
                                        <input type="checkbox" name="present" id="present" value=""> <span> <b>Present</b> </span>
                                      <span class="text-danger" id="to_err"></span>                                   
                                         </div>
                                
                            </div><br>
                           
                                     <div class="row">
                                         
                      <div class="col-md-3">
                        <label class="form-label">Salary</label> <span style="font-size:12px;">(per anual)</span>
                         <select type="text" name="lacsalary" id="lacsalary" class="form-control">
                             <option value="0">None</option>
                              <script>
                               var sal = 1;
                               var sal_end = 99;
                                var options = "";
                                for(var dim = sal ; dim <=sal_end; dim++){
//                                    alert(dim);
//                            $("#lacsalary").append('<option value="'+dim+'">'+ dim +'</option>');
                             if(dim==1)
                               {
                             $("#lacsalary").append('<option value="'+dim+'">'+ dim +' Lac</option>');
                                }else{
                             $("#lacsalary").append('<option value="'+dim+'">'+ dim +' Lacs</option>');       
                                }
                              }
                               </script>
                                                   
                        </select>
                        <span class="text-danger"></span>
                      </div>
                          <script>
                                $(document).ready(function(){
                                   $("#present").click(function(){
                                 var s=$('[name="present"]').prop("checked");
                                if(s==true)
                                {
                                    $("#period_field").prop('hidden',false);
                                }else{
                                    $("#period_field").prop('hidden',true);
                                }
                            });
                               
                                });
                               
                                </script>               
                    <div class="col-md-3"> <br>
                        <label class="form-label"></label> <span style="font-size:12px;"></span>
                       <select type="text" id="thsalary" name="thsalary" class="form-control">  
                            <option value="0">None</option>
                             <option value="10">10 Thousands</option>
                             <option value="20">20 Thousands</option>
                             <option value="30">30 Thousands</option>
                             <option value="40">40 Thousands</option>
                             <option value="50">50 Thousands</option>
                             <option value="60">60 Thousands</option>
                             <option value="70">70 Thousands</option>
                             <option value="80">80 Thousands</option>
                             <option value="90">90 Thousands</option>    
                        </select>
                        <span class="text-danger" id="salary_error"><?php echo form_error('state'); ?></span>
                    </div>
                    
                    <div id="period_field" class="col-md-6" hidden>
                        <label class="form-label">Notice Period</label> <span class="text-danger"> *</span>
                        <input type="text" class="form-control" name="period" value="" placeholder="1 year 2 month" id="period">
                        <span class="text-danger" id="period_err"><?php echo form_error('state'); ?></span>
                    </div>
                                         </div>
                            <div class="row">                   
                   
                                         
                   
                    
                    </div>
                                    
                        </div>
                            </form>
                            </div>    			
    		</div>         
    	 <div class="modal-footer">
            <button type="button" class="btn btn-primary" value="employment_update" id="save_employment">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
             
             
             <div class="modal fade" id="project_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog4">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Project</h4></center>
        </div>
        <div class="modal-body" id="project_body">         	
    				
    			<div class="panel-body">
                            <form action="" id="project_form">
                                <input type="hidden" id="project_id" name="project_id" value="">
                                  <div class="form-group">
    			<div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Project Name</label>
                                        <input type="text" placeholder="Project Name" value="" class="form-control required" id="project_name" name="project_name" maxlength="128" required>
                                        <span class="text-danger" id="org_err"></span>                                                          
                                </div>
                               
                            </div><br>
                                    <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Client Name</label>
                                        <input type="text" placeholder="Client Name" value="" class="form-control required" id="client" name="client" maxlength="128" required>
                                        <span class="text-danger" id="designation_err"></span>                                                          
                                </div>
                                         <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Project With</label>
                                        <select class="form-control" name="emp_id" id="emp_id">
                                            <?php if(isset($employments)){foreach($employments as $emp){?>
                                            <option value="<?php echo $emp->employment_id;?>"><?php echo $emp->employment_organization?></option>    
                                           <?php }}?>
                                            
                                        </select>
                                        <span class="text-danger" id="emp_err"></span>                                                          
                                </div>
                                        </div><br>
                                    
                                     <div class="row">
                                    <div class="col-md-6  ">                             
                                        <label for="fname">Project Start</label>
                                        <input type="date" placeholder="Project Start" value='' class="form-control required" id="project_from" name="from" maxlength="11" required>
                                        <span class="text-danger" id="profile_err"></span>                                                          
                                </div>
                                         <div class="col-md-6 col-md-6 col-sm-6 col-xs-12 ">                             
                                        <label for="fname">Project To</label>
                                        <input type="date" placeholder="Project To" value='' class="form-control required" id="project_to" name="to" maxlength="11" required>
                                        <span class="text-danger" id="profile_err"></span>                                                          
                                        </div>
                                        </div><br>
                                    
                                    	<div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Project Description</label>
                                        <textarea class="form-control" rows="6" name="desc" id="project_desc"></textarea>
                                        <span class="text-danger" id="desc_err"></span>                                                          
                                </div>
                               
                                     </div>
                                 
                                    
                                  </div>  
                                         </form>	
    			              </div>    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="project_update" id="save_project">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
             
             
             <div class="modal fade" id="skill_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog5">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Skills</h4></center>
        </div>
        <div class="modal-body" id="skill_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="skill_form">  
                               <input type='hidden' name="skill_id" id='skill_id' value=''>
                                <div class="form-group">
    			<div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Skill Name</label>
                                        <input type="text" placeholder="Skill Name" value="" class="form-control required" id="skill_name" name="skill_name" maxlength="128" required>
                                        <span class="text-danger" id="skill_error"></span>                                                          
                                </div>
                             
                            </div><br>
                                    
                                    <div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Description</label>
                                        <textarea placeholder="Skill Description" value="" rows="6" cols="" class="form-control required" id="desc" name="desc" maxlength="60" required></textarea>
                                        <span class="text-danger" id="fname_err"></span>                                                          
                                </div>
                             
                            </div>
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="skill_update" id="save_skill">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
          </div>   




      
             <div class="modal fade" id="photo_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog6">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Upload Photo</h4></center>
        </div>
        <div class="modal-body" id="photo_body">      				
    			<div class="panel-body">
    			  <form action="" id="photo_form"> 
                              <center>
                              <div class="shadow" style="width:120px; height:130px"> 
                                  <img src='<?php if(file_exists($member_data->member_profile_pic)){ echo base_url().$member_data->member_profile_pic; }else{echo base_url()."profile_pic/avatar.png";}?>' width='120px' height='130px'>
                              </div><br><br>
                               <label class="btn-bs-file btn-md btn-xs btn-sm btn-info">
                            Upload Photo
                            <input type="file" name="photo" id="photo" value=""/> 
                        </label> <br>
                              <span style='color:#B2BABB;'>Format Support: jpg,jpeg,png</span><br>
                              <span id="photo_name"></span>
                              </center>
                          </form>
    			</div>                              			
    		</div>         
    	
    </div>             
        </div>        
      </div>
          </div> 

             
       </section>
      </div>    
         
      
         
        
         
         
         
   
        
      
             
 