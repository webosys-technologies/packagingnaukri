    <?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		
//               $this->load->model('Recruiters_model');
                 
	}
       
	
	function index()
	{
	    	
            $this->load->view('home');
	}

    
}


  
    
    

