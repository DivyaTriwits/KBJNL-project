       
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Cash Remittance</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">

                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('nursery-home')?>">Home</a></li>

                                
                                <li class="breadcrumb-item active"><a href="#">Cash Remittance</a></li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn" data-toggle="modal" data-target="#addModal" style="background-color: #66CD00; color: white">
                                   Add Cash Remittance
                                </button></li>
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
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Mode</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                              
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($cash as $c){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $c->mode?></td>
                                                 <td><?php echo $c->amount?></td>
                                                
                                                    <td><?php echo $c->date?></td>
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $c->id; ?>',
                      '<?php echo $c->mode?>',
                      '<?php echo $c->amount?>',
                      '<?php echo $c->date?>',
                     
                                  
                      )" data-toggle="modal" data-target="#editvareity"><i class="mdi mdi-pencil-outline"></i></a></td>
                                                <td><a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $c->id; ?>',
                                  
                      )" data-toggle="modal" data-target="#deletevareity"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->
            
 <!-- Modal -->
                                         <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="addModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Cash Remittance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="addVariety" method="post" action="<?php echo base_url('insert-nursery-cash-remittance')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                   <div class="col-md-4 mb-3">
                                                        <label for="">Mode<span class="tx-danger">*</span></label>
                                                       <select class="form-control" id="" name="mode">
                                                           <option selected="" disabled="">Select</option>
                                                           <option value="DD">DD</option>
                                                           <option value="NEFT">NEFT</option>
                                                           <option value="IMPS">IMPS</option>
                                                           <option value="RTGS">RTGS</option>
                                                       </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Amount<span class="tx-danger">*</span></label>
                                                        <input type="number" step="any" class="form-control" id="" name="amount" placeholder="" value="" required>
                                                        
                                                    </div>
                                                       <div class="col-md-4 mb-3">
                                                        <label for="">Date<span class="tx-danger">*</span></label>
                                                        <input type="date" class="form-control" id="" name="date" placeholder="" value="" required>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


 <!--Edit Modal -->
                              
                                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="editvareity">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Cash Remittance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" method="post" action="<?php echo base_url('update-nursery-cash-remittance')?>">
                                                <input type="hidden" name="id" id="id">
                                            <div class="modal-body">
                                                    <div class="form-row">
                                                   <div class="col-md-4 mb-3">
                                                        <label for="">Mode<span class="tx-danger">*</span></label>
                                                        <select class="form-control" id="emode" name="emode">
                                                           <option selected="" disabled="">Select</option>
                                                           <option value="DD">DD</option>
                                                           <option value="NEFT">NEFT</option>
                                                           <option value="IMPS">IMPS</option>
                                                           <option value="RTGS">RTGS</option>
                                                       </select>
                                                        
                                                    </div>
                                                   <div class="col-md-4 mb-3">
                                                        <label for="">Amount<span class="tx-danger">*</span></label>
                                                        <input type="number" step="any" class="form-control" id="eamount" name="eamount" placeholder="" value="" required>
                                                        
                                                    </div>
                                                      
                                                      
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Date<span class="tx-danger">*</span></label>
                                                        <input type="date" step="any" class="form-control" id="edate" name="edate" placeholder="" value="" required>
                                                        
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Cash Remittance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-nursery-remittance')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="did" id="did">
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
     $('#deletevareity').modal('show');
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
        mode: {

          validators: {
            notEmpty: {
              message: 'The mode is required'
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
              message: 'The date is required'
            }
          }
        },

      }
    })
  });

</script>

<script>
  $(document).ready(function(){
    $('#editForm').bootstrapValidator({
        feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
         emode: {

          validators: {
            notEmpty: {
              message: 'The mode is required'
            }
          }
        },
         eamount: {

          validators: {
            notEmpty: {
              message: 'The amount is required'
            }
          }
        },
        edate: {

          validators: {
            notEmpty: {
              message: 'The date is required'
            }
          }
        },

      }
    })
  });

</script>