<?php session_start();

//init vars
$username= "";
$email="";
$errors = array();

//connect_db
$db = mysqli_connect('localhost','root','','user_registration') or die("No Connection to the Database");

//Registration
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$lastname = mysqli_real_escape_string($db, $_POST['password']);

//form validdation

if(empty($username)) {
    array_push($errors, "Username is required");
}
if(empty($email)) {
    array_push($errors, "Email is required");
}
if(empty($lastname)) {
    array_push($errors, "lastname is required");
}
if(empty($firstname)) {
    array_push($errors, "firstname is required");
}
if(empty($password)) {
    array_push($errors, "password is required");
}

// check db for existing User Name
$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results= mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
    if($user['username'] === $username){array_push($errors, "Username already exits");
    }
    if($user['email'] === $email){array_push($error, "This Email has already been registered");
    }

}

//Register the user if there is no error 
if(count($errors) == 0){
    $password = password_hash($password,PASSWORD_DEFAULT); //encryption
    print $password;
    $query = "INSERT INTO user (username, password, firstname, lastname, email) VALUES ('$username','$password','$firstname','$lastname','$email')";

    mysqli_query($db,$query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now Logged In";

    header('location: index.php');

}

//Login User

if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is requried");
    }
    if(empty($password)){
        array_push($errors, "Password is requried");
    }   
    if(count($errors) == 0){
        $password = password_hash($password,PASSWORD_DEFAULT); //encryption

        $query = "SELECT * FROM user WHERE username='$username' AND password = '$password ";
        $results = mysqli_query($db,$query);

        if(mysqli_num_rows($results)){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Logged in Successfully";
            header("location: index.php");
        }
        else{
            array_push($errors, "Wrong Username or Password");
        }
        }
    }
