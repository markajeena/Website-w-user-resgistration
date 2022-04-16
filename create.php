<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Create A Blog</title>
    </head>
    <body>
        <div class="container">
            <form method="POST">
                <input name="subject" type="text" placeholder="Subject" class="form">
                <textarea name="description" class="form"></textarea>
                <textarea name="tags" class="button" placeholder="add tags"></textarea>
                <button name="post"class="button">Add Blog</button>
            </form>
        </div>
    </body>
    <?php 
    $conn = mysqli_connect("localhost","root","", "user_registration");
    if(!$conn){
        echo "error";
    }
    $sql = "SELECT * FROM blog";
    $query = mysqli_query($conn, $sql);
    
    if(isset($_REQUEST["post"])){
        $subject = $_REQUEST["title"];
        $description =$_REQUEST["description"];
        $tags = $_REQUEST["tags"];

        $sql = "INSERT INTO blog(subject, description, tags) VALUES ('$subject', '$description', '$tags')";
        mysqli_query($conn, $sql);

        header("Location: index.php?info=added");
        exit();
    }
    ?>
</html>  