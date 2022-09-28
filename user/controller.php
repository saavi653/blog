<?php
session_start();
include('../database/conn.php');
include('../validation/validation.php');
include('../common_controller/function.php');
class user
{
    public $obj;
    function __construct()
    {
        $obj=new connection();
        $this->obj=$obj->conn();
    }
    function user_login($data)
    {
        $email=$data['email'];
        $password=$data['password'];
        $data=$this->obj->query("select *from user where email='$email' and password='$password' ");
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        if(!empty($fetch))
        {
            $_SESSION['id']=$fetch[0]['id'];
            if($fetch[0]['status']==1)
            {
                $_SESSION['user_login']=1;
                header('location:userpage.php');
            }
            else
            {
                echo"ERROR: user inactive";
            }
        }
        else
        {
            echo"ERROR: please enter valid details";
        }
    }
  
}
?>