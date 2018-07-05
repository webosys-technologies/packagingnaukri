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
        
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#FFCC33;">
            <div class="inner">
              <h3 id="num"><?php if(isset($members)){echo count($members);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">Member Masters</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Members" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <i class="fa fa-suitcase"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Jobs/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
          <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box" style="background:#90EE90;">
            <div class="inner">
              <h3 id="num"><?php if(isset($user)){echo count($user);}else{echo "0";}?></h3>

              <p id="num">Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         
         <div class="col-lg-3 col-xs-6">
           <!--small box--> 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="num"><?php if(isset($companies)){echo count($companies);}else{echo "0";}?></h3>

              <p id="num">Companies</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Companies" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
<!--        <div class="col-lg-3 col-xs-6">
           small box 
          <div class="small-box" style="background:#008080">
            <div class="inner">
              <h3 id="num"><?php if(isset($applied)){echo count($applied);}else{echo "0";}?></h3>

              <p id="num">Job Applied</p>
            </div>
            <div class="icon">
              <i class="fa fa-suitcase"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Applicants" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
      </div>
        
        
        
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
            <a href="<?php echo base_url(); ?>admin/Recruiter" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!-- small box  -->
          <div class="small-box" style="background:#FF99CC;">
            <div class="inner">
              <h3 id="num"><?php if(isset($institute)){echo count($institute);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">University</p>
            </div>
            <div class="icon">
              <i class="fa fa-institution"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Institute" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!-- small box  -->
          <div class="small-box" style="background:#ff6666;">
            <div class="inner">
              <h3 id="num"><?php if(isset($education)){echo count($education);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">Education</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Education" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
         <!--./col--> 
        <div class="col-lg-3 col-xs-6">
           <!-- small box  -->
          <div class="small-box" style="background:#ffa64d;">
            <div class="inner">
              <h3 id="num"><?php if(isset($customer)){echo count($customer);}else{echo "0";}?><sup style="font-size: 20px"></sup></h3>

              <p id="num">Customer</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin/Customer" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
  

</script>

