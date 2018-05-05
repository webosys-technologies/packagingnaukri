<style>
    #num{
        color:white;
    }
    </style>
<!--next here sunil-->
<!DOCTYPE html>



<script>
 $( document ).ready( function() {
			 <?php if(isset($jobs))
                                    {
                                    foreach($jobs as $job){
                                        $stat=$job->job_status;
                                        if($stat==1)
                                        {
                                        ?>
				$('#editjobinfo_<?php echo $job->job_id; ?>').click(function(){                                    
			$('#viewjobinfo_<?php echo $job->job_id; ?>').show();
		});
		$('#close<?php echo $job->job_id; ?>').click(function(){
			$('#viewjobinfo_<?php echo $job->job_id; ?>').hide();
		});
//		$('#deletejobinfo_<?php echo $job->job_id; ?>').click(function(){
//			$.ajax({
//				url: "deletejobinfo.php?jobsid=<?php echo $job->job_id; ?>",
//				success: function(data){
//					var statusUrl = 'http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>?status=1';
//					document.location.href = statusUrl;
//				},
//				error : function(data)
//				{
//					var statusUrl = 'http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>?status=0';
//					document.location.href = statusUrl;
//				}
//			  });
//		});	
			 <?php
                                        }
                                    }
                                    }
                                    ?>	
        } );
        
        var id;
//       function update(id)
//       {
//        
//       var data = new FormData(document.getElementById("job_form<?php echo $job->job_id?>"));
//       var url = "<?php echo site_url('index.php/admin/Jobs/update_job')?>";
//           alert(data);
//       $.ajax({               
//            url : url,
//            type: "POST",
//            async: false,
//            processData: false,
//            contentType: false,            
//            data: data,
//            dataType: "JSON",
//        success: function(data)
//        {  var success;
//            var email_error;           
//        },
//        error: function (jqXHR, textStatus, errorThrown)
//        {            
//          alert('Error...!');
//        }
//      });
//      }
               
 </script>







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><strong>View All Jobs</strong>
        
       
      </h1>

    </section>
<hr style="border-top: 1px solid #ccc;">
    <!-- Main content -->
    <section class="content">
            <!-- /.row -->
            
            <div class="row">
                
                <div class="col-lg-12">
                	<!--<button class="btn btn-primary" id="bt" onclick="add_job()" data-toggle="tooltip" data-placement="bottom" title="Add Job"><i class="glyphicon glyphicon-plus"></i>Add Job</button><br>-->
                    
                    
                     <?php if(isset($jobs))
                                    {
                                    foreach($jobs as $job){
                                        $stat=$job->job_status;
                                        if($stat==1)
                                        {
                                        ?>
                	<div id="viewjobinfo_<?php echo $job->job_id?>" style="display:none;" class="row">
                        <div class="col-lg-6">
                            <form action="<?php echo base_url();?>admin/Jobs/update_job" method="post" id="job_form<?php echo $job->job_id?>" onSubmit="return jobpage.validateForm()">
                                <div class="form-group">
                                    <label>Job Title: (*)</label>
                                    <input name="jobtitle" class="form-control" value="<?php echo $job->job_title; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input name="company" class="form-control" value="<?php echo $job->company_name; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <input name="qualification" class="form-control" value="<?php echo $job->job_education; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Experience: (*)</label>
                                    <input name="experience" class="form-control" value="<?php echo $job->job_experience; ?>">
                                </div>
                                <div class="form-group textarea_editor">
                                    <label>Job Description: (*)</label>
                                    <textarea cols="80" id="editor" class="form-control" name="jobdesc" rows="10"><?php echo $job->job_description; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Job Location: (*)</label>
                                    <input name="joblocation" class="form-control" value="<?php echo $job->job_city; ?>">
                                </div>
                                <input name="submit_job" value="submit" type="hidden" />
                                <input name="id" value="<?php echo $job->job_id; ?>" type="hidden" />
                                <button type="submit" onclick='update("<?php echo $job->job_id?>")' class="btn btn-success">Update</button>
                                <div class="btn btn-danger" id="close<?php echo $job->job_id; ?>">Close</div>
                            </form>                                                    
                    		
                        </div>	
                            <div class="clearfix">&nbsp;</div>
                    </div>
                    
                     <?php
                                        }
                                    }
                                    }
                                    ?>	
                    
                    
                    
                    
                    
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Job Posting Lists
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Job Title</th>
                                            <th>Qualification</th>
                                            <th>Experience</th>
                                            <th>Location</th>
					    <th>Posted Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php if(isset($jobs))
                                    {
                                    foreach($jobs as $job){
                                        $stat=$job->job_status;
                                        if($stat==1)
                                        {
                                        ?>
                                      
                                        <tr>
                                            <td><?php echo $job->job_id?></td>
                                            <td><?php echo $job->job_title?></td>
                                            <td><?php echo $job->job_education?></td>
                                            <td><?php echo $job->job_experience?></td>
                                            <td><?php echo $job->job_city?></td>
				            <td><?php echo $job->job_created_at?></td>
                                            <td><a href="javascript:void(0);" id="editjobinfo_<?php echo $job->job_id?>"><button class="btn btn-primary btn-circle" type="button"><i class="fa fa-list"></i></button></a>  &nbsp;<a href="javascript:void(0);" id="delete_job_info<?php echo $job->job_id?>"><button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i></button></a></td>
                                        </tr>
                             
                                   <?php
                                        }
                                    }
                                    }
                                    ?>				
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
