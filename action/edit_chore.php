
<?php
include "./../settings/connection.php";

$cid = $conn->real_escape_string($_GET['cid']);
$chorename = $conn->real_escape_string($_GET['chorename']);

mysqli_begin_transaction($conn);

try {
  // prepare the query
  $query = mysqli_prepare(
    $conn,
    "UPDATE Chores SET chorename=? WHERE cid=?"
  );

  // bind the parameters
  mysqli_stmt_bind_param($query, "ss", $chorename, $cid);

  // execute the query
  mysqli_stmt_execute($query);

  // commit the transaction
  mysqli_commit($conn);
} catch (mysqli_sql_exception $e) {
  mysqli_rollback($conn);
  die($e);
}

header("Location: ./../view/admin/add-chore/");
exit();
