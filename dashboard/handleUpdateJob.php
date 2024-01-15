<?php
include('../connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobId = $_GET["id"];
    $title = $_POST["title"];
    $salary = $_POST["salary"];
    $description = $_POST["description"];
    $type = $_POST["type"];
    $experience = $_POST["xperience"];
    $deadline = $_POST["deadline"];
    if (isset($_FILES["flyer"]) && $_FILES["flyer"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["flyer"]["name"];
        $file_tmp = $_FILES["flyer"]["tmp_name"];
        $target_directory = "uploads/";
        $target_file = $target_directory . uniqid() . "_" . $file_name;
        if (move_uploaded_file($file_tmp, $target_file)) {
            $sql = "UPDATE jobs SET title='$title', salary='$salary', description='$description', type='$type', xperience='$experience', deadline='$deadline', flyer='$target_file' WHERE id=$jobId";
            if ($conn->query($sql) === TRUE) {
                header("Location: jobs.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: Failed to move uploaded file to the target directory.";
        }
    } else {
        $sql = "UPDATE jobs SET title='$title', salary='$salary', description='$description', type='$type', xperience='$experience', deadline='$deadline' WHERE id=$jobId";
        if ($conn->query($sql) === TRUE) {
            header("Location: jobs.php");
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
