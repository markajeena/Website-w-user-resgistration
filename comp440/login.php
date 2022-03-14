<?php include('database.php') ?>
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
<form action="login.php" method="post">

    <div>

        <label for="username">Username: </label>
        <input type="text" name="username" required>

    </div>
    <div>
        
        <label for="password1">Password :  </label>
        <input type="text" name="password1" required>

    </div>
    <button type="submit" name="login_user">Submit</button>

    <p>Not A User? <a href="registration.php"><b>Register Here</b></a></p>
</form>
</div>
</body>
</html>
