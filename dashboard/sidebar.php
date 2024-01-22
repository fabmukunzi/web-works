<div class="sidebar">
  <a href="../index.php" style="text-decoration: none;"><h3>JobLink Connect.</h3></a>
  <?php
   if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    echo '<button class="secondary-btn">
  <a href="./index.php">Users</a></button>';
  echo '<button class="secondary-btn">
  <a href="./messages.php">Messages</a></button>';
}
if (isset($_SESSION['role']) && $_SESSION['role'] == 'seeker')
  header('Location: ../index.php');
  ?>
  <button class="secondary-btn">
    <a href="./jobs.php">Jobs</a>
  </button>
  <button class="secondary-btn">
    <a href="./applicants.php">Applicants</a>
  </button>
  <button class="secondary-btn">
    <a href="../logout.php">Logout</a>
  </button>
</div>
