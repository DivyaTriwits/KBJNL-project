 <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">View All Payments</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>" >Home</a></li>
                                <li class="breadcrumb-item">All Payments</li>
                                <li class="breadcrumb-item active"><a href="#">View All Payments</a></li>
                                
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
                                                <th>Payment Id</th>
                                                <th>Payment Mode</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                <th>Aadhaar No</th>
                                               <th>Paid Amount</th>
                                                <th>Paid Date</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($payment as $p){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                     <td><?php echo $p->payment_id?>
                                  </td>
                                                <td><?php echo $p->payment_mode?></td>
                                                <td><?php echo $p->full_name?></td>
                                                <td><?php echo $p->mobile_no?></td>
                                                <td><?php echo $p->aadhaar_no?></td>
                                              <td><?php echo $p->pay_amount?></td>
                                               <td><?php echo $p->payment_date?></td>
                                                
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


                 


 <script>
    function setDataFunction(id,name,location,city,password){
     $('#id').val(id);
     $('#name').val(name);
     $('#location').val(location);
     $('#city').val(city);
     $('#password').val(password); 
    }
</script>  

<script>
    function setDeleteFunction(id){
     $('#did').val(id);
    
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
        name: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
            }
          }
        },
         location: {

          validators: {
            notEmpty: {
              message: 'The location is required'
            }
          }
        },
         userid: {

          validators: {
            notEmpty: {
              message: 'The userid is required'
            }
          }
        },
        password: {

          validators: {
            notEmpty: {
              message: 'The password is required'
            }
          }
        },

      }
    })
  });

</script>