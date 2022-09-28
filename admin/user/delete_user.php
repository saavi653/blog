<?php
include('controller.php');
if(isset($_GET['id']))
{
    $table="user";
    $obj= new controller();
    $obj->delete($table,$_GET['id']);
    header('location:view_user.php');
}
?>

