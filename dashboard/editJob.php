<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | Update Job</title>
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="createjob.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
</head>
<body>
    <?php
    include('./sidebar.php');
    ?>
    <div class="side-data create-job">
        <h3>Update your job post</h3>
        <?php
        $jobId = $_GET['id'];
        include('../connect.php');
        $query = "SELECT * FROM jobs WHERE id = $jobId";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>
            <form method="post" action="handleUpdateJob.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
                <input type="hidden" name="jobId" value="<?php echo $row['id']; ?>">

                <input type="text" placeholder="Enter Job title" name="title" value="<?php echo $row['title']; ?>" />
                <input type="number" placeholder="Enter Job Salary" name="salary" value="<?php echo $row['salary']; ?>" />
                <textarea type="text" placeholder="Enter Job Description" name="description"><?php echo $row['description']; ?></textarea>
                <select name="type">
                    <option value="Full Time" <?php echo ($row['type'] === 'Full Time') ? 'selected' : ''; ?>>Full Time</option>
                    <option value="Part Time" <?php echo ($row['type'] === 'Part Time') ? 'selected' : ''; ?>>Part Time</option>
                    <option value="Internrship" <?php echo ($row['type'] === 'Internrship') ? 'selected' : ''; ?>>Internship</option>
                </select>
                <select name="xperience">
                    <option value="1 year" <?php echo ($row['xperience'] === '1 year') ? 'selected' : ''; ?>>1 year</option>
                    <option value="3 years" <?php echo ($row['xperience'] === '3 years') ? 'selected' : ''; ?>>3 years</option>
                    <option value="5 years" <?php echo ($row['xperience'] === '5 years') ? 'selected' : ''; ?>>5 years</option>
                    <option value="10 years" <?php echo ($row['xperience'] === '10 years') ? 'selected' : ''; ?>>10 years</option>
                </select>
                <input type="datetime-local" placeholder="Application deadline" name="deadline" value="<?php echo date('Y-m-d\TH:i', strtotime($row['deadline'])); ?>" />
                <input type="file" name="flyer" />
                <button class="secondary-btn">Update Post</button>
            </form>
        <?php
        } else {
            echo "Job not found.";
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>
