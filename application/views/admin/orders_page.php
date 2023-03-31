 <div class="row">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Orders</h4> </div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                <li class="breadcrumb-item active">Orders</li>
                            </ol>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('all-orders')?>">
                        <div class="card text-white bg-danger" style="height: 100px">
                            
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Orders</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                    <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('all-pending-oreders')?>">
                        <div class="card text-white bg-primary" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Pending Orders</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                        <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('all-delivered-oreders')?>">
                        <div class="card text-white bg-success" style="height: 100px">
                           <div class="card-body" style="padding-top: 30px">
                                <h3 align="center">Delivered Orders</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                     <div class="col-12 col-lg-6  col-xl-3 mt-3">
                        <a href="<?php echo base_url('reschedule-orders')?>">
                        <div class="card text-white bg-secondary" style="height: 100px">
                           <div class="card-body" style="padding-top: 15px">
                                <h3 align="center">Rescheduled Orders</h3>
                            </div>
                        </div>
                    </a>
                    </div>
                 </div>