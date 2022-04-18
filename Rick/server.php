<?php

session_start();

//initialization
$username = "";
$firstname = "";
$lastname = "";
$email = "";

$errors = array();

$db = mysqli_connect('localhost', 'root','','user_registration') or die("Connection Failed");

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
