<?php
include("./connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $user_id = $_SESSION['user_id'];
    $job_id = $_GET['job_id'];
    $coverLetter = $_POST['cover-letter'];
    $linkedinProfile = $_POST['linkedin-profile'];
    $portfolio = $_POST['portfolio'];
    $skills = $_POST['skills'];
    $languages = $_POST['languages'];

    if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == UPLOAD_ERR_OK) {
        $file_name = $_FILES["resume"]["name"];
        $file_tmp = $_FILES["resume"]["tmp_name"];
        $target_directory = "resumes/";
        $file_path = $target_directory . uniqid() . "_" . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $stmt = $conn->prepare("INSERT INTO applications (user_id, job_id, resume, cover_letter, linkedin_profile, portfolio, skills, languages) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iissssss", $user_id, $job_id, $file_path, $coverLetter, $linkedinProfile, $portfolio, $skills, $languages);

            if ($stmt->execute()) {
                header("Location: jobs.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error: Failed to move the uploaded file to the target directory.";
        }
    } else {
        echo "Error: File upload failed.";
    }

    $conn->close();
}
?>
