<style>
    #num{
        color:white;
    }
    </style>
<!--next here sunil-->
<!DOCTYPE html>
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
                	
                	<div id="viewjobinfo" style="display:none;" class="row">
                        <div class="col-lg-6">
                            <form action="" method="post" id="job_form" onSubmit="return jobpage.validateForm()">
                                <div class="form-group">
                                    <label>Job Title: (*)</label>
                                    <input name="jobtitle" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input name="company" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <input name="qualification" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Experience: (*)</label>
                                    <input name="experience" class="form-control" value="">
                                </div>
                                <div class="form-group textarea_editor">
                                    <label>Job Description: (*)</label>
                                    <textarea cols="80" id="editor" class="form-control" name="jobdesc" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Job Location: (*)</label>
                                    <input name="joblocation" class="form-control" value="">
                                </div>
                                <input name="submit_job" value="submit" type="hidden" />
                                <input name="id" value="" type="hidden" />
                                <button type="submit" class="btn btn-success">Update</button>
                                <div class="btn btn-danger" id="close">Close</div>
                            </form>                                                    
                    		<div class="clearfix">&nbsp;</div>
                        </div>					
                    </div>
                   
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
                                            <th>Company Name</th>
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
                                            <td><?php echo $job->company_name?></td>
                                            <td><?php echo $job->job_education?></td>
                                            <td><?php echo $job->job_experience?></td>
                                            <td><?php echo $job->job_city?></td>
				            <td><?php echo $job->job_created_at?></td>
                                            <td><a href="javascript:void(0);" id="editjobinfo"><button class="btn btn-primary btn-circle" type="button"><i class="fa fa-list"></i></button></a><a href="javascript:void(0);" id=""><button class="btn btn-warning btn-circle" type="button"><i class="fa fa-times"></i></button></a></td>
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
  
