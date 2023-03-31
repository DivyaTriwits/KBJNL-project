       
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Vareities Type</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Varities </li>
                                <li class="breadcrumb-item active"><a href="#">Varities Type</a></li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                   Add Variety Types
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
                                                <th>Variety</th>
                                                <th>Variety Types</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($varieties as $v){?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $v->variety?></td>
                                                <td><?php echo $v->variety?></td>
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $v->id; ?>',
                      '<?php echo $v->variety; ?>', 
                                  
                      )" data-toggle="modal" data-target="#editvareity"><i class="mdi mdi-pencil-outline"></i></a></td>
                                                <td><a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $v->id; ?>',
                                  
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
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Variety Type</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="addVariety" method="post" action="<?php echo base_url('insert-variety-type')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Variety</label>
                                                        <select name="variety" required="" class="form-control">
                                                            <?php foreach($varieties as $v) {?>
                                                            <option value="<?php echo $v->variety_id?>">
                                                                <?php echo $v->variety?></option>
                                                        <?php }?>
                                                        </select>
                                                        
                                                        
                                                    </div>
                                                     <div class="col-md-6 mb-3">
                                                        <label for="">Back Size</label>
                                                       <input type="text" name="size" class="form-control">
                                                        
                                                        
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


 <!--Edit Modal -->
                                <div class="modal fade" id="editvareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Variety</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" method="post" action="<?php echo base_url('editvarieties')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="id" id="id">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom01">Variety</label>
                                                        <input type="text" class="form-control" id="evariety" name="evariety" placeholder="Variety" value="" required>
                                                        
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
                                <div class="modal fade" id="deletevareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Variety</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('deletevarieties')?>">
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
    function setDataFunction(id,variety){
     $('#id').val(id);
     $('#evariety').val(variety);
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
        variety: {

          validators: {
            notEmpty: {
              message: 'The variety is required'
            }
          }
        },
        size: {

          validators: {
            notEmpty: {
              message: 'The back size is required'
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
        evariety: {

          validators: {
            notEmpty: {
              message: 'The variety is required'
            }
          }
        }

      }
    })
  });

</script>