<style>
    .shadow {
   
    /*padding: 20px;*/
    box-shadow: 5px 5px 10px #CCD1D1;
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
                alert('Error adding / update data');
            }
        });
    }
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jobs
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>student/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs</li>
      </ol>
        
        <form action="#" id="search_form">
<div class="form-group form-group-sm">
    <div class="row">
        <div class="col-md-3">
  <input type="text" class="form-control" placeholder="Job Title" name="title" aria-describedby="sizing-addon3">
    </div>
        <div class="col-md-3">
  <input type="text" class="form-control" placeholder="Skill" name="skill" aria-describedby="sizing-addon3">
    </div>
        <div class="col-md-3">
  <input type="text" class="form-control" placeholder="Location" name="location" aria-describedby="sizing-addon3">
    </div>
         <button type="button" onclick="search_job()" class="btn btn-warning btn-md">Search <span class="fa fa-search"></span></button>
    </div>
    <br>
   
    <label>Full Time</label>
    <input type="checkbox" value="">&nbsp; &nbsp; &nbsp;
     <label>Part Time</label>
    <input type="checkbox" value="">&nbsp; &nbsp; &nbsp;
    <label>Internship</label>
    <input type="checkbox" value="">&nbsp; &nbsp; &nbsp;
    <label>Temporary</label>
    <input type="checkbox" value="">&nbsp; &nbsp; &nbsp;
    
</div>
           
</form>
    </section>
   <hr style="border-top: 1px solid #ccc;">
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
      
     
  </section>


  </div>
 
