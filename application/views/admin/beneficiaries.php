 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Beneficiaries</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">Beneficiaries</li>
                                <li class="breadcrumb-item active"><a href="#">View Beneficiaries</a></li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                         
                            <div class="card-body">
                               <div class="col-12" align="right">
                            <input type="text" name="aadhaar" class="rounded" placeholder="Enter Aadhaar No." id="aadhaar" value="<?php echo $this->input->get('aadhaar');?>">
                          </div>
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Customer Name</th>
                                                <th>Customer Contact No.</th>
                                                 <th>Customer Aadhaar No.</th>
                                                 <th>Nursery</th>
                                                 <th>Year</th>
                                                 <th>Month</th>
                                                 <th>View Saplings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if($this->input->get('aadhaar')){?>
                                            <?php $i=1;
                                             foreach($idBeneficiaries as $s){
                                           $time=strtotime($s->ordered_date);
                                                 ?>
                                                 
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                               <td><?php echo $s->full_name?>
                                  </td> 
                                          <td align="right"><?php echo $s->mobile_no;?></td>
                                                <td align="right"><?php echo $s->aadhaar_no;?></td>
                                              
                                               <td align="right"><?php echo $s->nursery_name;?></td>
                                                 <td align="right"><?php echo date("Y",$time);?></td>
                                                 <td align="right"><?php echo date("F",$time);?></td>
                                                  <td><a href="<?php echo base_url('view-orders-details/'.$s->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
                                            </tr>

                                            <?php $i++; }?>
                                             <?php  } else {?>
                                              <?php $i=1;
                                             foreach($beneficiaries as $s){
                                           $time=strtotime($s->ordered_date);
                                                 ?>
                                                 
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                               <td><?php echo $s->full_name?>
                                            </td> 
                                          <td align="right"><?php echo $s->mobile_no;?></td>
                                                <td align="right"><?php echo $s->aadhaar_no;?></td>
                                              
                                               <td align="right"><?php echo $s->nursery_name;?></td>
                                                 <td align="right"><?php echo date("Y",$time);?></td>
                                                 <td align="right"><?php echo date("F",$time);?></td>
                                                  <td><a href="<?php echo base_url('view-orders-details/'.$s->order_id)?>" style="color: green; size: 150px !important"><i class="mdi mdi-cryengine"></i></a></td>
                                            </tr>

                                            <?php $i++; }?>
                                             <?php }?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
                <!-- END: Card DATA-->


                <script>
$(function(){
      $("#aadhaar").change(function(){
        //alert('hi');
        debugger;
        window.location=window.location.href.split('?')[0] + "?aadhaar=" + this.value
      });
    });


                                        </script>