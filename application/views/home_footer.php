 
<style>
    #footer{
        padding:10px;
    }
    </style>
    <div class="row" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h5 style="color:#0BA1DC;">RECENT JOB OPENINGS</h5>
                
                <div class="banner-container"> 
  	<div id="carousel1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1" data-slide-to="1" ></li>
    <li data-target="#carousel1" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
          
      <div class="item active"><center><div id="job1"></div></center></div>
      <div class="item"><center><div id="job2"></div></center></div>
      <div class="item"><center><div id="job3"></div></center></div>
      <div class="item"><center><div id="job4"></div></center></div>
            
   
  </div>
  
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#carousel1" data-slide="prev">&lsaquo; </a>
  <a class="carousel-control right" href="#carousel1" data-slide="next">&rsaquo;</a>
</div>	
  </div>
			  
		</div>  
              
            </div><br><br>
            
           
                       
		
        </div>
           
        
        
        <footer style="background:#0461A8" id="footer">
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <strong style="color:white">Copyright &copy; 2018 Packaging Naukri. All rights reserved. </strong><span style="color:#5df95a">Developed by <a style="color:#5df95a" href="http://webosys.com/" target="_blank">Webosys Technologies</a></span>	
            </div> 
            <div  class="col-md-2 col-md-offset-2">
                <a  style="color:white" href="#">Top</a><i  style="color:white"class="glyphicon glyphicon-arrow-up"></i></div>
            
        </div>
         
    </div>
    
</footer>
    
    
    
    <style>
         .space{
        padding:20px;
         line-height: 22px;
    }
        </style>
    
   <?php 
				 $result=$this->Jobs_model->get_recent_job();
                            if($result){ $i=1;

                                foreach($result as $res)
                                {
                                   
                        ?>
                    <script>
                           
                           if('<?php echo $i==1; ?>')
                           {
                                $("#job1").append('<div class="col-md-6 col-md-offset-3"><label class="sapce">job name:</label> <?php echo $res->job_title; ?><br> <label class="sapce">Qualification: </label> <?php echo $res->job_education; ?><br><label class="sapce">Experience: </label> <?php echo $res->job_experience; ?><br><label class="sapce">Company:</label> <?php echo $res->company_name; ?><br></div> ');
                            }
                            if('<?php echo $i==2; ?>')
                           {
                                $("#job2").append('<div class="col-md-6 col-md-offset-3"><label class="sapce">job name:</label> <?php echo $res->job_title; ?><br> <label class="sapce">Qualification: </label> <?php echo $res->job_education; ?><br><label class="sapce">Experience:</label> <?php $res->job_experience; ?><br><label class="sapce">Company:</label> <?php $res->company_name; ?><br></div> ');
                            }
                            if('<?php echo $i==3; ?>')
                           {
                                $("#job3").append('<div class="col-md-6 col-md-offset-3"><label class="sapce">job name:</label> <?php echo $res->job_title; ?><br> <label class="sapce">Qualification: </label> <?php echo $res->job_education; ?><br><label class="sapce">Experience:</label> <?php $res->job_experience; ?><br><label class="sapce">Company:</label> <?php $res->company_name; ?><br></div> ');
                            }
                            if('<?php echo $i==4; ?>')
                           {
                                $("#job4").append('<div class="col-md-6 col-md-offset-3"><label class="sapce">job name:</label> <?php echo $res->job_title; ?><br> <label class="sapce">Qualification: </label> <?php echo $res->job_education; ?><br><label class="sapce">Experience:</label> <?php $res->job_experience; ?><br><label class="sapce">Company:</label> <?php $res->company_name; ?><br></div> ');
                            }
                    </script>

                        <?php $i++; } 
                            }?>         

  

</body>
</html>