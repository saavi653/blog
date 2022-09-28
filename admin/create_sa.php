<?php 
include('admin.php');
if(isset($_SESSION['admin_login'])||isset($_SESSION['sub_a']))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create sub-admin</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
    <form action="create_sa.php" method="post">
        <div>
            <h1>SUB-ADMIN PANEL </h1>
            <label>EMAIL</label>
            <input type='email' name='email' /><br><br>
            <label> PASSWORD</label>
            <input type='password' name='password' /><br><br>
            <input type="submit" value="SUBMIT" name="submit" />
        </div><br>
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
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $obj = new admin();
    $obj->create_sa($_POST);
}
}else
{
    header('location:login.php');
}
?>
