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
            $view='job';
            $this->load_views($view);
        }

         function show_cities($state)
        {           
            $st=str_replace('%20', ' ', $state);
            $cities=$this->Cities_model->getall_cities(ltrim($st));
          
            echo json_encode($cities);
        }

        function load_views($view)
        {
            
            $result['jobs']=$this->Jobs_model->get_recent_job();           
            
            $url=explode('/', base_url());
            if ($url[3] == 'packagingnaukri') {
            
              $page='packaging/'.$view;
            $this->load->view('packaging/home_header');
             $this->load->view($page,$result);
             $this->load->view('packaging/home_footer',$result);
            }
            elseif ($url[3] == 'printingnaukari') {
                  $page='printing/'.$view;
                $this->load->view('packaging/home_header');
                 $this->load->view($page,$result);
                 $this->load->view('packaging/home_footer',$result);                    
            }else{
                  $page='plastic/'.$view;
                $this->load->view('packaging/home_header');
                 $this->load->view($page,$result);
                 $this->load->view('packaging/home_footer',$result);                
            }
        }

    
}


  
    
    

