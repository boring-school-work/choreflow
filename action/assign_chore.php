<?php
session_start();

include "../settings/connection.php";

// sanitize input
$who_assigned = $conn->real_escape_string($_SESSION['user_id']);
$cid = $conn->real_escape_string($_GET['chore']);
$date_due = $conn->real_escape_string($_GET['due_date']);

$date_assign = new DateTime();
$date_assign = $conn->real_escape_string($date_assign->format("Y-m-d"));
$sid = $conn->real_escape_string(4);

// insert chore into database
// start transaction
mysqli_begin_transaction($conn);

// insert values into People table
try {
  // prepare the query
  $query = mysqli_prepare(
    $conn,
    "INSERT INTO Assignment(cid, sid, date_assign, date_due, who_assigned) VALUES(?,?,?,?,?)"
  );

  // bind the parameters
  mysqli_stmt_bind_param($query, "sssss", $cid, $sid, $date_assign, $date_due, $who_assigned);

  // execute the query
  mysqli_stmt_execute($query);

  // commit the transaction
  mysqli_commit($conn);
} catch (mysqli_sql_exception $e) {
  mysqli_rollback($conn);
  exit();
}

header("Location: ./../view/admin/assign-chore/");
exit();
