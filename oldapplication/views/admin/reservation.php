       
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Reservation Stock</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('stocks')?>" >Stock</a></li>
                                <li class="breadcrumb-item active"><a href="#">Reservation Stock</a></li>
                                <li class="breadcrumb-item"> <button type="button" class="btn btn" data-toggle="modal" data-target="#addModal" style="background-color: #66CD00; color: white">
                                  Reservation Stock
                                </button></li>
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
                                                <th>Nursery</th>
                                                <th>Sapling</th>
                                                <th>Bag Size</th>
                                                <th>Reservation Stock</th>
                                                <th>Sold</th>
                                                <th>Release Reserved Stock Back</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($reservation as $r){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $r->nursery_name?></td>
                                                <td><?php echo $r->sapling?></td>
                                                <td align="right"><?php echo $r->bagsize?></td>
                                                <td align="right"><?php echo number_format($r->reserved_stock)?></td>
                                                <td><button type="button" class="btn btn" data-toggle="modal" data-target="#sold" style="background-color: #66CD00; color: white" onclick="setSoldFunction('<?php echo $r->id; ?>',
                                  
                      )">
                                  Sold
                                </button></td>
                                                <td><button type="button" class="btn btn" data-toggle="modal" data-target="#back" style="background-color: #66CD00; color: white" onclick="setBackFunction('<?php echo $r->id; ?>',
                                  
                      )">
                                  Back
                                </button></td>
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
                                <div class="modal fade bd-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add Reservation Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="addVariety" method="post" action="<?php echo base_url('insert-reservation')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Select Nursery<span class="tx-danger">*</span></label>
                                                        
                                                        <select class="form-control" name="name" id="name" required="">
                                                      <option selected="" disabled="">Select Nursery</option>
                                                      <?php foreach($nursery as $n){?>
                                                           <option value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                                      <?php }?>
                                                     </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Sapling<span class="tx-danger">*</span></label>
                                                         <select class="form-control" name="sapling" id="sapling" required="">
                                                     
                                                         </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Bag Size<span class="tx-danger">*</span></label>
                                                        <select class="form-control" name="bag" id="bag" required="">
                                                        
                                                         </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Reservatio Stock<span class="tx-danger">*</span></label>
                                                        <input type="number" step="any" class="form-control" id="" name="qty" placeholder="Quantity" value="" required>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                 <!--Delete Modal -->
                                <div class="modal fade" id="sold" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sold Reservation Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('sold-reservation')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="sid" id="sid">
                                                    Are you sure you want to sold this sapling?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Sold</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="back" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Back Reservation Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('back-reservation')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                <input type="hidden" name="bid" id="bid">
                                                    Are you sure you want to back this sapling?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                 <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Back</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


 <script>
    function setSoldFunction(id){
     $('#sid').val(id);
    //alert(id);
    }
</script>                                                              
<script>
    function setBackFunction(id){
     $('#bid').val(id);
    //alert(id);
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
        bag: {

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
        name: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
            }
          }
        },
        sapling: {

          validators: {
            notEmpty: {
              message: 'The sapling is required'
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
        ebag: {

          validators: {
            notEmpty: {
              message: 'The bag size is required'
            }
          }
        },
        ecost: {

          validators: {
            notEmpty: {
              message: 'The cost per bag is required'
            }
          }
        }

      }
    })
  });

</script>
<script>
   $(document).ready(function () {
     $("#name").change(function () {
       $("#sapling").html('');
       populateDropdownClass();
    });
     populateDropdownClass();
  });
   
   function populateDropdownClass(){
     $("#sapling").html('');
     var val = $("#name").val();
     <?php
     /*$citiename = $data->city;*/
     $class = $this->db->get('sapling_stock')->result();
     ?>
     <?php foreach($class as $className){
        $saplings = $this->db->distinct('sapling')->where('saplingid',$className->sapling_id)->get('saplings')->row();?>
       if (val == '<?php echo $className->nursery_id?>') {
         $("#sapling").append("<option value='<?php echo $className->sapling_id?>'><?php echo $saplings->sapling?></option>");
      }
   <?php }?>
}
</script>

<script>
   $(document).ready(function () {
     $("#sapling").change(function () {
       $("#bag").html('');
       populateBagDropdownClass();
    });
     populateBagDropdownClass();
  });
   
   function populateBagDropdownClass(){
     $("#bag").html('');
     var val = $("#sapling").val();
      $nurseryid= $("#name").val();
     // alert($nurseryid);
     <?php
     /*$citiename = $data->city;*/
    // $nurseryid= $("#name").val();
     $class = $this->db->get('sapling_stock')->result();
     ?>
     <?php foreach($class as $className){
        $bags = $this->db->distinct('bagsize')->where('bag_id',$className->bag_id)->get('bag_size')->row();?>
       if (val == '<?php echo $className->sapling_id?>') {
         $("#bag").append("<option value='<?php echo $bags->bag_id?>'><?php echo $bags->bagsize?></option>");
      }
   <?php }?>
}
</script>