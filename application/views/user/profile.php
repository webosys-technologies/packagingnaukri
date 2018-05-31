<style type="text/css">

 .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 600px;
      overflow-y: initial !important
}
.modal-body{
  height: 420px;
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
    height: 400px;
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
</style>
  <div  class="content-wrapper" style="background:white">
        <section class="content-header">
      <h1>
          <span class="fa fa-user"></span>

        <strong>PROFILE</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>user/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
             </section>
<!--<hr style="border-top: 1px solid #ccc;">-->
      <section class="content" >

<div class="row content">
	<div class="col-md-3" id="div">
		<!-- <p>Pic</p> -->
     <?php if (isset($user_data)) {
        
       ?>
		<div class="box box-solid" >
	<center>	<img src="<?php if($user_data->user_profile_pic){echo base_url(). $user_data->user_profile_pic;}else{ echo base_url()." /profile_pic/avatar.png";}?>" width="100px" height="100px" style="border-radius: 6px"></center><br>
	<center><h3 ><?php echo  $user_data->user_fname." ".$user_data->user_lname; ?></h3></center>
	</div>
	</div>
	<div class="col-md-8 col-md-offset-1" id="div1">

        
      
        <div class="box-header" style="background:#3c8dbc;color: white " >
	      <div class="row">          
	      <div class="col-md-9"><h3 class="box-title" style="padding: 10px" >User Details</b></h3></div>
	      <div class="col-md-3"><a class="btn btn-info" href="#personal" id="edit_profile" onclick="edit_profile(<?php echo $user_data->user_id; ?>)" ><span class="fa fa-pencil"> edit </span></a></div>
          </div>
        </div>
        <div class="box-footer" style="margin-left:15px ">
        	<br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Name</span><br>
	                    <span><?php echo $user_data->user_fname." ".$user_data->user_lname;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">Email</span><br>
	                 <span><?php echo $user_data->user_email;?></span>
	            </div>   
	        </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Gender</span><br>
	                    <span><?php echo $user_data->user_gender;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">Mobile</span><br>
	                 <span><?php echo $user_data->user_mobile;?></span>
	            </div>   
	        </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Password</span><br>
	                    <span><?php echo $user_data->user_password;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">Type</span><br>
	                 <span><?php echo $user_data->user_type;?></span>
	            </div>   
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
        url : "<?php echo site_url('index.php/user/Profile/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {     
          
            $('[name="user_id"]').val(data.user_id);
            $('[name="fname"]').val(data.user_fname);
            $('[name="lname"]').val(data.user_lname);
            $('[name="email"]').val(data.user_email);
            $('[name="mobile"]').val(data.user_mobile);
            $('[name="gender"]').val(data.user_gender);
            $('[name="password"]').val(data.user_password);

           
                        
           $("#modal_title").text("Edit profile");
           $('#profile_modal').modal('show');
            

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
      
        url = "<?php echo site_url('index.php/user/Profile/update_profile')?>";
      

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
                    alert("Data Save Successfully...!"); 
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
</script>

 <div class="modal fade" id="profile_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Perosonal Detail</h4></center>
        </div>
        <div class="modal-body" id="personal_body">         	
    				
    			<div class="panel-body">
                            <form action="" id="form">
                           <div class="form-group"><img id='sprofile_pic' src='' width="100px" hieght="100px" ></div>

                                <div class="form-group">
    			<div class="row">
                             <input type="hidden" name="user_id">

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
                                    <div class="col-md-12  ">                             
                                        <label for="fname">Email</label>
                                        <input type="Email" placeholder="Email" value="" class="form-control required" id="email" name="email" maxlength="128" required>
                                        <span class="text-danger" id="email_err"></span>                                                          
                                </div>
                                        </div><br>
                                    <div class="row">
                                    	<div class="col-md-12">                             
                                        <label for="fname">Mobile</label>
                                        <input type="text" placeholder="Mobile" value='' class="form-control required" id="mobile" name="mobile" maxlength="11" required>
                                        <span class="text-danger" id="mobile_err"></span>                                                          
                                </div>
                                    	
                                    </div><br>
                                    
                                    	<div class="row">
                                    
                                <div class="col-md-12  ">                             
                                        <label for="fname">Password</label>
                                        <input type="text" placeholder="Password" value='' class="form-control required" id="password" name="password"  required>
                                        <span class="text-danger" id="password_err"></span>                                                          
                                </div>
                                        </div>
                                <br>
                                     <div class="row">
                                    <div class="col-md-6">                                   
                                        <label for="lname">Gender</label>
                                        <select class="form-control" name='gender' id='gen'>
                                            <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                        </select>
                                      <span class="text-danger" id="lname_err"></span>                                   
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