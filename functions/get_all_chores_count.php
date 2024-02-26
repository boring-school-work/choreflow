<?php

function get_all_chores_count($conn)
{
  $sql = "SELECT count(*) as value FROM Chores";
  $result = $conn->query($sql)->fetch_assoc();

  echo $result['value'];
}
