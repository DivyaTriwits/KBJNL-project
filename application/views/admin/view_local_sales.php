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
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Contact Pesron Name</th>
                                                <th>Contact No.</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                               <th>Sapling</th>
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($localsale as $n){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $n->type?>
                                  </td>
                                                <td><?php echo $n->type_name?></td>
                                                <td><?php echo $n->user_name?></td>
                                                <td><?php echo $n->contact_num?></td>
                                                <td><?php echo $n->address?></td>
                                                <td><?php echo $n->amount?></td>
                                                <td><a align="center" href="<?php echo base_url('view-saplings-local-sales/'.$n->local_id)?>"><i class="mdi mdi-eye-check-outline"></i></a></td>
                                                
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $n->id; ?>',
                      '<?php echo $n->type; ?>', 
                                '<?php echo $n->type_name?>',
                                '<?php echo $n->user_name?>',
                                 '<?php echo $n->contact_num?>',
                                 '<?php echo $n->amount?>',
                                 '<?php echo $n->address?>',
                                
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Lacol Sales</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="addVariety" enctype="multipart/form-data" method="post" action="<?php echo base_url('update-local-sales')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                       <label>Type<span class="tx-danger">*</span></label>
                                                        
                                                         <select class="form-control" required name="types" id="types">
                                                           <option selected="" disabled="">Select</option>
                                                           <option value="Departmental">Departmental</option>
                                                           <option value="Organiztion">Organiztion</option>
                                                           <option value="NGO">NGO's</option>
                                                           <option value="Individuals">Individuals</option>
                                                           <option value="Other">Other</option>
                                                         </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Type Name<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" placeholder="" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                     <label for="">Contact Person Name<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" class="form-control" name="uname" placeholder="" id="uname" required>
                                                            
                                                        </div>
                                                      </div>
                                                    <div class="col-md-4 mb-3">
                                                     <label for="">Contact Number<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10"  class="form-control" name="contact" placeholder="" aria-describedby="inputGroupPrepend" id="contact" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                     <label for="">Amount<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="number" step="any" class="form-control" name="amount" placeholder="" id="amount">
                                                            
                                                        </div>
                                                      </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Address</label>
                                                        <div class="input-group">
                                                           <textarea class="form-control" name="address" id="address"></textarea>
                                                            
                                                            
                                                        </div>
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Local Sale</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete_local_sales')?>">
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
    function setDataFunction(id,type,name,uname,contact,amount,address){
     $('#id').val(id);
     $('#type').val(type).trigger('change');
     $('#name').val(name);
     $('#uname').val(uname);
     $('#contact').val(contact); 
     $('#amount').val(amount); 
     $('#address').val(address); 
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
        'name': {
    validators: {
      notEmpty: {
        message: 'The name is required.'
    }
}
},
'types': {
    validators: {
      notEmpty: {
        message: 'The type is required.'
    }
}
},
'uname': {
    validators: {
      notEmpty: {
        message: 'The contact person name is required.'
    }
}
},
'contact': {
    validators: {
      notEmpty: {
        message: 'The contact no. is required.'
    }
}
},

      }
    })
  });

</script>