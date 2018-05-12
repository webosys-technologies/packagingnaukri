<html>
    
          <head>    
              <title>Home | Packaging Naukri</title>
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
            .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
            
            
            #header{
                margin:25px;
                
            }
            
            #myModal{
                margin:35px;
               
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
            </style>
</head>

</script>

<script>
    $(document).ready(function() {
        
        
        $("#search").click(function(){
        $('#myModal').modal('show');
          });
  
$("#myModal").on("hidden.bs.modal", function () {
       
          $('#login_form')[0].reset(); 
       $("#validation_error").html("");
       $("#email_err").html("");
       $("#password_err").html("");
});
        

$("#show_otp_box").click(function(){
    $("#show_otp_box").hide();
    $("#otp_box").show();
    $("#pass_field").hide();
    $("#show_pass_box").show();
});

$("#show_pass_box").click(function(){
    $("#show_pass_box").hide();
    $("#otp_box").hide();
    $("#show_otp_box").show();
    $("#pass_field").show();
});

     
  });

  function member_login() {
      
     
      
        var val= member_log_validation();
        if(val)
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
 
</script>
    
    
<!--<body style="background:#d2d6de">--> 
   
 <header class="header" id="header">
  <div class="container">
  <nav class="navbar navbar-default navbar-fixed-top navbar-expand-lg" id="nav_header">
  <div class="container-fluid"  style="background:#002863">
     <!--Brand and toggle get grouped for better mobile display--> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a id="logo" class="navbar-brand" href="#"><img src="<?php echo  base_url();?>assets/images/packagelogo.png" width="200px" height="50px"></a>
    </div>

     <!--Collect the nav links, forms, and other content for toggling--> 
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
           <li class="dropdown">
          <a id="header_link" href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Jobs Search By<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>recruiter/index/login">Jobs by City</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>recruiter/index">Jobs by Qualification</a></li>
          </ul>
        </li>
        <li><a id="header_link" href="">Jobs</a></li>
        <li><a id="header_link" href="">Profile</a></li>

       <li class="dropdown">
          <a id="header_link" href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="">Recruiter Action</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="">Applied Job</a></li>
          </ul>
        </li>     
        
      </ul>
       
         <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">        
      <a id="header_link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><span class="glyphicon glyphicon-user"></span> Hi <?php if(isset($member_data)){echo $member_data->member_fname." ".$member_data->member_lname;}?><span class="caret"></span></a>
        <ul class="dropdown-menu">
              <li><a href="">Setting</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="">Sign Out</a></li>
          </ul>        
            </li>
             </ul>

    </div>  
  </div> 
</nav>
  </div>   
</header> 


<div class="row" style="background:#F2F3F4">
        <div class="container"> <br>       
		<div class="col-md-9 col-md-offset-1">
		 <div class="input-group">
  <input type="text" class="form-control" data-toggle="modal" id="log" data-target="#myModal" placeholder="Search Keyword..." aria-describedby="basic-addon2">
  <span class="input-group-addon" id="basic-addon2"><a class="glyphicon glyphicon-search"></a></span>
    </div>   
                </div> <br><br><br>
        </div>
          
            </div>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
  <ul class="nav navbar-nav">
    <li class="active"><a href="#">Basic Topnav</a></li>
    <li><a href="#">Page 1</a></li>
    <li><a href="#">Page 2</a></li>
    <li><a href="#">Page 3</a></li>
  </ul>
</nav>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="background:#002863" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Search</strong></h4></center>
      </div>
      <div id="calendar" style="background:#F2F3F4" class="modal-body">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                  <span id="validation_error" class="text-danger"></span>
                  <form action="" method="post">
                      
          <div class="form-group has-feedback">
            <input type="text" class="form-control" id="member_email" placeholder="Email or Mobile No" name="member_email" required /><span class="text-danger" id="email_err"></span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
      
          
        </form>
                  </div>     
                 
                           </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




