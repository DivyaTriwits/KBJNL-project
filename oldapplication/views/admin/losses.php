 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Losses </h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                 <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('losses')?>">Loss</a></li>
                                <li class="breadcrumb-item active"><a href="#">View Loss</a></li>
                              
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
                                                
                                                <th>Nursery</th>
                                                
                                                <th>Loss Quantity</th>
                                             <th>View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                         
                                            $total=0;
                                             foreach($loss as $loss){                       
                                             // print_r($stockData);exit;
                                             //$total+=$loss->qty;
                                              $nursery=$this->db->where('userid',$loss->nursery_id)->get('nursery')->row();
                                              $totalLoss=$this->Admin_model->totalLoss($loss->nursery_id);
                                                ?>
                                            
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                             
                                          <td><?php echo $nursery->nursery_name?>
                                                            </td>
                                  
                                                <td align="right"> <?php echo $totalLoss?></td>
                                                <td ><a href="<?php echo base_url('view-loss-details/'.$loss->nursery_id)?>">View</a></td>
                                                  
 
                                               
                                              
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Loss Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('update-loss')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">
                                                        <label for="exampleInputPassword1">Sapling <span class="tx-danger">*</span></label>
                                                      <select class="form-control" name="saplings" required id="saplings">
                                                        <option selected="" disabled="">select</option>
                                                       <?php foreach($saplings as $s){
                                                        $sapName=$this->db->where('saplingid',$s->sapling_id)->get('saplings')->row();
                                                        ?>

                                                      <option value="<?php echo $s->sapling_id?>"><?php echo $sapName->sapling?></option>
                                                       <?php }?>
                                                     </select>
                                                        
                                                    </div>
                                                      <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Bag Size <span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="bagsize" required id="bag">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($bagsize as $b){?>
                                                      <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?></option>
                                                       <?php }?>
                                                      </select>

                                                   </div>
                                                 </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label>Loss Reason<span class="tx-danger">*</span></label>
                                                        
                                                         <select class="form-control" required name="loss" id="loss">
                                                          <option selected="" disabled="">Select</option>
                                                          <option value="Ground Loss">Ground Loss</option>
                                                          <option value="Pest Disease">Pest Disease</option>
                                                          <option value="Mortality">Mortality</option>
                                                           <option value="Change Of Species">Change Of Species</option>
                                                         </select>
                                                        
                                                    </div>
                                                  <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Quantity <span class="tx-danger">*</span></label>
                                                     <input 
                                                     class="form-control" type="number"  name="qty" id="qty" placeholder="" required="" autocomplete="off"/> 

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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Loss</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-loss')?>">
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
    function setDataFunction(id,saplings,bag,loss,qty){
     $('#id').val(id);
     $('#saplings').val(saplings);
     $('#bag').val(bag);
     $('#loss').val(loss);
     $('#qty').val(qty); 
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