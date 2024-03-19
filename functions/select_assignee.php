<?php
function get_assignees($conn)
{
  $sql = "SELECT * FROM People WHERE rid=3";
  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo "<option value='" . $row['pid'] . "'>" . $row['fname'] . " " . $row['lname'] . "</option>";
  }
}
