<?php
include('controller.php');
global $id;
if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
}
$obj=new connection();
$con=$obj->conn();
$data = $con->query("select * from blogs where id='$id'");
$record = $data->fetchall(pdo::FETCH_ASSOC);
if($record)
{
    if (isset($_POST['submit'])) 
    {
        $obj = new blog();
        $error = $obj->validate_blog($_POST);
        if ($error == 0) 
        {
            global $id;
            $title = $_POST['title'];
            $des = $_POST['des'];
            $con->exec("update blogs set title='$title',description='$des' where id ='$id' ");
            header('location:view_blog.php');
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">   
        <title>edit blog</title>
    </head>
    <body>
        <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="post">
            <h1>EDIT BLOG </h1>
            <label>title</label>
            <input type='text' name='title' value=<?php echo $record[0]['title']; ?>><br>
            <label>description</label>
            <textarea name='des'><?php echo $record[0]['description']; ?> </textarea><br>
            <input type="submit" name="submit">
        </form>
    </body>
    </html>
    <?php
}else {
    header('location:view_blog.php');
} ?>