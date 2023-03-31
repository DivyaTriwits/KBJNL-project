                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Individual Saplings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">Individual Saplings</li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn" data-toggle="modal" data-target="#addSapling" style="background-color: #66CD00; color: white">
                                   Add Individual Sapling
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
                                                <th>Customer Name</th>
                                                <th>Mobile No.</th>
                                                <th>Sapling Name</th>
                                                <th>Bag Size</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $index=1; $total=0; foreach($individual as $i){?>
                                            <tr>
                                                 <td><?php echo $index;?></td>
                                                 <td><?php echo $i->customer;?></td>
                                                <td><?php echo $i->mobile;?></td>
                                                <td><?php echo $i->sapling;?></td>
                                                <td><?php echo $i->bagsize;?></td>
                                                <td><?php echo number_format($i->quantity);?></td>
                                                <td><?php echo $i->date;?></td>
                                               <td><a style="color: green; cursor: pointer;" data-toggle="modal" data-target="#editSapling"  
                                                onclick="setDataFunction('<?php echo $i->id;?>',
                                                '<?php echo $i->sapling_id;?>',
                                                '<?php echo $i->bag_size;?>',
                                                '<?php echo $i->customer;?>',
                                                '<?php echo $i->mobile;?>',
                                                '<?php echo $i->quantity;?>'
                      )"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#deleteSapling"  onclick="setDeleteDataFunction('<?php echo $i->id;?>'
                      )"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                               
                                            </tr>
                                            <?php $index++;
                                    }?>
                                           </tbody>
                                          
                                            
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>

                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="addSapling">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Add Individual Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addIndividual" enctype="multipart/form-data" method="post" action="<?php echo base_url('individual-sapling-insert')?>">
                                            <div class="modal-body">
                                                
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Sapling Name<span class="tx-danger">*</span></label>
                                                          <select class="form-control" name="sapling" id="saplings">
                                                      <option selected="" disabled="">Select Saplings</option>
                                                      <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                    <?php }?>
                                                    </select>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Bag Size<span class="tx-danger">*</span></label>
                                                     <select name="bag" required="" id="bagsize" class="form-control bags">
                                                            <?php foreach($bag as $b){?>
                                                     <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?></option>
                                                            <?php }?>
                                                        </select>

                                                   </div>
                                                 </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Customer Name<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="location" placeholder="Customer Name" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Contact Number<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="location" placeholder="Customer Name" name="mobile" value="" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10">
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Quantity<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" step="any" class="form-control" name="quantity" id="city" placeholder="Quantity" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Individual Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="editform" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-individual-sapling')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Sapling Name<span class="tx-danger">*</span></label>
                                                         <select class="form-control" name="esapling" id="esapling">
                                                      <option selected="" disabled="">Select Saplings</option>
                                                      <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                    <?php }?>
                                                    </select>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Bag Size<span class="tx-danger">*</span></label>
                                                     <select name="ebag" required="" id="ebagsize" class="form-control bags">
                                                            <?php foreach($bag as $b){?>
                                                     <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?></option>
                                                            <?php }?>
                                                        </select>

                                                   </div>
                                                 </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Customer Name<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="ename" placeholder="Customer Name" name="ename" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Contact Number<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="emobile" placeholder="Customer Name" name="emobile" value="" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10">
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Quantity<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" step="any" class="form-control" name="eqty" id="eqty" placeholder="Quantity" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Update</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>



                                <!--Delete Modal -->
                                <div class="modal fade" id="deleteSapling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Individual Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-individual-sapling')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="did" id="did">
                                                    Are you sure you want to delete this row?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" style="background-color: #66CD00; color: white">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function setDataFunction(id,sapling_id,bags,name,mobile,quantity){
                                        //alert(id);
                                     $('#id').val(id);
                                     //alert(id);
                                     $('#esapling').val(sapling_id).trigger('change');
                                     $('#ebagsize').val(bags).trigger('change');
                                     $('#ename').val(name);
                                     $('#emobile').val(mobile);
                                     $('#eqty').val(quantity);
                                 }
                             </script>
                              <script>
                                    function setDeleteDataFunction(id){
                                        //alert(id);
                                     $('#did').val(id);
                                     }
                             </script>
                                <script>
  $(document).ready(function(){
    $('#addIndividual').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      
         sapling: {

          validators: {
            notEmpty: {
              message: 'The sapling is required'
            }
          }
        },
         name: {

          validators: {
            notEmpty: {
              message: 'The customer name is required'
            }
          }
        },
         mobile: {

          validators: {
            notEmpty: {
              message: 'The contact number is required'
            }
          }
        },
         quantity: {

          validators: {
            notEmpty: {
              message: 'The quantity is required'
            }
          }
        },
       
        bag: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
      })
 
  });

</script>

                       <script>
  $(document).ready(function(){
    $('#editform').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      
         esapling: {

          validators: {
            notEmpty: {
              message: 'The sapling is required'
            }
          }
        },
         ename: {

          validators: {
            notEmpty: {
              message: 'The customer name is required'
            }
          }
        },
         emobile: {

          validators: {
            notEmpty: {
              message: 'The contact number is required'
            }
          }
        },
         eqty: {

          validators: {
            notEmpty: {
              message: 'The quantity is required'
            }
          }
        },
       
        ebag: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
      })
 
  });

</script>