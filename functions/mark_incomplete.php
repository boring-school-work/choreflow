<?php

include "../settings/connection.php";

/* TODO: Mark as incomplete */
/* sid = 4 -> incomplete */

$assignment_id = $_GET['assignmentid'];
$sid = $_GET['sid'];

// check if assignment is already incomplete
// no need to touch database
if ($sid == 4) {
  header("Location: ../view/admin/assign-chore/");
  exit();
}

$query = mysqli_prepare($conn, "UPDATE Assignment SET sid=4 WHERE assignmentid=?");
mysqli_stmt_bind_param($query, "s", $assignment_id);
mysqli_stmt_execute($query);
$conn->close();

header("Location: ../view/admin/assign-chore/");
exit();
