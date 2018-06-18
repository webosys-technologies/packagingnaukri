<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';


class Setting extends CI_Controller
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
            $result['data']=$this->System_model->getinfo_by_id($id);
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
          
                  
             $this->load->view('admin/header',$result);
             $this->load->view('admin/setting',$result);
             $this->load->view('admin/footer');             
    }
    
    public function source_status($val)
    {
         $this->session->userdata('admin_id');
        $where=array('user_id'=>$this->session->userdata('admin_id'));
        $data=array('source_status'=>$val);

        $this->System_model->system_update($where,$data);

        $this->session->set_flashdata('success','source status update Successfully');
        echo json_encode(array('success'=>'source status update Successfully'));
        }
    
  

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        echo $this->global['pageTitle'];
        $this->loadViews("404", $this->global, NULL, NULL);
    }
    
    function query()
    {
        $this->load->view('query');
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