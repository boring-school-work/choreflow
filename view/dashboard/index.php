<?php
session_start();

if (isset($_SESSION['user_id'])) {
  if ($_SESSION['role_id'] < 3) {
    header("Location: ./../admin/dashboard/");
    die();
  } else {
    header("Location: ./../user/dashboard/");
    die();
  }
}

echo "You do not have access to this page! <br>";
echo "Redirecting you to login page in 3 seconds!";
header("refresh:3; url=./../../login/");
