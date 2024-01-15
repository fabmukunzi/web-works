<?php
include('../connect.php');
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $deleteQuery = "DELETE FROM users WHERE id = $userId";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
mysqli_close($conn);
?>
