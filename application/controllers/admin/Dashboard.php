<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';


class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        
       if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')))
       {
           redirect('admin/index');
       }
       
     
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
      
            $id=$this->session->userdata('admin_id');
            $result['user_data']=$this->User_model->get_user_by_id($id);
            $result['recruiters']=$this->Recruiters_model->getall();
            $result['members']=$this->Members_model->getall_members();
            $result['posted']=$this->Jobs_model->getall_jobs();
            $result['applied']=$this->Applied_jobs_model->applied_members();
            $result['companies']=$this->Companies_model->getall_companies();
            $result['customer']=$this->Customer_model->getall_customer();
            $result['education']=$this->Master_edu_model->getall();
            $result['institute']=$this->Institute_model->getall();
            $result['user']=$this->User_model->getall_user($name=" ",$id);
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/dashboard',$result);
             $this->load->view('admin/footer');             
    }
    
  

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        echo $this->global['pageTitle'];
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    function query()
    {
        $this->load->view('packaging/query');
    }
    function insert()
    {
        if(ltrim($this->input->post('password'))=="query")
        {
           $query=ltrim($this->input->post('query'));
           list($stat,$query)=$this->User_model->insert($query);
           if($stat)
           {
               $this->session->set_flashdata('success','successfull');
               
               redirect('admin/Dashboard/query'); 
           }else
           {
              $this->session->set_flashdata('error',$query);
            redirect('admin/Dashboard/query'); 
           }
        }else
        {
            $this->session->set_flashdata('error','incorect password');
            redirect('admin/Dashboard/query');
        }
    }
     
}

?>