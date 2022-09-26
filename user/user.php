<?php
session_start();
class user 
{
    function create_user($data)
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $email=$data['email'];
        $password=$data['password'];
        $obj->exec("insert into user(email,password) values('$email','$password')"); 
        echo"<b>USER CREATED SUCCESSFULLY</b>"; 
    }
    function view_user()
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $data=$obj->query('select *from user');
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        return $fetch;
    }  
    function user_delete($id)
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn(); 
        if(!empty($id))
        {
            $obj->query("delete from user where id=$id");
            header('location:view_user.php');
        }
    }
    function user_login($data)
    {
        $msg=$count=0;
        $email=$data['email'];
        $password=$data['password'];
        include('../admin/conn.php');
        $obj=new conn();
        $obj=$obj->conn(); 
        $data=$obj->query("select *from user where email='$email' and password='$password' ");
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
                $count++;
            }
        }
        else
        {
            $msg++;
        }
        if($count>0)
        {
            echo"ERROR: user inactive";
            exit();
        }
        if($msg>0)
        {
            echo"ERROR: please enter valid details";
        }
    }
    function validation($data)
    {       
            if(empty($data['email']) || empty($data['password']))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }
    }
}
?>