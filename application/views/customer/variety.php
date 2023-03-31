<?php if($this->session->flashdata('success')){?>
    <script>
        toastr.success('<?php echo $this->session->flashdata('success')?>');
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
            <?php if($varieties->num_rows() > 0) foreach ($varieties->result() as $eachVariety) {?>
                <div class="col-12 col-lg-6  col-xl-4 mt-3">
                    <a href="<?php echo base_url('saplings-list/'.$eachVariety->variety_id . '/'.$eachVariety->nursery_id)?>">
                        <div class="card text-black bg-default shadow-sm" style="height: 100px">
                            <div class="card-body" style="padding-top: 30px">
                                <h3 align="center"><?php echo $eachVariety->variety?></h3>
                            </div>
                        </div>
                    </a>
                </div>
            <?php }?>
        </div>
    </div>
</main>
