<?php include('database.php');
$login_user=true ?>
<!DOCTYPE html>
<html>
<head>
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>

</div>
<form autocomplete="off" action="login.php" method="post">
    <?php include('errors.php') ?>

    <div>

        <label for="username">Username: </label>
        <input type="text" name="username" required>

    </div>
    <div>
        
        <label for="password1">Password:  </label>
        <input type="text" name="password1" required>

    </div>
    <button type="submit" name="login_user" onclick="<?php include('errors.php') ?>">Submit</button>

    <p>Not A User? <a href="registration.php"><b>Register Here</b></a></p>
</form>
</div>
</body>
</html>
