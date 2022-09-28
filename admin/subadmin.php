<?php
session_start();
if(isset($_SESSION['sub_a']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">  
    <title>subadmin_main</title>
</head>
<body>
<h1>WELCOME SUB-ADMIN</h1>
    <section class="main">
        <section class="first">
            <a href='blog/createb.php' class="link">create blog</a><br>
            <a href='blog/view_blog.php' class="link">view blog</a><br>
        </section>
        <section class="second">
            <a href='user/create_user.php' class="link">create user</a><br>
            <a href='user/view_user.php' class="link">view user</a><br>
        </section>
        <section class="third">
            <a href='create_sa.php' class="link">create sub-admin</a><br>
            <a href='view_sa.php' class="link">view sub-admin</a><br>
        </section>
    </section> 
    <span> <a href="admin_logout.php" class="link">logout </a></span>
</body>
</body>
</html>
<?php
}else
{
    header('location:login.php');
}