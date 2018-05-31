<?php

function is_member_LoggedIn($member_Logged_in)
{
     if(isset($member_Logged_in) || $member_Logged_in == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

function is_admin_LoggedIn( $admin_LoggedIn)
{ 
             
        if(isset($admin_LoggedIn) || $admin_LoggedIn == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

function is_user_LoggedIn( $user_LoggedIn)
{ 
             
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

function is_recruiter_LoggedIn($recruiter_LoggedIn)
{
     if(isset($recruiter_LoggedIn) || $recruiter_LoggedIn == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

function get_user_info($id)
{
   $ci =& get_instance();
   return $ci->User_model->get_user_by_id($id); 
}

function get_member_info($id)
{
     $ci =& get_instance();
   return $ci->Members_model->get_member_by_id($id); 
}
function get_recruiter_info()
{
    
}

?>

