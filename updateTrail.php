<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Trail</title>
  <!-- Slate Bootstrap from Bootswatch -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/slate/bootstrap.min.css" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <?php require('reusable/nav.php'); ?>
      </div>
    </div>
  </div>

  <?php
    require('reusable/connect.php');
    $trailID = $_GET['id'];
    $query = "SELECT * FROM ontarioTrail WHERE `OGF_ID` = '$trailID'";
    $trail = mysqli_query($connect, $query);
    $result = $trail->fetch_assoc();
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Update: <?php echo $result['TRAIL_NAME']; ?></h1>
      </div>
    </div> 
    <div class="row">
      <div class="col-md-5">
        <form method="POST" action="INC/updateScript.php">
          <div class="mb-3">
            <label for="trailName" class="form-label">Trail Name</label>
            <input type="text" class="form-control" id="trailName" name="trailName" value="<?php echo $result['TRAIL_NAME']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="trailLength" class="form-label">Trail Length (KM)</label>
            <input type="text" class="form-control" id="trailLength" name="trailLength" value="<?php echo $result['TRAIL_LENGTH_KM']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="locationAccuracy" class="form-label">Location Accuracy</label>
            <input type="text" class="form-control" id="locationAccuracy" name="locationAccuracy" value="<?php echo $result['LOCATION_ACCURACY']; ?>" required>
          </div>

          <input type="hidden" name="trailID" value="<?php echo $result['OGF_ID']; ?>">
          <button type="submit" class="btn btn-primary" name="updateTrail">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
