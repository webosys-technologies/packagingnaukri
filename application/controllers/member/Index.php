
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
                $this->load->model('Members_model');
             //  $this->load->model('Cities_model');

                
	}
	
	function index()
	{
            $country='IND';
           $data['country']=$this->Cities_model->getall_country();
        $sys=$this->System_model->source_name();        
            $result['system']=$this->System_model->get_system_info($sys);
          
          $this->load->view($sys.'/home_header',$result);
          $this->load->view('member/sin',$data);
          $this->load->view($sys.'/home_footer',$result);
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
                
    //validate form input
    if ($this->form_validation->run() == false)
        {
         //  echo  "validate error";
      
   $state['country']=$this->Cities_model->getall_country(); 
   
        $sys=$this->System_model->source_name();        
            $result['system']=$this->System_model->get_system_info($sys);

                $this->load->view($sys.'/home_header',$result);             
                $this->load->view('member/sin',$state);                     
                $this->load->view($sys.'/home_footer',$result);
                    
        }
        else
    {                  

      list($get_insert,$get_data)=$this->Members_model->register();
      if($get_insert)
      {              
                    if (isset($_FILES['resume']['name'])) {
                    if (0 < $_FILES['resume']['error']) {
                        echo 'Error during file upload' . $_FILES['resume']['error'];
                    } else {

//                        $rand=  mt_rand(1111,9999);
                        $name = $_FILES["resume"]["name"];
                        $ext = end((explode(".", $name)));
                        $filename='resume_'.date('Y-m-d_H.i.s').".".$ext;
                        move_uploaded_file($_FILES['resume']['tmp_name'],'resume/'.$filename);


                                $where=array('member_id'=>$get_insert);
                               $resume=array('member_resume'=>'resume/'.$filename);
                               $this->Members_model->member_update($where,$resume);                     

                    }
                       }
                       
                  $emp=array('employment_designation'=>$this->input->post('designation'),
                            'employment_notice_period'=>$this->input->post('notice'),
                            'employment_current'=>$this->input->post('location'),
                            'employment_status'=>'1',
                            'member_id'=>$get_insert
                            );
                 $this->Employments_model->insert_employment($emp);     
                       
          
                                    $data=array('email'=>$this->input->post('email'),
                                                'mobile'=>$this->input->post('mobile'),
                                                'password'=>$this->input->post('password'),
                                                'fname'=>$this->input->post('fname'),
                                                'lname'=>$this->input->post('lname'));
                                    $this->login_detail_msg($data);
                                    
//                               $user_email=$this->User_model->getall_email();                              
//                                foreach ($user_email as $mail)
//                                {
//                                    $this->member_registration_mail_to_admin($mail->user_email,$data);
//                                }
                               
                                  $this->session->set_flashdata('signup_success','Registration Successfull, Please login!');
                                  redirect('member/index');
                                

      }
      else
                            {
                           


   $state['states']=$this->Cities_model->getall_state(); 

        $sys=$this->System_model->source_name();        
            $result['system']=$this->System_model->get_system_info($sys);

                $this->load->view($sys.'/home_header',$result);             
                $this->load->view('member/sin',$state);                     
                $this->load->view($sys.'/home_footer',$result);

        
      }  
                
             }    
        }
        
          function member_registration_mail_to_admin($user_email,$member_data)
    {
//        $city=$this->Centers_model->get_id($id);
       $headers = "From: team@webosys.com";
                    $headers .= ". Webosys-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to =$user_email;
                    $subject = 'New Member Registration at Packaging Naukri';

                    $txt = '<html><body>
                           <span>Dear Packaging Naukri,</span><br><br> 

                            <span> New Member Successfully registered at Packaging Naukri as per following detail </span><br><br>

                            <span><b>Member Information:</b></span><br>
                             Name: '.$member_data['fname']." "
                               .$member_data['lname'].
                             "<br>Mobile No: ".$member_data['mobile'].                            
                             '<br>Email Id : '.$member_data['email'].    
                            '<br><span>Thanks & regards,</span><br>
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
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
             redirect('member/Dashboard');
        }
        else
        {   

            redirect('Home');
        }
   }
    
    public function ask_center_password()
    {
        $this->load->view('member/ask_center_password');
    }
    
    public function login_with_otp()
    {
            $member_email = $this->input->post('member_email');
            $member_otp = $this->input->post('member_otp');
            $where=array('member_email'=>$member_email,
                         'member_otp'=>$member_otp);
            
          $val=is_numeric($member_email);
          if($val)
          {
                       $member_email = $this->input->post('member_email');
                       $member_otp = $this->input->post('member_otp');
                       $where=array('member_mobile'=>$member_email,
                         'member_otp'=>$member_otp); 
//                       $res=$this->Members_model->login_with_otp($where);     
                        $res=$this->Members_model->member_info_by_mobile($member_email);
            if($this->session->userdata("member_username")==$member_email && $this->input->post('member_otp')==$this->session->userdata('member_otp'))
            {    
                $source=$this->source_verification($res);
                    if($source)
                    {          
                            
                            if(!empty($job_id))
                            {
                            $rec_data=$this->Jobs_model->job_by_id($job_id);
                         $data=array('job_id'=>$job_id,
                                'member_id'=>$res->member_id,
                                'recruiter_id'=>$rec_data->recruiter_id,
                                'company_id'=>$rec_data->company_id,
                                'apply_at'=>date('Y-m-d'),
                                'apply_status'=>'1');
                             $this->Applied_jobs_model->apply_job($data);
                             $this->session->set_flashdata('success','Job Applied Successfully');
                            }
                                $sessionArray = array(                        
                                'member_id' => $res->member_id,
                                'member_fname' => $res->member_fname,
                                'member_lname' => $res->member_lname,
                                'member_email' => $res->member_email,
                                 'member_mobile' => $res->member_mobile,
                                'member_LoggedIn' => true,
                                'member_source'    =>$res->member_source,
                                                );
                                  $this->session->unset_userdata('member_otp');
                                $this->session->set_userdata($sessionArray);                      
                                echo json_encode(array('status'=> 'success')); 
                    }else
                    {
                        
                    echo json_encode(array('account_error'=> 'Invalid Source Login.'));

                    }              
              }           
            else
            {                   
                 echo json_encode(array('otp_error'=> 'Wrong OTP'));
            } 
              
              
          }
          else{
               $res=$this->Members_model->member_info_by_email($member_email);
         

            if($this->session->userdata("member_username")==$member_email && $this->input->post('member_otp')==$this->session->userdata('member_otp'))
            {       
                    $source=$this->source_verification($res);
                    if($source)
                    {    
                        if(!empty($job_id))
                        {
                        $rec_data=$this->Jobs_model->job_by_id($job_id);
                     $data=array('job_id'=>$job_id,
                            'member_id'=>$res->member_id,
                            'recruiter_id'=>$rec_data->recruiter_id,
                            'company_id'=>$rec_data->company_id,
                            'apply_at'=>date('Y-m-d'),
                            'apply_status'=>'1');
                         $this->Applied_jobs_model->apply_job($data);
                         $this->session->set_flashdata('success','Job Applied Successfully');
                        }
                        
                            $sessionArray = array(                        
                            'member_id' => $res->member_id,
                            'member_fname' => $res->member_fname,
                            'member_lname' => $res->member_lname,
                            'member_email' => $res->member_email,
                             'member_mobile' => $res->member_mobile,
                            'member_LoggedIn' => true,
                            'member_source'  =>$res->member_source,
                                            );
                            $this->session->unset_userdata('member_otp');                       
                            $this->session->set_userdata($sessionArray);                      
                            echo json_encode(array('status'=> 'success'));
                    }else{

                 echo json_encode(array('account_error'=> 'Invalid Source Login.'));

                }               
              }           
            else
            {                   
                 echo json_encode(array('otp_error'=> 'Wrong OTP'));
            } 
          }
            }
          
   
          
    
    public function loginMe()
    {
        
             if(!empty($this->input->post('member_otp')))
             {
                 $this->login_with_otp();
             }else{
            $member_email = $this->input->post('member_email');
            $member_password = $this->input->post('member_password');
            $job_id=$this->input->post('job_id');
            
            $where=array('member_email'=>$member_email,
                         'member_password'=>$member_password);
            
      list($result,$valid_email)=$this->Members_model->loginMe($where);
              
       if($valid_email>0)
       {       

            if(!empty($result) && $result->member_status==1)
            {      
                $source=$this->source_verification($result);   
                if($source)
                {
//                        if(!empty($job_id))
//                        {
//                        $rec_data=$this->Jobs_model->job_by_id($job_id);
//                     $data=array('job_id'=>$job_id,
//                            'member_id'=>$result->member_id,
//                            'recruiter_id'=>$rec_data->recruiter_id,
//                            'company_id'=>$rec_data->company_id,
//                            'apply_at'=>date('Y-m-d'),
//                            'apply_status'=>'1');
//                         $this->Applied_jobs_model->apply_job($data);
//                         $this->session->set_flashdata('success','Job Applied Successfully');
//                        }                       
                        
                            $sessionArray = array(                        
                                 'member_id' => $result->member_id,
                            'member_fname' => $result->member_fname,
                            'member_lname' => $result->member_lname,
                            'member_email' => $result->member_email,
                             'member_mobile' => $result->member_mobile,
                            'member_LoggedIn' => true,
                            'member_source'  =>$result->member_source,
                                            );
                                            
                            $this->session->set_userdata($sessionArray);  
                            
                            echo json_encode(array('status'=> 'success'));
                           
                            if(!empty($job_id))
                        {
                if(empty($this->Applied_jobs_model->check_apply(array('member_id'=>$result->member_id,
                                                                'job_id'=>$job_id,))))
                {
                $rec_data=$this->Jobs_model->job_by_id($job_id);
             $data=array('job_id'=>$job_id,
                    'member_id'=>$result->member_id,
                    'recruiter_id'=>$rec_data->recruiter_id,
                    'company_id'=>$rec_data->company_id,
                    'apply_at'=>date('Y-m-d'),
                    'apply_status'=>'1');
                 $this->Applied_jobs_model->apply_job($data);
                 $this->session->set_flashdata('success','Job Applied Successfully');
                }

                }                           
                        
                
                
                
                    $sessionArray = array(                        
                         'member_id' => $result->member_id,
                    'member_fname' => $result->member_fname,
                    'member_lname' => $result->member_lname,
                    'member_email' => $result->member_email,
                     'member_mobile' => $result->member_mobile,
                    'member_LoggedIn' => true,
                    'member_source'  =>$result->member_source,
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                }else{

                 echo json_encode(array('account_error'=> 'Invalid Source Login.'));

                }
               
              }
           
            else
            {   
                             
                if($result > 0 && $result->member_status==0)
                {
                   
                 echo json_encode(array('account_error'=> 'Account is not activeted yet.'));

                }
                else
                {
                     echo json_encode(array('val_error'=> 'Email or Password Mismatch.'));
                }                
                 
            } 
            }
            else
            {
                                    echo json_encode(array('email_error'=> 'This Username is not registered with us'));

                
            }
                          
        }
    } 
        
        function send_otp()
        {          
            $email=$this->input->post('member_email');
            $val=is_numeric($email);

            if($val)
            {
                $res=$this->Members_model->check_mobile_exist($email);
                if($res)
                {
                     echo json_encode(array('email_error'=>'This Mobile is not registered'));
                }else{
                    
                     $rand=mt_rand(000000,999999);
                      $where=array('member_mobile'=>$email);
                $data=array('member_otp'=>$rand);
                $this->session->set_userdata(array('member_otp'=>$rand));
                $this->session->set_userdata(array('member_username'=>$this->input->post('member_email')));
                $this->Members_model->member_update($where,$data);
     //Your authentication key

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
curl_close($ch);
echo json_encode(array('send'=>'OTP has been sent Successfully'));       
//echo $output;
            }


}else{
            $res=$this->Members_model->check_if_email_exist($email);
            if($res)
            {
                echo json_encode(array('email_error'=>'This Username is not registered'));
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
                
                $this->session->set_userdata(array('member_otp'=>$rand));
                $this->session->set_userdata(array('member_username'=>$email));
                
                
                $where=array('member_email'=>$email);
                $data=array('member_otp'=>$rand);
                $this->Members_model->member_update($where,$data);
                $this->session->set_userdata(array('member_otp'=>$rand));
                              
                
                    $headers = "From: support@Packagingnaukari.in";
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $email;
                    $subject = "Welcome To Packaging Naukari";

                    $txt = $rand.' is your OTP for verifying Email Id on packagingnaukri.com.';  
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                          return true;
                       }
        }
    
   
     public function signout()
    {
        
        $this->session->sess_destroy();
//   /*     redirect('controller_class/login');
//        $this->session->unset_userdata('member_LoggedIn'); 
           redirect('Home');  
    }
    
    public function check_center_password()
    {
        $stud_id=$this->input->post('member_id');
        $pass=$this->input->post('center_password');
        $res=$this->Students_model->get_center_id($stud_id);
        
        $data=array('center_id'=>$res->center_id,
                    'center_password'=>$pass);
        
        $result=$this->Students_model->check_center_password($data);
       
        if($result)
        {
            $getdata = $this->Students_model->get_by_id($stud_id);
            foreach($getdata as $res)  
          {   
            $status=array('member_status'=>$res->member_status,
                          'member_profile_pic'=>$res->member_profile_pic,
                          'center_id'=>$res->center_id,
                          'member_id'=>$res->member_id,
                           'member_course_end_date'=>$res->member_course_end_date,
                            'member_course_start_date'=>$res->member_course_start_date,
                            'course_duration'=>$res->course_duration,
                          );
            
           }
            
            
          if($status['member_course_start_date']=='0000-00-00'){
                    $dur=$status['course_duration'];
                    $date=date('Y-m-d');
                    $data=array('member_course_start_date'=>$date,
                   'member_course_end_date' =>date('Y-m-d', strtotime("+".$dur."months", strtotime($date))));
                    $this->Students_model->member_update(array('member_id'=>$status['member_id']),$data);
                    }
                $stud_data=$this->Students_model->get_member_by_id($stud_id);
                    if($stud_data->member_course_end_date < date('Y-m-d'))
                    {
                        $update_status=array('member_status'=>'2' );
                        $this->Students_model->member_update(array('member_id'=>$status['member_id']),$update_status);
                        $this->session->set_flashdata('success','course Completed...!');
      
         redirect('member/index/login');
                    }
               
                foreach ($getdata as $res)
                {
                    $sessionArray = array(
                        
                     'member_id' => $res->member_id,
                    'member_fname' => $res->member_fname,
                    'member_lname' => $res->member_lname,
                    'member_email' => $res->member_email,
                    'member_course_id' => $res->course_id,
                    'center_id'=>$res->center_id,
                    'member_LoggedIn' => true,
                    'member_source'  =>$res->member_source,
                                    );                                  
                   
                  
               }  
                $this->session->set_userdata($sessionArray);                      
                    redirect('member/Dashboard');
               
        }
        else
        {
            $this->session->set_flashdata('error','Center Administrative password does not match');
            $stud_data['member_id']=$stud_id;
            $this->load->view('member/ask_center_password',$stud_data);
        }
    }
        
    
        
        
        function check_if_email_exist($requested_email)
	{
		$email_available=$this->Members_model->check_if_email_exist($requested_email);

		if($email_available){
//                    $this->form_validation->set_message('check_if_email_exist', 'You must select a business');
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
        
        function check_member_email($requested_email)
	{
		$this->load->model('Students_model');
		$email_available=$this->Students_model->check_if_email_exist($requested_email);

		if($email_available){
                    return FALSE;
                    
		}
		else{
//			$this->form_validation->set_message('check_if_email_exist', 'You must enter a email');
			return TRUE;
		}
	}
        
         
        
        public function update_profile()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
        	$id=$this->session->userdata('member_id');
                
                
                $this->form_validation->set_rules('member_mobile','Mobile','trim|required|numeric');
		$this->form_validation->set_rules('member_address','Address','trim|required');
		$this->form_validation->set_rules('member_city','City','trim|required');
		$this->form_validation->set_rules('member_pincode','Pincode','trim|required|numeric');
		$this->form_validation->set_rules('member_state','State','trim|required');   
                
		//validate form input
		if ($this->form_validation->run() == false)
        {		
			
                   redirect('member/Dashboard');                    
        }
        else
        {      
               
               $result=$this->Students_model->update_member_profile($id);
               if($result)
               {
                   redirect('member/Profile');
               }
               else
               {
                   
               }
        
               
                
        }
        }
        else
        {
            $this->load->view('member/login');         

        }
            
                      
        }
        
        
        
        
        public function change_password()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
        {
            $data=$this->Members_model->get_id($this->session->userdata('member_id'));
         
//          if($data->member_password==$this->input->post('opassword'))
//          {
                $this->Members_model->member_update(array('member_id'=>$this->session->userdata('member_id')),
                                                    array('member_password'=>$this->input->post('password'))
                                                    );
        
                $this->session->set_flashdata('success','password updated successfully');
                echo json_encode(array('success'=>"password updated successfully"));
//          }else{
//                echo json_encode(array('opassword_err'=>"Old Password Does Not Match"));
//          }
        }
        else
        {
            $this->load->view('member/login');
            

        }
            
                      
        }
        
        
         public function reset_password()
        {
             $member_LoggedIn = $this->session->userdata('member_LoggedIn');
        
        if(isset($member_LoggedIn) || $member_LoggedIn == TRUE)
            
        {    
                $id=$this->session->userdata('member_id');
            
                $this->form_validation->set_rules('member_old_password','old_Password','trim|required|min_length[8]');
        	$this->form_validation->set_rules('member_new_password','new_Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('member_confirm_password','Confirm Password','trim|required|matches[member_new_password]');
          
                if($this->form_validation->run() == FALSE)
        {
                    
            $this->session->set_flashdata('error', 'New password and confirm password does not match ....!');
            redirect('member/Dashboard');
        }
        else
        {   
            $old_password=$this->input->post('member_old_password');
            $new_password=$this->input->post('member_new_password');
            $result['data']=$this->Students_model->get_by_id($id);
            
            if($result['data'])
            {
                 
                foreach($result['data'] as $res)
                {
                    $member_password=$res->member_password;
                }
            
            
            if($member_password==$old_password)
            {
                
                $data=array(
                    'member_id'=>$id,
                    'member_password'=>$new_password
                );
               $this->Students_model->reset_password($data);
            
              $this->session->set_flashdata('success', 'Password Changed Successfully....!');
                 redirect('member/Dashboard');
               
               
               
              
             }
             else
             {
               
//                 $message="Old Password does not match....!";
                 $this->session->set_flashdata('error', 'Old Password is incorrect....!');
                 redirect('member/Dashboard');
             }
        }
        
           
        }
        
        }
        
        else
        {
           
             redirect('member/Dashboard');          

        }
            
                      
        }

        public function source_verification($data)
        {
            $source=ucfirst($this->System_model->source_name());
          $sys=$this->System_model->get_system_info($source);
           
//          if ($sys->source_status) 
//            {              
//                return True;               
//            }
//            else{
       
          
                    if ($source == $data->member_source) {

                        return true;
                       
                   }else{
                    return false;
                   }
//            }
        }

        public function show_cities($state)
        {
          //echo $state;

          $city =$this->Cities_model->getall_cities(ltrim(str_replace("%20",' ', $state)));

          echo json_encode($city);
        }


        public function test()
        {
          $res=$this->Members_model->test();

          if ($res) {
          echo "success";
          }
        }
        
        
        function login_detail_msg($data)
        {           
          
         
                    
                      
                   

$authKey = "217899AjUpTycrXx6K5b0e2283";    

//Multiple mobiles numbers separated by comma

$mobileNumber = $data['mobile'];
//Sender ID,While using route4 sender id should be 6 characters long.

$senderId = "PKGNAU";
//Your message to send, Add URL encoding here.

$message = "Welcome To\r\nPACKAGINGNAUKRI.COM\r\nYou can login next time with your registered EMAIL or MOBILE number\r\n\r\nEmail: ".$data["email"]."\r\nPassword: ".$data["password"];


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
//    echo json_encode(array('error'=> curl_error($ch)));
}
curl_close($ch);
//echo json_encode(array('send'=>'OTP is sent Successfully'));       
//echo $output;
            }

 
            
            
         
}

