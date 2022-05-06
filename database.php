<?php session_start();
define('WP_MEMORY_LIMIT', '512M');
//init vars
$username= "";
$email="";
$errors = array();
$login_user=true; 
$subject="";
$description="";
//connect_db
//$db = mysqli_connect('localhost','root','','user_registration') or die("No Connection to the Database");
//marks boof laptop connection
$db = mysqli_connect('localhost:3307','root','','user_registration') or die("No Connection to the Database");

//Registration
//mysqli_real_escape_string() helps against SQL injections 
$username = mysqli_real_escape_string($db, $_POST['username'] ?? "");
$email = mysqli_real_escape_string($db, $_POST['email'] ?? "");
$password1 = mysqli_real_escape_string($db, $_POST['password1'] ?? "");
$firstname = mysqli_real_escape_string($db, $_POST['firstname'] ?? "");
$lastname = mysqli_real_escape_string($db, $_POST['lastname'] ?? "");
$password2 = mysqli_real_escape_string($db, $_POST['password2'] ?? "");
$hobby = mysqli_real_escape_string($db, $_POST['hobby'] ?? "");

if(!isset($_POST['login_user'])){
//form validation
if(empty($username)) {
    array_push($errors, "Username is required");
}
if(empty($email)) {
    array_push($errors, "Email is required");
}
if(empty($lastname)) {
    array_push($errors, "Last Name is required");
}
if(empty($firstname)) {
    array_push($errors, "First Name is required");
}
if(empty($password1)) {
    array_push($errors, "Password is required");
}
if(empty($password2)) {
    array_push($errors, "Confirm Password is required");
}
if(empty($hobby)) {
    array_push($errors, "Hobby is required");
}
//Check for matching Passwords
if($password1 != $password2){
    array_push($errors, "Password Does Not Match");
}

// check db for existing User Name
$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results= mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

//check for username and email availablilty
if($user){
    if($user['username'] === $username){array_push($errors, "Username already exists");
    }
    if($user['email'] === $email){array_push($errors, "This Email has already been registered");
    }

}


//Register the user if there is no error 
if(count($errors) == 0){
    //$password = password_hash($password1,PASSWORD_DEFAULT); //encryption
    //print $password;    


    
    $query = "INSERT INTO user (username, password1, firstname, lastname, email) VALUES ('$username','$password1','$firstname','$lastname','$email')";
    mysqli_query($db, $query);
    
    $_SESSION['username'] = $username;
    $_SESSION['firstname'] = $firstname;
    $_SESSION['success'] = "You are now Logged In";

    $hobby = explode(', ', $_REQUEST['hobby']);    //seperates hobby after a comma
    foreach($hobby as $h){
        $sql = "INSERT INTO hobby(hobby,username) VALUES ('$h', '$username')";
        mysqli_query($db, $sql);
        }

    header("Location:index.php");

}
}

//Login User

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db,$_POST['username'] ?? "");
    $password = mysqli_real_escape_string($db,$_POST['password1'] ?? "");
    $firstname =  mysqli_real_escape_string($db,$_POST['firstname'] ?? "");
    $lastname = mysqli_real_escape_string($db,$_POST['lastname'] ?? "");
    $email = mysqli_real_escape_string($db,$_POST['email'] ?? "");

    if(empty($username)){
        array_push($errors, "Username is requried");
    }
    if(empty($password)){
        array_push($errors, "Password is requried");
    }
    if(count($errors) == 0){
        //$password = password_hash($password1,PASSWORD_DEFAULT); //encryption

        $query = "SELECT * FROM user WHERE username='$username' AND password1 = '$password' ";
        $results = mysqli_query($db,$query);
        $user = mysqli_fetch_assoc($results);

        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['success'] = "Logged in Successfully";
            header("Location:index.php");
        }
        else{
            array_push($errors, "Wrong Username or Password");
        }
        }
    }
//Create A Blog
$subject = mysqli_real_escape_string($db, $_POST['subject'] ?? "");
$description = mysqli_real_escape_string($db, $_POST['description'] ?? "");
$tag = mysqli_real_escape_string($db, $_POST['tag'] ?? "");

//show all tuple data from database into welcome page
$sql = "SELECT * FROM blog";
$query = mysqli_query($db, $sql);

//Get blog data based on id
if(isset($_REQUEST['blogid'])){
    $blogid = $_REQUEST['blogid'];
    $sql = "SELECT * FROM blog WHERE blogid = $blogid";
    $query = mysqli_query($db, $sql);
}

//create blog
if(isset($_REQUEST["post"])){
    $subject = $_REQUEST["subject"];
    $description =$_REQUEST["description"];
    $tag = explode(', ', $_REQUEST['tag']);    //seperates tags after a comma
    $username = $_SESSION['username'];


    $sql = "SELECT COUNT(*) FROM blog WHERE username = (SELECT username FROM user WHERE username = '$username') AND blogDate = CURDATE()";
    $count = mysqli_query($db, $sql);

    $result = $count->fetch_array();
    $quantity = intval($result[0]);

    if($quantity < 2){
    $sql = "INSERT INTO blog(subject, description, blogDate, username) VALUES ('$subject', '$description', NOW(), '$username')";
    mysqli_query($db, $sql);

    foreach($tag as $t){
    $sql = "INSERT INTO tags(blogid, tag) VALUES ((SELECT blogid FROM blog ORDER BY blogid DESC LIMIT 1),'$t')";
    mysqli_query($db, $sql);
    }

    header("Location: index.php?info=added");
    }
    else{
    header("Location: index.php?info=notadded");
    }

    exit();
}

//limit a user to 3 comments per day

$limit = 3;



        //comment
        if(isset($_REQUEST["comment"])){

            $comment = $_REQUEST["comment"];
            $rating =  $_REQUEST["sentiment"];
            $username = $_SESSION['username'];
            $blogid = $_SESSION['blogid'];
            //$date = $_REQUEST['commentDate'];
            if($rating == 'positive'){
            $sentiment = 1;
              }
            else{
            $sentiment = 0;
            }
            $sql = "SELECT COUNT(*) FROM comment WHERE (username = (SELECT username FROM user WHERE username = '$username')) AND commentdate = CURDATE()";
            $count = mysqli_query($db, $sql);

            $result = $count->fetch_array();
            $quantity = intval($result[0]);

            $sql = "SELECT username FROM blog WHERE blogid = '$blogid'";
            $id = mysqli_query($db, $sql);

            $result = $id->fetch_array();
            $idfound1 = $result[0];

            $sql = "SELECT username FROM user WHERE username = '$username'";
            $id = mysqli_query($db, $sql);

            $result = $id->fetch_array();
            $idfound2 = $result[0];

            if($quantity < 3 &&  $idfound1!= $idfound2){
            $sql = "INSERT INTO comment(comment, sentiment, blogid, username, commentdate) VALUES ('$comment', $sentiment, '$blogid', '$username', NOW())";
            mysqli_query($db, $sql);
            header("Location: index.php?c=added");
            }
            else{
                header("Location: index.php?c=notadded");
            }

            exit();
          }
    

  if(isset($_REQUEST['blogid'])){
    $blogid = $_REQUEST['blogid'];
    $_SESSION['blogid'] = $blogid;

    $sql = "SELECT * FROM blog WHERE blogid = $blogid";
    $sql1 = "SELECT * FROM comment WHERE blogid = $blogid";
    $query = mysqli_query($db, $sql);
    $query1 = mysqli_query($db, $sql1);
  }

  //Phase 3 statements