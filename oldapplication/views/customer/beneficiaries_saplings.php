 <?php if($this->session->flashdata('success')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('success')?>');
    </script>
<?php }?>
 <?php if($this->session->flashdata('deleted')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('deleted')?>');
    </script>
<?php }?>
 <!-- START: Breadcrumbs--><main>
    <div class="container-fluid site-width">
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Beneficiaries Sapling Details</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Beneficiaries</li>
                                <li class="breadcrumb-item active"><a href="#">View Beneficiaries Sapling Details</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('beneficiaries')?>"><button type="button" class="btn btn-success btn-sm" style="background-color: #66CD00; border-color:  #66CD00 " >View Beneficiaries</button></a>
                                  </li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
             
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
                                                <th>Sapling</th>
                                                <th>Bag Size</th>
                                                <th>Price/Sapling</th>
                                                <th>Quantity</th>
                                                
                                                <th>Amount</th>
                                               
                                              
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; $qty=0; $total=0;
                                             foreach($saplingsDetails as $n){
                                              $qty+=$n->ordered_quantity;
                                              $amount=$n->ordered_quantity * $n->price;
                                              $total+=$amount;
                                              ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $n->variety?>
                                  </td>
                                                <td><?php echo $n->sapling?></td>
                                                <td><?php echo $n->bagsize?></td>
                                                <td><?php echo $n->price?></td>
                                                <td><?php echo $n->ordered_quantity?></td>
                                                <td><?php echo $amount?></td>
                                               
                                                
                                               
                                               
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                       <tfoot>
                                         <tr>
                                           <td colspan="5" align="right"><b>Total</b></td>
                                           <td><b><?php echo $qty?></b></td>
                                           <td><b><?php echo $total?></b></td>
                                           <td></td>
                                          
                                         </tr>
                                       </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
              </div>
            </main>
                <!-- END: Card DATA-->


                 <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel10" aria-hidden="true" id="editSapling">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Future Demand Saplings</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('update-sapling-future-demand/'.$this->uri->segment(2))?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="exampleInputPassword1">Variety<span class="tx-danger">*</span></label>
                                                      <select class="form-control" name="variety" required id="variety">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($variety as $v){?>
                                                      <option value="<?php echo $v->variety_id?>"><?php echo $v->variety?></option>
                                                       <?php }?>
                                                     </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="exampleInputPassword1">Sapling <span class="tx-danger">*</span></label>
                                                      <select class="form-control" name="saplings" required id="saplings">
                                                        <option selected="" disabled="">select</option>
                                                       <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                       <?php }?>
                                                     </select>
                                                  
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="exampleInputPassword1">Bag Size <span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="bagsize" required id="bagsize">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($bag as $b){?>
                                                      <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?> (<?php echo $b->price?>)</option>
                                                       <?php }?>
                                                      </select>
                                                        </div>
                                                        <div class="col-md-4 mb-3">
                                                        <label for="exampleInputPassword1">Quantity <span class="tx-danger">*</span></label>
                                                     <input 
                                                     class="form-control" type="number"  name="qty" id="qty" placeholder="" required="" autocomplete="off"/> 
                                                            
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Future Demand Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-sapling-future-demand/'.$this->uri->segment(2))?>">
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
    function setDataFunction(id,variety,sapling,bag,quantity){
     $('#id').val(id);
     $('#variety').val(variety);
     $('#saplings').val(sapling);
     $('#bagsize').val(bag);
     $('#qty').val(quantity); 
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
         userid: {

          validators: {
            notEmpty: {
              message: 'The userid is required'
            }
          }
        },
        password: {

          validators: {
            notEmpty: {
              message: 'The password is required'
            }
          }
        },

      }
    })
  });

</script>