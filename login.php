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
    <title>login</title>
</head>
<style>body {background-image: url("pexels-photo.jpg")}</style>
<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
            <style>h2 {text-align: center; }</style>
</div>
<form autocomplete="off" action="login.php" method="post">
    <?php include('errors.php') ?>
    <style>form {text-align: center}</style>
    <style>input{margin: 25px 25px 25px 25px}</style>
    <div>

        <label for="username">Username: </label>
        <input type="text" name="username" required>

    </div>
    <div>
        
        <label for="password1">Password:  </label>
        <input type="text" name="password1" required>

    </div>
    <button class="button" id="button" type="submit" name="login_user">Submit</button>
    <style>
        button{
            position:relative;
            border: solid;    
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
    

    <p>Not A User? <a href="registration.php"><b>Register Here</b></a></p>
</form>
<form action='' method='POST'>
<input id="btn "class="btn" type='submit' value='Initialize Database'name='Database_Initialization'>
<style>
        .btn{
            border: solid;    
            border-color: #5CDEFF;
            border-radius: 10px;
            position:relative;
            border-color: #5CDEFF;
            border-radius: 10px;
            transition: .4s ease-in;
            z-index: 1;
            font-size: 16px;
            background-color: white;
            color: black;
        }
        .btn::before,
        .btn::after{
            position: absolute;
            content: "";
            z-index: -1;
        }
        .btn:hover {
            background: #5CDEFF;
            box-shadow: 0 0 5px #5CDEFF, 0 0 25px #5CDEFF, 0 0 50px #5CDEFF, 0 0 200px #5CDEFF;
        }

    </style>

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
