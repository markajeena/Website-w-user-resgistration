<?php include('database.php');
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Check All Information</title>
    </head>


        <body>

            <style>body{background-image:url('pexels-photo.jpg');} h1{text-align: center;} p{line-height:2; font-weight: bold} a{line-height:2;}</style>

            <h1>Database Information</h1>

            <p>List All Users who have at least two blogs, Where one has Tag 'x' and One has Tag 'y':</p><br>
            <?php $sql = "SELECT username FROM blog GROUP BY username HAVING COUNT(username) >= 2";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>
            <p>List all the blogs of user X, such that all the comments are positive for these blogs:</p><br>
            <?php 
            $sql = "SELECT * FROM blog WHERE blogid IN (SELECT blogid FROM comment GROUP BY blogid HAVING COUNT(*)=SUM(sentiment))"; 
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['blogid']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List the users who posted the most number of blogs on 5/1/2022; if there is a tie, list all the users who have a tie:</p><br>
            <?php $sql = "SELECT username, COUNT(username) FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blogDate = '2022-05-01' ) GROUP BY username HAVING COUNT(username) =( SELECT MAX(mycount) FROM ( SELECT username, COUNT(username) mycount FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blogDate = '2022-05-01' ) GROUP BY username ) AS maxcount )";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                      <div><a><?php echo $q['COUNT(username)']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List the users who are followed by both X and Y. Usernames X and Y are inputs from the user:</p><br>
            
            <?php 
            //this works for follower table just need to set up user input and replace the direct variable calls for this  *******this one********************************************************************and this one
            $sql = "SELECT DISTINCT following FROM `follower` WHERE following IN (SELECT following FROM `follower` WHERE follower='comp440') AND following IN (SELECT following FROM `follower` WHERE follower='comp442');";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['following']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List a user pair (A, B) such that they have at least one common hobby:</p><br>
            <?php $sql = "SELECT h1.username FROM hobby AS h1, hobby AS h2 WHERE h1.hobby=h2.hobby AND h1.username <> h2.username";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display all the users who never posted a blog:</p><br>
            <?php $sql = "SELECT username FROM user WHERE username NOT IN (SELECT username FROM blog)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>Display all the users who never posted a comment:</p><br>
            <?php $sql = "SELECT username FROM user WHERE username NOT IN (SELECT username FROM comment)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
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
            $sql = "SELECT username FROM blog WHERE blogid IN (SELECT blogid FROM comment GROUP BY blogid HAVING COUNT(*)=SUM(sentiment))"; 
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>

            <button><a href="index.php"> Go Home</a></button>
        </body>


</html>
