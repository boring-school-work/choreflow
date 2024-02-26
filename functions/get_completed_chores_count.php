<?php

function get_completed_chores_count($conn)
{
  $sql = "SELECT count(*) as value FROM Assignment WHERE sid=3";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
