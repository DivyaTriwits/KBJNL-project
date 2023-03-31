<main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Certificate</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                
                                <li class="breadcrumb-item active"><a href="#">Certificate</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

               


                <!-- START: Card Data-->
                <div class="row ">
                  
                    <div class="col-12 col-lg-10 mt-3 pl-lg-0">
                        <div class="card border h-100">
 <div class="card-header d-flex justify-content-between align-items-center">                               
                                                <a href="#" class="bg-primary float-left mr-3  py-1 px-2 rounded text-white back-to-invoice" >
                                                    Print
                                                </a>                               
                                            </div>
                            <div class="" id="hello">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0">
                                           
                                            <div class="card-body table-responsive">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td><address>
                                                                    <strong>From</strong><br>
                                                                    O/o The Chief Engineer,KBJNL, Dam Zone, Almatti </address>
                                                                <b>Telephone:</b>9886351288<br>
                                                                <b>E-Mail:</b> cedam_almatti@yahoo.com<br>
                                                                <b>Web Site:</b> <a href="#">http://abc.com</a></td>
                                                            <td><b>Date Added:</b> <?php echo $reserve->date; ?><br>
                                                                <!-- <b>Order ID:</b> 3135<br> -->
                                                                <b>Paid Amount:</b> <?php echo $reserve->amount; ?><br>
                                                                <!-- <b>Shipping Method:</b> Flat Shipping Rate<br> -->
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td style="width: 50%;"><b>To</b></td>
                                                            <td style="width: 50%;"><b>Reserve Details</b></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><address>
                                                                 <b> Name : </b> <?php echo $reserve->customer_name; ?><br>
                                                                 <b> Aadhaar No. : </b><?php echo $reserve->customer_aadhaar; ?><br>
                                                                 <b> Mobile No. : </b><?php echo $reserve->mobile; ?> </address></td>
                                                            <td><address>
                                                                   <b> Year : </b> <?php echo $reserve->year; ?><br>
                                                                   <b> Month : </b><?php echo $reserve->month; ?> </address></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="card border-0">
                                            <div class="card-body table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <td><b>Variety</b></td>
                                                            <td><b>Sapling</b></td>
                                                            <td class="text-right"><b>Quantity</b></td>
                                                            <td class="text-right"><b>Unit Price</b></td>
                                                            <td class="text-right"><b>Total</b></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $total=0;
                                                        foreach($sapling as $s){
                                                            $total+=$s->qty * $s->price;
                                                            ?>
                                                        <tr>
                                                            <td><?php echo $s->variety?> 
                                                            </td>
                                                            <td><?php echo $s->sapling?> (<?php echo $s->bagsize?>) </td>
                                                            <td class="text-right"><?php echo $s->qty?></td>
                                                            <td class="text-right"><?php echo $s->price?></td>
                                                            <td class="text-right"><?php echo $s->qty 
                                                            * $s->price;?></td>
                                                        </tr>
                                                    <?php }?>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><b>Total</b></td>
                                                            <td class="text-right"><?php echo $total?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><b>Paid Amount</b></td>
                                                            <td class="text-right"><?php echo $reserve->amount; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><b>Grand Total</b></td>
                                                            <td class="text-right"><?php echo $total -$reserve->amount;?></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>


                          
                        </div>
                    </div>
                </div>
                <!-- END: Card DATA-->
            </div>
        </main>

         <script type="text/javascript">
        
    function codespeedy(){
      var print_div = document.getElementById("hello");
var print_area = window.open();
print_area.document.write(print_div.innerHTML);
print_area.document.close();
print_area.focus();
print_area.print();
print_area.close();
// This is the code print a particular div element
    }
  </script>