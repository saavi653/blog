<?php
    include('admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
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
    <?php
    if (isset($_SESSION['admin_login'])) 
    {
    ?>
        <b><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
    <?php
    } else 
    {
    ?>
        <b><a href='subadmin.php'>SWITCH TO MAIN PAGE </a></b>
    <?php } ?>
</body>

</html>
<?php
if (isset($_POST['submit'])) 
{
    $obj = new admin();
    $obj->create_blog($_POST);
}
?>