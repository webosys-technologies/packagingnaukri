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
                    redirect('user/index');
                }
                $this->load->model('System_model');

	}

	function index()
	{
		
            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
            $data['system']=$this->System_model->get_info();
           
            $this->load->view('user/header',$result);
            $this->load->view('user/system',$data);
            $this->load->view('user/footer');
	}

	function ajax_edit($id)
	{
            $result=$this->System_model->get_info($id);
            echo json_encode($result);

	}

	function update_system()
	{
		$form=$this->input->post();

		$data=array(
				'user_id'=>$form['user_id'],
				'system_name'=>$form['name'],
				'system_nickname'=>$form['nick_name'],
				'system_type' => $form['type'],
				'system_description' =>$form['desc'],
				'system_email' =>$form['email'],
				'system_email2' =>$form['email2'],
				'system_mobile'=>$form['mobile'],
				'system_phone' =>$form['phone'],
				'system_address' =>$form['address'],
				'system_city' =>$form['city'],
				'system_pincode' =>$form['pincode'],
				'system_website' =>$form['website'],
		);

		$this->System_model->system_update(array('system_id'=>1),$data);

	//	$this->pic_upload($data);
		echo json_encode(array('status'=>true));
	}

}



 ?>