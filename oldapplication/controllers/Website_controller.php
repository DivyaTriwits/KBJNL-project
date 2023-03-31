<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_controller extends CI_Controller {

 //   public function homePage()
	// {
	// 	$this->load->view('website/website_header');
	// 	$this->load->view('website/website_home');
	// 	$this->load->view('website/website_footer');
	// }

	public function webHome(){
		$this->load->view('website/header');
		$this->load->view('website/home');
		$this->load->view('website/footer');

	}
	public function webLoign(){
		$this->load->view('website/header');
		$this->load->view('website/login');
		$this->load->view('website/footer');

	}
	public function register(){
		$this->load->view('website/header');
		$this->load->view('website/register');
		$this->load->view('website/footer');

	}
	public function customerRegistration()
	{
		// $this->load->view('customer/customer_header');
		$data['nursery']=$this->Website_model->getNursery();
		$this->load->view('customer/customer_reg',$data);
		// $this->load->view('customer/customer_footer');
	}
	public function registerCustomer(){
		$this->Website_model->registerCustomer();
	}

	public function customerInfo(){

	}
	
	public function saplings($id,$nurseryId)
	{
		$this->load->view('website/website_header');
		//$data['sapling']=$this->Website_model->getSaplingById($nurseryId);
		$data['variety']=$this->Website_model->getVaritiesById($nurseryId);
		//print_r($data['sapling']);exit;
		$this->load->view('website/sapling_list',$data);
		$this->load->view('website/website_footer');
	}
	public function viewCart($id1,$id2)
	{
		$this->load->view('website/website_header');
		$data['cart']=$this->Website_model->getCart($id1);
		$this->load->view('website/view_cart',$data);
		$this->load->view('website/website_footer');
	}
	public function confirmOrder($id1,$id2)
	{
		$this->Website_model->confirmOrder($id1,$id2);
	}
	public function insertSaplingShop($id){
		$this->Website_model->saplingsOrders($id);
	}
	public function check_adhaar_avalibility(){
		 
		if($this->Website_model->is_adhaar_available($_POST["adhaar"]))  {  
			echo '<label class="text-danger" style="font-size: 15px"><span class="glyphicon glyphicon-remove"></span> Aadhar Number is Already Used</label>';  
		}  
		 
	}
	public function check_servay_avalibility(){
		 
		if($this->Website_model->is_servey_available($_POST["servey"]))  {  
			// print_r('expression');exit;
			echo '<label class="text-danger" style="font-size: 15px"><span class="glyphicon glyphicon-remove"></span> Servey Number is Already Used</label>';  
		}  
		 
	}
	public function getCost(){
        // echo $this->input->post('cart_id');exit;
       // print_r('expression');exit;
    if($this->input->post('size')) {
    	$data = $this->db->select('per_cost')->from('sapling_destils')->where('sapling_id',$this->input->post('saps')) ->where('bag_size',$this->input->post('size'))->get()->row();
            
         echo $data->per_cost;
    }  
}

public function privacyPolicy(){
    	$this->load->view('customer/web_header');
    	$this->load->view('customer/privacy');
    	$this->load->view('customer/web_footer');
}
}?>