<?php

function get_chores_list($conn)
{
  $sql = "SELECT * FROM Chores";
  $result = $conn->query($sql);

  foreach ($result as $row) {
    $cid = $row['cid'];
    $chorename = $row['chorename'];
    echo "<div class='table-row-group'>
            <div class='table-row'>
              <div class='table-cell border py-2 pl-3'>$cid</div>
              <div class='table-cell border py-2 pl-3'>$chorename</div>
              <div class='table-cell border py-2 pl-3'>
                  <div class='flex'>
                    <button id='edit-$cid' class='mr-2 bg-blue-300 py-0.5 px-2 rounded-lg'>edit</button>
                    <form action='../../../action/delete_chore.php' method='get' name='delete_chore'>
                      <input type='text' class='hidden' name='cid' value='$cid' />
                      <input class='bg-red-300 px-2 py-0.5 rounded-lg cursor-pointer' value='delete' type='submit' />
                    </form>
                  </div>
              </div>
            </div>
            <div id='dialog-edit-$cid' class='dialog hidden bg-slate-50 w-1/3 h-1/3 absolute top-1/4 left-1/3 p-3 rounded-lg'>
              <div class='text-right font-semibold p-3 cursor-pointer text-2xl text-red-500' id='close-edit-$cid'>
                x
              </div>
              <h3 class='text-2xl font-semibold text-center mb-5'>Edit Chore</h3>
              <form action='../../../action/edit_chore.php' class='flex flex-col items-center text-center justify-center' method='get'>
                <input type='text' class='hidden' name='cid' value='$cid' />
                <input type='text' name='chorename' class='w-2/3 mb-4 border py-3 px-2 rounded-md border-blue-300 accent-blue-300' required value='$chorename' />
                <input type='submit' value='Update' class='bg-blue-300 px-3 py-2 rounded-md'/>
              </form>
            </div>
          </div>";
  }
}
