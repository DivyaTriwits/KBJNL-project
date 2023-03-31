<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends CI_Controller 
{
    public function get($id)
    {
        if(!$this->session->userdata('nursery_id'))
            redirect('nursery-login');
        $id = urldecode($id);
        $this->load->model('notify_model');
        $data = $this->notify_model->get_notifications($id);
        $this->load->view('inner_notifications',array('notificationData' => $data));
    } // End of Function index
    public function readAll($id)
    {   
        if(!$this->session->userdata('username'))
            redirect('login');

        $id = urldecode($id);
        $this->load->model('notify_model');
        $this->db->update('notifications',array('read_status' => '1'),array('deliver_to' => $id));
    } // End of Function readAll


     
} 
// End of Notification Controller
?>