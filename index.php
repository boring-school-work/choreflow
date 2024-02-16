<!-- redirect to login-->
<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header("Location: ./view/dashboard/");
  exit();
}

header('Location: ./login/');
exit();
?>
