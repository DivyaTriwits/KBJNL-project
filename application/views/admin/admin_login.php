
<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    
<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 May 2021 06:38:57 GMT -->
<head>
        <meta charset="UTF-8">
        <title> Login</title>
        <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/newlogo.png" />
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

            <div class="row vh-100 justify-content-between align-items-center" >

                <div class="col-12">
                    <?php if($this->session->flashdata('Error')){?>
                    <div class="alert alert-danger" role="alert" >
                        <?php echo $this->session->flashdata('Error');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 5000);</script>
                <?php }?>
             <?php if($this->session->flashdata('password-changed-success')){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('password-changed-success');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 5000);</script>
                <?php }?>
                    <form action="<?php echo base_url('verify-login')?>" class="row row-eq-height lockscreen  mt-5 mb-5" id="loginForm" method="post">
                        <div class="lock-image col-12 col-sm-5" style="background-image: url(<?php echo base_url()?>assets/images/newlogo.png); height:300px; width:20px; margin-top:35px; margin-bottom:35px"></div>

                        <div class="login-form col-12 col-sm-7">
                            <h3 align="center">Login</h3>
                            <br>
                            <div class="form-group mb-3">
                                <label for="emailaddress">Select User</label>
                                <!-- <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email"> -->
                                <select  name="users" id="payment_mode" required data-validation-required-message="This field is required" class="form-control" style="width: 100%;">
                                      <option value="" selected disabled>Select </option>
                                      <option value="Admin">Admin</option>
                                      <option value="Nursery">Nursery</option>
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="text" name="email" id="useremail" required="" placeholder="Enter your email">
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                            </div>

                            <!-- <div class="form-group mb-3">
                                <select name="treatment[]" class="col-sm-12 country" id="" multiple="multiple">
    <option value="fish" data-price="200">Fish</option>
    <option value="chicken" data-price="500">Chicken</option>
</select>
<input type="text" id="total" />
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
      <script type="text/javascript">
         $(document).ready(function() {
           $('#payment_mode').change(function() {
            //alert('hi');
             if( $(this).val() == 'Admin') {
              $('#useremail').val('admin@gmail.com');
               $('#password').val('123456');
             } else {       
               $('#useremail').val('mfdnursery');
               $('#password').val('admin');
             }
           });

         });  
       </script>
<script type="text/javascript">
$('.email').change(function () {
     alert('hi');
    var price = 0;
    $('option:selected', $(this)).each(function () {
        console.log($(this).data('price'));
        price += $(this).data('price');
    });
    $('#total').val(price);
});
</script>
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
         users: {

          validators: {
            notEmpty: {
              message: 'The user is required'
            }
          }
        },
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
