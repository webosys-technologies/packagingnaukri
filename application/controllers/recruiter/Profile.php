<?php 

/**
 * 
 */
class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_recruiter_LoggedIn($this->session->userdata('recruiter_LoggedIn')))
                {
                    redirect('recruiter/index/login');
                }
	}

	function index()
	{

            $id=$this->session->userdata('recruiter_id');
             $result['data']=$this->Recruiters_model->get_by_id($id);            
            $result['recruiter_data']=$this->Recruiters_model->get_id($id);
            $sys=$this->session->userdata('recruiter_source');
            $result['system']=$this->System_model->get_system_info($sys);
           $result['country']=$this->Cities_model->getall_country(); 

            $this->load->view('recruiter/header',$result);
            $this->load->view('recruiter/profile',$result);
            $this->load->view('recruiter/footer');
	}

	function ajax_edit($id)
	{
            $result=$this->Recruiters_model->get_id($id);
            echo json_encode($result);

	}

	function update_profile()
	{
		$form=$this->input->post();

		$data=array(
				'recruiter_id'=>$form['recruiter_id'],
				'recruiter_fname'=>$form['fname'],
				'recruiter_lname'=>$form['lname'],
				'recruiter_email' =>$form['email'],
				'recruiter_mobile'=>$form['mobile'],
				'recruiter_password' =>$form['password'],
        'recruiter_gender' =>$form['gender'],
        'recruiter_address' =>$form['address'],
        'recruiter_state' =>$form['state'],
        'recruiter_country' =>$form['country'],
        'recruiter_city' =>$form['city'],
				'recruiter_pincode' =>$form['pincode'],
		);

		$this->Recruiters_model->recruiter_update(array('recruiter_id'=>$form['recruiter_id']),$data);

		$this->pic_upload($data);
		echo json_encode(array('status'=>true));
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
                        
                            $res=$this->Recruiters_model->get_id($id);
                            
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
}

 ?>