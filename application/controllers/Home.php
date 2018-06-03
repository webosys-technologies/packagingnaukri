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
	     $result['jobs']=$this->Jobs_model->get_recent_job();
             
            $this->load->view('home_header');
            $this->load->view('home');
            $this->load->view('home_footer',$result);
            
	}
        function services()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('services');
             $this->load->view('home_footer',$result);
        }
        function about_us()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('about_us');
             $this->load->view('home_footer',$result);
        }
        function contact_us()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('contact_us');
             $this->load->view('home_footer',$result);
        }
        function post_resume()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('post_resume');
             $this->load->view('home_footer',$result);
        }
        function post_requirement()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('post_requirement');
             $this->load->view('home_footer',$result);
        }
        function recruitment()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('recruitment');
             $this->load->view('home_footer',$result);
        }
        function resource_outsourcing()
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
            $this->load->view('home_header');
             $this->load->view('resource_outsourcing');
             $this->load->view('home_footer',$result);
        }
        
        function job($id)
        {
             $result['jobs']=$this->Jobs_model->get_recent_job();
             $result['job_info']=$this->Jobs_model->job_info($id);
             $this->load->view('home_header');
             $this->load->view('job_info',$result);
             $this->load->view('home_footer',$result);
        }

         function show_cities($state)
        {           
            $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }

    
}


  
    
    

