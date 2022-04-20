<?php include("server.php") ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="utf-8">
    <title> COMMENTS </title>
  </head>
  <body>

    <style>
        body { background-color: #328f8a; }
      </style>
     <div class="login-page">
 <div class="form">
  <div class="comment-header">
              <h3>Add a Comment!</h3>
            </div>
          <div class="container mt-5">

            <form method="GET">

              <label for="sentiment">Rating:</label>
                <select name="sentiment" id="sentiment">
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>
              
              <div>
                <textarea name="comment" placeholder="You can say nice post, list why you didn't like the post, or ask any questions you may have. Speak your mind! :) "></textarea>
              </div>

              

                <button class="btn btn-dark">Add Comment</button>
              
        
            </form>
              <style>
            h1 {margin-top: 20px; margin-bottom: 20px; text-align-last: center;}
            label{text-align-last: center;}
            select{margin-bottom: 20px; text-align-last: center;}
            form{text-align: center;}
            textarea{margin: 20px 0 20px 0; width:100%; height:100px}
            a{text-decoration: none;}
            button{
            margin-bottom:1%;
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