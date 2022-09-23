<?php
include('admin.php');
if (!isset($_SESSION['admin_login']))
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightseagreen;
        }

        h1 {
            text-align: center;
            background-color: lightcoral;
            border: 5px solid black;
            text-align: center;
        }
    </style>
    </head>
    <body>
        <form action="createb.php" method='post'>
            <h1>BLOG</h1>
            <label>title</label>
            <input type="textbox" name="title" />
            <label>description</label>
            <textarea name="des" placeholder="type..."></textarea><br><br>
            <input type=submit name=submit>
        </form><br>
    <b><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
    </body>
</html>
<?php
if (isset($_POST['submit']))
{
    $obj = new admin($_POST);
    $obj->create_blog();
}
?>