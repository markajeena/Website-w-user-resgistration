<?php include('database.php');
ini_set("display_errors", "off");//removes warnings and errors msgs
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
            <form method='GET'>
            <?php 
            $sql = "SELECT tag FROM tags";
            $query = mysqli_query($db, $sql);
            if(mysqli_num_rows($query) > 0){
               $options = mysqli_fetch_all($query);
            }
               ?>
            <div>
               <label>Tag 'x' :</label>
                  <select name="input1" id="input1">
                     <?php 
                     foreach($query as $o){
                           ?>
                           <option><?php echo $o['tag'];?></option>
                           <?php } ?>
                  </select>
               Compared with
               <label>Tag 'y' :</label>
               <select name="input2" id="input2">
                     <?php 
                     foreach($query as $q){
                           ?>
                           <option><?php echo $q['tag'];?></option>
                           <?php } 
                           ?>
                  </select>
                  <input type="submit" name="submit" value="INPUT">
                  </form>
            </div>

            <?php 
            $input1 = $_GET['input1'];
            $input2 = $_GET["input2"];
            $sql = "SELECT username, COUNT(username) FROM blog GROUP BY username HAVING COUNT(username)>=2 AND username IN (SELECT username FROM blog WHERE blogid IN (SELECT blogid FROM tags WHERE tag = '$input2') OR blogid IN (SELECT blogid FROM tags WHERE tag = '$input1'))";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                <a></a>
            <p>List all the blogs of user X, such that all the comments are positive for these blogs:</p><br>
            
            <div>
            <form method='GET'>
            <?php 
            $sql = "SELECT username FROM user";
            $query = mysqli_query($db, $sql);
            if(mysqli_num_rows($query) > 0){
               $options = mysqli_fetch_all($query);
            }
               ?>
            <div>
               <label>Username 'x' :</label>
                  <select name="inp1" id="inp1">
                     <?php 
                     foreach($query as $o){
                           ?>
                           <option><?php echo $o['username'];?></option>
                           <?php } ?>
                  </select>
                  <input type="submit" name="submit" value="INPUT">
            <?php 
            $inp1 = $_GET['inp1'];
            $sql = "SELECT * FROM blog WHERE blogid IN (SELECT blogid FROM comment GROUP BY blogid HAVING COUNT(*)=SUM(sentiment)) AND username='$inp1'"; 
            $query = mysqli_query($db,$sql);
            ?>

                   <?php 
                   foreach($query as $q){ ?>
                      <div><a><?php echo $q['username'], " - ", "Blog ID: ",$q['blogid']; ?></a></div>
                   <?php } ?>
                

            <p>List the users who posted the most number of blogs on 5/1/2022; if there is a tie, list all the users who have a tie:</p><br>
            <?php $sql = "SELECT username, COUNT(username) FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blogDate = '2022-05-01' ) GROUP BY username HAVING COUNT(username) =( SELECT MAX(mycount) FROM ( SELECT username, COUNT(username) mycount FROM blog WHERE blogid IN( SELECT blogid FROM blog WHERE blogDate = '2022-05-01' ) GROUP BY username ) AS maxcount )";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                      <div><a><?php echo $q['COUNT(username)']; ?></a></div>
                   <?php } ?>
                

            <p>List the users who are followed by both X and Y. Usernames X and Y are inputs from the user:</p><br>
            
            <div>
            <form method='GET'>
            <?php 
            $sql = "SELECT username FROM user";
            $query = mysqli_query($db, $sql);
            if(mysqli_num_rows($query) > 0){
               $options = mysqli_fetch_all($query);
            }
               ?>
            <div>
               <label>Username 'x' :</label>
                  <select name="in1" id="in1">
                     <?php 
                     foreach($query as $o){
                           ?>
                           <option><?php echo $o['username'];?></option>
                           <?php } ?>
                  </select>
               Compared with
               <label>Username 'y' :</label>
               <select name="in2" id="in2">
                     <?php 
                     foreach($query as $q){
                           ?>
                           <option><?php echo $q['username'];?></option>
                           <?php } 
                           ?>
                  </select>
                  <input type="submit" name="submit" value="INPUT">
                  </form>
            <?php            
           $in1 = $_GET['in1'];
           $in2 = $_GET["in2"];
            $sql = "SELECT DISTINCT following FROM `follower` WHERE following IN (SELECT following FROM `follower` WHERE follower='$in1') AND following IN (SELECT following FROM `follower` WHERE follower='$in2');";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['following']; ?></a></div>
                   <?php } ?>
                <a></a>

            <p>List a user pair (A, B) such that they have at least one common hobby:</p><br>
            <?php $sql = "SELECT h1.username, h1.hobby FROM hobby AS h1, hobby AS h2 WHERE h1.hobby=h2.hobby AND h1.username <> h2.username";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username'],"-", $q['hobby']; ?></a></div>
                   <?php } ?>
                

            <p>Display all the users who never posted a blog:</p><br>
            <?php $sql = "SELECT username FROM user WHERE username NOT IN (SELECT username FROM blog)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                

            <p>Display all the users who never posted a comment:</p><br>
            <?php $sql = "SELECT username FROM user WHERE username NOT IN (SELECT username FROM comment)";
                   $query = mysqli_query($db,$sql); ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                

            <p>Display all the users who posted some comments, but each of them is negative:</p><br>
            <?php 
            $sql = "SELECT username FROM user WHERE username IN (SELECT username FROM comment GROUP BY username HAVING 0=SUM(sentiment))"; 
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                

            <p>Display those users such that all the blogs they posted so far never received any negative comments:</p><br>
            <?php 
            $sql = "SELECT *, COUNT(username) positiveblogs FROM blog WHERE blogid IN (SELECT blogid FROM comment GROUP BY blogid HAVING COUNT(comment)=SUM(sentiment)) OR blogid NOT IN (SELECT blogid FROM comment) GROUP BY username"; 
            $query = mysqli_query($db,$sql);
            ?>
                   <?php foreach($query as $q){ ?>
                      <div><a><?php echo $q['username']; ?></a></div>
                   <?php } ?>
                

            <button><a href="index.php"> Go Home</a></button>
        </body>


</html>
