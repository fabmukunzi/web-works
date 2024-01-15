
<?php
session_start();
?>
<header>
      <div class="logo">
        <a href="./index.php">JobLink Connect</a>
      </div>
      <div class="menuItems">
        <ul>
          <a href="jobs.php">Find A Job</a>
          <a href="./about.php">About</a>
          <a href="./contact.php">Get in touch</a>
        </ul>
        <ul style="justify-content:center;gap:10px;">
          <!-- <a href="./login.html">Login</a>
          <a href="./register.html" class="secondary-btn">Signup</a> -->
          <?php
          if (isset($_SESSION['user_id'])) {
              echo '<a href="./profile.php" class="secondary-btn">Profile</a>';
              if (isset($_SESSION['role'])&&($_SESSION['role']=='admin'||$_SESSION['role']=='employer')) {
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