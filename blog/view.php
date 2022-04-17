<?php

    include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog using PHP & MySQL</title>
</head>
<body>

   <div class="container mt-5">

        <?php foreach($query as $q){?>
            <div>
                <h1><?php echo $q['subject'];?></h1>

                <div>
                    <a href="edit.php?id=<?php echo $q['id']?>" class="button" name="edit">Edit</a>
                    <form method="POST">
                        <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                        <button class="button" name="delete">Delete</button>
                    </form>
                </div>

            </div>
            <p><?php echo $q['description'];?></p>
        <?php } ?>    

        <a href="index.php" class="button">Go Home</a>
   </div>
</body>
</html>