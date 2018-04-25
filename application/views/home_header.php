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
        <a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>profile_pic/naukri_logo.png" width="200px" height="50px"></a>
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