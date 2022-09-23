<?php
include('admin.php');
if(isset($_GET['id']))
{
    $obj= new subadmin();
    $obj->delete_sa($_GET['id']);
}
?>

