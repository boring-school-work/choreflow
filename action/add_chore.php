<?php
include "../settings/connection.php";

// sanitize input
$chorename = $conn->real_escape_string($_GET['chorename']);

// insert chore into database
// start transaction
mysqli_begin_transaction($conn);

// insert values into People table
try {
  // prepare the query
  $query = mysqli_prepare(
    $conn,
    "INSERT INTO Chores(chorename) VALUES(?)"
  );

  // bind the parameters
  mysqli_stmt_bind_param($query, "s", $chorename);

  // execute the query
  mysqli_stmt_execute($query);

  // commit the transaction
  mysqli_commit($conn);
} catch (mysqli_sql_exception $e) {
  mysqli_rollback($conn);
  exit();
}

header("Location: ./../view/admin/add-chore/");
