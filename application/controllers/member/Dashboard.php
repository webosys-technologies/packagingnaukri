<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
     //$member_LoggedIn = $this->session->get_userdata('member_LoggedIn');
        
    public function __construct()
    {
        parent::__construct();
        if(!is_member_LoggedIn($this->session->userdata('member_id')))
        {
            redirect('Home');
        }
      
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
       
             $id=$this->session->userdata('member_id');            
            $result['system']=$this->System_model->get_info();
                      
            $where=array('member_id'=>$id);
            $emp=$this->Employments_model->get_employment($where);
            if(!empty($emp->employment_from))
            {
                 $datetime1 = new DateTime(date("Y-m-d"));
            $datetime2 = new DateTime($emp->employment_from);
            $interval = $datetime1->diff($datetime2);
            $exp=$interval->format('%y yrs %m month');
          
                $mem_data=array('member_experience'=>$exp);
                $mem_where=array('member_id'=>$id);
               $this->Members_model->member_update($where,$mem_data);
            }
            
            
             $result['member_data']=get_member_info($id);
             $this->load->view('member/header',$result);
//             $this->load->view('member/member_header',$result);
//             $this->load->view('member/dashboard');
                 $this->load->view('member/jobs');
             $this->load->view('member/footer');
//             $this->load->view('member/member_footer');

           
    }
    
    
    
    
}

?>