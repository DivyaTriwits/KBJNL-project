       <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
                <!-- START: Breadcrumbs-->
                <div class="row ">
                    <div class="col-12  align-self-center">
                        <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                            <div class="w-sm-100 mr-auto"><h4 class="mb-0">Registered Customers</h4></div>

                            <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                                <li class="breadcrumb-item"><a style="cursor: pointer;" href="<?php echo base_url('admin-dashboard')?>">Home</a></li>
                                
                                <li class="breadcrumb-item active"><a href="#">Registered Customers</a></li>
                               
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
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered" >
                                        <thead>
                                            <tr>
                                                <th>Sl No.</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                            <th>Aadhaar No</th>
                                            <th>Village</th>
                                            <th>District</th>
                                            <th>Taluka</th>
                                            <th>State</th>
                                                <th>Date</th>
                                                <th>More Details</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1;
                                             foreach($customer as $c){?>
                                            <tr>
                                                <td align="right"><?php echo $i;?></td>
                                                <td><?php echo $c->full_name?></td>
                                               <td><?php echo $c->mobile_no?></td>
                                               <td><?php echo $c->aadhaar_no?></td>
                                               <td><?php echo $c->village?></td>
                                               <td><?php echo $c->district?></td>
                                               <td><?php echo $c->taluka?></td>
                                               <td><?php echo $c->state?></td>
                                               <td><?php echo $c->registered_date?></td>
                                               <td><a  id="show-map" target="_blank" href="<?php echo base_url('more-details/'.$c->aadhaar_no)?>">View</a></td>
                                                
                                            </tr>
                                            <?php $i++; }?>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div> 

                    </div>                  
                </div>
           <div class="row">
               <div id="map" style="width: 50%; height: 300px;"></div>
           </div>  

<script type="text/javascript">
function initialize() {
   var latlng = new google.maps.LatLng(16.8669089,75.7255079);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: false,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var infowindow = new google.maps.InfoWindow();   
    google.maps.event.addListener(marker, 'click', function() {
      var iwContent = '<div id="iw_container">' +
      '<div class="iw_title"><b>Location</b> : Noida</div></div>';
      // including content to the infowindow
      infowindow.setContent(iwContent);
      // opening the infowindow in the current map and at the current marker location
      infowindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>