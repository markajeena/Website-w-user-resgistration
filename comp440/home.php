<?php session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>

    <!doctype html>
    <html>
        <head>
            <title>Welcome to the Homepage</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <h1>Hello, <?php echo $_SESSION['username']; ?></h1>
            <a href="logout.php">Logout</a>
        </body>
        </html>
        
        <?php
}
else {
    header("Location: index.php");
    exit();
}
?>