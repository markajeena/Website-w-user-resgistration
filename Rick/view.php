<?php include("server.php") ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title> Blog Page </title>
   </head>
   <body>

     <style>
         body { background-color: rgba(0, 128, 0, 0.3) }
       </style>

       <?php foreach ($query as $q) {?>

         <div>
           <h1><?php echo $q['subject']; ?></h1>
         </div>

         <p><?php echo $q['description']; ?></p>

      <?php } ?>

      <div>
        <a href="comment.php?blogid=<?php echo $q['blogid']?>"><button> Add a Comment </button></a>
      </div>

      <?php foreach ($query1 as $q) {?>

        <p> Comment: <?php echo $q['comment']; ?></p>

     <?php } ?>

   </body>
 </html>