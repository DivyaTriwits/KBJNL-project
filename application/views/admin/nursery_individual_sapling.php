                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Individual Saplings By Nursery</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Individual Saplings By Nursery</li>
                               
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
                                                <th >Sl No.</th>
                                                <th>Nursery Name</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No.</th>
                                                <th>Sapling Name</th>
                                                <th>Bag Size</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                            foreach($individual as $ind){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $ind->nursery_name?></td>
                                                <td><?php echo $ind->customer?></td>
                                                <td align="right"><?php echo $ind->mobile?></td>
                                                <td><?php echo $ind->sapling?></td>
                                                <td align="right"><?php echo $ind->bagsize?></td>
                                                <td align="right"><?php echo number_format($ind->quantity)?></td>
                                                <td align="right"><?php echo $ind->date?></td>
                                              
                                               
                                            </tr>
                                           <?php $i++; }?>
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>




                            