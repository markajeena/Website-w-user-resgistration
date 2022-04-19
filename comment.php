<?php include("database.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Comments </title>
    <h1>Add Comment</h1>
    <style>h1{text-align: center;}</style>
  </head>
  <body>

    <style>
        body { background-image: url('pexels-photo.jpg') }
      </style>

          <div class="container">

            <form method="GET">

              <label for="sentiment">Rating:</label>
                <select name="sentiment" id="sentiment">
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>

              <div>
                <textarea name="comment" placeholder="Add Comment..."></textarea>
              </div>

                <button class="button">Add Comment</button>
                <div><button class="button"><a href="index.php"> Go Home </a></button></div>
            </form>

            <style>
            label{float: left}
            select{margin-bottom: 30px; float: left}
            form{text-align: center;}
            textarea{margin: 10px 0 10px 0; width:100%; height:200px}
            button{
            margin-bottom:1%;
            position: relative;
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
          </div>


  </body>
</html>