<style>
      #modal_dialog{
     width: 700px;
      overflow-y: initial !important
}
#job_body{
  height: 500px;
  overflow-y: auto;
}
    
    .star {
        /*padding:10px;*/
    visibility:hidden;
    font-size:20px;
    cursor:pointer;
}

.star:before {
  content: "\2606";
   visibility:visible;
}
.star:checked:before {
     content: "\2605";
     color: green;
   
   
}
    
    .shadow {
   
    padding: 14px;
    border: 1px solid #EAEDED;
    box-shadow: 5px 5px 10px #CCD1D1;
}

.text_design{
 border: 2px solid #D5DBDB;
 padding: 5px;
}

.skill{
     color:#707B7C;
     font-size:12px;
     line-height: 3;
}

.description{
     color:#707B7C;
     font-size:12px;
     
     
}

.job_name{
    /*font-family: normal;*/
    color:#2471A3;
    font-size:15px;
    font-weight:bold;
}

.experience{
     color:#707B7C;
      line-height: 1.9;
}

.comp_name{
    /*font-family: normal;*/
    /*color:#2471A3;*/
    font-size:13px;
     line-height: 1.9;
     color:#707B7C;
  
}

a:link, a:visited{    
    text-decoration: none;
}
</style>

<script>
    $(document).ready(function(){
        
       
    });
    var url;
    var data;
    function search_job()
    {
        
//      data=new FormData($("#search_form"));
      data=new FormData(document.getElementById("search_form"));
    
        url = '<?php echo base_url() ?>member/Jobs/search_job';
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            async: false,
            processData: false,
            contentType: false,  
            data: data,
            dataType: "JSON",
            success: function(json)
            {

                $("#search_result").html(json.result);

                          
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    }
    
    function job_info()
    {
        $("#job_modal").modal('show');
    }
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background:#F2F4F4">
      <h1>
        Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs</li>
      </ol>
        
        <form action="<?php echo base_url();?>member/Jobs/search_jobs" method="post" id="">
    <div class="form-group form-group-md">
   
    <div class="row">
        <div class="col-md-offset-1">
        <input class="text_design" value="<?php echo set_value('title');?>" type="text" placeholder="Title,Skills,Companies" name="title"><input  type="text" placeholder="Location" name="location" value="<?php echo set_value('location');?>" class="text_design"><input  type="text" placeholder="Experience" name="exp" value="<?php echo set_value('exp');?>" class="text_design"><input  type="text" placeholder="Salary" name="salary" value="<?php echo set_value('salary');?>" class="text_design"><button type="submit" class="btn btn-info btn-md">Search Job <span class="fa fa-search"></span></button>
     </div>
        </div>
    <br>
   
    <div class="row">
        <div class="col-md-offset-1">
    <label>Full Time</label>
    <input type="checkbox" name="full" value="Full Time">&nbsp; &nbsp; &nbsp;
     <label>Part Time</label>
    <input type="checkbox" name="part" value="Part Time">&nbsp; &nbsp; &nbsp;
    <label>Internship</label>
    <input type="checkbox" name="intern" value="Intrernship">&nbsp; &nbsp; &nbsp;
    <label>Temporary</label>
    <input type="checkbox" name="temp" value="Temporary">&nbsp; &nbsp; &nbsp;
        </div></div>
</div>
           
</form>
    </section>
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
  <div id="search_result">
      <div id="no" hidden>
          <center><h1 style="color:#CCD1D1">Search Jobs</h1></center>
      </div>
      
      
      
<!--      <div class="shadow">
           <div class="row content">  
               <div class="box-header">
          <h4 style="color:#5DADE2">Walk in for PHP Developer</h4>
          <h5>Webosys Technologies</h5>
          <label>Eligibility :</label><span> BE</span><br>
          <label>Experience :</label><span> 1-2 year</span><br>
          <label>Salary :</label><span> 12000/-</span><br>
          <label>Job Location :</label><span> Pune</span><br>
              
               <label>Company Profile :</label>
               <p> Softebizz technologies is global services in Web Application Development, E-commerce Development, Content Management Systems, Cloud Solution, Software Testing with its global headquarter at Pune, India.<p>
              </div>
           </div>
              </div>-->

 
           
               <div class="container">
                   <div class="row">
                       <div class="col-md-offset-2 col-md-8">
                       <div class="panel-body">
                       <div class="shadow">
                           <div class="row">
                           <div class="col-md-10">
                          <a href="#" onclick="job_info()"> <span class="job_name"><a href="#" onclick="job_info()">PHP Web Developer</a></span></a><br>
                          <span class="comp_name">Webosys Technologies</span>
                           </div>
                               <div class="col-md-2"><button type="button" onclick="apply()" class="btn btn-warning btn-sm">Apply</button></div>
                           </div>
                          <div class="row" class="">
                              <div class="col-md-2 experience"><i class="fa fa-suitcase" aria-hidden="true"></i> 2 yrs
                              </div>
                              <div class="col-md-8 experience"><i class="fa fa-map-marker" aria-hidden="true"></i> kolkata
                          </div>
                       </div>
                          <div class="row" class="">
                              <div class="col-md-2 skill">key skills:
                              </div>
                              <div class="col-md-8 skill">PHP,SQL,HTML,CODEIGNITER
                          </div>
                       </div> 
                           <div class="row" class="">
                              <div class="col-md-2 description">Job Description:
                              </div>
                              <div class="col-md-8 description">this is web development job for php kjdhfh skjfhskh sdfkjhkhdfsd sdfhgjgfhgf iigyug s sdfdsf sdf sdfsdfsdf sdfsdf sdfsdf
                          </div>
                       </div> 
                          <div class="row experience" >
                            <div class="col-md-1">
                                <input class="star" type="checkbox" title="save job" name="save">
                              </div>  
                              <div class="col-md-4" style="padding-top: 10px;">
                                  <span class="fa fa-inr"></span> 200000
                              </div>
                              <div class="col-md-5" style="padding-top: 10px;">
                                  <span class="skill">Post By</span> <a href="#"><img src="<?php echo base_url()?>profile_pic/avatar.png" width="20px" height="20px"> suraj shinde</a>
                              </div>
                               <div class="col-md-2" style="padding-top: 10px;">
                                  <span class="skill">Few hours ago</span>
                              </div>
                             
                          </div>
                        </div>
                   </div>
              </div>
     </div>
                    
      </div>
     

    <div class="modal fade" id="job_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Job Description</h4></center>
        </div>
        <div class="modal-body" id="job_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="desc_form">  
                              
                                
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-warning" value="" id="apply_job"><span id="stat">Apply</span></button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>
    </div>             
        </div>        
      </div>
          </div>   


  </section>


  </div>
 
