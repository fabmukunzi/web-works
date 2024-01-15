<?php
include('../connect.php');
if (isset($_GET['id'])) {
    $jobId = $_GET['id'];
    $deleteQuery = "DELETE FROM jobs WHERE id = $jobId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: jobs.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request. Job ID not provided.";
}
mysqli_close($conn);
?>
