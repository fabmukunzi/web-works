<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Joblink | jobs</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/jobs.css" />
</head>

<body>
    <?php
    include('./header.php');
    ?>
    <main class="job-details">
        <?php
        if (isset($_GET['id'])) {
            $jobId = $_GET['id'];
            include('./connect.php');
            $query = "SELECT * FROM jobs WHERE id = $jobId";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo '<img src="./dashboard/' . $row["flyer"] . '" alt="Flyer" />';
                echo '<div style="margin:0px 10px 0px 10px">';
                echo '<h3>' . $row["title"] . '</h3>';
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>Experience</th>';
                echo '<th>Employee type</th>';
                echo '<th>Salary</th>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>' . $row["xperience"] . '</td>';
                echo '<td>' . $row["type"] . '</td>';
                echo '<td>' . $row["salary"] . ' RWF'.'</td>';
                echo '</tr>';
                echo '</table>';
                echo '<p>' . $row["description"] . '</p>';
                echo '</div>';
            } else {
                echo "Job not found.";
            }
            mysqli_close($conn);
        } else {
            echo "Job not found.";
        }
        ?>
    </main>
</body>

</html>
