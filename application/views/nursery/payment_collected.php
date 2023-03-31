                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Payment Collected</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Payment Collected</li>
                                
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
                                                <th>Customer Name</th>
                                                <th>Adhaar No.</th>
                                                <th>Survey No.</th>
                                                <th>Phone No.</th>
                                                <th>sapling Quantity</th>
                                                <th> Amount</th>
                                                
                                                <th>Paid Date</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=0; 
                                            foreach($payment as $p){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $p->name?></td>
                                                <td><?php echo $p->adhaar?></td>
                                                <td><?php echo $p->servey_number?></td>
                                                <td><?php echo $p->phone?></td>
                                                <td><?php echo $p->sapling_qty?></td>
                                                <td><?php echo $p->pay_amount?></td>
                                               
                                               <td><?php echo $p->payment_date?></td>
                                               
                                            </tr>
                                            <?php $i++; }?>
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
