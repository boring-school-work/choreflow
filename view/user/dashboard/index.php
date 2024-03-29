<?php

include "../../../settings/core.php";

check_session();

if ($_SESSION['role_id'] < 3) {
  header("Location: ../../dashboard");
  exit();
}
?>
<!DOCTYPE html>
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
          <a href="./" class="py-2 bg-gray-50 mb-2 rounded">Home</a>
          <a href="../manage-chores" class="py-2 bg-gray-50 rounded">Manage Chores</a>
        </div>
        <a class="bg-blue-200 px-5 py-1 rounded-md" href="../../../logout">Logout</a>
      </div>
    </div>

    <!-- Dashboard -->
    <div class="grow">
      <div class="flex py-6 px-6 border-b-4 border-l-4 border-blue-500 rounded items-center justify-between">
        <h1 class="font-semibold text-4xl text-left">Dashboard</h1>
        <?php
        echo "<p>" . $_SESSION['username'] . "</p>";
        ?>
      </div>
      <main class="bg-gray-100 h-[89vh] px-8">
        <h2 class="py-10 font-semibold text-gray-900 text-3xl">Tasks</h2>
        <div class="flex justify-around">
          <a href="../manage-chores/" class="px-5 gap-y-8 pt-5 pb-3 rounded-lg drop-shadow-md bg-white w-1/4 flex flex-col justify-between">
            <div class="flex items-center">
              <div class="w-[12px] h-[12px] rounded-xl bg-yellow-400 mr-3"></div>
              In Progress
            </div>

            <div class="font-bold text-2xl">12</div>
          </a>
          <a href="../manage-chores/" class="px-5 gap-y-8 pt-5 pb-3 rounded-lg drop-shadow-md bg-white w-1/4 flex flex-col justify-between">
            <div class="flex items-center">
              <div class="w-[12px] h-[12px] rounded-xl bg-red-600 mr-3"></div>
              Incomplete
            </div>
            <div class="font-bold text-2xl">12</div>
          </a>
          <a href="../manage-chores/" class="px-5 gap-y-8 pt-5 pb-3 rounded-lg drop-shadow-md bg-white w-1/4 flex flex-col justify-between">
            <div class="flex items-center">
              <div class="w-[12px] h-[12px] rounded-xl bg-green-600 mr-3"></div>
              Completed
            </div>
            <div class="font-bold text-2xl">12</div>
          </a>
        </div>

        <!-- Assigned Tasks -->
        <h2 class="py-10 font-semibold text-gray-900 text-3xl">
          Assigned Tasks
        </h2>
        <div class="flex flex-col gap-y-3">
          <div class="flex justify-between mx-16 px-5 border-2 items-center rounded-md">
            <div>
              <h3>Laundry</h3>
              <p>father</p>
            </div>
            <div>Date assigned</div>
            <div>Date completed</div>
            <div>Check details</div>
          </div>
          <div class="flex justify-between mx-16 px-5 border-2 items-center rounded-md">
            <div>
              <h3>Laundry</h3>
              <p>father</p>
            </div>
            <div>Date assigned</div>
            <div>Date completed</div>
            <div>Check details</div>
          </div>
          <div class="flex justify-between mx-16 px-5 border-2 items-center rounded-md">
            <div>
              <h3>Laundry</h3>
              <p>father</p>
            </div>
            <div>Date assigned</div>
            <div>Date completed</div>
            <div>Check details</div>
          </div>
        </div>
    </div>
    </main>
  </div>
  </div>
</body>

</html>
