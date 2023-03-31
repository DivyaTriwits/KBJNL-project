<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <img style="height: 70px" src="<?php echo base_url()?>assets/images/newlogo.png">
       <h3>KBJNL</h3>
      <p><?php if($this->session->userdata('lang')=='EN') { ?>
                O/o The Chief Engineer,KBJNL, Dam Zone, Almatti 
                <?php } else {?>
                O/o ಮುಖ್ಯ ಎಂಜಿನಿಯರ್, ಕೆಬಿಜೆಎನ್ಎಲ್, ಅಣೆಕಟ್ಟು ವಲಯ, 
                <?php }?>
                <br>

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
              <?php }?></p>
      
      <div class="copyright">
       Crafted with &nbsp;<i class="fa fa-heart" style="color:red"></i>&nbsp; by <a style=" cursor: pointer;" data-toggle="modal" data-target="#modalCentered">Triwits</a>
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>webassest/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>webassest/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url()?>webassest/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url()?>webassest/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url()?>webassest/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>webassest/js/main.js"></script>
  <script src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
</body>

</html>