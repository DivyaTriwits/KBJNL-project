  <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Gallery</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item">Page</li>
                                <li class="breadcrumb-item active"><a href="#">Gallery</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row">
                    <div class="col-12  mt-3">                          
                        <div class="card"> 

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                      
                                    </div> 
                                    <div class="clearfix"></div>
                                </div>
                                <div id="grid" class="row">
                                 
                                
                                   <?php foreach($images as $i){ ?>
                                    <div class="item col-12 col-md-6 col-lg-4 mb-4 cation-hover text-center Designing"  >
                                        <div class="modImage">
                                            <img style="height: 200px; width: 150%" src="<?php echo base_url(); ?>uploads/images/<?php echo $i->image; ?>" alt="" class="portfolioImage img-fluid">
                                            <div class="d-flex">
                                                <a data-fancybox-group="gallery" href="<?php echo base_url(); ?>uploads/images/<?php echo $i->image; ?>" class="fancybox btn rounded-0 btn-dark w-100">View Large</a>
                                                                                                
                                            </div>
                                        </div>
                                    </div>
                                 <?php }?>
                                </div>


                            </div>                                
                        </div>
                    </div>



                </div>
                <!-- END: Card DATA-->