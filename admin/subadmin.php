<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            background-color:lightcoral;
            border:5px solid black;
            text-align:center;
        }
        body{
            background-color:lightpink;
        }
        .container{
            border-radius:20px ;
            margin-top:20px;
            width: 50%;
            margin-left: 400px;
        }
        .mini
        {
            display:flex;
            flex-direction: column;
            margin-left: 30px;
        }
        .link{
            border:2px solid black;
            color:black;
            padding:20px;
            border-radius: 20px;
            width: 50%;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            background-color: lightcoral;
        }
    </style>
</head>
<body>
<h1>WELCOME SUB-ADMIN</h1>
    <section class="container"><section class="mini">
            <a href='createb.php' class="link">create blog</a><br>
            <a href='view_blog.php' class="link">view blog</a><br>
            <a href='create_user.php' class="link">create user</a><br>
            <a href='view_user.php' class="link">view user</a><br>
            <a href='create_sa.php' class="link">create sub-admin</a><br>
            <a href='view_sa1.php' class="link">view sub-admin</a><br>
    </section></section>   
</body>
</html>