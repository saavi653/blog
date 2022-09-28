<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">   
    <title>user_login</title>
</head>
<body>
    <h1>USER PANEL </h1>
   <form action="user_login.php" method ="post">
    <div class="outer">
    <label>EMAIL</label>
    <input type='email' name='email'/><br><br>
    <label> PASSWORD</label>
    <input type='password' name='password'/><br><br>
    <input type="submit" value="SUBMIT" name="submit"/>
    </div>
    <br><center><b>create a new account? <a href="signup.php">signup</a></b></center>
    <br><center><b>login as a admin? <a href="../admin/login.php">login</a></b></center>
   </form>
</body>
</html>
 <?php
include('controller.php');
if(isset($_POST['submit']))
{
    $obj=new user();
    $obj->user_login($_POST);
}
?> 