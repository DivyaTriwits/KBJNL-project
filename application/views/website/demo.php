

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
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Accordion Item #1
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
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