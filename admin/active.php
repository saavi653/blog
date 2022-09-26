<?php
include('admin.php');
if(isset($_GET['status']))
{
    $id=$_GET['id'];
    $status=$_GET['status'];
    $obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
    $obj->query("update user set status= '$status' where id=$id");
    header('location:view_user.php');
}
?>