<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookie_model extends CI_Model {
	
    public function displayCookie() { 
        if($this->input->post('lan')){
            $language = $this->input->post('lan');
            $_SESSION['lang'] = $language;
            // print_r($_SESSION['lang']);exit;
            redirect(base_url($this->input->post('route')));
        }
    } 
}
?>