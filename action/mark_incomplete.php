<?php

include "../settings/connection.php";

session_start();

$assignment_id = $conn->real_escape_string($_GET['assignmentid']);
$sid = $conn->real_escape_string($_GET['sid']);

// check if assignment is already incomplete
// no need to touch database
if ($sid == 4) {
  if ($_SESSION['role'] == 'admin') {
    header("Location: ../view/admin/assign-chore/");
    exit();
  } else {
    header("Location: ../view/user/manage-chores/");
    exit();
  }
}

mysqli_begin_transaction($conn);

try {
  // update status
  $q1 = mysqli_prepare($conn, "UPDATE Assignment SET sid=4 WHERE assignmentid=?");
  mysqli_stmt_bind_param($q1, "s", $assignment_id);
  mysqli_stmt_execute($q1);

  $q2 = mysqli_prepare($conn, "UPDATE Assignment SET date_completed=NULL WHERE assignmentid=?");
  mysqli_stmt_bind_param($q2, "s", $assignment_id);
  mysqli_stmt_execute($q2);

  // commit transaction
  mysqli_commit($conn);
} catch (mysqli_sql_exception $e) {
  mysqli_rollback($conn);
  exit();
}

$conn->close();
if ($_SESSION['role'] == 'admin') {
  header("Location: ../view/admin/assign-chore/");
  exit();
} else {
  header("Location: ../view/user/manage-chores/");
  exit();
}
