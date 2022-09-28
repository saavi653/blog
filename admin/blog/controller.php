<?php
session_start();
include('../../database/conn.php');
include('../../validation/validation.php');
include('../../common_controller/function.php');
 class blog extends validation
{
    public $obj;
    function __construct()
    {
        $obj=new connection();
        $this->obj=$obj->conn();
    }
    function create_blog($data) 
    {
        $error=$this->validate_blog($data);
        if($error==0)
        {
            $title=$data['title'];
            $des=$data['des'];
            $this->obj->exec("insert into blogs(title,description) values('$title','$des')");
            echo"<b><br><br>BLOG CREATED SUCCESSFULLY</b>";
        }
    }
}
?>