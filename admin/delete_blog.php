<?php
include('admin.php');
if(isset($_GET['id']))
{
    $obj=new admin();
    $obj->delete_blog($_GET['id']);
}
?>