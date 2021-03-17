<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <title>Kontakt</title>
    <?php
      include("head.php");
    ?>
  </head>
  <body class="scroll-dark scroll-color-management">
      <?php
        include("header.php");
      ?>
      <main class="jumbotron-fluid">
        <section class="jumbotron-fluid section-500 main-dark main-color-management" id="mapSection">
          <div class="row justify-content-center m-0">
            <div class="container-fluid m-3 text-center col-sm-6">
              <h3>Znajdź nas w Krakowie!</h3>
              <div id="map" class="map"></div>
              <script>
                const center = ol.proj.transform([19.9379, 50.0596], 'EPSG:4326', 'EPSG:3857');
                var map = new ol.Map({
                  target: 'map',
                  layers: [
                    new ol.layer.Tile({
                      source: new ol.source.OSM()
                    })
                  ],
                  view: new ol.View({
                    center: center,
                    zoom: 14
                  })
                });
                var layer = new ol.layer.Vector({
                  source: new ol.source.Vector({
                    features: [
                      new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.fromLonLat([19.9379, 50.0596]))
                      })
                    ]
                  })
                });
                map.addLayer(layer);
              </script>
            </div>
          </div>
        </section>
        <section class="jumbotron-fluid section-300 main-dark main-color-management" id="addressSection">
          <div class="row justify-content-center text-center m-0 p-5">
            <div class="container-fluid m-3 col-sm-6">
              <h3>DobraPizza.pl</h3>
              <p>
                ul Grodzka 12<br>
                31-006 Kraków
              </p>
              <h5>Tel: 624 213 024</h5>
              <p>
                Email: dobrapizzapl@gmail.com<br>
                Otwarte codziennie: 10:00-22:00
              </p>
            </div>
          </div>
        </section>
      </main>
      <?php
      include("footer.php");
      ?>
  </body>
</html>