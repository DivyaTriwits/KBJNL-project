<?php

class Local_sale_model extends CI_Model {
    
    public function generateRandomString($n) { 
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
		$randomString = '';
		for ($i = 0; $i < $n; $i++) { 
			$index = rand(0, strlen($characters) - 1); 
			$randomString .= $characters[$index]; 
		}
		return $randomString; 
	}

	public function getVariety(){
		return $this->db->get('varieties')->result();
	}
	public function getSaplings(){
		return $this->db->get('saplings')->result();
	}
	public function getBagSzie(){
		return $this->db->get('bag_size')->result();
	}
	public function insertLocalSale(){
    	if($this->input->post('name')){
    		$localId = $this->generateRandomString(18);
    		$varity = $this->input->post('variety');
    		$saplings=$this->input->post('saplings');
    		$bag=$this->input->post('bagsize');
    		$qty=$this->input->post('qty');
    		$data = array(
              'local_id'=>$localId,
              'type'=>$this->input->post('types'),
              'type_name'=>$this->input->post('name'),
              'user_name'=>$this->input->post('uname'),
              'contact_num'=>$this->input->post('contact'),
              'address'=>$this->input->post('address'),
              'added_by'=>'admin',
              'date'=>date('Y-m-d')
    		);
    		$this->db->insert('local_sales',$data);
    		foreach ($varity as $key => $value) {
					if($value == ''){
						continue;
					}
					$edata['local_sale_id'] = $localId;
					$edata['varietyid'] = $value;
					$edata['saplings_id'] = $saplings[$key];
					$edata['bag'] = $bag[$key];
					$edata['quantity'] =$qty[$key];
					
					$this->db->insert('local_sale_particular',$edata);
					
				}
				$this->session->set_flashdata('success', 'Local sale added successfully');
          redirect('add-local-sales');
    	}
    }
    public function getLocalSales(){
    	return $this->db->get('local_sales')->result();
    }
    public function getSaplingsLocalSale($id){
    	$this->db->select('local_sale_particular.*,varieties.variety_id,varieties.variety, saplings.saplingid,saplings.sapling,bag_size.bag_id,bag_size.bagsize,bag_size.price')
    	->from('local_sale_particular')
    	->join('varieties','varieties.variety_id=local_sale_particular.varietyid')
    	->join('saplings','saplings.saplingid=local_sale_particular.saplings_id')
    	->join('bag_size','bag_size.bag_id=local_sale_particular.bag')
    	->where('local_sale_particular.local_sale_id',$id);
        $data=$this->db->get()->result();
        //print_r($data);exit;
        return $data;
    }
    public function editLocalSaleSapling($id){
    	if($this->input->post('id')){
    		$data = array(
            'varietyid'=>$this->input->post('variety'),
            'saplings_id'=>$this->input->post('saplings'),
            'bag'=>$this->input->post('bagsize'),
            'quantity'=>$this->input->post('qty')
    		);
    		$this->db->where('id',$this->input->post('id'));
    		$this->db->update('local_sale_particular',$data);
    		$this->session->set_flashdata('success', 'Local sale saplings updated successfully');
          redirect('view-saplings-local-sales/'.$id);
    	}
    }

    public function deleteLocalSaleSapling($id){
    	if($this->input->post('did')){
    		$this->db->where('id',$this->input->post('did'))->delete('local_sale_particular');
    		$this->session->set_flashdata('success', 'Local sale saplings deleted successfully');
          redirect('view-saplings-local-sales/'.$id);
    	}
    }
     public function editlocal(){
    	if($this->input->post('id')){
    		$data = array(
            'type'=>$this->input->post('types'),
              'type_name'=>$this->input->post('name'),
              'user_name'=>$this->input->post('uname'),
              'contact_num'=>$this->input->post('contact'),
              'address'=>$this->input->post('address'),
    		);
    		$this->db->where('id',$this->input->post('id'));
    		$this->db->update('local_sales',$data);
    		$this->session->set_flashdata('success', 'Local sale updated successfully');
          redirect('view-local-sales');
    	}
    }
     public function deleteLocal(){
    	if($this->input->post('did')){
    		$this->db->where('id',$this->input->post('did'))->delete('local_sales');
    		
    		$this->session->set_flashdata('success', 'Local sale deleted successfully');
          redirect('view-local-sales');
    	}
    }
}?>