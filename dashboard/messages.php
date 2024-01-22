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
            <caption>Messages</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Sender Names</th>
                    <th>Sender Email</th>
                    <th>Message</th>
                    <th>Date Received</th>
                    <th>Action
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM messages";
                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($message = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $message['id'] . '</td>';
                        echo '<td>' . $message['senderNames'] . '</td>';
                        echo '<td>' . $message['senderEmail'] . '</td>';
                        echo '<td class="no-overflow">' . $message['message'] . '</td>';
                        echo '<td>' . formatDate($message['createdAt']) . '</td>';
                        echo '<td style="display:flex;gap:5px;">' . "
                            <button class='primary-btn' style='background:red;'>
                                <a style='color:white;text-decoration:none;' href='./deleteJob.php?id=" . $message["id"] . "'>Delete</a>
                            </button>
                        " . '</td>';
                        echo '</tr>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<tr><td colspan="6">No Messages received yet</td></tr>';
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
