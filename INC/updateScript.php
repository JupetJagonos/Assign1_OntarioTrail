<?php 
if(isset($_POST['updateTrail'])) {
    $trailID = $_POST['trailID'];
    $trailName = $_POST['trailName'];
    $trailLength = $_POST['trailLength'];
    $locationAccuracy = $_POST['locationAccuracy'];

    require('../reusable/connect.php');

    $query = "UPDATE ontarioTrail SET 
        `TRAIL_NAME` = '$trailName', 
        `TRAIL_LENGTH_KM` = '$trailLength', 
        `LOCATION_ACCURACY` = '$locationAccuracy' 
        WHERE `OGF_ID` = '$trailID'";

    $trail = mysqli_query($connect, $query);

    if($trail) {
        header("Location: ../index.php");
    } else {
        echo "There was an error updating the trail: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
