 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Nursery</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                 <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Nursery</li>
                                <li class="breadcrumb-item active"><a href="#">View Nursery Officer</a></li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Officer Name</th>
                                                <th>Contact No.</th>
                                              
                                               
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($officer as $o){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $o->officer_name?>
                                  </td>
                                                <td align="right"><?php echo $o->mobile?></td>
                                              
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $o->id; ?>',
                      '<?php echo $o->officer_name; ?>', 
                                '<?php echo $o->mobile?>',
                              
                      )" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $o->id; ?>',
                                  
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Nursery Officer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-officer/'.$this->uri->segment(2))?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Officer Name<span class="tx-danger">*</span></label>
                                                         <input type="text" class="form-control" id="officer" placeholder="Officer Name" name="officer" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Contact No.<span class="tx-danger">*</span></label>
                                                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10" type="text" class="form-control" id="mobile" placeholder="Contact No." name="mobile" value="" required>
                                                        
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Nursery Officer</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-officer/'.$this->uri->segment(2))?>">
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
    function setDataFunction(id,name,mobile){
     $('#id').val(id);
     $('#officer').val(name);
     $('#mobile').val(mobile);
    
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
        officer: {

          validators: {
            notEmpty: {
              message: 'The officer name is required'
            }
          }
        },
         mobile: {

          validators: {
            notEmpty: {
              message: 'The mobile no. is required'
            }
          }
        },
         city: {

          validators: {
            notEmpty: {
              message: 'The city is required'
            }
          }
        },
        

      }
    })
  });

</script>