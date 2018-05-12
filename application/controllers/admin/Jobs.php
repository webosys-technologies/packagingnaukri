<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Jobs extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
     if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
     {
         redirect('admin/index');
     }
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {       
        
//            $id=$this->session->userdata('user_id');
//            $result['user_data']=$this->User_model->get_user_by_id($id);
//                     
//                  
//             $this->load->view('admin/header',$result);
//             $this->load->view('admin/add_jobs');
//             $this->load->view('admin/footer');
       
    }
    
    public function view_jobs()
    {        
            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $result['jobs']=$this->Jobs_model->getall_jobs();
            $result['companies']=$this->Companies_model->getall_companies();
           
             $this->load->view('admin/header',$result);
             $this->load->view('admin/view_jobs',$result);
             $this->load->view('admin/footer');       
    }
    
    public function job_update()
    {
//        echo $id;
        $form=$this->input->post();
       
        $data=array('job_title'=>$form['jobtitle'],
//                    ''=>$form['company'],
                    'job_education'=>$form['qualification'],
                    'job_experience'=>$form['experience'],
                    'job_description'=>$form['jobdesc'],
                    'job_city'=>$form['joblocation'],
                    'job_id'=>$form['id'],
                    
            
        );
         $result=$this->Jobs_model->update_job($data,$form['id']);
         if($result>0)
         {
       $this->session->set_flashdata('success','Data Updated Successfully');
       redirect('admin/Jobs/view_jobs');
         }
    }
    
    public function ajax_edit($id)
    {
        $res=$this->Jobs_model->job_by_id($id);
        if($res)
        {
            echo json_encode($res);
        }
    }
    
  
}

?>