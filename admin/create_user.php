<?php
include('../user/user.php');
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
    <form action="create_user.php" method="post">
        <div>
            <h1>USER PANEL </h1>
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
if (isset($_POST['submit']))
{
    $obj = new user();
    $error = $obj->validation($_POST);
    if ($error == 0) {
        $obj->create_user($_POST);
    }
}
?>