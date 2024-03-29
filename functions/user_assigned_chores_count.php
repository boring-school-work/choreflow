<?php

function get_assigned_count($conn)
{
  $pid = $_SESSION['user_id'];
  $sql = "
      SELECT COUNT(*) AS value
      FROM Assignment
      INNER JOIN Assigned_people
      ON Assignment.assignmentid=Assigned_people.assignmentid
      WHERE Assigned_people.pid=$pid AND Assignment.sid=1";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
