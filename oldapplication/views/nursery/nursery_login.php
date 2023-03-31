
<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    
<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 06:38:57 GMT -->
<head>
        <meta charset="UTF-8">
        <title>Nursery Login</title>
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo.png" />
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <!-- START: Template CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/flags-icon/css/flag-icon.min.css"> 

        <!-- END Template CSS-->     

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/social-button/bootstrap-social.css"/>   
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
        <!-- END: Custom CSS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style >
            .lockscreen{
                max-width: 800px !important;

            }
            .help-block{
      color:red;
    }
        </style>
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default" >
        <!-- START: Main Content-->
        <div class="container" >
            <?php if($this->session->flashdata('password-changed-success')){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('password-changed-success');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 5000);</script>
                <?php }?>
            <div class="row vh-100 justify-content-between align-items-center" >
                <div class="col-12">
                    <form action="<?php echo base_url('verify-nusrery-login')?>" class="row row-eq-height lockscreen  mt-5 mb-5" id="loginForm" method="post">
                        <div class="lock-image col-12 col-sm-5" style="height: 375px;"></div>

                        <div class="login-form col-12 col-sm-7">
                            <h3 align="center">Nursery Login</h3>
                            <br>
                            <div class="form-group mb-3">
                                <label for="emailaddress">User Id</label>
                                <input class="form-control" type="text" name="email" id="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>

                            <!-- <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> -->

                            <div class="form-group mb-0">
                                <button class="btn btn" type="submit" style="background-color: #66CD00; color: white"> Log In </button>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->

        <!-- START: Template JS-->
        <script src="<?php echo base_url()?>assets/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/moment/moment.js"></script>
        <script src="<?php echo base_url()?>assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="<?php echo base_url()?>assets/vendors/slimscroll/jquery.slimscroll.min.js"></script>
<script src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>

<script>
  $(document).ready(function(){
    $('#loginForm').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        email: {

          validators: {
            notEmpty: {
              message: 'The email is required'
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
        <!-- END: Template JS-->  
    </body>
    <!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 06:38:57 GMT -->
</html>
