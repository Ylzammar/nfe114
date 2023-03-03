<html><body>
  <div id="mapdiv"></div>
  <script src="https://openlayers.org/api/OpenLayers.js"></script>



  <script>
    var long = "<?php echo $_GET['long'] ?>"
      var lat = "<?php echo $_GET['lat'] ?>"
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var pois = new OpenLayers.Layer.Text( "My Points",
                    { location:"./POI.php?long=" + long + "&lat=" + lat,
                      projection: map.displayProjection
                    });
    map.addLayer(pois);
 
    //Set start centrepoint and zoom goooo
    var lonLat = new OpenLayers.LonLat(long,lat)
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
    var zoom=15;
    map.setCenter (lonLat, zoom);

  </script>
</body></html>