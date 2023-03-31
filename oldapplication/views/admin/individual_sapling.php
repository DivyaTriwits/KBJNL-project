                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Individual Saplings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item">Individual Saplings</li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSapling">
                                   Add Individual Sapling
                                </button></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

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
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Jhon</td>
                                                <td>123456789012</td>
                                                <td>Rose</td>
                                                <td>1</td>
                                                <td>29-5-2021</td>
                                               <td><a style="color: green; cursor: pointer;" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#deleteSapling"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                               
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Loream</td>
                                                <td>123456789012</td>
                                                <td>Alovera</td>
                                                <td>1</td>
                                              
                                               <td>29-5-2021</td>
                                              <td><a style="color: green; cursor: pointer;" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#deleteSapling"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                            </tr>
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
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-nursery')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Sapling Name</label>
                                                         <input type="text" class="form-control" id="name" placeholder="Sapling" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Customer Name</label>
                                                        <input type="text" class="form-control" id="location" placeholder="Customer Name" name="location" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Contact Number</label>
                                                        <input type="text" class="form-control" id="location" placeholder="Customer Name" name="mobile" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Quantity</label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" step="any" class="form-control" name="city" id="city" placeholder="Quantity" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-nursery')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Sapling Name</label>
                                                         <input type="text" class="form-control" id="name" placeholder="Sapling" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Customer Name</label>
                                                        <input type="text" class="form-control" id="location" placeholder="Customer Name" name="location" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Quantity</label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" step="any" class="form-control" name="city" id="city" placeholder="Quantity" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
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
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-nursery')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="did" id="did">
                                                    Are you sure you want to delete this row?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


<script>
  $(document).ready(function(){
    $('#addVariety').bootstrapValidator({
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
       

      })
 
  });

</script>