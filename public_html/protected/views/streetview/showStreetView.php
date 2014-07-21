

<script type="text/javascript">
var initPosPanoID, streetView,map_canvas;
function initialize() 
{
  /*****Initialize Views*******/
  
  var initStreetView = 
  {
    //center:center,
    zoom: 0,
    panoProvider:  getCustomPanorama,
   	<?php
   		echo  "pano :'".$this->getDefaultPanoId() ."',"
   	?>
    pov : 
    {
      <?php 
      	echo "heading :".$this->getDefaultHeading().","
      ?>
      pitch : 0,
      zoom : 0,
    }
  };
  /*************************/

   // Create a StreetView object.
  var streetViewDiv = document.getElementById('streetview_canvas');
  streetViewDiv.style.fontSize = "15px";
  streetView = new google.maps.StreetViewPanorama(streetViewDiv, initStreetView);

  // Add links when it happens "links_change" event.
  google.maps.event.addListener(streetView, "links_changed", createCustomLink); 

  // Create a StreetViewService object.
  var streetviewService = new google.maps.StreetViewService();

   // Get panorama ID of initPos
  var radius = 50;
  //streetviewService.getPanoramaByLocation(initPos, radius, function(result, status) {
    streetviewService.getPanoramaByLocation(0, radius, function(result, status) {
    if (status == google.maps.StreetViewStatus.OK) {
      initPosPanoID = result.location.pano;
      streetView.setPosition(result.location.latLng);
    }
  });
  var center = new google.maps.LatLng(14.995999,102.1112995);
  var infoWnd = new google.maps.InfoWindow({
    content : "Welcome to my office<br><a href='http://www.KoratRealty.com' target='_blank'>www.KoratRealty.com</a>",
    //position : getCustomPanorama("street").location.latLng,
    position:center,
  });
  infoWnd.open(streetView);
  /*
   * Create a map
   */
  
  map_canvas = new google.maps.Map(document.getElementById("map_canvas"));
  google.maps.event.addListener(streetView, "position_changed", function(){
    var position = this.getPosition();
    var map_bounds = map_canvas.getBounds();
    map_canvas.panTo(position);
  	});
  }

 function getCustomPanoramaTileUrl(panoID, zoom, tileX, tileY) 
 {
  return "<?php echo Yii::app()->baseUrl; ?>/upload/streetview/" + panoID + '-'  + tileX + '-' +tileY + '_s1.jpg';
 }


function getCustomPanorama(panoID) 
{
 var streetViewPanoramaData = 
 {
     <?php 
     	echo $this->getTilesDefault();
     ?>
  };

   switch(panoID) 
   {
   		<?php
   			echo $this->renderPano();
   		?>
   }
}

function createCustomLink() 
{
  /*
   * add links
   */
  var links = streetView.getLinks();
  var panoID = streetView.getPano();

  switch(panoID) 
  {
      case initPosPanoID:
      links.push(
      {
           description : "Enter",
           <?php
                echo "pano :'".$this->getDefaultPanoId() ."',";
                echo "heading :".$this->getDefaultHeading().",";
           ?>
      }
      );
      break;

      <?php
        echo $this->renderLink();
      ?>
  }
}


google.maps.event.addDomListener(window, 'load', initialize);
 </script>


<div id="streetview_canvas" style="width:100%;height:500px"></div>
 
  
    
    </div>