<?php if($notificationData->num_rows() > 0): ?>
      <?php $ind = 0; foreach($notificationData->result() as $row): ?>

      <li>
       
                           
                                        <a class="dropdown-item px-2 py-2 border border-top-0 border-left-0 border-right-0" href="<?php echo base_url('all-orders')?>">
                                            <div class="media" >
                                                
                                                <div class="media-body">
                                                    <p class="mb-0 text-success">New Order from <?php echo $row->from_msg;?> </p>
                                                    <?php echo $this->Notify_model->timeAgo($row->date); ?>
                                                </div>
                                            </div>
                                            </a>
                                            <?php if($ind == 3) break; $ind++; endforeach; ?>
        <?php else: ?>
            <!-- Message -->
            <a href="javascript:void(0)">
                No New Notifications
            </a>
        <?php endif; ?>
                                        
                                        
         
                                    </li>
     
<?php
$notificationCount = 0;
foreach($notificationData->result() as $row){
  if($row->read_status == 0){
    $notificationCount++;
} 
}  
?>
<?php if($notificationCount > 0){?>
<script>
    $('.noti').addClass('heartbit');
    $('.pt').addClass('point');
    
</script>
<?php }?>