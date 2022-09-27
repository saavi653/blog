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
    <h1>ADMIN PANEL </h1>
   <form action="login.php" method ="post">
    <div class=outer>
    <label>EMAIL</label>
    <input type='email' name='email'/><br><br>
    <label> PASSWORD</label>
    <input type='password' name='password'/><br><br>
    <input type="submit" value="SUBMIT" name="submit"/>
    </div>
    <br><center><b>login as a user? <a href="../user/user_login.php">user login</a></b></center>
   </form>
</body>
</html>
<?php
include('admin.php');
if(isset($_POST['submit']))
{
    $obj=new admin();
    $obj->login($_POST);
}
?>