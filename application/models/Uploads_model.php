<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads_model extends CI_Model {

	public function getCustomerDeliverUploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','On Delivery')
		->where('upload_photos.added_by','customer');
		$data=$this->db->get()->result();
		return $data;

	}
	public function getDeliveredImages($id){
		//print_r($id);exit;
		$this->db->select('images.*')
		->from('images')
		->where('images.uploadid',$id);
		$data = $this->db->get()->result();
	//print_r($data);exit;
		return $data;
	}
   public function getNurseryDeliverUploads(){
		$this->db->select('upload_photos.*,customers.*,nursery.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->join('nursery','nursery.nursery_id=upload_photos.nursery_id')
		->where('upload_photos.upload_type','On Delivery')
		->where('upload_photos.added_by','nursery');
		$data=$this->db->get()->result();
		return $data;

	}
	public function getafterPlantingploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','After Plant');
		
		$data=$this->db->get()->result();
		return $data;

	}
	public function getYielBenefitUploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','benefite');
		
		$data=$this->db->get()->result();
		return $data;

	}
	public function generateRandomString($n) { 
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
  $randomString = '';
  for ($i = 0; $i < $n; $i++) { 
   $index = rand(0, strlen($characters) - 1); 
   $randomString .= $characters[$index]; 
 }
 return $randomString; 
}
		public function addmultipleimages() {
//print_r(input());exit;
		$data = array();
       //print_r($_FILES); 
       //exit;
		if(($this->input->post('aadhaar') && $_FILES['files']['name'][0] != '')){
        // echo "string";exit;
			if($_FILES['files']['name'][0] != ''){
          // echo "string 2";exit;
				$imgUpload=$this->generateRandomString(16);
				$filesCount = count($_FILES['files']['name']);

				$dataArray =array(
							'upload_id' =>$imgUpload,
							'customer_aadhaar'=>$this->input->post('aadhaar'),
							'upload_type'=>'On Delivery',
							'date'=>date('Y-m-d'),
							'added_by'=>'nursery',
							'msg' => ucfirst($this->input->post('msg')),
							'nursery_id'=>$this->session->userdata('nursery_id'),
						);
				//print_r($dataArray);exit;
						$this->db->insert('upload_photos',$dataArray);
         // print_r($filesCount);exit;
				
				for($i = 0; $i < $filesCount; $i++){
              // echo "string 3";exit;
					//print_r($filesCount);exit;
					$_FILES['file']['name']     = date('Ymdhis')."_".$this->session->userdata('nursery_id')."_".$this->input->post('aadhaar')."_".$_FILES['files']['name'][$i];
					//print_r($_FILES['file']['name']);exit;
					$_FILES['file']['type'] = $_FILES['files']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['files']['error'][$i];
					$_FILES['file']['size'] = $_FILES['files']['size'][$i];
            // File upload configuration
					$uploadPath = './uploads/images';
					$config['upload_path'] = $uploadPath;
					$config['allowed_types'] = '*';
					$config['file_name'] = $_FILES['files']['name'][$i];
            //jpg|jpeg|png|gif|doc|docx|csv|ppt|xlsx
            // Load and initialize upload library
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
            // Upload file to server
					if($this->upload->do_upload('file')){
            // Uploaded file data
						//print_r($this->session->userdata('cust_aadhaar'));exit;
						
						$fileData = $this->upload->data();
					 $filename = $fileData['file_name'];
						//print_r($filename);exit;
						
						$dataImage = array(
                         'uploadid'=>$imgUpload,
                         'image'=> $filename,
						);
						//print_r($dataImage);exit;
						$this->db->insert('images',$dataImage);
						
						
						
					}

				}

				$this->session->set_flashdata('success', 'You have been successfully uploaded images');
						redirect('uploads-images-on-delivered');

			}
		}
	}
	public function getByNurseryUploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','On Delivery')
		->where('upload_photos.added_by','nursery')
		->where('upload_photos.nursery_id',$this->session->userdata('nursery_id'));
		
		$data=$this->db->get()->result();
		return $data;

	}
	public function getNurseryDeliveredImages($id){
		//print_r($id);exit;
		$this->db->select('images.*')
		->from('images')
		->where('images.uploadid',$id);
		$data = $this->db->get()->result();
	//print_r($data);exit;
		return $data;
	}
	public function getByplantNurseryUploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','After Plant')
		->where('upload_photos.nursery_id',$this->session->userdata('nursery_id'));
		
		$data=$this->db->get()->result();
		return $data;

	}
		public function getByCustomerNurseryUploads(){
		$this->db->select('upload_photos.*,customers.*')
		->from('upload_photos')
		->join('customers','customers.aadhaar_no=upload_photos.customer_aadhaar')
		->where('upload_photos.upload_type','On Delivery')
		->where('upload_photos.added_by','customer')
		->where('upload_photos.nursery_id',$this->session->userdata('nursery_id'));
		
		$data=$this->db->get()->result();
		return $data;

	}
}?>