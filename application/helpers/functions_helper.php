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
function is_user_LoggedIn( $user_LoggedIn)
{ 
             
        if(isset($user_LoggedIn) || $user_LoggedIn == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

function is_recruiter_LoggedIn()
{
     if(isset($recruiter_LoggedIn) || $recruiter_LoggedIn == TRUE)
        {
           return true;
        }else{
             return false;            
        }
}

?>

