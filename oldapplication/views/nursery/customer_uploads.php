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
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">

                        </li>
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
                                 
                        <h4 class="card-title">My Uploads</h4> 
                       
</div>

</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered" >
                                <thead>
                              
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Customer Name</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>View Images</th>
                                         <th>Comments</th>
                                    </tr>
                                    
                                </thead>
                                <tbody>

                                    <?php $i=1;
                                     foreach ($uploads as $eachupload) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $eachupload->full_name?></td>
                                            <td><?php echo $eachupload->msg?></td>
                                            <td><?php echo $eachupload->date?></td>
                                            <td><a class="btn btn-outline-primary btn-sm" style="border-color:#66CD00 " href="<?php echo base_url('view-uploads-images/'.$eachupload->upload_id)?>">View</a></td>
                                           
                                             <td><a class="btn btn-outline-primary btn-sm" style="color: green; cursor: pointer; border-color:#66CD00" href="<?php echo base_url('nursery-comments/'.$eachupload->upload_id)?>">Comments</a></td>
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


                <div class="modal fade bd-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="uploadsModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Uploads Images</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="formUpload" enctype="multipart/form-data" method="post" action="<?php echo base_url('insert-uploads-images-on-delivered')?>">
                                            <div class="modal-body">
                                               
                                                <div class="form-row">
                                                  <div class="col-md-6 mb-3">
                                                        <label for="">Customer Asdhaar</label>
                                                     <input type="text" class="form-control" id="aadhaar" placeholder="" name="aadhaar" value="" required> 
                                                       
                                                    </div>
                                                        <div class="col-md-6 mb-3">
                                                        <label>Images</label>
                                                         <input type="file" class="form-control" id="file" placeholder="" name="files[]" value="" multiple="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label>Descriptions</label>
                                                        <textarea class="form-control" name="msg"></textarea>
                                                        
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