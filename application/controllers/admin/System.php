<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class System extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
                {
                    redirect('admin/index');
                }
                $this->load->model('System_model');

	}

	function index()
	{
		
            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $data['system']=$this->System_model->get_info();
           
            $this->load->view('admin/header',$result);
            $this->load->view('admin/system',$data);
            $this->load->view('admin/footer');
	}
}



 ?>