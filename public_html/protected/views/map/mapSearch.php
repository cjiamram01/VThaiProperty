 <?php


 ?>

 <script>
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
//var marker;
 var map = new google.maps.Map(document.getElementById('map-canvas'), {
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });



function getQuery(){
    var url = location.href;
    var qs = url.substring(url.indexOf('?') + 1).split('&');
    for(var i = 0, result = {}; i < qs.length; i++){
        qs[i] = qs[i].split('=');
        //result[qs[i][0]] = decodeURIComponent(qs[i][1]);
    }
    //alert(qs[1][1]);
    return qs;
}

function showLocation(position) {
   var latitude = position.coords.latitude;
   var longitude = position.coords.longitude;
  var defaultBounds = new google.maps.LatLngBounds(
      new google.maps.LatLng(latitude, longitude),
      new google.maps.LatLng(latitude+0.02, longitude+0.01)

      );
  map.fitBounds(defaultBounds);

  var qs=getQuery();
  if(qs.length>1)
    {
      latitude=qs[0][1];
      longitude=qs[1][1];
    }


  var posMarker = new google.maps.LatLng(latitude,longitude);
  var marker;



  marker = new google.maps.Marker({
      position: posMarker,
      map: map,
      title: 'Move Cursor',
      draggable: true
  });


  google.maps.event.addListener(marker, "dragend", function(event) {
    
      placeMarker(event.latLng,map);
    });


 }

function errorHandler(err) {
  if(err.code == 1) {
    alert("Error: Access is denied!");
  }else if( err.code == 2) {
    alert("Error: Position is unavailable!");
  }
}
function getLocation()
{

   if(navigator.geolocation){
      // timeout at 60000 milliseconds (60 seconds)
      var options = {timeout:60000};
      navigator.geolocation.getCurrentPosition(showLocation, 
                                               errorHandler,
                                               options);
   }else{
      alert("Sorry, browser does not support geolocation!");
   }
}

function placeMarker(position, map) {
  var marker = new google.maps.Marker({
    position: position,
    map: map
  });
  map.panTo(position);
  var points = {
      latitude: position.lat().toFixed(5),
      longtitude: position.lng().toFixed(5)
    };

  window.returnValue = points;
  window.close();

}

function initialize() {

   getLocation();

  var markers = [];
 



  // Create the search box and link it to the UI element.
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var searchBox = new google.maps.places.SearchBox(
    /** @type {HTMLInputElement} */(input));

  // [START region_getplaces]
  // Listen for the event fired when the user selects an item from the
  // pick list. Retrieve the matching places for that item.
  google.maps.event.addListener(searchBox, 'places_changed', function() {
    var places = searchBox.getPlaces();

    for (var i = 0, marker; marker = markers[i]; i++) {
      marker.setMap(null);
    }

    // For each place, get the icon, place name, and location.
    markers = [];

    var center = map.getCenter();

   

    var posMarker = new google.maps.LatLng(center.lat(),center.lng());
    var marker = new google.maps.Marker({
        position: posMarker,
        map: map,
        title: 'Move Cursor',
        draggable: true
    });




    var bounds = new google.maps.LatLngBounds();
    for (var i = 0, place; place = places[i]; i++) {
      var image = {
        url: place.icon,
        size: new google.maps.Size(20, 20),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };

      // Create a marker for each place.
      var marker = new google.maps.Marker({
        map: map,
        icon: image,
        title: place.name,
        position: place.geometry.location
      });

      markers.push(marker);

      bounds.extend(place.geometry.location);
    }

    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  // Bias the SearchBox results towards places that are within the bounds of the
  // current map's viewport.
  google.maps.event.addListener(map, 'bounds_changed', function() {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });


 google.maps.event.addListener(map, 'click', function(e) {
    placeMarker(e.latLng, map);

  });

  

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>


