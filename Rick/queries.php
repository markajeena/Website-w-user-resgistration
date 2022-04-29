<?php include('server.php');?>

<!DOCTYPE html>
<html>

    <head>
        <title>QUERIES</title>
    </head>


        <body>
            <p>List All Users who have at least two blogs, Where one has Tag 'x' and One has Tag 'y':</p><br>
            <?php $sql = "SELECT user_id FROM blog GROUP BY user_id HAVING COUNT(user_id) >= 2";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><?php echo $q['user_id']; ?></div>
                   <?php } ?>

            <p>List all the blogs of user X, such that all the comments are positive for these blogs:</p><br>
            <?php
            $sql = "SELECT * FROM blog WHERE blogid IN (SELECT blog_id FROM comment GROUP BY blog_id HAVING COUNT(*)=SUM(sentiment))";
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><?php echo $q['blogid']; ?></div>
                   <?php } ?>
                <a></a>

            <p>List the users who posted the most number of blogs on 5/1/2022; if there is a tie, list all the users who have a tie:</p><br>
            <?php $sql = "SELECT user_id, COUNT(user_id) FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blog_date = '2022-05-01' ) GROUP BY user_id HAVING COUNT(user_id) =( SELECT MAX(mycount) FROM ( SELECT user_id, COUNT(user_id) mycount FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blog_date = '2022-05-01' ) GROUP BY user_id ) AS maxcount )";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['user_id']; ?></a></div>
                      <div><a><?php echo $q['COUNT(user_id)']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List the users who are followed by both X and Y. Usernames X and Y are inputs from the user:</p><br>

            <?php
            //this works for follower table just need to set up user input and replace the direct variable calls for this  *******this one********************************************************************and this one
            $sql = "SELECT DISTINCT followingid FROM `follower` WHERE followingid IN (SELECT followingid FROM `follower` WHERE followerid='1') AND followingid IN (SELECT followingid FROM `follower` WHERE followerid='2');";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['following']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List a user pair (A, B) such that they have at least one common hobby:</p><br>
            <?php $sql = "SELECT h1.user_id FROM hobbies AS h1, hobbies AS h2 WHERE h1.hobby=h2.hobby AND h1.user_id <> h2.user_id";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display all the users who never posted a blog:</p><br>
            <?php $sql = "SELECT userid FROM user WHERE userid NOT IN (SELECT user_id FROM blog)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['userid']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display all the users who never posted a comment:</p><br>
            <?php $sql = "SELECT userid FROM user WHERE userid NOT IN (SELECT user_id FROM comment)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['userid']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display all the users who posted some comments, but each of them is negative:</p><br>
            <?php
            $sql = "SELECT username FROM user WHERE username IN (SELECT username FROM comment GROUP BY username HAVING 0=SUM(sentiment))";
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display those users such that all the blogs they posted so far never received any negative comments:</p><br>
            <?php
            $sql = "SELECT user_id FROM blog WHERE blogid IN (SELECT blogid FROM comment GROUP BY blogid HAVING COUNT(*)=SUM(sentiment))";
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <button><a href="index.php"> Go Home </a></button>
        </body>


</html>
