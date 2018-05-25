<style>
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
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <h1>
        Applied Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Applied Jobs</li>
      </ol>
        
       
    </section>
   <!--<hr style="border-top: 1px solid #ccc;">-->
   <section class="content">
        
      
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
                          <a href="#" onclick="job_info()"> <span class="job_name">PHP Web Developer</span></a><br>
                          <span class="comp_name">Webosys Technologies</span>
                           </div>
                               <div class="col-md-2"><button type="button" onclick="apply()" class="btn btn-danger btn-sm">Remove</button></div>
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
                                  <span class="skill">Post By</span><a href="#"><img src="<?php echo base_url()?>profile_pic/avatar.png" width="20px" height="20px"> suraj shinde</a>
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
     

    


  </section>


  </div>
 
