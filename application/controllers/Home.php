    <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();                
	}
       
	
	function index()
	{
	    
        $view='home';
        $this->load_views($view);
            
	}
        
        function services()
        {
            $view='services';
            $this->load_views($view);
        }
        function about_us()
        {
            $view='about_us';
            $this->load_views($view);
        }
        function contact_us()
        {
            $view='contact_us';
            $this->load_views($view);
        }
        function post_resume()
        {
            $view='post_resume';
            $this->load_views($view);
        }
        function post_requirement()
        {
            $view='post_requirement';
            $this->load_views($view);
        }
        function recruitment()
        {
            $view='recruitment';
            $this->load_views($view);
        }
        function resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->load_views($view);
        }
        
        function job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->load_views($view);
        }

         function show_cities($state)
        {           
            $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }
        
        function apply($job_id)
        {
            $GLOBALS['job_id'] = $job_id;
            $view='apply';
            $this->load_views($view);
        }

        function load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys=$this->System_model->source_name();
            $result['system']=$this->System_model->get_system_info($sys);

            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        
        function send_msg()
        {
            $form=$this->input->post();
          
                
                    $headers = "From: ".$form['email'];
                    $headers .= ". PackagingNaukari-Team" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $to = 'suraj9195shinde@gmail.com';
                    $subject = "Query by Member";
                    $txt=$form['comment'];
                                                               
                 
                       $success=  mail($to,$subject,$txt,$headers); 
                      
            
        }
        
        
        function apply_job()
        {
            $form=$this->input->post();
            
            $data=$this->Members_model->member_info_by_mobile($form['mobile']);
                            
            if(!empty($data))
            {
                $where=array('job_id'=>$form['job_id'],
                             'member_id'=>$data->member_id);
            $check=$this->Applied_jobs_model->check_apply($where);
            if(empty($check))
            {   
                if (0 < $_FILES['resume']['error']) {
        echo 'Error during file upload' . $_FILES['resume']['error'];
    } else {
         $job=$this->Jobs_model->get_job_by_id($form['job_id']);       
         
        $rand=  mt_rand(1111,9999);
        $name = $_FILES["resume"]["name"];
        $ext = end((explode(".", $name)));
        $filename='resume_'.date('Y-m-d_H.i.s').".".$ext;
        move_uploaded_file($_FILES['resume']['tmp_name'], 'resume/' . $filename);
       
        if(file_exists('resume/'.$filename))
        {
            if(file_exists($data->member_resume))
            {
            unlink($data->member_resume);
         $where=array('member_id'=>$data->member_id);
        $resume=array('member_resume'=>'resume/'.$filename);
         $res=$this->Members_model->member_update($where,$resume);
         
            
            $this->Applied_jobs_model->apply_job(array('job_id'=>$form['job_id'],
                                                        'recruiter_id'=>$job->recruiter_id,
                                                        'company_id'=>$job->company_id,
                                                        'member_id'=>$data->member_id,
                                                        'apply_at'=>  date('Y-m-d')));
            echo json_encode(array('success'=>"Applied Successfully"));
        
            }else{
                $where=array('member_id'=>$data->member_id);
               $resume=array('member_resume'=>'resume/'.$filename);
               $res=$this->Members_model->member_update($where,$resume);
               
                $this->Applied_jobs_model->apply_job(array('job_id'=>$form['job_id'],
                                                        'recruiter_id'=>$job->recruiter_id,
                                                        'company_id'=>$job->company_id,
                                                        'member_id'=>$data->member_id,
                                                        'apply_at'=>  date('Y-m-d')));
               
                    echo json_encode(array('success'=>"Applied Successfully"));               
            }
        }   else{
            echo json_encode(array('error'=>"Something Wrong"));
        }   
       
       
            
//        }
    }
            }else{
                 echo json_encode(array('job_err'=>'Already Applied for this job'));
            } 
            }else{
                echo json_encode(array('mobile_err'=>'This Mobile is not Registered'));
            }    
            
        }
        
        
        
        
        
        
        
        
        function printing_index()
	{
	    
        $view='home';
        $this->printing_load_views($view);
            
	}
        
        function printing_services()
        {
            $view='services';
            $this->printing_load_views($view);
        }
        function printing_about_us()
        {
            $view='about_us';
            $this->printing_load_views($view);
        }
        function printing_contact_us()
        {
            $view='contact_us';
            $this->printing_load_views($view);
        }
        function printing_post_resume()
        {
            $view='post_resume';
            $this->printing_load_views($view);
        }
        function printing_post_requirement()
        {
            $view='post_requirement';
            $this->printing_load_views($view);
        }
        function printing_recruitment()
        {
            $view='recruitment';
            $this->printing_load_views($view);
        }
        
        function printing_resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->printing_load_views($view);
        }
        
        function printing_job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->printing_load_views($view);
        }
        
         function printing_load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys="printing";
            $result['system']=$this->System_model->get_system_info('printing');

            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        
        
        
         function plastic_index()
	{
	    
        $view='home';
        $this->plastic_load_views($view);
            
	}
        
        function plastic_services()
        {
            $view='services';
            $this->plastic_load_views($view);
        }
        function plastic_about_us()
        {
            $view='about_us';
            $this->plastic_load_views($view);
        }
        function plastic_contact_us()
        {
            $view='contact_us';
            $this->plastic_load_views($view);
        }
        function plastic_post_resume()
        {
            $view='post_resume';
            $this->plastic_load_views($view);
        }
        function plastic_post_requirement()
        {
            $view='post_requirement';
            $this->plastic_load_views($view);
        }
        function plastic_recruitment()
        {
            $view='recruitment';
            $this->plastic_load_views($view);
        }
        
        function plastic_resource_outsourcing()
        {
            $view='resource_outsourcing';
            $this->plastic_load_views($view);
        }
        
        function plastic_job($id)
        {
            $GLOBALS['id'] = $id;
            $view='job_info';
            $this->plastic_load_views($view);
        }
        
         function plastic_load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
            
            if(!empty($GLOBALS['job_id'])){
           $result['job_title']=$this->Jobs_model->job_by_id($GLOBALS['job_id']);    
            }
            
            if($view=='home')
            {
                $result['show_icon']=true;
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys="plastic";
            $result['system']=$this->System_model->get_system_info('plastic');

            
              $this->load->view($sys.'/home_header',$result);
             $this->load->view($sys."/".$view,$result);
             $this->load->view($sys.'/home_footer',$result);
//            $this->load->view('printing/home_header',$result);
//             $this->load->view('printing/contact_us',$result);
//             $this->load->view('printing/home_footer',$result);


        }
        

    
}


  
    
    

