
        
               
                <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Dashboard</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                        <a href="<?php echo base_url('registered-customer')?>">
                        <div class="card text-white bg-info" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Registered Customers</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                      <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('accounts')?>">
                        <div class="card text-white bg-danger" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Accounts</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('varieties')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Varieties</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('bag-sizes')?>">
                        <div class="card text-white bg-warning" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Bag Size</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('saplings')?>">
                        <div class="card text-white bg-secondary" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Saplings</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                   
                     <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('nursery-page')?>">
                        <div class="card text-white bg-info" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Nursery</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    
                
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('stocks')?>">
                        <div class="card text-white bg-success" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Stock</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                     
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('orders-page')?>">
                        <div class="card text-white bg-danger" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Orders</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                   
                      <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('all-payments')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Payments</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('nursery-individual-sapling')?>">
                        <div class="card text-white bg-warning" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 15px">
                                <h3 align="center">Individual Sapling</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('local-sales')?>">
                        <div class="card text-white bg-secondary" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Local Sale</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                  
                 <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('vehicle')?>">
                        <div class="card text-white bg-info" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Vehicle</h3>
                            </div>
                        </div>
                    </a>
                    </div> 
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                      <a href="<?php echo base_url('cash-remittance')?>">
                       <div class="card text-white bg-success" style="height: 100px">
                            
                      <div class="card-body" style="padding-top: 30px">
                               <h3 align="center">Cash Remittance</h3>
                       </div>
                       </div>
                   </a>
                  </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                   <a href="<?php echo base_url('monthly-statement')?>">
                     <div class="card text-white bg-primary" style="height: 100px">
                            
                <div class="card-body" style="padding-top: 30px">
                    <h3 align="center">Monthly Statements</h3>
                    </div>
                   </div>
                   </a>
                  </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                   <a href="<?php echo base_url('view-beneficiaries')?>">
                     <div class="card text-white bg-danger" style="height: 100px">
                            
                <div class="card-body" style="padding-top: 30px">
                    <h3 align="center">Beneficiaries</h3>
                    </div>
                   </div>
                   </a>
                  </div>
                      <div class="col-12 col-lg-6  col-xl-3 mt-3">
                     <a href="<?php echo base_url('uploads-comments')?>">
                       <div class="card text-white bg-warning" style="height: 100px">
                              
                  <div class="card-body" style="padding-top: 30px">
                      <h3 align="center">Uploads And Comments</h3>
                      </div>
                     </div>
                     </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                     <a href="<?php echo base_url('view-losses')?>">
                       <div class="card text-white bg-secondary" style="height: 100px">
                              
                  <div class="card-body" style="padding-top: 30px">
                      <h3 align="center">View Losses</h3>
                      </div>
                     </div>
                     </a>
                    </div>
                      <div class="col-12 col-lg-6  col-xl-3 mt-3">
                     <a href="<?php echo base_url('seedling-reserve')?>">
                       <div class="card text-white bg-success" style="height: 100px">
                              
                  <div class="card-body" style="padding-top: 30px">
                      <h3 align="center">Seedling Reserve</h3>
                      </div>
                     </div>
                     </a>
                    </div>
                    <!--<div class="col-12 col-lg-6  col-xl-3 mt-3">-->
                    <!--    <a href="<?php echo base_url('nursery-individual-sapling')?>">-->
                    <!--    <div class="card text-white bg-primary" style="height: 100px">-->
                            
                    <!--        <div class="card-body" style="padding-top: 30px">-->
                    <!--            <h3 align="center">Sold Stock</h3>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</a>-->
                    <!--</div>-->
                    <!--<div class="col-12 col-lg-6  col-xl-3 mt-3">-->
                    <!--    <a href="<?php echo base_url('revenue-generated')?>">-->
                    <!--    <div class="card text-white bg-info" style="height: 100px">-->
                            
                    <!--        <div class="card-body" style="padding-top: 15px">-->
                    <!--            <h3 align="center">Revenue Generated</h3>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</a>-->
                    <!--</div>-->
                </div>
               