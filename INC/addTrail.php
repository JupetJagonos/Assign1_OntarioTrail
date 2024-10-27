<?php 
if(isset($_POST['addTrail'])) {
    $trailName = $_POST['trailName'];
    $trailLength = $_POST['trailLength'];
    $locationAccuracy = $_POST['locationAccuracy'];

    require('../reusable/connect.php');

    $query = "INSERT INTO ontarioTrail (`TRAIL_NAME`, `TRAIL_LENGTH_KM`, `LOCATION_ACCURACY`) VALUES 
        ('$trailName', '$trailLength', '$locationAccuracy')";

    $trail = mysqli_query($connect, $query);

    if($trail) {
        header("Location: ../index.php");
    } else {
        echo "There was an error adding the trail: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
