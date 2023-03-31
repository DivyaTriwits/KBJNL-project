
        <!-- START: Main Content-->
        <main>
            <div class="container-fluid site-width">
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Comments</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item">Home</li>
                                <!-- <li class="breadcrumb-item">App</li> -->
                                <li class="breadcrumb-item active"><a href="#">Comments</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->

                <!-- START: Card Data-->
                <div class="row row-eq-height">
                    <div class="col-12 col-lg-2 mt-3 todo-menu-bar flip-menu pr-lg-0">
                        <a href="#" class="d-inline-block d-lg-none mt-1 flip-menu-close"><i class="icon-close"></i></a>
                        <div class="card border h-100 todo-menu-section">
                            <div class="card-header d-flex justify-content-between align-items-center">  
                               
                                <a href="#"  class="bg-primary py-2 px-2     rounded ml-auto text-white" data-toggle="modal" data-target="#newtodo">
                                    <i class="icon-plus align-middle text-white"></i> <span>Add New</span>
                                </a>
                                <!-- Add Todo -->
                                <div class="modal fade" id="newtodo">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    <i class="icon-pencil"></i> Add Comment
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i class="icon-close"></i>
                                                </button>
                                            </div>
                                            <form class="" action="<?php echo base_url('Admin_controller/addComment')?>" method="post">
                                                <div class="modal-body">                                               
                                                    
                                                   <input type="hidden" name="id" id="id" value="<?php echo $this->uri->segment(2)?>">
                                                    <div class="form-group">
                                                        <label for="description" class="col-form-label">Comment</label>
                                                        <textarea class="form-control" rows="10" id="description" name="comment"></textarea>
                                                    </div>
                                                    

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary add-todo">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Todo -->
                                

                            </div>

                                 

                        </div>  
                    </div>
                    <div class="col-12 col-lg-10 mt-3 pl-lg-0">
                        <div class="card border h-100 todo-list-section">
                            
                            <div class="card-body p-0">

                                <div class="scrollertodo">
                                    <ul class="todo-list">
                                        <li class="todo-item starred completed">
                                            
                                            <div class="todo-content">                                                        
                                                <h3>Customer : <?php echo $customer->full_name?></h3>  
                                                <p class="text-muted mb-0 font-weight-bold todo-date"><?php echo $customer->date?></p>
                                                <p class="small-content text-muted mb-0"><?php echo $customer->msg?>.</p>
                                            </div>
                                                                                                      
                                        </li>
                                       <?php foreach($comment as $c){?>
                                        <li class="todo-item">
                                            
                                            <div class="todo-content">                                                        
                                                <h3><?php echo $c->added_by?></h3>  
                                                <p class="text-muted mb-0 font-weight-bold todo-date"><?php echo $c->date?></p>
                                                <p class="small-content text-muted mb-0"><?php echo $c->comment?>.</p>
                                            </div>
                                                                                                     
                                        </li>
                                   <?php }?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Card DATA-->
            </div>
        </main>