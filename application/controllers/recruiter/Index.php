<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
                 
	}
       
	
	function index()
	{
	    	
            $this->register();
	}

    function register()
    {
		$this->load->library('form_validation');

    $this->form_validation->set_rules('fname','Name','trim|required');
    $this->form_validation->set_rules('lname','Last_name','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email|callback_check_if_email_exist');
    $this->form_validation->set_rules('mobile','Mobile','trim|required|numeric');
    $this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
    $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');  
   $this->form_validation->set_rules('otp','OTP','trim|required|callback_check_otp_verification');
    $this->form_validation->set_rules('city','City','trim|required');
   // $this->form_validation->set_rules('recruiter_pincode','Pincode','trim|required|numeric');
    $this->form_validation->set_rules('state','State','trim|required');   
                
		// $submit=$this->input->post('submit');
		if ($this->form_validation->run() == false)
        {
			$country='IND';
		$state['country']=$this->Cities_model->getall_country();
        
        $sys=$this->System_model->source_name();        
            $result['system']=$this->System_model->get_system_info($sys);	
                $this->load->view($sys.'/home_header',$result);  
                $this->load->view('recruiter/register',$state); 
                 $this->load->view($sys.'/home_footer',$result);  
                
                    
        }
        else
		{         
            
			list($get_insert,$get_data)=$this->Recruiters_model->register();
			if($get_insert)
			{                   
                            
                                $result=$this->signup_email($get_data);                              
                                $user_email=$this->User_model->getall_email();
                                foreach ($user_email as $mail)
                                {
                                    $this->center_registration_mail_to_admin($mail->user_email,$get_data);
                                }
                            
                                  $this->session->set_flashdata('signup_success','Registration Successfull!');
                                
                                  redirect('recruiter/index/login');
                              
                        }
			else
                            {     
                            
				redirect('recruiter/index');
			}               
                }    
        }
        
       function signup_email($getdata)
    {    
                            
                
                    $headers = "From: info@packagingnaukri.com";
                    $headers .= ". PACKAGING-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $getdata['recruiter_email'];
                    $subject = "Welcome To Packaging Naukri";

                    $txt = '<html>
                        <head>

                                        </head>
                                             <body>Dear '.$getdata['recruiter_fname'].' '.$getdata['recruiter_lname'].',<br><br>Thank You for sign up with Packaging Naukri.<br><br>You can now login with following login details<br><br>
                                            
                                            Name: '.$getdata['recruiter_fname']." "
                                             .$getdata['recruiter_lname'].
                                             "<br>Mobile No: ".$getdata['recruiter_mobile'].
                                             '<br>Center Login URL: <a href="'.base_url().'center/index/login" target="_blank">http://www.packagingnaukri.com/center/index/login</a>
                                             <br>Email Id: '.$getdata['recruiter_email'].
                                              "<br>Password: ".$getdata['recruiter_password'].
                                              '<br><br>Thanks & Regards,<br>Packaging Naukri Team<br><a href="'.base_url().'" target="_blank">http://www.packagingnaukri.com</a><br></body></html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                          return true;
                       }
//                   
    }
    
       function center_registration_mail_to_admin($user_email,$recruiter_data)
    {
//        $city=$this->Centers_model->get_id($id);
       $headers = "From: team@webosys.com";
                    $headers .= ". Webosys-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to =$user_email;
                    $subject = 'New Center Registration at Delto';

                    $txt = '<html><body>
                           <span>Dear Packaging Naukri,</span><br><br> 

                            <span> New Recruiter Successfully registered at Packaging Naukri as per following detail </span><br><br>

                            <span><b>Recruiter Information:</b></span><br>
                             Name: '.$getdata['recruiter_fname']." "
                               .$getdata['recruiter_lname'].
                             "<br>Mobile No: ".$getdata['recruiter_mobile'].                            
                             '<br>Email Id : '.$getdata['recruiter_email'].    
                             '<br>City     : '.$getdata['recruiter_city'].    

                            '<span>Thanks & regards,</span><br>
                            <span>Webosys team.</span><br>
                            <a href="mailto:team@webosys.com" target="_top">team@webosys.com</a>
                             </body></html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
//                           echo "success";
                          return true;
                       }else{
                           return false;
                       }
       
       
    }
        
              
   function login()
    {
       
             echo $recruiter_LoggedIn = $this->session->userdata('recruiter_LoggedIn');
        
        if(isset($recruiter_LoggedIn) || $recruiter_LoggedIn == TRUE)
        {
          
           redirect('recruiter/Dashboard');
        }
        else
        {

        $sys=$this->System_model->source_name();        
            $result['system']=$this->System_model->get_system_info($sys);   
             $this->load->view($sys.'/home_header',$result);  
             $this->load->view('recruiter/login');
             $this->load->view($sys.'/home_footer',$result);  

            
        }
    }
    
    
    
    
    
            function send_otp()
        {          
           $email=$this->input->post('recruiter_email');
            // $val=is_numeric($email);
            
            if(is_numeric($email))
            {
                $res=$this->Recruiters_model->check_mobile_exist($email);
                if($res = false)
                {
                     echo json_encode(array('no_error'=>'This Mobile is not registered'));
                }else{
                    
                     $rand=mt_rand(000000,999999);
                      $where=array('recruiter_mobile'=>$email);
                $data=array('recruiter_otp'=>$rand);
                $this->Recruiters_model->recruiter_update($where,$data);
//     Your authentication key

$authKey = "217899AjUpTycrXx6K5b0e2283";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma

$mobileNumber = $email;
//Sender ID,While using route4 sender id should be 6 characters long.

$senderId = "PKGNAU";
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
//curl_close($ch);
echo json_encode(array('send'=>'OTP has been sent Successfully'));       
//echo $output;
            }


}else{
    
            $res=$this->Recruiters_model->check_if_email_exist($email);
            if($res)
            {
                echo json_encode(array('email_error'=>'This email is not registered'));
            }else{
                
                $send=$this->email_otp($email);
                if($send)
                {
                echo json_encode(array('send'=>'OTP has been sent Successfully'));
                }
            }   
            }
 }
    
  function email_otp($email)
        {
                $rand= mt_rand(000000,999999);
                
                $where=array('recruiter_email'=>$email);
                $data=array('recruiter_otp'=>$rand);
                $this->Recruiters_model->recruiter_update($where,$data);
                              
                
                    $headers = "From: support@Packagingnaukari.in";
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $email;
                    $subject = "Welcome To Packaging Naukari";

                    $txt = $rand;  
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                          return true;
                       }
        }  
    
    
    
    
    function recruiter_encrypt($email,$hash)
    {
        $data=array('recruiter_verification'=>$hash);
        $recruiter_email=array('recruiter_email'=>$email);
        $this->Recruiters_model->recruiter_update($recruiter_email,$data);
    }

    
   public function login_with_otp()
           
   {
       $username=$this->input->post('recruiter_email');
       $otp=$this->input->post('rec_otp');
       $val=is_numeric($username);
       if($val)
       {
           $where=array('recruiter_mobile'=>$username,
                        'recruiter_otp'=>$otp);
                   $result= $this->Recruiters_model->login_with_otp($where);
                    if($result)
                    {
                        $source=$this->source_verification($result);

                            if ($source) {
                                            
                                    $sessionArray = array(                        
                                     'recruiter_id' => $result->recruiter_id,
                                'recruiter_fname' => $result->recruiter_fname,
                                'recruiter_lname' => $result->recruiter_lname,
                                'recruiter_email' => $result->recruiter_email,
                                'recruiter_mobile' => $result->recruiter_mobile,
                                'recruiter_source'   =>$result->recruiter_source,
                                'recruiter_LoggedIn' => true,
                                                );
                                                
                                $this->session->set_userdata($sessionArray);  
                                
                                // echo json_encode(array('status'=>true));  
                                redirect('recruiter/Index/login');
                            }else{

                             $this->session->set_flashdata('log_error','Invalid source login.');
                             redirect('recruiter/Index/login');
                            }
       
                        $sessionArray = array(                        
                         'recruiter_id' => $result->recruiter_id,
                    'recruiter_fname' => $result->recruiter_fname,
                    'recruiter_lname' => $result->recruiter_lname,
                    'recruiter_email' => $result->recruiter_email,
                    'recruiter_mobile' => $result->recruiter_mobile,
                    'recruiter_source'   =>$result->recruiter_source,
                    'user_type'         =>$result->user_type,
                    'recruiter_LoggedIn' => true,
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    // echo json_encode(array('status'=>true));  
                    redirect('recruiter/Index/login');
                    }else{
                         // echo json_encode(array('otp_error'=>"Wrong OTP")); 
                         $this->session->set_flashdata('error','Wrong OTP');
                         redirect('recruiter/Index/login');
                    }
                            
       }else{
           $where=array('recruiter_email'=>$username,
                        'recruiter_otp'=>$otp);
                    $result=$this->Recruiters_model->login_with_otp($where);
                    if($result)
                    {
                        $source=$this->source_verification($result);

                            if ($source) {
                                

                                        $sessionArray = array(                        
                                         'recruiter_id' => $result->recruiter_id,
                                    'recruiter_fname' => $result->recruiter_fname,
                                    'recruiter_lname' => $result->recruiter_lname,
                                    'recruiter_email' => $result->recruiter_email,
                                    'recruiter_mobile' => $result->recruiter_mobile,
                                    'recruiter_source'   =>$result->recruiter_source,
                                    'recruiter_LoggedIn' => true
                                                    );
                                                    
                                    $this->session->set_userdata($sessionArray);  
                                    echo json_encode(array('status'=>true)); 
                            }else
                            {

                             $this->session->set_flashdata('log_error','Invalid source login.');
                             redirect('recruiter/Index/login');

                            } 

                    }else{
                          $this->session->set_flashdata('error','Wrong OTP');
                         redirect('recruiter/Index/login');

                    }
       }
   }
    
    
     public function loginMe()
    {
        
        $this->load->library('form_validation');
        
    
            $recruiter_email = $this->input->post('recruiter_email');
            $recruiter_password = $this->input->post('recruiter_password');
            
            if(!empty($this->input->post('rec_otp')))
            {
              $this->login_with_otp();  
            }else
            {
            $where=array('recruiter_email'=>$recruiter_email,
                         'recruiter_password'=>$recruiter_password);
            
      list($result,$valid_email)=$this->Recruiters_model->loginMe($where);
            
       if($valid_email>0)
       {
           
         
                
            if(!empty($result) && $result->recruiter_status==1)
            {          
                $source=$this->source_verification($result);
                if ($source) {
                    
                
                    $sessionArray = array(                        
                         'recruiter_id' => $result->recruiter_id,
                    'recruiter_fname' => $result->recruiter_fname,
                    'recruiter_lname' => $result->recruiter_lname,
                    'recruiter_email' => $result->recruiter_email,
                    'recruiter_mobile' => $result->recruiter_mobile,
                    'recruiter_source'   =>$result->recruiter_source,
                    'recruiter_LoggedIn' => true
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    // echo json_encode(array('status'=>'success'));       
                    redirect('recruiter/Index/Login');       
                }else
                {

                 $this->session->set_flashdata('log_error','Invalid source login.');
                 redirect('recruiter/Index/login');

                } 
              }
           
            else
            {   
                             
                if($result > 0 && $result->recruiter_status==0)
                {
                   
                 // echo json_encode(array('log_error', 'Account is not activeted yet.'));     
                 $this->session->set_flashdata('log_error','Account is not activeted yet.');
                 redirect('recruiter/Index/login');

                
                }
                else
                {
                 // echo json_encode(array('log_error'=>'Email or password mismatch'));
                 $this->session->set_flashdata('log_error','Email or password mismatch');
                 // $this->load->view('home_header');
                 // $this->load->view('recruiter/login');
                 // $this->load->view('home_footer');
                 redirect('recruiter/Index/login');
                }          
              
            } 
            }
            else
            {
                 // echo json_encode(array('log_error'=>'This email id is not registered with us.'));
                 $this->session->set_flashdata('log_error','This email id is not registered with us.');         
                 
                 redirect('recruiter/Index/login');

            }
        
        
    }
    }
    
    
    public function forgotPassword()
    {
        $this->load->view('recruiter/forgotPassword');
    }
    
    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('recruiter_email','Email','trim|required|valid_email');
                
        if($this->form_validation->run() == FALSE)
        {
            //$this->forgotPassword();
             $this->session->set_flashdata('error', 'Invalid Email ID');
//            redirect('recruiter/index/forgotPassword');
       
            echo json_encode(array('status'=>false));
        }
        else 
        {
             
            $recruiter_email= $this->input->post('recruiter_email');
            list($get_result,$get_data)=$this->Recruiters_model->checkEmailExist($recruiter_email);
         
            if($get_result>0)
            {  
                $msg=array(
                    'title'=>"Delto Center Verification",
                    'data'=>'Your Center Verification OTP is: ',
                    'email'=>$get_data['recruiter_email']
                );
//               
               $this->otp_email($get_data,$msg);
//                 
//                  $this->load->helper('string');
                 $data=array(
                              'id'=>$get_data['recruiter_id'],

                              'email'=> $get_data['recruiter_email'],
                              'activation_id' =>$get_data['otp'],
                              'createdDtm' => date('Y-m-d H:i:s'),
//                               'agent' =>$this->agent->browser(),
//                              'client_ip' => $this->input->ip_address()
                     );

                $save = $this->Recruiters_model->resetPasswordUser($data); 
                
           
                echo json_encode(array('status'=>true));
                
                
              
            }
            else
            {
                 $this->session->set_flashdata('error', 'This Email ID is not registered with us.');
                echo json_encode(array('status'=>false));

            }
             
        
        } 
    }
    function reset_password()
    {
        $this->form_validation->set_rules('recruiter_password','Password','trim|required|min_length[8]');
        $this->form_validation->set_rules('recruiter_cpassword','Confirm Password','trim|required|matches[recruiter_password]');
        if ($this->form_validation->run() == false)
        {                  $status = 'invalid';
			 setFlashData($status, "Password and Confirm Password Does not match.");
			 redirect('recruiter/index/forgotPassword');
                 
                    
        } 
        else
        {
        
       
        $form_otp=$this->input->post('otp');
        $recruiter_email=$this->input->post('email');
         list($get_otp,$recruiter_data)=$this->Recruiters_model->otp_verify($recruiter_email);
        $password=$this->input->post('recruiter_password');
        
        if($form_otp==$get_otp['otp'])
        {
//            echo"success";
            $data=array(
                        'recruiter_email'=>$recruiter_email,
                        'password'=>$password
                       
            );
             $result=$this->Recruiters_model->reset_password($data);
             if($result)
             {
                 $msg=array(
                     'title'=>'Delto recruiter Updation...!',
                     'data'=>'Your delto recruiter password has been changed successfully.',
                     'password'=>$password,
                     'email'=>$recruiter_email,
                     'recruiter_name'=>$recruiter_data['recruiter_name']
                     
                 );
               
                 
                $this->password_email($recruiter_data,$msg);
                 
                redirect('recruiter/index/login');
             }
        }
        else
        {

            $this->session->set_flashdata('error', 'OTP does not match');
            redirect('recruiter/index/forgotPassword');
        }
        }
        
        
    }
    
    
       
     public function signout()
    {
    
        
//        $this->session->sess_destroy();
          $this->session->unset_userdata('recruiter_LoggedIn'); 
        redirect('recruiter/index/login');  
    }
    
        
    
        
        
  function check_if_email_exist($requested_email)
	{
		$this->load->model('Recruiters_model');
		$email_available=$this->Recruiters_model->check_if_email_exist($requested_email);

		if($email_available){
                    $this->form_validation->set_message('check_if_email_exist', 'You must select a business');
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

    function check_otp_verification($requested_otp)
  {
    $ses_mobile=$this->session->userdata('mobile');
    $ses_otp=$this->session->userdata('otp');
    // print_r($ses_mobile);
    // echo $ses_otp;
    $mob=$this->input->post('mobile');
    if ($ses_mobile == $mob && $ses_otp == $requested_otp) {
      return TRUE;
    }else{
      return FALSE;
    }

  }

  public function ajax_edit($id)
  {

            $data = $this->Recruiters_model->get_id($id);
         
            echo json_encode($data);
  }

  public function update_profile()
        {
             $recruiter_LoggedIn = $this->session->userdata('recruiter_LoggedIn');
             
        
        if(isset($recruiter_LoggedIn) || $recruiter_LoggedIn == TRUE)
        {
                $id=$this->session->userdata('recruiter_id');
                      
                      
             
                     
                      $data= array(
                'recruiter_id'=>$this->input->post('recruiter_id'),
                'recruiter_fname' => strtoupper($this->input->post('recruiter_fname')),
                'recruiter_lname' => strtoupper($this->input->post('recruiter_lname')),
                'recruiter_email' => $this->input->post('recruiter_email'),
                'recruiter_mobile' => $this->input->post('recruiter_mobile'),
                'recruiter_address' => $this->input->post('recruiter_address'),                
                
                
                );

                $res=$this->pic_upload($data);
                
                     
                  $this->Recruiters_model->recruiter_update(array('recruiter_id' => $this->input->post('recruiter_id')), $data);
                   echo json_encode(array("status" => TRUE));
              
                     
                      
            

        }
        else
        {
            $this->load->view('student/login');
            

        }                     
        }
        
         function pic_upload($data)
    {  
       $id=$data['recruiter_id'];
       
                                   $new_file=$data['recruiter_fname'].mt_rand(100,999);
       
         $config = array(
                                  'upload_path' => './profile_pic',
                                  'allowed_types' => 'gif|jpg|png|jpeg',
                                  'max_size' => '7200',
                                  'max_width' => '1920',
                                  'max_height' => '1200',
                                  'overwrite' => false,
                                  'remove_spaces' =>true,
                                  'file_name' =>$new_file 
                              );           
                      
                    
                                  
                       $this->load->library('upload', $config);
                       $this->upload->initialize($config);
                       
                       if (!$this->upload->do_upload('img')) # form input field attribute
                       {
                           if(empty($this->input->post('img')))
                           {
                                $msg="Image size should less than 7MB,Dimension 1920*1200";
                           return $msg; 
                            
                           }
                           else
                           {
                                   return true;                    
                           }
                         
                       }
                       else
                       {
                        
                            $res=$this->Recruiters_model->get_id($this->input->post('recruiter_id'));
                            if(file_exists($res->recruiter_profile_pic))
                            {
                            unlink($res->recruiter_profile_pic);
                            }
                                               
                           
                            $ext= explode(".",$this->upload->data('file_name'));  
                            $img_name =$new_file.".".end($ext); //video name as path in db
                             $img_path='profile_pic/'.str_replace(' ','_',$img_name);
                          $pic = array(
                              'recruiter_profile_pic' => $img_path,
                            );
            
                                  
                                    
                   $insert =  $this->Recruiters_model->recruiter_update(array('recruiter_id' =>$id), $pic);
                          
                         return true; 
                                               
                       }

        

            
    }
        function recruiter_verification($email,$hash)
        {
           $verify=$this->Recruiters_model->email_verification($email,$hash);
           if($verify)
           {
               $this->session->set_flashdata('email_verify','Account Verification Successfull,Please Login...!');
               redirect('recruiter/index/login');
           }
           else
           {
                $this->session->set_flashdata('email_verify','Error...Please Resend link while login...!');
               redirect('recruiter/index/login');
           }
      
                             
        }
        public function source_verification($data)
        {
            $source=ucfirst($this->System_model->source_name());
          $sys=$this->System_model->get_system_info($source);
           
          if ($sys->source_status) 
            {              
                return True;               
            }
            else{

                    if ($source == $data->recruiter_source) {

                        return true;
                       
                   }else{
                    return false;
                   }
            }
        }
        
        function show_cities($state)
        {
            $st=str_replace('%20',' ',$state);
            $cities=$this->Cities_model->getall_cities(ltrim($st));
            echo json_encode($cities);
        }
        
        
        
        
        public function delete_photo()
        {
            $this->load->helper("file");
         
         if($s)
         {
             echo "success";
         }
         else
         {
             echo"false";
         }
        }	
    
}


  
    
    

