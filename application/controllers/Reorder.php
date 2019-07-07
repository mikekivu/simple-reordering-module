<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {


	function __construct(){
		parent::__construct();
		//$this->load->model('EmpModel');
		//$this->load->helper('url');
		 $this->load->model('reorder_model'); 
		 $this->load->helper('url');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		//print_r($data['product']);exit();
		$this->load->view('reorder',$data);
	}

	public function save()
	{
		
		$id =$this->input->post('id');
        $qty = $this->input->post('qty');
        /*
		$data = array(              
                'id' => $this->input->post('id'), 
                'qty'   => $this->input->post('qty'), 
                
            );
		*/
		$result = $this->product_model->save_product($id,$qty); 
		echo json_encode($result);
		//print_r($data['product']);exit();
		//$this->load->view('product');
	}
	public function get()
	{
		$result = $this->product_model->getAll(); 
		//echo json_encode($result);
		echo json_encode($result);
		
	}
}
