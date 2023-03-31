                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order List</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                               <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Order List</li>
                                
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
                                                <th>Adhaar No.</th>
                                                <th>Survey No.</th>
                                                <th>Phone No.</th>
                                                <th>Water Source</th>
                                                <th>Extend of Land</th>
                                                <th>Place</th>
                                                
                                                <th>Slot Date</th>
                                                <th>Slot Time</th>
                                                <th>Status</th>
                                                <th>Saplings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $total=0; foreach($acceptOrders as $o){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $o->name;?></td>
                                                <td><?php echo $o->adhaar;?></td>
                                                <td><?php echo $o->servey_number;?></td>
                                                <td><?php echo $o->phone;?></td>
                                                <td><?php echo $o->water_source;?></td>
                                                <td><?php echo $o->extend_land;?></td>
                                               <td><?php echo $o->place;?></td>
                                               
                                               <td><?php echo $o->slot_date;?> </td>
                                               <td><?php echo $o->time;?></td>
                                               <?php if($o->receive_status == 0){?>
                                               <td><button data-toggle="modal" data-target="#editSapling"  onclick="setDataFunction('<?php echo $o->order_id; ?>',
                      )" type="button" class="btn btn-danger btn-sm rounded-btn" style="height: 20px; padding-top: 2px; background-color: red">Pending</button></td>
                                           <?php } else {?>
                                            <td>
                                            <a  style="color: green">Received</a></td>
                                        <?php }?>
                                               <td><a href="<?php echo base_url('order-details/'.$o->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
                                            </tr>
                                             <?php $i++; }?>
                                           
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>

                               <!--Delete Modal -->
                                <div class="modal fade" id="editSapling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Receive order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('received-order')?>">
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

                                <script>
                                    function setDataFunction(id){
                                       $('#id').val(id);

                                   }
                               </script>