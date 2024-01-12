<?php
session_start();
?>
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
    <header>
      <div class="logo">
        <a href="./index.php">JobLink Connect</a>
      </div>
      <div class="menuItems">
        <ul>
          <a href="jobs.html">Find A Job</a>
          <a href="./about.html">About</a>
          <a href="./contact.html">Get in touch</a>
        </ul>
        <ul style="justify-content:center;gap:10px;">
          <!-- <a href="./login.html">Login</a>
          <a href="./register.html" class="secondary-btn">Signup</a> -->
          <?php
          if (isset($_SESSION['user_id'])) {
              echo '<a href="./profile.php" class="secondary-btn">Profile</a>';
              if (isset($_SESSION['role'])&&$_SESSION['role']==('admin'||'employer')) {
                echo '<a href="./dashboard" class="secondary-btn" style="width:90px;padding:8px">Dashboard</a>';
            }
              echo '<a href="./logout.php" class="primary-btn" style="width:70px;padding:8px">Logout</a>';
          } else {
              echo '<a href="./login.html">Login</a>';
              echo '<a href="./register.html" class="secondary-btn">Signup</a>';
          }
          ?>
        </ul>
      </div>
    </header>
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
        <button class="primary-btn" style="margin-top: 20px">Explore</button>
      </div>
      <div class="home-flyer">
        <img src="./pexels-karolina-grabowska-4467687.jpg" alt="Home Flyer" />
      </div>
    </main>
  </body>
</html>
