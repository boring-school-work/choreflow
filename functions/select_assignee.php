<?php
function get_assignees($conn)
{
  $sql = "SELECT * FROM People WHERE rid=3";
  return $conn->query($sql);
}