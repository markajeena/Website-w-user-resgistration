<?php include('database.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Create A Blog</title>
        <h2>Create A Blog</h2>
        <style>h2{text-align:center;}</style>
    </head>
    <body>
    <style>
        body {
        background-image: url("pexels-photo.jpg")
        }
        </style>
    
        <div class="container">
            <form method="GET">
                <div><input id="input" name="subject" type="text" placeholder="Subject" class="form"></div>
                <div><textarea id="text" name="description" placeholder="add description..." class="form"></textarea></div>
                <lable>Add Tags</label>
                <input type="text" name="tag" placeholder="Add Tags(Seperate by Comma)..." style="width 100%;">
                <div><button id="button" name="post"class="button">Add Blog</button></div>

            </form>
        </div>
        <style>
            input{
                margin-bottom: 10px;
            }
            form{
                text-align:center;
            }
            input{
            margin: 25px 25px 0px 0px;
            width: 50%;
            height:50px;
            }
            textarea{
            margin: 25px 25px 25px 25px;
            width: 100%;
            height: 150px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            resize: none;
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
    </body>
</html>  