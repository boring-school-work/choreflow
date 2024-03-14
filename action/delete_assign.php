<?php
include "./../settings/connection.php";

$assignmentid = $conn->real_escape_string($_GET['assignmentid']);

$query = mysqli_prepare(
  $conn,
  "DELETE FROM Assignment WHERE assignmentid=?"
);

// bind the parameters
mysqli_stmt_bind_param($query, "s", $assignmentid);

// execute the query
mysqli_stmt_execute($query);

header("Location: ./../view/admin/assign-chore/");
exit();
