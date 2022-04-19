<?php include('database.php');
$login_user=NULL; 
if(count($errors)>=6)
{
    $errors=array();
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
<style>h2 { text-align: center}</style>
</div>
<form autocomplete="off" action="registration.php" method="post">
    <?php include('errors.php') ?>
    <style>body {background-image: url("pexels-photo.jpg")}form { text-align: left; margin-left: 45%} input {margin: 25px 25px 25px 25px}</style>
<div>
        
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" required>

</div>
<div>    
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
        
        <label for="password1">Password :  </label>
        <input type="text" name="password1"required>

    </div>
    <div>
        
        <label for="password2">Confirm Password : </label>
        <input type="text" name="password2"required>

    </div>

    <button class="button" id="button" type="submit" name="register_user" >Submit</button>
    <style>
        button{
            margin-left: 5%;
            border-color: #5CDEFF;
            border-radius: 10px;
            transition: .4s ease-in;
            z-index: 1;
            font-size: 16px;
            background-color: white;
            color: black;
        }
        button::before,
        button::after{
            position: absolute;
            content: "";
            z-index: -1;
        }
        .button:hover {
            background: #5CDEFF;
            box-shadow: 0 0 5px #5CDEFF, 0 0 25px #5CDEFF, 0 0 50px #5CDEFF, 0 0 200px #5CDEFF;
        }

    </style>
    <p>Already a user? <a href="login.php"><b>Log In</b></a></p>
</form>
</div>
</body>
</html>
