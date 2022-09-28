<?php
include('controller.php');
if(isset($_GET['id']))
{
    $blog="blogs";
    $obj=new controller();
    $obj->delete($blog,$_GET['id']);
    header('location:view_blog.php');
}
?>