<?php

    include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Blog</title>
</head>
<body>
<style>body{background-image: url('pexels-photo.jpg')}</style>
   <div class="container">

        <?php foreach($query as $q){?>
            <div>
                <h1><?php echo $q['subject'];?></h1>
                <!--<div><button class="button" name="delete">Delete</button></div>-->

                <style>
                h1{text-align: center;}
                </style>                
                <div>
                    <!-- <a href="edit.php?id=<#?php echo $q['id']?>" class="button" name="edit">Edit</a> -->
                    <form method="POST">
                        <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                    </form>
                </div>

            </div>
            <div><p><?php echo $q['description'];?></p></div>
            <style>
                p{
                    line-height: 2;
                    text-align: center;
                    padding-left: 500px;
                    padding-right: 500px}
            </style>
        <?php } ?>
        
      <?php foreach ($query1 as $q) {?>
        <label>Comments:</label>
        <p><?php echo $q['comment']; ?></p>

        <?php } ?>
        <div><button class="button"><a href="comment.php?blogid=<?php echo $q['blogid']?>">Add a Comment</a></button></div>


        <div><button class="button"><a href="index.php" class="button">Go Home</a></button></div>
    
   </div>

        <style>
            a{
                text-decoration:none;
                color:black;
            }
     button{
            position:relative;
            left:48%;
            margin:auto;
            margin-bottom: 1%;
            text-align:center;
            position:relative;
            border: solid;    
            border-color: #5CDEFF;
            border-radius: 10px;
            transition: .4s ease-in;
            z-index: 1;
            font-size: 16px;
            background-color: transparent;
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
        label{
            margin:auto;
            margin-left:49%;
            text-align:center;
        }
        </style>
</body>
</html>