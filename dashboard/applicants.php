<?php
include('../connect.php');
include('../formatDate.php');
session_start();
if (isset($_GET['delete_application_id'])) {
    $user_id = $_SESSION['user_id'];
    $deleteApplicationId = $_GET['delete_application_id'];
    $checkOwnershipQuery = "SELECT * FROM applications WHERE id = '$deleteApplicationId' AND user_id = '$user_id'";
    $checkOwnershipResult = $conn->query($checkOwnershipQuery);

    if ($checkOwnershipResult->num_rows > 0) {
        $deleteApplicationQuery = "DELETE FROM applications WHERE id = '$deleteApplicationId'";
        if ($conn->query($deleteApplicationQuery)) {
            header("Location: applicants.php");
        } else {
            echo "Error deleting application: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Jobs</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        img {
            width: 90px;
            height: 40px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php
    include('./sidebar.php');
    ?>
    <div class="side-data">
    <?php

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $jobs_query = "SELECT * FROM jobs WHERE employer = '$user_id'";
    $jobs_result = $conn->query($jobs_query);

    if ($jobs_result->num_rows > 0) {
        while ($job_row = $jobs_result->fetch_assoc()) {
            $job_id = $job_row['id'];
            $job_name = $job_row['title'];
            $applications_query = "SELECT a.*, u.names, u.email
                                   FROM applications a
                                   INNER JOIN users u ON a.user_id = u.id
                                   WHERE a.job_id = '$job_id'";
            $applications_result = $conn->query($applications_query);

            echo "<h2>Applications for Job: $job_name</h2>";

            if ($applications_result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>LinkedIn Profile</th>
                        <th>Portfolio</th>
                        <th>Skills</th>
                        <th>Languages</th>
                        <th>Cover Letter</th>
                        <th>Resume</th>
                        <th>Actions</th>
                    </tr>";

                while ($application_row = $applications_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $application_row['names'] . "</td>";
                    echo "<td>" . $application_row['email'] . "</td>";
                    echo "<td>" . $application_row['linkedin_profile'] . "</td>";
                    echo "<td>" . $application_row['portfolio'] . "</td>";
                    echo "<td>" . $application_row['skills'] . "</td>";
                    echo "<td>" . $application_row['languages'] . "</td>";
                    echo "<td>".$application_row['cover_letter']."</td>";
                    echo "<td>";
                    $resumeLink = $application_row['resume'];
                    echo "<a href='../$resumeLink' target='_blank'>Download Resume</a>";
                    echo "</td>";
                    echo "<td>";
                    echo "<a href='?delete_application_id=" . $application_row['id'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No applications for this job.";
            }
        }
    } else {
        echo "No jobs created by this user.";
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>
    </div>
</body>

</html>
