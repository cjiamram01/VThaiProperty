
<script type="text/javascript">

      var drawingManager;
      var selectedShape;
      var colors = ['#1E90FF', '#FF1493', '#32CD32', '#FF8C00', '#4B0082'];

      var selectedColor;
      var colorButtons = {};
      var markersDisplay = [];
      var map;


      var req;
      function responseList(url)
      {
        if (window.XMLHttpRequest)
          req=new XMLHttpRequest();
        else if (window.ActiveXObject)
          req=new ActiveXObject("Microsoft.XMLHTTP");
        else{
          
          return false;
        }
        req.onreadystatechange = statechange;
        req.open("GET",url,true);
        req.send(null);
      }
      function statechange()
      {
        if (req.readyState==4) {
          var x=document.getElementById("propertyList");
          x.innerHTML=req.responseText;
        }
        else{
          var x=document.getElementById("propertyList");
          x.innerHTML="Please wait...";
        }
      }

      function loadXMLDoc(filename)
      {
          if (window.XMLHttpRequest)
            {
                 xhttp=new XMLHttpRequest();
            }
          else // code for IE5 and IE6
            {
                xhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
              xhttp.open("GET",filename,false);
              xhttp.send();
              return xhttp.responseXML;
      }

      function setAdvanceMarker(map,markers){

        var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        for( i = 0; i < markers.length; i++ ) {


                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: markers[i][0]
                });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
              return function() {
                         infoWindow.setContent("<div class='info_content'>"+markers[i][0]+"</div><div><img src='"+markers[i][3]+"'></div>");
                        infoWindow.open(map, marker);
                    }
                })(marker, i));
             map.fitBounds(bounds);
             markersDisplay.push(marker);
           }

           var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(12);
                google.maps.event.removeListener(boundsListener);
            });

        }

      function getTempMarker(url){
      var locations = [];
       xmlDoc=loadXMLDoc(url);
      if(xmlDoc!=null)
        {
          var places=xmlDoc.getElementsByTagName("place");
          for (i=0;i<places.length;i++) 
              {
                    x=xmlDoc.getElementsByTagName("title")[i];
                    title=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("lat")[i];
                    lat=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("lng")[i];
                    lng=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("picture")[i];
                    picture=x.childNodes[0];
                    x=xmlDoc.getElementsByTagName("id")[i];
                    id=x.childNodes[0];



                    locations[i]=[];
                    locations[i][0]=title.nodeValue;
                    locations[i][1]=lat.nodeValue;
                    locations[i][2]=lng.nodeValue;
                    locations[i][3]=picture.nodeValue;
                    locations[i][4]=id.nodeValue;
              }
          }
          return locations;

      }



      function clearSelection() {
        if (selectedShape) {
          selectedShape.setEditable(false);
          selectedShape = null;
        }
      }

      function setSelection(shape) {
        clearSelection();
        selectedShape = shape;
        shape.setEditable(true);
        selectColor(shape.get('fillColor') || shape.get('strokeColor'));
      }

      function clearOverlaysMarker() 
      {
          for (var i = 0; i < markersDisplay.length; i++ ) 
          {
            markersDisplay[i].setMap(null);
          }
      markersDisplay.length = 0;
      }

    function addMarker(location) {
      var marker = new google.maps.Marker({
        position: location,
        map: map
      });
      markersDisplay.push(marker);
    }


      function deleteSelectedShape() {
        
        clearOverlaysMarker();
        if (selectedShape) {
          selectedShape.setMap(null);
        }
      }

      function selectColor(color) {
        selectedColor = color;
        for (var i = 0; i < colors.length; ++i) {
          var currColor = colors[i];
          //colorButtons[currColor].style.border = currColor == color ? '2px solid #789' : '2px solid #fff';
        }

        // Retrieves the current options from the drawing manager and replaces the
        // stroke or fill color as appropriate.
        var polylineOptions = drawingManager.get('polylineOptions');
        polylineOptions.strokeColor = color;
        drawingManager.set('polylineOptions', polylineOptions);

        var rectangleOptions = drawingManager.get('rectangleOptions');
        rectangleOptions.fillColor=color;
        drawingManager.set('rectangleOptions', rectangleOptions);

        var circleOptions = drawingManager.get('circleOptions');
        circleOptions.fillColor = color;
        //circleOptions.fillColor("#1E90FF");
        drawingManager.set('circleOptions', circleOptions);

        var polygonOptions = drawingManager.get('polygonOptions');
        polygonOptions.fillColor=color;
        drawingManager.set('polygonOptions', polygonOptions);
      }

      function setSelectedShapeColor(color) {
        if (selectedShape) {
          if (selectedShape.type == google.maps.drawing.OverlayType.POLYLINE) {
            selectedShape.set('strokeColor', color);
          } else {
            selectedShape.set('fillColor', color);
          }
        }
      }

      function makeColorButton(color) {
        var button = document.createElement('span');
        button.className = 'color-button';
        button.style.backgroundColor = color;
        google.maps.event.addDomListener(button, 'click', function() {
          selectColor(color);
          setSelectedShapeColor(color);
        });

        return button;
      }

       function buildColorPalette() {
         for (var i = 0; i < colors.length; ++i) {
           var currColor = colors[i];
           var colorButton = makeColorButton(currColor);
         }
         selectColor(colors[0]);
       }

       function isContainCircle(clat,clng,lat,lng,radius){
        r=getRadius(clat,clng,lat,lng);
        if(r<=radius)
          return true;
        else
          return false;
      }

        function getRadius(clat,clng,lat,lng)
        {
          dx=Math.pow((lat-clat),2);
          dy=Math.pow((lng-clng),2);
          r=Math.sqrt(dx+dy)*Math.pow(10,5);
          return r;
        }


      var centerlat,centerlong;

      function showLocation(position) 
      {

            var latitude = position.coords.latitude;
            centerlat=latitude;
            var longitude = position.coords.longitude;
            centerlong=longitude;
            //var url="http://localhost/vthaiproperty/public_html/queryMarker.xml"
            //
            var url="<?php echo Yii::app()->params['constURL']; ?>/public_html/queryMarker.xml";
            var locations=getTempMarker(url);
             map = new google.maps.Map(document.getElementById('mapSearch'), {
              zoom: 12,
              center: new google.maps.LatLng(latitude, longitude),
              mapTypeId: google.maps.MapTypeId.ROADMAP,
              disableDefaultUI: true,
              zoomControl: true
            });


        var polyOptions = {
          strokeWeight: 0,
          fillOpacity: 0.45,
          editable: true,
          draggable: true
          //geodesic: true,
        };
        // Creates a drawing manager attached to the map that allows the user to draw
        // markers, lines, and shapes.
        drawingManager = new google.maps.drawing.DrawingManager({
          drawingMode: google.maps.drawing.OverlayType.POLYGON,
          markerOptions: {
            draggable: true
          },
          polylineOptions: {
            editable: true
          },
          rectangleOptions: polyOptions,
          circleOptions: polyOptions,
          polygonOptions: polyOptions,
          map: map
        }); 


         var url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php";
         responseList(url);

         function setCircleMarker(circle){
              var markers = [];
              var result="";

              var radius = circle.getRadius();
              var clatt=circle.getCenter().lat();
              var clngg=circle.getCenter().lng();
              var index=0;
              for(var i=0;i<locations.length;++i)
              {
                lat=locations[i][1];
                lng=locations[i][2];
                 if(isContainCircle(clatt,clngg,lat,lng,radius))
                 {
                    
                    str=locations[i][4];
                    result+=str.trim()+":";
                    markers[index]=locations[i];
                    var position= new google.maps.LatLng(lat, lng);
                    index++;
                 }

              }
              
          
              var url;
              if(result.length>0) 
              {
                result=result.substr(0,result.length-1);
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php?point="+result;
              }
              else
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php";

              setAdvanceMarker(map,markers);  
              responseList(url);

             
        }

        google.maps.event.addListener(drawingManager, 'circlecomplete', function(circle) {
             
               google.maps.event.addListener(circle, 'radius_changed', function () 
               {
                 clearOverlaysMarker(); 
                 setCircleMarker(circle);
                }); 

              google.maps.event.addListener(circle, 'center_changed', function () 
               {
                 clearOverlaysMarker(); 
                 setCircleMarker(circle);
                }); 

              
               setCircleMarker(circle);
             
          })


       function setPolygonMarker(polygons){

          var markers = [];
          var index=0;
          var result="";
          for(var i=0;i<locations.length;++i)
          {
            var coordinate = new google.maps.LatLng(locations[i][1],locations[i][2]); 
            if(google.maps.geometry.poly.containsLocation(coordinate,polygons))
            {
               
              str=locations[i][4];
              result+=str.trim()+":";
              markers[index]=locations[i];
              var position= new google.maps.LatLng(locations[i][1], locations[i][2]);
              index++;
            }
          }

           var url;
              if(result.length>0) 
              {
                result=result.substr(0,result.length-1);
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php?point="+result;
              }
              else
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php";

          setAdvanceMarker(map,markers); 
           responseList(url);

       }

        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygons) 
        {
            google.maps.event.addListener(polygons.getPath(), 'set_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

            google.maps.event.addListener(polygons.getPath(), 'insert_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

            google.maps.event.addListener(polygons.getPath(), 'remove_at', function(index, obj)
            {
              clearOverlaysMarker(); 
              setPolygonMarker(polygons);
            });

             setPolygonMarker(polygons);
        });

        function setRectangleMarker(rectangle){
            var ne = rectangle.getBounds().getNorthEast();
            var sw = rectangle.getBounds().getSouthWest();
            var markers = [];
            var result="";
            var index=0;
            for(var i=0;i<locations.length;++i)
            {
                lat=locations[i][1];
                lng=locations[i][2];

                if((lng >=sw.lng())&&(lng <=ne.lng())&&(lat>=sw.lat()&&lat<=ne.lat()))
                {
                      
                    str=locations[i][4];
                    result+=str.trim()+":";
                    markers[index]=locations[i];
                    var position= new google.maps.LatLng(lat, lng);
                    index++;
                }
            }

            var url;
              if(result.length>0) 
              {
                result=result.substr(0,result.length-1);
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php?point="+result;
              }
              else
                url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php";
            setAdvanceMarker(map,markers);
            responseList(url);

        }

         google.maps.event.addDomListener(drawingManager, 'rectanglecomplete', function(rectangle) 
           {
              
              google.maps.event.addListener(rectangle, 'bounds_changed', function () 
               {
                clearOverlaysMarker(); 
                setRectangleMarker(rectangle);
                }); 
              setRectangleMarker(rectangle);
           }
         );


        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(e) {
            if (e.type != google.maps.drawing.OverlayType.MARKER) 
            {
            // Switch back to non-drawing mode after drawing a shape.
            drawingManager.setDrawingMode(null);
       
            var newShape = e.overlay;
            newShape.type = e.type;
            google.maps.event.addListener(newShape, 'click', function() {
              setSelection(newShape);
            });
            setSelection(newShape);
          }
        }
        );

      
        google.maps.event.addListener(drawingManager, 'drawingmode_changed', deleteSelectedShape);
        google.maps.event.addListener(map, 'click', clearSelection);
        var url="<?php echo Yii::app()->params['constURL']; ?>/public_html/propertyList.php";
        responseList(url);

      }



      function errorHandler(err) 
      {
          if(err.code == 1) 
          {
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

      function initialize() 
      {
        getLocation();
      }
      google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div id="mapSearch" ></div>
<div id="propertyList"></div>


