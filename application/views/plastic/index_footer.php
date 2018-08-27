 
<style>
    #footer{
        padding:10px;
    }
    </style>
    <div class="row" style="background:#F2F3F4">
<!--        <div class="container">        
		<div class="col-md-9 col-md-offset-1">
		<h5 style="color:#0BA1DC;">RECENT JOB OPENINGS</h5>
                
                <div class="banner-container"> 
  	<div id="carousel1" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
    <li data-target="#carousel1" data-slide-to="1" ></li>
    <li data-target="#carousel1" data-slide-to="2"></li>
  </ol>
   Carousel items 
  <div class="carousel-inner">
          
      <div class="item active"><center><div id="job1"></div></center></div>
      <div class="item"><center><div id="job2"></div></center></div>
      <div class="item"><center><div id="job3"></div></center></div>
      <div class="item"><center><div id="job4"></div></center></div>
            
   
  </div>
  
   Carousel nav 
  <a class="carousel-control left" href="#carousel1" data-slide="prev">&lsaquo; </a>
  <a class="carousel-control right" href="#carousel1" data-slide="next">&rsaquo;</a>
</div>	
  </div>
			  
		</div>  
              
            </div><br><br>-->
            
           
                       
		
        </div>
           
        
        
        <footer style="background:#0461A8" id="footer">
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <strong style="color:white">Copyright &copy; 2018 Plastic Naukri. All rights reserved. </strong><span style="color:#5df95a">Developed by <a style="color:#5df95a" href="http://webosys.com/" target="_blank">Webosys Technologies</a></span>	
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
  
    .div_design{
   font-size: 14px;
    font-weight: bold;
    color: #005dab;
    letter-spacing: inherit;
    text-transform: none;
    
    }
    .exp{
    letter-spacing: inherit;
    text-transform: none;
    margin-top: 10px;
    padding:2px;
    }
  
        </style>
    
   <?php 
				 $result=$this->Jobs_model->get_recent_job();
                            if($result){ $i=1;

                                foreach($result as $res)
                                {
                                   
                        ?>
<!--        jobname
        qualificationsexperience
        company-->

                    <script>
                           function modal_show()
                           {
//                               $("#job_modal").modal('show');

                           }
                           
                           if('<?php echo $i==1; ?>')
                           {
                                $("#job1").append('<a href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>"><span class="div_design"><?php echo $res->job_title;?></span></a><p class="exp"><b>Experience :</b> <?php echo $res->job_experience;?></p><p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p><p class="exp"><b>Company :</b> Webosys Technologies</p><hr style="border-top: 1px solid #ccc;"><center><a class="btn btn-primary" href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>">view</a><center>');
                            }
                            if('<?php echo $i==2; ?>')
                           {
                                $("#job2").append('<a href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>"><span class="div_design"><?php echo $res->job_title;?></span></a><p class="exp"><b>Experience :</b> <?php echo $res->job_experience;?></p><p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p><p class="exp"><b>Company :</b> Webosys Technologies</p><hr style="border-top: 1px solid #ccc;"><center><a class="btn btn-primary" href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>">view</a><center>');
                           }
                            if('<?php echo $i==3; ?>')
                           {
                                $("#job3").append('<a href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>"><span class="div_design"><?php echo $res->job_title;?></span></a><p class="exp"><b>Experience :</b> <?php echo $res->job_experience;?></p><p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p><p class="exp"><b>Company :</b> Webosys Technologies</p><hr style="border-top: 1px solid #ccc;"><center><a class="btn btn-primary" href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>">view</a><center>');
                            }
                            if('<?php echo $i==4; ?>')
                           {
                                $("#job4").append('<a href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>"><span class="div_design"><?php echo $res->job_title;?></span></a><p class="exp"><b>Experience :</b> <?php echo $res->job_experience;?></p><p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p><p class="exp"><b>Company :</b> Webosys Technologies</p><hr style="border-top: 1px solid #ccc;"><center><a class="btn btn-primary" href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>">view</a><center>');
                            }
                            if('<?php echo $i==5; ?>')
                           {
                                $("#job5").append('<a href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>"><span class="div_design"><?php echo $res->job_title;?></span></a><p class="exp"><b>Experience :</b> <?php echo $res->job_experience;?></p><p class="exp"><b>Qualification :</b> <?php echo $res->job_education;?></p><p class="exp"><b>Company :</b> Webosys Technologies</p><hr style="border-top: 1px solid #ccc;"><center><a class="btn btn-primary" href="<?php echo base_url(); ?>Home/job/<?php echo $res->job_id;?>">view</a><center>');
                            }
                    </script>

                        <?php $i++; } 
                            }?>         
<div class="modal fade" id="job_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Skills</h4></center>
        </div>
        <div class="modal-body" id="job_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="skill_form">  
                               <input type='hidden' name="skill_id" id='skill_id' value=''>
                                <div class="form-group">
    			<div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Skill Name</label>
                                        <input type="text" placeholder="Skill Name" value="" class="form-control required" id="skill_name" name="skill_name" maxlength="128" required>
                                        <span class="text-danger" id="fname_err"></span>                                                          
                                </div>
                             
                            </div><br>
                                    
                                    <div class="row">
                             
                                <div class="col-md-12  ">                             
                                        <label for="fname">Description</label>
                                        <textarea placeholder="Skill Description" value="" rows="6" cols="" class="form-control required" id="desc" name="desc" maxlength="60" required></textarea>
                                        <span class="text-danger" id="fname_err"></span>                                                          
                                </div>
                             
                            </div>
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="skill_update" id="save_skill">Save</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
          </div> 
  

</body>
</html>