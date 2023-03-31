       <style>
         .hide{
      display: none;
  }
       </style>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Nursery</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('nursery-page')?>" >Nursery</a></li>
                                <li class="breadcrumb-item active"><a href="#">Add Nursery</a></li>
                                
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
                                            <form id="defaultForm" enctype="multipart/form-data" method="post" action="<?php echo base_url('insert-nursery')?>">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Nursery Name<span class="tx-danger">*</span></label>
                                                         <input type="text" class="form-control" id="" placeholder="Nursery Name" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Loaction<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="" placeholder="Location" name="location" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">User ID<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" class="form-control" name="userid" placeholder="UserID" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Password<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="password"  class="form-control" name="password" placeholder="Password" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                  <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Officer Name<span class="tx-danger">*</span></label>
                                                     <input 
                                                     class="form-control" type="text"  name="officer[]" placeholder="" required="" autocomplete="off"/> 

                                                   </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Contact No.<span class="tx-danger">*</span></label>
                                                     <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10"
                                                     class="form-control" type="text"  name="mobile[]" placeholder="" required="" autocomplete="off"/> 

                                                   </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1"><span style="color: white">*</span></label>
                                                     <br>
                                                     <a  class="btn btn-info btn-sm addButton" data-template="textbox" style="color: white"><i class="mdi mdi-plus"></i></a>
                                                   </div>
                                                   <!-- <button type="button" class="btn btn-default btn-sm addButton" data-template="textbox">Add</button> -->
                                                 </div>


                                               </div>
                                               <div class="form-group hide row" id="textboxTemplate">

                                                <div class="col-md-3">
                                                 <div class="form-group">
                                                   <label for="exampleInputPassword1">Officer Name<span class="tx-danger">*</span></label>
                                                   <input 
                                                   class="form-control" type="text"  name="officer[]" placeholder="" required="" autocomplete="off"/> 

                                                 </div>
                                               </div>
                                               <div class="col-md-3">
                                                 <div class="form-group">
                                                   <label for="exampleInputPassword1">Contact No.<span class="tx-danger">*</span></label>
                                                   <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10"
                                                   class="form-control" type="text"  name="mobile[]" placeholder="" required="" autocomplete="off"/> 

                                                 </div>
                                               </div>
                                               <div class="col-md-3">
                                                 <div class="form-group">
                                                   <label for="exampleInputPassword1"><span style="color: white">*</span></label>
                                                   <br>
                                                   <a class="removeButton" style="color: red; cursor: pointer;"><i class="fa fa-trash"></i></a>
                                                 </div>
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
        $('#defaultForm').bootstrapValidator('addField', 'officer[]');
        $('#defaultForm').bootstrapValidator('addField', 'mobile[]');
  
        
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
    'officer[]': {
        validators: {
          notEmpty: {
            message: 'The officer name is required.'
        }
    }
},
'mobile[]': {
    validators: {
      notEmpty: {
        message: 'The contact number is required.'
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
'location': {
    validators: {
      notEmpty: {
        message: 'The nursery location is required.'
    }
}
},
'city': {
    validators: {
      notEmpty: {
        message: 'The city is required.'
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

