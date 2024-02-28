<?php

function get_chore($conn)
{
  $sql = "SELECT * FROM Chores WHERE cid NOT IN (SELECT cid FROM Assignment)";
  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo "<option value='" . $row['cid'] . "'>" . $row['chorename'] . "</option>";
  }
}
