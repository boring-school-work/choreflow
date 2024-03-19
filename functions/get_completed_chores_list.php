<?php

function get_completed_chores($conn)
{
  include "../../../functions/get_fullname.php";

  echo "
    <div class='table-header-group'>
      <div class='table-row'>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Chore name</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Assigned by</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Assigned</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Completed</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Assignee</div>
      </div>
    </div>
";

  $sql = "
  SELECT * FROM 
  (SELECT chorename, who_assigned, date_assign, date_completed, assignmentid 
  FROM Chores 
  INNER JOIN Assignment 
  ON Chores.cid = Assignment.cid 
  WHERE Assignment.sid=3)tmp1 
  INNER JOIN 
  (SELECT assignmentid, CONCAT(fname, ' ', lname) AS assignee
  FROM Assigned_people 
  INNER JOIN People 
  WHERE Assigned_people.pid = People.pid)tmp2 
  ON tmp1.assignmentid = tmp2.assignmentid
";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $chorename = $row['chorename'];
    $who_assigned = get_fullname($conn, $row['who_assigned']);
    $date_assign = $row['date_assign'];
    $date_completed = $row['date_completed'];
    $assignee = $row['assignee'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$who_assigned</div>
              <div class='table-cell border py-2 pl-3'>$date_assign</div>
              <div class='table-cell border py-2 pl-3'>$date_completed</div>
              <div class='table-cell border py-2 pl-3'>$assignee</div>
            </div>
          </div>";
  }
}
