<!doctype html>
<html lang="en">

<head>
  <title>Chore Management System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="./../assets/css/styles.css" rel="stylesheet" />
  <link href="./../assets/css/output.css" rel="stylesheet" />
</head>

<body>
  <!-- Dashboard -->
  <div class="py-6 px-6 border-b-4 border-blue-500 rounded">
    <a href="/" class="font-semibold text-4xl text-left">ChoreFlow</a>
  </div>
  <div class="bg-gray-100 h-screen text-center flex flex-col pt-20">
    <h2 class="font-semibold text-3xl mb-5">Register your account</h2>
    <?php
    echo "<p class='font-semibold text-red-600 pb-3'>" . $_GET['error'] . "</p>";
    ?>
    <form action="../action/register_user.php" method="post" name="register" id="register" onsubmit="return check();">
      <div class="flex flex-row place-content-center gap-x-3 mb-4">
        <div class="flex flex-col text-left mb-1 w-1/5">
          <label for="fname">First name</label>
          <input type="text" name="fname" id="fname" pattern="[a-zA-Z]+" class="py-2 px-3 rounded-md" placeholder="Enter your first name" required />
        </div>
        <div class="flex flex-col text-left mb-1 w-1/5">
          <label for="lname">Last name</label>
          <input type="text" name="lname" id="lname" pattern="[a-zA-Z]+" class="py-2 px-3 rounded-md" placeholder="Enter your last name" required />
        </div>
      </div>
      <div class="flex flex-row place-content-center gap-x-3 mb-4">
        <div class="flex flex-col text-left mb-1 w-1/5">
          <p>Gender</p>
          <div>
            <div class="indent-5">
              <input type="radio" id="male" name="gender" value=0 required />
              <label for="male">male</label><br />
            </div>
            <div class="indent-5">
              <input type="radio" id="female" name="gender" value=1 required />
              <label for="female">female</label><br />
            </div>
          </div>
        </div>
        <div class="flex flex-col text-left mb-1 w-1/5">
          <p>Family role</p>
          <select name="family_role" class="w-64 py-1.5 px-1 rounded-md bg-white">
            <?php
            include '../functions/select_role.php';

            foreach ($result as $row) {
              echo "<option value='" . $row['fid'] . "'>" . $row['fam_name'] . "</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="flex flex-row place-content-center gap-x-3 mb-4">
        <div class="flex flex-col text-left mb-1 w-1/5">
          <label for="dob">Date of birth</label>
          <?php
          $current_date = new DateTime();

          // Subtract 10 years from the current date
          $past_date = $current_date->sub(new DateInterval('P10Y'));

          // Format the past date as a string
          $max_dob = $past_date->format('Y-m-d');
          ?>
          <input type="date" name="dob" id="dob" class="py-2 px-3 rounded-md" max="<?php echo $max_dob ?>" title="You must be at least 10 years old" required />
        </div>
        <div class="flex flex-col text-left mb-1 w-1/5">
          <label for="tel">Telephone</label>
          <input type="tel" name="tel" id="tel" class="py-2 px-3 rounded-md" placeholder="Enter your phone number" />
        </div>
      </div>
      <div class="grid grid-cols-2 place-content-center gap-x-3 mb-4">
        <div class="place-self-end self-center">
          <label for="email">Enter your email</label>
        </div>
        <div class="w-[40%]">
          <input class="w-full py-2 px-3 rounded-md" type="text" name="email" pattern="^[a-z._\-0-9]*[@][a-z]*.(?:...com)$" placeholder="Email" required />
        </div>
      </div>
      <div class="grid grid-cols-2 place-content-center gap-x-3 mb-4">
        <div class="place-self-end self-center">
          <label for="pass1">Enter your password</label>
        </div>
        <div class="w-[40%]">
          <input class="w-full py-2 px-3 rounded-md" type="password" name="passwd0" id="passwd0" placeholder="Password" title="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required />
        </div>
      </div>
      <div class="grid grid-cols-2 place-content-center gap-x-3 mb-4">
        <div class="place-self-end self-center">
          <label for="pass2">Re-type your password</label>
        </div>
        <div class="w-[40%]">
          <input class="w-full py-2 px-3 rounded-md" type="password" name="passwd" id="passwd" placeholder="Re-type password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" oninput="validate_passwd()" required />
          <p class="text-red-600" id="error-msg"></p>
        </div>
      </div>
      <div class="my-3">
        <input class="py-2 bg-blue-400 px-7 rounded-md cursor-pointer" type="submit" name="submit" id="submit" value="Register" />
      </div>
    </form>
    <div>
      Already have an account?
      <a class="text-blue-800" href="./../login">Sign in</a>.
    </div>
  </div>

  <script src="./../assets/js/validate_passwd.js"></script>
</body>

</html>
