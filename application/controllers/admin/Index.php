<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
              
                
        }
	
	function index()
	{
                
		$this->load->view('admin/login');
	}
        
       
        
        function login()
    {
        
        if(is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')))
        {
           redirect('admin/Dashboard');
        }
        else
        {
             $this->load->view('admin/login');
            
        }
    }
    
    
    
    
    public function loginMe()
    {
        
        $this->load->library('form_validation');
        
      //  $this->form_validation->set_rules('email', 'Username', 'callback_username_check');
        $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('user_password', 'Password', 'required|max_length[32]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->login();
        }
        else  
        {
            $user_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            $where=array('user_email'=>$user_email,
                         'user_password'=>$user_password);
            list($result,$valid_email)=$this->User_model->check_user($where);
         
        
       if($valid_email)  //valid email >0
       {          
            
//            if($result > 0 && $result->user_status==1 && $result->user_type == 'admin')
             if($result > 0 && $result->user_status==1)    
            {
               $source=$this->System_model->source_name();

                    $sessionArray = array(                        
                    'admin_id' => $result->user_id,
                    'admin_fname' => $result->user_fname,
                    'admin_lname' => $result->user_lname,
                    'admin_email' => $result->user_email,
                    'admin_type'=> $result->user_type,
                    'admin_LoggedIn' => true,
                    'admin_source'   => $source,
                    'user_recruiter_id'=> $result->recruiter_id
                                    );
                                    
                    $this->session->set_userdata($sessionArray);  
                    
                    redirect('admin/Dashboard');
                  
               
              }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');
                
                if($result > 0 && $result->user_status==0)
                {
                 $this->session->set_flashdata('error', 'This email is not active');
                }
                
                redirect('admin/Index/Login');  
            }  
        }
        else
        {
             $this->session->set_flashdata('error', 'This email id is not registered with us.');
                 redirect('admin/Index/Login'); 
        }
        }
    }
    
    
     public function signout()
    {       
       $this->session->sess_destroy();
       //  $this->session->unset_userdata('user_LoggedIn'); 
        $this->session->sess_destroy();
//         $this->session->unset_userdata('user_LoggedIn'); 
        redirect('admin/Index/login');  
    }

    
    public function test()
    {
        $this->load->view('admin/upload');
    }
    function result()
    {
        if($_POST['Upload'] == 'Upload')

  {

    //make the allowed extensions

    $goodExtensions = array('.doc','.docx','.pdf'); 

    $error='';

    //set the current directory where you wanna upload the doc/docx files

    $uploaddir = 'resume/';

    $name = $_FILES['filename']['name'];//get the name of the file that will be uploaded

    $min_filesize=10;//set up a minimum file size(a doc/docx can't be lower then 10 bytes)

    $stem=substr($name,0,strpos($name,'.'));

    //take the file extension

    $extension = substr($name, strpos($name,'.'), strlen($name)-1);

    //verify if the file extension is doc or docx

     if(!in_array($extension,$goodExtensions))

       $error.='Extension not allowed<br>';

  echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1

     if(filesize($_FILES['filename']['tmp_name']) < $min_filesize)

       $error.='File size too small<br>'."\n";

    $uploadfile = $uploaddir . $stem.$extension;

  $filename=$stem.$extension;

  if ($error=='')

  {

  //upload the file to

  if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {

  echo 'File Uploaded. Thank You.';

  }

  }

  else echo $error;

  }
      }

   
    
        
}