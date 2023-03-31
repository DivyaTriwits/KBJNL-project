       
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Cash Remittance</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">

                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('nursery-monthly-statement')?>">Monthly Statement</a></li>

                                <li class="breadcrumb-item active"><a href="#">Cash Remittance</a></li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
              
                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                  <form method="GET" action="<?php echo base_url('nursery-cash-monthly-statement')?>" id="loginForm">
                                <div class="row">
                                       <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Month<span class="tx-danger">*</span></label>
                                         
                                           <select class="select2 form-control" name="month" id="month" style="width: 100%; height:36px;">
                                         
                                     </select>

                  
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">From Date<span class="tx-danger">*</span></label>
                                              <input type="date" name="from_date" id="from_date" value="<?php echo ($this->input->get('from_date') != '' )  ? $this->input->get('from_date') : date('Y-m-d') ;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">To Date<span class="tx-danger">*</span></label>
                                             <input type="date" name="to_date" id="to_date" value="<?php echo ($this->input->get('to_date') != '' )  ? $this->input->get('to_date') : date('Y-m-d') ;?>" class="form-control">
                                        </div>
                                    </div>
                              
                             <div class="col-md-3">
                                        <div class="form-group">
                                             <label for="exampleInputPassword1"><span style="color: white">*</span></label>
                                             <br>

                                  <button type="submit" class="btn btn-sm" style="background-color: #66CD00; color: white">Search</button>

                              </div>
                               </div>

                          </div>
                      </form>
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                
                                                <th>Mode</th>
                                                <th>Date</th> 
                                                <th>Month</th>
                                                <th>Amount</th>
                                                
                                            </tr>
                                        </thead>
                                         <tbody>
                                             <?php if($this->input->get('month')){?>
                                            <?php $i=1; $total=0;
                                             foreach($filterData as $s){
                                              $total+=$s->amount;
                                               $time=strtotime($s->date);
                                              ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                    
                                                <td><?php echo $s->mode?></td>
                                                <td><?php echo $s->date?></td>
                                                <td><?php echo date("F",$time);?></td>
                                                <td><?php echo $s->amount?></td>
                                             
                                               
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        <?php } else {?>
                                            <?php $i=1; $total=0;
                                             foreach($cash as $s){
                                              $total+=$s->amount;
                                               $time=strtotime($s->date);
                                              ?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                    
                                                <td><?php echo $s->mode?></td>
                                                <td><?php echo $s->date?></td>
                                                <td><?php echo date("F",$time);?></td>
                                                <td><?php echo $s->amount?></td>
                                             
                                               
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        <?php }?>
                                              
                                        </tbody>
                                       <tfoot>
                                         <tr>
                                              <td colspan="4" align="right">Total</td>
                                              <td><?php echo $total?></td>
                                            </tr>
                                       </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->
            
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