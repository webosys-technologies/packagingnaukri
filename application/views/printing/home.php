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
     
     
   
  
  
         
        
        <div class="row" id="content_body" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-xs-9">
		<h3 style="color:orange">Enjoy building your career with lots of ready jobs!</h3>
			<p>To provide the right opportunity to the every qualified packaging professional.</p>   
		</div>  <br>
                <div class="col-md-2">
                    <a href=""  data-toggle="modal" data-target="#myModal" class="btn btn-warning" style="color:#02B645;" ><span style="color:white">GO!</span></a>
            </div>
		
        </div>
            </div>
         <div class="row" id="content_body" style="background:white;">        
		<div class="container">
                    <div class="col-md-9">
		<h4 style="color:orange;">Welcome to Packaging Naukri</h4><hr style="border-top: 1px solid #ccc;">
			
<h5 style="color:orange;">Objective</h5>
<p>
We intend and aim to place the candidate as per the precise need of the position in terms of experience, expertise, and budget resulting in a symbiotic business relationship between the employee and the employer.<br><br>

Packaging and related businesses has seen a phenomenal growth trajectory in the last decade and the momentum is increasing on a daily basis and so is the need for qualified and experienced professionals on this front. Being a vast and diversified field it is difficult to find talent suited to a particular requirement with the required expertise. This is were we step in.<br><br>

To provide the right opportunity to the every qualified packaging professional, to achieve his/her career objective. At the same time to provide the suitable candidate as per employers business need and develop a win-win relationship</p>   
                    </div>
                    </div>
           
        <br>
	<div class="container">
		<center><h3><b>OUR CUSTOMERS !!</b></h3></center>          
  <section style="padding-top: 100px; padding-bottom: 100px;" class="logoes slider content">
      <?php $company=$this->Companies_model->get_recent_company();
             
      if(isset($company)) 
    {    $i=0;
          foreach($company as $comp){
        
          ?>
           <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" height="100px" width="auto">   
      </div>
          <?php 
          } 
      }
       
      
      ?>  
      
  </section> 
                
               
                
        </div>
      
		
        </div>
        
         <section class="regular slider content">
      <div id="job1" class="div_style">
          
      </div>
    <div id="job2" class="div_style">
      
    </div>
    <div id="job3" class="div_style">
      
    </div>
    <div id="job4" class="div_style">
      
    </div>
      <div id="job5" class="div_style">
          
      </div>    
  </section>