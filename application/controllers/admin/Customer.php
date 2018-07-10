<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Customer extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
//        echo $this->session->userdata('admin_type');
     if(!is_admin_LoggedIn($this->session->userdata('admin_LoggedIn')) || $this->session->userdata('admin_type')!="admin") 
     {
         redirect('admin/Dashboard');
     }
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {       
             $id=$this->session->userdata('admin_id');
            $result['user_data']=get_user_info($id);
            $result['states']=$this->Cities_model->getall_state();
            $result['customer']=$this->Customer_model->getall_customer();
            $sys=$this->session->userdata('admin_source');
            $result['system']=$this->System_model->get_system_info($sys);
            
           
             $this->load->view('admin/header',$result);
             $this->load->view('admin/customer',$result);
             $this->load->view('admin/footer',$result);
    }
    
  
    
    public function customer_add()
    {
        $form=$this->input->post();
         if(!empty($form['name']))
      {
        $data=array(
                  // 'recruiter_id'=>$id,
                   'customer_name'=>$form['name'],
                   'customer_status'=>$form['status'],
                   'customer_created_at' =>date('Y-m-d'),
                   'customer_source' =>$form['source'],
        );
        
          $res=$this->Customer_model->customer_add($data);
          
           if (isset($_FILES['logo']['name']))
          {
             
              $this->logo_upload($res);
          }
          
         
               $this->session->set_flashdata('success','company added successfully');
              echo json_encode(array('success'=>'Company added successfully'));
      
      }else{
           echo json_encode(array('source_err'=>'Select Source Name'));
      }
    }
    
    public function customer_update()
    {
   $form=$this->input->post();
         if(!empty($form['name']))
      {
        $data=array(
                  // 'recruiter_id'=>$id,
                   'customer_name'=>$form['name'],
                   'customer_status'=>$form['status'],
                   'customer_source' =>$form['source'],
                   
        );
        
          $res=$this->Customer_model->customer_update(array('customer_id'=>$form['id']),$data);
          
           if (isset($_FILES['logo']['name']))
          {
             
              $this->logo_upload($form['id']);
          }
          
         
               $this->session->set_flashdata('success','customer added successfully');
              echo json_encode(array('success'=>'Customer added successfully'));
      
      }else{
           echo json_encode(array('source_err'=>'Select Customer Name'));
      }    
    }
    
    public function ajax_edit($id)
    {
        $res=$this->Customer_model->customer_by_id($id);
        if($res)
        {
            echo json_encode($res);
        }
    }
    
    public function customer_delete($id)
    {
        $res=$this->Customer_model->Customer_delete($id);
        if($res)
        {           
            if(file_exists($info->customer_logo))        
            {
            unlink($info->customer_logo);
            }
            $this->session->set_flashdata('success','Customer deleted successfully');
            echo json_encode(array('success'=>'Customer deleted successfully'));
        }
    }
    
    function customer_info($id)
    {
        $result=$this->Customer_model->customer_by_id($id);
        echo json_encode($result);
        
    }
    
    function delete_logo($id)
    {
         $info=$this->Customer_model->customer_by_id($id);
         if(file_exists($info->customer_logo))        
            {
            unlink($info->customer_logo);
            }
        $where=array('company_id'=>$id);
        $data=array('company_logo'=>"");
         $res=$this->Companies_model->company_update($where,$data);
        redirect('admin/Companies');
    }
    
    
        function logo_upload($comp_id)
    {
        $info=$this->Customer_model->customer_by_id($comp_id);
             
if (isset($_FILES['logo']['name'])) {
    if (0 < $_FILES['logo']['error']) {
//        echo 'Error during file upload' . $_FILES['logo']['error'];
        return false;
    } else {

        $rand=  mt_rand(1111,9999);
        $name = $_FILES["logo"]["name"];
        $ext = end((explode(".", $name)));
        $filename='logo_'.date('Y-m-d_H.i.s').".".$ext;
        
        move_uploaded_file($_FILES['logo']['tmp_name'], 'company_logo/' . $filename);
       
        if(file_exists('company_logo/'.$filename))
        {
            if(file_exists($info->customer_logo))
            {
            unlink($info->customer_logo);
         $where=array('customer_id'=>$comp_id);
        $data=array('customer_logo'=>'customer_logo/'.$filename);
         $res=$this->Customer_model->customer_update($where,$data);
         
        
           return true;
        
            }else{
                $where=array('customer_id'=>$comp_id);
        $data=array('customer_logo'=>'company_logo/'.$filename);
         $res=$this->Customer_model->customer_update($where,$data);
        
           return true;
                   
            }
        }   else{
            return false;
        }  
//        }
    }
} else {
    return false;
}
        
    }
    
  
}

?>