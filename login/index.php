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
    <div class="bg-gray-100 h-screen text-center flex flex-col pt-60">
      <h2 class="font-semibold text-3xl mb-5">Login</h2>
      <form action="" method="post" name="login" id="login">
        <div class="mb-4">
          <input
            type="text"
            name="email"
            id="email"
            placeholder="Email"
            required
            class="py-2 px-3 w-1/5 rounded-md"
          />
        </div>
        <div>
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password"
            class="py-2 px-3 w-1/5 rounded-md"
            required
          />
        </div>
        <div class="my-3">
          <input
            type="submit"
            name="submit"
            id="submit"
            class="py-2 bg-blue-400 px-7 rounded-md"
            value="Sign in"
          />
        </div>
      </form>
      <div>
        New here?
        <a class="text-blue-800" href="./../register">Register</a> with us.
      </div>
    </div>
  </body>
</html>