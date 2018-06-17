<style type="text/css">

</style>
  <div  class="content-wrapper" style="background:white">
        <section class="content-header">
      <h1>
          <span class="fa fa-setting"></span>

        <strong>Setting</strong>
        <!--<small>Control panel</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/Dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Setting</li>
      </ol>
             </section>
<!--<hr style="border-top: 1px solid #ccc;">-->
      <section class="content" >

<div class="row content">
    <div class="col-md-12 col-xs-12">
        <span><b>Admin, Member, Recruiter Login From All Sites ?</b></span><br>
        <input type="radio" name="source_status" id="source_status_enable" value="1"> <span>Enable</span><br>
        <input type="radio" name="source_status" id="source_status_disable" value="0"> <span>Disable</span>
       
    </div>
	</div>

</section>
</div>


<script type="text/javascript">
	$(document).ready(function(){
            
            
            
             
       <?php
    if(isset($data))
    {
       
        ?>
          
               if("<?php echo $data->source_status;?>"=='1')
               {
                  
                   $("#source_status_enable").prop('checked',true);
               }
                if("<?php echo $data->source_status;?>"=='0')
               {                
                   
                   $("#source_status_disable").prop('checked',true);
               }
                  <?php
    }
    ?>
            
            
            
            
        $("#source_status_disable").click(function(){
            save($("#source_status_disable").val());
    
                      });
                      
            $("#source_status_enable").click(function(){
                
                 save($("#source_status_enable").val());
            });
       
  });
  
       
        
        
    var save_method; //for save method string
    var table;
    var ask_value;
        
        
         function save(ask_value)
    {      
       
       // ajax adding data to database
          $.ajax({
            url : "<?php echo site_url('index.php/admin/Setting/source_status')?>/"+ask_value,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
              
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
             
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
//                alert('Error adding / update data in center');
            }
        });
    } 
</script>
