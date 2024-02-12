<?php

include '../settings/connection.php';

$sql = "SELECT * FROM `Family_name`;";

$result = $conn->query($sql);

/* foreach ($result as $row) { */
/*   echo $row['fam_name'] . "<br>"; */
/* } */
