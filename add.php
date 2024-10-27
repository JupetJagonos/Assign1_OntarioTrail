<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Trail</title>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="display-2">Add New Trail</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <form method="POST" action="INC/addTrail.php">
          <div class="mb-3">
            <label for="trailName" class="form-label">Trail Name</label>
            <input type="text" class="form-control" id="trailName" name="trailName" required>
          </div>

          <div class="mb-3">
            <label for="trailLength" class="form-label">Trail Length (KM)</label>
            <input type="text" class="form-control" id="trailLength" name="trailLength" required>
          </div>

          <div class="mb-3">
            <label for="locationAccuracy" class="form-label">Location Accuracy</label>
            <input type="text" class="form-control" id="locationAccuracy" name="locationAccuracy" required>
          </div>

          <button type="submit" class="btn btn-primary" name="addTrail">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
