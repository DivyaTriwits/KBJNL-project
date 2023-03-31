<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulkupload_model extends CI_Model {
    
public function __construct()
	{
		parent::__construct();
		// $this->load->library('excel');
		// $this->load->library("pagination");
		 date_default_timezone_set('Asia/Kolkata');
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

	public function uploadSapling() 
	{
    //print_r('hii');exit;
		if ($this->input->post('variety')) {
		
		//	print_r('hii');exit;
			$data1 = array();
			if (isset($_FILES["file"]["name"])) 
			{
			   
				$path = $_FILES["file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach ($object->getWorksheetIterator() as $worksheet)
				{
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					for($row=2; $row<=$highestRow; $row++)
					{
					   
						$saplingid = $this->generateRandomString(18);
						$sapling= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$bagsize= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$cost= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						  //print_r($sapling);exit;
                         $SaplingsCheck=$this->db->where('sapling',$sapling)->get('saplings')->row();
                       if($SaplingsCheck != ''){
                          // $SaplingsCheck->result();
                           //print_r($SaplingsCheck);exit;
                           $data1[] = array(
							'sapling_id'=>$SaplingsCheck->saplingid,
							'bag_size'=>$bagsize,
							'per_cost'=>$cost
							);
                           
                       }else{
                           $data=array(
                              'saplingid'=>$saplingid,
                              'sapling'=>$sapling,
                              'varityid'=>$this->input->post('variety'),
                               );
                               $this->db->insert('saplings',$data);
                               $data1[] = array(
							'sapling_id'=>$saplingid,
							'bag_size'=>$bagsize,
							'per_cost'=>$cost,
							
						);
                       }
						
					}
				}
				 //	print_r($data1);exit;
				$this->db->insert_batch('sapling_destils', $data1);
				
			}
			$this->session->set_flashdata('success', 'File Uploaded Successfully');
			redirect('add-saplings');
		}
	}
    
    
	public function uploadStock() 
	{
    //print_r('hii');exit;
		if ($this->input->post('name')) {
		
		//	print_r('hii');exit;
			$data1 = array();
			if (isset($_FILES["file"]["name"])) 
			{
			   
				$path = $_FILES["file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach ($object->getWorksheetIterator() as $worksheet)
				{
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					for($row=2; $row<=$highestRow; $row++)
					{
					   
						$stockid = $this->generateRandomString(18);
						$saplingid= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$varities=$worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$saplingname= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$bagsize= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$qty= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$varity=$this->db->where('variety',$varities)->get('varieties')->row();
						$bag=$this->db->where('bagsize',$bagsize)->get('bag_size')->row();
						  //print_r($saplingid);exit;
                         $inwardQty = 0;
    			$openingStock = $qty;
    			$closingStock = $qty;
    			$proId=$this->generateRandomString(18);
    		$stockData=$this->db->select_max('id')->where('nursery_id',$this->input->post('name'))->where('sapling_id',$saplingid)->where('bag_id',$bag->bag_id)->get('sapling_stock')->row();
    			$sdata=$this->db->where('id',$stockData->id)->get('sapling_stock');
    			if($sdata->num_rows() > 0){
    				
    				$inwardQty = $qty;
    				$openingStock = $sdata->row()->closing_stock;
    				$closingStock = $inwardQty + $openingStock;

    				$proId=$sdata->row()->product_id;

    			}
    			$data1[] = array(
    				'nursery_id'=>$this->input->post('name'),
					'product_id'=>$proId,
					'sapling_id' => $saplingid,
					'bag_id' => $bag->bag_id,
					'opening_stock' => $openingStock,
					'inward_quantity' => $inwardQty,
					'date' => date('Y-m-d'),
					'closing_stock'=> $closingStock,
					'variety_id'=>$varity->variety_id,

    			);
                    						
					}
				}
				 //	print_r($data1);exit;
				 	if($qty > 0 ){
				$this->db->insert_batch('sapling_stock', $data1);
				 	}
			}
			$this->session->set_flashdata('success', 'File Uploaded Successfully');
			redirect('stock-add');
		}
	}
}?>