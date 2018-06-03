<?php 

/**
 * 
 */
class Profile extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')))
                {
                    redirect('admin/index');
                }
	}

	function index()
	{

            $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            // $data['user']=$this->User_model->get_user_b();
            $result['system']=$this->System_model->get_info();
            
       
            $this->load->view('admin/header',$result);
            $this->load->view('admin/profile',$result);
            $this->load->view('admin/footer');
	}

	function ajax_edit($id)
	{
            $result=get_user_info($id);
            echo json_encode($result);

	}

	function update_profile()
	{
		$form=$this->input->post();

		$data=array(
				'user_id'=>$form['user_id'],
				'user_fname'=>$form['fname'],
				'user_lname'=>$form['lname'],
				'user_email' =>$form['email'],
				'user_mobile'=>$form['mobile'],
				'user_password' =>$form['password'],
				'user_gender' =>$form['gender'],
		);

		$this->User_model->user_update(array('user_id'=>$form['user_id']),$data);

		$this->pic_upload($data);
		echo json_encode(array('status'=>true));
	}

	function pic_upload($data)
    {  
       $id=$data['user_id'];
       
                                   $new_file=$data['user_fname'].mt_rand(100,999);
       
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
                        
                            $res=$this->User_model->get_user_by_id($id);
                            
                            if(file_exists($res->user_profile_pic))
                            {
                            unlink($res->user_profile_pic);
                            }
                                               
                           
                            $ext= explode(".",$this->upload->data('file_name'));  
                            $img_name =$new_file.".".end($ext); //video name as path in db
                             $img_path='profile_pic/'.str_replace(' ','_',$img_name);
                          $pic = array(
                              'user_profile_pic' => $img_path,
                            );
            
                                  
                                    
                   $insert =  $this->User_model->user_update(array('user_id' =>$id), $pic);
                          
                         return true; 
                                               
                       }

        

            
    }
}

 ?>