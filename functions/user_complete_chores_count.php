<?php

function get_complete_count($conn)
{
  $pid = $_SESSION['user_id'];
  $sql = "
      SELECT COUNT(*) AS value
      FROM Assignment
      INNER JOIN Assigned_people
      ON Assignment.assignmentid=Assigned_people.assignmentid
      WHERE Assigned_people.pid=$pid AND Assignment.sid=3";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
