<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
    <style>
        .link {
            border: 1px solid black;
            color: black;
            padding: 30px;
            width: 100%;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            background-color: lightcoral;
        }

        .first {
            position: absolute;
            top: 40;
            left: 10%;
            display: flex;
            flex-direction: column;
        }

        .second {
            position: absolute;
            top: 40;
            left: 40%;
            display: flex;
            flex-direction: column;
        }

        .third {
            position: absolute;
            top: 40;
            left: 70%;
            display: flex;
            flex-direction: column;
        }

        .main {
            position: relative;
        }

        span {
            position: absolute;
            top: 70%;
            left: 40%;
        }
    </style>
</head>

<body>
    <h1>WELCOME ADMIN</h1>
    <section class="main">
        <section class="first">
            <a href='createb.php' class="link">create blog</a><br>
            <a href='view_blog.php' class="link">view blog</a><br>
        </section>
        <section class="second">
            <a href='create_user.php' class="link">create user</a><br>
            <a href='view_user.php' class="link">view user</a><br>
        </section>
        <section class="third">
            <a href='create_sa.php' class="link">create sub-admin</a><br>
            <a href='view_sa.php' class="link">view sub-admin</a><br>
        </section>
    </section>
    <span> <a href="admin_logout.php" class="link">logout </a></span>
</body>

</html>