<html>
  <body>

    <div id="mapdiv"></div>

    
    <script src="https://openlayers.org/api/OpenLayers.js"></script>

    <script>
      var longitude = "<?php echo $_GET['longitude'] ?>"
      var latitude = "<?php echo $_GET['latitude'] ?>"
      console.log(latitude);
      console.log(longitude);
      map = new OpenLayers.Map("mapdiv");
      map.addLayer(new OpenLayers.Layer.OSM());
        
      var pois = new OpenLayers.Layer.Text( "My Points",
                      { location:"./POI.php?longitude=" + longitude + "&latitude=" + latitude,
                        projection: map.displayProjection
                      });
      map.addLayer(pois);
  
      //Set start centrepoint and zoom    
      var lonLat = new OpenLayers.LonLat(longitude,latitude)
            .transform(
              new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984...
              map.getProjectionObject() // to Spherical Mercator Projection..
            );
      var zoom=15;
      map.setCenter (lonLat, zoom);  
      
    </script>
  </body>
</html>