<?php

function get_chore($conn)
{
  $sql = "SELECT * FROM Chores";
  $result = $conn->query($sql);
  foreach ($result as $row) {
    echo "<option value='" . $row['cid'] . "'>" . $row['chorename'] . "</option>";
  }
}
