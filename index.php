<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/styles.css" />
    <title>JobLink | Home</title>
  </head>
  <body>
    <?php
    include('./header.php');
    ?>
    <main>
      <div class="content">
        <span
          style="
            margin-bottom: 10px;
            color: #2b2ecf;
            font-weight: bold;
            font-size: xx-large;
          "
          >JobLink Connect.</span
        >
        <p style="font-size: x-large; width: 320px">
          <span style="color: black; font-weight: bold"
            >Find Thousands of jobs</span
          >
          <span style="color: #e89a3c; font-weight: bold"
            >that match your passion.</span
          >
        </p>
        <p style="width: 410px">
          Search and find your dream job is now easier than ever you just browse
          and find job if you need it
        </p>
        <button  class="primary-btn" style="margin-top: 20px">
        <a style="color:white;" href="./jobs.php">Explore</a>
      </button>
      </div>
      <div class="home-flyer">
        <img src="./pexels-karolina-grabowska-4467687.jpg" alt="Home Flyer" />
      </div>
    </main>
  </body>
</html>
