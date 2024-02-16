<!-- redirect to login-->
<?php
if (isset($_SESSION['user_id'])) {
  header("Location: ./view/dashboard/");
}

header('Location: ./login/');
die();
?>
