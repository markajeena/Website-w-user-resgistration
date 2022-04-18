<<?php include('server.php') ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
  </head>
  <body>
    <style>
        body { background-color: rgba(0, 128, 0, 0.3) }
      </style>
    <div class="container">

        <div class="header">

          <h2>Login</h2>

        </div>

        <form action="login.php" method= "post">

          <div>

              <label for="username"> Username: </label>
              <input type="text" name="username" required>

          </div>

          <div>

              <label for="password"> Password: </label>
              <input type="password" name="password" required>

          </div>


          <button type= "submit" name="login"> Login </button>

          <p> New Here? <a href="registration.php"> <b> Register Now </b> </a></p>
        </form>

        </form>
<form action='' method='POST'>
<input type='submit' value='Initialize Database'name='Database_Initialization'>
</form>
    </div>

  </body>
</html>>
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

