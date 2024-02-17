<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: ../../../login');
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
        <div class="flex gap-x-2 justify-around">
          <a class="bg-blue-200 px-5 py-1 rounded-md" href="../../../register">Register</a>
          <a class="bg-blue-200 px-5 py-1 rounded-md" href="../../../login">Login</a>
        </div>
      </div>
    </div>

    <!-- Dashboard -->
    <div class="grow">
      <div class="py-6 px-6 border-b-4 border-l-4 border-blue-500 rounded">
        <h1 class="font-semibold text-4xl text-left">Chore Management</h1>
      </div>
      <main class="bg-gray-100 h-[89vh] px-8">
        <h2 class="py-10 font-semibold text-gray-900 text-2xl">Chore List</h2>
        <div class="table w-full">
          <div class="table-header-group">
            <div class="table-row font-semibold">
              <div class="table-cell">Name</div>
              <div class="table-cell">Assigned by</div>
              <div class="table-cell">Date assigned</div>
              <div class="table-cell">Due date</div>
              <div class="table-cell">Status</div>
              <div class="table-cell">Actions</div>
            </div>
          </div>
          <div class="table-row-group">
            <div class="table-row">
              <div class="table-cell">Clean the car</div>
              <div class="table-cell">Nobara</div>
              <div class="table-cell">29/01/2024</div>
              <div class="table-cell">30/01/2024</div>
              <div class="table-cell">Incomplete</div>
              <div class="table-cell">Do something</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Clean the car</div>
              <div class="table-cell">Nobara</div>
              <div class="table-cell">29/01/2024</div>
              <div class="table-cell">30/01/2024</div>
              <div class="table-cell">In progress</div>
              <div class="table-cell">Do something</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Clean the car</div>
              <div class="table-cell">Nobara</div>
              <div class="table-cell">29/01/2024</div>
              <div class="table-cell">30/01/2024</div>
              <div class="table-cell">In progress</div>
              <div class="table-cell">Do something</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Clean the car</div>
              <div class="table-cell">Nobara</div>
              <div class="table-cell">29/01/2024</div>
              <div class="table-cell">30/01/2024</div>
              <div class="table-cell">Incomplete</div>
              <div class="table-cell">Do something</div>
            </div>
            <div class="table-row">
              <div class="table-cell">Clean the car</div>
              <div class="table-cell">Nobara</div>
              <div class="table-cell">29/01/2024</div>
              <div class="table-cell">30/01/2024</div>
              <div class="table-cell">In completed</div>
              <div class="table-cell">Do something</div>
            </div>
          </div>
        </div>
        <h2 class="py-10 font-semibold text-gray-900 text-2xl">
          Completed chores
        </h2>
        <div class="table w-full">
          <div class="table-header-group">
            <div class="table-row font-semibold">
              <div class="table-cell">Name</div>
              <div class="table-cell">Assigned by</div>
              <div class="table-cell">Date assigned</div>
              <div class="table-cell">Due date</div>
              <div class="table-cell">Status</div>
              <div class="table-cell">Actions</div>
            </div>
          </div>
          <div class="table-row">
            <div class="table-cell">Clean the car</div>
            <div class="table-cell">Nobara</div>
            <div class="table-cell">29/01/2024</div>
            <div class="table-cell">30/01/2024</div>
            <div class="table-cell">Completed</div>
            <div class="table-cell">Do something</div>
          </div>
          <div class="table-row">
            <div class="table-cell">Clean the car</div>
            <div class="table-cell">Nobara</div>
            <div class="table-cell">29/01/2024</div>
            <div class="table-cell">30/01/2024</div>
            <div class="table-cell">Completed</div>
            <div class="table-cell">Do something</div>
          </div>
          <div class="table-row">
            <div class="table-cell">Clean the car</div>
            <div class="table-cell">Nobara</div>
            <div class="table-cell">29/01/2024</div>
            <div class="table-cell">30/01/2024</div>
            <div class="table-cell">Completed</div>
            <div class="table-cell">Do something</div>
          </div>
        </div>
    </div>
    </main>
  </div>
  </div>
</body>

</html>
