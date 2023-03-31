<?php if($this->session->flashdata('added')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('added')?>');
    </script>
<?php }?>
<?php if($this->session->flashdata('already')){?>
    <script>
        toastr.warning('<?php echo $this->session->flashdata('already')?>');
    </script>
<?php }?>
<main>
    <div class="container-fluid site-width">
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">
                            <!-- <select class="form-control" name="nursery">
                                <option selected="" disabled="">Select Nursery</option>
                                <?php foreach($nurseries as $n){?>
                                    <option <?php echo ($this->session->userdata('nursery_id') == $n->nursery_id) ? "selected" : " "?> value="<?php echo $n->nursery_id?>"><?php echo $n->nursery_name?></option>
                                <?php }?>
                            </select> -->
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if($saplings->num_rows() > 0){ foreach ($saplings->result() as $eachSapling) {
                $availableBags = $this->Customer_model->getAvailablebagsListBySaplingAndNurseryId($eachSapling->sapling_id,$eachSapling->nursery_id); 
                // print_r($this->db->last_query()); exit;
                ?>
                <div class="col-12 col-md-4 col-lg-4 mt-3">
                    <div class="card border">                            
                        <div class="card-content">
                            <div class="card-body p-4">   
                               <form action="<?php echo base_url('add-to-cart')?>" method="post">
                                <input type="hidden" name="sapling_id" value="<?php echo $eachSapling->sapling_id?>">
                                <input type="hidden" name="variety_id" value="<?php echo $this->uri->segment(2);?>">
                                 <input type="hidden" name="nursery_id" value="<?php echo $this->uri->segment(3);?>">
                                <div class="d-md-flex">

                                    <div class="content px-md-3 my-3 my-md-0"> 
                                        <span class="mb-0 font-w-600 h5"><?php echo $eachSapling->sapling?></span>
                                        <hr>
                                        <select required class="form-control" name="bag_size">
                                            <?php foreach($availableBags as $eachBags){?>
                                                <option value="<?php echo $eachBags->bag_id?>"><?php echo $eachBags->bagsize?> (<?php echo $eachBags->price?>)</option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="my-auto">
                                        <button type="submit" class="btn btn-outline-primary font-w-600 my-auto text-nowrap"><?php if($this->session->userdata('lang')=='EN') { ?>
                                       Purchase
                                    <?php } else {?>
                                 ಖರೀದಿ
                                 <?php }?></button>
                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php } }?>
    </div>
</div>
</main>
