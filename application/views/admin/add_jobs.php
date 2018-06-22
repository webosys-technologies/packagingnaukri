<!--<style>
    #num{
        color:white;
    }
    </style>
next here sunil
<!DOCTYPE html>
   Content Wrapper. Contains page content 
  <div class="content-wrapper" style="background-color:white;">
     Content Header (Page header) 
    <section class="content-header">
      <h1><strong>Add Jobs</strong>
        
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
<hr style="border-top: 1px solid #ccc;">
     Main content 
    <section class="content">
   
            <div class="row">
				<div class="col-lg-6 col-md-6">
					<form action="" method="post" id="job_form" onSubmit="return jobpage.validateForm">
						<?php if(!empty($result)) { echo '<div class="success2" style="display: none; margin:0 0 10px 20px;">'.$result.'</div>'; } ?>
						<div class="form-group">
							<label>Job Title: (<span style="color:red">*</span>)</label>
							<input name="jobtitle" class="form-control">
						</div>
						<div class="form-group">
							<label>Company Name</label>
							<input name="company" class="form-control">
						</div>
						<div class="form-group">
							<label>Qualification</label>
							<input name="qualification" class="form-control">
						</div>
						<div class="form-group">
							<label>Experience: (<span style="color:red">*</span>)</label>
							<input name="experience" class="form-control">
						</div>
						<div class="form-group textarea_editor">
							<label>Job Description: (<span style="color:red">*</span>)</label>
                            <textarea cols="80" id="editor1" class="form-control" name="jobdesc" rows="10"></textarea>
						</div>
                        <div class="form-group">
							<label>Job Location: (<span style="color:red">*</span>)</label>
							<input name="joblocation" class="form-control">
						</div>
						<input name="submit_job" value="submit" type="hidden" />
						<input type="reset" value="Reset" name="reset" id="reset" style="display:none;">
						<button type="submit" class="btn btn-default">Submit</button>
						<img src="images/loading.gif" id="loadingimg" style="display: none;float: right;margin:10px 500px 0 0;" />
					</form>
				</div>					
            </div>
    </section>
     /.content 
  </div>
   /.content-wrapper 
  
-->
