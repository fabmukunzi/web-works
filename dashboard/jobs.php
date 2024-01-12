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
    <title>Dashboard | users</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="./index.php">Users</a></li>
            <li><a href="./jobs.php">Jobs</a></li>
        </ul>
    </div>
    <div class="side-data">
        <table>
            <caption>Joblink | Jobs</caption>
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
                $query = "SELECT * FROM jobs";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $user['id'] . '</td>';
                        echo '<td>' . $user['title'] . '</td>';
                        echo '<td>' . $user['description'] . '</td>';
                        echo '<td>' . $user['flyer'] . '</td>';
                        echo '<td>' . formatDate($user['createdAt'] ). '</td>';
                        echo '<td>' ."<button class='primary-btn' style='background:red;'>Edit</button> <button class='primary-btn' style='background:red;'>Delete</button>". '</td>';
                        echo '</tr>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
