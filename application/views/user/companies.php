
<style type="text/css">
  .modal fade{
    display: block !important;
}
.modal-dialog,#modal_dialog1{
     width: 60%;
      overflow-y: initial !important
}
.modal-body{
  height: 420px;
  overflow-y: auto;
}

@media (max-width:800px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:768px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
}
@media (max-width:320px){
    #modal_dialog,#modal_dialog1{
     width: 100%;
      overflow-y: initial !important
}
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
                                            <th>Status</th>
                                            <th>Source</th>
                                            <th style="width:75px">Action</th>
         
        </tr>
      </thead>
      <tbody id="myTable">
        <?php
          if (isset($companies)) {
            
          
         foreach($companies as $comp){
          ?>
             <tr>    <!--                    <td><input type="checkbox" name="checked[]"  value="<?php echo $res->user_id; ?>" class="" ></td> --> 
                                        <td><?php echo $comp->company_id?></td>
                                            <td><?php echo $comp->company_name?></td>
                                             
                                            <td><img src="<?php echo base_url().$comp->company_logo;?>" width="80px" height="30px"></td>
                                           <td><?php echo $comp->recruiter_fname." ".$comp->recruiter_lname;?></td>
                                            <td><?php echo $comp->company_email?></td>
                                            <td><?php echo $comp->company_contact?></td>
                                            <td><?php echo $comp->company_city?></td>
				            <td><?php echo $comp->company_created_at?></td>
                                           
                                          <td> <?php if($comp->company_status==1)
                                       {
                                           echo "Active";
                                       }
                                       else 
                                       {
                                           echo "Not Active";
                                       }
                                       ?></td>
                                       <td><?php echo $comp->company_source; ?></td>
                                           
                <td>  <button class="btn btn-success btn-xs" onclick="edit_company(<?php echo $comp->company_id; ?>)" id="btn1" data-toggle="tooltip" data-placement="bottom" title="Edit Job"><i class="glyphicon glyphicon-pencil"></i></button>
                  <button class="btn btn-info btn-xs" onclick="view_company(<?php echo $comp->company_id; ?>)" id="btn2" data-toggle="tooltip" data-placement="bottom" title="View Company"><i class="fa fa-eye"></i></button>
                    <button class="btn btn-danger btn-xs" onclick="delete_menu(<?php echo $comp->company_id;?>)" data-toggle="tooltip" data-placement="bottom" title="Delete Job"><i class="glyphicon glyphicon-trash"></i></button>
                             </td>
              </tr>
          <?php }}?>



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
       url : "<?php echo site_url('index.php/user/Companies/show_cities')?>/" + user_type,        
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
         $("#source_err").html(""); 
         $('[name="city"]').html("");
        save_method="add";   
        $("#company_err").html(""); 
        $("#state_err").html(""); 
        $("#city_err").html(""); 
       $('#form')[0].reset();
        $("#title").text("Add Company");
        $('#myModal').modal('show');

    }

    function edit_company(id)
    {    $("#source_err").html(""); 
         $("#company_err").html(""); 
        $("#state_err").html(""); 
        $("#city_err").html(""); 
      
      save_method = 'update';
     $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/user/Companies/ajax_edit/')?>/" + id,
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
             $('[name="city"]').append('<option value="'+data.company_city+'">'+data.company_city+'</option>');
            $('[name="city"]').val(data.company_city);
            $('[name="country"]').val(data.company_country);
            $('[name="website"]').val(data.company_website);
            $('[name="established"]').val(data.company_establish_in);
            $('[name="multinational"]').val(data.company_multinational);
            $('[name="status"]').val(data.company_status);
            $('[name="source"]').val(data.company_source);

           
                        
           $("#title").text("Edit Company");
           $('#myModal').modal('show');
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
//            alert('Error get data from ajax 1');
        }
    });
    }



    function save()
    {
        $("#save_btn").attr('disabled',true);
        var data = new FormData(document.getElementById("form"));
      var url;
      if(save_method == 'add')
      {         
        url = "<?php echo site_url('index.php/user/Companies/company_add')?>";
      }
      else
      {
        url = "<?php echo site_url('index.php/user/Companies/company_update')?>";
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
              if(json.success)
              {
                  location.reload();// for reload a page
              }else{
                  $("#save_btn").attr('disabled',false);
              }
              
              if(json.state_err)
              {
                   $("#state").focus();
                $("#state_err").html(json.state_err);
              }else{
                   $("#state_err").html("");
              }
              
              if(json.city_err)
              {
                  $("#city").focus();
               $("#city_err").html(json.city_err); 
              }else{
                  $("#city_err").html(""); 
              }
              if(json.company_err)
              {
                   $('[name=company]').focus();
               $("#company_err").html(json.company_err); 
              }else{
                   $("#company_err").html(""); 
              }
              
              if(json.source_err)
              {
                   $('[name=source]').focus();
               $("#source_err").html(json.source_err); 
              }else{
                   $("#source_err").html(""); 
              }
               
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data');
            }
        });
    }
    
    
     function delete_menu(id)
    {

        $("#delete_comp").attr('onclick','delete_company('+id+')');
        $("#delete_modal").modal('show');
    }
    

    function delete_company(id)
    {
      
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('index.php/user/Companies/company_delete')?>/"+id,
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
    
    function view_company(id)
    {
              
           $.ajax({
       url : "<?php echo site_url('index.php/user/Companies/company_info')?>/" + id,        
       type: "GET",
              
       dataType: "JSON",
       success: function(data)
       {
//           alert(data.company_address);
                 $("#source").html(data.company_source);
                 $("#company_name").html(data.company_name);
                 $("#company_type").html(data.company_type);
                  $("#establish").html(data.company_establish_in);
//                    
                 $("#website").html('<a target="_blank" href="http://'+data.company_website+'">'+data.company_website+'</a>');
                 $("#email").html(data.company_email);
                 $("#contact").html(data.company_contact);
                 $("#comp_address").html(data.company_address);
                 
             
            
          $("#company_modal").modal('show');
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
//         alert('Error...!');
       }
     });
       
    }



  </script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" id="modal_dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white">
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
                                          <label>Source<span style="color: red">*</span></label>
                                          <select name="source" class="form-control">
                                            <option>--Select Source--</option>
                                            <option value="Packaging">Packaging</option>
                                            <option value="Printing">Printing</option>
                                            <option value="Plastic">Plastic</option>
                                          </select>
                                          <span class="text-danger" id="source_err"></span>
                                        </div>
                                      </div>
                                    </div>
    				                 <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label>Company Name</label><span style="color: red">*</span>
                                    <input name="company" class="form-control" placeholder="Compay Name" value="">
                                        <span class="text-danger" id="company_err"></span>
                                        
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
                                      <span class="text-danger" id="state_err"><?php echo form_error('state'); ?></span>

                                  </div>
                    
                                </div><br>


                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">City</label><span style="color: red">*</span>
                                        <select name="city" id="city" class="form-control" required>
                                                    <option value="">-- Select City --</option>                                   
                                             </select>
                                        <span class="text-danger" id="city_err"><?php echo form_error('city'); ?></span>

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
                                        <input name="mnc" placeholder="Multinational" class="form-control" value="">
                            <span class="text-danger" id="gen_err"></span>

                        </div>  
                    </div>
                                 <div class="row"> 
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Status<span style="color: red">*</span></label>
                                     <select name="status" class="form-control" >
                                            <option value="1">Active</option>
                                            <option value="0">Not Active</option>
                                        </select>
                                  </div>
                                </div>
                                   </div>
                             
    			 </form>	
    			</div>
                   
                            <!--</div>-->
    			
    		</div>         
    	 <div class="modal-footer">
             <button type="button" class="btn btn-primary" id="save_btn" onclick="save()">Save</button>
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
    </div>           
           
        </div>        
      </div>
   

    
  <div class="modal fade" style="margin-top: 200px" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" >
    <div class="modal-content" >
      <div style="background:#3c8dbc; height:70px" class="modal-header">
          
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h4 style="color:white" class="modal-title" style="" id="myModalLabel"><strong>Company</strong></h4></center>
      </div>
      <div style="background:#F2F3F4; height: 90px; " class="modal-body" >
          <div class="row">
              <div class="col-md-10 col-md-offset-2">
                  <label style="color:black">Are you sure want to delete this Company ?</label> <br>
                  <button class="btn btn-default" id="delete_comp">Yes</button>
                  <button class="btn btn-default" data-dismiss="modal">No</button>
          
                  </div>              
                 </div>
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  

<div class="modal fade"  id="company_modal" role="dialog">
    <div class="modal-dialog" id="modal_dialog1">   
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
          <h4 style="color:#5DADE2" id="company_name"></h4>
          
          
          <div class="row">
              <div class="col-md-3">
          <label >Source </label>
          </div>: <span id="source" class="job_info"> </span><br>
          </div>
          <div class="row">
              <div class="col-md-3">
          <label >Company Type </label>
          </div>: <span id="company_type" class="job_info"> </span><br>
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
          </div>: <span id="comp_address" class="job_info"> </span><br>
                    </div>

          <div class="row">
              <div class="col-md-3">
          <label>Website </label>
          </div>: <span id="website" class="job_info"></span><br>
                    </div>

          <div class="row">
            <div class="col-md-3">
               <label>Established In</label>
               </div><div class="">
               : <span id="establish" class="job_info"></span>
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





