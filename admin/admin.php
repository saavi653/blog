<?php
session_start();
include('../database/conn.php');
include('../validation/validation.php');
class admin 
{
    public $obj;
    function __construct()
    {
        $obj=new connection();
        $this->obj=$obj->conn();
    }

    function login($data)
    {
        $email=$data['email'];
        $password=$data['password'];
        $row=$this->obj->query("select *from admin where email='$email'and password='$password' ");
        $data=$row->fetchAll(pdo::FETCH_ASSOC);
        if(!empty($data))
        {
            if($data[0]['role']==1)
            {
                $_SESSION['admin_login']=1;
                header("location:main.php");
            }
            else
            {
                $_SESSION['sub_a']=1;
                header("location:subadmin.php");
            }
        }
        else{
            echo"please enter valid details";
        }
    }
    function create_sa($data)
    {  
        $email=$data['email'];
        $password=$data['password'];
        $obj1=new validation();
        $error=$obj1->validate_user("admin",$data);
        if($error==0)
        {
            $this->obj->query("insert into admin(email,password,role)values('$email','$password',2)");
            echo"<h2>SUB ADMIN CREATED SUCCESSFULLY</h2>";
        }
    }
}

