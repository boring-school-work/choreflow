<?php

function get_all_assignments($conn)
{
  $sql = "SELECT tmp1.assignmentid, tmp1.cid, tmp1.chorename, tmp1.date_due, tmp1.sname, tmp1.sid, tmp2.pid, tmp2.fullname FROM ( SELECT assignmentid, Assignment.cid AS cid, chorename, date_due, sname, Assignment.sid AS sid FROM Assignment INNER JOIN Chores ON Chores.cid = Assignment.cid INNER JOIN `Status` ON `Status`.`sid` = Assignment.sid )tmp1 INNER JOIN (SELECT assignmentid, People.pid, CONCAT(fname, ' ', lname) AS fullname FROM People, Assigned_people WHERE People.pid = Assigned_people.pid )tmp2 ON tmp1.assignmentid = tmp2.assignmentid";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $assignmentid = $row['assignmentid'];
    $cid = $row['cid'];
    $sid = $row['sid'];
    $chorename = $row['chorename'];
    $due_date = $row['date_due'];
    $sname = $row['sname'];
    /* $pid = $row['pid']; */
    /* $fullname = $row['fullname']; */
    echo "<div class='table-row-group assign-chore'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$cid</div>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$due_date</div>
              <div class='table-cell border py-2 pl-3'>$sname</div>
              <div class='table-cell border py-2 pl-3'>
                <div class='flex gap-x-2'>
                  <form action='../../../functions/mark_incomplete.php' method='get' name='incomplete'>
                    <input type='text' class='hidden' name='assignmentid' value='$assignmentid' />
                    <input type='text' class='hidden' name='sid' value='$sid' />
                    <input class='bg-red-300 px-2 py-0.5 rounded-lg cursor-pointer' value='mark incomplete' type='submit' />
                  </form>
                  <form action='../../../functions/mark_complete.php' method='get' name='complete'>
                    <input type='text' class='hidden' name='assignmentid' value='$assignmentid' />
                    <input type='text' class='hidden' name='sid' value='$sid' />
                    <input class='bg-green-300 px-2 py-0.5 rounded-lg cursor-pointer' value='mark complete' type='submit' />
                  </form>
                </div>
              </div>
            </div>
          </div>";
  }
}
