<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    
        public function __construct() {
                parent::__construct();
              
        }

	
        
	public function index()
	{
            $data['title'] = "Welcome to Claudia's Kids";
            $data['sitedescr'] = "home";
            $data['title'] = $data['title']." :: home";
            $data['navlist'] = $this->MCats->getCatategoryNav();
            $data['mainf'] = $this->MProducts->getMainFeature();
            $skip = $data['mainf']['id'];
            $data['sidef'] = $this->MProducts->getRandomProducts(2, $skip);
            $data['main'] = "home";
            $this->load->view('welcome_message',$data);
	}
        
        
        public function cat()
	{
		
	}
        
        public function subcat()
	{
		
	}
        
        
        public function product()
	{
		
	}
        
        public function cart()
	{
		
	}
        
        
        public function search()
	{
		
	}
        
        public function about_us()
	{
		
	}
        
        
        public function contact()
	{
		
	}
        
        
        public function privacy()
	{
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */