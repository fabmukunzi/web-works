<?php
include('../connect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employer = 1;
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
        $file_path = $target_directory . uniqid() . "_" . $file_name;
        if (move_uploaded_file($file_tmp, $file_path)) {
            $createdAt = date("Y-m-d H:i:s");
            $sql = "INSERT INTO jobs (title, salary, description, type, xperience, deadline, employer, flyer, createdAt) 
                    VALUES ('$title', '$salary', '$description', '$type', '$experience', '$deadline', '$employer', '$file_path', '$createdAt')";
            if ($conn->query($sql) === TRUE) {
               header("Location: jobs.php");
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error: Failed to move uploaded file to the target directory.";
        }
    } else {
        echo "Error: File upload failed.";
    }
    $conn->close();
}
?>
