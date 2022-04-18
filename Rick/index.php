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

<?php include("server.php") ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Home Page </title>
   </head>
   <body>

     <style>
         body { background-color: rgba(0, 128, 0, 0.3) }
       </style>

     <?php if(isset($_SESSION['username'])) : ?>

     <h3>Welcome <strong><?php echo $_SESSION['username'] ?></strong></h3>

     <div class="container mt-5">
        <div class="text-center">
          <a href="create.php"><button>+ Create a new post</button></a>
        </div>

        <?php foreach ($query as $q) {?>
          <div class="card">

            <div>
              <h3><?php echo $q['subject'] ?></h3>
            </div>

            <div class="container">
              <?php echo $q['description'] ?>
            </div>

            <hr size = 3 color = black>
            <a href="view.php?blogid=<?php echo $q['blogid']?>"><button> View Post </button></a>
          </div>


        <?php  } ?>

      </div>

   <?php endif ?>

   </body>
 </html>
