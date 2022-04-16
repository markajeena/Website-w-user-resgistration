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
    <body>
        <?php if(isset($_REQUEST['info'])){?>
            <?php if($_REQUEST['info'] =="added"){?>
                <div class="alert" role="alert">
                    Post Has Been Added
            </div>
            <?php } ?>
        <?php } ?>
    <style>h1 { text-align: center; color: black} h3 {text-align: center; color: black}</style>
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
    <h3> Welcome <strong><?php echo $_SESSION['firstname']; ?></strong>,</h3>
    <style>body { text-align: center; background-image: url("pexels-photo.jpg")}</style>
    <div class="container"><button id="button" class="button"><a href="create.php">Post a new blog</a></button></div>
    <button id="button" class="button"><a href="index.php?logout='1'">Log Out</a></button>
    <style>
        a{
            text-decoration: none;
        }
        button{
            position: relative;
            border: none;
            transition: .4s ease-in;
            z-index: 1;
            font-size: 16px;
            background-color: white;
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

    </style>
    <?php endif ?>
        <div class= "row">
            <?php foreach($query as $q){?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $q['subject'];?></h5>
                        <p class="card-text"><?php echo $q['description'];?></h5>
                        <p class="card-text"><?php echo $q['tags'];?></p>
                        <a href="" class="button">Read More <span class="danger">&rarr;</span></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

</body>
</html>
