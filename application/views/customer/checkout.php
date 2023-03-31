
<main>
    <div class="container-fluid site-width">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><?php if($this->session->userdata('lang')=='EN') { ?>
                        <h4 class="mb-0">Checkout</h4>
                      <?php } else {?>
                        <h4 class="mb-0">ಚೆಕ್ಔಟ್</h4>
                         <?php }?>
                    </div>

                    <!--<ol class="breadcrumb bg-transparent align-self-center m-0 p-0">-->
                    <!--    <li class="breadcrumb-item"><a href="<?php echo base_url('customer-home')?>">-->
                    <!--        <?php if($this->session->userdata('lang')=='EN') { ?>-->
                    <!--    Varieties-->
                    <!--    <?php } else {?>-->
                    <!--        ವೈವಿಧ್ಯಗಳು-->
                    <!--        <?php }?>-->
                    <!--</a></li>-->
                    <!--    <li class="breadcrumb-item active"><a href="#"><?php if($this->session->userdata('lang')=='EN') { ?>-->
                    <!--    Cart-->
                    <!-- <?php } else {?>-->
                    <!--    ಕಾರ್ಟ್-->
                    <!--        <?php }?></a></li>-->
                    <!--</ol>-->
                </div>
            </div>
        </div>
            <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                          <!--   <div class="col-lg-12 col-xl-6">
                                <div class=" border mb-3">
                                    <div class="card-body border border-top-0 border-right-0 border-left-0">
                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                        <h6 class="f-weight-500 mb-0">Scan and make payment of Rs. <?php echo $totalPrice?></h6>
                                          <?php } else {?>
                                       <h6 class="f-weight-500 mb-0"> ಸ್ಕ್ಯಾನ್ ಮಾಡಿ ಮತ್ತು ಪಾವತಿ ಮಾಡಿ Rs. <?php echo $totalPrice?></h6>
                                   <?php }?>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="text-center">
                                               <img src="<?php echo base_url('website_assets/qr-sample.svg')?>">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div> -->
                           <div class="col-lg-12 col-xl-12">
                            <div class=" border mb-3">
                                <!--<div class="card-body border border-top-0 border-right-0 border-left-0">-->
                                <!--    <?php if($this->session->userdata('lang')=='EN') { ?>-->
                                <!--    <h4 class="f-weight-500 mb-0">Payment</h4>-->
                                <!--     <?php } else {?>-->
                                <!--<h4 class="f-weight-500 mb-0">ಖಚಿತಪಡಿಸಿ</h4>-->
                                <!--        <?php }?>-->
                                <!--</div>-->

                                <div class="card-body">
                                     <div class="row">
                                         <div class="col-lg-12 col-xl-6">
                                     <div class="table-responsive">
                            <table id="" class="display table dataTable  table-bordered" >
                                <thead>
                                    <?php if($this->session->userdata('lang')=='EN') { ?> 
                                    <tr>
                                        <td>Sl. No</td>
                                            <th class="border-bottom-0">Sapling</th>
                                            <th class="border-bottom-0">Price</th>
                                            <th class="border-bottom-0">Quantity</th>
                                    </tr>
                                    <?php } else {?>
                                        <tr>
                                         <td>Sl. No</td>
                                            <th class="border-bottom-0">ಸಸಿ</th>
                                            <th class="border-bottom-0">ಬೆಲೆ</th>
                                            <th class="border-bottom-0">ಪ್ರಮಾಣ</th>
                                    </tr>
                                        <?php }?>
                                </thead>
                               <tbody>
                                        <?php $index=0; $totalPrice=0; $totalQuantity=0; foreach ($cartProducts as $eachProduct) {
                                            $totalPrice += $eachProduct->quantity*$eachProduct->price;
                                            $totalQuantity +=$eachProduct->quantity;
                                            $cartQty=$this->Customer_model->getCartQty();
                                           // print_r($cartQty);exit;
                                            $maxQty = $this->Customer_model->getSaplingAvailableQty($eachProduct->nursery_id,$eachProduct->sapling_id,$eachProduct->bag_id);
                                            $maximum=$this->Customer_model->getMaxValue();
                                           
                                            if($maximum > $maxQty ){
                                                $maxQtyValue = $maximum - $maxQty;
                                            }else{
                                                $maxQtyValue = $maximum;
                                            }
                                            // print_r($maxQtyValue);exit;
                                            ?>
                                            <tr>
                                                <td><?php echo ++$index?></td>
                                                <td class="align-middle"><?php echo $eachProduct->sapling?> (<?php echo $eachProduct->bagsize?>)</td>
                                                <td class="align-middle"><?php echo $eachProduct->price?></td>
                                                <td class="w-25 align-middle">
                                                   <?php echo $eachProduct->quantity?>
                                                </td>
                                                <!--<td class="align-middle"><a href="<?php echo base_url('delete-cart-product/'.$eachProduct->id)?>"><i class="icon-trash"></i></a>-->
                                                <!--</td>-->
                                            </tr>
                                        <?php }?>
                                        
                                    </tbody>
                                    <tfoot>
                                          <tr>
                                              <td></td>
                                              <td align="right">Total</td>
                                              <td><?php echo $totalQuantity?></td>
                                               <td><?php echo $totalPrice?></td>
                                              </tr>
                                   <tfoot>

                            </table>
                        </div>   </div>
                                   
                                    <div class="col-lg-12 col-xl-6">
                                       
                                            <div class="float-center">
                                                 <div class="border mb-3">
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <h4 class="f-weight-500 mb-0">Bank Details</h4>
                                            </div>
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <p>Account Number</p>
                                                       
                                                    </div>
                                                    <div class="float-right">
                                                        <p>10803497801</p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <p class="dark-color ">IFS Code</p>
                                                       
                                                    </div>
                                                    <div class="float-right">
                                                        <p>SBIN0005751</p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <p class="dark-color ">Bank Name</p>
                                                       
                                                    </div>
                                                    <div class="float-right">
                                                        <p>State Bank Of India</p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <p class="dark-color ">UPI ID</p>
                                                       
                                                    </div>
                                                    <div class="float-right">
                                                        <p>8762490029@SBI</p>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                           
                                      
                                    </div>
                                    </div>
                                
                                    <div class="col-lg-12 col-xl-6">
                                       
                                            <div class="float-center">
                                                 <div class="border mb-3">
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <h4 class="f-weight-500 mb-0">Online Payment</h4>
                                            </div>
                                           
                                            
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                 <img src="<?php echo base_url()?>assets/onlinepay.png" alt="" style="max-width:50% !important">
                                                </div>
                                            </div>
                                            </div>
                                           
                                      
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                       
                                            <div class="float-center">
                                                 <div class="border mb-3">
                                            <div class="card-body border brd-gray border-top-0 border-right-0 border-left-0">
                                                <h4 class="f-weight-500 mb-0">Confirm</h4>
                                            </div>
                                          
                                            </div>
                                            <form method="post" action="<?php echo base_url('confirm-customer-order')?>" enctype="multipart/form-data">
                                            <div class="float-center">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="inputState">Select</label>
                                                        <?php } else {?>
                                                           <label for="inputState"> ಪಾವತಿ ಮೋಡ್</label>
                                                            <?php }?>
                                                        <select name = "organisation" required 
                                                        id="inputState" class="form-control" onchange = "ShowHideDiv()">
                                                            <option value="Organisation">Organisation</option>
                                                            <option value="Farmer">Farmer</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="payment_reference_id">Aadhaar Card</label>
                                                        <?php } else {?>
                                                          <label for="payment_reference_id">ಆಧಾರ್ ಕಾರ್ಡ್</label>
                                                            <?php }?>
                                                        <input required type="file" name="aadhaarcrad" class="form-control rounded" id="payment_reference_id" >
                                                    </div>


                                                    <div class="form-group col-md-6" id="dvPassport" style="display: none">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="delivery_address">RTC (Uttara)</label>
                                                        <?php } else {?>
                                                           <label for="delivery_address">ಆರ್ಟಿಸಿ</label>
                                                            <?php }?>
                                                        <input  type="file" name="uttara" class="form-control rounded" id="payment_reference_id" >
                                                            

                                                    </div>
                                   <div class="form-group col-md-6">
                                                       
                                                        <label for="inputState">Payment Mode</label>
                                                       <select required name="payment"  class="form-control rounded" id="paymentstate" onchange = "PaymentHideDiv()">
                                                        <option selected disabled>Select</option>
                                                       <option value="Cash">Cash</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Online">Online</option>
                                                       </select>
                                                       
                                                    </div>
                                           <div class="form-group col-md-6" id="dvproof" style="display: none">
                                                       
                                                        <label for="payment_reference_id">Proof</label>
                                                       
                                                        <input type="file" name="proof" class="form-control rounded" id="proof" >
                                                    </div>
                                                     <div class="form-group col-md-6" id="dvamount" style="display: none">
                                                       
                                                        <label for="payment_reference_id">Paid Amount</label>
                                                       
                                                        <input type="number" step="any" name="amount" class="form-control rounded" id="amount" >
                                                    </div>

                                                </div> 
                                            </div>
                                            
                                       <div class="float-right w-100 text-center text-sm-left mb-3">
                                                <button type="submit" href="#" class="btn btn-primary">
                                                 <?php if($this->session->userdata('lang')=='EN') { ?>
                                                   Place Order
                                             <?php } else {?>
                                               ಚೆಕ್.ಟ್ ಮಾಡಲು ಪ್ರಕ್ರಿಯೆ
                                                            <?php }?></button>
                                            </div>
                                            </form>
                                    </div>
                                    </div>
                                     
                                    </div>
                                   
                                </div>
                            </div>
                            <!--<div class="clearfix d-sm-flex">-->
                            <!--    <div class="float-right w-100 text-center text-sm-right">-->
                            <!--        <p class="mb-0 h6"><a href="<?php echo base_url('customer-home')?>" class="btn btn-success"><i class="icon-handbag h6"></i> <?php if($this->session->userdata('lang')=='EN') { ?>-->
                            <!--         Continue Shopping-->
                            <!--            <?php } else {?>-->
                            <!--                ಕೊಳ್ಳುವಿಕೆಯನ್ನು ಮುಂದುವರೆಸಿರಿ-->
                            <!--                                <?php }?>-->
                            <!--        </a></p>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      

    
</div>
</main>
<script type="text/javascript">
    function ShowHideDiv() {
        var inputState = document.getElementById("inputState");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = inputState.value == "Farmer" ? "block" : "none";
    }
</script>

<script type="text/javascript">
    function PaymentHideDiv() {
        var payments= document.getElementById("paymentstate");
        var dvamount = document.getElementById("dvamount");
        var dvproof= document.getElementById("dvproof");
        dvamount.style.display = payments.value != "Cash" ? "block" : "none";
        dvproof.style.display =payments.value != "Cash" ? "block" : "none";
    }
</script>
<script>
    function updateQuantity(thisValue,id,nurseryId,saplingId,bagId){
     //alert(id);
     totalSap = document.getElementById('quantity').value;
     maxQty=document.getElementById('mid').value;
     cartQuantity=document.getElementById('cid').value;
     total = maxQty-cartQuantity;
     if(totalSap <= total && maxQty >= total){
    // alert(total);
        $.ajax({
           type: "POST",
           url: '<?php echo base_url('update-cart-qty')?>',
           data: {id : id,
            quantity : thisValue,
            nurseryId : nurseryId,
            saplingId : saplingId,
            bagId: bagId
        },
        success: function(data)
        {
            location.reload();
            // console.log(data);
               // alert(); // show response from the php script.
           },
           error: function(data){
            // alert(data);
        }
    });
    }else {
        //alert('sorry you can order only 200 saplings');
        toastr.success('sorry you can order only 200 saplings');
        location.reload();
    }
}
</script>
