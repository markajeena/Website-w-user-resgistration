<!-- <#?php

    include "database.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog using PHP & MySQL</title>
</head>
<body>

   <div class="container">
        <#?php foreach($query as $q){ ?>
            <form method="POST">
                <input type="text" hidden value='<#?php echo $q['id']?>' name="id">
                <input type="text" placeholder="Blog Title" class="form" name="subject" value="<#?php echo $q['subject']?>">
                <textarea name="description" class="form"><#?php echo $q['description']?></textarea>
                <button class="button" name="update">Update</button>
            </form>
        <#?php } ?>    
   </div>


</body>
</html> -->