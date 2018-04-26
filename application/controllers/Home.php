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
	    	
//            $this->load->view('home_header');
            $this->load->view('home');
//            $this->load->view('home_footer');
            
	}
        function services()
        {
            $this->load->view('home_header');
             $this->load->view('services');
             $this->load->view('home_footer');
        }
        function about_us()
        {
            $this->load->view('home_header');
             $this->load->view('about_us');
             $this->load->view('home_footer');
        }
        function contact_us()
        {
            $this->load->view('home_header');
             $this->load->view('contact_us');
             $this->load->view('home_footer');
        }
        function post_resume()
        {
            $this->load->view('home_header');
             $this->load->view('post_resume');
             $this->load->view('home_footer');
        }
        function post_requirement()
        {
            $this->load->view('home_header');
             $this->load->view('post_requirement');
             $this->load->view('home_footer');
        }
        function recruitment()
        {
            $this->load->view('home_header');
             $this->load->view('recruitment');
             $this->load->view('home_footer');
        }
        function resource_outsourcing()
        {
            $this->load->view('home_header');
             $this->load->view('resource_outsourcing');
             $this->load->view('home_footer');
        }

    
}


  
    
    

