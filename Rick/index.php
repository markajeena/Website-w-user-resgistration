<?php

session_start();

if(!isset($_SESSION['username'])){

  $_SESSION['msg'] = "Please Sign In to View";
  header('Location: login.php');

}

if(isset($_GET['logout'])){

  session_destroy();
  unset($_SESSION['username']);
  header('Location: login.php');

}
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Welcome! </title>
   </head>
   <body>
     <style>
         body { background-color: rgba(0, 128, 0, 0.3) }
       </style>
     <h1> Now Displaying Current User </h1>

     <?php if(isset($_SESSION['username'])) : ?>

     <h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>

     <button><a href="index.php?logout='1'"></a></button>

   <?php endif ?>

   </body>
 </html>
