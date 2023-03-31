    <?php if($this->session->flashdata('success')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('success')?>');
    </script>
<?php }?>
       <style>
         .hide{
      display: none;
  }
       </style>
       <main>
        <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Future Demand</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                               <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Future Demand</li>
                                <li class="breadcrumb-item active"><a href="#">Add Future Demand</a></li>
                                  <li class="breadcrumb-item"><a href="<?php echo base_url('view-future-demand')?>"><button type="button" class="btn btn-success btn-sm" style="background-color: #66CD00; border-color:  #66CD00 " >View Future Demand</button></a>
                                  </li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
             
                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">                                           
                                        <div class="col-12">
                                            <form id="defaultForm" enctype="multipart/form-data" method="post" action="<?php echo base_url('insert-future-demand')?>">
                                                <div class="form-row">
                                                    <div class="col-md-3 mb-3">
                                                        <label>Year<span class="tx-danger">*</span></label>
                                                        
                                                         <select class="form-control" required name="year" id="year">
                                                          
                                                         </select>
                                                        
                                                    </div>
                                                    <div class="col-md-3 mb-3">
                                                        <label for="">Month<span class="tx-danger">*</span></label>
                                                        <select class="form-control" required name="month" id="month">
                                                     
                                                         </select>
                                                        
                                                    </div>
                                                    
                                                   
                                                </div>
                                                <div class="row">

                                                  <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Variety<span class="tx-danger">*</span></label>
                                                      <select class="form-control" name="variety[]" required id="variety">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($variety as $v){?>
                                                      <option value="<?php echo $v->variety_id?>"><?php echo $v->variety?></option>
                                                       <?php }?>
                                                     </select>

                                                   </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Sapling <span class="tx-danger">*</span></label>
                                                      <select class="form-control" name="saplings[]" required id="saplings">
                                                        <option selected="" disabled="">select</option>
                                                       <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                       <?php }?>
                                                     </select>
                                                      </select>
                                                    

                                                   </div>
                                                 </div>
                                                   <div class="col-md-2">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Bag Size <span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="bagsize[]" required id="bag">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($bag as $b){?>
                                                      <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?> (<?php echo $b->price?>)</option>
                                                       <?php }?>
                                                      </select>

                                                   </div>
                                                 </div>
                                                 <div class="col-md-2">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Quantity <span class="tx-danger">*</span></label>
                                                     <input 
                                                     class="form-control" type="number"  name="qty[]" placeholder="" required="" autocomplete="off"/> 

                                                   </div>
                                                 </div>
                                                 <div class="col-md-2">
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
                                                     <label for="exampleInputPassword1">Variety<span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="variety[]" required id="variety">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($variety as $v){?>
                                                      <option value="<?php echo $v->variety_id?>"><?php echo $v->variety?></option>
                                                       <?php }?>
                                                     </select>
                                                   

                                                   </div>
                                                 </div>
                                                 <div class="col-md-3">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Sapling <span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="saplings[]" required id="saplings">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                       <?php }?>
                                                      </select>

                                                   </div>
                                                 </div>
                                                    <div class="col-md-2">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Bag Size <span class="tx-danger">*</span></label>
                                                     <select class="form-control" name="bagsize[]" required id="bag">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($bag as $b){?>
                                                      <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?></option>
                                                       <?php }?>
                                                      </select>

                                                   </div>
                                                 </div>
                                                 <div class="col-md-2">
                                                   <div class="form-group">
                                                     <label for="exampleInputPassword1">Quantity <span class="tx-danger">*</span></label>
                                                     <input 
                                                     class="form-control" type="number"  name="qty[]" placeholder="" required="" autocomplete="off"/> 

                                                   </div>
                                                 </div>
                                               <div class="col-md-2">
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
            </div>
 </main>
 

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
        $('#defaultForm').bootstrapValidator('addField', 'variety[]');
        $('#defaultForm').bootstrapValidator('addField', 'saplings[]');
        $('#defaultForm').bootstrapValidator('addField', 'bagsize[]');
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
    'variety[]': {
        validators: {
          notEmpty: {
            message: 'The variety is required.'
        }
    }
},
'saplings[]': {
    validators: {
      notEmpty: {
        message: 'The sapling is required.'
    }
}
},
'qty[]': {
    validators: {
      notEmpty: {
        message: 'The quantity is required.'
    }
}
},
'bagsize[]': {
    validators: {
      notEmpty: {
        message: 'The bag size is required.'
    }
}
},
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
  $(document).ready(function() {
  const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
  ];
  let qntYears = 20;
  let selectYear = $("#year");
  let selectMonth = $("#month");
  let selectDay = $("#day");
  let currentYear = new Date().getFullYear();

  for (var y = 0; y < qntYears; y++) {
    let date = new Date(currentYear);
    let yearElem = document.createElement("option");
    yearElem.value = currentYear
    yearElem.textContent = currentYear;
    selectYear.append(yearElem);
    currentYear++;
  }

  for (var m = 0; m < 12; m++) {
    let month = monthNames[m];
    let monthElem = document.createElement("option");
    monthElem.value = month;
    monthElem.textContent = month;
    selectMonth.append(monthElem);
  }

  var d = new Date();
  var month = d.getMonth();
  var year = d.getFullYear();
  var day = d.getDate();

  selectYear.val(year);
  selectYear.on("change", AdjustDays);
  selectMonth.val(month);
  selectMonth.on("change", AdjustDays);

  AdjustDays();
  selectDay.val(day)

  function AdjustDays() {
    var year = selectYear.val();
    var month = parseInt(selectMonth.val()) + 1;
    selectDay.empty();

    //get the last day, so the number of days in that month
    var days = new Date(year, month, 0).getDate();

    //lets create the days of that month
    for (var d = 1; d <= days; d++) {
      var dayElem = document.createElement("option");
      dayElem.value = d;
      dayElem.textContent = d;
      selectDay.append(dayElem);
    }
  }
});
</script>
<!-- <script>
   $(document).ready(function () {
     $("#variety").change(function () {
       $("#saplings").html('');
       dropdownDivision();
    });
     dropdownDivision();
  });
   
   function dropdownDivision(){
     $("#saplings").html('');
     var val = $("#variety").val();
     <?php
    
     $sapling = $this->db->get('saplings')->result();
     ?>
     <?php foreach($sapling as $divname){?>
       if (val == '<?php echo $divname->varityid?>') {
         $("#saplings").append("<option value='<?php echo $divname->saplingid?>'><?php echo $divname->sapling?></option>");
      }
   <?php }?>
}
</script> -->