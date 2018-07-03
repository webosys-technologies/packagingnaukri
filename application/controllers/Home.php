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
	     // $result['jobs']=$this->Jobs_model->get_recent_job();
             
      //       $this->load->view('packaging/home_header');
      //       $this->load->view('packaging/home');
      //       $this->load->view('packaging/home_footer',$result);
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
          //  $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($state));
          
            echo json_encode($cities);
        }

        function show_state($country)
        {           
            // $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_state(ltrim($country));
          
            echo json_encode($cities);
        }

        function load_views($view)
        {            
            if(!empty($GLOBALS['id'])){
           $result['job_info']=$this->Jobs_model->job_info($GLOBALS['id']);    
            }
          
             $result['jobs']=$this->Jobs_model->get_recent_job();    
             $sys=$this->System_model->source_name();
            $result['system']=$this->System_model->get_system_info($sys);

              $this->load->view($sys.'/home_header',$result);
             $this->load->view('plastic/home',$result);
             $this->load->view($sys.'/home_footer',$result);


        }

    
}


  
    
    

