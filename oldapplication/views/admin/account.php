  <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Account</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item active">Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
                 <?php if($this->session->flashdata('fail-to-change-password')){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('fail-to-change-password');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 5000);</script>
                <?php }?>
                <div class="row">
                   
                    
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('opening-stock')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Opening Stock</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('current-stock')?>">
                        <div class="card text-white bg-danger" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Current Stock</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('sold-sapling')?>">
                        <div class="card text-white bg-secondary" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Sold Saplings</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('revenue-generated')?>">
                        <div class="card text-white bg-success" style="height: 100px">
                           
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Revenue Generated</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                  
               
                 
                </div>
               