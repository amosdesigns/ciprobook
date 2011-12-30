<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MCats
 *
 * @author jeromeamos
 */
class MCats extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
     public function getCatategoryNav(){
        $data = array();
       
        $this->db->where("status","active");
        $q = $this->db->get('categories');
        
        if ($q->num_rows() > 0){
             foreach ($q->result_array() as $key) {
                $data[$key['id']] = $key['name'];
            }
            
        }
        $q->free_result();
        return $data;
        
    }
    
    public function getCatategory($id){
        $data = array();
        $options = array('id'=> $id);
        
        $q = $this->db->get_where('categories', $options,1);
        
        if ($q->num_rows() > 0){
            $data = $q->row_array();
        }
        $q->free_result();
        return $data;
        
    }
    
    
     public function getAllCategories(){
        $data = array();
        
        
        $q = $this->db->get('categories');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key) {
                $data[] = $key;
            }
            
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        $q->free_result();
        return $data;
        
    }
}

?>
