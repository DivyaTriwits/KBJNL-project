                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Stock Status</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Stock Status</li>
                                
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
                                                <th>Sapling</th>
                                                <th>Bag Size</th>
                                                 <th>Quantity</th>
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                            $total=0;
                                           
                                             foreach($stocks as $s){
                                             $total+=$s->closing_stock;
                                                 ?>
                                                 
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $s->sapling?>
                                  </td> 
                                <td align="right"><?php echo $s->bagsize;?></td>
                                                <td align="right"><?php echo number_format($s->closing_stock);?></td>
                                              
                                               
                                            </tr>

                                            <?php $i++; }?>
                                        </tbody>
                                       <tfoot>
                                           <tr>
                                               
                                               <td align="right" colspan="3">Total Stock</td>
                                               <td align="right" ><?php echo number_format($total);?></td>
                                           </tr>
                                       </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
