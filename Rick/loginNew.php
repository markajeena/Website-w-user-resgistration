<<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css" />
    <title>LOGIN</title>
  </head>
  <body>
    <body>
      <div class="login-page">
        <div class="form">
          <div class="login">
            <div class="login-header">
              <h3>LOGIN</h3>
              <p>Please enter your credentials to login.</p>
            </div>
          </div>
          <form autocomplete="off" action="login.php" method="post">
            <?php include('errors.php') ?>

            <input type="text" name="username" placeholder="Username" required />
            <input type="text" name="password1" placeholder="Password" required />
            <button type="submit" name="login_user">Submit</button>
            &nbsp;
            <button type="button" name="Database_Initialization" value="1">
              Initialize Database
            </button>
            <p>
              Not A User? <a href="registration.html"><b>Register Here</b></a>
            </p>
          </form>
        </div>
      </div>
    </body>
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