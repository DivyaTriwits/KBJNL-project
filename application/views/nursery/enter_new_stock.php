           <style>
         .hide{
      display: none;
  }
       </style>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">New Stock</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item">New Stock</li>
                                
                                
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
                                            <form id="defaultForm" enctype="multipart/form-data" method="post" action="<?php echo base_url('add-new-stock')?>">
                                                <div class="form-row">
                                                    
                                                     <div class="col-md-6">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Select Saplings<span class="tx-danger">*</span></label>
                                                 
                                                     <select class="form-control" name="saplings" required="">
                                                      <option selected="" disabled="">Select</option>
                                                      <?php foreach($sapling as $s){?>
                                                           <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
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
            
 
 

<script type="text/javascript">
    $(document).ready(function() {
      $('.addButton').on('click', function() {
        var index = $(this).data('index');
        if (!index) {
          index = 1;
          $(this).data('index', 1);
      }
      index++;
      $(this).data('index', index);

      var template     = $(this).attr('data-template'),
      $templateEle = $('#' + template + 'Template'),
      $row = $templateEle.clone().removeAttr('id').insertBefore($templateEle).removeClass('hide');
      console.log($row);
        // $el          = $row.find('input').eq(0).attr('name', 'product[]');
        // console.log($row.find('input').eq(0));
        $('#defaultForm').bootstrapValidator('addField', 'sapling[]');
        $('#defaultForm').bootstrapValidator('addField', 'qty[]');
  
        
        // $(".select2").select2();
        // $el.attr('placeholder', 'Textbox #' + index);
        $row.on('click', '.removeButton', function(e) {
          console.log($row);
          // $('#defaultForm').bootstrapValidator('removeField', $el);
        //   $('#defaultForm').bootstrapValidator('removeField', 'product[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'quantity[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'rateperunit[]');
        // $('#defaultForm').bootstrapValidator('removeField', 'totalamount[]');
        $row.remove();
    });
    });



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
'qty': {
    validators: {
      notEmpty: {
        message: 'The quantity is required.'
    }
}
},
'bag': {
    validators: {
      notEmpty: {
        message: 'The bag size is required.'
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

