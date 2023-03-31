                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Rescheduled Orders</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Rescheduled Orders</li>
                                
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
                                                  <th>Place</th>
                                               <th>Slot Date</th>
                                               <th>Slot Time</th>
                                                <th>Order Date</th>
                                                
                                                <th>Status</th>
                                              
                                                <th>Saplings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i=1; $total=0; foreach($reschedule as $o){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $o->full_name;?></td>
                                                <td align="right"><?php echo $o->mobile_no;?></td>
                                                <td><?php echo $o->place;?></td>
                                                <td align="right"><?php echo $o->slot_date;?></td>
                                                <td><?php echo $o->slot_time;?></td>
                                               
                                               <td align="right"><?php echo $o->ordered_date;?></td>
                                               
                                              <td><button data-toggle="modal" data-target="#editSapling"  onclick="setDataFunction('<?php echo $o->order_id; ?>',
                      )" type="button" class="btn btn-danger btn-sm rounded-btn" style="height: 20px; padding-top: 2px; background-color: red">Pending</button></td>
                                             
                                               <td><a href="<?php echo base_url('order-details/'.$o->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
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
                                            <form class="needs-validation" method="post" action="<?php echo base_url('nursery-reschedule-received')?>">
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
                                                   <div class="col-md-12 mb-3">
                                                        <label>Date</label>
                                                         <input type="date" class="form-control" id="name" placeholder="Sapling" name="date" value="" required>
                                                        
                                                    </div>
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
