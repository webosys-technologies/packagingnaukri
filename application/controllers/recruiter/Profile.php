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
            $res=$this->Recruiters_model->get_id($id);
            if($res)
        {     
            $data['state']=$this->show_state($res);
            // print_r($state);

        $result=((object)array_merge((array)$res,(array)$data));
        // print_r($result);
            echo json_encode($result);
        }

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
       $this->session->set_flashdata('success','Data Updated Successfully');
    
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

    
    public function change_password()
        {
             $recruiter_LoggedIn = $this->session->userdata('recruiter_LoggedIn');
        
        if(isset($recruiter_LoggedIn) || $recruiter_LoggedIn == TRUE)
        {
            $data=$this->Recruiters_model->get_id($this->session->userdata('recruiter_id'));
            
          if($data->recruiter_password==$this->input->post('opassword'))
          {
                $this->Recruiters_model->recruiter_update(array('recruiter_id'=>$this->session->userdata('recruiter_id')),
                                                    array('recruiter_password'=>$this->input->post('newpassword'))
                                                    );
        
                $this->session->set_flashdata('success','password updated successfully');
                echo json_encode(array('success'=>"password updated successfully"));
          }else{
                echo json_encode(array('opassword_err'=>"Old Password Does Not Match"));
          }
        }
        else
        {
            $this->load->view('member/login');
            

        }
        }

      function show_state($data)
        {
            $country=$data->recruiter_country;
            $val['states']=$this->Cities_model->getall_states($country);
            $st=$data->recruiter_state;
            $val['cities']=$this->Cities_model->getall_cities($st);
            
            return $val;
            // echo json_encode($cities);

        }


        }
 