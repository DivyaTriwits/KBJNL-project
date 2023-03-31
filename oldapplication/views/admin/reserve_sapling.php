 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Reserve Saplings</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Seedling Reserve</li>
                                <li class="breadcrumb-item active"><a href="#">View Reserve Saplings</a></li>
                                 <li class="breadcrumb-item"><a href="<?php echo base_url('view-seedling-reserve')?>"><button type="button" class="btn btn-success btn-sm" style="background-color: #66CD00; border-color:  #66CD00 " >View Seedling Reserve</button></a>
                                  </li>
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
                                                <th>Price</th>
                                                <th>Quantity</th>
                                               <th>Amount</th>
                                               
                                                <th>Action</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($sapling as $n){
                                              $amount= $n->price*$n->qty;
                                              ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $n->variety?>
                                  </td>
                                                <td><?php echo $n->sapling?></td>
                                                <td><?php echo $n->bagsize?></td>
                                                <td><?php echo $n->price?></td>
                                                <td><?php echo $n->qty?></td>
                                                <td><?php echo $amount?></td>
                                                
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $n->id; ?>',
                      '<?php echo $n->varietyid; ?>', 
                                '<?php echo $n->saplings_id?>',
                                '<?php echo $n->bag?>',
                                '<?php echo $n->qty?>'
                                
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Reserve Sapling</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="editReserve" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-reserve-sapling/'.$this->uri->segment(2))?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Variety<span class="tx-danger">*</span></label>
                                                         <select class="form-control" name="variety" required id="variety">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($variety as $v){?>
                                                      <option value="<?php echo $v->variety_id?>"><?php echo $v->variety?></option>
                                                       <?php }?>
                                                     </select>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Sapling<span class="tx-danger">*</span></label>
                                                        <select class="form-control" name="saplings" required id="saplings">
                                                        <option selected="" disabled="">select</option>
                                                       <?php foreach($sapling as $s){?>
                                                      <option value="<?php echo $s->saplingid?>"><?php echo $s->sapling?></option>
                                                       <?php }?>
                                                     </select>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Bag Size<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                           <select class="form-control" name="bagsize" required id="bag">
                                                       <option selected="" disabled="">select</option>
                                                       <?php foreach($bag as $b){?>
                                                      <option value="<?php echo $b->bag_id?>"><?php echo $b->bagsize?> (<?php echo $b->price?>)</option>
                                                       <?php }?>
                                                      </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Quantity<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                           <input type="number" class="form-control" name="qty" id="qty" placeholder="" aria-describedby="inputGroupPrepend" required>
                                                            
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
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Seedling Reserve</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-reserve-sapling/'.$this->uri->segment(2))?>">
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
    function setDataFunction(id,variety,sapling,bag,qty){
     $('#id').val(id);
     $('#variety').val(variety);
     $('#saplings').val(sapling);
     $('#bag').val(bag);
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
    $('#editReserve').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        name: {

          validators: {
            notEmpty: {
              message: 'The customer name is required'
            }
          }
        },
         mobile: {

          validators: {
            notEmpty: {
              message: 'The mobile no. is required'
            }
          }
        },
         aadhaar: {

          validators: {
            notEmpty: {
              message: 'The aadhaar no. is required'
            }
          }
        },
        year: {

          validators: {
            notEmpty: {
              message: 'The year is required'
            }
          }
        },
        month: {

          validators: {
            notEmpty: {
              message: 'The month is required'
            }
          }
        },
        amount: {

          validators: {
            notEmpty: {
              message: 'The amount is required'
            }
          }
        },

      }
    })
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