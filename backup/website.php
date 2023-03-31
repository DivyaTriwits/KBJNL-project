

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
         <?php if($this->session->userdata('lang')=='EN') { ?>
       <h1>Welcome to <span style="color: #228B22">KBJNL</span></h1>
        <?php } else {?>
        <h1>ಸ್ವಾಗತ <span style="color: #228B22">KBJNL</span></h1>
        <?php }?>
      <!-- <h2>We are team of talented designers making websites with Bootstrap</h2> -->
      <div class="d-flex">
          <?php if($this->session->userdata('lang')=='EN') { ?>
      <a href="<?php echo base_url('customer-registration')?>" class="btn-get-started scrollto" style="background-color: #228B22">Shop Now</a>
      <?php } else {?>
      <a href="<?php echo base_url('customer-registration')?>" class="btn-get-started scrollto" style="background-color: #228B22">ಈಗ ಖರೀದಿಸ</a>
      <?php }?>
        <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg" style="background-color:#fff">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
             <?php if($this->session->userdata('lang')=='EN') { ?>
          <h2>About</h2>
          <?php } else {?>
          <h2>ಸುಮಾರು</h2>
          <?php }?>
          
          <?php if($this->session->userdata('lang')=='EN') { ?>
          <h3>K.B.J.N.L Forest Division Almatti</h3>
          <?php } else {?>
          <h3>K.B.J.N.L ಅರಣ್ಯ ವಿಭಾಗ ಅಲ್ಮಟ್ಟಿ</h3>
          <?php }?>
        <!--   <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
            <img style="height: 550px; width: 500px" src="<?php echo base_url()?>website_assets/img/plant2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <!-- <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3> -->
             <?php if($this->session->userdata('lang')=='EN') { ?>
            <p class="fst-italic">
             Forest Division is looking after catchment area treatment of Almatti & Narayanapur Reservoir along with soft landscape works on either side of the Almatti Dam and Garden work at Naranyanpur Dam.
            </p>
             <?php } else {?>
             <p>ಅಲ್ಮಾಟ್ಟಿ ಮತ್ತು ನಾರಾಯಣಪುರ ಜಲಾಶಯದ ಜಲಾನಯನ ಪ್ರದೇಶದ ಚಿಕಿತ್ಸೆಯನ್ನು ಅರಣ್ಯ ವಿಭಾಗವು ನೋಡಿಕೊಳ್ಳುತ್ತಿದೆ ಮತ್ತು ಅಲ್ಮಟ್ಟಿ ಅಣೆಕಟ್ಟಿನ ಎರಡೂ ಬದಿಯಲ್ಲಿ ಮೃದುವಾದ ಭೂದೃಶ್ಯದ ಕೆಲಸಗಳು ಮತ್ತು ನಾರಣ್ಯಣಪುರ ಅಣೆಕಟ್ಟಿನ ಉದ್ಯಾನ ಕೆಲಸ
</p>
             <?php }?>
             <?php if($this->session->userdata('lang')=='EN') { ?>
            <h5> Afforestation in Catchment Area Treatment</h5>
             <?php } else {?>
             <h5>ಕ್ಯಾಚ್ಮೆಂಟ್ ಏರಿಯಾ ಟ್ರೀಟ್ಮೆಂಟ್ನಲ್ಲಿ ಅರಣ್ಯೀಕರಣ</h5>
             <?php }?>
             
             <?php if($this->session->userdata('lang')=='EN') { ?>
            <p>The Forest Division in KBJNL wing is taking Catchment Area Treatment as per the guidelines of MOEF. </p>
            <?php } else {?>
            <p>ಕೆಬಿಜೆಎನ್‌ಎಲ್ ವಿಭಾಗದ ಅರಣ್ಯ ವಿಭಾಗವು ಎಂಒಇಎಫ್‌ನ ಮಾರ್ಗಸೂಚಿಗಳ ಪ್ರಕಾರ ಕ್ಯಾಚ್‌ಮೆಂಟ್ ಏರಿಯಾ ಚಿಕಿತ್ಸೆಯನ್ನು ತೆಗೆ
            ದುಕೊಳ್ಳುತ್ತಿದೆ</p>
            <?php }?>
             <?php if($this->session->userdata('lang')=='EN') { ?>
            <h5>The main objectives are as below,</h5>
           
            <?php } else {?>
            <h5>ಮುಖ್ಯ ಉದ್ದೇಶಗಳು ಈ ಕೆಳಗಿನಂತಿವೆ</h5>
             <?php }?>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <li>
               To prevent soil erosion in the catchment area of the reservoir and accumulation of silt in the reservoir by adopting appropriate soil and water conservation structures & afforestation measures.
              </li>
              <?php } else {?>
              <li>ಜಲಾಶಯದ ಜಲಾನಯನ ಪ್ರದೇಶದಲ್ಲಿ ಮಣ್ಣಿನ ಸವೆತವನ್ನು ತಡೆಗಟ್ಟಲು ಮತ್ತು ಸೂಕ್ತವಾದ ಮಣ್ಣು ಮತ್ತು ನೀರಿನ ಸಂರಕ್ಷಣಾ ರಚನೆಗಳು ಮತ್ತು ಅರಣ್ಯನಾಶ ಕ್ರಮಗಳನ್ನು ಅಳವಡಿಸಿಕೊಳ್ಳುವ ಮೂಲಕ ಜಲಾಶಯದಲ್ಲಿ ಹೂಳು ಸಂಗ್ರಹವಾಗುವುದನ್ನು ತಡೆಯುವುದು</li>
              <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <li>
                To meet the ever increasing demand for fuel, fodder, green manure and small timber by the local population which is mainly dependent on agriculture.
              </li>
              <?php } else {?>
              <li>ಮುಖ್ಯವಾಗಿ ಕೃಷಿಯ ಮೇಲೆ ಅವಲಂಬಿತವಾಗಿರುವ ಸ್ಥಳೀಯ ಜನಸಂಖ್ಯೆಯಿಂದ ಇಂಧನ, ಮೇವು, ಹಸಿರು ಗೊಬ್ಬರ ಮತ್ತು ಸಣ್ಣ ಮರಗಳಿಗೆ ನಿರಂತರವಾಗಿ ಹೆಚ್ಚುತ್ತಿರುವ ಬೇಡಿಕೆಯನ್ನು ಪೂರೈಸುವುದು.</li>
              <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <li> To raise vegetation which will serve as a shelter belt and minimize soil erosion.</li>
              <?php } else {?>
              <li>ಆಶ್ರಯ ಪಟ್ಟಿಯಾಗಿ ಕಾರ್ಯನಿರ್ವಹಿಸುವ ಮತ್ತು ಮಣ್ಣಿನ ಸವೆತವನ್ನು ಕಡಿಮೆ ಮಾಡುವ ಸಸ್ಯವರ್ಗವನ್ನು ಹೆಚ್ಚಿಸಲು.</li>
              <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
                <li> To provide employment to the local population through afforestation in the catchment area.</li>
                <?php } else {?>
                <li>ಜಲಾನಯನ ಪ್ರದೇಶದಲ್ಲಿ ಅರಣ್ಯನಾಶದ ಮೂಲಕ ಸ್ಥಳೀಯ ಜನರಿಗೆ ಉದ್ಯೋಗ ಒದಗಿಸುವುದು.</li>
                <?php }?>
                 <?php if($this->session->userdata('lang')=='EN') { ?>
     <li>To improve socio-economic condition of the people in the vicinity.</li>
     <?php } else {?>
     <li>ಸುತ್ತಮುತ್ತಲಿನ ಜನರ ಸಾಮಾಜಿಕ-ಆರ್ಥಿಕ ಸ್ಥಿತಿಯನ್ನು ಸುಧಾರಿಸುವುದು</li>
     <?php }?>
      <?php if($this->session->userdata('lang')=='EN') { ?>
     <li>To encourage the local people to raise trees in the private lands through distribution of seedling.</li>
     <?php } else {?>
     <li>
ಮೊಳಕೆ ವಿತರಣೆಯ ಮೂಲಕ ಖಾಸಗಿ ಜಮೀನುಗಳಲ್ಲಿ ಮರಗಳನ್ನು ಬೆಳೆಸಲು ಸ್ಥಳೀಯ ಜನರನ್ನು ಪ್ರೋತ್ಸಾಹಿಸುವುದು.</li>
     <?php }?>
      <?php if($this->session->userdata('lang')=='EN') { ?>
     <li>To improve the agro climatic condition and rainfall condition of the region.</li>
          <?php } else {?>  
           <li>ಪ್ರದೇಶದ ಕೃಷಿ ಹವಾಮಾನ ಮತ್ತು ಮಳೆ ಸ್ಥಿತಿಯನ್ನು ಸುಧಾರಿಸಲು.</li>
           <?php }?>
          </div>
          <div class="col-lg-12">
               <?php if($this->session->userdata('lang')=='EN') { ?>
             <p>
            To build a greener ecosystem KBJNL is also distributing saplings to locals and farmers. If you need saplings you can place your order from the SHOP section in this website
            </p>
            <?php } else {?>
            <p>ಹಸಿರು ಪರಿಸರ ವ್ಯವಸ್ಥೆಯನ್ನು ನಿರ್ಮಿಸಲು ಕೆಬಿಜೆಎನ್ಎಲ್ ಸ್ಥಳೀಯರು ಮತ್ತು ರೈತರಿಗೆ ಸಸಿಗಳನ್ನು ವಿತರಿಸುತ್ತಿದೆ. ನಿಮಗೆ ಸಸಿಗಳ ಅಗತ್ಯವಿದ್ದರೆ ಈ ವೆಬ್‌ಸೈಟ್‌ನಲ್ಲಿನ SHOP ವಿ.ಭಾಗದಿಂದ ನಿಮ್ಮ ಆದೇಶವನ್ನು ಇರಿಸಬಹುದು</p>
            <?php }?>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->




    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="background-color:#f6f9fe">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
             <?php if($this->session->userdata('lang')=='EN') { ?>
          <h2>Contact</h2>
          <?php } else {?>
          <h2>ಸಂಪರ್ಕ</h2>
          <?php }?>
          
          <?php if($this->session->userdata('lang')=='EN') { ?>
          <h3><span>Contact Us</span></h3>
          
          <?php } else {?>
          <h3><span>ನಮ್ಮನ್ನು ಸಂಪರ್ಕಿಸಿ</span></h3>
          <?php }?>
         <!--  <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> -->
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <h3>Our Address</h3>
              <?php } else {?>
              <h3>ನಮ್ಮ ವಿಳಾಸ</h3>
              <?php }?>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <p>O/o The Chief Engineer,KBJNL, Dam Zone, Almatti</p>
              <?php } else {?>
              <p>O/o ಮುಖ್ಯ ಎಂಜಿನಿಯರ್, ಕೆಬಿಜೆಎನ್ಎಲ್, ಅಣೆಕಟ್ಟು ವಲಯ, ಅಲ್ಮಟ್ಟಿ</p>
              <?php }?>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <h3>Email Us</h3>
              <?php } else {?>
              <h3>ನಮಗೆ ಇಮೇಲ್ ಮಾಡಿ</h3>
              <?php }?>
              <p>cedam_almatti@yahoo.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6" >
            <div class="info-box  mb-4" style="height: 170px">
              <i class="bx bx-phone-call"></i>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <h3>Call Us</h3>
              <?php } else {?>
              <h3>ನಮ್ಮನ್ನು ಕರೆ ಮಾಡಿ</h3>
              <?php }?>
              <p>+91 9886351288</p>
              <p>08426-281038</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
<!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15314.711311784691!2d75.8905775!3d16.3393978!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x35ac283303e3ff94!2sKBJNL%2CDAM%20DIVISION%20OFFICE!5e0!3m2!1sen!2sin!4v1623771949502!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
          <div class="col-lg-6 "><iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15314.711311784691!2d75.8905775!3d16.3393978!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x35ac283303e3ff94!2sKBJNL%2CDAM%20DIVISION%20OFFICE!5e0!3m2!1sen!2sin!4v1623771949502!5m2!1sen!2sin" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
           
          </div>

          <div class="col-lg-6">
            <form action="<?php echo base_url('Customer_controller/contact')?>" method="post" role="form" class="">
              <div class="row">
                <div class="col form-group">
                     <?php if($this->session->userdata('lang')=='EN') { ?>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                   <?php } else {?>
                    <input type="text" name="name" class="form-control" id="name" placeholder="ನಿಮ್ಮ ಹೆಸರು" required>
                   <?php }?>
                </div>
                <div class="col form-group">
                      <?php if($this->session->userdata('lang')=='EN') { ?>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Your Mobile" required>
                   <?php } else {?>
                     <input type="text" class="form-control" name="mobile" id="mobile" placeholder="ನಿಮ್ಮ ಮೊಬೈಲ್" required>
                    <?php }?>
                </div>
              </div>
              <div class="form-group">
                  <?php if($this->session->userdata('lang')=='EN') { ?>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                <?php } else {?>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="ವಿಷಯ" required>
                 <?php }?>
              </div>
              <div class="form-group">
                  <?php if($this->session->userdata('lang')=='EN') { ?>
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                <?php } else {?>
                <textarea class="form-control" name="message" rows="5" placeholder="ಸಂದೇಶ" required></textarea>
                <?php }?>
              </div>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <div class="text-center"><button type="submit" style="background-color: #228B22; color:white">Send Message</button></div>
               <?php } else {?>
                 <div class="text-center"><button type="submit"  style="background-color: #228B22; color:white">ಸಂದೇಶ ಕಳುಹಿಸಿ</button></div>
               <?php }?>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

