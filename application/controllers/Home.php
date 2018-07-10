    <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();                
	}
       
	
	function index()
	{
	    
        $view='home';
        $this->load_views($view);
            
	}
        
        function services()
        {
            $view='services';
            $this->load_views($view);
        }
        function about_us()
        {
            $view='about_us';
            $this->load_views($view);
        }
        function contact_us()
        {
            $view='contact_us';
            $this->load_views($view);
        }
        function post_resume()
        {
            $view='post_resume';
            $this->load_views($view);
        }
        function post_requirement()
        {
            $view='post_requirement';
            $this->load_views($view);
        }
        function recruitment()
        {
            $view='recruitment';
            $this->load_views($view);
        }
        function resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->load_views($view);
        }
        
        function job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->load_views($view);
        }

         function show_cities($state)
        {           
          //  $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

        function show_states($country)
        {           
            // $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_states(ltrim($country));
          
            echo json_encode($cities);
        }
        
        function apply($job_id)
        {
            $GLOBALS['job_id'] = $job_id;
            $view='apply';
            $this->load_views($view);
        }

        function load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys=$this->System_model->source_name();
            $result['system']=$this->System_model->get_system_info($sys);
     echo $sys;
     die;
            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        
        function send_msg()
        {
            $form=$this->input->post();         

            $contact_mobile=$this->session->userdata('contact_mobile');
            $contact_otp=$this->session->userdata('contact_otp');
            if ($contact_mobile == $form['mobile'] && $contact_otp  == $form['otp']) {
            
            
                
                    $headers = "From: ".$form['email'];
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'Cc: suraj9195shinde@gmail.com' . "\r\n";
                    $to = 'amrut@acumenpackaging.com';
                    $subject = "Member Query";
                    $txt=$form['comment'];
                                                               
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if ($success) {
                            $this->session->set_flashdata('success','Your Request is successfully reached us');
                            $page='contact_us';
                            $this->load_views($page);
                           
                       }

              }else
              {
                $this->session->set_flashdata('error','Mobile and OTP missmatch');
                $page='contact_us';
                $this->load_views($page);
              }         
                      
            
        }
        
         function email_cerification_mail($email)
        {
                  $rand=mt_rand(100000, 999999);
                    
                
                    $headers = "From: ". "team@packagingnaukri.com ";
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $email;
                    $subject = "Email Verification";
                    $txt=$rand.' is your OTP for verifying Email Id on packagingnaukri.com.';
                                                               
                     $this->session->set_userdata(array('email_otp'=>$rand));
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {                           
                           return true;
                       }else{
                           return false;
                       }
                      
            
        }
        
        function login_detail_email($data)
        {
             $headers = "From: ". "team@packagingnaukri.com ";
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $data['email'];
                    $subject = "Login Details";
                    $txt='<html>
                            <body>
                            <span>Hello </span>'.$data['fname'].'
                                <br><span>Thank You for Register with Packaging Naukri</span><br><br>
                                You can now login with following login details.<br><br>
                                <span>Username: </span>'.$data['email'].'
                                <br><span>Password: </span>'.$data['password'].'<br><br>
                                    <span>Thanks & Regards</span><br>
                                    <span>Packaging Team</span><br>
                                    <a href="'.  base_url().'Home" target="_blank">'.base_url().'</a>
                            </body>
                            </html>';
                                                               
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
//                           $this->session->set_userdata(array('email_otp'=>$rand));
                           return true;
                       }else{
                           return false;
                       }
        }
        
              function send_mobile_otp($mobile)
        {          
          
                $res=$this->Members_model->check_mobile_exist($mobile);
              
                if($res==false)
                {
                     echo json_encode(array('mobile_err'=>'This Mobile is already registered'));
                }else{
                    
                     $rand=mt_rand(000000,999999);
                      $where=array('member_mobile'=>$mobile);
                $data=array('member_otp'=>$rand);
                $this->session->set_userdata(array('apply_mobile_otp'=>$rand));
                 $this->session->set_userdata(array('apply_member_mobile'=>$mobile));
                $this->Members_model->member_update($where,$data);
     //Your authentication key

$authKey = "217899AjUpTycrXx6K5b0e2283";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma

$mobileNumber = $mobile;
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
echo json_encode(array('otp_success'=>'OTP sent Successfully'));       
//echo $output;
            }



 }
        
        
        function apply_job_with_otp()
        {
            $form=$this->input->post();
            
            if($this->session->userdata('apply_otp')==$form['otp'])
            {
            $job=$this->Jobs_model->get_job_by_id($form['apply_id']); 
            $data=$this->Members_model->member_info_by_mobile($form['otpmobile']);
            
            
            $this->Applied_jobs_model->apply_job(array('job_id'=>$form['apply_id'],
                                                        'recruiter_id'=>$job->recruiter_id,
                                                        'company_id'=>$job->company_id,
                                                        'member_id'=>$data->member_id,
                                                        'apply_at'=>  date('Y-m-d')));
            $this->session->set_flashdata('success','Job Applied Successfully');
            echo json_encode(array('success'=>"Applied Successfully"));
            }else{
             echo json_encode(array('otp_err'=>"Wrong OTP"));    
            }
            
        }
        
        function register_to_apply()
        {
            $form=$this->input->post();
            
            $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
             $passcode = array(); 
             $alpha_length = strlen($alphabet) - 1; 
             for ($i = 0; $i < 8; $i++) 
             {
                 $n = rand(0, $alpha_length);
                 $passcode[] = $alphabet[$n];
             }
             $pwd= implode($passcode);
         $em=$this->Members_model->member_info_by_email($form['email']);   
            if(empty($em))
            {
          if(!empty($form['otp']))
          {
            if($this->session->userdata('apply_member_mobile')==$form['mobile'] && $form['otp']==$this->session->userdata('apply_mobile_otp'))
            {
                $sys=$this->System_model->source_name();
                $data=array('member_fname'=>$form['fname'],
                            'member_lname'=>$form['lname'],
                            'member_email'=>$form['email'],
                            'member_password'=>$pwd,
                            'member_mobile'=>$form['mobile'],
                            'member_anual_salary'=>$form['min_salary'].".".$form['max_salary'],
                            'member_created_at'=>date('Y-m-d'),
                            'member_status'=>'1',
                            'member_source'=>  ucfirst($sys),
                            'member_experience'=>$form['min_exp'].".".$form['max_exp'],);
                
                $mem_id=$this->Members_model->member_add($data);
                if($mem_id)
                {
                     if (isset($_FILES['resume']['name'])) {
    if (0 < $_FILES['resume']['error']) {
        echo 'Error during file upload' . $_FILES['resume']['error'];
    } else {

        $rand=  mt_rand(1111,9999);
        $name = $_FILES["resume"]["name"];
        $ext = end((explode(".", $name)));
        $filename='resume_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['resume']['tmp_name'],'resume/'.$filename);
       
            
                $where=array('member_id'=>$mem_id);
               $data=array('member_resume'=>'resume/'.$filename);
               $res=$this->Members_model->member_update($where,$data);                     
         
    }
       }
                }
                
                $emp=array('employment_notice_period'=>$form['notice'],
                            'employment_current'=>$form['location'],
                            );
                $job=$this->Jobs_model->job_by_id($form['apply_job_id']);
                $this->Employments_model->insert_employment($emp);
                
                $apply=array('member_id'=>$mem_id,
                            'job_id'=>$form['apply_job_id'],
                            'company_id'=>$job->company_id,
                            'recruiter_id'=>$job->recruiter_id,
                            'apply_at'=>date("Y-m-d"),
                            'apply_status'=>"1");
                
                $this->Applied_jobs_model->apply_job($apply);
                $email_data=array('email'=>$form['email'],
                                  'password'=>$pwd,
                                  'fname'=>$form['fname'],
                                  'mobile'=>$form['mobile']);
                $this->login_detail_email($email_data);
                $this->login_detail_msg($email_data);
                
                 $this->session->set_flashdata('success','Job Applied Successfully. check login detail on given email id and mobile Number');  
                $this->session->unset_userdata('email_otp');
                $this->session->unset_userdata('apply_member_mobile');
                $this->session->unset_userdata('apply_mobile_otp');
                
                
                echo json_encode(array('success'=>'Job Applied Successfully'));
               
            }else{
                echo json_encode(array('apply_otp_err'=>'Wrong OTP'));
            }
          }else{
              echo json_encode(array('apply_otp_err'=>'OTP Required'));
          }
            }else{
                echo json_encode(array('apply_email_err'=>'Email Already Exists.'));
            }
            
           
        }       
        
        
        function apply_job()
        {
            $form=$this->input->post();
            
            $data=$this->Members_model->check_in_email_or_mobile(($form['email']));
                            
            if($data)
            {
                $where=array('job_id'=>$form['job_id'],
                             'member_id'=>$data->member_id);
            $check=$this->Applied_jobs_model->check_apply($where);
            if(empty($check))
            {   
              
       echo json_encode(array('email'=>$form['email'],
                              'job_id'=>$form['job_id']));

       
            }else{
                 
                 echo json_encode(array('job_err'=>'Already Applied for this job'));
            } 
            }else{
//                $this->email_cerification_mail($form['email']);
                echo json_encode(array('email_id_err'=>'This Email is not Registered',
                                       'job_id'=>$form['job_id']));
            }    
            
        }
        
        
        
        
        
        
        
        
        function printing_index()
	{
	    
        $view='home';
        $this->printing_load_views($view);
            
	}
        
        function printing_services()
        {
            $view='services';
            $this->printing_load_views($view);
        }
        function printing_about_us()
        {
            $view='about_us';
            $this->printing_load_views($view);
        }
        function printing_contact_us()
        {
            $view='contact_us';
            $this->printing_load_views($view);
        }
        function printing_post_resume()
        {
            $view='post_resume';
            $this->printing_load_views($view);
        }
        function printing_post_requirement()
        {
            $view='post_requirement';
            $this->printing_load_views($view);
        }
        function printing_recruitment()
        {
            $view='recruitment';
            $this->printing_load_views($view);
        }
        
        function printing_resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->printing_load_views($view);
        }
        
        function printing_job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->printing_load_views($view);
        }
        
         function printing_load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys="printing";
            $result['system']=$this->System_model->get_system_info('printing');

            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        
        
        
         function plastic_index()
	{
	    
        $view='home';
        $this->plastic_load_views($view);
            
	}
        
        function plastic_services()
        {
            $view='services';
            $this->plastic_load_views($view);
        }
        function plastic_about_us()
        {
            $view='about_us';
            $this->plastic_load_views($view);
        }
        function plastic_contact_us()
        {
            $view='contact_us';
            $this->plastic_load_views($view);
        }
        function plastic_post_resume()
        {
            $view='post_resume';
            $this->plastic_load_views($view);
        }
        function plastic_post_requirement()
        {
            $view='post_requirement';
            $this->plastic_load_views($view);
        }
        function plastic_recruitment()
        {
            $view='recruitment';
            $this->plastic_load_views($view);
        }
        
        function plastic_resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->plastic_load_views($view);
        }
        
        function plastic_job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->plastic_load_views($view);
        }
        
         function plastic_load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys="plastic";
            $result['system']=$this->System_model->get_system_info('plastic');

            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        
       function send_otp($email)
        {           
          
                    
                     $rand=mt_rand(000000,999999);
                      
                     $this->session->set_userdata(array('apply_otp'=>$rand));

$authKey = "215028AJLvfixOH5af6761a";    //suraj9195shinde for

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
//    echo json_encode(array('error'=> curl_error($ch)));
}
curl_close($ch);
//echo json_encode(array('send'=>'OTP is sent Successfully'));       
//echo $output;
            }

 function login_detail_msg($data)
        {           
          
         
                     $rand=mt_rand(000000,999999);
                      
                   

$authKey = "217899AjUpTycrXx6K5b0e2283";    //suraj9195shinde for

//Multiple mobiles numbers separated by comma

$mobileNumber = $data['mobile'];
//Sender ID,While using route4 sender id should be 6 characters long.

$senderId = "PKGNAU";
//Your message to send, Add URL encoding here.

$message ='Welcome To \r\n'
        . 'PACKAGINGNAUKRI.COM \r\n'
        . ''
        . 'You can login next time with your registered EMAIL or MOBILE number \r\n'
        . ''
        . 'Email: '.$data['email']
        . '\r\n Password: '.$data['password'];


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

        
       function test()
        {
             $headers = "From: ". "team@packagingnaukri.com ";
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = 'suraj9195shinde@gmail.com';
                    $subject = "Login Details";
                    $txt='<html>
                            <body>
                            <span>Hello </span> suraj
                                <br><span>Thank You for Register with Packaging Naukri</span><br><br>
                                You can now login with following login details.<br><br>
                                <span>Username: </span> suraj9195shinde@gmail.com   
                                <br><span>Password: </span>12345678<br><br>
                                    <span>Thanks & Regards</span><br>
                                    <span>Packaging Team</span><br>
                                    <a href="'.  base_url().'Home" target="_blank">'.base_url().'</a>
                            </body>
                            </html>';
                                                               
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
//                           $this->session->set_userdata(array('email_otp'=>$rand));
                           return true;
                       }else{
                           return false;
                       }
        }            
        
        

    
}


  
    
    

