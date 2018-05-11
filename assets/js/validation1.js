 $(function(){     
                       
        $('#fname').focusout(function(){
                 
                 check_fname(); 
           
                 
                 });
                 
                 
        $('#lname').focusout(function(){
                 
                 check_lname(); 
           
                 
                 });
                 
                 
                 
         $('#center_name').focusout(function(){
                 
                 check_center_name(); 
           
                 
                 });
                 
          
        $('#email').focusout(function(){
                 
                 check_email(); 
           
                 
                 });  
          
          
          
          
          
         $('#password').focusout(function(){
                 
                 check_pass(); 
           
                 
                 });
                 
                 
                 
        $('#cpassword').focusout(function(){
                 
                 check_confirm_pass(); 
           
                 
                 });
                 
                 
                 
        $('#mobile').focusout(function(){
                 
                 check_mobile(); 
           
                 
                 });
                 
                 
                 
         $('#pincode').focusout(function(){
                 
                 check_pincode(); 
           
                 
                 });
                 
                 
                 
                 
                 function check_fname()
                 {
                     var str_value=$("#fname").val();
                     var length=str_value.length;
                     var alpha_exp=/^[a-zA-Z]+$/;
                     var space_exp=/^\s+$/;
                     
                      if(str_value=="")
                     {
                         $("#fname_err").html("string should not be empty");
                          $('#fname_err').show();
                          
                     }
                     else
                         if(length<2)
                     {
                          $("#fname_err").html("String should not be single character");
                          $('#fname_err').show();
                     }
                     else
//                         if(length>15)
//                     {
//                          $("#fname_err").html("String should not be greater than 15 character");
//                          $('#fname_err').show();
//                     }
//                      else
                          if(space_exp.test(str_value)){
                              $("#fname_err").html("spaces are not allowed");
                          $('#fname_err').show();
                          }
                      else
                     if(!alpha_exp.test(str_value))
                      {
                       $("#fname_err").html("spaces,Numbers,Symbols and operaters are not allowed.");
                          $('#fname_err').show();
                      }
                       else
                         
                     {
                         $('#fname_err').hide();
                     }
                     
                     }
                     
                     
                     
                     
                      function check_lname()
                 {
                     var str_value=$("#lname").val();
                     var length=str_value.length;
                     var alpha_exp=/^[a-zA-Z]+$/;
                     var space_exp=/^\s+$/;
                     
                      if(str_value=="")
                     {
                         $("#lname_err").html("string should not be empty");
                          $('#lname_err').show();
                          
                     }
                      else
                         if(length<2)
                     {
                          $("#lname_err").html("String should not be single character");
                          $('#lname_err').show();
                     }
                     else
//                         if(length>15)
//                     {
//                          $("#lname_err").html("String should not be greater than 15 character");
//                          $('#lname_err').show();
//                     }
//                     
//                      else
                          if(space_exp.test(str_value)){
                              $("#lname_err").html("spaces are not allowed");
                          $('#lname_err').show();
                          }
                      else
                     if(!alpha_exp.test(str_value))
                      {
                       $("#lname_err").html("spaces,Numbers,Symbols and operaters are not allowed.");
                          $('#lname_err').show();
                      }
                       else
                         
                     {
                         $('#lname_err').hide();
                     }
                     
                     }
                     
                     
                     
                     
                      function check_center_name()
                 {
                     var str_value=$("#center_name").val();
                     var length=str_value.length;
                     var alpha_exp=/^[a-zA-Z]+$/;
                     var space_exp=/\s/;
                    
                     
                      if(str_value=="")
                     {
                         $("#center_name_err").html("string should not be empty");
                          $('#center_name_err').show();
                          
                     }
                      else
                         if(length<2)
                     {
                          $("#center_name_err").html("String should not be single character");
                          $('#center_name_err').show();
                     }
                     else
//                         if(length>15)
//                     {
//                          $("#center_name_err").html("String should not be greater than 15 character");
//                          $('#center_name_err').show();
//                     }
//                      else
                          if(space_exp.test(str_value)){
                             /* $("#center_name_err").html("spaces are not allowed");
                          $('#center_name_err').show();*/
                          $('#center_name_err').hide();
                          }
                      else
                     if(!alpha_exp.test(str_value))
                      {
                       $("#center_name_err").html("spaces,Numbers,Symbols and operaters are not allowed.");
                          $('#center_name_err').show();
                      }
                       else
                         
                     {
                         $('#center_name_err').hide();
                     }
                     
                     }
                     
                     
                     
                     
                      function check_email()
              {
                  var sEmail = $('#email').val();
                  
                   var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                   if (filter.test(sEmail)) 
                   
                    {        
                      
                       
                      $('#email_err').hide();
                      return true;
                 
                       }
                    else
                    {
                        
                       $('#email_err').html("Invalid Email Id"); 
                       $('#email_err').show();
                    }
              }
                     
                     
                     
                     
                function check_pass()
                 {
                     var pass=$('#password').val();
                     var length=pass.length;
                   //  var confirm_pass=$('#cpassword').val();
                   //  var lenght1=confirm_pass.length;
                     if(length<8)
                     {
                     $("#password_err").html("Enter Password at least 8 character");
                      $('#password_err').show();
                     }
                           else
                     {
                          $('#password_err').hide();
                     }
                 }
                     
                     
                     
                      function check_confirm_pass()
                 {
                     var pass=$('#password').val();
                     var lenght=pass.length;
                     var confirm_pass=$('#cpassword').val();
                     var lenght1=confirm_pass.length;
                     if(pass!=confirm_pass)
                     {
                     $("#cpassword_err").html("Password doesn't match");
                      $('#cpassword_err').show();
                     }
                          else
                           if(lenght1="")
                       {
                           $('#password_err').hide();
                           $("#password_err").html("Enter the password");
                           $("#cpassword_err").html("Password doesn't match");
                      $('#password_err').show();
                       }
                       else
                     {
                          $('#cpassword_err').hide();
                     }
                 }
                 
                 
                 
                  function check_mobile()
              {
                  var number=$('#mobile').val();
                  var lenght=number.length;
                  if(isNaN(number))
                  {
                       $('#mobile_err').html("Invalid Mobile Number ");
                      $('#mobile_err').show();
                                         
                  }
                  else if(lenght<10 || length>11)
                  {
                      $('#mobile_err').html("Mobile no digit should be 10 or 11 digit");
                      $('#mobile_err').show();
                  }
                  else
                  {
                      $('#mobile_err').hide();
                   
                  }
                  
                  
                 } 
                     
                     
                     
                     
                     function check_pincode()
              {
                  var number=$('#pincode').val();
                  var lenght=number.length;
                  if(isNaN(number))
                  {
                       $('#pincode_err').html("Characters are not alowed");
                      $('#pincode_err').show();
                      
                     // err_msg=true;
                  }
                 
                    else if(lenght!==6)
                  {
                      $('#pincode_err').html("pincode should be 6 digit");
                      $('#pincode_err').show();
                  }
                  else
                  {
                      $('#pincode_err').hide();
                     return true;
                  }
                  
                  
                 }
                     
                     
                     
                     
                 
     });