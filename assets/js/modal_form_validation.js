
 var alpha_exp=/^[a-zA-Z]+$/;
 var space_exp=/\s/;
  var den_space_beg=/^[a-zA-Z ]*$/;

function sub_center_validation()
{
    
         if ($("#fullname").val() == ""){
            $("#text_field1_error").html("Please Enter Full Name");
          }else{
              var fullname="true";
              $("#text_field1_error").html("");
          }
          
          if ($("#sub_center_name").val() == ""){
            $("#text_field2_error").html("Please Enter Sub Center Name");
          }else{
              var center_name="true";
              $("#text_field2_error").html("");
          }
          
          if ($("#center_id").val() == ""){
              
            $("#select1_error").html("Please Select Center Name");
          }else{
              var center_id="true";
              $("#select1_error").html("");
          }
          
        if(fullname=="true" && center_name=="true" && center_id=="true")
          {
             return true;
        }else{
            return false;
        }
        }   
        
        function center_validation()
        {
            if ($("#fullname").val() == ""){
            $("#text_field1_error").html("Please Enter Full Name");
          }else{
              var fullname="true";
              $("#text_field1_error").html("");
          }
          
          
          
          if(fullname=="true" && center_name=="true" && center_id=="true")
          {
             return true;
        }else{
            return false;
        }
    }
        function book_validation()
        {          
          
           if ( $('[name="name"]').val() == ""){
            $("#text_field1_error").html("Please Enter Book Name");
          }else{
              var name="true";
              $("#text_field1_error").html("");
          }
         
//     
          if(isNaN($('[name="price"]').val()) || $('[name="price"]').val() == ""){
            $("#text_field2_error").html("Invalid Price");
          }else
      {
              var price_val="true";
              $("#text_field2_error").html("");   
      }         
          
          
           if ( $('[name="course_id"]').val() == ""){
              
            $("#select1_error").html("Please Select Course Name");
          }else{
              var course_id="true";
              $("#select1_error").html("");
          }
          
          
          
          if(name=="true" && course_id=="true" && price_val=="true")
          {
             return true;
        }else{
            return false;
        }  
        }
        
//        function student_validation()
//        {
//           
//           
//            if ( $('[name="student_fname"]').val() == ""){
//            $("#text_field1_error").html("Please Enter First Name");
//          }else{
//              var fname="true";
//              $("#text_field1_error").html("");
//          }
//          
//           if ( $('[name="student_lname"]').val() == ""){
//            $("#text_field2_error").html("Please Enter Last Name");
//          }else{
//              var lname="true";
//              $("#text_field2_error").html("");
//          }
//          
//           if ( $('[name="student_mobile"]').val() == ""){
//            $("#text_field3_error").html("Please Enter Mobile Number");
//          }else{
//              var mob="true";
//              $("#text_field3_error").html("");
//          }
//          
//           if ( $('[name="student_address"]').val() == ""){
//            $("#text_field4_error").html("Please Enter Address");
//          }else{
//              var addr="true";
//              $("#text_field4_error").html("");
//          }
//          
//          
//          if ( $('[name="student_pincode"]').val() == ""){
//            $("#text_field5_error").html("Please Enter Pincode");
//          }else{
//              var pin="true";
//              $("#text_field5_error").html("");
//          }
//          
//          
//           if ( $('[name="center_id"]').val() == ""){
//              alert();
//            $("#select1_error").html("Please Select Center Name");
//          }else{
//              var center_id="true";
//              $("#select1_error").html("");
//          }
//          
//          
//          
//          
//            if ( $('[name="batch_id"]').val() == ""){
//              
//            $("#select2_error").html("Please Select batch");
//          }else{
//              var batch_id="true";
//              $("#select2_error").html("");
//          }
//          
//          
//            if ( $('[name="course_id"]').val() == ""){
//              
//            $("#select3_error").html("Please Select Course");
//          }else{
//              var course_id="true";
//              $("#select3_error").html("");
//          }
//          
//          
//          if ( $('[name="book"]').val() == ""){
//              
//            $("#select4_error").html("Please Select Book");
//          }else{
//              var book="true";
//              $("#select4_error").html("");
//          }
//          
//          if ( $('[name="student_gender"]').val() == ""){
//              
//            $("#select5_error").html("Please Select Gender");
//          }else{
//              var gen="true";
//              $("#select5_error").html("");
//          }
//          
//          
//          if ( $('[name="student_dob"]').val() == ""){
//              
//            $("#select6_error").html("Please Select Date Of Birth");
//          }else{
//              var dob="true";
//              $("#select6_error").html("");
//          }
//          
//           if ( $('[name="student_state"]').val() == ""){
//              
//            $("#select7_error").html("Please Select State");
//          }else{
//              var state="true";
//              $("#select7_error").html("");
//          }
//          
//          
//           if ( $('[name="student_city"]').val() == ""){
//              
//            $("#select8_error").html("Please Select City");
//          }else{
//              var city="true";
//              $("#select8_error").html("");
//          }
//          
//          
//          
//          
//          
//           if(fname=="true" && lname=="true" && state=="true" && city=="true" && dob=="true" && pin=="true" && addr=="true" && gen=="true" && mob=="true" && course_id=="true" && batch_id=="true" && center_id=="true" && book=="true")
//          {
//             return true;
//        }else{
//            return false;
//        }         
//        }
            
              
          