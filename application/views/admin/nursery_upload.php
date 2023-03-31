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
                                 
                        <h4 class="card-title">Nursery Uploads</h4> 
                        
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
                                        <th>Nursery</th>
                                        <th>Customer Aadhaar</th>
                                        <th>Customer Name</th>
                                        <th>Description</th>

                                        <th>Date</th>
                                        <th>View Images</th>
                                        
                                    </tr>
                                   
                                </thead>
                                <tbody>

                                    <?php $i=1;
                                     foreach ($uploads as $eachupload) {?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php  echo $eachupload->nursery_name?></td>
                                            <td><?php  echo $eachupload->aadhaar_no?></td>
                                            <td><?php  echo $eachupload->full_name?></td>
                                            <td><?php echo $eachupload->msg?></td>
                                            <td><?php echo $eachupload->date?></td>
                                            <td><a class="btn btn-outline-primary btn-sm" style="border-color:#66CD00 " href="<?php echo base_url('view-uploaded-images/'.$eachupload->upload_id)?>">View</a></td>
                                           
                                            
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