                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Revenue Generated</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('accounts')?>" >Account</a></li>
                                <li class="breadcrumb-item active">Revenue Generated</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
<?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 4000);</script>
                <?php }?>
                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                              <form method="GET" action="<?php echo base_url();?>revenue-generated" id="searchby">
                                            <div class="row">
                                              <div class="col-md-4"></div>
                                              <div class="col-md-4"></div>
                                            <div class="col-md-3">
                                                
                                                <select class="form-control" name="nursery">
                                                  <option disabled="" selected="">Select</option>
                                                  <?php foreach($nursery as $n){?>
                                                    <option value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                                  <?php }?>
                                                </select>
                                            </div>
                                            
                                            <!-- <input type="submit" name="submit" value="search"> -->
                                        <button type="submit" class="btn btn-info btn-sm"> Search</button>
                                        </div>
                                        </form>
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Order ID</th>
                                                <th>Nursery</th>
                                                 <th>Customer Name</th>
                                                  <th>Aadhaar Number</th>
                                               <th>Total Amount</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                             <?php $i=1;
                                             if($this->input->get('nursery')){ 
                                                $digitalSubTotal=0;
                                             foreach($digitalId as $r){
                                             $totalAmount = $this->db->where('order_id',$r->order_id)->get('ordered_saplings')->result();
                                             //print_r($totalAmount);exit;
                                             foreach ($totalAmount as $t) {
                                             $stotal= $t->ordered_quantity*$t->price_per_unit;
                                             $digitalSubTotal+=$stotal;
                                             
                                             }
                                             $digitalamount = $digitalSubTotal;
                                              //setlocale(LC_MONETARY, 'en_IN');
                                             // $totalamount = money_format('%!i', $digitalamount);
                                            //  echo $amount;
                                              ?>
                                             
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td align="right"><a href="<?php echo base_url('view-orders-details/'.$r->order_id)?>"><?php echo $r->order_id;?></a></td>
                                                <td><?php echo $r->nursery_name;?></td>
                                                <td><?php echo $r->full_name;?></td>
                                                <td align="right"><?php echo $r->aadhaar_no;?></td>
                                                <td align="right"><?php echo $digitalamount;?></td>
                                                
                                            </tr>
                                        
                                            <?php $i++;
                                    } } else {?>
                                   <?php $i=1; $revenueGrandTotal=0;
                                   foreach($revenue as $r){
                                       $revenueSubTotal=0;  
                                             $totalOrderAmount = $this->db->where('order_id',$r->order_id)->get('ordered_saplings')->result();
                                             //print_r($totalOrderAmount);exit;
                                             foreach ($totalOrderAmount as $t) {
                                             $total= $t->ordered_quantity*$t->price_per_unit;
                                             $revenueSubTotal+=$total;
                                             
                                           
                                            $revenueMoneyFormate = $revenueSubTotal;
                                            //  setlocale(LC_MONETARY, 'en_IN');
                                             // $revenueTotalamount = money_format('%!i', $revenueMoneyFormate);
                                            //  echo $amount;
                                            
                                             $revenueGrandTotal+=$revenueSubTotal;
                                             }
                                              ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td align="right"><a href="<?php echo base_url('view-orders-details/'.$r->order_id)?>"><?php echo $r->order_id;?></a></td>
                                                <td><?php echo $r->nursery_name;?></td>
                                                <td><?php echo $r->full_name;?></td>
                                                <td align="right"><?php echo $r->aadhaar_no;?></td>
                                                <td align="right"><?php echo $revenueMoneyFormate;?></td>
                                                
                                            </tr>


                                  <?php $i++; }?>
                                      <?php }?>
                                           </tbody>
                                           
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>

               <div class="modal fade" id="editSapling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Receive order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('received-order-reschedule')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="id" id="id">
                                                    Are you sure you this order is received?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Received</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

               <div class="modal fade" id="schedule" abindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reschedule order</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('order-reschedule')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="sid" id="sid">
                                                   <div class="col-md-12 mb-3">
                                                        <label>Date</label>
                                                         <input type="date" class="form-control" id="name" placeholder="Sapling" name="date" value="" required>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Reschedule</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                               <script>
                                    function setDataFunction(id){
                                       $('#id').val(id);

                                   }
                               </script>
                               <script>
                                 function setTimeFunction(id){
                                  //alert(id);
                                       $('#sid').val(id);

                                   }
                               </script>
<script>
  $(document).ready(function(){
    $('#addVariety').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        date: {

          validators: {
            notEmpty: {
              message: 'The date is required'
            }
          }
        },
      time: {

          validators: {
            notEmpty: {
              message: 'The time is required'
            }
          }
        },
      }
    })
  });

</script>
