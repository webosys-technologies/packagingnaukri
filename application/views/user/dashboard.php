<style>
    #num{
        color:white;
    }
    </style>
 
  <div class="content-wrapper" style="background-color:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-dashboard"></i><strong> Welcome To Packaging Naukri</strong>
        
       
      </h1>

    </section>
<hr style="border-top: 1px solid #ccc;">
    <!-- Main content -->
    <section class="content">

      
            <div class="row">
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box bg-red-gradient">
            <div class="inner">
              <h3 id="num"><?php if(isset($recruiters)){echo count($recruiters);}else{echo "0";}?></h3>

              <p id="num">Recruiters</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Recruiter" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#FFCC33;">
            <div class="inner">
              <h3 id="num"><?php if(isset($members)){echo count($members);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">Members</p>
            </div>
            <div class="icon">
              <i class="fa fa-institution"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#7FB3D5">
            <div class="inner">
              <h3 id="num"><?php if(isset($posted)){echo count($posted);}else{echo "0";}?></h3>

              <p id="num">Job Posted</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Jobs/view_jobs" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#008080">
            <div class="inner">
              <h3 id="num"><?php if(isset($applied)){echo count($applied);}else{echo "0";}?></h3>

              <p id="num">Job Applied</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Applicants" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
        
        
        
        <div class="row">
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="num"><?php if(isset($companies)){echo count($companies);}else{echo "0";}?></h3>

              <p id="num">Companies</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Companies" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#FF99CC;">
            <div class="inner">
              <h3 id="num"><?php if(isset($admins)){echo count($admins);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">users</p>
            </div>
            <div class="icon">
              <i class="fa fa-institution"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#90EE90;">
            <div class="inner">
              <h3 id="num"><?php if(isset($staff)){echo count($staff);}else{echo "0";}?></h3>

              <p id="num">Staff</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url(); ?>user/Users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<script>
  

</script>

