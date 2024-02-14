<?php
include '../settings/core.php';
include '../settings/connection.php';

// sanitize the input
$fname = $conn->real_escape_string($_POST['fname']);
$lname = $conn->real_escape_string($_POST['lname']);
$gender = $conn->real_escape_string($_POST['gender']);
$dob = $conn->real_escape_string($_POST['dob']);
$tel = $conn->real_escape_string($_POST['tel']);
$email = $conn->real_escape_string($_POST['email']);
$fid = $conn->real_escape_string($_POST['family_role']);
$rid = 0;

// hash the password & sanitize it
$passwd = $_POST['passwd'];
$passwd = password_hash($passwd, PASSWORD_BCRYPT);
$passwd = $conn->real_escape_string($passwd);

// fid = 1 -> father
// fid = 2 -> mother
// set role id
if ($fid == 1 || $fid == 2) {
  $rid = $fid;
} else {
  $rid = 3;
}

// sanitize rid
$rid = $conn->real_escape_string($rid);

// start transaction
mysqli_begin_transaction($conn);

// insert values into People table
try {
  // prepare the query
  $query = mysqli_prepare(
    $conn,
    "INSERT INTO People(fname, lname, gender, dob, tel, email, passwd, rid, fid) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)"
  );

  // bind the parameters
  mysqli_stmt_bind_param($query, "sssssssss", $fname, $lname, $gender, $dob, $tel, $email, $passwd, $rid, $fid);

  // execute the query
  mysqli_stmt_execute($query);

  // commit the transaction
  mysqli_commit($conn);
} catch (mysqli_sql_exception $e) {
  mysqli_rollback($conn);
}

// redirect to login page after registration
echo "Registration successful!" . "<br>";
echo "Redirecting to login page in 5 seconds...";
header("refresh:5; url=../login/");
