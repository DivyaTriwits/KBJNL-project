<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function adminLogin(){
    	//print_r('expression');exit;
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		// LOGIN FORM VALIDATION		
		if($this->form_validation->run() == TRUE){
//print_r($_POST['email']);exit;
			if($this->input->post('users') == 'Admin'){
				$admin = $this->db->where('email',$_POST['email'])->get('admin');		
			if ($admin->num_rows() > 0 ) {
				$userdata = $admin->row();
				
				if($userdata->password == $_POST['password']){

					$_SESSION['admin_id'] = $userdata->email;

					$this->session->set_flashdata("success","You are loggin in.");
					if($this->input->get('redirect')){
						redirect($this->input->get('redirect'));
					}else{
						redirect(base_url('admin-dashboard'));
					}
					// header('location:'.base_url().'author/dashboard');
				} else {
					$this->session->set_flashdata('Error', 'You have entered wrong password');
					redirect(base_url('login'));
				}
			}
			else {
				$this->session->set_flashdata('Error', 'No such account yet registered.');
				redirect(base_url('login'));
			} // End of Else
		}else{
            $nursery = $this->db->where('userid',$_POST['email'])->get('nursery');		
			if ($nursery->num_rows() > 0 ) {
				$nersarydata = $nursery->row();
				
				if($nersarydata->password == $_POST['password']){

					$_SESSION['nursery_id'] = $nersarydata->userid;
                  $_SESSION['nursery'] =$nersarydata->nursery_id;
					$this->session->set_flashdata("success","You are loggin in.");
					if($this->input->get('redirect')){
						redirect($this->input->get('redirect'));
					}else{
						redirect(base_url('nursery-home'));
					}
					// header('location:'.base_url().'author/dashboard');
				} else {
					$this->session->set_flashdata('Error', 'You have entered wrong password');
					redirect(base_url('login'));
				}
			}
			else {
				$this->session->set_flashdata('Error', 'No such account yet registered.');
				redirect(base_url('login'));
			} // End of Else

		}
			
		} // End of IF
		}
	
	public function setnewpassowrd(){
		if($this->input->post('old')){
      // print_r($this->input->post('opwd'));exit;
			$oldPassword = $this->input->post('old');
			$newPassword = $this->input->post('new');
			$confirmPassword = $this->input->post('confirm');
			$admindata = $this->db->get_where('admin',array("email" => $this->session->userdata('admin_id')));
        // print_r($admindata->row());exit;
			$data = $admindata->row();
        // print_r($data);exit;
			if($data->password == $oldPassword){
          // print_r($data->password.'=='.$oldPassword);exit;
				$this->db->set('password', $confirmPassword);
				$this->db->where('email', $this->session->userdata('admin_id'));
				$this->db->update('admin');
				$this->session->unset_userdata('admin_id');
				$this->session->set_flashdata('password-changed-success','Password changed successfully. Please Login with New Password');
				redirect('login');

			}else{
				$this->session->set_flashdata('fail-to-change-password','Old password didn\'t match');
				redirect(base_url());
			}
		}
	}
	public function nurseryLogin(){
    	//print_r('expression');exit;
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		// LOGIN FORM VALIDATION		
		if($this->form_validation->run() == TRUE){
//print_r($_POST['email']);exit;
			$nursery = $this->db->where('userid',$_POST['email'])->get('nursery');		
			if ($nursery->num_rows() > 0 ) {
				$userdata = $nursery->row();
				
				if($userdata->password == $_POST['password']){

					$_SESSION['nursery_id'] = $userdata->userid;
                    $_SESSION['nurseryUser'] = $userdata->nursery_id;
					$this->session->set_flashdata("success","You are loggin in.");
					if($this->input->get('redirect')){
						redirect($this->input->get('redirect'));
					}else{
						redirect(base_url('nursery-home'));
					}
					// header('location:'.base_url().'author/dashboard');
				} else {
					$this->session->set_flashdata('Error', 'You have entered wrong password');
					redirect(base_url('nursery-login'));
				}
			}
			else {
				$this->session->set_flashdata('Error', 'No such account yet registered.');
				redirect(base_url('nursery-login'));
			} // End of Else
		} // End of IF
	}

	public function setnurserypassowrd(){
		if($this->input->post('old')){
      // print_r($this->input->post('opwd'));exit;
			$oldPassword = $this->input->post('old');
			$newPassword = $this->input->post('new');
			$confirmPassword = $this->input->post('confirm');
			$nurserydata = $this->db->get_where('nursery',array("userid" => $this->session->userdata('nursery_id')));
        // print_r($admindata->row());exit;
			$data = $nurserydata->row();
        // print_r($data);exit;
			if($data->password == $oldPassword){
          // print_r($data->password.'=='.$oldPassword);exit;
				$this->db->set('password', $confirmPassword);
				$this->db->where('userid', $this->session->userdata('nursery_id'));
				$this->db->update('nursery');
				$this->session->unset_userdata('nursery_id');
				$this->session->set_flashdata('password-changed-success','Password changed successfully. Please Login with New Password');
				redirect('login');

			}else{
				$this->session->set_flashdata('fail-to-change-password','Old password didn\'t match');
				redirect(base_url('nursery-home'));
			}
		}
	}

		public function customerLogin(){
    	//print_r('expression');exit;
		$this->form_validation->set_rules('adhaar','Aadhaar','required');
		//$this->form_validation->set_rules('password','Password','required');
		// LOGIN FORM VALIDATION		
		if($this->form_validation->run() == TRUE){
//print_r($_POST['email']);exit;
			$checkUser = $this->db->where('aadhaar_no',$this->input->post('adhaar'))->get('customers');		
			if ($checkUser->num_rows() > 0 ) {
				$checkUser = $checkUser->row();
			
				if($checkUser->aadhaar_no == $_POST['adhaar']){
				    
            // $nursery=$this->db->where('customer_aadhaar',$this->input->post('adhaar'))->get('orders');
           
               
                $_SESSION['cust_aadhaar'] = $this->input->post('adhaar');
					// $_SESSION['nursery_id'] = $checkNursery->nursery_id;
					$this->session->set_flashdata("success","You are loggin in.");
					if($this->input->get('redirect')){
						redirect($this->input->get('redirect'));
					}else{
						redirect(base_url('customer-home'));
					}
           
				// header('location:'.base_url().'author/dashboard');
				} else {
					$this->session->set_flashdata('Error', 'You have entered wrong aadhaar no');
					redirect(base_url('customer-login'));
				}
			}
			else {
				$this->session->set_flashdata('Error', 'No such account yet registered.');
				redirect(base_url('customer-login'));
			} // End of Else
		} // End of IF
	}

}?>