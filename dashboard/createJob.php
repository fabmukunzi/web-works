<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | New Job</title>
    <link rel="stylesheet" href="./styles.css" />
    <link rel="stylesheet" href="createjob.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
  </head>
  <body>
    <?php
      include('./sidebar.php')
      ?>
    <div class="side-data create-job">
      <h3>Publish your new job post</h3>
      <form method="post" action="handleCreateJob.php" enctype="multipart/form-data">
        <input type="text" placeholder="Enter Job title" name="title" />
        <input type="number" placeholder="Enter Job Salary" name="salary" />
        <textarea
          type="text"
          placeholder="Enter Job Description"
          name="description"
        ></textarea>
        <select name="type">
          <option>select job type</option>
          <option value="Full Time">Full Time</option>
          <option value="Part Time">Part Time</option>
          <option value="Internrship">Internrship</option>
        </select>
        <select name="xperience">
          <option>select minimum experience</option>
          <option value="1">1 year</option>
          <option value="3">3years</option>
          <option value="5">5 years</option>
          <option value="10">10 years</option>
        </select>
        <input
          type="datetime-local"
          placeholder="Application deadline"
          name="deadline"
        />
        <input type="file" name="flyer" />
        <button class="secondary-btn">Publish a job</button>
      </form>
    </div>
  </body>
</html>
