<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <title>REGISTER</title>
  </head>
  <body>
    <body>
      <div class="login-page">
        <div class="form">
          <div class="login">
            <div class="login-header">
              <h3>REGISTER</h3>
              <p>Please enter your credentials to register.</p>
            </div>
          </div>
          <form autocomplete="off" action="login.php" method="post">
            <?php include('errors.php') ?>

            <input
              type="text"
              name="username"
              placeholder="Username"
              required
            />
            <input
              type="text"
              name="password"
              placeholder="Password"
              required
            />
            <input type="text" name="password1" placeholder="Confirm Password" required />
            <input type="text" name="firstname" placeholder="First name" required />
            <input
              type="text"
              name="lastname"
              placeholder="Last name"
              required
            />
            <input
              type="text"
              name="email"
              placeholder="Email"
              required
            />
            <button type="submit" name="register_user">Submit</button>

            <p>
              Already a User? <a href="login.php"><b>Log in</b></a>
            </p>
          </form>
        </div>
      </div>
    </body>
  </body>
</html>
</html>
