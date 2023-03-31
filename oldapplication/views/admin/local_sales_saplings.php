 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Local Sales</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('local-sales')?>">Local Sales</a></li>
                                <li class="breadcrumb-item active"><a href="#">View Local Sales</a></li>
                                
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
                                                <th>Variety</th>
                                                <th>Sapling</th>
                                                <th>Bag Size</th>
                                                <th>Price/Sapling</th>
                                                <th>Quantity</th>
                                                
                                                <th>Amount</th>
                                               
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($localsalesaplings as $n){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $n->variety?>
                                  </td>
                                                <td><?php echo $n->sapling?></td>
                                                <td><?php echo $n->bagsize?></td>
                                                <td><?php echo $n->price?></td>
                                                <td><?php echo $n->quantity?></td>
                                                <td><?php echo $n->price?></td>
                                               
                                                
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $n->id; ?>',
                                         '<?php echo $n->varietyid?>',
                                          '<?php echo $n->saplings_id?>',
                                          '<?php echo $n->bag?>',
                                          '<?php echo $n->quantity?>'
                                
                      )" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $n->id; ?>',
                                  
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Local Sale Saplings</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('update-saplings-local-sales/'.$this->uri->segment(2))?>">
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Local Sale Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-saplings-local-sales/'.$this->uri->segment(2))?>">
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
     $('#variety').val(variety).trigger('change');
     $('#saplings').val(sapling).trigger('change');
     $('#bagsize').val(bag).trigger('change');
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
        variety: {

          validators: {
            notEmpty: {
              message: 'The variety is required'
            }
          }
        },
         saplings: {

          validators: {
            notEmpty: {
              message: 'The sapling is required'
            }
          }
        },
         bagsize: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
        qty: {

          validators: {
            notEmpty: {
              message: 'The quantity is required'
            }
          }
        },

      }
    })
  });

</script>

<script>
   $(document).ready(function () {
     $("#variety").change(function () {
       $("#saplings").html('');
       populateDropdownCities();
    });
     populateDropdownCities();
  });
   
   function populateDropdownCities(){
     $("#saplings").html('');
     var val = $("#variety").val();
     <?php
     /*$citiename = $data->city;*/
     $data = $this->db->get('saplings')->result();
     ?>
     <?php foreach($data as $className){?>
       if (val == '<?php echo $className->varityid?>') {
         $("#saplings").append("<option value='<?php echo $className->saplingid?>'><?php echo $className->sapling?></option>");
      }
   <?php }?>
}
</script>