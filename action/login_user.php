<?php
session_start();

include "./../settings/connection.php";

if (isset($_POST['submit'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $passwd = $conn->real_escape_string($_POST['passwd']);

  $query = "SELECT * FROM People WHERE email = '$email'";
  $row = $conn->query($query);
  $result = $row->fetch_assoc();

  // check if there is a record matching the email or password is valid
  if ($result == null || !password_verify($passwd, $result['passwd'])) {
    header("Location: ./../login?status=fail");
    exit();
  }

  // create sessions
  $_SESSION['role_id'] = $result['rid'];
  $_SESSION['user_id'] = $result['pid'];
  $_SESSION['username'] = $result['fname'] . " " . $result['lname'];

  $conn->close();
  // route to dashboard
  header("Location: ./../view/dashboard/");
}
