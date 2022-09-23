<?php
include('admin.php');
if(isset($_GET['id']))
{
    $obj= new user();
    $obj->user_delete($_GET['id']);
}
?>

