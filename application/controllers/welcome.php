<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property CI_Benchmark $benchmark
* @property CI_Calendar $calendar
* @property CI_Cart $cart
* @property CI_Config $config
* @property CI_Controller $controller
* @property CI_Email $email
* @property CI_Encrypt $encrypt
* @property CI_Exceptions $exceptions
* @property CI_Form_validation $form_validation
* @property CI_Ftp $ftp
* @property CI_Hooks $hooks
* @property CI_Image_lib $image_lib
* @property CI_Input $input
* @property CI_Language $language
* @property CI_Loader $load
* @property CI_Log $log
* @property CI_Model $model
* @property CI_Output $output
* @property CI_Pagination $pagination
* @property CI_Parser $parser
* @property CI_Profiler $profiler
* @property CI_Router $router
* @property CI_Session $session
* @property CI_Sha1 $sha1
* @property CI_Table $table
* @property CI_Trackback $trackback
* @property CI_Typography $typography
* @property CI_Unit_test $unit_test
* @property CI_Upload $upload
* @property CI_URI $uri
* @property CI_User_agent $user_agent
* @property CI_Validation $validation
* @property CI_Xmlrpc $xmlrpc
* @property CI_Xmlrpcs $xmlrpcs
* @property CI_Zip $zip
* @property MCats $cat
* @property MProducts $products
*/


class Welcome extends CI_Controller {
    
    
        public function __construct() {
                parent::__construct();
              
        }

	
        
	public function index()
	{
            $data['title'] = "Welcome to Claudia's Kids";
            $data['sitedescr'] = "home";
            $data['title'] = $data['title']." :: home";
            $data['navlist'] = $this->MCats->getCategoriesNav();
            $data['mainf'] = $this->MProducts->getMainFeature();
            $skip = $data['mainf']['id'];
            $data['sidef'] = $this->MProducts->getRandomProducts(2, $skip);
            $data['main'] = "home";
            $this->load->view('welcome_message',$data);
	}
        
        
        public function cat($id)
	{
		$cat = $this->MCats->getCategory($id);
                
                if (! count($cat)) {
                    redirect('welcome/index', 'refresh');
                }
                
                $data['title'] = "Claudia's Kids :: ". $cat['name'];
                $data['sitedescr'] = $cat['name'];
                
                if ($cat['parentid'] < 1){
                    
                    //show other categories
                    $data['listing'] = $this->MCats->getSubCategories($id);
                   
                    $data['level'] = 1;
                } else {
                   //show products
                    echo"products....";
                    $data['listing'] = $this->MProducts->getProductsByCategory($id);
                    $data['level'] = 2;
                }
                
                $data['category'] = $cat;
                $data['main'] = 'category';
                $data['navlist'] = $this->MCats->getCategoriesNav();
                $this->load->view('cats', $data);
	}
        
        public function product($id)
	{
	$product = $this->MProducts->getProduct($id);
        
        if(! count($product)){
            redirect('welcome/index','refresh');
        }
        
        $data['grouplist'] = $this->MProducts->getProductsByGroup(3, $product['grouping'],$id);
        $data['product'] = $product;
        $data['title'] = "Welcome to Claudia's Kids :: ".$product['name'];
        $data['sitedescr'] = "products";
        $data['main'] = 'home';
        $data['navlist'] = $this->MCats->getCategoriesNav();
        $data['mainf'] = $this->MProducts->getMainFeature();
        $skip = $data['mainf']['id'];
        $data['sidef'] = $this->MProducts->getRandomProducts(2, $skip);
        $this->load->view('welcome_message', $data);
        
	}
        
        public function subcat()
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