<?php
include('controller.php');
if(isset($_GET['status']))
{
    $id=$_GET['id'];
    $status=$_GET['status'];
    $obj=new connection();
    $obj=$obj->conn();
    $obj->query("update blogs set status= '$status' where id=$id");
    header('location:view_blog.php');
}
?>