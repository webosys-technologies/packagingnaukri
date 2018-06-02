
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog{
     width: 700px;
      overflow-y: initial !important
}
.modal-body{
  height: 420px;
  overflow-y: auto;
}

.company_body{
  height: 350px;
  overflow-y: auto;
}

</style>
<div class="content-wrapper" style="background:white;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i><strong> Companies Management </strong>
        <small>Add, Edit, Delete <?php  ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Companies</li>
      </ol>
    </section>
    <hr style="border-top: 1px solid #ccc;">
    <section class="content">
        <div class="row">

  <!--<button type="button" class="btn btn-primary">Open Modal</button>-->

         <div class="col-md-4">
    <!--<button class="btn btn-primary"  onclick="add_company()" data-toggle="tooltip" data-placement="bottom" title="Add Company">      <i class="glyphicon glyphicon-plus"></i> Add Company</button>-->
<button type="button"  id="bt" class="btn btn-primary" onclick="add_company()"><i></i>Add Company</button>
    </div>
    <div class="col-md-6">
         <?php
        $this->load->helper('form');
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            
        <div class="alert alert-success alert-dismissible" data-auto-dismiss="5000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> <?php echo $success; ?> 
  </div>
        <?php }?>
             
              <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>           
        <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Error!</strong> <?php echo $error; ?> 
  </div>
        <?php }?>
             
             
       
        </div>
        </div>
    <br>
   
<div class="table-responsive">
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr bgcolor="#338cbf" style="color:#fff">
           <th>ID</th>
                                            <th>Company Name</th>
                                            <th>Logo</th>
                                            <th>Recruiter</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Location</th>
                                            <th>Established</th>
                                            <th style="width:75px">Action</th>
         
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($companies)) {
            
          
         foreach($companies as $comp){
             if($comp->company_status=='1'){?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->user_id; ?>" class="" ></td> --> 
                                        <td><?php echo $comp->company_id?></td>
                                            <td><?php echo $comp->company_name?></td>
                                             
                                            <td><img src="<?php echo base_url().$comp->company_logo;?>" width="80px" height="30px"></td>
                                           <td><?php echo $comp->recruiter_fname." ".$comp->recruiter_lname;?></td>
                                            <td><?php echo $comp->company_email?></td>
                                            <td><?php echo $comp->company_contact?></td>
                                            <td><?php echo $comp->company_city?></td>
				            <td><?php echo $comp->company_created_at?></td>
                                           
                <td>  <button class="btn btn-success btn-xs" onclick="edit_company(<?php echo $comp->company_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Add Company"><i class="glyphicon glyphicon-pencil"></i></button>
                     <button class="btn btn-info btn-xs" onclick="view_company(<?php echo $comp->company_id; ?>)" id="btn2" data-toggle="tooltip" data-placement="bottom" title="View Company"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-danger btn-xs" onclick="delete_company(<?php echo $comp->company_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Company"><i class="glyphicon glyphicon-trash"></i></button>
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
 
 
  $("#state").change(function() {
        
   var el = $(this) ;
              $("#city").html("");


var user_type=el.val();

        if(user_type)
        {
            
      $.ajax({
       url : "<?php echo site_url('index.php/admin/Companies/show_cities')?>/" + user_type,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
        
          $.each(data,function(i,row)
          {
          
              $("#city").append('<option value="'+ row.city_name +'">' + row.city_name+'</option>');
          }
          );
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
     }
    
 });  
  
 
 
 
      $('#table_id').DataTable();
  } );

    $("#myName").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
    var save_method; //for save method string
    var table;
    var id;


  function add_company()
    {  
        save_method="add";        
       $('#form')[0].reset();
        $("#title").text("Add Company");
        $('#myModal').modal('show');

    }

    function edit_company(id)
    {     
      
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/admin/Companies/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {     
          
            $('[name="company_id"]').val(data.company_id);
            $('[name="company"]').val(data.company_name);
            $('[name="type"]').val(data.company_type);
            $('[name="email"]').val(data.company_email);
            $('[name="address"]').val(data.company_address);
            $('[name="contact"]').val(data.company_contact);
            $('[name="pincode"]').val(data.company_pincode);
            $('[name="state"]').val(data.company_state);
            $('[name="city"]').val(data.company_city);
            $('[name="website"]').val(data.company_website);
            $('[name="established"]').val(data.company_establish_in);
            $('[name="multinational"]').val(data.company_multinational);

           
                        
           $("#title").text("Edit Job");
           $('#myModal').modal('show');
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }


function view_company(id)
    {
              
           $.ajax({
       url : "<?php echo site_url('index.php/admin/Companies/company_info')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
//                 $("#company_name").html(data.company_name);
//                    
//                 $("#website").html('<a target="_blank" href="http://'+data.company_website+'">'+data.company_website+'</a>');
//                 $("#email").html(data.company_email);
//                 $("#contact").html(data.company_contact);
//                 $("#address").html(data.company_address);
                 
             
            
          $("#company_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
       
    }



    function save()
    {
        
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {         
        url = "<?php echo site_url('index.php/admin/Companies/company_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/admin/Companies/company_update')?>";
      }

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
               
              
              location.reload();// for reload a page
                
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    }

    function delete_company(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Companies/company_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error deleting data');
            }
        });

      }
    }



  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 id="title" class="modal-title"></h4></center>
        </div>
        <div class="modal-body">
         
            
          	
    		<!--<div class="panel panel-default">-->
    			
    			<div class="panel-body">
    				<form method="post" action="" id="form">
                                    <input type="hidden" value="" name="company_id">
    				 <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label>Company Name</label><span style="color: red">*</span>
                                    <input name="company" class="form-control" placeholder="Compay Name" value="">
                                        <span class="text-danger" id="fname_err"></span>
                                        
                                    </div>
                                                                       
                                </div>
                                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Type</label><span style="color: red">*</span>
                                       
                                    <input name="type" class="form-control" placeholder="MNC or Small Scale" value="">
                                        <span class="text-danger" id="type_err"></span>
                                      
                                    </div>
                                   
                                </div>
                            </div>
                                    
                                    <div class="row">
                                <div class="col-md-12  ">                                
                                    <div class="form-group">
                                        <label>Company Email</label><span style="color: red">*</span>
                                    <input name="email" placeholder="Company Email" class="form-control" value="">
                                        <span class="text-danger" id="email_err"></span>
                                        
                                    </div>
                                                                       
                                </div>
                               </div>
                                    
                                <div class="row">
                                  <div class="col-md-6">                                
                                      <div class="form-group">
                                         <label>Contact</label><span style="color: red">*</span>
                                         <input name="contact" placeholder="Company Contact" class="form-control" value="">
                                          <span class="text-danger" id="contact_err"></span>
                                          
                                      </div>
                                                                        
                                  </div>
                                
                                  <div class="col-md-6">
                                     <label>Website</label><span style="color: red">*</span>
                                     <input name="website" placeholder="Company Website" class="form-control" value="">
                                      <span class="text-danger" id="website_err"></span>

                                  </div>         
                                </div><br>
                                    
                                    <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                       <label>Company Address</label><span style="color: red">*</span>
                                    <textarea cols="80" id="address" class="form-control" name="address" rows="5"></textarea>
                                        <span class="text-danger" id="password_err"></span>
                                        
                                    </div>
                                   
                                    
                                </div>                                
                                     </div> 


                                <div class="row">
                                  <div class="col-md-6">
                                        <label class="form-label">Country</label><span style="color: red">*</span>
                                        <select name="country" id="country" class="form-control" required>
                                                    <option value="">-- Select Country --</option>                              
                                                    <option value="India"> India </option>                                   
                                             </select>
                                        <span class="text-danger"><?php echo form_error('city'); ?></span>

                                    </div>
                                  <div class="col-md-6">
                                      <label class="form-label">State</label><span style="color: red">*</span>
                                      <select name="state" id="state" class="form-control" required>
                                                  <option value="">-- Select State --</option>
                                                  <?php if(isset($states)){
                                                      foreach($states as $state)
                                                      { ?>
                                                         <option value="<?php echo $state->city_state; ?>"><?php echo $state->city_state; ?></option>
                                                     <?php }
                                                  }?>
                                               
                                                  
                                                  <!--<option value="Maharashtra">Maharashtra</option>-->
                                      </select>
                                      <span class="text-danger"><?php echo form_error('state'); ?></span>

                                  </div>
                    
                                </div><br>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">City</label><span style="color: red">*</span>
                                        <select name="city" id="city" class="form-control" required>
                                                    <option value="">-- Select City --</option>                                   
                                             </select>
                                        <span class="text-danger"><?php echo form_error('city'); ?></span>

                                    </div>
                                    
                                     <div class="col-md-6">                                
                                      <div class="form-group">
                                         <label>Pincode</label><span style="color: red">*</span>
                                         <input name="pincode" placeholder="Pincode" class="form-control" value="">
                                          <span class="text-danger" id="mobile_err"></span>                                        
                                      </div>                                                                      
                                     </div>
                               </div>
                
                                    
                     <div class="row">
                          <div class="col-md-6">
                           <label>Company Established</label><span style="color: red">*</span>
                                        <input name="established" placeholder="Established Year" class="form-control" value="">
                            <span class="text-danger" id="gen_err"></span>

                        </div>  
                        <div class="col-md-6">
                           <label>Company Multinational</label><span style="color: red">*</span>
                                        <input name="mnc" placeholder="Job Salary" class="form-control" value="">
                            <span class="text-danger" id="gen_err"></span>

                        </div>  
                    </div>
                             
    			 </form>	
    			</div>
                   
                            <!--</div>-->
    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary"  onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   



<div class="modal fade" id="company_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"style="background:#3c8dbc">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 style="color:white" id="title" class="modal-title">Company Details</h4></center>
        </div>
        <div class="modal-body" id="company_body">         	
    				
    			<div class="panel-body">
    			  <form action="" id="skill_form">  
            <!--<img src="" height="50px" weight="150px"><br>-->                                   
          <h4 style="color:#5DADE2" id="Company Name:"></h4>
          
          <div class="row">
              <div class="col-md-3">
          <label >Company Type </label>
          </div>: <span id="compan_type" class="job_info"> </span><br>
          </div>
              <div class="row">
          <div class="col-md-3">        
          <label >Email </label>
          </div>: <span id="email" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Contact </label>
          </div>: <span id="contact" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label >Address </label>
          </div>: <span id="address" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label>Website </label>
          </div>: <span id="location" class="job_info"></span><br>
                    </div>

          <div class="row">
            <div class="col-md-3">
               <label>Established </label>
               </div><div class="">
               : <span id="job_desc" class="job_info"></span>
                   </div>
                             </div>

                   
                          </form>
    			</div>                              			
    		</div>         
<!--    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" value="skill_update" onclick="apply()" id="job_apply">Apply</button>
          <button type="button" class="btn btn-danger btn-md"  data-dismiss="modal">Close</button>
        </div>-->
    </div>             
        </div>        
      </div>



