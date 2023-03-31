 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Loss Sapling</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                 <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('nursery-home')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('losses')?>">Loss</a></li>
                                <li class="breadcrumb-item active"><a href="#">View Loss Sapling</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('view-losses')?>"><button type="button" class="btn btn-success btn-sm" style="background-color: #66CD00; border-color:  #66CD00 " >View Loss</button></a>
                                  </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
             
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
                                                <th>Reason</th>
                                                <th>Loss Quantity</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                         
                                            $total=0;
                                             foreach($loss as $loss){                       
                                             // print_r($stockData);exit;
                                             $total+=$loss->qty;
                                                ?>
                                            
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                             
                                          <td><?php echo $loss->sapling?>
                                                            </td>
                                  
                                                <td align="right"><?php echo $loss->bagsize?></td>
                                                <td align="right"><?php echo $loss->loss_type?></td>
                                                 <td align="right"> <?php echo number_format($loss->qty)?></td> 
 
                                                
                                              
                                            </tr>
                                            <?php $i++; }?>
                                           
                                        </tbody>
                                       <tfoot>
                                         <tr>
                                           <td align="right" colspan="4">Total</td>
                                           
                                           <td align="right"><?php echo $total?></td>
                                          
                                         </tr>
                                       </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->

