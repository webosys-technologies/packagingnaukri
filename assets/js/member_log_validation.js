 $(function(){     
                       
        $('#member_email').focusout(function(){
                 
                 if($('#member_email').val()=="") {
                     $("#email_err").html("Email or Username is required");
                 } 
                 else{
                     $("#email_err").html("");
                 }
                   
           
                 
                 });
                 
                 
            $('#password').focusout(function(){
               

                             if($('#password').val()==""){
                                 $("#password_err").html("Password is required");
                             } 
                             else{
                                 $("#password_err").html("");
                             }



                             });
             });
             
             
function member_log_validation()
{
    if($('#member_email').val()=="") {
                     $("#email_err").html("Email or Username is required");
                 } 
                 else{
                     $("#email_err").html("");
                     var email="true";
                 }
    
    
    
                            if($('#password').val()==""){
                                 $("#password_err").html("Password is required");
                             } 
                             else{
                                 $("#password_err").html("");
                                 var pass="true";
                             }
                             
                             
      if(email=="true" && pass=="true")      {
          return true;
      }else{
          return false;
      }
    
}
            
          
          


