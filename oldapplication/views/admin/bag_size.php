       
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Bag Size</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                
                                <li class="breadcrumb-item active"><a href="#">Bag Size</a></li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn" data-toggle="modal" data-target="#addModal" style="background-color: #66CD00; color: white">
                                   Add Bag Size
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
                                                <th>Bag Size</th>
                                                <th>Cost Per Bag</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($bags as $b){
                                             $amount = $b->price;
                                            //  setlocale(LC_MONETARY, 'en_IN');
                                            //   $amount = money_format('%!i', $amount);
                                            //   echo $amount;
                                             ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td align="right"><?php echo $b->bagsize?></td>
                                                <td align="right"><?php echo $amount?></td>
                                                <td align="right"><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $b->id; ?>',
                      '<?php echo $b->bagsize; ?>', 
                                  '<?php echo $b->price?>',
                      )" data-toggle="modal" data-target="#editvareity"><i class="mdi mdi-pencil-outline"></i></a></td>
                                                <td><a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $b->id; ?>',
                                  
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
                                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Bag Size</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="addVariety" method="post" action="<?php echo base_url('inser-bag-sizes')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Bag Size<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="" name="bag" placeholder="Enter Bag Size" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Cost Per Bag<span class="tx-danger">*</span></label>
                                                        <input type="text" pattern="[0-9.]{1,100}"  maxlength="100"
                                                    oninput="if (!this.checkValidity())this.value = this.value.slice(0, -1)" class="form-control" id="" name="cost" placeholder="Cost" value="" required>
                                                        
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
                                <div class="modal fade" id="editvareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Bag Size</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" method="post" action="<?php echo base_url('edit-bag-sizes')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="id" id="id">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationCustom01">Bag Size<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="ebag" name="ebag" placeholder="Bag Size" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Cost Per Bag<span class="tx-danger">*</span></label>
                                                        <input type="number" step="any" class="form-control" id="ecost" name="ecost" placeholder="Cost" value="" required>
                                                        
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Bag Size</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-bag-sizes')?>">
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
    function setDataFunction(id,bag,cost){
     $('#id').val(id);
     $('#ebag').val(bag);
     $('#ecost').val(cost);
     $('#editvareity').modal('show');
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
        bag: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
        cost: {

          validators: {
            notEmpty: {
              message: 'The cost per bag is required'
            }
          }
        }

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
        ebag: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
        ecost: {

          validators: {
            notEmpty: {
              message: 'The cost per bag is required'
            }
          }
        }

      }
    })
  });

</script>