<?php include("server.php") ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Comments </title>
  </head>
  <body>

    <style>
        body { background-color: rgba(0, 128, 0, 0.3) }
      </style>

          <div class="container mt-5">

            <form method="GET">

              <label for="sentiment">Rating:</label>
                <select name="sentiment" id="sentiment">
                  <option value="positive">positive</option>
                  <option value="negative">negative</option>
                </select>

              <div>
                <textarea name="comment" class="form-control bg-dark text-white my-3"></textarea>
              </div>

                <button class="btn btn-dark">Add Comment</button>
        
            </form>
          </div>


  </body>
</html>
