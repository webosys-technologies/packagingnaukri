<html>
    
          <head>    
              <title>Home | Packaging Naukri</title>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">    
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <script src="<?php echo base_url()?>assets/jquery/jQuery-2.1.4.min.js"></script>
  <script src="<?php echo base_url()?>assets/jquery/jquery.flexslider.js"></script>
  <script src="<?php echo base_url()?>assets/jquery/jquery.flexslider-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
        <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-2.1.4.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/validation1.js"); ?>"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<script src="<?php echo base_url("assets/js/validation1.js"); ?>">
</script>
<body>


        
        <style>
            #header{
                margin:25px;
            }
           
            #header_link{
                color:white;
            }
                                    
            #footer{
                padding:12px;
            }
/*            #nav_header{
                padding:12px;
            }
           */
           
           a:active { 
    background-color: yellow;
             }
           
            #logo{
                padding-top:0px;
               
            }
            </style>
</head>

</script>

<script>
    $(document).ready(function() {
        
        
        
        $(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide"
  });
});

//  $("#state").change(function() {
//
//    var el = $(this) ;
//
//    if(el.val() === "Maharashtra" ) {
//var state=el.val();
//           
//       $.ajax({
//        url : "<?php echo site_url('index.php/recruiter/Index/show_cities')?>/" + state,        
//        type: "GET",
//               
//        dataType: "JSON",
//        success: function(data)
//        {
//         
//           $.each(data,function(i,row)
//           {
//            
//               $("#city_name").append('<option value="'+ row.city_name +'">' + row.city_name + '</option>');
//           }
//           );
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {
//          alert('Error...!');
//        }
//      });
//    }
//     
//  });

});
 
</script>
    
    
<!--<body style="background:#d2d6de">--> 
    <body>
 <header class="header" id="header">
  <div class="container">
  <nav class="navbar navbar-default navbar-fixed-top" id="nav_header">
  <div class="container-fluid"  style="background:#002863">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>assets/images/logo.png" width="200px" height="50px"></a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
          <li><a id="header_link" href="<?php echo base_url();?>Home/index">Home</a></li>
        <li><a id="header_link" href="<?php echo base_url();?>Home/about_us">About Us</a></li>
       <li class="dropdown">
          <a id="header_link" href="<?php echo base_url();?>Home/Services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>Home/recruitment">Recruitment</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>Home/resource_outsourcing">Resource Outsourcing</a></li>
          </ul>
        </li>
        <li><a id="header_link" href="<?php echo base_url();?>Home/job_openings">Job Openings</a></li>
        <li><a id="header_link" href="<?php echo base_url();?>Home/post_resume">Post Your Resume</a></li>
         <li><a id="header_link" href="<?php echo base_url();?>Home/post_requirement">Post Your Requirement</a></li>
          <li><a id="header_link" href="<?php echo base_url();?>Home/contact_us">Contact Us</a></li>   
        
      </ul>
<!--      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>  
  </div> 
</nav>
  </div>
   
</header>     

<style>
         #content_body{
             padding:15px;
         }
     </style>
    <div class="banner-container"> 
  	<div id="carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel" data-slide-to="0" class="active"></li>
    <li data-target="#carousel" data-slide-to="1" ></li>
    <li data-target="#carousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="item active"><img src="<?php echo base_url(); ?>assets/images/a.jpg"  width="100%" height="50%" alt="banner" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/b.jpg"  width="100%" height="50%" /></div>
    <div class="item"><img src="<?php echo base_url(); ?>assets/images/c.jpg" width="100%" height="50%" alt="banner" /></div>
  </div>
  
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
</div>	
  </div>
        
        <div class="row" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h3 style="color:#0BA1DC;">Enjoy building your career with lots of ready jobs!</h3>
			<p>To provide the right opportunity to the every qualified packaging professional.</p>   
		</div>  <br>
                <div class="col-md-2">
            <a href="" class="btn btn-info">GO!</a>
            </div>
		
        </div>
            </div>
         <div class="row" id="content_body">        
		<div class="col-md-8">
		<h4 style="color:#0BA1DC;">Welcome to Packaging Naukri</h4><hr style="border-top: 1px solid #ccc;">
			
<h5 style="color:#0BA1DC;">Objective</h5>
<p>
We intend and aim to place the candidate as per the precise need of the position in terms of experience, expertise, and budget resulting in a symbiotic business relationship between the employee and the employer.<br><br>

Packaging and related businesses has seen a phenomenal growth trajectory in the last decade and the momentum is increasing on a daily basis and so is the need for qualified and experienced professionals on this front. Being a vast and diversified field it is difficult to find talent suited to a particular requirement with the required expertise. This is were we step in.<br><br>

To provide the right opportunity to the every qualified packaging professional, to achieve his/her career objective. At the same time to provide the suitable candidate as per employer’s business need and develop a win-win relationship</p>   
		</div> <br><br>
             <div class="col-md-4">
                 
                 
                    
                   <div class="panel panel-default">
			<div class="panel-heading" style="">
      <h3>Member Login</h3>
     </div>
     <div class="panel-body">
        
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        
        <form action="<?php echo base_url(); ?>member/index/loginMe" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="member_email" placeholder="Username or Email" name="member_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
            <span class="text-danger"><?php echo form_error('email'); ?></span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="password" name="member_password" required /><span class="text-danger" id="password_err"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            <span class="text-danger"></span>
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" />
            </div><!-- /.col -->
          </div>
        </form>

        <a href="<?php echo base_url() ?>forgotPassword">Forgot Password</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
                 
                 
             </div><br>
           
		
        </div>
     
     
      <div class="row" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h5 style="color:#0BA1DC;">RECENT JOB OPENINGS </h5>
			  
		</div>  <br>
              
            </div>
		
        </div>
           
        
        
        <footer style="background:#002863" id="footer">
<div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3">
             <strong style="color:white">Copyright &copy; 2018 <a href="http://webosys.com/">Packaging Naukri</a>. All rights reserved.</strong>	
            </div> 
            <div  class="col-md-2 col-md-offset-2">
                <a  style="color:white" href="#">Top</a><i  style="color:white"class="glyphicon glyphicon-arrow-up"></i></div>
            
        </div>
         
    </div>
    
</footer>
        
    
              

  

</body>
</html>
        
        