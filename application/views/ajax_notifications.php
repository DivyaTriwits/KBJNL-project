<li class="nav-item dropdown" id="notification_window" role="presentation">
</li>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<?php $username=''; if($this->session->userdata('nursery_id')!='' ) {  $username = $this->session->userdata('nursery_id'); }  ?>
<script>
$(document).ready(function()
{
    window.setInterval(function()
    {
        ajaxCall();
    }, 3000);

    ajaxCall();
    function ajaxCall()
    {
        $.ajax({url: "<?php echo base_url('Notification/get/'.urlencode($username)); ?>", success: function(result)
        {
            // console.log(result);
                $("#notification_window").html(result);
        }
    });
    }

    $('#notification_window').click(function()
    {
        $.ajax({url: "<?php echo base_url('Notification/readAll/'.urlencode($username)); ?>"});
    });
});
</script>