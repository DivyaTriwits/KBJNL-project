           <style>
         .hide{
      display: none;
  }
       </style>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Add Stock</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('stocks')?>" >Stock</a></li>
                                <li class="breadcrumb-item active"><a href="#">Add Stock</a></li>
                                
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
                            
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">                                           
                                        <div class="col-12">
                                            <div class="col-md-12 mb-3" align="right">
                                                          <button type="button" class="btn btn" data-toggle="modal" data-target="#addModal" style="background-color: #66CD00; color: white">
                                   Stock Upload
                                </button>
                                                          </div>
                                            <form id="defaultForm" enctype="multipart/form-data" method="post" action="<?php echo base_url('insert-stock')?>">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Select Nursery<span class="tx-danger">*</span></label>
                                                        
                                                        <select class="form-control" name="name" id="name" required="">
                                                      <option selected="" disabled="">Select Nursery</option>
                                                      <?php foreach($nursery as $n){?>
                                                           <option <?php  echo ($this->input->get('nursery') == $n->nursery_id ) ? 'selected' : '' ;?> value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                                      <?php }?>
                                                     </select>
                                                    </div>
                                                     <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Select Saplings<span class="tx-danger">*</span></label>
                                                 
                                                     <select class="form-control" name="saplings" required="" id="saplingsname">
                                                      <option selected="" disabled="">Select</option>
                                                      <?php  foreach($saplings as $s){?>
                                                           <option <?php  echo ($this->input->get('sapling') == $s->saplingid ) ? 'selected' : '' ;?> value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                      <?php }?>
                                                     </select>
                                                   </div>
                                                 </div>
                                                    
                                                </div>
                                                <h6>Bag Size</h6>
                                                <?php foreach($bags as $b){
                                                // print_r($b->bag_id);exit;
                                                  ?>
                                               <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Bag Size</label>
                                                        <input type="text"  
                                                        placeholder="<?php echo $b->bagsize;?>" class="form-control" readonly >
                                                        <input type="hidden" name="bag[]" value="<?php echo $b->bag_id;?>">
                                                       
                                                    </div>
                                                     <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Quantity</label>
                                                  <input type="number" name="qty[]" value="0" class="form-control">
                                                     
                                                   </div>
                                                 </div>
                                                       <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Maximum Quantity to Buy</label>
                                                  <input type="number" name="buy[]"  value="0" class="form-control">
                                                     
                                                   </div>
                                                 </div>
                                                </div>
                                            <?php }?>
                                                  <button type="submit" class="btn btn"  style="background-color: #66CD00; color: white">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>               
                </div>
                <!-- END: Card DATA-->
            
 
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload Stock</h5> &nbsp;&nbsp;
                                                <a href="<?php echo base_url('get-saplings-list')?>"><button type="button" class="btn btn" style="background-color: #66CD00; color: white">
                                   Download File
                                </button></a>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="uploadSapling" method="post" enctype="multipart/form-data" action="<?php echo base_url('upload-stock')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Nursery<span class="tx-danger">*</span></label>
                                                        <select class="form-control" name="name" required="">
                                                     	<option selected="" disabled="">Select Nursery</option>
                                                     	<?php foreach($nursery as $n){?>
                                                           <option value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                                     	<?php }?>
                                                     </select>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Upload File<span class="tx-danger">*</span></label>
                                                        <input type="file" class="form-control" id="" name="file" placeholder="file" value="" required>
                                                        
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

<script type="text/javascript">
    $(document).ready(function() {
      



      $('#defaultForm')
      .bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          'textbox[]': {
            validators: {
              notEmpty: {
                message: 'The textbox is required.'
            }
        }
    },
    'saplings': {
        validators: {
          notEmpty: {
            message: 'The sapling is required.'
        }
    }
},

'name': {
    validators: {
      notEmpty: {
        message: 'The nursery name is required.'
    }
}
},


}
})
      .on('error.field.bv', function(e, data) {
                //console.log('error.field.bv -->', data.element);
            })
      .on('success.field.bv', function(e, data) {
                //console.log('success.field.bv -->', data.element);
            })
      .on('added.field.bv', function(e, data) {
                //console.log('Added element -->', data.field, data.element);
            })
      .on('removed.field.bv', function(e, data) {
                //console.log('Removed element -->', data.field, data.element);
            });
  });
</script>       

<script>
    $(document).ready(function(){
      $('#saplingsname').change(function(){
        
       var sapling=$('#saplingsname').val();
       var names=$('#name').val();
       var url="<?php echo base_url('stock-add'); ?>?sapling="+sapling+"&nursery="+names;
       document.location=url;
      // alert(url);
  });
  });

</script>   