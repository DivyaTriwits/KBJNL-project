
        
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Loss</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('nursery-home')?>">Home</a></li>
                                <li class="breadcrumb-item active">Loss</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
<!-- <?php if($this->session->flashdata('fail-to-change-password')){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('fail-to-change-password');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 5000);</script>
                <?php }?> -->
                              <!-- START: Card Data-->
                <div class="row">
                   
                    
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('add-loss')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Add Loss</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('view-loss')?>">
                        <div class="card text-white bg-warning" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">View Loss</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    
                </div>
                <!-- END: Card DATA-->