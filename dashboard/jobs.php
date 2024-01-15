<?php
include('../connect.php');
include('../formatDate.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | jobs</title>
    <link rel="stylesheet" href="./styles.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"/>
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
        <table>
            <caption>
                Your Job Posts
                <button class='secondary-btn' style="width: fit-content; border-radius: 10px; margin-left: 700px">
                    <a href="createJob.php">Create Job</a>
                </button>
            </caption>
            <thead>
                <tr>
                    <th>Job ID</th>
                    <th>Job title</th>
                    <th>Job Description</th>
                    <th>Flyer</th>
                    <th>Date created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $userId = $_SESSION['user_id'];
                $query = "SELECT * FROM jobs WHERE employer='$userId'";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($job = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $job['id'] . '</td>';
                        echo '<td>' . $job['title'] . '</td>';
                        echo '<td class="no-overflow">' . $job['description'] . '</td>';
                        echo '<td>' . "<img src='" . $job['flyer'] . "' alt='not available' />" . '</td>';
                        echo '<td>' . formatDate($job['createdAt']) . '</td>';
                        echo '<td style="display:flex;gap:5px;">' . "
                            <button class='primary-btn' style='background:#2b2ecf'>
                                <a target='_blank' href='../job.php?id=" . $job["id"] . "'>View</a>
                            </button>
                            <button class='primary-btn'>
                                <a href='./editJob.php?id=" . $job["id"] . "'>Edit</a>
                            </button> 
                            <button class='primary-btn' style='background:red;'>
                                <a style='color:white;text-decoration:none;' href='./deleteJob.php?id=" . $job["id"] . "'>Delete</a>
                            </button>
                        " . '</td>';
                        echo '</tr>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<tr><td colspan="6">No jobs created yet</td></tr>';
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
