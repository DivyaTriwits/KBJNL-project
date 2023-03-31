                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order List</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item">Order List</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

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
                                                <th>Nursery</th>
                                                <th>Customer Name</th>
                                                <th>Adhaar No.</th>
                                                <th>Survey No.</th>
                                                <th>Phone No.</th>
                                                <th>Water Source</th>
                                                <th>Extend of Land</th>
                                                <th>Place</th>
                                              
                                              
                                                <th>Status</th>
                                                <th>Saplings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($shop as $s){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $s->nursery_name?></td>
                                                 <td><?php echo $s->name?></td>
                                                 <td><?php echo $s->adhaar?></td>
                                                 <td><?php echo $s->servey_number?></td>
                                                  <td><?php echo $s->phone?></td>
                                                 <td><?php echo $s->water_source?></td>
                                                 <td><?php echo $s->extend_land?></td>
                                                 <td><?php echo $s->place?></td>
                                                
                                               <?php if($s->order_status == 0) {?>
                                               <td><a >Pending</a></td>
                                           <?php } else {?>
                                            <td><a >Done</a></td>
                                           <?php }?>
                                               <td><a href="<?php echo base_url('view-orders-details/'.$s->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
                                            </tr>
                                        <?php $i++; }?>
                                            
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
