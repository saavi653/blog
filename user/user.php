<?php
session_start();
class user 
{
    public $obj;
    function __construct()
    {
        include('../admin/conn.php');
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
    function view_user()
    { 
        $data=$this->obj->query('select *from user');
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        return $fetch;
    }  
    function user_delete($id)
    {
       
        if(!empty($id))
        {
            $this->obj->query("delete from user where id=$id");
            header('location:view_user.php');
        }
    }
    function user_login($data)
    {
        $msg=$count=0;
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