<?php 
class product_model extends CI_Model { 
    function __construct() { 
        parent::__construct(); 
    } 
    //get job positions from the db 
    public function get_product() { 
        $result = $this->db->select('id, title')->get('product')->result_object(); 
         //$query = $this->db->query("SELECT id,title  FROM product");

            return  $result;

	    
    }

    public function get_product_list() { 
        $result = $this->db->select('*')->get('product')->result_object(); 
         //$query = $this->db->query("SELECT id,title  FROM product");

            return  $result;   
    }

    function save_product($id,$qty){
        /*
        $data = array(              
                'title' => $this->input->post('title'), 
                'qty'   => $this->input->post('qty'), 
                
            );
        $result=$this->db->insert('product',$data);
*/
        $data=array("qty"=>$qty);
        $this->db->where("id",$id);
        $this->db->update("product",$data); 
        
        //return $result();
    }

    function getAll()
    {
        $result = $this->db->select('*')->get('product')->result_object(); 
        return  $result;   
    }

}