<?php

session_start();

//initialization
$userid = "";
$username = "";
$firstname = "";
$lastname = "";
$email = "";

$errors = array();

$db = mysqli_connect('localhost:3307', 'root','','phase1') or die("Connection Failed");

if(!isset($_POST['login'])){
$username = mysqli_real_escape_string($db, $_POST['username'] ?? "");
$password = mysqli_real_escape_string($db, $_POST['password'] ?? "");
$password_1 = mysqli_real_escape_string($db, $_POST['password_1'] ?? "");
$firstname = mysqli_real_escape_string($db, $_POST['firstname'] ?? "");
$lastname = mysqli_real_escape_string($db, $_POST['lastname'] ?? "");
$email = mysqli_real_escape_string($db, $_POST['email'] ?? "");

if(empty($username)) {array_push($errors, "Please Enter a Username");}
if(empty($password)) {array_push($errors, "Please Enter a Password");}
if($password_1 != $password) {array_push($errors, "Passwords do not Match");}
if(empty($firstname)) {array_push($errors, "Please Enter Your First Name");}
if(empty($lastname)) {array_push($errors, "Please Enter Your Last Name");}
if(empty($email)) {array_push($errors, "Please Enter an Email");}

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";


$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if($user) {

  if($user['username'] === $username){array_push($errors, "Username Already in Use");}
  if($user['email'] === $email){array_push($errors, "Email Already in Use");}

}

if(count($errors) == 0 ){

  $query = "INSERT INTO user (username, password, firstname, lastname, email) VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";


  mysqli_query($db, $query);
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "Succesfully Register";

  header('Location: index.php');
}
}

if (isset($_POST['login'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if(empty($username)) {array_push($errors, "Please Enter a Username");}
  if(empty($password)) {array_push($errors, "Please Enter a Password");}

  if(count($errors) == 0 ){

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results)) {

      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You Are Now Logged In";
      header('Location: index.php');
    }

    else {

      array_push($errors, "Incorrect Username or Password. Try Again.");
    }
  }

}

  $sql = "SELECT * FROM blog";
  $query = mysqli_query($db, $sql);


  if(isset($_REQUEST["new_post"])){
    $subject = $_REQUEST["subject"];
    $description = $_REQUEST["description"];
    $tag = $_REQUEST["new_post"];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO blog(subject, description, user_id) VALUES ('$subject', '$description', (SELECT userid FROM user WHERE username = '$username'))";
    mysqli_query($db, $sql);

    $blogid = $_SESSION['blogid'];
    $sql1 = "INSERT INTO tag(tag, blog_id) VALUES ('$tag', '$blogid')";
    mysqli_query($db, $sql1);

  header("Location: index.php");
    exit();
  }

  if(isset($_REQUEST["comment"])){

    $comment = $_REQUEST["comment"];
    $rating =  $_REQUEST["sentiment"];
    $username = $_SESSION['username'];
    $blogid = $_SESSION['blogid'];

    if($rating == 'positive'){
      $sentiment = 1;
      }
    else{
      $sentiment = 0;
    }

    $sql = "INSERT INTO comment(comment, sentiment, blog_id, user_id) VALUES ('$comment', $sentiment, '$blogid',  (SELECT userid FROM user WHERE username = '$username'))";
    mysqli_query($db, $sql);

    header("Location: index.php");
    exit();
  }

  if(isset($_REQUEST['blogid'])){
    $blogid = $_REQUEST['blogid'];
    $_SESSION['blogid'] = $blogid;

    $sql = "SELECT * FROM blog WHERE blogid = $blogid";
    $sql1 = "SELECT * FROM comment WHERE blog_id = $blogid";
    $query = mysqli_query($db, $sql);
    $query1 = mysqli_query($db, $sql1);
  }
