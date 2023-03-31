

<section id="contact" class="contact">
  <?php if($this->session->flashdata('success')){?>
           <script>
                                          swal({
                                              title: 'Order Placed Successfully!',
                                              text: 'We will send slot details by SMS.',
                                              type: "success",
                                              timer: 5000,
                                              showCancelButton: false,
                                              showConfirmButton: false
                                          }).then(
                                          function () {},
                                          function (dismiss) {
                                            if (dismiss === 'timer') {
      //console.log('I was closed by the timer')
                                         }
                                             }
                                          )
                                        </script>
       <?php }?>
      <div class="container" data-aos="fade-up">

        <div class="section-title" style="padding-bottom: 15px; padding-top: 15px">
          <h3><img height="35px" src="<?php echo base_url()?>website_assets/img/newlogo.png"><span style="color: #228B22">KBJNL</span></h3>
          <h4><span style="color: #228B22">Buyer Information</span></h4>
         
        </div>

 
        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4 image" >
            
            <img height="385px" width="370px" src="<?php echo base_url()?>website_assets/img/tree.jpg">
          </div>

          <div class="col-lg-8 col-md-12" >
                
            <form id="shopForm" action="<?php echo base_url('insert-shop')?>" method="post" >
              <div class="row" >
                
                <div class="col-md-6 mb-3 form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" id="name"  placeholder="Your Name" required>
                </div>
                <div class="col-md-6 mb-3 form-group">
                  <label>Survey Number</label>
                  <input type="text" class="form-control" name="servey" id="servey" placeholder="Survey Number" required>
                  <p id="servey_result"></p>
                </div>

                 <div class="col-md-6 mb-3 form-group">
                  <label>Water Source</label>
                  <select class="form-control" name="water" id="water">
                    <option selected="" disabled="">Select Source</option>
                    <option value="Drilled wells">Drilled wells</option>
                    <option value="Surface water">Surface water</option>
                    <option value="Drainage ponds">Drainage ponds</option>
                    <option value="Rain water">Rain water</option>
                    <option value="Municipal water">Municipal water</option>
                  </select>
                </div>
               
                <div class="col-md-6 mb-3 form-group">
                  <label>Extend Of Land</label>
                  <input type="text" class="form-control" name="land" id="name" placeholder="Extend Of Land" required>
                </div>
                 <div class="col-md-6 mb-3 form-group">
                  <label >Phone Number</label>
                 <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                </div>
               
                <div class="col-md-6 mb-3 form-group">
                  <label>Aadhaar Number</label>
                  <input type="text" class="form-control"  name="adhaar" id="adhaar" placeholder="Adhaar Number" required>
                  <p id="adhaar_result"></p>
                </div>
                 <div class="col-md-6 mb-3 form-group">
                  <label>Place</label>
                 <input type="text" class="form-control" name="place" id="place" placeholder="Place" required>
                </div>

                
                <div class="col-md-6 mb-3 form-group">
                  <label>Nursery Name</label>
                  <select class="form-control" name="nursery">
                    <option selected="" disabled="">Select Nursery</option>
                    <?php foreach($nursery as $n){?>
                    <option value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                  <?php }?>
                  </select>
                </div>
              </div>
             
             
              <div class="text-center"><button type="submit" class="btn" style="background-color: #228B22; height: 30px; padding-top: 3px; color: white">Submit</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <script>
  $(document).ready(function(){
    $('#shopForm').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        nursery: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
            }
          }
        },
         name: {

          validators: {
            notEmpty: {
              message: 'The name is required'
            }
          }
        },
         servey: {

          validators: {
            notEmpty: {
              message: 'The servey number is required'
            }
          }
        },
        water: {

          validators: {
            notEmpty: {
              message: 'The water source is required'
            }
          }
        },
      land: {

          validators: {
            notEmpty: {
              message: 'The extend of land is required'
            }
          }
        },
        phone: {

          validators: {
            notEmpty: {
              message: 'The phone number is required'
            }
          }
        },
        adhaar: {

          validators: {
            notEmpty: {
              message: 'The adhaar number is required'
            }
          }
        },
        place: {

          validators: {
            notEmpty: {
              message: 'The place is required'
            }
          }
        },
      }
    })
  });

</script>

<script type="text/javascript">
  
       function myFunction(){
       // alert('hi');
             // var adhaar = $('#adhaar').val();
             var adhaar = $('#adhaar').val();
            // var ahdar = adhaar.val();
             //alert(adhaar);  
             if(adhaar != '')  
             {  
                  $.ajax({  
                       url:"<?php echo base_url(); ?>chech-adhaar",  
                       method:"POST",  
                       data:{adhaar:adhaar},  
                       success:function(data){  
                            $('#adhaar_result').html(data);  
                       }  
                  });  
             }  
        };  
   
</script>

<script type="text/javascript">
   
    //alert('hi');
      function serveyFunction(){  
         // alert('hii');
             var servey = $('#servey').val();  
             // alert(servey);
             if(servey != '')  
             {  
                  $.ajax({  
                       url:"<?php echo base_url(); ?>chech-servey",  
                       method:"POST",  
                       data:{servey:servey},  
                       success:function(data){  
                            $('#servey_result').html(data);  
                       }  
                  });  
             }  
        };  
    
</script>

<style type="text/css">
  
  @media all and (max-width: 480px) {
    .image {
      display: none;
    }
    
    
}
</style>