<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// MODEL TO SEND NOTIFICATIONS TO USERS
class Notify_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
    //  NOTIFICATIONS DASHBOARD
    public function put_notification($id,$subject,$message,$deliver_to,$navigation_url,$notification_datetime,$read_status)
    {
        $data = array(
            'id' => $id,
            'subject' => $subject,
            'message' => $message,
            'deliver_to' => $deliver_to,
            'navigation_url' => $navigation_url,
            'notification_datetime'=>$notification_datetime,
            'read_status'=>$read_status);
        $this->db->insert('notifications',$data);
    } // End of insertInnerNotification
    // LOAD INNER NOTIFICATIONS
    public function get_notifications($id)
    {
        $this->db->select('*')->order_by('id','DESC');
        $this->db->from('notification');
        $this->db->where('deliver_to',$id);
        return $this->db->get();
    }  // End of Inner Notifications
    // GET NOTIFICATIONS WINDOW
    public function get_notification_window($id)
    {

        // WITHOUT AJAX
       /* $data = $this->notify_model->get_notifications($user_id);
        $this->load->view('public/inner_notifications',array('notificationData' => $data));*/

        // WITH AJAX
        $this->load->view('ajax_notifications',array('deliver_to' => $id));

    }// End of get_notification_window 

    public function get_for_admin_notification_window()
    {

        // WITHOUT AJAX
       /* $data = $this->notify_model->get_notifications($user_id);
        $this->load->view('public/inner_notifications',array('notificationData' => $data));*/

        // WITH AJAX
        $this->load->view('admin/ajax_notifications');

    }
    public function get_for_admin_notifications()
    {
        $this->db->select('*')->order_by('date','DESC');
        $this->db->from('notification');
        
        return $this->db->get();
    } 
    //The argument $time_ago is in timestamp (Y-m-d H:i:s)format.
	//Function definition

    public function timeAgo($time_ago)
    {
    	$time_ago = strtotime($time_ago);
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60)
        {
          return "just now";
        }
        //Minutes
        else if($minutes <=60)
        {
        	if($minutes==1)
        	{
        		return "one minute ago";
            }
            else
            {
            	return "$minutes minutes ago";
            }
        }
        //Hours
        else if($hours <=24)     
        {
        	if($hours==1)
        	{
        		return "an hour ago";
        	}
        	else
        	{
        		return "$hours hrs ago";
        	}
        }
        //Days
        else if($days <= 7)
        {
        	if($days==1)
        	{
        		return "yesterday";
        	}
        	else
        	{
                return "$days days ago";
            }
        }
        //Weeks
        else if($weeks <= 4.3)
        {
        	if($weeks==1)
        	{
        		return "a week ago";
        	}
        	else
        	{
        		return "$weeks weeks ago";
        	}
        }
        //Months
        else if($months <=12)
        {
        	if($months==1)
        	{
        		return "a month ago";
        	}
        	else
        	{
        		return "$months months ago";
        	}
        }
        //Years
        else
        {
        	if($years==1)
        	{
        		return "one year ago";
        	}
        	else
        	{
        		return "$years years ago";
        	}
        }
    } // End of Time Ago Function
    public function getReminderDate($date)
    {
    	return $this->db->where('reminder_datetime',$date)->get('reminders');
    }




    public function getTaskForNotification($id,$notification_status)
    {

        $result=$this->db->query("select * from task join employeedetails on employeedetails.id = task.employeeid 
        
        where task.notification_status='$notification_status' and employeedetails.email='$id';
        ");

        
        return $result;
    }


    public function changeTaskNotificationStatus($id,$notification_status)
    {
        $data=array(

            'notification_status'=>$notification_status
        );

        $this->db->where('email',$id);
        $empId=$this->db->get('employeedetails')->row();

        $userId=$empId->id;
        $this->db->set($data);
        $this->db->where('employeeid',$userId);
        $result=$this->db->update("task",$data);
        return $result;

    }



    public function getDataFromNotificationTable($id,$notification_status)
    {

        

        $result=$this->db->query("select *  from push_notification
        
        where notification_push_status='$notification_status' and notification_to='$id'
        ");

        
        return $result;


    }
    








    public function changeNotificationStatus($id,$notification_status)
    {
        $data=array(

            'notification_push_status'=>$notification_status
        );

        // $this->db->where('email',$id);
        // $empId=$this->db->get('employeedetails')->row();

       // $userId=$empId->id;
       
        $this->db->set($data);
        $this->db->where('notification_to',$id);
        $result=$this->db->update("push_notification",$data);
        return $result;

    }






} // End of Notify Model
?>