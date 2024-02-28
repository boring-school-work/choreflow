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

/* insert values into Assignment table */
// prepare the query
$query = mysqli_prepare(
  $conn,
  "INSERT INTO Assignment(cid, sid, date_assign, date_due, who_assigned) VALUES(?,?,?,?,?)"
);

// bind the parameters
mysqli_stmt_bind_param($query, "sssss", $cid, $sid, $date_assign, $date_due, $who_assigned);

// execute the query
if (!mysqli_stmt_execute($query)) {
  die("Internal Server Error: Could not insert into database.");
}

/* get pid & assignment id */
$pid = $conn->real_escape_string($_GET['assignee']);
$assignmentid =  $conn->insert_id;

/* insert into Assigned_people table */
// prepare the query
$query = mysqli_prepare(
  $conn,
  "INSERT INTO Assigned_people(pid, assignmentid) VALUES(?,?)"
);

// bind the parameters
mysqli_stmt_bind_param($query, "ss", $pid, $assignmentid);

// execute the query
if (!mysqli_stmt_execute($query)) {
  die("Internal Server Error: Could not insert into database.");
}

header("Location: ./../view/admin/assign-chore/");
exit();
