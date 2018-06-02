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
//                alert('Error adding / update data');
            }
        });
    }
    </script>
  <div class="content-wrapper" style="background: white">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Job Information
        <small></small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>recruiter/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jobs</li>
      </ol>
        
       
    </section>
   <hr style="border-top: 1px solid #ccc;">
   <section class="content">
    
      <div class="shadow">
           <!--<div class="row content">-->  
               <div class="box-header">
          <h3 style="color:#5DADE2">Walk in for PHP Developer</h3>
          <h5>Webosys Technologies</h5>
          <label>Eligibility :</label><span> BE</span><br>
          <label>Experience :</label><span> 1-2 year</span><br>
          <label>Salary :</label><span> 12000/-</span><br>
          <label>Job Location :</label><span> Pune</span><br>
              
               <label>Company Profile :</label>
               <p> Softebizz technologies is global services in Web Application Development, E-commerce Development, Content Management Systems, Cloud Solution, Software Testing with its global headquarter at Pune, India.<p>
              </div>
           <!--</div>-->
              </div>
      
     
  </section>


  </div>
 
