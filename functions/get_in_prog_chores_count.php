<?php

function get_all_in_prog_chores_count($conn)
{
  $sql = "SELECT count(*) as value FROM Assignment WHERE sid=2";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
