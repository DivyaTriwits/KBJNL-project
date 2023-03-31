                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">All Orders</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('orders-page')?>">Orders</a></li>
                                <li class="breadcrumb-item">All Orders</li>
                                
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
                                                  <!-- <th>Place</th> -->
                                                <th>Adhaar No.</th>
                                                <!-- <th>Survey No.</th> -->
                                          <!--      
                                                <th>Water Source</th>
                                                <th>Extend of Land</th> -->
                                               
                                                <th>Date</th>
                                                
                                                <th>Status</th>
                                                <th>Saplings</th>
                                               
                                                <th>View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i=1; $total=0; foreach($orders as $o){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $o->full_name;?></td>
                                                <td align="right"><?php echo $o->mobile_no;?></td>
                                                <!-- <td><?php echo $o->place;?></td> -->
                                                <td align="right"><?php echo $o->customer_aadhaar;?></td>
                                             <!--    <td align="right"><?php echo $o->survey_number;?></td>
                                                <td><?php echo $o->water_source;?></td>
                                               <td><?php echo $o->extend_of_land;?></td> -->
                                               <td align="right"><?php echo $o->ordered_date;?></td>
                                               
                                              <?php if($o->accept_reject == 0){?>
                                               <td>  <div class="btn-group mb-3">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editSapling"  onclick="setDataFunction('<?php echo $o->order_id; ?>',
                      )">Accept</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deletevareity"  onclick="setrejectFunction('<?php echo $o->order_id; ?>',
                      )">Reject</a>
                                        
                                    </div>
                                </div></td>
                            <?php } elseif ($o->accept_reject == 1) {?>
                               <td><!-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#rejectOrder"  onclick="setFunction('<?php echo $o->order_id; ?>',
                      )">Accepted</button> --><a style="color: green">Order Confirm</a></td>
                           <?php } else {?>
                            <td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editSapling"  onclick="setDataFunction('<?php echo $o->order_id; ?>',
                      )">Rejected</button></td>
                           <?php }?>
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

                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="editSapling">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Set time slot</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('Admin_controller/updateSlot')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                Are you sure you want to accept this order?
                                               <!--  <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Date</label>
                                                         <input type="date" class="form-control" id="name" placeholder="Sapling" name="date" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Time</label>
                                                        <input type="text" class="form-control" id="location" placeholder="Ex: 11:00 AM to 12:00 PM" name="time" value="" required>
                                                        
                                                    </div>
                                                    
                                                </div> -->
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Submit</button>
                                               
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Delete Modal -->
                                <div class="modal fade" id="deletevareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('Admin_controller/rejectOrder')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="did" id="did">
                                                    Are you sure you want to reject this order?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Reject</button>
                                                
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal fade" id="rejectOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reject order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('Admin_controller/cancleOrder')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="rid" id="rid">
                                                    Are you sure you want to reject this order?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Reject</button>
                                                
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="payModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Add Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('add-payment')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="pid" id="pid">
                                                <div class="form-row">
                                                  <div class="col-md-6 mb-3">
                                                        <label for="">Payment Mode</label>
                                                      <!--   <input type="text" class="form-control" id="location" placeholder="Ex: 11:00 AM to 12:00 PM" name="time" value="" required> -->
                                                        <select class="form-control" required="" name="mode">
                                                          <option selected="" disabled=""> Select</option>
                                                          <option value="Cash">Cash</option>
                                                          <option value="Bank">Bank</option>
                                                          <option value="Online">Online</option>
                                                        </select>
                                                    </div>
                                                        <div class="col-md-6 mb-3">
                                                        <label>Pay Amount</label>
                                                         <input type="numer" step="any" class="form-control" id="amount" placeholder="" name="amount" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Payment Date</label>
                                                         <input type="date" class="form-control" id="date" placeholder="date" name="date" value="" required>
                                                        
                                                    </div>
                                               
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Submit</button>
                                               
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
                                function setrejectFunction(id){
                                 $('#did').val(id);
                                 
                             }
                         </script>
                         <script>
                                function setFunction(id){
                                   // alert(id);
                                 $('#rid').val(id);
                                 
                             }
                         </script>
                           <script>
                                    function setPaymentData(id){
                                       $('#pid').val(id);

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
