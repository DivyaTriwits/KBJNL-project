 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View Seedling Reserve</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Seedling Reserve</li>
                                <li class="breadcrumb-item active"><a href="#">View Seedling Reserve</a></li>
                                  <li class="breadcrumb-item"><a href="<?php echo base_url('seedling-reserve')?>"><button type="button" class="btn btn-success btn-sm" style="background-color: #66CD00; border-color:  #66CD00 " >Add Seedling Reserve</button></a>
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
                                                <th>Customer Name</th>
                                                <th>Customer Mobile</th>
                                                <th>Aadhaar</th>
                                                <th>Reserve Year</th>
                                                <th>Reserve Month</th>
                                               <th>Amount</th>
                                               <th>View </th>
                                                <th>Action</th>
                                                <th>Certificate</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($reserve as $n){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $n->customer_name?>
                                  </td>
                                                <td><?php echo $n->mobile?></td>
                                                <td><?php echo $n->customer_aadhaar?></td>
                                                <td><?php echo $n->year?></td>
                                                <td><?php echo $n->month?></td>
                                                <td><?php echo $n->amount?></td>
                                                <td><a align="center" href="<?php echo base_url('view-reserve-sapling/'.$n->reserve_id)?>"><i class="mdi mdi-eye-check-outline"></i></a></td>
                                                
                                                <td><a style="color: green; cursor: pointer;" onclick="setDataFunction('<?php echo $n->id; ?>',
                      '<?php echo $n->customer_name; ?>', 
                                '<?php echo $n->mobile?>',
                                '<?php echo $n->customer_aadhaar?>',
                                 '<?php echo $n->year?>',
                                 '<?php echo $n->month?>',
                                 '<?php echo $n->amount?>',
                                
                      )" data-toggle="modal" data-target="#editSapling"><i class="mdi mdi-pencil-outline"></i></a>
                  <a style="color: red; cursor: pointer;" onclick="setDeleteFunction('<?php echo $n->id; ?>',
                                  
                      )" data-toggle="modal" data-target="#deletevareity"><i class="mdi mdi-delete-circle-outline"></i></a></td>
                                                <td><a align="center" href="<?php echo base_url('certificate/'.$n->reserve_id)?>"><i class="mdi mdi-eye-check-outline"></i></a></td>
                                                
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
                                                <h5 class="modal-title" id="myLargeModalLabel10">Edit Seeddling Reserve</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                             <form id="editReserve" enctype="multipart/form-data" method="post" action="<?php echo base_url('edit-seedling-reserve')?>">
                                            <div class="modal-body">
                                                <input type="hidden" name="id" id="id">
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label>Customer Name<span class="tx-danger">*</span></label>
                                                         <input type="text" class="form-control" id="name" placeholder="" name="name" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Mobile<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Aadhaar No<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text"class="form-control" name="aadhaar" id="aadhaar" placeholder="" aria-describedby="inputGroupPrepend" required>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Year<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <select class="form-control" required name="year" id="year">
                                                          
                                                         </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Month<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <select class="form-control" required name="month" id="month">
                                                     
                                                         </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="">Amount<span class="tx-danger">*</span></label>
                                                        <div class="input-group">
                                                           
                                                            <input type="text" class="form-control" name="amount" id="amount" placeholder="" aria-describedby="inputGroupPrepend" required>
                                                            
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
                                            <form class="needs-validation" method="post" action="<?php echo base_url('delete-seedling-reserve')?>">
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
    function setDataFunction(id,name,mobile,aadhaar,year,month,amount){
     $('#id').val(id);
     $('#name').val(name);
     $('#mobile').val(mobile);
     $('#aadhaar').val(aadhaar);
     $('#year').val(year); 
      $('#month').val(month); 
       $('#amount').val(amount); 
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