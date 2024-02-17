<?php
session_start();

if (isset($_SESSION['user_id'])) {
  if ($_SESSION['role_id'] < 3) {
    header("Location: ./../admin/dashboard/");
    exit();
  } else {
    header("Location: ./../user/dashboard/");
    exit();
  }
}

header("Location: ./../../login/");
