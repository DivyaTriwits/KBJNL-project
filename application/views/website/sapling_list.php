    <section id="pricing" class="pricing" style="margin-top: 15px">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <div class="col-12">
          <div class="row ">
                    <div class="col-10 " align="center">
                       
                            <h4 class="mb-0" style="color: #228B22">Saplings</h4>
                          </div>
                        <div class="col-2 " align="right">
                            <a href="<?php echo base_url('view-cart/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><button type="button" class="btn" style="background-color: #228B22; height: 30px; padding-top: 3px;color: white;">View Cart</button></a>
                        </div>
                    </div>
                
           </div>
          
        </div>
       <?php if($this->session->flashdata('success')){?>
           <script>
                                          swal({
                                              title: 'Successfully!',
                                              text: 'Sapling added in cart successfully.',
                                              type: "success",
                                              timer: 3000,
                                              showCancelButton: false,
                                              showConfirmButton: false
                                          }).then(
                                          function () {},
                                          function (dismiss) {
                                            if (dismiss === 'timer') {
      //console.log('I was closed by the timer')
                                         }
                                             }
                                          )
                                        </script>
       <?php }?>
       <div class="accordion accordion-flush" id="accordionFlushExample">
        <?php foreach($variety as $v) {
          $varity = $this->db->where('variety_id',$v->variety_id)->get('varieties')->row();
          $sapling = $this->Website_model->getSaplingById($this->uri->segment(4),$v->variety_id); 
        //  print_r($sapling);exit;
          ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $v->variety_id;?>" aria-expanded="false" aria-controls="flush-collapseOne">
        <?php echo $varity->variety;?>
      </button>
    </h2>
    <div id="<?php echo $v->variety_id;?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        <div class="row">
           <?php foreach($sapling as $s){
               $sapid=$this->db->where('saplingid',$s->saplingid)->get('saplings')->row();
               $data = $this->db->where('nursery_id',$this->uri->segment(4))->where('stock_qty !=',0)->where('saplings_id',$s->saplingid)->get('nursery_stock_details')->result();
              ?>
                         <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <form method="post" action="<?php echo base_url('insert-sapling-shop/'.$this->uri->segment(3))?>">
            <div class="box">
             
              <h5><?php echo $sapid->sapling?></h5>
              <input type="hidden" name="saplings" value="<?php echo $sapid->saplingid?>">
              <input type="hidden" name="nursery" value="<?php echo $this->uri->segment(4)?>">
              <ul>
               
                <li><div class="col form-group">
                  <!-- <label>Bag Size</label> -->
                  <select class="form-control" name="bagsize" id="bagsize">
                    <option selected="" disabled="">Select Bag Size</option>
                    <?php foreach($data as $d){
                       $cost=$this->db->where('sapling_id',$s->saplingid)->where('bag_size',$d->bag_size)->get('sapling_destils')->result(); 
                      //print_r($costper);exit;  ?>
                      <?php foreach($cost as $c){?>
                    <option value="<?php echo $c->bag_size?>"><?php echo $c->bag_size?> &nbsp;&nbsp; (Rs.<?php echo $c->per_cost?>/Unit) </option>
                  <?php }?>
                    <?php }?>
                  </select>
                </div></li>
               
                <li><div class="col form-group">
                  
                  <input type="number" class="form-control" name="qty" id="qty" placeholder="Quantity" required>
                 
                </div></li>
               
              </ul>
              <div class="btn-wrap" style="margin-top: -20px; padding-top: 8px; padding-bottom: 8px">
                <button type="submit" class="btn" style="background-color: #228B22; height: 30px; padding-top: 3px;color: white;">Add Cart</button>
              </div>
            </div>
          </form>
          </div>

          
<?php }?> 
              
        </div>
      </div>
    </div>
  </div>
<?php }?>
 <!--  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Accordion Item #2
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        Accordion Item #3
      </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
    </div>
  </div> -->
</div>
      </div>
    </section><!-- End Pricing Section -->

<script type="text/javascript">
   $(document).ready(function(){  
    alert('hi');
        $('#bagsize').change(function(){  
          alert('hii');
             var val = $('#bagsize').val(); 
              var sap = $s->saplingid; 
             var postData = {
      'size':val,
      'saps':sap
    }
    //alert(JSON.stringify(postData));
             //alert(sap);
              
                  $.ajax({  
                       url:"<?php echo base_url('get-cost'); ?>",  
                       method:"POST",  
                       data: postData,
                      dataType: 'JSON',
                       success:function(data){  
                            $('#percost').val(data);  
                       }  
                  });  
             
        }); 

        $('#qty').change(function(){
         var amount = $('#percost').val();
         var qtyV = $('#qty').val();
         var subCost = amount*qtyV;
         $('#costsub').val(subCost);
        }); 

        
   });  
</script>