      function validation()
   {      
      var fname;
       var lname;
       var location;
       var current;
       var expected;
       var exp;
       var notice;
       var email;
       
    var number=$("#mobile").val();
      var num_length=number.length;
        if(number!='')
            {                
                if(isNaN(number))
                {
                    
                 mobile=false;                 
                 $("#mobile_err").html("Please Enter Valid Mobile Number");
                }else if(num_length<10 || num_length>11)
                {
                    mobile=false;   
                     $('#mobile_err').html("Mobile no digit should be 10 or 11 digit");
                }else{
                    
                    mobile=true;
                    $("#mobile_err").html("");
                }
            }else{
                 mobile=false;                 
                 $("#mobile_err").html("Please Enter Mobile Number");
             }
             
          if($('[name="location"]').val()!="")
          {
             
              location=true;
              $("#location_err").html("");
          }else{
               location=false;
              $("#location_err").html("Please Enter Location");
          }
          
          if($('[name="min_salary"]').val()!="0" || $('[name="max_salary"]').val()!="0")
          {
               current=true;
              $("#current_err").html("");
          }else{
               current=false;
              $("#current_err").html("Please Enter Current CTC");
          }
          
                   
          if($('[name="min_exp"]').val()!="0" || $('[name="max_exp"]').val()!="0")
          {               exp=true;
              $("#exp_err").html("");
          }else{
               exp=false;
              $("#exp_err").html("Please Enter Experience");
          }
          
          
          if($('[name="notice"]').val()!="")
          {
              notice=true;
              $("#notice_err").html("");
          }else{
              notice=false;
              $("#notice_err").html("Please Enter Notice Period.");
          }
          
          if($('[name="fname"]').val()!="")
          {
               fname=true;
              $("#fname_err").html("");
          }else{
              fname=false;
              $("#fname_err").html("Please Enter First Name");
          }
           
          if($('[name="lname"]').val()!="")
          {
               lname=true;
              $("#lname_err").html("");
          }else{
               lname=false;
              $("#lname_err").html("Please Enter Last Name");
          }
          
          if(resume==true)
          {
               $("#resume_err").html("");
             
          }else{
                  $("#resume_err").html("Please Select Resume");
          }
          
          
      var sEmail=$("#apply_email").val();
        if(sEmail!='')
            {  sEmail = $('#apply_email').val();
                  
                   var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                   if (filter.test(sEmail))                    
                    {    
                      
                      $('#apply_email_err').html("");
                      email=true;                 
                    }
                    else
                    {   
                        email=false;
                       $('#apply_email_err').html("Invalid Email Id"); 
                     }
            }else{
                 
                 $("#apply_email_err").html("Please Enter Email ID");
                 email=false;
             }
             
             
             if(mobile==true && email==true && fname==true && lname==true && location==true && exp==true && notice==true && current==true && resume==true)
             {
               return true;  
             }
             else
             {
                return false; 
             }
         }