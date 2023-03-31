 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Saplings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('saplings')?>" >Saplings</a></li>
                                
                                <li class="breadcrumb-item active"><a href="#">View saplings</a></li>
                                 <li class="breadcrumb-item"><a href="<?php echo base_url('add-saplings')?>"> <button type="button" class="btn btn-sm" style="background-color: #66CD00; color: white">
                                   Add Saplings
                                </button></a></li>
                                
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
                                                
                                                <th>Varity</th>
                                                <th>Sapling</th> 
                                                
                                                <th>View Details</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($saplings as $s){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                    
                                                <td><?php echo $s->variety?></td>
                                                <td><?php echo $s->sapling?></td>
                                              
                                              
                                                <td><a href="<?php echo base_url('sapling-details/'.$s->saplingid)?>">View</a></td>
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $s->id; ?>',
                      '<?php echo $s->varityid; ?>', 
                                '<?php echo $s->sapling?>',
                                  
                      )" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $s->saplingid; ?>',
                                  
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


                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="editSapling">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-saplings')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label>Varieties<span class="tx-danger">*</span></label>
                                                        <select name="variety" id="variety" required="" class="form-control">
                                                            <option selected="" disabled="">Select</option>
                                                            <?php foreach($varieties as $v) {?>
                                                            <option value="<?php echo $v->variety_id?>">
                                                                <?php echo $v->variety?></option>
                                                        <?php }?>
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Saplings Name<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="sapling" placeholder="Sapling Name" name="sapling" value="" required>
                                                        
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-saplings')?>">
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
    function setDataFunction(id,variety,sapling,description){
     $('#id').val(id);
     $('#variety').val(variety).trigger('change');
     $('#sapling').val(sapling);
     
     $('#bagid').val(description);
    
     
     
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
        variety: {

          validators: {
            notEmpty: {
              message: 'The variety is required'
            }
          }
        },
         sapling: {

          validators: {
            notEmpty: {
              message: 'The sapling is required'
            }
          }
        },
         cost: {

          validators: {
            notEmpty: {
              message: 'The cost is required'
            }
          }
        },
         maximunqty: {

          validators: {
            notEmpty: {
              message: 'The maximun quantity is required'
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
        
         description: {

          validators: {
            notEmpty: {
              message: 'The description is required'
            }
          }
        }

      }
    })
  });

</script>