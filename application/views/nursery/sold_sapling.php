 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Current Stock</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                 <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url()?>" >Home</a></li>
                                <li class="breadcrumb-item">Stock</li>
                                <li class="breadcrumb-item active"><a href="#">View Current Stock</a></li>
                                
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
                             <!--  <form method="GET" action="<?php echo base_url();?>opening-stock" id="searchby">
                                            <div class="row">
                                              <div class="col-md-4"></div>
                                            <div class="col-md-3">
                                                
                                                <select class="form-control" name="nursery">
                                                  <option disabled="" selected="">Select</option>
                                                  <?php foreach($nursery as $n){?>
                                                    <option value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                                  <?php }?>
                                                </select>
                                            </div>
                                            
                                            
                                        <button type="submit" class="btn btn-info btn-sm"> Search</button>
                                        </div>
                                        </form> -->
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                
                                                <th>Sapling</th>
                                                <th>Bag Size</th>
                                                
                                                <th>Sales Quantity</th>
                                                <th>Date</th> 
                                               
                                               
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                         
                                            $total=0;
                                             foreach($sales as $p){                       
                                             // print_r($stockData);exit;
                                             $total+=$p->sales_quantity;
                                                ?>
                                            
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                             
                                     <td><?php echo $p->sapling?>
                                  </td>
                                  
                                                <td align="right"><?php echo $p->bagsize?></td>
                                                 <td align="right"> <?php echo number_format($p->sales_quantity)?></td> 
 
                                                 <td align="right"><?php echo $p->date?></td>
                                              
                                            </tr>
                                            <?php $i++; }?>
                                           
                                        </tbody>
                                       <tfoot>
                                         <tr>
                                           <td align="right" colspan="3">Total</td>
                                           
                                           <td align="right"><?php echo $total?></td>
                                           <td></td>
                                         </tr>
                                       </tfoot>
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Nursery</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-nursery')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Nursery Name<span class="tx-danger">*</span></label>
                                                         <input type="text" class="form-control" id="name" placeholder="Nursery Name" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Loaction<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="location" placeholder="Location" name="location" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">City<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text"class="form-control" name="userid" id="city" placeholder="User Id" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Password<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="inputGroupPrepend" required>
                                                            
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
                                <div class="modal fade" id="deletevareity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Nursery</h5>
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
    function setDataFunction(id,name,location,city,password){
     $('#id').val(id);
     $('#name').val(name);
     $('#location').val(location);
     $('#city').val(city);
     $('#password').val(password); 
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
        name: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
            }
          }
        },
         location: {

          validators: {
            notEmpty: {
              message: 'The location is required'
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