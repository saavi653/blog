<?php
include('controller.php');
if(isset($_SESSION['admin_login'])||isset($_SESSION['sub_a']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <title>create blog</title>
</head>
<body>
    <form action="createb.php" method='post'>
        <h1>CREATE BLOG</h1>
        <label>title</label>
        <input type="textbox" name="title" />
        <label>description</label>
        <textarea name="des" placeholder="type..."></textarea><br><br>
        <input type=submit name=submit> 
    </form><br>
    <?php
    if (isset($_SESSION['admin_login'])) 
    {
    ?>
        <b><a href='../main.php'>SWITCH TO MAIN PAGE </a></b>
    <?php
    } else 
    {
    ?>
        <b><a href='../subadmin.php'>SWITCH TO MAIN PAGE </a></b>
    <?php } ?>
</body>

</html>
<?php
if (isset($_POST['submit'])) 
{
    $obj = new blog();
    $obj->create_blog($_POST);
}
     }else
    {
        header('location:../login.php');
    }
?>