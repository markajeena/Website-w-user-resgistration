<?php include('server.php');?>

<!DOCTYPE html>
<html>

    <head>
        <title>QUERIES</title>
    </head>


        <body>

          <style>
            body { background-color: rgba(0, 128, 0, 0.3) }
          </style>

          <div class="container mt-5">
            <form action="queries.php" method="GET">

              <p>List All Users who have at least two blogs, Where one has Tag <input type="text" name="tag_1" placeholder=" 'X' "> and One has Tag <input type="text" name="tag_2" placeholder=" 'Y' ">  <input type="submit"></p>
            </form>

              <?php
                  error_reporting(E_ERROR | E_PARSE);
                    $x = $_REQUEST["tag_1"];
                    $y = $_REQUEST["tag_2"];
                    $need_x = true;
                    $need_y = true;
                    $lastid = null;
                    $sql = "SELECT * FROM blog WHERE user_id IN (SELECT user_id FROM blog GROUP BY user_id HAVING COUNT(user_id) >= 2)";
                    $query = mysqli_query($db,$sql);

                    foreach($query as $q){
                      $blogid = $q['blogid'];
                      $currentid = $q['user_id'];

                      if($currentid != $lastid){
                        $need_x = true;
                        $need_y = true;
                      }

                      $sql = "SELECT tag FROM tag WHERE blog_id  = '$blogid'";
                      $query2 = mysqli_query($db,$sql);

                        foreach($query2 as $q2){

                          if($q2['tag'] == $x && $need_x){
                            $need_x = false;
                            break;
                          }

                          if($q2['tag'] == $y && $need_y){
                            $need_y = false;
                            break;
                          }
                        }

                      if(!$need_x && !$need_y){
                      ?>
                      <p> User ID: <?php echo $q['user_id'];
                          $need_x = true;
                          $need_y = true;
                      ?> <p>
              <?php
                      }

                  $lastid = $q['user_id'];
                  } ?>
  <form action="queries.php" method="GET">
              <p>List all the blogs of user <input type="text" name="user" placeholder=" 'X' ">, such that all the comments are positive for these blogs  <input type="submit"> </p><br>
              </form>

              <?php // querie 2
              $x = $_REQUEST["user"];

              $sql = "SELECT * FROM blog WHERE blogid IN (SELECT blog_id FROM comment GROUP BY blog_id HAVING COUNT(*)=SUM(sentiment))";
              $query = mysqli_query($db,$sql);

              $sql = "SELECT * FROM blog WHERE blogid IN (SELECT blog_id FROM comment GROUP BY blog_id HAVING COUNT(*)=SUM(sentiment))";
              $query = mysqli_query($db,$sql);
              ?>
                     <?php foreach($query as $q){
                       $blogid = $q['blogid'];
                       ?>
                        <div>Blog ID: <?php echo $q['blogid']; ?></div>
                     <?php } ?>


              <p>List the users who posted the most number of blogs on 5/1/2022; if there is a tie, list all the users who have a tie:</p><br>
              <?php $sql = "SELECT user_id, COUNT(user_id) FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blog_date = '2022-05-01' ) GROUP BY user_id HAVING COUNT(user_id) =( SELECT MAX(mycount) FROM ( SELECT user_id, COUNT(user_id) mycount FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blog_date = '2022-05-01' ) GROUP BY user_id ) AS maxcount )";
                     $query = mysqli_query($db,$sql); ?>
                     <?php foreach($query as $q){ ?>
                        <div><a><?php echo $q['user_id']; ?></a></div>
                        <div><a><?php echo $q['COUNT(user_id)']; ?></a></div>
                     <?php } ?>


              <p>List the users who are followed by both X and Y. Usernames X and Y are inputs from the user:</p><br>

              <?php
              //this works for follower table just need to set up user input and replace the direct variable calls for this  *******this one********************************************************************and this one
              $sql = "SELECT DISTINCT followingid FROM `follower` WHERE followingid IN (SELECT followingid FROM `follower` WHERE followerid='1') AND followingid IN (SELECT followingid FROM `follower` WHERE followerid='2');";
                     $query = mysqli_query($db,$sql); ?>
                     <?php foreach($query as $q){ ?>
                        <div><a><?php echo $q['following']; ?></a></div>
                     <?php } ?>


              <p>List a user pair (A, B) such that they have at least one common hobby:</p><br>
              <?php $sql = "SELECT h1.user_id FROM hobbies AS h1, hobbies AS h2 WHERE h1.hobby=h2.hobby AND h1.user_id <> h2.user_id";
                     $query = mysqli_query($db,$sql); ?>
                     <?php foreach($query as $q){ ?>
                        <div>User ID: <a><?php echo $q['user_id']; ?></a></div>
                     <?php } ?>


              <p>Display all the users who never posted a blog:</p><br>
              <?php $sql = "SELECT userid FROM user WHERE userid NOT IN (SELECT user_id FROM blog)";
                     $query = mysqli_query($db,$sql); ?>
                     <?php foreach($query as $q){ ?>
                        <div>User ID: <a><?php echo $q['userid']; ?></a></div>
                     <?php } ?>


              <p>Display all the users who never posted a comment:</p><br>
              <?php $sql = "SELECT userid FROM user WHERE userid NOT IN (SELECT user_id FROM comment)";
                     $query = mysqli_query($db,$sql); ?>
                     <?php foreach($query as $q){ ?>
                        <div>User ID: <a><?php echo $q['userid']; ?></a></div>
                     <?php } ?>


              <p>Display all the users who posted some comments, but each of them is negative:</p><br>
              <?php
              $sql = "SELECT userid FROM user WHERE userid IN (SELECT user_id FROM comment GROUP BY user_id HAVING 0=SUM(sentiment))";
              $query = mysqli_query($db,$sql);
              ?>
                     <?php foreach($query as $q){ ?>
                        <div><a> <?php echo $q['user_id']; ?></a></div>
                     <?php } ?>


              <p>Display those users such that all the blogs they posted so far never received any negative comments:</p><br>
              <?php
              $sql = "SELECT blog_id FROM comment GROUP BY blog_id HAVING COUNT(*)=SUM(sentiment)";
              $query = mysqli_query($db,$sql); ?>

                     <?php foreach($query as $q){
                            $blogid = $q['blog_id'];
                            $sql = "SELECT DISTINCT user_id FROM blog WHERE blogid = '$blogid'";
                            $query1 = mysqli_query($db,$sql);

                            $result = $query1->fetch_array();
                            $userid = $result[0];

                       ?>
                        <div><a><?php echo $userid; ?></a></div>
                     <?php } ?>
          </div>


            <button><a href="index.php"> Go Home </a></button>
        </body>


</html>
