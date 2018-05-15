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
                             
                             
            $('#otp').focusout(function(){
               

                             if($('#otp').val()==""){
                                 $("#otp_err").html("OTP is required");
                             } 
                             else
                                 if(isNaN($('#otp').val()))
                             {
                                 $("#otp_err").html("Invalid OTP");
                             }else
                             if($('#otp').val().length!=6){
                                 $("#otp_err").html("OTP is 6 digit");
                             }else
                                {
                                $("#otp_err").html("");
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
                             
                             
                             
                             if($('#otp').val()==""){
                                 $("#otp_err").html("OTP is required");
                             } 
                             else
                                 if(isNaN($('#otp').val()))
                             {
                                 $("#otp_err").html("Invalid OTP");
                             }else
                               {
                                $("#otp_err").html("");
                                var otp="true";
                                }
                             
                             
                             
                                                      
                             
      if(email=="true" && pass=="true")      {
          return true;
      }else{
          return false;
      }
    
}

function email_validation()
{
     if($('#member_email').val()=="") {
                     $("#email_err").html("Email is required");
                 } 
                 else{
                     $("#email_err").html("");
                     var email="true";
                 }
                 if(email=="true")
                 {
                     return true;
                 }else{
                     return false;
                 }
}
            
          
          


