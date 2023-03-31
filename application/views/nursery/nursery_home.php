
        
                <!-- START: Breadcrumbs-->
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                        <a href="<?php echo base_url('stock-status')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Stock Status</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                  <!--   <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('enter-new-stock')?>">
                        <div class="card text-white bg-secondary" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Enter Of New Stock</h3>
                            </div>
                        </div>
                    </a>
                    </div> -->
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('order-list')?>">
                        <div class="card text-white bg-success" style="height: 100px">
                           
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Order List</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('accept-reject-orders')?>">
                        <div class="card text-white bg-danger" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Accept|Reject Order</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('payment-collected')?>">
                        <div class="card text-white bg-warning" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Payment Collected</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('individual-saplings')?>">
                        <div class="card text-white bg-info" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Individual Sapling</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                   <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('uploads-page')?>">
                        <div class="card text-white bg-success" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Uploads</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                       <div class="col-12 col-lg-6  col-xl-4 mt-3">
                        <a href="<?php echo base_url('losses')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Losses</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-4 mt-3">
                      <a href="<?php echo base_url('nursery-cash-remittance')?>">
                       <div class="card text-white bg-success" style="height: 100px">
                            
                      <div class="card-body" style="padding-top: 30px">
                               <h3 align="center">Cash Remittance</h3>
                       </div>
                       </div>
                   </a>
                  </div>
                   <div class="col-12 col-lg-6  col-xl-4 mt-3">
                   <a href="<?php echo base_url('nursery-monthly-statement')?>">
                     <div class="card text-white bg-primary" style="height: 100px">
                            
                <div class="card-body" style="padding-top: 30px">
                    <h3 align="center">Monthly Statements</h3>
                    </div>
                   </div>
                   </a>
                  </div>
                </div>
                <!-- END: Card DATA-->