<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header('Location: ../../../login');
  exit();
}

if ($_SESSION['role_id'] == 3) {
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
          <a href="./" class="py-2 bg-gray-50 rounded mb-2">Add Chore</a>
          <a href="../assign-chore/" class="py-2 bg-gray-50 mb-2 rounded">Assign Chore</a>
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
        <div class="flex justify-between">
          <h2 class="py-10 font-semibold text-gray-900 text-2xl">
            Chore List
          </h2>

          <!-- Button that triggers form dialog -->
          <button class="bg-gray-300 my-9 px-2 shadow-sm rounded-md" type="button" id="openDialog">
            Add a chore
          </button>

          <!-- Dialog with form -->
          <dialog id="dialog" class="bg-white-200 bg-opacity-50 w-1/3 h-1/3 relative top-1/4 left-1/3 p-3 rounded-lg">
            <div class="text-right font-semibold p-3 cursor-pointer text-2xl text-red-500" id="closeDialog">
              x
            </div>
            <h3 class="text-2xl font-semibold text-center mb-5">Add a Chore</h3>
            <form action="" method="post" name="addChore" id="addChore" class="flex flex-col items-center text-center justify-center">
              <input type="text" placeholder="Enter chore" id="chorename" name="chorename" class="w-1/2 mb-4 border py-3 px-2 rounded-md border-blue-300 accent-blue-300" required />
              <button type="submit" name="submitChore" id="submitChore" class="bg-blue-300 px-3 py-2 rounded-md">Submit</button>
            </form>
          </dialog>

        </div>
        <div class=" table w-full">
          <div class="table-header-group">
            <div class="table-row">
              <div class="table-cell bg-gray-300 py-2 pl-3">Chore ID</div>
              <div class="table-cell bg-gray-300 py-2 pl-3">Chore name</div>
              <div class="table-cell bg-gray-300 py-2 pr-3">Actions</div>
            </div>
          </div>
          <div class="table-row-group">
            <div class="table-row">
              <div class="table-cell border py-2 pl-3">10101</div>
              <div class="table-cell border py-2 pl-3">Feed the cat</div>
              <div class="table-cell border py-2 pl-3">Do something</div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script src="../../../assets/js/dialog.js"></script>
</body>

</html>
