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
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
</head>
<body>
    <?php
    include('./sidebar.php');
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: jobs.php");
    exit();
}
    ?>
    <div class="side-data">
        <table>
            <caption>Joblink Users</caption>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Date joined</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM users";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $user['id'] . '</td>';
                        echo '<td>' . $user['names'] . '</td>';
                        echo '<td>' . $user['email'] . '</td>';
                        echo '<td>' . $user['role'] . '</td>';
                        echo '<td>' . formatDate($user['createdAt'] ). '</td>';
                        echo '<td>' ."<button class='primary-btn' style='background:red;'>
                        <a href='./deleteUser.php?id=" . $user["id"] . "'>Delete</a></button>". '</td>';
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
