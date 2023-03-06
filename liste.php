<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ma carte</title>
    <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
    <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
</head>
<body>
    <div id="map" style="width: 100%; height: 500px;"></div>
    <script type="text/javascript">
        // Création de la carte
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    source: new ol.source.OSM()
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([2.294359, 48.858205]),
                zoom: 13
            })
        });

        // Ajout des POI à la carte
        var iconStyle = new ol.style.Style({
            image: new ol.style.Icon({
                src: 'Ol_icon_red_example.png',
                anchor: [0.5, 1],
                anchorXUnits: 'fraction',
                anchorYUnits: 'fraction',
                opacity: 0.75,
                scale: 0.5
            })
        });

        <?php
            // Connexion à la BDD
            $base = new PDO('mysql:host=localhost; dbname=id20205714_facnanterre', 'id20205714_ammar', 'dR=l[8+O!]qoz$S{');
            $base->exec("SET CHARACTER SET utf8");

            // Récupération des POI depuis la BDD
            $retour = $base->query('SELECT *, get_distance_metres(\'48.858205\', \'2.294359\', equi_lat, equi_long) 
            AS proximite 
            FROM equipement 
            HAVING proximite < 1000 
            ORDER BY proximite ASC
            LIMIT 10;
            ');

            // Boucle pour afficher les POI sur la carte
            while ($data = $retour->fetch()){
                echo "var marker = new ol.Feature({\n";
                echo "    geometry: new ol.geom.Point(ol.proj.fromLonLat([".$data['equi_long'].", ".$data['equi_lat']."]))\n";
                echo "});\n";
                echo "marker.setStyle(iconStyle);\n";
                echo "var vectorSource = new ol.source.Vector({\n";
                echo "    features: [marker]\n";
                echo "});\n";
                echo "var vectorLayer = new ol.layer.Vector({\n";
                echo "    source: vectorSource\n";
                echo "});\n";
                echo "map.addLayer(vectorLayer);\n";
            }
        ?>
    </script>
</body>
</html>


