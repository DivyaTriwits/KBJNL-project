<?php if($this->session->flashdata('success')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('success')?>');
    </script>
<?php }?>
<style>
    .btn:hover{
        background-color: #66CD00 !important;
        border-color: #66CD00 !important;
    }
</style>
<main>
    <div class="container-fluid site-width">
        <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">After Planting Uploads</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('uploads-comments')?>">Uploads & Comments</a></li>
                                <li class="breadcrumb-item active">After Planting Uploads</li>
                            </ol>
                        </div>
                    </div>
                </div>
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-header  justify-content-between align-items-center"> 
              <div class="row">
                 <div class="col-md-8">
                                 
                        <h4 class="card-title">After Planting Uploads</h4> 
                        
</div>
<!-- <div class="col-md-4" align="right">
<button type="submit" class="btn btn-outline-primary btn-sm" style="background-color: #66CD00; border: #66CD00; color: #ffff" data-toggle="modal" data-target="#uploadsModal" >Add Uploads</button>
</div> -->
</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered" >
                                <thead>
                                  
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Customer Aadhaar</th>
                                        <th>Customer Name</th>
                                        <th>Description</th>

                                        <th>Date</th>
                                        <th>View Images</th>
                                         <th>Reply On Message</th>
                                    </tr>
                                   
                                </thead>
                                <tbody>

                                    <?php $i=1;
                                     foreach ($uploads as $eachupload) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php  echo $eachupload->aadhaar_no?></td>
                                            <td><?php  echo $eachupload->full_name?></td>
                                            <td><?php echo $eachupload->msg?></td>
                                            <td><?php echo $eachupload->date?></td>
                                            <td><a class="btn btn-outline-primary btn-sm" style="border-color:#66CD00 " href="<?php echo base_url('view-uploaded-images/'.$eachupload->upload_id)?>">View</a></td>
                                            <td><a class="btn btn-outline-primary btn-sm" style="color: green; cursor: pointer; border-color:#66CD00" href="<?php echo base_url('comments/'.$eachupload->upload_id)?>">Comments</a></td>
                                            
                                        </tr>
                                    <?php $i++; }?>
                                    
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div> 

            </div>                  
        </div>
    </div>
</main>
 <div class="modal fade" id="editvareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form id="editForm" method="post" action="<?php echo base_url('Admin_controller/addAfterComment')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="id" id="id">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="validationCustom01">Comment<span class="tx-danger">*</span></label>
                                                        <textarea class="form-control" name="comment" required=""></textarea>
                                                       
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Add</button>
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
  $(document).ready(function(){
    $('#formUpload').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        files[]: {

          validators: {
            notEmpty: {
              message: 'The images is required'
            }
          }
        },
         msg: {

          validators: {
            notEmpty: {
              message: 'The description is required'
            }
          }
        },
         types: {

          validators: {
            notEmpty: {
              message: 'The upload type is required'
            }
          }
        },
        

      }
    })
  });

</script>