<?php

/**
 * Get all chores assigned to a user
 *
 * @param mysqli $conn
 */
function get_user_assigned_chores($conn)
{
  include "../../../functions/get_fullname.php";

  $pid = $_SESSION['user_id'];

  echo "
    <div class='table-header-group'>
      <div class='table-row'>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Chore name</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Due</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Assigned</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Assigned By</div>
      </div>
    </div>
";

  $sql = "
  SELECT chorename, who_assigned, date_due, date_assign
  FROM Chores 
  INNER JOIN Assignment 
  ON Chores.cid = Assignment.cid 
  INNER JOIN Assigned_people
  ON Assignment.assignmentid=Assigned_people.assignmentid
  WHERE Assigned_people.pid=$pid AND Assignment.sid=1
";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $chorename = $row['chorename'];
    $who_assigned = get_fullname($conn, $row['who_assigned']);
    $date_assign = $row['date_assign'];
    $date_due = $row['date_due'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$date_due</div>
              <div class='table-cell border py-2 pl-3'>$date_assign</div>
              <div class='table-cell border py-2 pl-3'>$who_assigned</div>
            </div>
          </div>";
  }
}
