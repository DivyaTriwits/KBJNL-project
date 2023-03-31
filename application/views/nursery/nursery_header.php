<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    <head>
        <meta charset="UTF-8">
        <title>Nursery Admin</title>
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
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/materialdesign-webfont/css/materialdesignicons.min.css"/>  
        <link rel="stylesheet"  href="<?php echo base_url()?>assets/vendors/chartjs/Chart.min.css">
        <!-- END: Page CSS-->
        <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/datatable/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/datatable/buttons/css/buttons.bootstrap4.min.css"/>
        <!-- END: Page CSS-->
        <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/morris/morris.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/weather-icons/css/pe-icon-set-weather.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/chartjs/Chart.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/starrr/starrr.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- END: Page CSS-->
         <!-- START: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/sweetalert/sweetalert.css">
        <!-- END: Page CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/fancybox/jquery.fancybox.min.css"> 
        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url()?>assets/css/main.css">
        <!-- END: Custom CSS-->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        
<?php
$notificationUserId='';


if($this->session->userdata('nursery_id'))
{
    $notificationUserId=$this->session->userdata('nursery_id');
}

?>
 <style >
    .tx-danger{
     color:red;   
    }
            .help-block{
      color:red;
    }
.site-footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 50px;
  background: #fafafa;
  border-top: solid 1px #eee;
}
.horizontal-menu.semi-dark {
    --sidebarbg: #66CD00 !important;
    --sidebaractivecolor: #66CD00 !important;
    --headerbackground: #66CD00;
    }
    #header-fix .ring {
        border:5px solid #66CD00 !important;
}
        </style>
    
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default semi-dark horizontal-menu">

        <!-- START: Pre Loader-->
        <div class="se-pre-con">
            <div class="loader"></div>
        </div>
        <!-- END: Pre Loader-->

        <!-- START: Header-->
        <div id="header-fix" class="header fixed-top">
            <div class="site-width">
                <nav class="navbar navbar-expand-lg  p-0">
                    <div class="navbar-header  h-100 h4 mb-0 align-self-center logo-bar text-left">
                        <a href="<?php echo base_url('nursery-home')?>" class="horizontal-logo text-left">
                            <img height="45px" src="<?php echo base_url()?>assets/images/newlogo.png"> 
                            <!-- <span class="h6 font-weight-bold align-self-center mb-0 ml-auto">KBJNL</span> -->
                        </a>
                    </div>
                    <div class="navbar-header h4 mb-0 text-center h-100 collapse-menu-bar">
                        <a href="#" class="sidebarCollapse" id="collapse"><i class="icon-menu"></i></a>
                    </div>

                    <div class="navbar-right ml-auto h-100">
                        <ul class="ml-auto p-0 m-0 list-unstyled d-flex top-icon h-100">
                            <li class="d-inline-block align-self-center  d-block d-lg-none">
                                <a href="#" class="nav-link mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>
                                </a>
                            </li>

              
                            <li class="dropdown align-self-center d-inline-block">
                                <a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-bell h4"></i>
                                    <span class="badge badge-default"> <span class="ring">
                                        </span><span class="ring-point">
                                        </span> </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right border   py-0">
                                    <?php $this->Notify_model->get_notification_window($notificationUserId);
                                  ?>
                                    
                                    

                                    <li><a class="dropdown-item text-center py-2" href="#"> Read All Message <i class="icon-arrow-right pl-2 small"></i></a></li>
                                </ul>
                            </li>
                            <li class="dropdown user-profile align-self-center d-inline-block">
                                <a href="#" class="nav-link py-0" data-toggle="dropdown" aria-expanded="false">
                                    <div class="media">
                                        <img src="<?php echo base_url()?>assets/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle" width="29">
                                    </div>
                                </a>

                                <div class="dropdown-menu border dropdown-menu-right p-0">
                                    <a href="#" class="dropdown-item px-2 align-self-center d-flex" data-toggle="modal" data-target="#exampleModal">
                                        <span class="icon-pencil mr-2 h6 mb-0"></span> Change Password</a>
                                   
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo base_url('nusrery-logout')?>" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                        <span class="icon-logout mr-2 h6  mb-0"></span> Sign Out</a>
                                </div>

                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- END: Header-->

        <!-- START: Main Menu-->
        <div class="sidebar">
            <div class="site-width">

                <!-- START: Menu-->
                <ul id="side-menu" class="sidebar-menu">
                    <li ><a href="<?php echo base_url('nursery-home')?>"><i class="icon-home mr-1"></i> Dashboard</a>
                        
                    </li>
                     <li><a href="<?php echo base_url('stock-status')?>"><i class="icon-organization mr-1"></i> Stock Status</a>
                        
                    </li>
                 <!--    <li ><a href="<?php echo base_url('enter-new-stock')?>"><i class="icon-layers mr-1"></i> Entry Of New Stock</a>
                       
                    </li>
 -->
                    <li class="dropdown"><a href="<?php echo base_url('order-list')?>"><i class="icon-cursor mr-1"></i> Order List</a>
                       <ul>
                            <li><a href="<?php echo base_url('pending-orders')?>"><i class="mdi mdi-database"></i> Pending Orders</a></li>
                           <li><a href="<?php echo base_url('delivered-orders')?>"><i class="mdi mdi-database"></i> Delivered Orders</a></li>
                          <li><a href="<?php echo base_url('nursery-reschedule-orders')?>"><i class="mdi mdi-database"></i> Resceduled Orders</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('accept-reject-orders')?>"><i class="icon-magnet mr-1"></i>Accept|Reject Order</a>
                        
                    </li>
                     <li><a href="<?php echo base_url('payment-collected')?>"><i class="icon-magnet mr-1"></i>payment Collected</a>
                        
                    </li>
                    <li ><a href="<?php echo base_url('individual-saplings')?>"><i class="icon-doc mr-1"></i> Individual Sapling</a>
                        
                    </li>
                     <li class="dropdown"><a href="<?php echo base_url('nursery')?>"><i class="mdi mdi-database-import mr-1"></i>Account</a>
                        <ul>
                            <li><a href="<?php echo base_url('nursery-opening-stock')?>"><i class="mdi mdi-database"></i> Opening Stock</a></li>
                           <li><a href="<?php echo base_url('nursery-current-stock')?>"><i class="mdi mdi-database"></i> Current Stock</a></li>
                           <li><a href="<?php echo base_url('nursery-sold-sapling')?>"><i class="mdi mdi-database"></i> Sold Sapling</a></li>
                        </ul>
                    </li>
                    
                </ul>
              
               <!--  <ol class="breadcrumb bg-transparent align-self-center m-0 p-0 ml-auto">
                    <li class="breadcrumb-item"><a href="#">Application</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol> -->
            </div>
        </div>
        <!-- END: Main Menu-->
 <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">

                        <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form  id="changePassword" method="post" action="<?php echo base_url('nursery-change-password')?>">
                                            <div class="modal-body">
                                               <div class="form-row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Old Password<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="" name="old" placeholder="Old Password" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">New Pasdword<span class="tx-danger">*</span></label>
                                                        <input type="text" class="form-control" id="new-password" name="new" placeholder="New Password" value="" required>
                                                        
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Confirm Password<span class="tx-danger">*</span></label>
                                                        <input type="text" onkeyup="changePassword();" class="form-control" id="confirm-password" name="confirm" placeholder="Confirm Password" value="" required>
                                                        <span id="message"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button type="button" class="" data-dismiss="modal">Close</button> -->
                                                <a data-dismiss="modal" style="cursor: pointer">Close</a>
                                                <button type="submit" class="btn btn" id="mybutton" style="background-color: #66CD00; color: white">Update</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
<script>
  $(document).ready(function(){
    $('#changePassword').bootstrapValidator({
      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        old: {

          validators: {
            notEmpty: {
              message: 'The old password is required'
            }
          }
        },
        new: {

          validators: {
            notEmpty: {
              message: 'The new password is required'
            }
          }
        },
         confirm: {

          validators: {
            notEmpty: {
              message: 'The confirm password is required'
            }
          }
        },
      }
    })
  });

</script>