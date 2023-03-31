<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nursery_model extends CI_Model {
    
    public function generateRandomString($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}

	public function getNurseryStockDetails(){
		$this->db->select('nsd.*,saplings.*,ns.*,nursery.*')
		->from('nursery_stock_details nsd')
		->join('saplings','saplings.saplingid=nsd.saplings_id')
		->join('nursery_stock ns','ns.stockid=nsd.stock_id')
		->join('nursery','nursery.nursery_id=ns.nursery')
		->where('nursery.userid',$this->session->userdata('nursery_id'));
		$data = $this->db->get()->result();

		return $data;
	}
	public function addNewStock(){
    	if($this->input->post('saplings')){
    		$nurseryId=$this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();
    		//print_r($this->input->post());exit;
    		$productId = $this->generateRandomString(18);
    		$sapling = $this->input->post('saplings');
    		$bag=$this->input->post('bag');
    		//print_r($bag);exit;
    		$qtys=$this->input->post('qty');
    		$SpalingStock = $this->db->where('saplingid',$sapling)->get('saplings')->row();

    		foreach ($bag as $key => $value) {
    			$inwardQty = 0;
    			$openingStock = $qtys[$key];
    			$closingStock = $qtys[$key];
    			$proId=$productId;
    			$oldStock = $this->db->where('nursery_id',$nurseryId->nursery_id)->where('sapling_id',$sapling)->where('bag_id',$value)->get('sapling_stock');
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
					$edata['nursery_id']=$nurseryId->nursery_id;
					$edata['product_id']=$proId;
					$edata['sapling_id'] = $sapling;
					$edata['bag_id'] = $value;
					$edata['opening_stock'] = $openingStock;
					$edata['inward_quantity'] = $inwardQty;
					$edata['date'] = date('Y-m-d');
					$edata['closing_stock']= $closingStock;
					$edata['variety_id']=$SpalingStock->varityid;
                //print_r($edata);exit;
				if($qtys[$key] > 0 ){
					$this->db->insert('sapling_stock',$edata);
				}
				
				
				//print_r($total);exit;
				$this->session->set_flashdata('success', 'Stock added successfully');
				}
         redirect('enter-new-stock');
    	}
    }
	
    public function getAcceptedOrders(){
		$this->db->select('shop.*,nursery.*')
		->from('shop')
		->join('nursery','nursery.nursery_id=shop.nursery')
		->where('nursery.userid',$this->session->userdata('nursery_id'))
		->where('shop.order_status',1);
		$data=$this->db->get()->result();
		return $data;
	}
	public function getOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		 ->where('orders.nursery_id',$this->session->userdata('nursery'))
		 ->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	}
	public function getPendinOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		 ->where('orders.nursery_id',$this->session->userdata('nursery'))
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
		 ->where('orders.nursery_id',$this->session->userdata('nursery'))
		  ->where('orders.is_order_delivered',1)
		  ->where('orders.accept_reject',1);
		 //->order_by('orders.ordered_date',"DESC");
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
	}
	public function getOrderDetails($id)
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
	public function updateSlots(){
		if($this->input->post('id')){
			
			$data=array(
                'slot_date'=>$this->input->post('date'),
                'slot_time'=>1,
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
			$message = $this->input->post('date') . $this->input->post('time');
			$orderData=$this->db->where('order_id',$this->input->post('id'))->get('orders')->row();
			$customers =$this->db->where('aadhaar_no',$orderData->customer_aadhaar)->get('customers')->row();
			$this->Response->send_sms('91'.$customers->mobile_no,'Your slot is confirm: '.$message. 'Please collect your sapling on given slot');
			
				   $this->session->set_flashdata('success', 'Order accepted successfully');
				redirect('accept-reject-orders');   
				
			
			
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
            //  print_r($saplingsData);exit;
				$saplingStock=$this->db->where('id',$saplingsData->id)->get('sapling_stock')->row();
				//print_r($saplingsData);exit;
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
        	redirect('accept-reject-orders');
        }
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
        	redirect('pending-orders');
        }
	}
	public function individualSapling()
	 {
	 	if($this->input->post('sapling')){
	 		$nurseryId=$this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();
	 		$data = array(
	 			'nursery'=>$nurseryId->nursery_id,
	 			'nurseryId'=>$this->session->userdata('nursery_id'),
	 			'customer'=>$this->input->post('name'),
	 			'mobile'=>$this->input->post('mobile'),
	 			'sapling_id'=>$this->input->post('sapling'),
	 			'quantity'=>$this->input->post('quantity'),
	 			'bag_size'=>$this->input->post('bag'),
	 			'date'=>date("Y-m-d")
	 		);
	 		$this->db->insert('individual_spaling',$data);
	 		 $saplingsData =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$nurseryId->nursery_id)->where('sapling_id',$this->input->post('sapling'))->where('bag_id',$this->input->post('bag'))->get()->row(); 
	 		 $saplingStock=$this->db->where('id',$saplingsData->id)->get('sapling_stock')->row();
	 		//print_r($saplingsData);exit;
               if($saplingStock !=''){
               	$dataEdit = array(
                    'closing_stock'=>$saplingStock->closing_stock-$this->input->post('quantity'),
               	);
               	
                $this->db->where('id',$saplingsData->id);
               	$this->db->update('sapling_stock',$dataEdit);
               	
               }
	 		$this->session->set_flashdata('success', 'Individual sapling added successfully');
          redirect('individual-saplings');
	 	}
	 }

	 public function getIndividualSapling(){
	 	$this->db->select('individual_spaling.*,saplings.sapling,saplings.saplingid,bag_size.bag_id,bag_size.bagsize')
	 	->from('individual_spaling')
	 	->join('saplings','saplings.saplingid=individual_spaling.sapling_id')
	 	->join('bag_size','bag_size.bag_id=individual_spaling.bag_size')
	 	->where('individual_spaling.nurseryId',$this->session->userdata('nursery_id'));
	 	$data=$this->db->get()->result();
	 	return $data;
	 }

	 public function editIndividual(){

		if($this->input->post('id')){
			//print_r($this->input->post('id'));exit;
			$nurseryId=$this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();

            $stock=$this->db->select_max('id')->from('sapling_stock')->where('sapling_stock.nursery_id',$this->session->userdata('nursery'))->where('sapling_stock.sapling_id',$this->input->post('esapling'))->where('bag_id',$this->input->post('ebag'))->get()->row();
            $sapStock=$this->db->where('id',$stock->id)->get('sapling_stock')->row();
            $indStock=$this->db->where('id',$this->input->post('id'))->where('sapling_id',$this->input->post('esapling'))->where('bag_size',$this->input->post('ebag'))->get('individual_spaling')->row();
			if($indStock != ''){
				if($indStock->quantity > $this->input->post('eqty')){
					$tot = $indStock->quantity-$this->input->post('eqty');
					$tdata=array(
                 'closing_stock'=>$sapStock->closing_stock + $tot,
                 
				);
					//print_r($tdata);exit;
					$this->db->where('id',$stock->id);
                
				$this->db->update('sapling_stock',$tdata);
				}elseif($indStock->quantity < $this->input->post('eqty')){
					$stot = $this->input->post('eqty')-$indStock->quantity;
					$sdata=array(
                 'closing_stock'=>$sapStock->closing_stock - $stot,
                 
				);
					//print_r($sdata);exit;
					$this->db->where('id',$stock->id);
                
				$this->db->update('sapling_stock',$sdata);
				}
				
				
			}else{
				$oldStock = $this->db->where('id',$this->input->post('id'))->get('individual_spaling')->row();
				$oldSapling=$this->db->select_max('id')->from('sapling_stock')->where('sapling_stock.nursery_id',$this->session->userdata('nursery'))->where('sapling_stock.sapling_id',$oldStock->sapling_id)->where('bag_id',$oldStock->bag_size)->get()->row();
                $sapOld=$this->db->where('id',$oldSapling->id)->get('sapling_stock')->row();
				
				$oldData = array(
					
					'closing_stock'=>$sapStock->closing_stock + $oldStock->quantity,
				);
				$this->db->where('id',$oldSapling->id);
                
				$this->db->update('sapling_stock',$oldData);
				$ndata = array(
                  
                 'closing_stock'=>$sapStock->closing_stock - $this->input->post('eqty'),
                  
				);
				$this->db->where('id',$stock->id);
				$this->db->update('sapling_stock',$ndata);
			}
			$data = array(
				'customer'=>$this->input->post('ename'),
				'sapling_id'=>$this->input->post('esapling'),
				'mobile'=>$this->input->post('emobile'),
				'quantity'=>$this->input->post('eqty'),
				'bag_size'=>$this->input->post('ebag'),
				
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('individual_spaling',$data);
			$this->session->set_flashdata('success', 'Individual sapling updated successfully');
			redirect('individual-saplings');
		}
	}

	public function deleteIndividual(){
		if($this->input->post('did')){
			$individual=$this->db->where('individual_spaling.id',$this->input->post('did'))->get('individual_spaling')->row();
			// $data=$this->db->where('nursery_id',$individual->nursery)->where('saplings_id',$individual->sapling_id)->where('bag_size',$individual->bag_size)->get('nursery_stock_details')->row();
			//print_r($data);exit;
			$oldSapling=$this->db->select_max('id')->from('sapling_stock')->where('sapling_stock.nursery_id',$this->session->userdata('nursery'))->where('sapling_stock.sapling_id',$individual->sapling_id)->where('bag_id',$individual->bag_size)->get()->row();
                $sapOld=$this->db->where('id',$oldSapling->id)->get('sapling_stock')->row();
			$addData=array(
               'closing_stock'=>$sapOld->closing_stock + $individual->quantity,
			);
			$this->db->where('id',$oldSapling->id);
			$this->db->update('sapling_stock',$addData);
			$this->db->where('id',$this->input->post('did'))->delete('individual_spaling');
			$this->session->set_flashdata('success', 'Individual sapling delete successfully');
			redirect('individual-saplings');
			
		}
	}
	public function getPayment(){
		$this->db->select('payment.*,shop.*,nursery.*')
		->from('payment')
		->join('shop','shop.order_id=payment.order_id')
		->join('nursery','nursery.nursery_id=shop.nursery')
		->where('nursery.userid',$this->session->userdata('nursery_id'));
		$data=$this->db->get()->result();
		return $data;

	}
	public function getNurseryPayment($id){
		return $this->db->where('order_id',$id)->get('payment')->result();
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
			redirect('view-nursery-payments/'.$this->input->post('pid'));
		}
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
			redirect('view-nursery-payments/'.$uid);
		}
	}
	public function deletePayment()
	{
		if($this->input->post('did')){
			$uid = $this->input->post('sid');
			$this->db->where('id',$this->input->post('did'))->delete('payment');
          $this->session->set_flashdata('success', 'Payment deleted successfully');
			redirect('view-nursery-payments/'.$uid);
		}
	}
    public function getStockSapling(){
    	$nurseryId = $this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();
    	//print_r($nurseryId);exit;
    	$this->db->select('sapling_stock.*,saplings.*,bag_size.*')
		->from('sapling_stock')
		->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		->where('sapling_stock.nursery_id',$nurseryId->nursery_id);
		//->group_by('sapling_stock.date');
        $data=$this->db->get()->result();
        return $data;
    }
     public function openinStock(){
     $this->db->select_max('id');
     $this->db->from('sapling_stock');
     $this->db->where('nursery_id',$this->session->userdata('nursery'));
     $this->db->group_by('product_id');

         $data=$this->db->get()->result();
       return $data;
       
	}
	public function getOpeningStock($id){
		$this->db->select('sapling_stock.*,saplings.*,bag_size.*')
		->from('sapling_stock')
		->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		->where('sapling_stock.id',$id);
		$data=$this->db->get()->row();
		return $data;
	}
 //    public function openinStock(){
 //    	$nurseryId = $this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();
	// 	$this->db->select('sapling_stock.*,saplings.*,bag_size.*,nursery.*')
	// 	->from('sapling_stock')
	// 	->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
	// 	->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
	// 	->join('nursery','nursery.nursery_id=sapling_stock.nursery_id')
	// 	->where('sapling_stock.nursery_id',$nurseryId->nursery_id)
	// 	->group_by('sapling_stock.date');
 //        $data=$this->db->get()->result();
 //        return $data;
	// }

	 public function getNurseryProduct(){
    	$this->db->select_max('id');
     $this->db->from('sapling_stock');
     $this->db->where('nursery_id',$this->session->userdata('nursery'));
     $this->db->group_by('product_id');
        $data=$this->db->get()->result();
        return $data;
    	
    }
    public function saledStock(){
		$this->db->select('sapling_stock.*,saplings.*,bag_size.*')
		->from('sapling_stock')
		->join('saplings','saplings.saplingid=sapling_stock.sapling_id')
		->join('bag_size','bag_size.bag_id=sapling_stock.bag_id')
		->where('sapling_stock.sales_quantity !=',0)
		->where('sapling_stock.nursery_id',$this->session->userdata('nursery'))
		->group_by('sapling_stock.date');
        $data=$this->db->get()->result();
        return $data;
	}

	 public function getSaplings(){
	 	$this->db->select('saplings.*,varieties.variety_id,varieties.variety')
	 	->from('saplings')
	 	->join('varieties','varieties.variety_id=saplings.varityid');
	 	$data = $this->db->get()->result();
	 	return $data;

	 }

	 public function rescheduleOrder(){
        if($this->input->post('sid')){
        	//print_r($this->input->post('sid'));exit;
         $data =	$this->db->where('order_id',$this->input->post('sid'))->get('orders')->row();
         $rdata = array(
             'is_delivery_rescheduled'=>1,
             'delivery_reschedule_date'=>$this->input->post('date')
         );
         $this->db->where('order_id',$this->input->post('sid'));
    		$this->db->update('orders',$rdata);
        }
     $this->session->set_flashdata('success', 'Order rescheduled successfully');
				redirect('pending-orders');
    }
    public function getResceduleOrders(){
		$this->db->select('orders.*,customers.*')
		->from('orders')
		 ->join('customers','customers.aadhaar_no=orders.customer_aadhaar')
		  ->where('orders.is_order_delivered',0)
		  ->where('orders.is_delivery_rescheduled',1)
		 ->where('orders.nursery_id',$this->session->userdata('nursery'));
		$data=$this->db->get()->result();
		//($data);exit;
		return $data;
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
        	redirect('nursery-reschedule-orders');
        }
	}
	public function getBagsize(){
		return $this->db->get('bag_size')->result();
	}
	 public function getSapling(){
    	$nurseryId = $this->db->where('userid',$this->session->userdata('nursery_id'))->get('nursery')->row();
    	//print_r($nurseryId);exit;
    	$this->db->distinct();
    	$this->db->select('sapling_id')
		->from('sapling_stock')
		//->join('saplings','saplings.saplingid=nursery_stock_details.saplings_id')
		->where('sapling_stock.nursery_id',$nurseryId->nursery_id);
		//->group_by('sapling_stock.date');
        $data=$this->db->get()->result();
        
        //print_r($data);exit;
        return $data;
    }

    public function lossesAdd(){
    	if($this->session->userdata('nursery_id')){
    		
    		$loss = $this->input->post('loss');
    		$saplings=$this->input->post('saplings');
    		$bag=$this->input->post('bagsize');
    		$qty=$this->input->post('qty');
    		$lossid=$this->generateRandomString(20);
    		//print_r($this->session->userdata('nursery'));exit;
    		foreach ($saplings as $key => $value) {
					if($value == ''){
						continue;
					}
					$maxdata =$this->db->select_max('id')->from('sapling_stock')->where('nursery_id',$this->session->userdata('nursery'))->where('sapling_id',$value)->where('bag_id',$bag[$key])->get()->row();
					$stockData=$this->db->where('id',$maxdata->id)->get('sapling_stock')->row();
					//$stockData = $this->db->where('nursery_id',$this->session->userdata('nursery'))->where('sapling_id',$value)->where('bag_id',$bag[$key])->get('sapling_stock')->row();
					//print_r($maxdata);exit;
					$edata['nursery_id']=$this->session->userdata('nursery');
					$edata['loss_id']=$lossid;
					$edata['loss_type'] = $loss[$key];
					$edata['saplingid'] = $value;
					$edata['bag'] = $bag[$key];
					$edata['qty'] =$qty[$key];
					$edata['date']=date('Y-m-d');
					//print_r($edata);exit;
					$this->db->insert('losses',$edata);

					$udata['damage_qty']=$stockData->damage_qty+$qty[$key];
					$udata['lossid']=$lossid;
					$udata['closing_stock']=$stockData->closing_stock-$qty[$key];
					$this->db->where('id',$stockData->id);
					$this->db->update('sapling_stock',$udata);
				}
				
				$this->session->set_flashdata('success', 'Future demand added successfully');
          redirect('add-loss');
    	}
    }
     public function getLosses(){
		$this->db->select('losses.*,saplings.saplingid,saplings.sapling,bag_size.bag_id,bag_size.bagsize')
		->from('losses')
		 ->join('saplings','saplings.saplingid=losses.saplingid')
		 ->join('bag_size','bag_size.bag_id=losses.bag')
		 ->where('losses.nursery_id',$this->session->userdata('nursery'));
		$data=$this->db->get()->result();
		//print_r($data);exit;
		return $data;
	}
	public function updateLoss(){
        if($this->input->post('id')){
        	$lossData=$this->db->where('id',$this->input->post('id'))->get('losses')->row();
        	$maxdata =$this->db->where('nursery_id',$this->session->userdata('nursery'))->where('sapling_id',$lossData->saplingid)->where('bag_id',$lossData->bag)->where('lossid',$lossData->loss_id)->get('sapling_stock')->row();
        	// print_r($maxdata);exit;
				
        	$deliver = array(
             'loss_type'=>$this->input->post('loss'),
             'saplingid'=>$this->input->post('saplings'),
             'bag'=>$this->input->post('bagsize'),
             'qty'=>$this->input->post('qty')
        	);
        	
        	$this->db->where('id',$this->input->post('id'));
        	$this->db->update('losses',$deliver);
        	if($maxdata->damage_qty > $this->input->post('qty')){
        		$cal = $maxdata->damage_qty-$this->input->post('qty');
        		$closing = $maxdata->closing_stock + $cal;
        		//print_r($closing);exit;
        	}elseif ($maxdata->damage_qty < $this->input->post('qty')) {

        		$cal = $this->input->post('qty')-$maxdata->damage_qty;

        		$closing = $maxdata->closing_stock - $cal;
        		//print_r($closing);exit;
        	}else{
        		$closing = $maxdata->closing_stock;
        	}
        	$damageUpdate = array(
              'damage_qty'=>$this->input->post('qty'),
              'closing_stock'=>$closing,
        	);
        	$this->db->where('id',$maxdata->id);
					$this->db->update('sapling_stock',$damageUpdate);
        	$this->session->set_flashdata('success', 'Order delivered successfully');
        	 redirect('view-loss');
        }
	}
		public function deleteLoss(){
        if($this->input->post('did')){
        	$lossData=$this->db->where('id',$this->input->post('id'))->get('losses')->row();
        	$maxdata =$this->db->where('nursery_id',$this->session->userdata('nursery'))->where('sapling_id',$lossData->saplingid)->where('bag_id',$lossData->bag)->where('lossid',$lossData->loss_id)->get('sapling_stock')->row();
        	$deleteData = array(
              'damage_qty'=>$maxdata->damage_qty-$lossData->qty,
              'closing_stock'=>$maxdata->closing_stock+$lossData->qty,
        	);
        	$this->db->where('id',$maxdata->id);
        	$this->db->update('sapling_stock',$deleteData);
        	$this->db->where('id',$this->input->post('did'))->delete('losses');
        	$this->session->set_flashdata('success', 'Loss deleted successfully');
        	 redirect('view-loss');

        }
    }
    public function addNewComment(){
    	if($this->input->post('id')){
    		$data = array(
            'upload_id'=>$this->input->post('id'),
            'comment'=>$this->input->post('comment'),
            'added_by'=>'nursery',
            'date'=>date('Y-m-d'),
            'nursery'=>$this->session->userdata('nursery_id'),
    		);
    		$this->db->insert('comments',$data);
    		$this->session->set_flashdata('success', 'Future demand sapling updated successfully');
          redirect('nursery-comments/'.$this->input->post('id'));
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
    public function getCashRemittance(){
		return $this->db->where('added_by',$this->session->userdata('nursery_id'))->get('cash_remittance')->result();
	}
	public function insertCashRemittance(){
		if($this->input->post('mode')){
			$data = array(
				'cash_id'=>$this->generateRandomString(16),
				'mode'=>$this->input->post('mode'),
			'amount'=>$this->input->post('amount'),
				'date'=>$this->input->post('date'),
				'added_by'=>$this->session->userdata('nursery_id'),
			
			);
			$this->db->insert('cash_remittance',$data);
			
			$this->session->set_flashdata('success', 'Cash remittance added successfully');
			redirect('nursery-cash-remittance');
		}
	}
	public function updateCashRemittance(){
		if($this->input->post('id')){
			$data = array(
				'mode'=>$this->input->post('emode'),
			'amount'=>$this->input->post('eamount'),
				'date'=>$this->input->post('edate'),
				
			);
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('cash_remittance',$data);
			
			$this->session->set_flashdata('success', 'Cash remittance updated successfully');
			redirect('nursery-cash-remittance');
		}
	}
	public function deleteCashRemittance(){
		if($this->input->post('did')){
			$this->db->where('id',$this->input->post('did'))->delete('cash_remittance');
			$this->session->set_flashdata('success', 'Cash remittance deleted successfully');
			redirect('nursery-cash-remittance');
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
		$this->db->where('added_by', $this->session->userdata('nursery_id'));				
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
		  $this->db->where('ordered_saplings.nursery_id', $this->session->userdata('nursery'));		
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
		  $this->db->where('ordered_saplings.nursery_id', $this->session->userdata('nursery'));		
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
          $this->db->where('added_by', $this->session->userdata('nursery_id'));	
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
     
}?>