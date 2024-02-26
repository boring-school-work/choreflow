<?php

function get_all_assignments($conn)
{
  $sql = "SELECT Assignment.cid as cid, chorename, date_due, sname FROM Assignment INNER JOIN Chores ON Chores.cid = Assignment.cid INNER JOIN `Status` ON `Status`.`sid` = Assignment.sid";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $cid = $row['cid'];
    $chorename = $row['chorename'];
    $due_date = $row['date_due'];
    $sname = $row['sname'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$cid</div>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$due_date</div>
              <div class='table-cell border py-2 pl-3'>$sname</div>
              <div class='table-cell border py-2 pl-3'>Do something</div>
            </div>
          </div>";
  }
}
