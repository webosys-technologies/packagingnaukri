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
		<h3 style="color:#0BC9E7;">Enjoy building your career with lots of ready jobs.</h3>
			<p>To provide the right opportunity to every qualified packaging professional.</p>   
		</div>  <br>
                <div class="col-md-2">
                    <a href=""  data-toggle="modal" data-target="#myModal" class="btn btn-info" style="color:#02B645;" ><span style="color:white">GO</span></a>
            </div>
		
        </div>
            </div>
         <div class="row" id="content_body" style="background:white;">        
		<div class="container">
                    <div class="col-md-9">
		<h4 style="color:#0BC9E7;">Welcome to Plastic Naukri</h4><hr style="border-top: 1px solid #ccc;">
			
<h5 style="color:#0BC9E7;">Objective</h5>
<p>
We intend and aim to place the candidate as per the precise need of the position in terms of experience, expertise, and budget resulting in a symbiotic business relationship between the employee and the employer.<br><br>

Plastic and related industries has seen a phenomenal growth trajectory in the last decade. This momentum is increasing on a daily basis and so is the need for qualified and experienced professionals. Being a vast and diversified field it is difficult to find talent suited to a particular requirement with the required expertise. This is were we step in.<br><br>

To provide the right opportunity to every qualified packaging professional, to achieve his/her career objective. At the same time to provide the suitable candidate as per employers business need and develop a win-win relationship</p>   
                    </div>
                    </div>
           
        <br>
	<div class="container">
		<center><h3><b>OUR CUSTOMERS </b></h3></center>          
  <section style="padding-top: 100px; padding-bottom: 100px;" class="logoes slider content">
      <?php $customer=$this->Customer_model->getall_customer();
             
      if(isset($customer)) 
    {    $i=0;
          foreach($customer as $cust){
//          if(exists($comp->company_logo))
//          {
          ?>
           <div>
        <img src="<?php echo  base_url().$cust->customer_logo;?>" height="100px" width="auto">   
      </div>
          <?php
          }
//          } 
      }
       
      
      ?>  
      
  </section>  
        </div>
      
		
        </div>
     
      <section class="regular slider content">
<!--      <div id="job1" class="div_style">
          
      </div>
    <div id="job2" class="div_style">
      
    </div>
    <div id="job3" class="div_style">
      
    </div>
    <div id="job4" class="div_style">
      
    </div>
      <div id="job5" class="div_style">
          
      </div>    -->
                                <?php 
				 $result=$this->Jobs_model->get_recent_job();
                            if($result){ $i=1;
                                foreach($result as $res)
                                {             
                                    
                                      $exp=explode(".",$res->job_experience);
                                                     
                                                    if($exp[0]==$exp[1])
                                                    {
                                                      $experience=$exp[0]." Year";  
                                                    }else{
                                                       $experience=$exp[0]."-".$exp[1]." Year";  
                                                    }
                        ?>
                         <div class="div_style">     
                             <a data-toggle="modal" data-target="#job_modal<?php echo $i;?>"><span class="div_design"><?php echo $res->job_title;?></span></a>
                            <p class="exp"><b>Experience :</b> <?php echo $experience;?></p>
                            <p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p>
                            <p class="exp"><b>Company :</b> <?php echo $res->company_name;?></p>
                            <hr style="border-top: 1px solid #ccc;">
                            <center><a class="btn btn-primary" data-toggle="modal" data-target="#job_modal<?php echo $i;?>">view</a></center>
                           </div>
                        <?php $i++; } 
                            }?>  

  </section>
  
     
     <?php 
				 $data=$this->Jobs_model->get_recent_job();
                            if($data){ $j=1;
                                foreach($data as $d)
                                {                                   
                        ?>
     <div class="modal fade" style="" id="job_modal<?php echo $j;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog" id="content_body2">
    <div class="modal-content">
      <div style="color:#fff; background-color:#338cbf" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Job Info</strong></h4></center>
      </div>
      <div style="background:white" class="modal-body">
           <?php if(isset($d->company_logo)){?><img src="<?php echo base_url().$d->company_logo;?>" height="60px" width="190px"><?php } ?>               
           <h4><b><?php echo $d->job_title; ?></b></h4>
           <h5><?php echo $d->company_name; ?></h5>
           
           
           
           <?php
           $exp=explode(".",$d->job_experience);
                                                     
                                                    if($exp[0]==$exp[1])
                                                    {
                                                      $experience=$exp[0]." Year";  
                                                    }else{
                                                       $experience=$exp[0]."-".$exp[1]." Year";  
                                                    }
           
           ?>
           
           
           
           
         
           <div class="row"><div class="col-md-2"><label >Qualification </label></div>
           <div class="col-md-10"> <span > : <?php echo  $d->job_education; ?> </span></div> </div>        
          <div class="row"><div class="col-md-2"><label >Experience </label></div>
          <div class="col-md-10"><span> : <?php echo $experience; ?> </span></div></div>
                   
         <?php if(!empty($d->job_salary)){
            $sal=explode(".",$d->job_salary);
            if($sal[0]!=0 && !empty($sal[0])){
                
                $salary=$sal[0]." Lac ".$sal[1]." Thousand ";
            }else{
                 $salary=$sal[1]." Thousand ";
            }
?>
          
          
           <div class="row"><div class="col-md-2"><label >Salary </label></div>
         <div class="col-md-10"><span> : <?php echo $salary;?> </span></div></div>
                  
           <?php }?>

          
          <div class="row"><div class="col-md-2"><label>Location </label></div>
              <div class="col-md-10"><span> : <?php echo $d->job_city; ?> </span><br></div></div>
      
         
       
               <div class="row"><div class="col-md-2"><label>Job Description </label></div>
               <div class="col-md-10" style="padding-left:27px;">  <?php echo $d->job_description; ?></div></div>
               
                <div class="row"><div class="col-md-2"><label>Job Posted At </label></div>
               <div class="col-md-10" style=""> : <?php echo $d->job_created_at; ?></div></div>
           
          
           <div class="row"><div class="col-md-2"><label> Website </label></div>
               <div class="col-md-10"> <span id="website" class="job_info"> : <a href="http://<?php echo $d->company_website;?>" target="_blank"><?php echo $d->company_website;?></a></span></div></div>
        
           <div class="row">
               <div class="col-md-12">
                   <div class="pull-right"><a href='<?php echo base_url()?>Home/apply/<?php echo $d->job_id;?>' class='btn btn-primary btn-sm'>Apply</a>
                     <!--<button type='button' class='btn btn-info' onclick='apply("<?php echo $d->job_id; ?>"."register_to_apply")'>Register to Apply</button>-->
              </div>
                    </div>
               </div>
           
           
           
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->    
 <?php $j++; } 
                            }?> 
        
        