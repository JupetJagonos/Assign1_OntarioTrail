<?php 
if (isset($_GET['id'])) {
    $trailID = $_GET['id'];

    require('../reusable/connect.php'); 

    $query = "DELETE FROM ontarioTrail WHERE OGF_ID = '$trailID'";
    
    $result = mysqli_query($connect, $query);

    if ($result) {
        header("Location: ../index.php");  
        exit; 
    } else {
        echo "There was an error deleting the trail: " . mysqli_error($connect);
    }

    mysqli_close($connect);
}
?>
