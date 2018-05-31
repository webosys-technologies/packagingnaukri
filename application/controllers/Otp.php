

<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Otp extends CI_Controller
{
	
	function __construct()
	{
		parent :: __construct();	
	}

	 function send_otp()
        {          
            $email=$this->input->post('member_email');
            $val=is_numeric($email);
            
            if($val)
            {
                $res=$this->Members_model->check_mobile_exist($email);
                if($res == False)
                {

                     echo json_encode(array('mobile_error'=>'This Mobile is already registered'));
                }else{	
                    
                     $rand=mt_rand(100000,999999);
                //       $where=array('member_mobile'=>$email);
                // $data=array('member_otp'=>$rand);
                $otp_mobile=array('mobile'=>$email,
            					  'otp'=>$rand);
                $this->session->set_userdata($otp_mobile);
                // print_r($otp_mobile);
                // die();
                // $this->Members_model->member_update($where,$data);
     //Your authentication key

$authKey = "215028AJLvfixOH5af6761a";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma
mobileNumber = $email;
//Sender ID,While using route4 sender id should be 6 characters long.

senderId = "pkgnau";
//Your message to send, Add URL encoding here.

$message =$rand.' is your OTP for verifying mobile number on packagingnaukri.com.';


//Define route 

$route = "4";
//Prepare you post parameters

$postData = array(

    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,

    'sender' => $senderId,
    'route' => $route
);


//API URL

$url="http://api.msg91.com/api/sendhttp.php";


// init the resource

$ch = curl_init();
curl_setopt_array($ch, array(

    CURLOPT_URL => $url,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => $postData

    //,CURLOPT_FOLLOWLOCATION => true

));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response

$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
   // echo json_encode(array('error'=> curl_error($ch)));
}
curl_close($ch);
echo json_encode(array('send'=>'OTP is sent Successfully'));       
//echo $output;
            }


}else{
            $res=$this->Members_model->check_if_email_exist($email);
            if($res)
            {
                echo json_encode(array('email_error'=>'This email is not registered'));
            }else{
                
                $send=$this->email_otp($email);
                if($send)
                {
                echo json_encode(array('send'=>'OTP is Send Successfully '));
                }
            }   
            }
 }

     function send_otp_recruiter()
        {          
            $email=$this->input->post('member_email');
            $val=is_numeric($email);
            
            if($val)
            {
                $res=$this->Recruiters_model->check_mobile_exist($email);

                if($res == False)
               {

                     echo json_encode(array('mobile_error'=>'This Mobile is already registered'));
                }else{  
                    
                     $rand=mt_rand(100000,999999);
                //       $where=array('member_mobile'=>$email);
                // $data=array('member_otp'=>$rand);
                $otp_mobile=array('mobile'=>$email,
                                  'otp'=>$rand);
                $this->session->set_userdata($otp_mobile);
                // print_r($otp_mobile);
                // die();
               // $this->Members_model->member_update($where,$data);
     //Your authentication key

$authKey = "215028AJLvfixOH5af6761a";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma

$mobileNumber = $email;
//Sender ID,While using route4 sender id should be 6 characters long.

$senderId = "pkgnau";
//Your message to send, Add URL encoding here.

$message =$rand.' is your OTP for verifying mobile number on packagingnaukri.com.';


//Define route 

$route = "4";
//Prepare you post parameters

$postData = array(

    'authkey' => $authKey,

    'mobiles' => $mobileNumber,

    'message' => $message,

    'sender' => $senderId,

    'route' => $route

);


//API URL

$url="http://api.msg91.com/api/sendhttp.php";


// init the resource

$ch = curl_init();
curl_setopt_array($ch, array(

    CURLOPT_URL => $url,

    CURLOPT_RETURNTRANSFER => true,

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => $postData

    //,CURLOPT_FOLLOWLOCATION => true

));
//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//get response

$output = curl_exec($ch);
//Print error if any
if(curl_errno($ch))
{
   echo json_encode(array('error'=> curl_error($ch)));
}
curl_close($ch);
echo json_encode(array('send'=>'OTP is sent Successfully'));       
//echo $output;
            }


}else{
            $res=$this->Members_model->check_if_email_exist($email);
            if($res)
            {
                echo json_encode(array('email_error'=>'This email is not registered'));
           }else{
                
                $send=$this->email_otp($email);
                if($send)
                {
                echo json_encode(array('send'=>'OTP is Send Successfully '));
                }
            }   
            }
 }

}



?>