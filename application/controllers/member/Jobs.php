<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
//BaseController
class Jobs extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
     if(!is_recruiter_LoggedIn($this->session->userdata('member_LoggedIn')))
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
            $result['member_data']=  get_member_info($id);
                     
                  
             $this->load->view('member/header',$result);
             $this->load->view('member/jobs');
             $this->load->view('member/footer',$result);
       
    }
    function search_job()
    {
        $form=$this->input->post();
        
        $result=$this->Jobs_model->search_job($form);
        foreach($result as $res)
        {
            $result[]=' <div class="shadow">
           
               <div class="box-header">
         <div class="row">
             <div class="col-md-2">
                 Logo
             </div>
             <div class="col-md-5">
                 <a href="'.base_url()."member/Jobs/get_job_info/".$res->job_id.'"><h4 style="color:#5DADE2">'.$res->job_title.
                 '</h4></a><h5>'.$res->company_name.
                    '</h5>
             </div>
              <div class="col-md-2">
                  <h5>'.$res->job_experience.'</h5>
             </div>
              <div class="col-md-1">
                  <h5>'.$res->job_city.'</h5>
             </div>
              <div class="col-md-2">
              <h5>Posted On</h5>
                  <h5>'.$res->job_created_at.'</h5>
             </div>
             <div class="row">
              <div class="pull-right"><button onclick="" class="btn btn-info btn-sm" type="button">Apply</button></div>
             </div>
         </div>
           </div>';
        }
        echo json_encode(array('result'=>$result));
        
    }
    
    public function get_job_info($id)
    {
        $id=$this->session->userdata('member_id');
            $result['member_data']=  get_member_info($id);
             $this->load->view('member/header',$result);
             $this->load->view('member/job_info');
             $this->load->view('member/footer',$result);
    }
    
   
   
    
  
}

?>