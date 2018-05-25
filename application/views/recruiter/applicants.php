
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 50%;
      overflow-y: initial !important
}
.modal-body{
  height:480px;
  overflow-y: auto;
}

</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Applicants </strong>
        <!--<small>Add, Edit, Delete <?php  ?></small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Applicants</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    
    <section class="content">   
        <div class="row">
        <div class="col-md-2">
     <a href="<?php echo base_url()?>recruiter/Jobs" class="btn btn-info"><< BACK</a><br>
     </div>
     </div><br>
   
<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff">
          <th>ID</th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>Qualification</th>
          <th>Role</th>
          <th>RESUME</th>
          <th>MOBILE</th>
          <th>CITY</th>
          <th>APPLY AT</th>
          <!--<th>STATUS</th>-->
<th width="25px">ACTION</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($members)) {
            
          
         foreach($members as $res){
             if($res->member_status=='1'){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->member_id; ?>" class="" ></td> --> 
                                        <td><?php echo $res->member_id;?></td>
                                        <td style="cursor:pointer;" title="member info" onclick="view_member(<?php echo $res->member_id;?>)"><?php echo $res->member_fname.' '. $res->member_lname; ?></td>
                                         <td><?php echo $res->member_email;?></td>
                                        <td><?php echo $res->education_degree;?></td>
                                        <td><?php echo $res->employment_designation; ?></td>
                                        <td><a href="<?php echo base_url().$res->member_resume; ?>">Resume</a></td>
                                       <td><?php echo $res->member_mobile;?></td>
                                       <td><?php echo $res->member_city;?></td>
                                       <td><?php echo $res->apply_at;?></td>
<!--                                       <td>
                                           <?php 
                                       if($res->member_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>-->
                                       <td>
                 
                  <button class="btn btn-info btn-sm" onclick="view_member(<?php echo $res->member_id;?>)" data-toggle="tooltip" data-placement="bottom" title="view applicants"><i class="glyphicon glyphicon-eye-open"></i></button>
                 

                </td>
              </tr>
          <?php }}}?>



      </tbody>

    </table>
    </div>
</section>
  </div>

  <script type="text/javascript">
  $(document).ready( function () { 
  
  });  
 
 

    function view_member(id)
    {
    
          $.ajax({
            url : "<?php echo site_url('recruiter/Jobs/member_info')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
               
              $("#applicant_modal").modal('show');
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
               
            }
        });

      }
      </script>

    <div class="modal fade" id="applicant_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" class="modal-title">Applicants Information</h4></center>
        </div>
        <div class="modal-body" id="applicants_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="desc_form">  
                              
                                
                          </form>
    			</div>                              			
    		</div>         
    	 <div class="modal-footer">
<!--             <button type="button" class="btn btn-warning" value="" id="apply_job"><span id="stat">Apply</span></button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>-->
        </div>
    </div>             
        </div>        
      </div>




