<?php
session_start();
include('../../database/conn.php');
include('../../validation/validation.php');
include('../../common_controller/function.php');
class user extends validation
{
    public $obj;
    function __construct()
    {
        $obj=new connection();
        $this->obj=$obj->conn(); 
    }
    function create_user($data)
    {
        $email=$data['email'];
        $password=$data['password'];
        $this->obj->exec("insert into user(email,password) values('$email','$password')"); 
        echo"<b>USER CREATED SUCCESSFULLY</b>"; 
    }
}