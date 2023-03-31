                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Confirm Orders</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('orders-page')?>">Orders</a></li>
                                <li class="breadcrumb-item">Confirm Orders</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
<?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 4000);</script>
                <?php }?>
                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Customer Name</th>
                                                 <th>Phone No.</th>
                                                 <th>Aadhaar No.</th>
                                                
                                                <th> Date</th>
                                                
                                                <th>Delivery Status</th>
                                                <th>Rescheduled</th>
                                                <th>Saplings</th>
                                                
                                                <th> Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i=1; $total=0; foreach($pending as $o){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $o->full_name;?></td>
                                                <td align="right"><?php echo $o->mobile_no;?></td>
                                                <td align="right"><?php echo $o->aadhaar_no;?></td>
                                            
                                               
                                               <td align="right"><?php echo $o->ordered_date;?></td>
                                               
                                              <td><button data-toggle="modal" data-target="#editSapling"  onclick="setDataFunction('<?php echo $o->order_id; ?>',
                      )" type="button" class="btn btn-danger btn-sm rounded-btn" style="height: 20px; padding-top: 2px; background-color: red">Pending</button></td>
                                              <td><button data-toggle="modal" data-target="#schedule"  onclick="setTimeFunction('<?php echo $o->order_id; ?>',
                      )" type="button" class="btn btn" style="background-color: #66CD00; color: white">Reschedule</button></td>
                                               <td><a href="<?php echo base_url('view-orders-details/'.$o->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
                                               
                                                     <td><a href="<?php echo base_url('customer-details/'.$o->order_id)?>"><button type="button" class="btn btn-success btn-sm">Customer</button></a>
                                                      <a href="<?php echo base_url('view-payments/'.$o->order_id)?>"><button type="button" class="btn btn-success btn-sm">Payment</button></a>
                                                   <?php if($o->accept_reject == 1){
                                                    ?>
                                                 <a target="_blank" href="<?php echo base_url('customer-invoice/'.$o->order_id)?>"><button type="button" class="btn btn-success btn-sm">Invoice</button></a>
                                                <?php }?>
                                                 </td>
                                            </tr>
                                            <?php $i++;
                                    }?>
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>

               <div class="modal fade" id="editSapling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Receive order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('receive-orders')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="id" id="id">
                                                    Are you sure you this order is received?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Received</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

               <div class="modal fade" id="schedule" abindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reschedule order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('order-reschedule')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="sid" id="sid">
                                                Are you sure you want to reschedule this order?
                                                   <!-- <div class="col-md-12 mb-3">
                                                        <label>Date</label>
                                                         <input type="date" class="form-control" id="name" placeholder="Sapling" name="date" value="" required>
                                                        
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Reschedule</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                               <script>
                                    function setDataFunction(id){
                                       $('#id').val(id);

                                   }
                               </script>
                               <script>
                                 function setTimeFunction(id){
                                  //alert(id);
                                       $('#sid').val(id);

                                   }
                               </script>
<script>
  $(document).ready(function(){
    $('#addVariety').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        date: {

          validators: {
            notEmpty: {
              message: 'The date is required'
            }
          }
        },
      time: {

          validators: {
            notEmpty: {
              message: 'The time is required'
            }
          }
        },
      }
    })
  });

</script>
