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
 * Description of MCats
 *
 * @author jeromeamos
 */
class MCats extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
     public function getSubCategories($catid){
            $data = array();
            $this->db->where("status","active");
            $this->db->where("parentid ",$catid);
            $this->db->order_by('name', 'asc');
            $q = $this->db->get('categories');

            if ($q->num_rows() > 0){
                foreach ($q->result_array() as $key) {
                    $q2 = $this->db->query("select thumbnail as src from products where category_id =".$key['id']."order by rand90 limit 1");
                    if($q2->num_rows() > 0){
                        $thumb = $q2->row_array();
                        $THUMB = $thumb['src'];
                    }else {
                        $THUMB ="";
                    }
                    $q2->free_result();
                    
                    $data[] = array(
                        'id' => $key['id'],
                        'name' => $key['name'],
                        'shortdesc' => $key['shortdesc'],
                        'thumbnail' => $THUMB
                        );
                }

            }
            
            $q->free_result();
            return $data;
        }

     public function getCategoriesNav(){
        $data = array();
       
        $this->db->where("status","active");
        $this->db->where("parentid <",1);
        $this->db->order_by('name', 'asc');
        $q = $this->db->get('categories');
        
        if ($q->num_rows() > 0){
             foreach ($q->result_array() as $key) {
                $data[$key['id']] = $key['name'];
            }
            
        }
        $q->free_result();
        return $data;
        
    }
    
    public function getCategory($id){
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
