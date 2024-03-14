<?php

include "../settings/connection.php";

$assignment_id = $_GET['assignmentid'];
$sid = $_GET['sid'];

// check if assignment is already complete
// no need to touch database
if ($sid == 3) {
  header("Location: ../view/admin/assign-chore/");
  exit();
}

$query = mysqli_prepare($conn, "UPDATE Assignment SET sid=3 WHERE assignmentid=?");
mysqli_stmt_bind_param($query, "s", $assignment_id);
mysqli_stmt_execute($query);
$conn->close();

header("Location: ../view/admin/assign-chore/");
exit();
