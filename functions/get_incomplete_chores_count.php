<?php

function get_incomplete_chores_count($conn)
{
  $sql = "SELECT count(*) as value FROM Assignment WHERE sid=4";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
