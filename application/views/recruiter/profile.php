<style type="text/css">

 .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 60%;
      overflow-y: initial !important
}
.modal-body{
  /*height: 420px;*/
  overflow-y: auto;
}
	#div {
    border: 2px solid #EAEDED;
    /*border-color: 1px #CCD1D1;*/
    width: 300px;
    height: 200px;
    padding: 15px;
    margin-left: 20px;
    background-color: white;
    box-shadow: 5px 5px 10px grey;
}	
#div1 {
    border: 1px solid #EAEDED;
    /*border-color: 1px #CCD1D1;*/
    box-shadow: 5px 5px 10px #CCD1D1;
    width: 600px;
    height: 500px;
    padding: 15px;
    background-color: white;
}
h3{
	font-family: Arial Verdana;
}
.form_label{
        color:#B2BABB;
        font-size: 15px;
        font-family: Times new Roman;
        font-weight: bold;
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
  <div  class="content-wrapper" style="background:white">
        <section class="content-header">
      <h1>
          <span class="fa fa-user"></span>

        <strong>PROFILE</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
             </section>
<hr style="border-top: 1px solid #ccc;">
      <section class="content" >

         <div class="col-md-3">
    </div>
    <div class="col-md-7">
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
<div class="row content">
	<div class="col-md-3" id="div">
		<!-- <p>Pic</p> -->
     <?php if (isset($recruiter_data)) {
        
       ?>
		<div class="box box-solid" >
	<center>	<img src="<?php if(file_exists($recruiter_data->recruiter_profile_pic)){echo base_url(); echo $recruiter_data->recruiter_profile_pic;}else{ echo base_url()."profile_pic/boss.png"; }?>" width="100px" height="100px" style="border-radius: 6px"></center><br>
	<center><h3 ><?php echo  $recruiter_data->recruiter_fname." ".$recruiter_data->recruiter_lname; ?></h3></center>
	</div>
	</div>
	<div class="col-md-8 col-md-offset-1" id="div1">

        
      
        <div class="box-header" style="background:#3c8dbc;color: white " >
	      <div class="row">          
	      <div class="col-md-9"><h3 class="box-title" style="padding: 10px" >Recruiter Details</b></h3></div>
	      <div class="col-md-3"><a class="btn btn-info"  id="edit_profile" onclick="edit_profile(<?php echo $recruiter_data->recruiter_id; ?>)" ><span class="fa fa-pencil"> edit </span></a></div>
          </div>
        </div>
        <div class="box-footer" style="margin-left:15px ">
        	<br>
	        <div class="row">
	             <div class="col-md-6">
	                    <span class="form_label">Name</span><br>
	                    <span><?php echo $recruiter_data->recruiter_fname." ".$recruiter_data->recruiter_lname;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <span class="form_label">Email</span><br>
	                 <span><?php echo $recruiter_data->recruiter_email;?></span>
	            </div>   
	        </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <span class="form_label">Gender</span><br>
	                    <span><?php echo $recruiter_data->recruiter_gender;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <span class="form_label">Mobile</span><br>
	                 <span><?php echo $recruiter_data->recruiter_mobile;?></span>
	            </div>   
	        </div><br>
          <div class="row">
               <div class="col-md-6">
                      <span class="form_label">Address</span><br>
                      <span><?php echo $recruiter_data->recruiter_address;?></span>
              </div>   
              <div class="col-md-6">
                   <span class="form_label">City</span><br>
                   <span><?php echo $recruiter_data->recruiter_city;?></span>
              </div>   
          </div><br>
          <div class="row">
               <div class="col-md-6">
                      <span class="form_label">Pincode</span><br>
                      <span><?php echo $recruiter_data->recruiter_pincode;?></span>
              </div>   
              <div class="col-md-6">
                   <span class="form_label">State</span><br>
                   <span><?php echo $recruiter_data->stateName;?></span>
              </div>   
          </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <span class="form_label">Password</span><br>
	                    <span><?php echo $recruiter_data->recruiter_password;?></span>
	            </div>   <!-- 
	            <div class="col-md-6">
	                 <Span class="form_label">Type</span><br>
	                 <span><?php //echo $recruiter_data->recruiter_type;?></span>
	            </div>    -->
	        </div>
        </div>
      <?php } ?>
	</div>
</div>
</section>
</div>

<script type="text/javascript">
	$(document).ready(function(){
            
            
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#sprofile_pic').attr('src', e.target.result);
            
        }

        reader.readAsDataURL(input.files[0]);
    }
}



var _URL = window.URL || window.webkitURL;
$("#img").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
    var xyz=this;
       
        img = new Image();
        img.onload = function () { 
            
            if(this.height>1200 || this.width>1920 || file.size>7340032)
            {
                $('#sprofile_pic').attr('src',"");
                  $("#img_error").html("please upload image less than 7 mb or Dimenssion 1920*1200");
                  $("#img").val("");
                  $("#box").show();
                  $("#img_error").show(); 
             }
            else
            {
                                
                  $("#box").hide();
               $("#img_error").hide();      
                        readURL(xyz);       
                  $("#img_box").show();
            }
           
        };
        img.src = _URL.createObjectURL(file);
    }
});


        });

    function edit_profile(id)
	{
		 save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/recruiter/Profile/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {     
          
            $('[name="recruiter_id"]').val(data.recruiter_id);
            $('[name="fname"]').val(data.recruiter_fname);
            $('[name="lname"]').val(data.recruiter_lname);
            $('[name="email"]').val(data.recruiter_email);
            $('[name="mobile"]').val(data.recruiter_mobile);
            $('#gender').val(data.recruiter_gender);
            $('[name="password"]').val(data.recruiter_password);
            $('[name="address"]').val(data.recruiter_address);
            // $('#city').append('<option value="'+data.recruiter_city+'">'+data.recruiter_city+'</option>');
            // $('#state').append('<option value="'+data.stateID+'">'+data.stateName+'</option>');
            $('[name="pincode"]').val(data.recruiter_pincode);
            $('[name="country"]').val(data.recruiter_country);

           
            $.each(data.state.states, function (i,row){

              if (data.recruiter_state == row.stateID) {
               $('[name="state"]').append('<option value="'+row.stateID+'" selected>'+row.stateName+'</option>');                
              }else{
                $('[name="state"]').append('<option value="'+row.stateID+'">'+row.stateName+'</option>');                
              }

            });


            $.each(data.state.cities, function (i,row){

              if (data.recruiter_city == row.cityName) {
               $('[name="city"]').append('<option value="'+row.cityName+'" selected>'+row.cityName+'</option>');                
              }else{
                $('[name="city"]').append('<option value="'+row.cityName+'">'+row.cityName+'</option>');                
              }

            });
                        
           // $("#title").text("Edit profile");
           $('#profile_modal').modal('show');
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
	}
        
   
   function open_modal()
   {
       $("#profile_modal").modal('hide');
       $("#password_modal").modal('show');
   }
   
   
             
          function change_password()
          {
           
                 var pass_val;
                 
                 var pass=$('#newpassword').val();
                 var cpass=$('#conf_password').val();
                 alert(pass);
                 alert(cpass);
                 var length=pass.length;
                     if($("#opassword").val()=="")
                     {
                     $("#opassword_err").html("Enter Old Password");    
                     }
                     else if(length<8)
                     {
                     $("#opassword_err").html("");
                     $("#newpassword_err").html("Enter Password at least 8 character");
                      pass_val=false;
                     }else if(pass!=cpass)
                     {
                         $("#newpassword_err").html("");
                          $("#conf_password_err").html("Password does not match");
                           pass_val=false;
                     }else{
                         $("#newpassword_err").html("");
                         $("#conf_password_err").html("");
                          pass_val=true;
                     }
                         
                 
                                            
                    
                    
          
          
          
          
   if(pass_val)
   {
       var data = new FormData(document.getElementById("password_form"));
       var url = "<?php echo base_url()?>recruiter/Profile/change_password";
           
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
            if(json.opassword_err)
            {
                $("#opassword_err").html(json.opassword_err);
            }
            
           if(json.success)
           {
               location.reload();
           }
          
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
//          alert('Error...!');
        }
      }); 
   }
   }
        
        

	
    function save()
    {
        var data = new FormData(document.getElementById("form"));

      var url;
      
        url = "<?php echo site_url('index.php/recruiter/Profile/update_profile')?>";
      

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
                    // alert("Data Save Successfully...!"); 
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
             
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data Please select image less than 2 MB');
            }
        });
    }

     $(document).ready( function () {
                        $("#state").change(function() {
   var el = $(this) ;
              $("#city").html("");
              $("#city").append('<option value="">--Select City--</option>');

var state=el.val();
        if(state)
        {
          $('#city').append("");            
      $.ajax({
       url : "<?php echo site_url('index.php/home/show_cities')?>/" + state,        
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
        // alert('Error...!');
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
 });
</script>

<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modal_dialog">
    <div class="modal-content">
      <div style="background:#3c8dbc" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Change Password</strong></h4></center>
      </div>
      <div style="background:#F2F3F4" class="modal-body">
          <form action="" method="post" id="password_form">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                   <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                          <label>Old Password :</label>
                      <input type="password" class="form-control" name="opassword" id="opassword">
                      <span class="text-danger" id="opassword_err"></span>
                      </div>
                          
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                          <label>New Password :</label>
                      <input type="password" class="form-control" name="newpassword" id="newpassword">
                      <span class="text-danger" id="newpassword_err"></span>
                      </div>
                          
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                           <label>Confirm Password :</label>
                  <input type="password" class="form-control" name="cpassword" id="conf_password">
                  <span class="text-danger" id="conf_password_err"></span>
                  </div>
                          
                          </div>
                  </div>
                 </div>
              <div class="col-md-2">
              </div>
     
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
  <div class="modal-footer">
      <button onclick="change_password()" class="btn btn-primary">Submit</button>
  </div>
</div> 
         </div>
         </div>






 <div class="modal fade" id="profile_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Personal Detail</h4></center>
        </div>
        <div class="modal-body" id="personal_body">         	
    				
    			<div class="panel-body">
                            <form action="" id="form">
                           <div class="form-group"><img id='sprofile_pic' src='' width="100px" hieght="100px" ></div>

                                <div class="form-group">
    			<div class="row">
                             <input type="hidden" name="recruiter_id">

                                <div class="col-md-6  ">                             
                                        <label for="fname">First Name</label>
                                        <input type="text" placeholder="First Name" value="" class="form-control required" id="fname" name="fname" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>                                                          
                                </div>
                                <div class="col-md-6">                                   
                                        <label for="lname">Last Name</label>
                                        <input type="text" placeholder="Last Name" value="" class="form-control" id="lname"  name="lname" maxlength="128" required>
                                      <span class="text-danger" id="lname_err"></span>                                   
                                         </div>
                            </div><br>
                                    <div class="row">
                                    <div class="col-md-6  ">                             
                                        <label for="fname">Email</label>
                                        <input type="Email" placeholder="Email" value="" class="form-control required" id="email" name="email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                </div>
                                <div class="col-md-6">                             
                                        <label for="fname">Mobile</label>
                                        <input type="text" placeholder="Mobile" value='' class="form-control required" id="mobile" name="mobile" maxlength="11" required>
                                        <span class="text-danger" id="mobile_err"></span>                                                          
                                </div>
                                        </div><br>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control" id="address"></textarea>
                                          </div>
                                          <div class="col-md-6">                                   
                                        <label for="lname">Gender</label>
                                        <select class="form-control" name='gender' id='gen'>
                                            <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                        </select>
                                      <span class="text-danger" id="lname_err"></span>                                   
                                         </div>
                                        </div><br>
                                    <div class="row">
                                      <div class="col-md-6  ">                             
                                        <label for="fname">Country</label>
                                        <select name="country" id="country" class="form-control">
                                               <?php if(isset($country)){
                                          foreach($country as $country)
                                          {
                                             echo '<option value="'.$country->countryID.'">'.$country->countryName.'</option>';
                                          }
                                               }?>
                                   
                                        </select>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                      </div>
                                    	<div class="col-md-6  ">                             
                                        <label for="fname">State</label>
                                        <select name="state" id="state" class="form-control">
                                          
                                        </select>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                </div>
                                
                                    	
                                    </div><br>
                                    
                                    	<div class="row">
                                    <div class="col-md-6">                             
                                        <label for="fname">City</label>
                                        <select name="city" id="city" class="form-control">
                                          
                                        </select>
                                        <span class="text-danger" id="mobile_err"></span>                                                          
                                </div>
                                <div class="col-md-6">                             
                                        <label for="fname">Pincode</label>
                                        <input type="text" placeholder="Pincode" value='' class="form-control required" id="Pincode" name="pincode" maxlength="11" required>
                                        <span class="text-danger" id="mobile_err"></span>                                                          
                                </div>
                                
                                        </div>
                                <br>
                                     <div class="row">
                                          <div class="col-md-6  ">                             
                                              <label for="fname">Password</label>
                                              <input type="text" placeholder="Password" value='' class="form-control required" id="password" name="password"  required>
                                              <a href="#" onclick="open_modal()"><i class="fa fa-key"></i> Change Password</a>
                                              <span class="text-danger" id="password_err"></span>                                                          
                                      </div>

                                         <div class="col-md-5 col-md-offset-1">
                                         	<label for="state">Profile Picture</label><br>
                                          <label class="btn btn-info">
                                          <input type = "file" name = "img" id="img" style="display: none" accept="image/*" required />                                            
                                          Choose Image
                                          </label><br>
                                          <span id="img_error" style="color:red"></span>
                                         </div>
                                        </div>
                                    
                        </div>
                                </form>
                            </div>    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" onclick="save()" id="save_personal">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>


     