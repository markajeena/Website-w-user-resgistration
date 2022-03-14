<?php
session_start(); 
unset($errors);
$errors = array();
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "You must log in to view this page";
    header('Location:login.php');
}
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>Home Page</head>
    <body>
        <h1>Home</h1>
        <?php
        if(isset($_SESSION['success'])) : ?>

        <div>
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
                </h3>
        </div>
        <?php endif ?>

<?php if(isset($_SESSION['firstname'])) : ?>
    <h3> Welcome <strong><?php echo $_SESSION['firstname']; ?></strong></h3>
    
    
    <button><a href="index.php?logout='1'">Log Out</a></button>

    <?php endif ?>

</body>
</html>
