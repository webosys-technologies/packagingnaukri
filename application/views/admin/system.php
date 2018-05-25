<style type="text/css">
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
</style>
  <div  class="content-wrapper" style="background:white">
        <section class="content-header">
      <h1>
        <strong>System</strong>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Profile</li>
      </ol>
             </section>
<!--<hr style="border-top: 1px solid #ccc;">-->
      <section class="content" >

<div class="row content">
	<div class="col-md-3" id="div">
		<!-- <p>Pic</p> -->
		<div class="box box-solid" >
	<center>	<img src="<?php echo base_url(); ?>/profile_pic/avatar.png" width="100px" height="100px" style="border-radius: 6px"></center><br>
	<center><h3 ><?php echo $system->system_name; ?></h3></center>
	</div>
	</div>
	<div class="col-md-8 col-md-offset-1" id="div1">

        <div class="box-header" style="background:#3c8dbc;color: white " >
	      <div class="row">          
	      <div class="col-md-9"><h3 class="box-title" style="padding: 10px" >System Details</b></h3></div>
	      <div class="col-md-3"><a class="btn btn-info" href="#personal" id="edit_personal"><span class="fa fa-pencil"> edit </span></a></div>
          </div>
        </div>
        <div class="box-footer" style="margin-left:15px ">
        	<br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Name</span><br>
	                    <span><?php echo $system->system_name;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">Email</span><br>
	                 <span><?php echo $system->system_email;?></span>
	            </div>   
	        </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Phone</span><br>
	                    <span><?php echo $system->system_phone;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">Mobile</span><br>
	                 <span><?php echo $system->system_mobile;?></span>
	            </div>   
	        </div><br>
	        <div class="row">
	             <div class="col-md-6">
	                    <Span class="form_label">Address</span><br>
	                    <span><?php echo $system->system_address;?></span>
	            </div>   
	            <div class="col-md-6">
	                 <Span class="form_label">City</span><br>
	                 <span><?php echo $system->system_city;?></span>
	            </div>   
	        </div>
        </div>
	</div>
</div>
</section>
</div>