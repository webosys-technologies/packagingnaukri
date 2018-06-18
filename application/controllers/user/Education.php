<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Education extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_user_LoggedIn($this->session->userdata('user_LoggedIn')))
                {
                    redirect('user/index');
                }
	}
	public function index()
	{

            $id=$this->session->userdata('user_id');
            $result['user_data']=get_user_info($id);
             $result['edu']=$this->Master_edu_model->getall();
            $sys=$this->session->userdata('user_source');
            $result['system']=$this->System_model->get_system_info($sys);
             
            $this->load->view('user/header',$result);
            $this->load->view('user/education',$result);
            $this->load->view('user/footer');
	}


	function edu_add()
	{
            
		$dataSet=array();

	   $title = $this->input->post('title');
	   $education = $this->input->post('education'); 
	   $status = $this->input->post('status'); 

	   for($i=0;$i<sizeof($title);$i++)
	   {
	     $dataSet[$i] = array (         
	     				       'medu_title' => $title[$i],
	     					   'medu_education' => ltrim($education[$i]),
	     					   'medu_status' => $status[$i],

	     					);
	   }
	   // $dataSet is an array of array
	   $this->Master_edu_model->add($dataSet);
	   
                $this->session->set_flashdata('success','Education Added Successfully');

        echo json_encode(array("status" => TRUE));

	   

    }

    function edu_update()
	{

	     $data = array (        
	     				       'medu_id' => $this->input->post('id'),
	     					   'medu_title' => $this->input->post('title'),
	     					   'medu_education' =>$this->input->post('education'),
	     					   'medu_status' =>$this->input->post('status'),
	     					);
	   
	   $this->Master_edu_model->update(array('medu_id' => $this->input->post('id')),$data);
	   
                $this->session->set_flashdata('success','Education Updated Successfully');

        echo json_encode(array("status" => TRUE));


	   

    }
	

	public function ajax_edit($id)
	{
		$data = $this->Master_edu_model->get_by_id($id);



		echo json_encode($data);
	}

	function edu_delete($id)
    {

        $result=$this->Master_edu_model->delete_by_id($id);
              if($result)
                {
                   echo json_encode(array("status" => true));
                $this->session->set_flashdata('success', 'Education Deleted Successfully');
                }
       
             }
}

 ?>