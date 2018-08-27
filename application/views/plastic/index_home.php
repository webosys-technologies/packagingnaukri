     <style>
         #content_body{
             padding:15px;
         }
         
  
     </style>
  
   
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
  
         
        
        <div class="row" id="content_body" style="background:#F2F3F4">
        <div class="container">        
		<div class="col-md-9 col-xs-9">
		<h3 style="color:#02B645;">Enjoy building your career with lots of ready jobs!</h3>
			<p>To provide the right opportunity to the every qualified packaging professional.</p>   
		</div>  <br>
                <div class="col-md-2">
                    <a href=""  data-toggle="modal" data-target="#myModal" class="btn btn-success" style="color:#02B645;" ><span style="color:white">GO!</span></a>
            </div>
		
        </div>
            </div>
         <div class="row" id="content_body" style="background:white;">        
		<div class="container">
                    <div class="col-md-9">
		<h4 style="color:#02B645;">Welcome to Plastic Naukri</h4><hr style="border-top: 1px solid #ccc;">
			
<h5 style="color:#02B645;">Objective</h5>
<p>
We intend and aim to place the candidate as per the precise need of the position in terms of experience, expertise, and budget resulting in a symbiotic business relationship between the employee and the employer.<br><br>

Plastic and related businesses has seen a phenomenal growth trajectory in the last decade and the momentum is increasing on a daily basis and so is the need for qualified and experienced professionals on this front. Being a vast and diversified field it is difficult to find talent suited to a particular requirement with the required expertise. This is were we step in.<br><br>

To provide the right opportunity to the every qualified packaging professional, to achieve his/her career objective. At the same time to provide the suitable candidate as per employerâ€™s business need and develop a win-win relationship</p>   
                    </div>
                    </div>
           
                    
  <section style="padding-top: 100px; padding-bottom: 100px;" class="logoes slider content">
      <?php $company=$this->Companies_model->get_recent_company();
             
      if(isset($company)) 
         
      {    $i=0;
          foreach($company as $comp){
        
          if($i==0){?>
           <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" width="310px" height="63px">   
      </div>
          <?php }
          if($i==1){?>
             <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" width="310px" height="63px">   
      </div>
          <?php }
          if($i==2){?>
       <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" width="310px" height="63px">   
      </div>
          <?php }
          if($i==3){?>
       <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" width="310px" height="63px">   
      </div>
          <?php   
          }
          if($i==4){ ?>
             <div>
        <img src="<?php echo  base_url().$comp->company_logo;?>" width="310px" height="63px">   
      </div> 
        <?php  } 
          
          $i++;
          } 
      }
       
      
      ?>  
     
      
     
      
  </section>  
           
		
        </div>
        
        