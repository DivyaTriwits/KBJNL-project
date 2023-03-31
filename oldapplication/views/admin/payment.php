 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Payments</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Orders</li>
                                <li class="breadcrumb-item active"><a href="#">View Payments</a></li>
                                <li class="breadcrumb-item"><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#payModal" >Add Payment</button></li>
                                
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
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Payment Mode</th>
                                                <th>Pay Amount</th>
                                                <th>Payment Date</th>
                                               
                                               
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $total=0;
                                             foreach($payment as $p){
                                              $total+=$p->pay_amount; ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $p->payment_mode?>
                                  </td>
                                                <td><?php echo $p->pay_amount?></td>
                                                <td><?php echo $p->payment_date?></td>
                                               
                                               
                                                
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $p->id; ?>',
                      '<?php echo $p->payment_mode; ?>', 
                                '<?php echo $p->pay_amount?>',
                                '<?php echo $p->payment_date?>',
                                
                                
                      )" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $p->id; ?>',
                                  
                      )" data-toggle="modal" data-target="#deletevareity"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                               
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                        <tfoot>
                                          <td colspan="2" align="right">Total</td>
                                           <td><?php echo $total?>.00</td>
                                          <td></td>
                                            <td></td>
                                        </tfoot>
                                       
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="payModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Add Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="paymentAdd" enctype="multipart/form-data" method="post" action="<?php echo base_url('add-payment')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="pid" id="pid" value="<?php echo $this->uri->segment(2)?>">
                                                <div class="form-row">
                                                  <div class="col-md-6 mb-3">
                                                        <label for="">Payment Mode</label>
                                                      <!--   <input type="text" class="form-control" id="location" placeholder="Ex: 11:00 AM to 12:00 PM" name="time" value="" required> -->
                                                        <select class="form-control" required="" name="mode">
                                                          <option selected="" disabled=""> Select</option>
                                                          <option value="Cash">Cash</option>
                                                          <option value="Bank">Bank</option>
                                                          <option value="Online">Online</option>
                                                        </select>
                                                    </div>
                                                        <div class="col-md-6 mb-3">
                                                        <label>Pay Amount</label>
                                                         <input type="numer" step="any" class="form-control" id="amount" placeholder="" name="amount" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Payment Date</label>
                                                         <input type="date" class="form-control" id="date" placeholder="date" name="date" value="" required>
                                                        
                                                    </div>
                                               
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Submit</button>
                                               
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="editSapling">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('update-payments')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="uid" id="uid" value="<?php echo $this->uri->segment(2)?>">
                                                <div class="form-row">
                                                  <div class="col-md-6 mb-3">
                                                        <label for="">Payment Mode</label>
                                                      <!--   <input type="text" class="form-control" id="location" placeholder="Ex: 11:00 AM to 12:00 PM" name="time" value="" required> -->
                                                        <select class="form-control" required="" name="emode" id="emode"> 
                                                          <option selected="" disabled=""> Select</option>
                                                          <option value="Cash">Cash</option>
                                                          <option value="Bank">Bank</option>
                                                          <option value="Online">Online</option>
                                                        </select>
                                                    </div>
                                                        <div class="col-md-6 mb-3">
                                                        <label>Pay Amount</label>
                                                         <input type="numer" step="any" class="form-control" id="eamount" placeholder="" name="eamount" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Payment Date</label>
                                                         <input type="date" class="form-control" id="edate" placeholder="date" name="edate" value="" required>
                                                        
                                                    </div>
                                               
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                               <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Update</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                                <!--Delete Modal -->
                                <div class="modal fade" id="deletevareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-payments')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="did" id="did">
                                                 <input type="hidden" name="sid" id="sid" value="<?php echo $this->uri->segment(2)?>">
                                                    Are you sure you want to delete this row?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


 <script>
    function setDataFunction(id,mode,amount,date){
     $('#id').val(id);
     $('#emode').val(mode);
     $('#eamount').val(amount);
     $('#edate').val(date);
  
    }
</script>  

<script>
    function setDeleteFunction(id){
     $('#did').val(id);
    
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
        name: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
            }
          }
        },
         location: {

          validators: {
            notEmpty: {
              message: 'The location is required'
            }
          }
        },
         userid: {

          validators: {
            notEmpty: {
              message: 'The userid is required'
            }
          }
        },
        password: {

          validators: {
            notEmpty: {
              message: 'The password is required'
            }
          }
        },

      }
    })
  });

</script>
<script>
  $(document).ready(function(){
    $('#paymentAdd').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        mode: {

          validators: {
            notEmpty: {
              message: 'The payment mode is required'
            }
          }
        },
      amount: {

          validators: {
            notEmpty: {
              message: 'The amount is required'
            }
          }
        },
         date: {

          validators: {
            notEmpty: {
              message: 'The payment date is required'
            }
          }
        },
      }
    })
  });

</script>