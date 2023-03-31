<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_sales extends CI_Controller {

	public function addLocalSales()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['variety']=$this->Local_sale_model->getVariety();
		$data['sapling']=$this->Local_sale_model->getSaplings();
		$data['bag']=$this->Local_sale_model->getBagSzie();
		$this->load->view('admin/local_sales',$data);
		$this->load->view('admin/footer');
	}
	public function insertLocalSales(){
		$this->Local_sale_model->insertLocalSale();
	}
	public function viewLocalSales()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['variety']=$this->Local_sale_model->getVariety();
		$data['sapling']=$this->Local_sale_model->getSaplings();
		$data['bag']=$this->Local_sale_model->getBagSzie();
		$data['localsale']=$this->Local_sale_model->getLocalSales();
		$this->load->view('admin/view_local_sales',$data);
		$this->load->view('admin/footer');
	}
	public function viewSaplingsLocalSales($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['variety']=$this->Local_sale_model->getVariety();
		$data['sapling']=$this->Local_sale_model->getSaplings();
		$data['bag']=$this->Local_sale_model->getBagSzie();
		$data['localsalesaplings']=$this->Local_sale_model->getSaplingsLocalSale($id);
		$this->load->view('admin/local_sales_saplings',$data);
		$this->load->view('admin/footer');
	}
	public function updateLocalSalesSaplings($id){
		$this->Local_sale_model->editLocalSaleSapling($id);
	}
	public function deleteLocalSalesSaplings($id){
		$this->Local_sale_model->deleteLocalSaleSapling($id);
	}
	
	public function edit_local_sales(){
		$this->Local_sale_model->editlocal($id);
	}
	public function delete_local_sales(){
		$this->Local_sale_model->deleteLocal($id);
	}
}?>