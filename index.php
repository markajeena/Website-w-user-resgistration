<?php
include('database.php');
ini_set("display_errors", "off");
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
            <?php if($_REQUEST['info'] == "notadded"){?>
                <div>Post was not added</div>
                <?php }?>
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
    <div><button id="button" class="button"><a href="create.php">Post a new blog</a></button></div>
    <button id="button" class="button"><a href="index.php?logout='1'">Log Out</a></button>
    <style>
        a{
            text-decoration: none;
        }
        button{
            margin-bottom:1%;
            position: relative;
            border: solid;
            border-color: #5CDEFF;
            border-radius: 10px;
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
            <?php foreach($query as $q){?>
                        <div class="container">
                        <h5><?php echo $q['subject'];?></h5>
                        <p><?php echo substr($q['description'], 0 ,50);?>...</h5>
                        <div><button><a href="view.php?blogid=<?php echo $q['blogid']?>" class="button">Read More<span class="danger">&rarr;</span></a></button></div>
                    </div>
                    <style>
                       .container{
                            position:relative;
                            margin:auto;
                            margin-left: 45%;
                            margin-bottom: 50px;
                            width: 250px;
                            padding: 16px 0;
                            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
                       }
                    </style>
            <?php } ?>
            <div><button><a href="check.php" class="button">Check all information<span class="danger">&rarr;</span></a></button></div>
    
        </div>

</body>
</html>
