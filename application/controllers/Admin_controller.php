<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

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
	public function adminDashboard()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/home');
		$this->load->view('admin/footer');
	}
	public function saplingsHome()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/saplings');
		$this->load->view('admin/footer');
	}
	public function nurseryHome()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/nursery_page');
		$this->load->view('admin/footer');
	}
	public function stockHome()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/stock_page');
		$this->load->view('admin/footer');
	}
	public function orderHome()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/orders_page');
		$this->load->view('admin/footer');
	}
	public function localSaleHome()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/local_sale_page');
		$this->load->view('admin/footer');
	}
	public function bagSize()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['bags']=$this->Admin_model->getBagsize();
		$this->load->view('admin/bag_size',$data);
		$this->load->view('admin/footer');
	}
		public function accounts()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/account');
		$this->load->view('admin/footer');
	}
	public function insertBagsize(){

		$this->Admin_model->insertBagsize();
	}
	public function editBagsize(){

		$this->Admin_model->bagsizeEdit();
	}
	public function deleteBagsize(){

		$this->Admin_model->deleteBagsize();
	}
	public function varieties()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['varieties']=$this->Admin_model->getVarieties();
		$this->load->view('admin/varieties',$data);
		$this->load->view('admin/footer');
	}
	public function varietiesTypes()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['varieties']=$this->Admin_model->getVarieties();
		$this->load->view('admin/variety_types',$data);
		$this->load->view('admin/footer');
	}
	public function insertVarities(){

		$this->Admin_model->varietyInsert();
	}
	public function editVarities(){
		$this->Admin_model->varietyEdit();
	}
	public function deleteVarities(){
		$this->Admin_model->deleteVariety();
	}
	public function insertVaritiesTypes(){
		$this->Admin_model->varietyTypeInsert();
	}
    public function uploadFile(){
		$this->Bulkupload_model->uploadSapling();
	}
	public function addSaplings()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['varieties']=$this->Admin_model->getVarieties();
		$data['bags']=$this->Admin_model->getBagsize();
		$this->load->view('admin/add_saplings',$data);
		$this->load->view('admin/footer');
	}
	public function insertSapling(){
		$this->Admin_model->saplingInsert();
	}
	public function viewSaplings()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getSaplings();
		$this->load->view('admin/view_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function viewSaplingsDetails($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getSaplingDetails($id);
		$data['bagsDetails']=$this->Admin_model->getSaplinBags($id);
		$data['bags']=$this->Admin_model->getBagsize();
		$this->load->view('admin/sapling_details',$data);
		$this->load->view('admin/footer');
	}
	public function editSaplingDetails($id){
		$this->Admin_model->editSaplingDetails($id);
	}
	public function insertBasDetails(){
		
		$this->Admin_model->insertNewBags();
	}
	public function deleteSapling(){
		$this->Admin_model->deleteSapling();
	}
	// public function viewSaplingsDetails($id)
	// {
	// 	if(!$this->session->userdata('admin_id'))
	// 		redirect('login');
	// 	$this->load->view('admin/header');
	// 	$data['saplings']=$this->Admin_model->getSaplingDetails($id);
	// 	$this->load->view('admin/sapling_details',$data);
	// 	$this->load->view('admin/footer');
	// }
	// public function editSaplingDetails($id){
	// 	$this->Admin_model->editSaplingDetails($id);
	// }
	public function nursery()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getSaplings();
		$data['varieties']=$this->Admin_model->getVarieties();
		$this->load->view('admin/nursery',$data);
		$this->load->view('admin/footer');
	}
	public function addNursery(){
		$this->Admin_model->insertNursery();
	}
	public function viewNursery()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['nursery']=$this->Admin_model->getNursery();
		$data['varieties']=$this->Admin_model->getVarieties();
		$this->load->view('admin/view_nursery',$data);
		$this->load->view('admin/footer');
	}
	public function editNursery(){
		$this->Admin_model->editNursery();
	}
	public function deleteNursery(){
		$this->Admin_model->deleteNursery();
	}
	public function viewNurseryOfficer($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['officer']=$this->Admin_model->getNurseryOfficers($id);
		$data['varieties']=$this->Admin_model->getVarieties();
		$this->load->view('admin/nursery_officer',$data);
		$this->load->view('admin/footer');
	}
	public function editOfficer($id){
		$this->Admin_model->editOfficer($id);
	}
	public function deleteOfficer($id){
		$this->Admin_model->deleteOfficer($id);
	}
	public function uploadStock(){
		$this->Bulkupload_model->uploadStock();
	}
	public function addStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['nursery']=$this->Admin_model->getNursery();
		$data['saplings']=$this->Admin_model->getSaplings();
		$sapid=$this->input->get('sapling');
		$data['bags']=$this->Admin_model->getSaplinBags($sapid);
		//print_r($data['bags']);exit;
		$this->load->view('admin/stock',$data);
		$this->load->view('admin/footer');
	}
	public function insertStock(){
		$this->Admin_model->insertStocks();
	}
	public function viewallStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getOverallStock();
		$this->load->view('admin/allstock',$data);
		$this->load->view('admin/footer');
	}
	public function openingStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['opning']=$this->Admin_model->openinStock();
		$data['nursery']=$this->Admin_model->getNursery();
		if($this->input->get('nursery')){
         	$getIds =$this->input->get('nursery');
         	$data['digitalId']=$this->Admin_model->openinStockById($getIds);
         	//print_r($getDigital);exit;
         }
		$this->load->view('admin/opening',$data);
		$this->load->view('admin/footer');
	}
	public function currentStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['product']=$this->Admin_model->getProduct();
		//print_r($data['product']);exit;
		$data['nursery']=$this->Admin_model->getNursery();
		if($this->input->get('nursery')){
         	$getIds =$this->input->get('nursery');
         	$data['digitalId']=$this->Admin_model->openinStockById($getIds);
         	//print_r($getDigital);exit;
         	
         
         }
		$this->load->view('admin/current_stock',$data);
		$this->load->view('admin/footer');
	}
	public function viewStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['stocks']=$this->Admin_model->getStocks();
		$data['saplings']=$this->Admin_model->getSaplings();
		$this->load->view('admin/view_stock',$data);
		$this->load->view('admin/footer');
	}
	public function viewStockSaplings($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getStockSapling($id);
		
		$this->load->view('admin/stock_sapling_details',$data);
		$this->load->view('admin/footer');
	}
	public function orders()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		
		$data['shop']=$this->Admin_model->getOrders();
		$this->load->view('admin/order',$data);
		$this->load->view('admin/footer');
	}
	public function customerDetails($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['customer']=$this->Admin_model->getCustomerDetails($id);
		$this->load->view('admin/customer_details',$data);
		$this->load->view('admin/footer');
	}
	public function allOrders()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['orders']=$this->Admin_model->getAllOrders();
		$this->load->view('admin/all_orders',$data);
		$this->load->view('admin/footer');
	}
	public function updateSlot(){
		$this->Admin_model->updateSlots();
	}
	public function rejectOrder(){
		$this->Admin_model->rejectOrder();
	}
	public function ordersDetails($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		
		$data['order'] = $this->Admin_model->getOrdersDetails($id);
		$this->load->view('admin/view_order_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function individualSapling()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['individual']=$this->Admin_model->individualSapling();
		
		$this->load->view('admin/individual_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function nurseryIndividualSapling()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['individual']=$this->Admin_model->individualSapling();
		
		$this->load->view('admin/nursery_individual_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function adminLogin()
	{
		$this->load->view('admin/admin_login');	
	}
	public function loginVerify(){
		$this->Login_model->adminLogin();
	}
	public function admin_logout(){
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->session->unset_userdata('admin_id');
		redirect('login');
	}
	public function changePsw(){
		$this->Login_model->setnewpassowrd();
	}
	
	public function exportSaplingsForStock(){
		// print_r('expression');exit;
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$file_name = 'kbjnl_saplings_list_for_stock'.date('Ymdhis').'.csv'; 
		header('Content-Description: File Transfer');
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename='.$file_name);
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		$CSVdata = $this->Admin_model->getSaplingsListToUpdateStock();
		$CSVdata= $CSVdata->result_array();
		$file = fopen('php://output', 'w');
		$header = array('Sapling Id','Variety','Sapling Name','Bag Size','Quantity To Add','Maximum Qty to Buy');
		fputcsv($file, $header);
		foreach ($CSVdata as $key => $value)
		{ 
			fputcsv($file,$value);
		}
		fclose($file);    
	}
	public function saledSaplings()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['sales']=$this->Admin_model->saledStock();
		$this->load->view('admin/saled_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function pendingAllOrders()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['pending']=$this->Admin_model->getPendinOrders();
		$this->load->view('admin/pending',$data);
		$this->load->view('admin/footer');
	}
	public function deliveredAllOrders()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['delivered']=$this->Admin_model->getDeliveredOrders();
		$this->load->view('admin/delivered',$data);
		$this->load->view('admin/footer');
	}
	public function reservationStock()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['reservation']=$this->Admin_model->getReservation();
		$data['nursery']=$this->Admin_model->getNursery();
		$data['saplings']=$this->Admin_model->getSaplingReservation();
		$data['bags']=$this->Admin_model->getbags();
		$this->load->view('admin/reservation',$data);
		$this->load->view('admin/footer');
	}
	public function insertReservation(){
		$this->Admin_model->insertReservation();
	}
	public function soldReservation(){
		$this->Admin_model->soldReservation();
	}
	public function backReservation(){
		$this->Admin_model->backReservation();
	}
	public function orderRescheduled(){
		$this->Admin_model->reschedule();
	}
	public function receivedOrders(){
		$this->Admin_model->receivedOrders();
	}
	public function rescheduleOrders()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['reschedule']=$this->Admin_model->getResceduleOrders();
		$this->load->view('admin/reschedule',$data);
		$this->load->view('admin/footer');
	}
	public function orderReceived(){
		$this->Admin_model->received();
	}
	public function orderRescheduleReceived(){
		$this->Admin_model->receivedResceduled();
	}
	public function revenueGenerated()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['revenue']=$this->Admin_model->revenueGererated();
		$data['nursery']=$this->Admin_model->getNursery();
		if($this->input->get('nursery')){
         	$getIds =$this->input->get('nursery');
         	$data['digitalId']=$this->Admin_model->revenueGereratedByID($getIds);
         	//print_r($getDigital);exit;
         	
         
         }
		$this->load->view('admin/revenue_generated',$data);
		$this->load->view('admin/footer');
	}
	public function cancleOrder(){
	   
		$this->Admin_model->rejectAcceptedOrder();
	}
	public function addPayment(){
		$this->Admin_model->insertPayment();
	}
	public function payment($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['payment']=$this->Admin_model->getPayment($id);
		$this->load->view('admin/payment',$data);
		$this->load->view('admin/footer');
	}
	public function editPayment(){
		$this->Admin_model->updatePayment();
	}
	public function deletePayment(){
		$this->Admin_model->deletePayment();
	}
	public function allPayment()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['payment']=$this->Admin_model->getAllPayment();
		$this->load->view('admin/all_payments',$data);
		$this->load->view('admin/footer');
	}
	public function vehicle()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['vehicle']=$this->Admin_model->getVehicle();
		$this->load->view('admin/vehicle',$data);
		$this->load->view('admin/footer');
	}
	public function insertVehicle(){
		$this->Admin_model->insertVehicle();
	}
	public function updateVehicle(){
		$this->Admin_model->updateVehicle();
	}
	public function deleteVehicle(){
		$this->Admin_model->deleteVehicle();
	}
	public function cashRemittance()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['cash']=$this->Admin_model->getCashRemittance();
		$this->load->view('admin/cash_remittance',$data);
		$this->load->view('admin/footer');
	}
	public function insertcashRemittance(){
		$this->Admin_model->insertCashRemittance();
	}
	public function updatecashRemittance(){
		$this->Admin_model->updateCashRemittance();
	}
	public function deletecashRemittance(){
		$this->Admin_model->deleteCashRemittance();
	}
	public function monthlyStatement()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$this->load->view('admin/monthly_statement');
		$this->load->view('admin/footer');
	}
	public function cashReport()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['cash']=$this->Admin_model->getmonthlyCash();
		if( $this->input->get('month')!='' AND $this->input->get('from_date')!='' AND $this->input->get('to_date')!='')
		{	
			//print_r($this->input->get('month'));exit;
			$month = $this->input->get('month');
			$fdate=$this->input->get('from_date');
			$tdate=$this->input->get('to_date');
			$data['filterData']=$this->Admin_model->getFilterCashData($month,$fdate,$tdate);
			
		}
		$this->load->view('admin/cash_report',$data);
		$this->load->view('admin/footer');
	}
	public function saplingReport()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['saplings']=$this->Admin_model->getMonthlySapling();
		if( $this->input->get('month')!='' AND $this->input->get('from_date')!='' AND $this->input->get('to_date')!='')
		{	
			//print_r($this->input->get('month'));exit;
			$month = $this->input->get('month');
			$fdate=$this->input->get('from_date');
			$tdate=$this->input->get('to_date');
			$data['filterData']=$this->Admin_model->getSaplingsFilterData($month,$fdate,$tdate);
			
		}
		$this->load->view('admin/sapling_report',$data);
		$this->load->view('admin/footer');
	}
	public function incomecashReport()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['cash']=$this->Admin_model->getmonthlyIncome();
		if( $this->input->get('month')!='' AND $this->input->get('from_date')!='' AND $this->input->get('to_date')!='')
		{	
			//print_r($this->input->get('month'));exit;
			$month = $this->input->get('month');
			$fdate=$this->input->get('from_date');
			$tdate=$this->input->get('to_date');
			$data['filterData']=$this->Admin_model->getByIdMonthlyIncome($month,$fdate,$tdate);
			
		}
		$this->load->view('admin/income_report',$data);
		$this->load->view('admin/footer');
	}
	public function beneficiaries()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['beneficiaries']=$this->Admin_model->getBeneficiaries();
		if($this->input->get('aadhaar')) {

			$id=$this->input->get('aadhaar');
	    $data['idBeneficiaries']=$this->Admin_model->getByIdBeneficiaries($id);
	   // print_r($id);exit;
		}
		$this->load->view('admin/beneficiaries',$data);
		$this->load->view('admin/footer');
	}
	public function uploadsComments()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['uploads']=$this->Uploads_model->getCustomerDeliverUploads();
		$this->load->view('admin/uploads_comments');
		$this->load->view('admin/footer');
	}
	public function customerUpload()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['uploads']=$this->Uploads_model->getCustomerDeliverUploads();
		$this->load->view('admin/upload_delivered',$data);
		$this->load->view('admin/footer');
	}
	public function viewImages($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['images']=$this->Uploads_model->getDeliveredImages($id);
		$this->load->view('admin/view_images',$data);
		$this->load->view('admin/footer');
	}
	public function nurseryUpload()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['uploads']=$this->Uploads_model->getNurseryDeliverUploads();
		$this->load->view('admin/upload_delivered',$data);
		$this->load->view('admin/footer');
	}
	public function afterPlanting()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['uploads']=$this->Uploads_model->getafterPlantingploads();
		$this->load->view('admin/after_planting',$data);
		$this->load->view('admin/footer');
	}
	public function yieldBenifit()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['uploads']=$this->Uploads_model->getYielBenefitUploads();
		$this->load->view('admin/yield_benefit',$data);
		$this->load->view('admin/footer');
	}
	public function viewLoss()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['loss']=$this->Admin_model->getLosses();
		$this->load->view('admin/losses',$data);
		$this->load->view('admin/footer');
	}
	public function viewLossDetails($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['loss']=$this->Admin_model->getDetailsLosses($id);
		$this->load->view('admin/loss_details',$data);
		$this->load->view('admin/footer');
	}
	public function seedlingReserve()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		 $data['variety']=$this->Local_sale_model->getVariety();
		$data['sapling']=$this->Local_sale_model->getSaplings();
		$data['bag']=$this->Local_sale_model->getBagSzie();
		$this->load->view('admin/seadling_reserve',$data);
		$this->load->view('admin/footer');
	}
	public function insertSeadlingReserve(){
		$this->Admin_model->insertSeadlingReserve();
	}
	public function viewSeedlingReserve()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['reserve']=$this->Admin_model->getReserveSeadling();
		$this->load->view('admin/view_reserve',$data);
		$this->load->view('admin/footer');
	}
	public function editSeadlingReserve(){
		$this->Admin_model->editSeadlingReserve();
	}
	public function deleteSeadlingReserve(){
		$this->Admin_model->deleteSeadlingReserve();
	}
	public function certificate($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['reserve']=$this->Admin_model->getByIdReserveSeadling($id);
		$data['sapling']=$this->Admin_model->getByIdReserveSapling($id);
		$this->load->view('admin/certificate',$data);
		$this->load->view('admin/footer');
	}
	public function reserveSaplings($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['variety']=$this->Local_sale_model->getVariety();
		$data['sapling']=$this->Local_sale_model->getSaplings();
		$data['bag']=$this->Local_sale_model->getBagSzie();
		$data['sapling']=$this->Admin_model->getByIdReserveSapling($id);
		$this->load->view('admin/reserve_sapling',$data);
		$this->load->view('admin/footer');
	}
	public function editReserveSapling($id){
		$this->Admin_model->editReserveSapling($id);
	}
	public function deleteReserveSapling($id){
		$this->Admin_model->deleteReserveSapling($id);
	}
	public function addComment(){
		$this->Admin_model->addComment();
	}
	public function addAfterComment(){
		$this->Admin_model->addAfterComment();
	}
	public function addBenefitComment(){
		$this->Admin_model->addBenefitComment();
	}
	public function comments($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		$data['customer']=$this->Admin_model->getCustomerComment($id);
		$data['comment']=$this->Admin_model->getComments($id);
		$this->load->view('admin/comments',$data);
		$this->load->view('admin/footer');
	}
	public function invoice($id)
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$data['order'] = $this->Admin_model->getOrdersDetails($id);
		$data['customer']=$this->Admin_model->getCustomerDetails($id);
		$this->load->view('admin/invoice',$data);
		
	}
		public function registerCustomer()
	{
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		 $data['customer']=$this->Admin_model->getCustomer();
		$this->load->view('admin/register_customer',$data);
		$this->load->view('admin/footer');
	} 
	public function displayMap($id){
		if(!$this->session->userdata('admin_id'))
			redirect('login');
		$this->load->view('admin/header');
		 $data['detailsMore']=$this->Admin_model->getMoreDetails($id);
		 $data['locations']=$this->Admin_model->getLocation($id);
		$this->load->view('admin/display-map',$data);
		$this->load->view('admin/footer');
	}
}?>
