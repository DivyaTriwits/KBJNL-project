<?php

class Admin_model extends CI_Model {
    
    public function generateRandomString($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}
	public function insertBagsize()
	 {
	 	if($this->input->post('bag')){
	 		$bagId = $this->generateRandomString(18);
	 		$bagData = array(
	 			'bag_id'=>$bagId,
	 			'bagsize'=>$this->input->post('bag'),
	 			'price'=>$this->input->post('cost'),
	 		);
	 		$this->db->insert('bag_size',$bagData);
	 		$this->session->set_flashdata('success', 'Bag size added successfully');
          redirect('bag-sizes');
	 	}
	 }
	 public function getBagsize(){
	 	// return $this->db->get('bag_size')->result();
	 	$this->db->select('*')->from('bag_size');
	 	$data = $this->db->get()->result();
	 	//print_r($data);exit;
	 	return $data;
	 }
	 public function getSaplinBags($id){
	 	// return $this->db->get('bag_size')->result();
	 	$this->db->select('bag_size.*,sapling_destils.*')->from('sapling_destils')->join('bag_size','bag_size.bag_id=sapling_destils.bag_size_id')->where('sapling_destils.sapling_id',$id);
	 	$data = $this->db->get()->result();
	 	//print_r($data);exit;
	 	return $data;
	 }
    public function bagsizeEdit()
	 {
	 	if($this->input->post('id')){
	 		$editData = array(
	 			'bagsize'=>$this->input->post('ebag'),
	 			'price'=>$this->input->post('ecost'),
	 		);
	 		$this->db->where('id',$this->input->post('id'));
	 		$this->db->update('bag_size',$editData);
	 		$this->session->set_flashdata('success', 'Bag size updated successfully');
          redirect('bag-sizes');
	 	}
	 }
	  public function deleteBagsize()
	 {
	 	if($this->input->post('did')){
	 		$this->db->where('id',$this->input->post('did'));
	 		$this->db->delete('bag_size');
	 		$this->session->set_flashdata('success', 'Bag size deleted successfully');
          redirect('bag-sizes');
	 	}
	 }

	public function varietyInsert()
	 {
	 	if($this->input->post('variety')){
	 		$varietyId = $this->generateRandomString(18);
	 		$varietyData = array(
	 			'variety_id'=>$varietyId,
	 			'variety'=>$this->input->post('variety')
	 		);
	 		$this->db->insert('varieties',$varietyData);
	 		$this->session->set_flashdata('success', 'variety added successfully');
          redirect('varieties');
	 	}
	 }

	 public function getVarieties(){
	 	return $this->db->get('varieties')->result();
	 }

	 public function varietyEdit()
	 {
	 	if($this->input->post('id')){
	 		$editData = array(
	 			'variety'=>$this->input->post('evariety')
	 		);
	 		$this->db->where('id',$this->input->post('id'));
	 		$this->db->update('varieties',$editData);
	 		$this->session->set_flashdata('success', 'variety updated successfully');
          redirect('varieties');
	 	}
	 }
	 public function deleteVariety()
	 {
	 	if($this->input->post('did')){
	 		$this->db->where('id',$this->input->post('did'));
	 		$this->db->delete('varieties');
	 		$this->session->set_flashdata('success', 'variety deleted successfully');
          redirect('varieties');
	 	}
	 }


	public function saplingInsert()
	 {
	 	if($this->input->post('sapling')){
    		$saplingID = $this->generateRandomString(18);
    		$bags=$this->input->post('bags');
    		// print_r($saplingID);exit;
    		$data = array(
              'saplingid'=>$saplingID,
              'sapling'=>$this->input->post('sapling'),
              'varityid'=>$this->input->post('variety'), 
    		);
    		$this->db->insert('saplings',$data);
    		foreach ($bags as $key => $value) {
					if($value == ''){
						continue;
					}
					$edata['sapling_id'] = $saplingID;
					$edata['bag_size_id'] = $value;
					$this->db->insert('sapling_destils',$edata);
				}
				$this->session->set_flashdata('success', 'Sapling added successfully');
          redirect('add-saplings');
    	}
	 }

	 public function getSaplings(){
	 	$this->db->select('saplings.*,varieties.variety_id,varieties.variety')
	 	->from('saplings')
	 	->join('varieties','varieties.variety_id=saplings.varityid');
	 	$data = $this->db->get()->result();
	 	return $data;

	 }

	

	public function editSapling()
	 {
	 	if($this->input->post('variety')){
	 		
    			$array = array(
    				'sapling'=>$this->input->post('sapling'),
	 			'description'=>$this->input->post('description'),
	 			'varityid'=>$this->input->post('variety'),
    			);
    		
	 		$this->session->set_userdata($array);
    		$this->db->where('id', $this->input->post('id'));
    		$this->db->update('saplings',$array);
	 		$this->session->set_flashdata('success', 'sapling updated successfully');
          redirect('view-saplings');
	 	}
	 }
      
	 public function deleteSapling()
	 {
	 	if($this->input->post('did')){
	 		$this->db->where('saplingid',$this->input->post('did'));
	 		$this->db->delete('saplings');
	 		$this->db->where('sapling_id',$this->input->post('did'));
	 		$this->db->delete('sapling_destils');
	 		$this->session->set_flashdata('success', 'sapling deleted successfully');
          redirect('view-saplings');
	 	}
	 }
    public function getSaplingDetails($id){
    	return $this->db->where('sapling_id',$id)->get('sapling_destils')->result();
    }
    public function editSaplingDetails($id)
	 {
	 	if($this->input->post('id')){
	 		
    			$array = array(
    				'bag_size'=>$this->input->post('bag'),
	 			'per_cost'=>$this->input->post('cost'),
    			);
    		
	 		$this->session->set_userdata($array);
    		$this->db->where('id', $this->input->post('id'));
    		$this->db->update('sapling_destils',$array);
	 		$this->session->set_flashdata('success', 'sapling details updated successfully');
          redirect('sapling-details/'.$id);
	 	}
	 }

    public function insertNursery(){
    	if($this->input->post('name')){
    		$nurseryID = $this->generateRandomString(18);
    		$officerName = $this->input->post('officer');
    		$mobileNo=$this->input->post('mobile');
    		$data = array(
              'nursery_id'=>$nurseryID,
              'nursery_name'=>$this->input->post('name'),
              'location'=>$this->input->post('location'),
              'userid'=>$this->input->post('userid'),
              'password'=>$this->input->post('password')
    		);
    		$this->db->insert('nursery',$data);
    		foreach ($officerName as $key => $value) {
					if($value == ''){
						continue;
					}
					$edata['nurseryid'] = $nurseryID;
					$edata['officer_name'] = $value;
					$edata['mobile'] = $mobileNo[$key];
					
					$this->db->insert('nursery_officers',$edata);
					
				}
				$this->session->set_flashdata('success', 'Nursery added successfully');
          redirect('nursery');
    	}
    }
    public function getNursery(){
    	return $this->db->where('status',1)->get('nursery')->result();
    }
    

    public function editNursery()
	 {
	 	if($this->input->post('id')){
	 		$editData = array(
	 			 'nursery_name'=>$this->input->post('name'),
              'location'=>$this->input->post('location'),
              'userid'=>$this->input->post('userid'),
              'password'=>$this->input->post('password'),
	 		);
	 		$this->db->where('id',$this->input->post('id'));
	 		$this->db->update('nursery',$editData);
          $this->session->set_flashdata('success', 'Nursery updated successfully');
          redirect('view-nursery');
	 	}
	 }

	 public function deleteNursery()
	 {
	 	if($this->input->post('did')){
	 		$this->db->where('nursery_id',$this->input->post('did'))->set('status',0)->update('nursery');
	 		$this->session->set_flashdata('success', 'Nursery delete successfully');
          redirect('view-nursery');
	 	}
	 }
	  public function getNurseryOfficers($id){
	  	return $this->db->where('nurseryid',$id)->get('nursery_officers')->result();
	  }

	 public function editOfficer($id)
	 {
	 	if($this->input->post('id')){
	 		$editData = array(
	 			 'officer_name'=>$this->input->post('officer'),
              'mobile'=>$this->input->post('mobile')
	 		);
	 		$this->db->where('id',$this->input->post('id'));
	 		$this->db->update('nursery_officers',$editData);
          $this->session->set_flashdata('success', 'Updated successfully');
          redirect('nursery-officer/'.$id);
	 	}
	 }
	 public function deleteOfficer($id)
	 {
	 	if($this->input->post('did')){
	 		$this->db->where('id',$this->input->post('did'));
	 		$this->db->delete('nursery_officers');
           redirect('nursery-officer/'.$id);
	 	}
	 }

	 public function insertStocks(){
    	if($this->input->post('name')){
    		//print_r($this->input->post());exit;
    		$productId = $this->generateRandomString(18);
    		$sapling = $this->input->post('saplings');
    		$bag=$this->input->post('bag');
    		//print_r($bag);exit;
    		$qtys=$this->input->post('qty');
    		$buy=$this->input->post('buy');
    		$SpalingStock = $this->db->where('saplingid',$sapling)->get('saplings')->row();

    		foreach ($bag as $key => $value) {
    			$inwardQty = 0;
    			$openingStock = $qtys[$key];
    			$closingStock = $qtys[$key];
    			$buyMax=$buy[$key];
    			    			$proId=$this->generateRandomString(18);;
    			$oldStock = $this->db->where('nursery_id',$this->input->post('name'))->where('sapling_id',$sapling)->where('bag_id',$value)->get('sapling_stock');
    			if($oldStock->num_rows() > 0){
    				$inwardQty = $qtys[$key];
    				$openingStock = $oldStock->row()->closing_stock;
    				$closingStock = $inwardQty + $openingStock;

    				$proId=$oldStock->row()->product_id;

    			}
    			// print_r($oldStock);exit;
					if($value == ''){
						continue;
					}
					$edata['nursery_id']=$this->input->post('name');
					$edata['product_id']=$proId;
					$edata['sapling_id'] = $sapling;
					$edata['bag_id'] = $value;
					$edata['opening_stock'] = $openingStock;
					$edata['inward_quantity'] = $inwardQty;
					$edata['date'] = date('Y-m-d');
					$edata['closing_stock']= $closingStock;
					$edata['variety_id']=$SpalingStock->varityid;
					$edata['max_qty_buy']=$buyMax;
                //print_r($edata);exit;
				if($qtys[$key] > 0 ){
					$this->db->insert('sapling_stock',$edata);
				}
				
				
				//print_r($total);exit;
				$this->session->set_flashdata('success', 'Stock added successfully');
				}
          redirect('stock-add');
    	}
    }

    public function getStocks(){
    $this->db->distinct();
    $this->db->select('nursery_id')
    ->from('sapling_stock');
    $data=$this->db->get()->result();
    return $data;
    }
    public function getStockSapling($id){
    	$this->db->select('sapling_stock.*,saplings.*,bag_size.*')
    	->from('sapling_stock')
    	->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
    	->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')	
    	->where('nursery_id',$id)
    	->order_by('sapling_stock.id','DESC');
    	$data = $this->db->get()->result();
    	//print_r($data);exit;
    	return $data;
    }

    public function getOrders(){
    	$this->db->select('shop.*,nursery.*')
    	->from('shop')
    	->join('nursery','shop.nursery=nursery.nursery_id')
    	->where('shop.order_status',1);
    	$data = $this->db->get()->result();
    	return $data;
    	}
    public function individualSapling(){
    	$this->db->select('individual_spaling.*,saplings.*,nursery.*,bag_size.*')
    	->from('individual_spaling')
    	->join('saplings','saplings.saplingid=individual_spaling.sapling_id')
    	->join('bag_size','bag_size.bag_id=individual_spaling.bag_size')
    	->join('nursery','nursery.nursery_id=individual_spaling.nursery');
    	$data = $this->db->get()->result();
    	return $data;
    }
    public function getAllOrders(){
		
		$this->db->select('orders.*,customers.*,nursery.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		 ->join('nursery','nursery.nursery_id=orders.nursery_id')
		 ->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	
	}
	public function getOrdersDetails($id)
	{
		$this->db->select('ordered_saplings.*,saplings.*,bag_size.*')
		->from('ordered_saplings')
		 //->join('sapling_stock','sapling_stock.product_id=ordered_saplings.product_id')
		->join('saplings','saplings.saplingid=ordered_saplings.sapling_id')
		 ->join('bag_size','bag_size.bag_id=ordered_saplings.bag_id')
		->where('ordered_saplings.order_id',$id);
		$data=$this->db->get()->result();
		//print_r($data);exit;
		return $data;
	}
	
	public function getSaplingsListToUpdateStock(){
	    return $this->db->select('saplings.saplingid,varieties.variety,saplings.sapling,bag_size.bagsize')->join('saplings','saplings.saplingid = sapling_destils.sapling_id')->join('varieties','varieties.variety_id = saplings.varityid')->join('bag_size','bag_size.bag_id = sapling_destils.bag_size_id')->get('sapling_destils');
	}
	public function insertNewBags(){
		if($this->input->post('uriid')){
			//print_r('expression');exit;
    		$bags=$this->input->post('bags');
    		
    		foreach ($bags as $key => $value) {
					if($value == ''){
						continue;
					}
					$edata['sapling_id'] = $this->input->post('uriid');
					$edata['bag_size_id'] = $value;
					
					
					$this->db->insert('sapling_destils',$edata);
					
				}
				$this->session->set_flashdata('success', 'Bags added successfully');
          redirect('sapling-details/'.$this->input->post('uriid'));
    	}
	}

	public function getOverallStock(){
		$this->db->select('*')
		->from('sapling_stock')
		 ->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		 ->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		 ->join('nursery','nursery.nursery_id=sapling_stock.nursery_id');
        $data=$this->db->get()->result();
        //print_r(count($data));exit;
        return $data;
	}

	public function getCountStock($sid,$bid){
	$stockdata = $this->db->where('sapling_id',$sid)->where('bag_id',$bid)->get('sapling_stock')->result();
	$count=0;
	  foreach ($stockdata as $s) {
	  	$count+=$s->closing_stock;
	  }
	  return $count;
	}
	public function openinStock(){
     $this->db->select_max('id');
     $this->db->from('sapling_stock');
     $this->db->group_by('product_id');
         $data=$this->db->get()->result();
         //print_r($data);exit;
       return $data;
       
	}
	public function getOpeningStock($id){
		$this->db->select('sapling_stock.*,nursery.nursery_id,nursery.nursery_name,saplings.*,bag_size.*')
		->from('sapling_stock')
		->join('nursery','nursery.nursery_id=sapling_stock.nursery_id')
		->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		->where('sapling_stock.id',$id);
		$data=$this->db->get()->row();
	//	print_r($data);exit;
		return $data;
	}
	public function openinStockById($id){
		$this->db->select_max('id');
     $this->db->from('sapling_stock');
     $this->db->where('nursery_id',$id);
     $this->db->group_by('product_id');
        $data=$this->db->get()->result();
        return $data;
	}
    
    public function getProduct(){
    	$this->db->select_max('id');
     $this->db->from('sapling_stock');
     $this->db->group_by('product_id');
        $data=$this->db->get()->result();
        return $data;
    	
    }
    public function saledStock(){
		$this->db->select('sapling_stock.*,saplings.*,bag_size.*,nursery.*')
		->from('sapling_stock')
		->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		->join('nursery','nursery.nursery_id=sapling_stock.nursery_id')
		->where('sapling_stock.sales_quantity !=',0);
		//->group_by('sapling_stock.date');
        $data=$this->db->get()->result();
        return $data;
	}

		public function updateSlots(){
		if($this->input->post('id')){
			//print_r($nurseryd);exit;
			$maxDate=$this->db->select_max('slot_date')->from('orders')->get();
			if($maxDate->num_rows() > 0){
				$slotDate=$maxDate->row();
				$todayDate=date('Y-m-d');
				$getMaxIdSlot = $this->db->select_max('slot_id')->get('slots')->row();
				// print_r($getMaxIdSlot);exit;
				if($slotDate->slot_date <= $todayDate){

					$tomorrow = date("Y-m-d", strtotime("+1 day"));
                    $slot =1;
					
				}elseif ($slotDate->slot_date > $todayDate) {
					$getTime = $this->db->select_max('slot_time')->where('slot_date',$slotDate->slot_date)->get('orders');
					if($getTime->num_rows() > 0){
						$getSlotTime = $getTime->row();
						 if($getSlotTime->slot_time < $getMaxIdSlot){
                           $tomorrow = $slotDate->slot_date;
                            $slot =$getSlotTime->slot_time+1;
						 }else{
						 	$tomorrow = date('Y-m-d', strtotime($slotDate->slot_date . ' +1 day'));
						 	$slot=1;
						 }
					}
				}
				else{
					$tomorrow = date('Y-m-d', strtotime($slotDate->slot_date . ' +1 day'));
					$slot=1;
				}
				
			}else{
				$tomorrow = date("Y-m-d", strtotime("+1 day"));
				$slot = 1;
			}
			//print_r($tomorrow);exit;
			
			// print_r($tomorrow);exit;
			$data=array(
                'slot_date'=>$tomorrow,
                'slot_time'=>$slot,
                'accept_reject'=>1
			);
			    $this->db->set($data);
			$this->db->where('order_id',$this->input->post('id'));
			$this->db->update('orders');
			$stocksData=$this->db->where('order_id',$this->input->post('id'))->get('ordered_saplings')->result();
			//print_r($stocksData);exit;
			foreach ($stocksData as $stocks) {
				
              $saplingsData =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$stocks->nursery_id)->where('sapling_id',$stocks->sapling_id)->where('bag_id',$stocks->bag_id)->get()->row();  
				$saplingStock=$this->db->where('id',$saplingsData->id)->get('sapling_stock')->row();
				//print_r($saplingsData);exit;
				$deductStock = array(
					'sales_quantity'=>$stocks->ordered_quantity,
                     'closing_stock'=>$saplingStock->closing_stock - $stocks->ordered_quantity,
				   );
				//print_r($deductStock);exit;
				$this->db->where('id',$saplingsData->id);
				$this->db->update('sapling_stock',$deductStock);
			}
			$slotTiming = $this->db->where('slot_id',$slot)->get('slots')->row();
			$message = $tomorrow . $slotTiming->start_time . $slotTiming->end_time;
			$orderData=$this->db->where('order_id',$this->input->post('id'))->get('orders')->row();
			$customers =$this->db->where('aadhaar_no',$orderData->customer_aadhaar)->get('customers')->row();
			$this->Response->send_sms('91'.$customers->mobile_no,'Your slot is confirm: '.$message. 'Please collect your sapling on given slot');
			
				   $this->session->set_flashdata('success', 'Order accepted successfully');
				redirect('all-orders');   
			
		}
	}
	public function rejectAcceptedOrder(){
        if($this->input->post('rid')){
            // print_r('hi');exit;
        	//print_r($this->input->post('rid'));exit;
        	$this->db->where('order_id',$this->input->post('rid'))->set('accept_reject',2)->update('orders');
        	$stocksData=$this->db->where('order_id',$this->input->post('rid'))->get('ordered_saplings')->result();
        	
        	foreach ($stocksData as $stocks) {
				
              $saplingsData =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$stocks->nursery_id)->where('sapling_id',$stocks->sapling_id)->where('bag_id',$stocks->bag_id)->get()->row();
              //print_r($saplingsData);exit;
				$saplingStock=$this->db->where('id',$saplingsData->id)->get('sapling_stock')->row();
			//	print_r($saplingsData);exit;
				$addStock = array(
					'sales_quantity'=>$saplingStock->sales_quantity - $stocks->ordered_quantity,
                     'closing_stock'=>$saplingStock->closing_stock + $stocks->ordered_quantity,
				   );
				//print_r($deductStock);exit;
				$this->db->where('id',$saplingsData->id);
				$this->db->update('sapling_stock',$addStock);
			}
			$message = 'Your odered is cancled.';
			$orderData=$this->db->where('order_id',$this->input->post('rid'))->get('orders')->row();
			$customers =$this->db->where('aadhaar_no',$orderData->customer_aadhaar)->get('customers')->row();
			$this->Response->send_sms('91'.$customers->mobile_no,'Message: '.$message. 'Sorry!!!');
        	$this->session->set_flashdata('success', 'Order rejected successfully');
        	redirect('all-orders');
        }
	}
	public function rejectOrder(){
        if($this->input->post('did')){
        	//print_r($this->input->post('did'));exit;
        	$this->db->where('order_id',$this->input->post('did'))->set('accept_reject',2)->update('orders');
        	$this->session->set_flashdata('success', 'Order rejected successfully');
        	redirect('all-orders');
        }
	}
	public function getPendinOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->where('orders.is_order_delivered',0)
		  ->where('orders.accept_reject',1)
		  ->where('orders.is_delivery_rescheduled',0);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	}
	public function getDeliveredOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->where('orders.is_order_delivered',1)
		  ->where('orders.accept_reject',1);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	}

	 public function getReservation(){
    	$this->db->select('sapling_stock.*,,saplings.saplingid,saplings.sapling,bag_size.bag_id,bag_size.bagsize,nursery.nursery_id,nursery.nursery_name')
    	->from('sapling_stock')
    	->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
    	->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
    	->join('nursery','nursery.nursery_id=sapling_stock.nursery_id')
    	->where('reserved_stock !=',0);
    	$data = $this->db->get()->result();
    	// $data=$this->db->distinct('sapling_id')->select('sapling_id')->from('sapling_stock')->get()->result();
    	//print_r($data);exit;
    	return $data;
    }

    public function getSaplingReservation(){
    	$this->db->select('sapling_stock.*,saplings.saplingid,saplings.sapling,bag_size.bag_id,bag_size.bagsize,nursery.nursery_id,nursery.nursery_name')
    	->from('sapling_stock')
    	->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
    	->join('nursery','nursery.nursery_id=sapling_stock.nursery_id')
    	->join('bag_size','bag_size.bag_id=sapling_stock.bag_id');
    	$data = $this->db->get()->result();
    	//print_r($data);exit;
    	return $data;
    }
    public function getbags(){
    	return $this->db->get('bag_size')->result();
    }
    public function insertReservation(){
    	if($this->input->post('name')){
    		
    	$data =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$this->input->post('name'))->where('sapling_id',$this->input->post('sapling'))->where('bag_id',$this->input->post('bag'))->get()->row();
     $soldStock=$this->db->where('id',$data->id)->get('sapling_stock')->row();
    		//print_r($data);exit;
    		$reserve = array(
             'reserved_stock'=>$this->input->post('qty'),
              'closing_stock'=>$soldStock->closing_stock-$this->input->post('qty'),
    		);
    		$this->db->where('id',$data->id);
    		$this->db->update('sapling_stock',$reserve);
    	}
    	$this->session->set_flashdata('success', 'Recervation stock successfully');
				redirect('reservation-stock');
    }

    public function soldReservation(){
    	if($this->input->post('sid')){
    		//print_r($this->input->post('sid'));exit;
    	$data =	$this->db->where('id',$this->input->post('sid'))->get('sapling_stock')->row();
    	$maxdata =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$data->nursery_id)->where('sapling_id',$data->sapling_id)->where('bag_id',$data->bag_id)->get()->row();
    	$soldStock=$this->db->where('id',$maxdata->id)->get('sapling_stock')->row();
    		//print_r($soldStock);exit;
    		$sold = array(
             'reserved_stock'=> 0,
             'sales_quantity'=>$soldStock->sales_quantity+$data->reserved_stock,
             
    		);
    		$this->db->where('id',$maxdata->id);
    		$this->db->update('sapling_stock',$sold);
    		$statussold = array(
             'reserved_stock'=> 0,
             // 'sales_quantity'=>$soldStock->sales_quantity+$data->reserved_stock,
             
    		);
    		// print_r($statussold);exit;
    		$this->db->where('id',$this->input->post('sid'));
    		$this->db->update('sapling_stock',$statussold);
    		
    		
    	}
    	$this->session->set_flashdata('success', 'Recervation stock successfully');
				redirect('reservation-stock');
    }

    public function backReservation(){
    	if($this->input->post('bid')){
    	//print_r($this->input->post('bid'));exit;
    	$data =	$this->db->where('id',$this->input->post('bid'))->get('sapling_stock')->row();
    	$maxdata =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$data->nursery_id)->where('sapling_id',$data->sapling_id)->where('bag_id',$data->bag_id)->get()->row();
    	$soldStock=$this->db->where('id',$maxdata->id)->get('sapling_stock')->row();
    		//print_r($data);exit;
    		$sold = array(
             'reserved_stock'=> 0,
             //'opening_stock'=>$soldStock->opening_stock+$data->reserved_stock,
             'closing_stock'=>$soldStock->closing_stock+$data->reserved_stock,

    		);
    		$this->db->where('id',$maxdata->id);
    		$up=$this->db->update('sapling_stock',$sold);
if($up){
	$backsold = array(
             'reserved_stock'=> 0,
             //'opening_stock'=>$soldStock->opening_stock+$data->reserved_stock,
             

    		);
    		$this->db->where('id',$this->input->post('bid'));
    		$back=$this->db->update('sapling_stock',$backsold);
    		
}
    	}
    	$this->session->set_flashdata('success', 'Recervation stock successfully');
				redirect('reservation-stock');
    }

    public function reschedule(){
        if($this->input->post('sid')){
         $data =	$this->db->where('order_id',$this->input->post('sid'))->get('orders')->row();
       
         $maxDate=$this->db->select_max('slot_date')->from('orders')->get();
			if($maxDate->num_rows() > 0){
				$slotDate=$maxDate->row();
				$todayDate=date('Y-m-d');
				$getMaxIdSlot = $this->db->select_max('slot_id')->get('slots')->row();
				// print_r($getMaxIdSlot);exit;
				if($slotDate->slot_date <= $todayDate){

					$tomorrow = date("Y-m-d", strtotime("+1 day"));
                    $slot =1;
					
				}elseif ($slotDate->slot_date > $todayDate) {
					$getTime = $this->db->select_max('slot_time')->where('slot_date',$slotDate->slot_date)->get('orders');
					if($getTime->num_rows() > 0){
						$getSlotTime = $getTime->row();
						 if($getSlotTime->slot_time < $getMaxIdSlot){
                           $tomorrow = $slotDate->slot_date;
                            $slot =$getSlotTime->slot_time+1;
						 }else{
						 	$tomorrow = date('Y-m-d', strtotime($slotDate->slot_date . ' +1 day'));
						 	$slot=1;
						 }
					}
				}
				else{
					$tomorrow = date('Y-m-d', strtotime($slotDate->slot_date . ' +1 day'));
					$slot=1;
				}
				
			}else{
				$tomorrow = date("Y-m-d", strtotime("+1 day"));
				$slot = 1;
			}
         $rdata = array(
             'is_delivery_rescheduled'=>1,
             'delivery_reschedule_date'=>$tomorrow,
             'slot_time'=>$slot
         );
         $this->db->where('order_id',$this->input->post('sid'));
    		$this->db->update('orders',$rdata);
        }
     $this->session->set_flashdata('success', 'Order rescheduled successfully');
				redirect('all-pending-oreders');
    }

    public function getResceduleOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->where('orders.is_order_delivered',0)
		  ->where('orders.is_delivery_rescheduled',1);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	}
	public function received(){
        if($this->input->post('id')){
        	//print_r($this->input->post('did'));exit;
        	$orders=$this->db->where('order_id',$this->input->post('id'))->get('orders')->row();
        	$deliver = array(
             'is_order_delivered'=>1,
             'order_delivered_date'=>date('Y-m-d')
        	);
        	$this->db->where('order_id',$this->input->post('id'));
        	$this->db->update('orders',$deliver);
        	$this->session->set_flashdata('success', 'Order delivered successfully');
        	redirect('all-pending-oreders');
        }
	}
	public function receivedResceduled(){
        if($this->input->post('id')){
        	//print_r($this->input->post('did'));exit;
        	$orders=$this->db->where('order_id',$this->input->post('id'))->get('orders')->row();
        	$deliver = array(
             'is_order_delivered'=>1,
             'order_delivered_date'=>date('Y-m-d')
        	);
        	$this->db->where('order_id',$this->input->post('id'));
        	$this->db->update('orders',$deliver);
        	$this->session->set_flashdata('success', 'Order delivered successfully');
        	redirect('reschedule-orders');
        }
	}
    public function revenueGererated(){
		$this->db->select('orders.*,customers.*,nursery.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->join('nursery','nursery.nursery_id=orders.nursery_id')
		  ->where('orders.accept_reject',1);
		 // ->where('orders.is_delivery_rescheduled',0);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		
		//($data);exit;
		return $data;
	}
	 public function revenueGereratedByID($id){
		$this->db->select('orders.*,customers.*,nursery.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->join('nursery','nursery.nursery_id=orders.nursery_id')
		  ->where('orders.accept_reject',1)
		  ->where('orders.nursery_id',$id);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		
		//($data);exit;
		return $data;
	}
	public function insertPayment()
	{
		if($this->input->post('pid')){
			$data = array(
				'order_id'=>$this->input->post('pid'),
				'payment_id'=>$this->generateRandomString(16),
				'payment_mode'=>$this->input->post('mode'),
				'payment_date'=>$this->input->post('date'),
				'pay_amount'=>$this->input->post('amount'),
			);
			$this->db->insert('payment',$data);
			$this->db->where('order_id',$this->input->post('pid'))->set('pay_status',1)->update('orders');
			
			$this->session->set_flashdata('success', 'Payment added successfully');
			redirect('view-payments/'.$this->input->post('pid'));
		}
	}
	public function getPayment($id){
		return $this->db->where('order_id',$id)->get('payment')->result();
	}
	public function updatePayment()
	{
		if($this->input->post('id')){
			$uid=$this->input->post('uid');
			$data = array(
				'payment_mode'=>$this->input->post('emode'),
				'payment_date'=>$this->input->post('edate'),
				'pay_amount'=>$this->input->post('eamount'),
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('payment',$data);
			
			$this->session->set_flashdata('success', 'Payment added successfully');
			redirect('view-payments/'.$uid);
		}
	}
	public function deletePayment()
	{
		if($this->input->post('did')){
			$uid = $this->input->post('sid');
			$this->db->where('id',$this->input->post('did'))->delete('payment');
          $this->session->set_flashdata('success', 'Payment deleted successfully');
			redirect('view-payments/'.$uid);
		}
	}

	public function getAllPayment(){
		$this->db->select('payment.*,orders.order_id,orders.customer_aadhaar,customers.*')
		->from('payment')
		->join('orders','orders.order_id=payment.order_id')
		->join('customers','customers.aadhaar_no=orders.customer_aadhaar');
		$data=$this->db->get()->result();
		return $data;
	}

	public function getVehicle(){
		return $this->db->get('vehicle')->result();
	}
	public function insertVehicle(){
		if($this->input->post('types')){
			$data = array(
				'type'=>$this->input->post('types'),
				'vehicle_num'=>$this->input->post('vehicle'),
				'date'=>$this->input->post('date'),
				'stock'=>$this->input->post('stock'),
				'day'=>$this->input->post('days'),
			);
			$this->db->insert('vehicle',$data);
			
			$this->session->set_flashdata('success', 'Vehicle added successfully');
			redirect('vehicle');
		}
	}
	public function updateVehicle(){
		if($this->input->post('id')){
			$data = array(
				'type'=>$this->input->post('etypes'),
				'vehicle_num'=>$this->input->post('evehicle'),
				'date'=>$this->input->post('edate'),
				'stock'=>$this->input->post('estock'),
				'day'=>$this->input->post('edays'),
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('vehicle',$data);
			
			$this->session->set_flashdata('success', 'Vehicle updated successfully');
			redirect('vehicle');
		}
	}
	public function deleteVehicle(){
		if($this->input->post('did')){
			$this->db->where('id',$this->input->post('did'))->delete('vehicle');
			$this->session->set_flashdata('success', 'Vehicle deleted successfully');
			redirect('vehicle');
		}
	}

	public function getCashRemittance(){
		return $this->db->get('cash_remittance')->result();
	}
	public function insertCashRemittance(){
		if($this->input->post('mode')){
			$filename = '';
            if (!empty($_FILES['proof']['name'])) {
        $config['upload_path']   = './uploads/proof/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 6000;
        $config['file_name']     = $this->input->post('proof').date('Ymdhis');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('proof')) {
          $error = array(
            'error' => $this->upload->display_errors()
          );
          $this->session->set_flashdata('failure', 'Something went wrong. Please upload gif | jpg | png file');
        }else{
          $data     = $this->upload->data();
          $filename = $data['file_name'];
        }
      }
			$data = array(
				'cash_id'=>$this->generateRandomString(16),
				'mode'=>$this->input->post('mode'),
			'amount'=>$this->input->post('amount'),
				'date'=>$this->input->post('date'),
				'utr'=>$this->input->post('utr'),
			'proof'=>$filename
			);
			$this->db->insert('cash_remittance',$data);
			
			$this->session->set_flashdata('success', 'Cash remittance added successfully');
			redirect('cash-remittance');
		}
	}
	public function updateCashRemittance(){
		if($this->input->post('id')){
				$filename = '';
            if (!empty($_FILES['eproof']['name'])) {
        $config['upload_path']   = './uploads/proof/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']      = 6000;
        $config['file_name']     = $this->input->post('eproof').date('Ymdhis');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('eproof')) {
          $error = array(
            'error' => $this->upload->display_errors()
          );
          $this->session->set_flashdata('failure', 'Something went wrong. Please upload gif | jpg | png file');
        }else{
          $data     = $this->upload->data();
          $filename = $data['file_name'];
        }
        
      }
      if($filename!='' ){
      	$data = array(
			'mode'=>$this->input->post('emode'),
			'amount'=>$this->input->post('eamount'),
			'date'=>$this->input->post('edate'),
				'utr'=>$this->input->post('eutr'),
				'proof'=>$filename
			);
      }else{
      $data = array(
			'mode'=>$this->input->post('emode'),
			'amount'=>$this->input->post('eamount'),
			'date'=>$this->input->post('edate'),
				'utr'=>$this->input->post('eutr'),
				
			);
			}
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('cash_remittance',$data);
			
			$this->session->set_flashdata('success', 'Cash remittance updated successfully');
			redirect('cash-remittance');
		}
	}
	public function deleteCashRemittance(){
		if($this->input->post('did')){
			$this->db->where('id',$this->input->post('did'))->delete('cash_remittance');
			$this->session->set_flashdata('success', 'Cash remittance deleted successfully');
			redirect('cash-remittance');
		}
	}
    
    public function getmonthlyCash()
	{
		
		
		$current_year = date('Y');

		$current_month= date("F");
			 //print_r($current_month);exit;
		$this->db->select('*');
		$this->db->from('cash_remittance');
		$this->db->where('MONTH(date)', date('m'));	
		$this->db->where('YEAR(date)', date('Y'));			
		$query = $this->db->get()->result();
		
		return $query;
		//print_r($query);exit;
	}

	public function getMonthlySapling(){
		$current_year = date('Y');
		$current_month= date("F");
	       $orders = $this->db->select('orders.order_id,orders.customer_aadhaar,orders.accept_reject,ordered_saplings.*,saplings.*,bag_size.*')
	       ->from('ordered_saplings')
	       ->join('orders','orders.order_id=ordered_saplings.order_id')
	       ->join('saplings','saplings.saplingid=ordered_saplings.sapling_id')
	       ->join('bag_size','bag_size.bag_id=ordered_saplings.bag_id')
	       ->where('orders.accept_reject',1)
	      ->where('MONTH(ordered_saplings.ordered_date)', date('m'))	
		 ->where('YEAR(ordered_saplings.ordered_date)', date('Y'));			
		$query = $this->db->get()->result();
     return $query;

	}
	public function getSaplingsFilterData($month,$fdate,$tdate)
		{
            $date = date_parse($month);
            $monthname=$date['month'];
        
              $orders = $this->db->select('orders.order_id,orders.customer_aadhaar,orders.accept_reject,ordered_saplings.*,saplings.*,bag_size.*')
	       ->from('ordered_saplings')
	       ->join('orders','orders.order_id=ordered_saplings.order_id')
	       ->join('saplings','saplings.saplingid=ordered_saplings.sapling_id')
	       ->join('bag_size','bag_size.bag_id=ordered_saplings.bag_id')
	       ->where('orders.accept_reject',1)
	      ->where('MONTH(ordered_saplings.ordered_date)', $monthname)	
		 ->where('YEAR(ordered_saplings.ordered_date)', date('Y'));	
		 $this->db->where('ordered_saplings.ordered_date BETWEEN "'. date('Y-m-d', strtotime($fdate)). '" and "'. date('Y-m-d', strtotime($tdate)).'"');	
				
		$query = $this->db->get()->result();
     return $query;

		}
	public function getmonthlyIncome()
	{
		
		
		$current_year = date('Y');

		$current_month= date("F");
			 //print_r($current_month);exit;
		$this->db->select('*');
		$this->db->from('payment');
		$this->db->where('MONTH(payment_date)', date('m'));	
		$this->db->where('YEAR(payment_date)', date('Y'));			
		$query = $this->db->get()->result();
		
		return $query;
		//print_r($query);exit;
	}
	 public function getBeneficiaries(){
    	$this->db->select('orders.*,nursery.*,customers.*')
    	->from('orders')
    	->join('nursery','nursery.nursery_id=orders.nursery_id')
    	->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
    	->where('orders.accept_reject',1);
    	$data = $this->db->get()->result();
    	return $data;
    }
     public function getByIdBeneficiaries($id){
    	$this->db->select('orders.*,nursery.*,customers.*')
    	->from('orders')
    	->join('nursery','nursery.nursery_id=orders.nursery_id')
    	->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
    	->where('orders.accept_reject',1)
    	->where('orders.customer_aadhaar',$id);
    	$data = $this->db->get()->result();
    	return $data;
    }
    public function getFilterCashData($month,$fdate,$tdate)
		{
            $date = date_parse($month);
            $monthname=$date['month'];
          $this->db->select('*');
          $this->db->from('cash_remittance');
          $this->db->where('MONTH(date)', $monthname);
          $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($fdate)). '" and "'. date('Y-m-d', strtotime($tdate)).'"');
		$data=$this->db->get()->result();	
		//print_r($data);exit;		
				return $data;


		}
		public function getByIdMonthlyIncome($month,$fdate,$tdate)
		{
			$date = date_parse($month);
            $monthname=$date['month'];
			$this->db->select('*');
			$this->db->from('payment');
			$this->db->where('MONTH(payment_date)', $monthname);	
			$this->db->where('YEAR(payment_date)', date('Y'));
			 $this->db->where('payment_date BETWEEN "'. date('Y-m-d', strtotime($fdate)). '" and "'. date('Y-m-d', strtotime($tdate)).'"');			
			$query = $this->db->get()->result();

			return $query;
		//print_r($query);exit;
		}
		public function getLosses(){
			$this->db->distinct();
			$this->db->select('nursery_id')
			->from('losses');

			$data=$this->db->get()->result();
		//print_r($data);exit;
			return $data;
		}
		public function totalLoss($id){
			$data = $this->db->where('nursery_id',$id)->get('losses')->result();
			$total=0;
			foreach ($data as $d) {
				$total+=$d->qty;
			}
			return $total;

		}
		public function getDetailsLosses($id){
			$this->db->select('losses.*,saplings.saplingid,saplings.sapling,bag_size.bag_id,bag_size.bagsize')
			->from('losses')
			->join('saplings','saplings.saplingid=losses.saplingid')
			->join('bag_size','bag_size.bag_id=losses.bag')
			->where('losses.nursery_id',$id);
			$data=$this->db->get()->result();
		//print_r($data);exit;
			return $data;
		}

		public function insertSeadlingReserve(){
    	if($this->input->post('year')){
    		$reserve_id = $this->generateRandomString(16);
    		$varity = $this->input->post('variety');
    		$saplings=$this->input->post('saplings');
    		$bag=$this->input->post('bagsize');
    		$qty=$this->input->post('qty');
    		$data = array(
              'reserve_id'=>$reserve_id,
              'customer_aadhaar'=>$this->input->post('aadhaar'),
              'customer_name'=>$this->input->post('name'),
              'mobile'=>$this->input->post('mobile'),
              'year'=>$this->input->post('year'),
              'month'=>$this->input->post('month'),
              'date'=>date('Y-m-d'),
              'amount'=>$this->input->post('amount'),
         
    		);
    		$this->db->insert('seadling_reserve',$data);
    		foreach ($varity as $key => $value) {
					if($value == ''){
						continue;
					}
					$edata['reserveid'] = $reserve_id;
					$edata['varietyid'] = $value;
					$edata['saplings_id'] = $saplings[$key];
					$edata['bag'] = $bag[$key];
					$edata['qty'] =$qty[$key];
					
					$this->db->insert('reserve_sapling',$edata);
					
				}
				$this->session->set_flashdata('success', 'Future demand added successfully');
          redirect('seedling-reserve');
    	}
    }
    public function getReserveSeadling(){
    	return $this->db->get('seadling_reserve')->result();
    }
    public function getByIdReserveSeadling($id){
    	return $this->db->where('reserve_id',$id)->get('seadling_reserve')->row();
    }
    public function getByIdReserveSapling($id){
	       $this->db->select('reserve_sapling.*,saplings.saplingid,saplings.sapling,varieties.variety_id,varieties.variety,bag_size.bag_id,bag_size.bagsize,bag_size.price')
	       ->from('reserve_sapling')
	       ->join('varieties','varieties.variety_id=reserve_sapling.varietyid')
	       ->join('saplings','saplings.saplingid=reserve_sapling.saplings_id')
	       ->join('bag_size','bag_size.bag_id=reserve_sapling.bag')
	       ->where('reserve_sapling.reserveid',$id);			
		$query = $this->db->get()->result();
     return $query;

	}
	public function editSeadlingReserve(){
    	if($this->input->post('id')){
    		
    		$data = array(
             
              'customer_aadhaar'=>$this->input->post('aadhaar'),
              'customer_name'=>$this->input->post('name'),
              'mobile'=>$this->input->post('mobile'),
              'year'=>$this->input->post('year'),
              'month'=>$this->input->post('month'),
             
              'amount'=>$this->input->post('amount'),
         
    		);
    		$this->db->where('id',$this->input->post('id'));
    		$this->db->update('seadling_reserve',$data);
    		
		$this->session->set_flashdata('success', 'Seedling Reserve update successfully');
          redirect('view-seedling-reserve');
    	}
    }
    public function deleteSeadlingReserve(){
    	if($this->input->post('did')){
    		$this->db->where('reserveid',$this->input->post('did'))->delete('reserve_sapling');
    		$this->db->where('reserve_id',$this->input->post('did'))->delete('seadling_reserve');
    		
		$this->session->set_flashdata('success', 'Seedling Reserve deleted successfully');
          redirect('view-seedling-reserve');
    	}
    }
    public function editReserveSapling($id){
    	if($this->input->post('id')){
    		
    		$data = array(
             
              'varietyid'=>$this->input->post('variety'),
              'saplings_id'=>$this->input->post('saplings'),
              'bag'=>$this->input->post('bagsize'),
              'qty'=>$this->input->post('qty'),
             
         
    		);
    		$this->db->where('id',$this->input->post('id'));
    		$this->db->update('reserve_sapling',$data);
    		
		$this->session->set_flashdata('success', 'Seedling Reserve update successfully');
          redirect('view-reserve-sapling/'.$id);
    	}
    }
    public function deleteReserveSapling($id){
    	if($this->input->post('did')){
    		$this->db->where('id',$this->input->post('did'))->delete('reserve_sapling');
    		
		$this->session->set_flashdata('success', 'Seedling Reserve update successfully');
          redirect('view-reserve-sapling/'.$id);
    	}
    }

    public function addComment(){
    	if($this->input->post('id')){
    		$data = array(
            'upload_id'=>$this->input->post('id'),
            'comment'=>$this->input->post('comment'),
            'added_by'=>'Admin',
            'date'=>date('Y-m-d')
    		);
    		$this->db->insert('comments',$data);
    		$this->session->set_flashdata('success', 'Future demand sapling updated successfully');
          redirect('comments/'.$this->input->post('id'));
    	}
    }
    public function getCustomerComment($id){
    	$this->db->select('upload_photos.*,customers.aadhaar_no,customers.full_name')
    	->from('upload_photos')
    	->join('customers','upload_photos.customer_aadhaar=customers.aadhaar_no')
    	->where('upload_photos.upload_id',$id);
    	$data=$this->db->get()->row();
    	return $data;
    }
     public function getComments($id)
    {
    	$this->db->select('comments.*')
    	->from('comments')
    	->where('comments.upload_id',$id);
    	$data=$this->db->get()->result();
    	return $data;
    }
    
    public function receivedOrders(){
        if($this->input->post('id')){
         $data =	$this->db->where('order_id',$this->input->post('id'))->get('orders')->row();
         $rdata = array(
             'is_order_delivered'=>1,
         );
         $this->db->where('order_id',$this->input->post('id'));
    		$this->db->update('orders',$rdata);
        }
     $this->session->set_flashdata('success', 'Order rescheduled successfully');
				redirect('all-delivered-oreders');
    }

    public function getCustomerDetails($id){
    	$this->db->select('customers.*,orders.*')->from('orders')->join('customers','customers.aadhaar_no=orders.customer_aadhaar')->where('order_id',$id);
    	$data = $this->db->get()->row();
    	return $data;
    }

    public function getCustomer(){
    	$this->db->select('*')->from('customers');
    	$data = $this->db->get()->result();
    	return $data;
    }
     public function getMoreDetails($id){
    	$this->db->select('orders.*')
    	->from('orders')
    	->where('orders.customer_aadhaar',$id);
    	$data = $this->db->get();
    	return $data;
    	}

    	public function getLocation($id){
    		$location = $this->db->where('cust_id',$id)->get('location');
    			return $location;
    		
    	}
}?>