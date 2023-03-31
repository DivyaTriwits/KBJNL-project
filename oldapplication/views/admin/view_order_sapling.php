                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Sapling Details</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item">Sapling Details</li>
                                
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
                                                <th>Saplings</th>
                                                <th>Bag Size</th>
                                                <th>Cost Per Sapling</th>
                                                <th>Quantity</th>
                                                <th>Total Cost</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; $totalqty=0; $total=0; $totalCost=0; 
                                           foreach($order as $o){
                                           $totalqty+=$o->ordered_quantity;
                                          
                                           $total=$o->ordered_quantity*$o->price;
                                            $totalCost+=$total;
                                            ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $o->sapling;?></td>
                                                <td align="right"><?php echo $o->bagsize;?></td>
                                                <td align="right"><?php echo $o->price;?></td>
                                                <td align="right"><?php echo $o->ordered_quantity;?></td>
                                               <td align="right"><?php echo $total;?></td>
                                               
                                            </tr>
                                            <?php $i++;
                                    }?>
                                           </tbody>
                                          <tfoot>
                                              <tr>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                
                                                  <td align="right">Total</td>
                                                  <td align="right"><?php echo $totalqty?></td>
                                                  <td align="right">Rs. <?php echo $totalCost?></td>
                                              </tr>
                                          </tfoot>
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
