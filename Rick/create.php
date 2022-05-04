<?php include ("server.php")?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <title> Create Blog </title>
  </head>
  <body>

    <style>
      body { background-color: rgba(0, 128, 0, 0.3) }
    </style>
     <div class="login-page">
    <div class="form">

    <div class="container mt-5">
      <form method="GET">
  <h3>
    Create a Blog
        </h3>
        <div>
          <input type="text" name="subject" placeholder="subject" class ="form-control bg-dark text-white my-3 text-center">
        </div>

        <div>
          <textarea name="description" class="form-control bg-dark text-white my-3"></textarea>
        </div>

        <div>
          <input type="text" name="new_post" placeholder="Tags (i.e. Fun,Data,...)" class ="form-control bg-dark text-white my-3 text-center">
        </div>

        <div>
          <button class="btn btn-dark">Add Post</button>
        </div>

      </form>
    </div>
    </div>
    </div>


  </body>
</html>
