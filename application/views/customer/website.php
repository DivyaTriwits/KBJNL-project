 
<style >
  li {
    padding:2px;  
    font-size: 15px;
  }
  .tx-danger{
    color: red;
   }
</style>
 <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?php echo base_url()?>webassest/img/plant.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>KBJNL</span></h2>
              <!-- <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p> -->
              <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(<?php echo base_url()?>webassest/img/plant3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">K.B.J.N.L FOREST DIVISION ALMATTI</h2>
             <!--  <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(<?php echo base_url()?>webassest/img/plant4.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">KBJNL</h2>
              <!-- <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a> -->
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <?php if($this->session->userdata('lang')=='EN') { ?>
          <h2>About <br> K.B.J.N.L Forest Division Almatti</h2>
<?php } else {?>
  <h2>ಸುಮಾರು <br> K.B.J.N.L ಅರಣ್ಯ ವಿಭಾಗ ಅಲ್ಮಟ್ಟಿ</h2>

  <?php }?>

  <?php if($this->session->userdata('lang')=='EN') { ?>
          <p class="fst-italic">Forest Division is looking after catchment area treatment of Almatti & Narayanapur Reservoir along with soft landscape works on either side of the Almatti Dam and Garden work at Naranyanpur Dam.</p>
          <?php } else {?>
             <p>ಅಲ್ಮಾಟ್ಟಿ ಮತ್ತು ನಾರಾಯಣಪುರ ಜಲಾಶಯದ ಜಲಾನಯನ ಪ್ರದೇಶದ ಚಿಕಿತ್ಸೆಯನ್ನು ಅರಣ್ಯ ವಿಭಾಗವು ನೋಡಿಕೊಳ್ಳುತ್ತಿದೆ ಮತ್ತು ಅಲ್ಮಟ್ಟಿ ಅಣೆಕಟ್ಟಿನ ಎರಡೂ ಬದಿಯಲ್ಲಿ ಮೃದುವಾದ ಭೂದೃಶ್ಯದ ಕೆಲಸಗಳು ಮತ್ತು ನಾರಣ್ಯಣಪುರ ಅಣೆಕಟ್ಟಿನ ಉದ್ಯಾನ ಕೆಲಸ
</p>
<?php }?>
        </div>

        <div class="row">
          
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 justify-content-center d-flex flex-column content" data-aos="fade-up" data-aos-delay="100">
             <?php if($this->session->userdata('lang')=='EN') { ?>
            <h5><b>Afforestation in Catchment Area Treatment</b></h5>
            <p style="padding:2px; font-size: 15px">
             The Forest Division in KBJNL wing is taking Catchment Area Treatment as per the guidelines of MOEF.
            </p>
            <h5><b>The main objectives are as below,</b></h5>
           
              <li style="padding:2px; font-size: 15px"> To prevent soil erosion in the catchment area of the reservoir and accumulation of silt in the reservoir by adopting appropriate soil and water conservation structures & afforestation measures.</li>
              <li>To meet the ever increasing demand for fuel, fodder, green manure and small timber by the local population which is mainly dependent on agriculture.</li>
              <li>To raise vegetation which will serve as a shelter belt and minimize soil erosion.</li>
               <li>To provide employment to the local population through afforestation in the catchment area.</li>
                <li>To improve socio-economic condition of the people in the vicinity.</li>
                 <li>To encourage the local people to raise trees in the private lands through distribution of seedling.</li>
                  <li>To improve the agro climatic condition and rainfall condition of the region.</li>
            
          <?php } else {?>
             <h5>ಕ್ಯಾಚ್ಮೆಂಟ್ ಏರಿಯಾ ಟ್ರೀಟ್ಮೆಂಟ್ನಲ್ಲಿ ಅರಣ್ಯೀಕರಣ</h5>
             <p>ಕೆಬಿಜೆಎನ್‌ಎಲ್ ವಿಭಾಗದ ಅರಣ್ಯ ವಿಭಾಗವು ಎಂಒಇಎಫ್‌ನ ಮಾರ್ಗಸೂಚಿಗಳ ಪ್ರಕಾರ ಕ್ಯಾಚ್‌ಮೆಂಟ್ ಏರಿಯಾ ಚಿಕಿತ್ಸೆಯನ್ನು ತೆಗೆ
            ದುಕೊಳ್ಳುತ್ತಿದೆ</p>
            <h5>ಮುಖ್ಯ ಉದ್ದೇಶಗಳು ಈ ಕೆಳಗಿನಂತಿವೆ</h5>
             <li>ಜಲಾಶಯದ ಜಲಾನಯನ ಪ್ರದೇಶದಲ್ಲಿ ಮಣ್ಣಿನ ಸವೆತವನ್ನು ತಡೆಗಟ್ಟಲು ಮತ್ತು ಸೂಕ್ತವಾದ ಮಣ್ಣು ಮತ್ತು ನೀರಿನ ಸಂರಕ್ಷಣಾ ರಚನೆಗಳು ಮತ್ತು ಅರಣ್ಯನಾಶ ಕ್ರಮಗಳನ್ನು ಅಳವಡಿಸಿಕೊಳ್ಳುವ ಮೂಲಕ ಜಲಾಶಯದಲ್ಲಿ ಹೂಳು ಸಂಗ್ರಹವಾಗುವುದನ್ನು ತಡೆಯುವುದು</li>
             <li>ಮುಖ್ಯವಾಗಿ ಕೃಷಿಯ ಮೇಲೆ ಅವಲಂಬಿತವಾಗಿರುವ ಸ್ಥಳೀಯ ಜನಸಂಖ್ಯೆಯಿಂದ ಇಂಧನ, ಮೇವು, ಹಸಿರು ಗೊಬ್ಬರ ಮತ್ತು ಸಣ್ಣ ಮರಗಳಿಗೆ ನಿರಂತರವಾಗಿ ಹೆಚ್ಚುತ್ತಿರುವ ಬೇಡಿಕೆಯನ್ನು ಪೂರೈಸುವುದು.</li>
             <li>ಆಶ್ರಯ ಪಟ್ಟಿಯಾಗಿ ಕಾರ್ಯನಿರ್ವಹಿಸುವ ಮತ್ತು ಮಣ್ಣಿನ ಸವೆತವನ್ನು ಕಡಿಮೆ ಮಾಡುವ ಸಸ್ಯವರ್ಗವನ್ನು ಹೆಚ್ಚಿಸಲು.</li>
              <li>ಜಲಾನಯನ ಪ್ರದೇಶದಲ್ಲಿ ಅರಣ್ಯನಾಶದ ಮೂಲಕ ಸ್ಥಳೀಯ ಜನರಿಗೆ ಉದ್ಯೋಗ ಒದಗಿಸುವುದು.</li>
              <li>ಸುತ್ತಮುತ್ತಲಿನ ಜನರ ಸಾಮಾಜಿಕ-ಆರ್ಥಿಕ ಸ್ಥಿತಿಯನ್ನು ಸುಧಾರಿಸುವುದು</li>
              <li>
ಮೊಳಕೆ ವಿತರಣೆಯ ಮೂಲಕ ಖಾಸಗಿ ಜಮೀನುಗಳಲ್ಲಿ ಮರಗಳನ್ನು ಬೆಳೆಸಲು ಸ್ಥಳೀಯ ಜನರನ್ನು ಪ್ರೋತ್ಸಾಹಿಸುವುದು.</li>
<li>ಪ್ರದೇಶದ ಕೃಷಿ ಹವಾಮಾನ ಮತ್ತು ಮಳೆ ಸ್ಥಿತಿಯನ್ನು ಸುಧಾರಿಸಲು.</li>
          <?php }?>
           </div>
<div class="col-lg-6 " align="">
           <img style="height: 450px; width: 500px" src="<?php echo base_url()?>webassest/img/plant2.jpg" class="img-fluid" alt="">
          </div>
        </div>
        <?php if($this->session->userdata('lang')=='EN') { ?>
<p style="padding:2px; font-size: 15px">
              To build a greener ecosystem KBJNL is also distributing saplings to locals and farmers. If you need saplings you can place your order from the SHOP section in this website 
            </p>
             <?php } else {?>
            <p>ಹಸಿರು ಪರಿಸರ ವ್ಯವಸ್ಥೆಯನ್ನು ನಿರ್ಮಿಸಲು ಕೆಬಿಜೆಎನ್ಎಲ್ ಸ್ಥಳೀಯರು ಮತ್ತು ರೈತರಿಗೆ ಸಸಿಗಳನ್ನು ವಿತರಿಸುತ್ತಿದೆ. ನಿಮಗೆ ಸಸಿಗಳ ಅಗತ್ಯವಿದ್ದರೆ ಈ ವೆಬ್‌ಸೈಟ್‌ನಲ್ಲಿನ SHOP ವಿ.ಭಾಗದಿಂದ ನಿಮ್ಮ ಆದೇಶವನ್ನು ಇರಿಸಬಹುದು</p>
            <?php }?>
      </div>
    </section>

   
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color: #f8fcf9">
      <div class="container">

        <div class="section-title">
          <?php if($this->session->userdata('lang')=='EN') { ?>
          <h2>Contact</h2>
          <?php } else {?>
          <h2>ಸಂಪರ್ಕ</h2>
          <?php }?>
          
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <?php if($this->session->userdata('lang')=='EN') { ?>
                <h4>Location:</h4>
                <p>O/o The Chief Engineer,KBJNL, Dam Zone, Almatti</p>
                <?php } else {?>
               <h4>ನಮ್ಮ ವಿಳಾಸ</h4>
               <p>O/o ಮುಖ್ಯ ಎಂಜಿನಿಯರ್, ಕೆಬಿಜೆಎನ್ಎಲ್, ಅಣೆಕಟ್ಟು ವಲಯ, ಅಲ್ಮಟ್ಟಿ</p>
                   <?php }?>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <?php if($this->session->userdata('lang')=='EN') { ?>
                <h4>Email:</h4>
                <p>cedam_almatti@yahoo.com</p>
                <?php } else {?>
                <h4>ನಮಗೆ ಇಮೇಲ್ ಮಾಡಿ</h4>
                 <p>cedam_almatti@yahoo.com</p>
                  <?php }?>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <h4>Call Us</h4>
              <?php } else {?>
              <h4>ನಮ್ಮನ್ನು ಕರೆ ಮಾಡಿ</h4>
              <?php }?>
                <p>+91 9886351288 <br>08426-281038</p>
               
              </div>
<iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15314.711311784691!2d75.8905775!3d16.3393978!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x35ac283303e3ff94!2sKBJNL%2CDAM%20DIVISION%20OFFICE!5e0!3m2!1sen!2sin!4v1623771949502!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
             
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="<?php echo base_url('Customer_controller/contact')?>" id="loginForm" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <?php if($this->session->userdata('lang')=='EN') { ?>
                  <label for="name">Your Name<span class="tx-danger">*</span></label>
                   <?php } else {?>
                    <label for="name">ನಿಮ್ಮ ಹೆಸರು<span class="tx-danger">*</span></label>
                    <?php }?>
                  <input type="text" pattern="[a-zA-Z]" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <?php if($this->session->userdata('lang')=='EN') { ?>
                  <label for="name">Your Mobile<span class="tx-danger">*</span></label>
                   <?php } else {?>
                    <label for="name">ನಿಮ್ಮ ಮೊಬೈಲ್<span class="tx-danger">*</span></label>
                    <?php }?>
                  <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" minlength="10" maxlength="10" name="mobile" id="mobile" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <?php if($this->session->userdata('lang')=='EN') { ?>
                <label for="name">Subject<span class="tx-danger">*</span></label>
                 <?php } else {?>
                    <label for="name">ವಿಷಯ<span class="tx-danger">*</span></label>
                    <?php }?>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <?php if($this->session->userdata('lang')=='EN') { ?>
                <label for="name">Message<span class="tx-danger">*</span></label>
                 <?php } else {?>
                    <label for="name">ಸಂದೇಶ<span class="tx-danger">*</span></label>
                    <?php }?>

                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
             <?php if($this->session->userdata('lang')=='EN') { ?>
              <div class="text-center"><button type="submit">Send Message</button></div>

               <?php } else {?>
                   <div class="text-center"><button type="submit">ಸಂದೇಶ ಕಳುಹಿಸಿ</button></div>
                <?php }?>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  
    <script>
          $(document).ready(function(){
            $('#loginForm').bootstrapValidator({
              feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {

                  validators: {
                    notEmpty: {
                      message: 'The name is required'
                  }
              }
          },
          mobile: {

              validators: {
                notEmpty: {
                  message: 'The mobile number is required'
              },
              stringLength: {
                        min: 10,
                        max: 10,
                        message: 'Enter a valid mobile number'
                    },
          }
      },
       subject: {

          validators: {
            notEmpty: {
              message: 'The subject is required'
            }
          }
        },
         message: {

          validators: {
            notEmpty: {
              message: 'The message is required'
            }
          }
        },
      
  }
})
        });

    </script>