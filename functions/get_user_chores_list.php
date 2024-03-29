<?php

/**
 * Get all chores assigned to a user
 *
 * @param mysqli $conn
 */
function get_user_chores_list($conn)
{
  include "../../../functions/get_fullname.php";

  $pid = $_SESSION['user_id'];

  echo "
    <div class='table-header-group'>
      <div class='table-row'>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Chore name</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Due</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Date Assigned</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Status</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Assigned By</div>
        <div class='table-cell bg-gray-300 py-2 pl-3'>Actions</div>
      </div>
    </div>
";

  $sql = "
  SELECT chorename, who_assigned, Assignment.sid as sid, sname, date_due, date_assign, Assignment.assignmentid as assignmentid
  FROM Chores
  INNER JOIN Assignment 
  ON Chores.cid = Assignment.cid 
  INNER JOIN Status
  ON Status.sid=Assignment.sid
  INNER JOIN Assigned_people
  ON Assignment.assignmentid=Assigned_people.assignmentid
  WHERE Assigned_people.pid=$pid;
";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $chorename = $row['chorename'];
    $assignmentid = $row['assignmentid'];
    $who_assigned = get_fullname($conn, $row['who_assigned']);
    $date_assign = $row['date_assign'];
    $date_due = $row['date_due'];
    $sname = $row['sname'];
    $sid = $row['sid'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>$date_due</div>
              <div class='table-cell border py-2 pl-3'>$date_assign</div>
              <div class='table-cell border py-2 pl-3'>$sname</div>
              <div class='table-cell border py-2 pl-3'>$who_assigned</div>
              <div class='table-cell border py-2 pl-3'>
              <div class='flex gap-x-2'>
                <form action='../../../action/mark_inprogress.php' method='get' name='inprogress'>
                  <input type='text' class='hidden' name='assignmentid' value='$assignmentid' />
                  <input type='text' class='hidden' name='sid' value='$sid' />
                  <input class='bg-gray-300 px-2 py-0.5 rounded-lg cursor-pointer' value='mark in progress' type='submit' />
                </form>
                <form action='../../../action/mark_incomplete.php' method='get' name='incomplete'>
                  <input type='text' class='hidden' name='assignmentid' value='$assignmentid' />
                  <input type='text' class='hidden' name='sid' value='$sid' />
                  <input class='bg-red-300 px-2 py-0.5 rounded-lg cursor-pointer' value='mark incomplete' type='submit' />
                </form>
                <form action='../../../action/mark_complete.php' method='get' name='complete'>
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
