<?php

include "../../../settings/core.php";

check_session();

if ($_SESSION['role'] == 'admin') {
  header("Location: ../../dashboard");
  exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Chore Management System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="../../../assets/css/styles.css" rel="stylesheet" />
  <link href="../../../assets/css/output.css" rel="stylesheet" />
</head>

<body>
  <div class="flex">
    <!-- Side navigation -->
    <div class="text-center w-1/6 py-4 px-5">
      <a href="/" class="font-semibold text-2xl">ChoreFlow</a>
      <div class="flex flex-col h-[89vh] justify-between">
        <div class="flex flex-col grow mt-8">
          <a href="../dashboard/" class="py-2 bg-gray-50 mb-2 rounded">Home</a>
          <a href="./" class="py-2 bg-gray-50 rounded">Manage Chores</a>
        </div>
        <a class="bg-blue-200 px-5 py-1 rounded-md" href="../../../logout">Logout</a>
      </div>
    </div>

    <!-- Dashboard -->
    <div class="grow">
      <div class="flex py-6 px-6 border-b-4 border-l-4 border-blue-500 rounded items-center justify-between">
        <h1 class="font-semibold text-4xl text-left">Chore Management</h1>
        <?php
        echo "<p>" . $_SESSION['username'] . "</p>";
        ?>
      </div>
      <main class="bg-gray-100 h-[89vh] px-8">
        <h2 class="py-10 font-semibold text-gray-900 text-2xl">Chore List</h2>
        <div class="table w-full">
          <?php
          include "../../../settings/connection.php";
          include "../../../functions/get_user_chores_list.php";
          get_user_chores_list($conn);
          $conn->close();
          ?>
        </div>
      </main>
    </div>
  </div>
</body>

</html>
