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

		$submit=$this->input->post('submit');
		if (!$submit)
        {
			
		$state['states']=$this->Cities_model->getall_state();	
                $this->load->view('home_header');  
                $this->load->view('recruiter/register',$state); 
                 $this->load->view('home_footer');  
                
                    
        }
        else
		{
                   
            
			list($get_insert,$get_data)=$this->Recruiters_model->register();
			if($get_insert)
			{                   
                            
                                  $this->session->set_flashdata('signup_success','Registration Successfull!');
                                
                                  redirect('recruiter/index/login');
                              
                        }
			else
                            {     
                            
				redirect('recruiter/index');
			}

		
                
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
             $this->load->view('home_header');  
             $this->load->view('recruiter/login');
             $this->load->view('home_footer');  

            
        }
    }
    function recruiter_encrypt($email,$hash)
    {
        $data=array('recruiter_verification'=>$hash);
        $recruiter_email=array('recruiter_email'=>$email);
        $this->Recruiters_model->recruiter_update($recruiter_email,$data);
    }
    function resend_email($recruiter_email)
    {
        $get_data=$this->Recruiters_model->get_data_by_email($recruiter_email);
        $msg=array(
                                    'title'=>'Delto Center Verification...!',
                                    'data'=>'Your Center Registration Successfully with delto',
                                    'email'=>$recruiter_email
                                );
         
         $recruiter_data=array('recruiter_fname'=>$get_data->recruiter_fname,
             'recruiter_lname'=>$get_data->recruiter_lname,
             'recruiter_mobile'=>$get_data->recruiter_mobile,
             'recruiter_password'=>$get_data->recruiter_password,
             'recruiter_name'=>$get_data->recruiter_name,
             'recruiter_email'=>$recruiter_email);
         
       
        $result=$this->verification_email($recruiter_data,$msg);
        if($result==true)
        {
           $this->session->set_flashdata('signup_success','Verification code send successfully,please check & verify your email!');
                                
             redirect('recruiter/index/login'); 
        }
        else
        {
            redirect('recruiter/index/login');
        }
    }
    
    function verification_email($getdata,$msg)
    {
         $hash= md5( rand(0,1000) );
                 $this->recruiter_encrypt($getdata['recruiter_email'],$hash);
                
                    $headers = "From: no-reply@delto.in";
                    $headers .= ". DELTO-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $msg['email'];
                    $subject = "Delto.in - Account verification";

                    $txt = '<html>
                        <head>
                                            <style>
                                            .button {
                                                background-color: #4CAF50; 
                                                border: none;
                                                color: white;
                                                padding: 20px;
                                                text-align: recruiter;
                                                text-decoration: none;
                                                display: inline-block;
                                                font-size: 16px;
                                                margin: 4px 2px;
                                                cursor: pointer;
                                            }
                                            .button3 {border-radius: 8px;}


                                             .div1 {
                                           
                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #3c8dbc;
                                                   padding: 20px;
                                               }
                                                .div2 {

                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #d2d6de;
                                                   padding: 20px;
                                               }
                                               #color{
                                               color:blue;
                                               }
                                            </style>
                                        </head>
                                             <body><div class="div1"><h2>Delto Center Verification...!<h2></div><div class="div2">Dear'." ".$getdata['recruiter_fname']." ".$getdata['recruiter_lname'].',<br><br> We are ready to activate your account.Simply Please Verify your email Address.<br><br><br>
                                            
                                              <recruiter><a  href="'.base_url().'recruiter/index/recruiter_verification/'.$getdata['recruiter_email'].'/'.$hash.'">Click here to verify your account </a></recruiter>'
                            . '          <br>Best Regards,<br>Delto Team<br><a href="http://delto.in">http://delto.in</a><br> </div></body></html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                          return true;
                       }
    }
    
    function signup_email($getdata,$msg)
    {    
               
                 $hash= md5( rand(0,1000) );
                 $this->recruiter_encrypt($getdata['recruiter_email'],$hash);
                
                    $headers = "From: support@delto.in";
                    $headers .= ". DELTO-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $msg['email'];
                    $subject = "Welcome To Delto.in";

                    $txt = '<html>
                        <head>
                                            <style>
                                            

                                             .div1 {
                                           
                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #3c8dbc;
                                                   padding: 20px;
                                               }
                                                .div2 {

                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #d2d6de;
                                                   padding: 20px;
                                               }
                                               #color{
                                               color:blue;
                                               }
                                            </style>
                                        </head>
                                             <body><div class="div1"><h2>'.$msg['title'].'<h2></div><div class="div2">Dear'.$getdata['recruiter_fname'].' '.$getdata['recruiter_lname'].'('.$getdata['recruiter_name'].'),<br>Thank You for sign in with delto.<br><br>You can now login with following login details<br><br>
                                            
                                            <b>recruiter Owner Name :</b>'.$getdata['recruiter_fname']." "
                                             .$getdata['recruiter_lname'].
                                             "<br><b>Center Name :</b>".$getdata['recruiter_name'].
                                             '<br><b>Center Login URL:</b> <a href="http://delto.in/recruiter/index/login">http://delto.in/recruiter/index/login</a>
                                             <br><b>Email Id:</b>'.$getdata['recruiter_email'].
                                              "<br><b>Password :</b>".$getdata['recruiter_password'].
                                              '<br>Best Regards,<br>Delto Team<br><a href="http://delto.in">http://delto.in</a><br></div></body></html>';
                              
                                              
                                            
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                          return true;
                       }
//                   
    }
    
    
    
    function otp_email($getdata,$msg)
    {
                 
                    $headers = "From: admin@webosys.com";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $msg['email'];
                    $subject = "Delto";
                    $txt='<html>
                        <head>
                                            <style>
                                            

                                             .div1 {
                                           
                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #3c8dbc;
                                                   padding: 20px;
                                               }
                                                .div2 {

                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #d2d6de;
                                                   padding: 20px;
                                               }
                                               #color{
                                               color:blue;
                                               }
                                            </style>
                                        </head>
                                             <body><div class="div1"><h2>'.$msg['title'].'</h2></div>
                                                                                       
                                             
                            <div class="div2">Dear Customer,<br><b>Center Name :</b>'.$getdata['recruiter_name'].'<br><br>'.$msg['data'].'<b id="color"> '.$getdata['otp'].'</b><br><br>
                                              Best Regards,<br>Delto Team<br><a href="http://delto.in">http://delto.in</a><br>
                                               <a href="'.base_url().'recruiter/index/login">Sign In</a> </div></body></html>';                               
                                      
                                                                                                     
                     $success=  mail($to,$subject,$txt,$headers); 
                       if($success)
                       {
                           
                           redirect('recruiter/index/login');
                       }
                       else
                       {
                            redirect('recruiter/index/login');
                       }
                  
             
    }
    
    
    
     function password_email($getdata,$msg)
    {
       
                
                    $headers = "From: admin@webosys.com";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = $msg['email'];
                    $subject = "Delto";
                    $txt='<html>
                        <head>
                                            <style>
                                            

                                             .div1 {
                                           
                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #3c8dbc;
                                                   padding: 20px;
                                               }
                                                .div2 {

                                                   width: 100%;
                                                   border-radius: 5px;
                                                   background-color: #d2d6de;
                                                   padding: 20px;
                                               }
                                               #color{
                                               color:blue;
                                               }
                                            </style>
                                        </head>
                                             <body><div class="div1"><h2>'.$msg['title'].'</h2></div>
                                                                                       
                                             
                            <div class="div2">Dear Customer,<br>'.$get_data['recruiter_name'].'<br>'.$msg['data'].'<br>
                            <br><b>Username :</b>'.$msg['email'].
                                              "<br><b>New Password :</b>".$msg['password'].'
                                               <br>Thank You,<br>
                                               Webosys Team,<br>
                                               <a href=http:"'.base_url().'recruiter/index/login">Sign In</a> </div></body></html>';
                                                
                                      
                                            
                                                         
                    $success=  mail($to,$subject,$txt,$headers); 
                      
                     if($success)
                   {
                          $this->session->set_flashdata('signup_success','Password changed successfully...!');
                       redirect('recruiter/index/login');
                   }
             
    }
    
    
    
    
    
    
     public function loginMe()
    {
        
        $this->load->library('form_validation');
        
      //  $this->form_validation->set_rules('email', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('recruiter_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('recruiter_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else  
        {
            $recruiter_email = $this->input->post('recruiter_email');
            $recruiter_password = $this->input->post('recruiter_password');
            $where=array('recruiter_email'=>$recruiter_email,
                         'recruiter_password'=>$recruiter_password);
            
      list($result,$valid_email)=$this->Recruiters_model->loginMe($where);
            
       if($valid_email>0)
       {
           
         
                
            if($result > 0 && $result->recruiter_status==1)
            {          
                    $sessionArray = array(                        
                         'recruiter_id' => $result->recruiter_id,
                    'recruiter_fname' => $result->recruiter_fname,
                    'recruiter_lname' => $result->recruiter_lname,
                    'recruiter_email' => $result->recruiter_email,
                     'recruiter_name'=> $result->recruiter_name,
                     'recruiter_mobile' => $result->recruiter_mobile,
                    'recruiter_LoggedIn' => true
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    redirect('recruiter/Dashboard');                 
               
              }
           
            else
            {   
                             
                if($result > 0 && $result->recruiter_status==0)
                {
                   
                 $this->session->set_flashdata('log_error', 'Account is not activeted yet.');
                 $this->session->set_flashdata('recruiter_email', $recruiter_email);
                }
                else
                {
                    $this->session->set_flashdata('error', 'Email or password mismatch');
                }
                
                redirect('recruiter/index/login');  
            } 
            }
            else
            {
                 $this->session->set_flashdata('error', 'This email id is not registered with us.');
                 redirect('recruiter/index/login'); 
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
        
        function show_cities($state)
        {
           
            $cities=$this->Cities_model->getall_cities(ltrim($state));
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


  
    
    

