<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link rel="stylesheet" href="styles/styles.css" />
    <link rel="stylesheet" href="styles/jobs.css">
    <title>JobLink | Jobs</title>
</head>

<body>
    <?php
    include('./header.php');
    ?>
    <main class="job-cards">
        <?php
        include('./connect.php');
        $query = "SELECT * FROM jobs";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="job-card">';
                echo '<div class="job-card-header">';
                echo '<img src="./dashboard/' . $row["flyer"] . '">';
                echo '</div>';
                echo '<a href="./job.php?id='. $row["id"] . '"class="job-card-title">' . $row["title"] . '</a>';
                echo '<div class="job-card-subtitle">' . $row["description"] . '</div>';
                echo '<div class="job-detail-buttons">';
                echo '<button class="primary-btn detail-button">' . $row["type"] . '</button>';
                echo '<button class="primary-btn detail-button">' .'Min ' . $row["xperience"] .' year'. '</button>';
                echo '<button class="primary-btn detail-button">'.'RWF ' . $row["salary"] . '</button>';
                echo '</div>';
                echo '<div class="job-card-buttons">';
                echo '<a href="./apply.php?id=' . $row["id"] . '" class="secondary-btn card-buttons">Apply Now</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "No jobs found.";
        }
        ?>
    </main>
</body>

</html>