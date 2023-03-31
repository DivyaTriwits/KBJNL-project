<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website_model extends CI_Model {

  public function generateRandomString($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $n; $i++) { 
     $index = rand(0, strlen($characters) - 1); 
     $randomString .= $characters[$index]; 
   }
   return $randomString; 
 }
 public function getNursery()
 {
  return $this->db->where('status',1)->get('nursery')->result();
}

public function registerCustomer(){
  if($this->input->post('nursery')){
    $customerData = array(
     'full_name'=>$this->input->post('name'),
     'servey_number'=>$this->input->post('servey'),
     'water_source'=>$this->input->post('water'),
     'extend_of_land'=>$this->input->post('land'),
     'mobile_no'=>$this->input->post('phone'),
     'aadhaar_no'=>$this->input->post('adhaar'),
     'place'=>$this->input->post('place'),
     'registered_date'=>date("Y-m-d H:i:s")
   );
   $this->session->set_userdata('nursery_id',$this->input->post('nursery'));
   $this->db->insert('customers',$customerData);
   $this->session->set_flashdata('success', 'Updated successfully');
   redirect('shop/sapling-list/'.$this->input->post('nursery'));
 }
}

public function getSapling(){
  return $this->db->get('saplings')->result();
}
public function getNurserySapling($nurseryId){
  $this->db->select('nursery_stock_details.*,saplings.*')
  ->from('nursery_stock_details')
  ->join('saplings','saplings.saplingid=nursery_stock_details.saplings_id')
  ->where('nursery_id',$nurseryId);
  $data = $this->db->get()->result();
		//print_r($data);exit;
  return $data;
}
public function saplingsOrders($id){
 if($id != ''){
  $sapling = $this->input->post('saplings');
  $bag=$this->input->post('bagsize');
  $qty=$this->input->post('qty');
    		//$percost=$this->input->post('percost');
  $nur=$this->input->post('nursery');
  $sapdata=$this->db->where('sapling_id',$sapling)->where('bag_size',$bag)->get('sapling_destils')->row();
				//$nur=$this->db->where('nursery_id',$data->nursery)->get('nursery')->row();
  $data = array(
   'orderid'=>$id,
   'sapling_id'=>$sapling,
   'bag_size'=>$bag,
   'quantity'=>$qty,
   'percost'=>$sapdata->per_cost
 );
  $this->db->insert('shop_details',$data);
  $this->session->set_flashdata('success', 'Add to cart successfully');
  redirect('shop/sapling-list/'.$id .'/'.$nur);
}
}
public function is_adhaar_available($adhaar)  
{  
 $this->db->where('adhaar', $adhaar);  
 $query = $this->db->get("shop");  
 if($query->num_rows() > 0)  
 {  
  return true;  
}  
else  
{  
  return false;  
}  
}
public function is_servey_available($servey)  
{  
 $this->db->where('servey_number', $servey);  
 $query = $this->db->get("shop");  
 if($query->num_rows() > 0)  
 {  
  return true;  
}  
else  
{  
  return false;  
}  
}

public function getCost($sapid){
        // echo "string 1";exit;
  if($this->input->post('bagsize')){
            // echo "expression";exit;
    $this->db->select('per_cost')
    ->from('sapling_destils')
    ->where('sapling_id',$sapid)
    ->where('bad_size',$this->input->post('bagsize'));
    $data=$this->db->get()->row();
    return $data;   
  }              
}
public function getVaritiesById($id){

      //print_r($nurseryId);exit;
  $this->db->distinct();
  $this->db->select('variety_id')
  ->from('varieties')
  ->join('saplings','saplings.varityid=varieties.variety_id')
  ->join('nursery_stock_details nsd','saplings.saplingid=nsd.saplings_id')
  ->where('nsd.stock_qty !=',0)
  ->where('nsd.nursery_id',$id);
  $data = $this->db->get()->result();
      //print_r($data);exit;
  return $data;
}
public function getSaplingById($id,$vid){

      //print_r($nurseryId);exit;
  $this->db->distinct();
  $this->db->select('saplingid')

  ->join('nursery_stock_details nsd','saplings.saplingid=nsd.saplings_id')
  ->where('nsd.stock_qty !=',0)
  ->where('nsd.nursery_id',$id)
  ->where('saplings.varityid',$vid);
  $data = $this->db->get('saplings');
      //print_r($data);exit;
  return $data->result();
}

public function getCart($id){
  $this->db->select('shop_details.*,saplings.*')
  ->from('shop_details')
  ->join('saplings','saplings.saplingid=shop_details.sapling_id')
  ->where('shop_details.orderid',$id);
  $data = $this->db->get()->result();
  return $data;

}
public function confirmOrder($id,$nid){
 $data = $this->db->where('order_id',$id)->get('shop')->row();
 $this->db->where('order_id',$id)->set('confirm_order',1)->update('shop');
 $user=$this->db->where('nursery_id',$nid)->get('nursery')->row();
     //print_r($nid);exit;
 $notify = array(
  'deliver_to'=>$user->userid,
  'from_msg'=>$data->name,
  'date'=>date('Y-m-d h:m:s')

);
 $this->session->set_flashdata('success', 'Updated successfully');
 $this->db->insert('notification',$notify);
 redirect('home');
}


}?>