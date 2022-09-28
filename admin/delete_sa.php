<?php
include('admin.php');
include('../common_controller/function.php');
if(isset($_GET['id']))
{
    $table="admin";
    $obj= new controller();
    $obj->delete($table,$_GET['id']);
    header('location:view_sa.php');
}
?>

