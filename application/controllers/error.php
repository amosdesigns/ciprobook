<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of error
 *
 * @author jeromeamos
 */
class error extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        
    }


    //404 errors
    public function index(){
        $this->load->view('404');
    }
            
}

?>
