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
   <div>

        <?php foreach($query as $q){?>
            <div>
                <!-- Get Blog Subject -->
                <h1><?php echo $q['subject'];?></h1>

                <style>
                h1{text-align: center;}
                </style>         

                <div>

                <!-- Get Username and Blog ID -->
                    <p>Created By: </p>
                    <p><?php echo $q['username'], " Blog ID: ",  $q['blogid']?></p>

                </div>

                    <?php
                        $loggedInUser = $_SESSION['username'];
                        $blogUser = $q['username'];
                    ?>

                <form method="POST">
            <!-- Follow Will dissapear if logged in user accesses their own blog -->
            <input name="follow" class="button" name="follow" type="submit" value="Follow" onclick="this.style.display='none'"<?php if($blogUser == $loggedInUser){?> style="display:none;" <?php } ?>>
                
                </form>

                <?php
                if(isset($_POST['follow'])){
                if($loggedInUser != $blogUser){
                    $sql = "INSERT INTO follower(follower, following) VALUES ('$loggedInUser', '$blogUser')";
                    mysqli_query($db, $sql);
                }   
            }
                ?>

            </div>

            <div class="container"><p><?php echo $q['description'];?></p></div>
            
            <?php } ?>
        
      <?php foreach ($query1 as $q) {?>
        <div class="space">
        <label>Comments:</label>
        <div class="commentContainer"><p><?php echo $q['comment']; ?></p></div>
      </div>
        <?php } ?>
        <div><button class="button"><a href="comment.php?blogid=<?php echo $q['blogid']?>">Add a Comment</a></button></div>


        <div><button class="button"><a href="index.php" class="button">Go Home</a></button></div>
    
   </div>

        <style>
            p{
            line-height: 2;
            text-align: center;
            padding-left: 400px;
            padding-right: 400px
            }
            .container{
            position:relative;
            margin-left:200px;
            margin-right:200px;
            padding-bottom: 500px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            }
            .space{
            line-height: 2
            }
            .commentContainer{
                position:relative;
                margin-left:200px;
                margin-right:200px;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            }            
            a{
                text-decoration:none;
                color:black;
            }
     button{
            position:relative;
            left:48%;
            margin:center;
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
        input{
            position:relative;
            left:48%;
            margin:center;
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
        input::before,
        input::after{
            position: absolute;
            content: "";
            z-index: -1;
        }
        .input:hover {
            background: #5CDEFF;
            box-shadow: 0 0 5px #5CDEFF, 0 0 25px #5CDEFF, 0 0 50px #5CDEFF, 0 0 200px #5CDEFF;
        }
        </style>
</body>
</html>