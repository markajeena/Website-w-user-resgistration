<?php include('database.php');
$login_user=true; 
if(count($errors)>2)
{
    $errors=array();
}
?>
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
    <button type="submit" name="login_user">Submit</button>
    <button type="button" name="Database_Initialization" value="1">Initialize Database</button>

    <p>Not A User? <a href="registration.php"><b>Register Here</b></a></p>
</form>
</div>
</body>
</html>
<?php    
        if(isset($_POST['Database_Initialization'])){
    $con = mysqli_connect('localhost','root','','user_registration') or die("No Connection to the Database");
     // Load and explode the sql file
     $f = fopen('university.sql',"r+");
     $sqlFile = fread($f,filesize('university.sql'));
     $sqlArray = explode(';',$sqlFile);
           
     //Process the sql file by statements
     foreach ($sqlArray as $stmt) {
       if (strlen($stmt)>3){
            $result = mysqli_query($con, $stmt);
           }
      }
    }
?>
