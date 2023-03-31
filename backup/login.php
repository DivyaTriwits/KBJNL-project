

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jquery-ui/jquery-ui.theme.min.css">
       
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

<!-- END Head-->



    <!-- START: Main Content-->
    <div class="container" >
      
    
        <div class="row " >
          <!-- div align="right">
        <a class="animsition-link">
                              <form method="post" action="<?php echo base_url();?>set-language">
                                 <input type="hidden" name="route" value="<?php echo $this->uri->segment(1);?>">
                                 <select style="cursor: pointer;" name="lan" class="customClass" onchange="this.form.submit();">
                                    <option <?php echo $this->session->userdata('lang') == 'EN' ? 'selected' : '' ?> value="EN">English</option>
                                    <option <?php echo $this->session->userdata('lang') == 'KA' ? 'selected' : '' ?> value="KA">Kannada</option>
                                 </select>
                              </form>
                           </a>
                         </div> -->
            <div class="col-12">
                    <?php if($this->session->flashdata('Error')){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('Error');?>
        </div>
        <script>setTimeout(function () { $('.alert').hide(); }, 6000);</script>
        <?php }?>
                <form action="<?php echo base_url('login-customer')?>" class="row row-eq-height lockscreen  mt-5 mb-5" id="loginForm" method="post">
                    <div class="login-form col-12 col-sm-12">
                      <?php if($this->session->userdata('lang')=='EN') { ?>
                        <h3 align="center"> Login</h3>
                      <?php } else {?>
                        <h3 align="center"> ಲಾಗಿನ್</h3>
                      <?php }?>
                        <br>
                        
                      
                  <div class="row">
                      
                      <div class="mb-3 col-sm-6 form-group" >
                        <?php if($this->session->userdata('lang')=='EN') { ?>
                          <label>Aadhaar Number</label>
                          <?php } else {?>
                                 <label>ಆಧಾರ್ ಸಂಖ್ಯೆ</label>
                                 <?php }?>
                          <input type="text" class="form-control" minlength="12" maxlength="12" name="adhaar" id="adhaar" placeholder="Adhaar Number" required>
                        
                      </div>
                  </div>
                  

                           <!--  <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> -->

                            <div align="right" class="form-group mb-0">
                                <button class="btn btn" type="submit" style="background-color: #66CD00; color: white"> <?php if($this->session->userdata('lang')=='EN') { ?>
                                Login
                              <?php } else {?>
                                 ಲಾಗಿನ್
                                 <?php }?></button>
                            </div>
                            
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->

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
       nursery: {

          validators: {
            notEmpty: {
              message: 'The nursery name is required'
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
 
