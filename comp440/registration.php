<?php include('database.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>

</div>
<form action="registration.php" method="post">
    <?php include('error.php') ?>
<div>
        
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" required>

        
        <label for="lastname">Last Name: </label>
        <input type="text" name="lastname" required>

    </div>
    <div>
        
        <label for="email">Email: </label>
        <input type="text" name="email" required>

    </div>    
    <div>

        <label for="username">Username: </label>
        <input type="text" name="username" required>

    </div>
    <div>
        
        <label for="password">Password :  </label>
        <input type="text" name="password"required>

    </div>
    <button type="submit" name="register_user">Submit</button>

    <p>Already a user? <a href="login.php"><b>Log In</b></a></p>
</form>
</div>
</body>
</html>
