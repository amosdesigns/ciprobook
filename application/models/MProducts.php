<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
* @property CI_DB_active_record $db
* @property CI_DB_forge $dbforge
* @property CI_Config $config
* @property CI_Loader $load
* @property CI_Session $session
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
    
    public function getProductsByGroup($limit,$group,$skip){
        $data = array();
        
        if($limit ===0){
            $limit = 3;
        }
        
        
        $this->db->select("id,name,shortdesc,thumbnail");
        
        $this->db->where('grouping',$group);
        $this->db->where('status','active');
        $this->db->where('id !=',$skip);
        $this->db->order_by("name",'asc');
        $this->db->limit($limit);
        
        $q = $this->db->get('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key){
            $data[] = $key;
            }
        }
        
        $q->free_result();
        return $data;
        
    }
    
    
    public function getProductsByCategory($catid){
        $data = array();
        
        $this->db->select("id,name,shortdesc,thumbnail");
        $this->db->where('category_id',$catid);
        $this->db->where('status','active');
        $this->db->order_by("name",'asc');
        
        $q = $this->db->get('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key){
            $data[] = $key;
            }
        }
        
        $q->free_result();
        return $data;
        
    }
    
    public function getRandomProducts($limit, $skip){
       
         $data = array();
         $temp = array();
         if ($limit === 0){
           $limit = 3;  
         }
        
        $this->db->select("id,name,thumbnail,category_id");
        $this->db->where('id !=',$skip);
        $this->db->where('status','active');
        $this->db->order_by("category_id",'asc');
        $this->db->limit(100);
        
        $q = $this->db->get('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key) {
            $temp[$key['category_id']] = array(
                                            "id" => $key['id'],
                                            "name" => $key['name'],
                                            "thumbnail" => $key['thumbnail']
                                            );
            }
        }
        
        
        shuffle($temp);
        
        if (count($temp)){
           for($i=1; $i <= $limit; $i++) {
                        $data[] = array_shift($temp);  
           }
        }
        
        
        $q->free_result();
        return $data;
        
    }
   
    public function getMainFeature(){
        $data = array();
        $this->db->select("id,name,shortdesc,image");
        $this->db->where('featured','true');
        $this->db->where('status','active');
        $this->db->order_by("rand()");
        $this->db->limit(1);
        
        $q = $this->db->get('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key) {
            $data = array(
                "id" => $key['id'],
                "name" => $key['name'],
                "shortdesc" => $key['shortdesc'],
                "image" => $key['image']
            );
            }
        }
        $q->free_result();
        return $data;
        
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
        
        
        $q = $this->db->get('products');
        
        if ($q->num_rows() > 0){
            foreach ($q->result_array() as $key) {
                $data[] = $key;
            }
            
        }
        $q->free_result();
        return $data;
        
    }
    //eof class - mproducts
    }

?>
