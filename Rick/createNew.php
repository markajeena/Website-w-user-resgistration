<?php include ("server.php")?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <title> NEW POST</title>
  </head>
  <body>

    <style>
      body { background-color: rgba(0, 128, 0, 0.3) }
    </style>
    <div class="login-page">
    <div class="form">
  <div class="create-header">
              <h3>Create a Blog Post!</h3>
            </div>

    <div class="container mt-5">
      <form method="GET">

        <div>
    
          <input type="text" name="subject" placeholder="Title/Subject" class ="form-control bg-dark text-white my-3 text-center">
        </div>

        <div>
          <textarea name="description" placeholder="Type in a description for your post!" class="form-control bg-dark text-white my-3"></textarea>
        </div>

        <div>
           
          <input type="text" name="new_post" placeholder="Tags (i.e. Fun,Data,...)" class ="form-control bg-dark text-white my-3 text-center">
        </div>

        <div>
          <button class="btn btn-dark">Add Post</button>
        </div>

      </form>
      <style>
            h1 {margin-top: 20px; margin-bottom: 20px; text-align-last: center;}
            label{text-align-last: center;}
            select{margin-bottom: 20px; text-align-last: center;}
            form{text-align: center;}
            textarea{margin: 20px 0 20px 0; width:100%; height:100px}
            a{text-decoration: none;}
            button{
            margin-top: 20px; margin-bottom: 20px;
            position: relative;
            font-size: 12px;
            background-color: white;
            color: black;
            }
            
            </style>
    </div>


    </div>
    </div>
  </body>
</html>