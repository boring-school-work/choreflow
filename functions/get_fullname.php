<?php

/** Gets the fullname of a user from their pid
 * @param mysqli $conn The pid of the user
 * @param int $pid The pid of the user
 * @return string The fullname of the user
 */
function get_fullname($conn, $pid)
{
  $result = $conn->query(
    "SELECT CONCAT(fname, ' ', lname) AS fullname 
    FROM People WHERE pid = '$pid'"
  );

  $fullname = $result->fetch_assoc()['fullname'];

  return $fullname;
}
