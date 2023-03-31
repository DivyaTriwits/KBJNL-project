                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Order Details</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Order Details</li>
                                
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
                                            $amount = $total;
                                        // setlocale(LC_MONETARY, 'en_IN');
                                     // $amount = money_format('%!i', $amount);
                                       // echo $amount;
                                            ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $o->sapling;?></td>
                                                <td align="right"><?php echo $o->bagsize;?></td>
                                                <td align="right"><?php echo $o->price;?></td>
                                                <td align="right"><?php echo number_format($o->ordered_quantity);?></td>
                                               <td align="right"><?php echo $amount;?></td>
                                               
                                            </tr>
                                            <?php $i++;
                                    }?>
                                           </tbody>
                                          <tfoot>
                                              <tr>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <?php  $gamount = $totalCost;
                                         //setlocale(LC_MONETARY, 'en_IN');
                                     // $gamount = money_format('%!i', $gamount);
                                       // echo $gamount;
                                       ?>
                                                  <td align="right">Total</td>
                                                  <td align="right"><?php echo number_format($totalqty)?></td>
                                                  <td align="right"><?php echo $gamount?></td>
                                              </tr>
                                          </tfoot>
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
