              <style>
         .hide{
      display: none;
  }
       </style>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Saplings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('saplings')?>" >Saplings</a></li>
                                <li class="breadcrumb-item active"><a href="#">Add saplings</a></li>
                                 <li class="breadcrumb-item"><a href="<?php echo base_url('view-saplings')?>"> <button type="button" class="btn btn-sm" style="background-color: #66CD00; color: white">
                                   View Saplings
                                </button></a></li>
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
                                            <form id="defaultForm" enctype="multipart/form-data" method="post" action="<?php echo base_url('insert-saplings')?>">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Varieties<span class="tx-danger">*</span></label>
                                                        <select name="variety" required="" class="form-control">
                                                            <option selected="" disabled="">Select</option>
                                                            <?php foreach($varieties as $v) {?>
                                                            <option value="<?php echo $v->variety_id?>">
                                                                <?php echo $v->variety?></option>
                                                        <?php }?>
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Saplings Name<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="" placeholder="Sapling Name" name="sapling" value="" required>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <h6>Bag Size</h6>
                                                <div class="card-body">
                                             <div class="row">    
                                        <?php 
                                             foreach($bags as $b){?>                     
                                    <div class="custom-control custom-checkbox custom-control-inline">
                                      <label >
                                        <input type="checkbox" class=""  value="<?php echo $b->bag_id?>" name="bags[]" id="customch">
                                        <?php echo $b->bagsize?></label>                                       
                                    </div>
                                    
                                   <?php }?>

                             </div>
                            
                                                </div>
                                                
                                                
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
        $('#defaultForm').bootstrapValidator('addField', 'bag[]');
        $('#defaultForm').bootstrapValidator('addField', 'cost[]');
  
        
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
    'bag[]': {
        validators: {
          notEmpty: {
            message: 'The bag size is required.'
        }
    }
},
'cost[]': {
    validators: {
      notEmpty: {
        message: 'The cost per sapling is required.'
    }
}
},

'variety': {
    validators: {
      notEmpty: {
        message: 'The variety is required.'
    }
}
},
'sapling': {
    validators: {
      notEmpty: {
        message: 'The sapling is required.'
    }
}
},
'description': {
    validators: {
      notEmpty: {
        message: 'The description is required.'
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


