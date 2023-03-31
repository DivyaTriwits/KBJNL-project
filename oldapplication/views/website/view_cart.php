<section id="pricing" class="pricing" style="margin-top: 15px">
      <div class="container" data-aos="fade-up">

        <div class="section-title" style="padding-bottom: 10px">
          
          <h3><span style="color: #228B22">Cart List</span></h3>
         
        </div>
        <div class="hscroll">
        <table style="overflow-x:auto;">
          <thead>
  <tr>
    <th>Sl No.</th>
    <th>Sapling</th>
    <th>Bag Size</th>
    <th>Cost Per Sapling</th>
    <th>Quantity</th>
    <th>Sub Total</th>
  </tr>
</thead>
<tbody>
  <?php $total=0;
  $qty=0;
   $index=1;
   foreach($cart as $c){
   $total+=$c->quantity * $c->percost;
   $qty+=$c->quantity;
    ?>
  <tr>
    <td align="right"><?php echo $index;?></td>
    <td><?php echo $c->sapling?></td>
    <td align="right"> <?php echo $c->bag_size?></td>
    <td align="right"><?php echo $c->percost?></td>
    <td align="right"><?php echo $c->quantity?></td>
    <td align="right"><?php echo $c->quantity * $c->percost?>.00</td>
  </tr>
<?php $index++; }?>

 <tr >
  <td></td>
  <td></td>
  <td></td>
   <td align="right" style="font-weight: bold;">Total</td>
   <td align="right" style="font-weight: bold;"><?php echo $qty;?></td>
   <td align="right" style="font-weight: bold;"><?php echo $total?>.00</td>
 </tr>
 </tbody>
</table>
</div>
<div class="col-12" align="right">
  <br>
<a href="<?php echo base_url('confirm-order/'.$this->uri->segment(2) .'/'.$this->uri->segment(3))?>"><button type="button" class="btn" style="background-color: #228B22; height: 30px; padding-top: 3px;color: white;">Confirm Order</button></a>
</div>
      </div>
    </section>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
 
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
.hscroll {
  overflow-x: auto; /* Horizontal */
}
</style>