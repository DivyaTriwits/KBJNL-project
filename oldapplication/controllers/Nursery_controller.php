<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nursery_controller extends CI_Controller {

    public function nurseryLogin()
	{
		// $this->load->view('nursery/nursery_header');
		$this->load->view('nursery/nursery_login');
		// $this->load->view('nursery/nursery_footer');
	}
	public function nurseryLoginVerify(){
		$this->Login_model->nurseryLogin();
	}
	public function nurseryChangePsw(){
		$this->Login_model->setnurserypassowrd();
	}
	public function nursery_logout(){
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->session->unset_userdata('nursery_id');
		redirect('login');
	}
   public function nurseryHome()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$this->load->view('nursery/nursery_home');
		$this->load->view('nursery/nursery_footer');
	}
	public function stockStatus()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['stocks']=$this->Nursery_model->getStockSapling();
		$this->load->view('nursery/stock_status',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function orderList()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['acceptOrders']=$this->Nursery_model->getAcceptedOrders();
		$this->load->view('nursery/order_list',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function receivedOrder(){
		$this->Nursery_model->received();
	}
	public function orderDetails($id)
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['order']=$this->Nursery_model->getOrderDetails($id);
		$this->load->view('nursery/order_details',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function acceptRejectOrders()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['orders']=$this->Nursery_model->getOrders();
		$this->load->view('nursery/accept_reject_order',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function pendingOrders()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['pending']=$this->Nursery_model->getOrders();
		$this->load->view('nursery/pending_order',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function deliveredOrders()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['pending']=$this->Nursery_model->getDeliveredOrders();
		$this->load->view('nursery/delivered',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function updateSlot(){
		$this->Nursery_model->updateSlots();
	}
	public function rejectOrder(){
		$this->Nursery_model->rejectOrder();
	}
	public function payment()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['payment']=$this->Nursery_model->getPayment();
		$this->load->view('nursery/payment_collected',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function individualSapling()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['sapling']=$this->Website_model->getSapling();
		$data['individual']=$this->Nursery_model->getIndividualSapling();
		$data['bag']=$this->db->get('bag_size')->result();
		$this->load->view('nursery/individual_spaling',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function deleteIndividualSap(){
		$this->Nursery_model->deleteIndividual();
	}
	public function insertIndividualSap(){
		$this->Nursery_model->individualSapling();
	}
	public function editIndividualSap(){

		$this->Nursery_model->editIndividual();
	}
	public function enterNewStock()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['sapling']=$this->Nursery_model->getSaplings();
		$data['bags']=$this->Admin_model->getBagsize();
		$this->load->view('nursery/enter_new_stock',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function addNewStock(){

		$this->Nursery_model->addNewStock();
	}
	public function openingStock()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['opning']=$this->Nursery_model->openinStock();
		$this->load->view('nursery/opening',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function currentStock()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['product']=$this->Nursery_model->getNurseryProduct();
		//print_r($data['product']);exit;
		$data['nursery']=$this->Admin_model->getNursery();
		
		$this->load->view('nursery/current_opening',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function soldSaplings()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['sales']=$this->Admin_model->saledStock();
		$this->load->view('nursery/sold_sapling',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function reschedule(){
		$this->Nursery_model->rescheduleOrder();
	}
	public function rescheduleOrders()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['reschedule']=$this->Nursery_model->getResceduleOrders();
		$this->load->view('nursery/rescheduled',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function rescheduleRecieved(){
		$this->Nursery_model->receivedResceduled();
	}
	public function cancleOrder(){
	   
		$this->Nursery_model->rejectAcceptedOrder();
	}
	public function uploadHome()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$this->load->view('nursery/upload_page');
		$this->load->view('nursery/nursery_footer');
	}
	public function uploadImages()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['uploads']=$this->Uploads_model->getByNurseryUploads();
		$this->load->view('nursery/upload_images',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function uploadDeliveredImages(){
	   
		$this->Uploads_model->addmultipleimages();
	}
	public function viewNurseryImages($id)
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['images']=$this->Uploads_model->getDeliveredImages($id);
		$this->load->view('nursery/view_images',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function viewAfterPlantImages()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['uploads']=$this->Uploads_model->getByplantNurseryUploads();
		$this->load->view('nursery/after_planting',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function viewOnDeliveryByCustomerImages()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['uploads']=$this->Uploads_model->getByCustomerNurseryUploads();
		$this->load->view('nursery/customer_uploads',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function lossesHome()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$this->load->view('nursery/losses');
		$this->load->view('nursery/nursery_footer');
	}
	public function addLoss()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['saplings']=$this->Nursery_model->getSapling();
		$data['bagsize']=$this->Nursery_model->getBagsize();
		$this->load->view('nursery/add_loss',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function insertLoss(){
	   
		$this->Nursery_model->lossesAdd();
	}
	public function viewLoss()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['losses']=$this->Nursery_model->getLosses();
		$data['saplings']=$this->Nursery_model->getSapling();
		$data['bagsize']=$this->Nursery_model->getBagsize();
		$this->load->view('nursery/view_losses',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function updateLoss(){
	   
		$this->Nursery_model->updateLoss();
	}
    public function deleteLoss(){
	   
		$this->Nursery_model->deleteLoss();
	}
	public function comments($id)
	{
			if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['customer']=$this->Nursery_model->getCustomerComment($id);
		$data['comment']=$this->Nursery_model->getComments($id);
		$this->load->view('nursery/comments',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function addNewNurseryComments(){
	   
		$this->Nursery_model->addNewComment();
	}
	public function addPayment(){
		$this->Nursery_model->insertPayment();
	}
	public function nurseryPayment($id)
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['payment']=$this->Nursery_model->getNurseryPayment($id);
		$this->load->view('nursery/payment',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function editPayment(){
		$this->Nursery_model->updatePayment();
	}
	public function deletePayment(){
		$this->Nursery_model->deletePayment();
	}
	public function nurseryCashRemittance()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['cash']=$this->Nursery_model->getCashRemittance();
		$this->load->view('nursery/cash_remittance',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function insertNurseryCashRemittance(){
		$this->Nursery_model->insertCashRemittance();
	}
	public function updateNurseryCashRemittance(){
		$this->Nursery_model->updateCashRemittance();
	}
	public function deleteNurseryCashRemittance(){
		$this->Nursery_model->deleteCashRemittance();
	}
	public function nurseryMonthlyRepost()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$this->load->view('nursery/monthly_statment');
		$this->load->view('nursery/nursery_footer');
	}
	public function cashNurseryReport()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['cash']=$this->Nursery_model->getmonthlyCash();
		if( $this->input->get('month')!='' AND $this->input->get('from_date')!='' AND $this->input->get('to_date')!='')
		{	
			//print_r($this->input->get('month'));exit;
			$month = $this->input->get('month');
			$fdate=$this->input->get('from_date');
			$tdate=$this->input->get('to_date');
			$data['filterData']=$this->Nursery_model->getFilterCashData($month,$fdate,$tdate);
			
		}
		$this->load->view('nursery/cash_monthly',$data);
		$this->load->view('nursery/nursery_footer');
	}
	public function monthlySapling()
	{
		if(!$this->session->userdata('nursery_id'))
			redirect('login');
		$this->load->view('nursery/nursery_header');
		$data['saplings']=$this->Nursery_model->getMonthlySapling();
		if( $this->input->get('month')!='' AND $this->input->get('from_date')!='' AND $this->input->get('to_date')!='')
		{	
			//print_r($this->input->get('month'));exit;
			$month = $this->input->get('month');
			$fdate=$this->input->get('from_date');
			$tdate=$this->input->get('to_date');
			$data['filterData']=$this->Nursery_model->getSaplingsFilterData($month,$fdate,$tdate);
			
		}
		$this->load->view('nursery/monthly_saplings',$data);
		$this->load->view('nursery/nursery_footer');
	}
}?>