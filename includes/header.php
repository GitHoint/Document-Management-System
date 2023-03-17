<nav>
  <?php
  session_start();

  $loggedin = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : 'false';
  $username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

  echo "<script>";
  echo "const loggedin = {$loggedin};";
  echo "const username = '{$username}';";
  echo "</script>";
  ?>
  <div class="nav-wrap">
    <ul class="nav-list-first">
    </ul>
    <ul class="nav-list-last">
    </ul>
  </div>
  <!-- js script with all the links -->
  <script src="js/navbar.js"></script>
</nav>