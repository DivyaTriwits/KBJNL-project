
<main>
    <div class="container-fluid site-width">
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"><?php if($this->session->userdata('lang')=='EN') { ?>
                        <h4 class="mb-0">Cart</h4>
                      <?php } else {?>
                        <h4 class="mb-0">ಕಾರ್ಟ್</h4>
                         <?php }?>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('customer-home')?>">
                            <?php if($this->session->userdata('lang')=='EN') { ?>
                        Varieties
                        <?php } else {?>
                            ವೈವಿಧ್ಯಗಳು
                            <?php }?>
                    </a></li>
                        <li class="breadcrumb-item active"><a href="#"><?php if($this->session->userdata('lang')=='EN') { ?>
                        Cart
                     <?php } else {?>
                        ಕಾರ್ಟ್
                            <?php }?></a></li>
                    </ol>
                </div>
            </div>
        </div>
        <?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success alert-dismissible" style="text-align: center;margin: 5px auto;">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4>Success!</h4>
      <?php echo $this->session->flashdata('success'); ?>
    </div>
  <?php }?>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-xl-7 mb-4 mb-xl-0">
                                <table class="table table-bordered mb-0 table-responsive d-block border-bottom-0 border-top-0 border-left-0 border-right-0">
                                    <thead>
                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                        <tr class="bg-transparent">
                                            <td>Sl. No</td>
                                            <th class="border-bottom-0">Sapling</th>
                                            <th class="border-bottom-0">Price</th>
                                            <th class="border-bottom-0">Quantity</th>
                                            <th class="border-bottom-0">Remove</th>
                                        </tr>
                                    <?php } else {?>
                                        <tr class="bg-transparent">
                                            <td>Sl. No</td>
                                            <th class="border-bottom-0">ಸಸಿ</th>
                                            <th class="border-bottom-0">ಬೆಲೆ</th>
                                            <th class="border-bottom-0">ಪ್ರಮಾಣ</th>
                                            <th class="border-bottom-0">Remove</th
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
                                                    <input type="hidden" name="mid" id="mid" value="<?php echo $maximum?>">
                                                     <input type="hidden" name="cid" id="cid" value="<?php echo $cartQty?>">
                                                  <!--   <input min="1" max="<?php echo $maxQty?>" onchange="updateQuantity(this.value,'<?php echo $eachProduct->id?>','<?php echo $eachProduct->nursery_id?>','<?php echo $eachProduct->sapling_id?>','<?php echo $eachProduct->bag_id?>')" type="number" class="form-control" value="<?php echo $eachProduct->quantity?>"> -->
                                                     <select class="form-control" onchange="updateQuantity(this.value,'<?php echo $eachProduct->id?>','<?php echo $eachProduct->nursery_id?>','<?php echo $eachProduct->sapling_id?>','<?php echo $eachProduct->bag_id?>')"  id="quantity" name="quantity" >
                  
                                              <?php for($i = 1; $i <=  $maxQtyValue; $i++){?>
                                             <option <?php if(isset($eachProduct->quantity)){if($i == $eachProduct->quantity){echo 'selected ';}}?> value="<?php echo $i;?>"><?php echo $i;?></option>
                                             <?php } ?>
                                               </select>
                                                </td>
                                                <td class="align-middle"><a href="<?php echo base_url('delete-cart-product/'.$eachProduct->id)?>"><i class="icon-trash"></i></a>
                                              </td>
                                            </tr>
                                        <?php }?>
                                        
                                    </tbody>
                                </table>
                                <div class="clearfix mt-4">
                                    <div class="float-left">
                                        <a href="<?php echo base_url('cart')?>" class="btn btn-primary">
                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                        Update Cart
                                        <?php } else {?>
                                            ಕಾರ್ಟ್ ನವೀಕರಿಸಿ
                                            <?php }?>
                                        </a>

                                    
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-5">
                                <div class=" border mb-3">
                                    <div class="card-body border border-top-0 border-right-0 border-left-0">
                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                        <h4 class="f-weight-500 mb-0">Cart Total</h4>
                                        <?php } else {?>
                                            <h4 class="f-weight-500 mb-0">ಒಟ್ಟು ಕಾರ್ಟ್</h4>
                                            <?php }?>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <?php if($this->session->userdata('lang')=='EN') { ?>
                                                <p class="mb-0 dark-color f-weight-600">Total Saplings:</p>
                                                 <?php } else {?>
                                            <p class="mb-0 dark-color f-weight-600">ಒಟ್ಟು ಮೊತ್ತ:</p>
                                            <?php }?>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 dark-color f-weight-600 h4"><?php echo $totalQuantity?></p>
                                            </div>

                                        </div>
                                        <br>
                                          <div class="clearfix">
                                            <div class="float-left">
                                                <?php if($this->session->userdata('lang')=='EN') { ?>
                                                <p class="mb-0 dark-color f-weight-600">Total Amount:</p>
                                                 <?php } else {?>
                                            <p class="mb-0 dark-color f-weight-600">ಒಟ್ಟು ಮೊತ್ತ:</p>
                                            <?php }?>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 dark-color f-weight-600 h4"><?php echo $totalPrice?></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="clearfix d-sm-flex">
                                    <div class="float-left w-100 text-center text-sm-left mb-3">
                                        <a href="#" class="btn btn-primary">Process To Checkout</a>
                                    </div>
                                    <div class="float-right w-100 text-center text-sm-right">
                                        <p class="mb-0 h6"><a href="<?php echo base_url('customer-home')?>" class="btn btn-success"><i class="icon-handbag h6"></i> Continue Shopping</a></p>
                                    </div>
                                </div> -->
                            </div>
                        </div>



                    </div>
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
                                <div class="card-body border border-top-0 border-right-0 border-left-0">
                                    <?php if($this->session->userdata('lang')=='EN') { ?>
                                    <h4 class="f-weight-500 mb-0">Confirm</h4>
                                     <?php } else {?>
                                <h4 class="f-weight-500 mb-0">ಖಚಿತಪಡಿಸಿ</h4>
                                        <?php }?>
                                </div>

                                <div class="card-body">
                                    <div class="clearfix">
                                        <form method="post" action="<?php echo base_url('confirm-customer-order')?>" enctype="multipart/form-data">
                                            <div class="float-center">
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="inputState">Select</label>
                                                        <?php } else {?>
                                                           <label for="inputState"> ಪಾವತಿ ಮೋಡ್</label>
                                                            <?php }?>
                                                        <select name ="organisation" required 
                                                        id="inputState" class="form-control" onchange = "ShowHideDiv()">
                                                            <option selected disabled>Select</option>
                                                            <option value="Organisation">Organisation</option>
                                                            <option value="Farmer">Farmer</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="payment_reference_id">Aadhaar Card</label>
                                                        <?php } else {?>
                                                          <label for="payment_reference_id">ಆಧಾರ್ ಕಾರ್ಡ್</label>
                                                            <?php }?>
                                                        <input required type="file" name="aadhaarcrad" class="form-control rounded" id="payment_reference_id" >
                                                    </div>


                                                    <div class="form-group col-md-4" id="dvPassport" style="display: none">
                                                        <?php if($this->session->userdata('lang')=='EN') { ?>
                                                        <label for="delivery_address">RTC (Uttara)</label>
                                                        <?php } else {?>
                                                           <label for="delivery_address">ಆರ್ಟಿಸಿ</label>
                                                            <?php }?>
                                                        <input  type="file" name="uttara" class="form-control rounded" id="payment_reference_id" >
                                                            

                                                        </textarea>
                                                    </div>


                                                </div> 
                                            </div>
                                            <div class="float-left w-100 text-center text-sm-left mb-3">
                                                <button type="submit" href="#" class="btn btn-primary">
                                                 <?php if($this->session->userdata('lang')=='EN') { ?>
                                                    Process To Checkout
                                             <?php } else {?>
                                               ಚೆಕ್.ಟ್ ಮಾಡಲು ಪ್ರಕ್ರಿಯೆ
                                                            <?php }?></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix d-sm-flex">
                                <div class="float-right w-100 text-center text-sm-right">
                                    <p class="mb-0 h6"><a href="<?php echo base_url('customer-home')?>" class="btn btn-success"><i class="icon-handbag h6"></i> <?php if($this->session->userdata('lang')=='EN') { ?>
                                     Continue Shopping
                                        <?php } else {?>
                                            ಕೊಳ್ಳುವಿಕೆಯನ್ನು ಮುಂದುವರೆಸಿರಿ
                                                            <?php }?>
                                    </a></p>
                                </div>
                            </div>
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
<script>
    function updateQuantity(thisValue,id,nurseryId,saplingId,bagId){
     //alert(id);
     totalSap = document.getElementById('quantity').value;
     maxQty=document.getElementById('mid').value;
     cartQuantity=document.getElementById('cid').value;
     total = maxQty-cartQuantity;
     if(totalSap <= total && maxQty >= total){
     //alert(total);
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
