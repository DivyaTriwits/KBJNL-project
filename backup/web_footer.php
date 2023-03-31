  <!-- ======= Footer ======= -->
  <footer id="footer">


    <div class="footer-top">
      <div class="container">
        <div class="row" >

          <div class="col-lg-5 col-md-6 footer-contact"  >
            <h3>KBJNL<span>.</span></h3>
            <p>
                <?php if($this->session->userdata('lang')=='EN') { ?>
                O/o The Chief Engineer,KBJNL, Dam Zone, Almatti 
                <?php } else {?>
                O/o ಮುಖ್ಯ ಎಂಜಿನಿಯರ್, ಕೆಬಿಜೆಎನ್ಎಲ್, ಅಣೆಕಟ್ಟು ವಲಯ, 
                <?php }?><br><br>
                 <?php if($this->session->userdata('lang')=='EN') { ?>
              <strong>Phone:</strong> +91 9886351288<br>
              <?php } else {?>
              <strong>ದೂರವಾಣಿ:</strong> +91 9886351288<br>
              <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <strong>Landline:</strong> 08426-281038<br>
              <?php } else {?>
              <strong>ಲ್ಯಾಂಡ್‌ಲೈನ್:</strong> 08426-281038<br>
              <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <strong>Email:</strong> cedam_almatti@yahoo.com<br>
              <?php } else {?>
               <strong>ಇಮೇಲ್:</strong> cedam_almatti@yahoo.com<br>
              <?php }?>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
              <?php if($this->session->userdata('lang')=='EN') { ?>
            <h4>Useful Links</h4>
            <?php } else {?>
            <h4>ಉಪಯುಕ್ತ ಕೊಂಡಿಗಳು</h4>
            <?php }?>
            <ul>
                <?php if($this->session->userdata('lang')=='EN') { ?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#hero">Home</a></li>
               <?php } else {?>
                <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#hero">ಮನೆ</a></li>
               <?php }?>
               <?php if($this->session->userdata('lang')=='EN') { ?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#about">About us</a></li>
              <?php } else {?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#about">ಸುಮಾರು</a></li>
              <?php }?>
              <?php if($this->session->userdata('lang')=='EN') { ?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#contact">Contact Us</a></li>
              <?php } else {?>
              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url()?>#contact">ಸಂಪರ್ಕ</a></li>
              <?php }?>
              
            </ul>
          </div>
          <div class="col-lg-4" align="center">
            <img style="margin-bottom: 30px" src="<?php echo base_url()?>assets/images/newlogo.png">
          </div>

    

        </div>
      </div>
    </div>

    <div class="container py-2" style="height: 10px">
      <div align="center" style="margin-top: 10px">
        <p align="center"> Crafted with &nbsp;<i class="fa fa-heart" style="color:red"></i>&nbsp; by <a style=" cursor: pointer;" data-toggle="modal" data-target="#modalCentered">Triwits</a></p>
      </div>
      <div class="modal fade" id="modalCentered" tabindex="-1" role="dialog">
      <div style="margin-top:100px; width:450px; height: 700px" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        
          <div class="modal-body">
            <h4 align="center">Need a similar website?</h4>
            <div class="row">
            <div class="col-md-12" align="center">
             <a style="width : 150px;" class="btn btn-success" target = "_blank"  href="https://wa.me/919620030308?text=Need+a+website.+Please+help" data-action="share/whatsapp/share">Yes</a>&nbsp;
              <a style="width : 150px;"  target='_blank' style="color: white;" class="btn btn-warning" href="https://www.triwits.com/">May be later..</a>
             </div>
              
            </div>
          </div>
        
        </div>
      </div>
    </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>website_assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url()?>website_assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>website_assets/js/main.js"></script>

</body>

</html>