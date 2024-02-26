<?php

function get_completed_chores($conn)
{
  $sql = "SELECT chorename, who_assigned, date_assign, date_completed FROM Chores INNER JOIN Assignment ON Chores.cid = Assignment.cid WHERE Assignment.sid=3";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $chorename = $row['chorename'];
    $who_assigned = $row['who_assigned'];
    $date_assign = $row['date_assign'];
    $date_completed = $row['date_completed'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$who_assigned</div>
              <div class='table-cell border py-2 pl-3'>$date_assign</div>
              <div class='table-cell border py-2 pl-3'>$date_completed</div>
              <div class='table-cell border py-2 pl-3'>Do something</div>
            </div>
          </div>";
  }
}
