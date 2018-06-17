<html>
    
          <head>    
              <title>Home | Printing Naukri</title>
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">    
        <!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  <!--<script src="<?php echo base_url()?>assets/jquery/jQuery-2.1.4.min.js"></script>-->
  
        <!--<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>--> 
        <!--<script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-2.1.4.min.js"); ?>"></script>-->
        <!--<script src="<?php echo base_url("assets/js/validation1.js"); ?>"></script>-->
        <!--<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>-->
<link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url("assets/js/jQuery-2.1.4.min.js"); ?>"></script>
</head>
<script src="<?php echo base_url("assets/js/member_log_validation.js"); ?>">
</script>
<body>


        
        <style>
            #header{
                margin:0px;
               
            }
            
            #myModal{
                margin:100px;
               
            }
            .modal-backdrop {background: none;}
           
            #header_link{
                color:white;
            }
                                    
            #footer{
                padding:0px;
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
            
            
             .icon {
  padding: 10px;
  font-size: 25px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.icon:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-skype {
  background: #00aff0;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}
            </style>
</head>

</script>

<script>

  function open_login()
  {
     $('#login_form')[0].reset(); 
       $("#validation_error").html("");
       $("#email_err").html("");
       $("#password_err").html("");
       $("#otp_err").html("");
       
       $('#send_otp').hide();
   $("#show_pass_box").hide();
    $("#otp_box").hide();
    $("#show_otp_box").show();
    $("#pass_field").show();
  }

  function member_login() {  
      
        //var val= member_log_validation();
       
        if(true)
        {
       var data = new FormData(document.getElementById("login_form"));
       var url = "<?php echo site_url('index.php/member/Index/loginMe')?>";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(data)
        {  var success;
            var email_error;
            var pass_error;
            var val_error;
           
            if(data.account_error)
            {
                $("#validation_error").html(data.account_error);
            }
            
            if(data.val_error)
            {
                $("#validation_error").html(data.val_error);
            }
            
            if(data.email_error)
            {
                $("#validation_error").html(data.email_error);
            }   
            if(data.otp_error)
            {
                $("#otp_err").html(data.otp_error);
            }
                   
            
            if(data.status)
            {
             window.location="<?php echo site_url('index.php/member/Dashboard')?>";
            }
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
          alert('Error...!');
        }
      });
      }
    }
    $(document).ready(function() {
        
  
//$("#myModal").on("hidden.bs.modal", function () {
//    alert();
//  
//          $('#login_form')[0].reset(); 
//       $("#validation_error").html("");
//       $("#email_err").html("");
//       $("#password_err").html("");
//});
    

        // $("#log").click(function(){
      
        // });
       
       
       
//        $("#myModal").on("hidden.bs.modal", function () {
   
// });
        

$("#send_otp").click(function(){
    $("#otp").val("");
    
        var otp_val;
        otp_val=email_validation();
        if(otp_val)
        { 
       var data = new FormData(document.getElementById("login_form"));
       var url = "<?php echo site_url('index.php/member/Index/send_otp')?>";
           
       $.ajax({               
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,            
            data: data,
            dataType: "JSON",
        success: function(data)
        {  var success;
            var email_error;
            var pass_error;
            var val_error;
           
           if(data.email_error)
            {
                $("#validation_error").html(data.email_error);
            }
            if(data.otp_error)
            {
                $("#otp_err").html(data.otp_error);
            }
            if(data.send)
            {
                $("#otp_success").html("OTP is send Successfully");
                
                 $("#validation_error").html("");
                $("#show_otp_box").hide();
                $("#otp_box").show();
                $("#pass_field").hide();
                $("#show_pass_box").show();
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {            
          alert('Error...!');
        }
      });
  }
    
});

$("#show_pass_box").click(function(){
    $("#show_pass_box").hide();
    $("#otp_box").hide();
    $("#show_otp_box").show();
    $("#pass_field").show();
    $('#send_otp').hide();

});

$("#show_otp_box").click(function(){
    $("#show_pass_box").show();
    $("#otp_box").show();
    $("#show_otp_box").hide();
    $("#pass_field").hide();
    $('#send_otp').show();
});


  });


 
</script>
    <div class="row" >
        <div class="col-md-6">
    <img src="<?php echo  base_url();?>assets/images/printing_logo.PNG" width="310px" height="63px">
    </div>
         <div class="col-md-3 col-md-offset-3" style="padding-top:6px">
              <a href="#" class="fa fa-google icon"></a>&nbsp;
   <a href="#" class="fa fa-facebook icon"></a>  &nbsp;
   <a href="#" class="fa fa-skype icon"></a>&nbsp;
   <a href="#" class="fa fa-linkedin icon"></a>
    </div>
    </div>
   
<!--<body style="background:#d2d6de">--> 
 
 <!--<header class="header" id="header">-->
  <!--<div class="container">-->
  <nav class="">
  <!--<nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg" id="nav_header">-->
  <!--<nav class="navbar navbar-default navbar-static-top" id="nav_header">-->
  <!--#0461A8-->
  <div class="container-fluid"  style="background:#0461A8">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <!--<a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>assets/images/packagelogo.png" width="200px" height="50px"></a>-->
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
          <li><a id="header_link" href="<?php echo base_url();?>Home/index">HOME</a></li>
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
        
       
       <li class="dropdown">
          <a id="header_link" href="<?php echo base_url();?>Home/Services" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recruiter<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>recruiter/index/login">Login</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>recruiter/index">Register</a></li>
          </ul>
        </li>
         <!--<li><a id="header_link" href="<?php echo base_url();?>Home/post_requirement">Post Your Requirement</a></li>-->
          <li><a id="header_link" href="<?php echo base_url();?>Home/contact_us">Contact Us</a></li>   
            
          
          
          
      </ul> <ul class="nav navbar-nav navbar-right">
              <li><a id="header_link" href="#" data-toggle="modal" onclick="open_login()" data-target="#myModal">Login</a></li>
              <li><a id="header_link" href="<?php echo base_url();?>member/index">Register</a></li>
           </ul>
        
        
    </div>  
  </div> 
</nav>
  <!--</div>-->
   
<!--</header>--> 

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#0461A8" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Member Sign In</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <span id="validation_error" class="text-danger"></span>
                  <form action="" id="login_form" method="post">
                      
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="member_email" placeholder="Email or Mobile No" name="member_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group">
            <center>  <a type="button" id="send_otp" class="label label-success "  />Send Otp</a></center>
            </div>
           
          <div class="form-group has-feedback" id="pass_field">
            <input type="password" class="form-control" placeholder="Password" id="password" name="member_password" required /><span class="text-danger" id="password_err"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
                      
             <div class="form-group has-feedback" id="otp_box" style="display:none;">
            <input type="text" class="form-control" placeholder="Enter OTP" id="otp" name="member_otp" required /><span class="text-danger" id="otp_err"></span><span class="text-success" id="otp_success"></span>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span><br>
          </div>
                      
             
           
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <center>
              <button type="button" onclick="member_login()"class="btn btn-primary btn-block btn-flat"  />Sign In</button>
            
             <p>or</p>
             <center><h4><a class="label label-warning" id="show_otp_box">Login With OTP</a></h4></center>
            <center><h4><a class="label label-warning" id="show_pass_box">Login With Password</a></h4></center>

              <a class="btn btn-info">
                  <span class="fa fa-google"></span> <span style="color:white">Sign in with Google</span>
  </a>
              <a class="btn" style="background-color:3b5998">
    <span class="fa fa-facebook"></span><span style="color:white"> Sign in with Facebook</span>
  </a>
           
          </div>
        </form>
                  </div>     
                 
                           </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->