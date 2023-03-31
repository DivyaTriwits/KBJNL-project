       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0"> Customers Details</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                
                                <li class="breadcrumb-item active"><a href="#"> Customers Details</a></li>
                               
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END: Breadcrumbs-->
                 <?php if($this->session->flashdata('success')){?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success');?>
                    </div>
                    <script>setTimeout(function () { $('.alert').hide(); }, 4000);</script>
                <?php }?>
                <!-- START: Card Data-->
                <div class="row" >
                    <div class="col-9 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Order No</th>
                                                <th>Order Date</th>
                                            <th>Received Date</th>
                                            <th>Type of Customer</th>
                                            <th>Addhaar Card</th>
                                            <th>Uttara</th>
                                            <th>Status</th>
                                               
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                            if($detailsMore->num_rows() > 0){
                                             foreach($detailsMore->result() as $c){?>
                                            
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $c->order_id?></td>
                                               <td><?php echo $c->ordered_date?></td>
                                               <td><?php echo $c->slot_date?></td>
                                               <td><?php echo $c->organization?></td>
                                               <td>  
                                            <a  href="<?php echo base_url();?>uploads/documents/<?php echo $c->aadhaar_card; ?>"  download> <img style="height: 70px; width: 80%" src="<?php echo base_url();?>uploads/documents/<?php echo $c->aadhaar_card; ?>"></a>
                                         
                                              </td>
                                               <td>  <a  href="<?php echo base_url();?>uploads/documents/<?php echo $c->uttara; ?>"  download> <img style="height: 70px; width: 80%" src="<?php echo base_url();?>uploads/documents/<?php echo $c->uttara; ?>"></a></td>
                                               <?php if($c->is_order_delivered == 0){?>
                                               <td>Pending</td>
                                              <?php } else {?>
                                                 <td>Delivered</td>
                                               <?php }?>
                                            </tr>
                                            <?php $i++; }}?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div> 
                    <div class="col-3 mt-3">
                      <?php if($locations->num_rows() > 0){
                        $location=$locations->row();?>
                        <input type="hidden" name="lat" id="latid" value="<?php echo $location->latitude?>">
                         <input type="hidden" name="lat" id="longid" value="<?php echo $location->long_name?>">
                       <div id="map" style="width:100%; height: 300px;"></div>
                     <?php } else {?>
                      <div >
                         <div class="card" style="width:100%; height: 300px;">
                            
                            <div class="card-body">
                        <h4 align="center" style="padding-top: 50% !important">No map founded</h4>
                      </div>
                    </div>
                  </div>
                     <?php }?>
                    </div>                 
                </div>
          <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHWdfIWxrGAdM3ITXi65NnG71R2Nu2l-g&callback=initMap&v=weekly"
      async
    ></script>

 <script>
      
let map, infoWindow;

function initMap() {
latitudeBackend=document.getElementById("latid").value;
longbackend=document.getElementById("longid").value;
var latlng = new google.maps.LatLng(latitudeBackend,longbackend);
 var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
  // const mapOptions = {
  //   zoom: 8,
  //   center: { 
  //     lat: latitudeBackend,
  //    lng: 75.7255079
  //      },
  // };
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });

    // map = new google.maps.Map(document.getElementById("map"), mapOptions);

    if (navigator.geolocation) {
  //         const marker = new google.maps.Marker({
   
  //   position: { lat: position.coords.latitude, lng: position.coords.longitude },
  //   map: map,
  //    anchorPoint: new google.maps.Point(0, -29)
  // });

   const infowindow = new google.maps.InfoWindow({
    content: "<p>Marker Location:" + marker.getPosition() + "</p>",
  });



        

       
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  
}


// [END maps_map_geolocation]



    </script>