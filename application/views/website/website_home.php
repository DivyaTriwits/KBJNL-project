<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
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
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span style="color: #228B22">KBJNL</span></h1>
     <!-- <h2>We are team of talented designers making websites with Bootstrap</h2> -->
      <div class="d-flex">
        <a href="<?php echo base_url('shop')?>" class="btn-get-started scrollto" style="background-color: #228B22">Shop</a>
       <!--  <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      </div>
    </div>
  </section><!-- End Hero -->