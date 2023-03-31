
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Customer | KBJNL</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/images/newlogo.png" rel="icon">
  <link href="<?php echo base_url()?>website_assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>website_assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url()?>website_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>website_assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>website_assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>website_assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>website_assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>website_assets/css/style.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/bootstrap/css/bootstrap.min.css">
    
<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/fontawesome/css/all.min.css">
<script src="<?php echo base_url()?>assets/vendors/toastr/toastr.min.js"></script>
    <!-- END Template CSS-->     

    
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->

  <!-- =======================================================
  * Template Name: BizLand - v3.2.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center" style="background-color: #228B22">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="social-links d-none d-md-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">cedam_almatti@yahoo.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+91 9886351288</span></i>
      </div>
      
         <div class="contact-info d-flex align-items-center">
      <form method="post" action="<?php echo base_url();?>set-language">
                                 <input type="hidden" name="route" value="<?php echo $this->uri->segment(1);?>">
                                 <select style="cursor: pointer;" name="lan" class="customClass" onchange="this.form.submit();">
                                    <option <?php echo $this->session->userdata('lang') == 'EN' ? 'selected' : '' ?> value="EN">English</option>
                                    <option <?php echo $this->session->userdata('lang') == 'KA' ? 'selected' : '' ?> value="KA">Kannada</option>
                                 </select>
                              </form>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

       <a href="<?php echo base_url()?>" class="horizontal-logo text-left"  style="padding-top: 2px; padding-bottom: 5px">
                           <img height="62px" src="<?php echo base_url()?>assets/images/newlogo.png">
                           <!-- <span class="h6 font-weight-bold align-self-center mb-0 ml-auto">Sapling</span> -->
                        </a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="<?php echo base_url()?>website_assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
             <?php if($this->session->userdata('lang')=='EN') { ?>
          <li><a class="nav-link scrollto active" href="<?php echo base_url()?>#hero">Home</a></li>
           <?php } else {?>
            <li><a class="nav-link scrollto active" href="<?php echo base_url()?>#hero">ಮನೆ</a></li>
           <?php }?>
            <?php if($this->session->userdata('lang')=='EN') { ?>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>#about">About</a></li>
          <?php } else {?>
          <li><a class="nav-link scrollto active" href="<?php echo base_url()?>#hero">ಸುಮಾರು</a></li>
           <?php }?>
           <?php if($this->session->userdata('lang')=='EN') { ?>
          <li><a class="nav-link scrollto" href="<?php echo base_url()?>#contact">Contact</a></li>
          <?php } else {?>
          <li><a class="nav-link scrollto active" href="<?php echo base_url()?>#hero">ಸಂಪರ್ಕ</a></li>
           <?php }?>
           <?php if($this->session->userdata('lang')=='EN') { ?>
            <li><a class="nav-link scrollto" href="<?php echo base_url('customer-registration')?>">Register</a></li>
            <?php } else {?>
            <li><a class="nav-link scrollto" href="<?php echo base_url('customer-registration')?>">ನೋಂದಣಿ</a></li>
            <?php }?>
            <?php if($this->session->userdata('lang')=='EN') { ?>
            <li><a class="nav-link scrollto" href="<?php echo base_url('customer-login')?>">Login</a></li>
            <?php } else {?>
               <li><a class="nav-link scrollto" href="<?php echo base_url('customer-login')?>">ಲಾಗಿನ್</a></li>
             <?php }?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->