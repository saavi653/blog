<?php
include('controller.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>user signup</title>
</head>
<body>
    <form action="signup.php" method="post">
        <div>
            <h1>USER SIGNUP</h1>
            <label>EMAIL</label>
            <input type='email' name='email' /><br><br>
            <label> PASSWORD</label>
            <input type='password' name='password' /><br><br>
            <input type="submit" value="SUBMIT" name="submit" />
        </div><br>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit']))
{
    $obj = new user();
    $obj1 =new validation();
    $error = $obj1->validate_user("user",$_POST);
    if ($error == 0) 
    {
        $obj->create_user($_POST);
    }
}
?>
<br><b>back to login? <a href="user_login.php">login</a></b>
