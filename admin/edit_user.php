<?php
if (isset($_GET['id']))
{
    $id = $_GET['id'];
}
include('conn.php');
$obj=new connection();
$con=$obj->conn();
$record = $con->query("select * from user where id ='$id'");
$data = $record->fetchall(pdo::FETCH_ASSOC);
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
    <form action="edit_user.php?id= <?php echo $_GET['id'] ?>" method="post">
        <div>
            <h1>USER PANEL </h1>
            <label>EMAIL</label>
            <input type='email' name='email' value=<?php echo $data[0]['email'] ?> /><br><br>
            <label> PASSWORD</label>
            <input type='text' name='password' value=<?php echo $data[0]['password'] ?> /><br><br>
            <input type="submit" value="SUBMIT" name="submit" />
        </div>
    </form>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con->exec("update user set email='$email' , password='$password' where id='$id'");
    header('location:view_user.php');
}
?>