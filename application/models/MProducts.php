<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MProducts
 *
 * @author jeromeamos
 */
class MProducts extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getProduct($id){
        $data = array();
        $options = array('id'=> $id);
        
        $q = $this->db->get_where('products', $options,1);
        
        if ($q->num_rows() > 0){
            $data = $q->row_array();
        }
        $q->free_result();
        return $data;
        
    }
    
    
     public function getAllProducts(){
        $data = array();
        
        
        $q = $this->db->ge('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key) {
                $data[] = $key;
            }
            
        }
        $q->free_result();
        return $data;
        
    }
    //eof class -mproducts
    }

?>
