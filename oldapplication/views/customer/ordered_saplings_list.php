<main>
    <div class="container-fluid site-width">
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">

                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center">                               
                        <h4 class="card-title">Order Id: <?php echo $this->uri->segment(2)?></h4> 
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered" >
                                <thead>
                                    <?php if($this->session->userdata('lang')=='EN') { ?> 
                                    <tr>
                                        <th>Nursery</th>
                                        <th>Sapling</th>
                                       
                                        <th>Price/Unit</th>
                                         <th>Quantity</th>
                                        <th>Sub total</th>
                                    </tr>
                                    <?php } else {?>
                                        <tr>
                                        <th>ನರ್ಸರಿ</th>
                                        <th>ಸಸಿಗಳು</th>
                                        
                                        <th>ಬೆಲೆ/ಘಟಕ</th>
                                        <th>ಪ್ರಮಾಣ</th>
                                        <th>ಉಪ ಒಟ್ಟು</th>
                                    </tr>
                                <?php }?>
                                </thead>
                                <tbody>

                                    <?php $totalQty= 0 ; $totalAmt = 0;foreach ($orderedSaplings as $eachOrder) { 
                                        $totalQty += $eachOrder->ordered_quantity;
                                        $totalAmt += $eachOrder->price_per_unit * $eachOrder->ordered_quantity;
                                       
                                        ?>
                                        <tr>
                                            <td><?php echo $eachOrder->nursery_name?></td>
                                            <td><?php echo $eachOrder->sapling?> (<?php echo $eachOrder->bagsize?>) </td>
                                             <td align="right"><?php echo $eachOrder->price_per_unit?></td>
                                            <td align="right"><?php echo $eachOrder->ordered_quantity?></td>
                                           
                                            <td align="right"><?php echo $eachOrder->price_per_unit * $eachOrder->ordered_quantity?></td>
                                            
                                        </tr>
                                    <?php }?>
                                   
                                    
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <td></td>
                                        <td></td>
                                       
                                         <?php if($this->session->userdata('lang')=='EN') { ?> 
                                        <td align="right"><b>Total</b></td>
                                        <?php } else {?>
                                       <td align="right"><b> ಒಟ್ಟು</b></td>
                                        <?php }?>
                                        <td align="right"><?php echo $totalQty?></td>
                                         <td align="right"><?php echo $totalAmt?></td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div> 

            </div>                  
        </div>
    </div>
</main>