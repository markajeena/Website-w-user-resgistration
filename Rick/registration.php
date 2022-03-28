<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
  <style>
      body { background-color: rgba(0, 128, 0, 0.3) }
    </style>
    <div class="container">

        <div class="header">

          <h2>Register</h2>
        </div>

        <form action="registration.php" method= "post">
          <?php include('errors.php') ?>

          <div>

              <label for="username"> Username: </label>
              <input type="text" name="username" required>

          </div>

          <div>

              <label for="password"> Password: </label>
              <input type="password" name="password" required>

          </div>

          <div>

              <label for="password"> Confirm Pasword: </label>
              <input type="password" name="password_1" required>

          </div>

          <div>

              <label for="firstname"> First Name: </label>
              <input type="firstname" name="firstname" required>

          </div>

          <div>

              <label for="lastname"> Last Name: </label>
              <input type="lastname" name="lastname" required>

          </div>

          <div>

              <label for="email"> Email: </label>
              <input type="email" name="email" required>

          </div>

          <button type= "submit" name= "reg_user"> Submit </button>

          <p> Already signed up? <a href="login.php"> <b> Login </b> </a></p>
        </form>

    </div>

  </body>
</html>
