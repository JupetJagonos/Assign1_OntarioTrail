<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trail List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/slate/bootstrap.min.css" crossorigin="anonymous">
  
  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  
  <style>
    #map {
      height: 400px; /* Set height for the map */
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusable/nav.php'); ?>
      </div>
    </div>
  </div>

  <!-- Map Container -->
  <div id="map"></div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Trails</h1>
      </div>
    </div>
    <div class="row">
      <?php 
      require('reusable/connect.php');
      $query  = 'SELECT * FROM ontarioTrail';
      $trails = mysqli_query($connect, $query);
      
      foreach($trails as $trail) {
        echo '<div class="card col-md-4 mb-2">
          <div class="card-body">
            <h5 class="card-title">' . $trail['TRAIL_NAME'] . '</h5>
            <p class="card-text">Length: ' . $trail['TRAIL_LENGTH_KM'] . ' KM</p>
            <span class="badge bg-secondary">Accuracy: ' . $trail['LOCATION_ACCURACY'] . '</span><br><br>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col">
                <form method="GET" action="updateTrail.php">
                  <input type="hidden" name="id" value="' . $trail['OGF_ID'] . '">
                  <button class="btn btn-sm btn-primary">Update</button>
                </form>
              </div>
              <div class="col">
                <form method="GET" action="INC/deleteScript.php">
                  <input type="hidden" name="id" value="' . $trail['OGF_ID'] . '">
                  <button class="btn btn-sm btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>';
      }
      ?>
    </div>
  </div>

  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

  <script>
    // Initialize the map
    var map = L.map('map').setView([43.7, -79.4], 8); // Default center coordinates

    // Add a tile layer from OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    // Fetch GeoJSON data
    fetch('https://ws.lioservices.lrc.gov.on.ca/arcgis2/rest/services/LIO_OPEN_DATA/LIO_Open04/MapServer/19/query?outFields=*&where=1%3D1&f=geojson')
      .then(response => response.json())
      .then(geojsonData => {
        // Add GeoJSON layer to the map
        L.geoJSON(geojsonData, {
            onEachFeature: function (feature, layer) {
                layer.bindPopup(feature.properties.name); // Display trail name on click
            }
        }).addTo(map);
      })
      .catch(error => console.error('Error fetching GeoJSON:', error));
  </script>
</body>
</html>
