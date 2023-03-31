                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center" style="padding-top: 3px !important; padding-bottom: 3px !important">
                        <div class="sub-header mt-2 py-2 align-self-center d-sm-flex w-100 rounded" style="padding-top: 3px !important; padding-bottom: 3px !important">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Customer Details</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('orders-page')?>">Orders</a></li>
                                <li class="breadcrumb-item">Customer Details</li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                      <div class="col-12 col-md-12 col-lg-12 mt-3">
                        <div class="card">                      
                            <div class="card-content">
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-4">
                                        <tr>
                                           <th><b>Name :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->full_name?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Mobile No :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->mobile_no?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Aadhaar No :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->aadhaar_no?></td>
                                       </tr>
                                       </div>
                                       </div>
                                         <div class="row" style="padding-top: 15px">
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Survey No :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->survey_number?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Extend of Land :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->extend_of_land?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Water Source :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->water_source?></td>
                                       </tr>
                                       
                                       </div>
                                   </div>
                                     <div class="row" style="padding-top: 15px">
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Village :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->village?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>Taluka :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->taluka?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b>District :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->district?></td>
                                       </tr>
                                       
                                       </div>
                                   </div>
                                     <div class="row" style="padding-top: 15px">
                                              <div class="col-4">
                                        <tr>
                                           <th><b>State :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->state?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b> Aadhaar Card :</b></th>
                                           <td> &nbsp;&nbsp; <a href="<?php echo base_url()?>uploads/documents/<?php echo $customer->aadhaar_card?>" download>Download</a></td>
                                       </tr>
                                       
                                       </div>
                                       <?php if($customer->uttara !=''){?>
                                          <div class="col-4">
                                        <tr>
                                           <th><b> RTC Uttara :</b></th>
                                           <td > &nbsp;&nbsp; <a href="<?php echo base_url()?>uploads/documents/<?php echo $customer->uttara?>" download>Download</a></td>
                                       </tr>
                                       
                                       </div>
                                   <?php }?>
                                   </div>
                                   <?php if($customer->slot_time != ''){
                                    $slots = $this->db->where('slot_id',$customer->slot_time)->get('slots')->row();?>
                                   <div class="row" style="padding-top: 15px">
                                              <div class="col-4">
                                        <tr>
                                           <th><b>Slot Date :</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $customer->slot_date?></td>
                                       </tr>
                                       
                                       </div>
                                         <div class="col-4">
                                        <tr>
                                           <th><b> Slot Time:</b></th>
                                           <td> &nbsp;&nbsp; <?php echo $slots->start_time?> - <?php echo $slots->end_time?></td>
                                       </tr>
                                       
                                       </div>
                                       
                                   </div>
                                 <?php }?>
                                   </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>                 
                </div>

               
                        
                        
                                <script>
                                    function setDataFunction(id){
                                       $('#id').val(id);

                                   }
                               </script>

                               <script>
                                function setrejectFunction(id){
                                 $('#did').val(id);
                                 
                             }
                         </script>
                         <script>
                                function setFunction(id){
                                   // alert(id);
                                 $('#rid').val(id);
                                 
                             }
                         </script>
                           <script>
                                    function setPaymentData(id){
                                       $('#pid').val(id);

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
        date: {

          validators: {
            notEmpty: {
              message: 'The date is required'
            }
          }
        },
      time: {

          validators: {
            notEmpty: {
              message: 'The time is required'
            }
          }
        },
      }
    })
  });

</script>
