<?php
session_start();
class admin 
{
    function validation($data)
    {       
            if(empty($data['title']) || empty($data['des']))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }
    }
    function login($data)
    {
        $email=$data['email'];
        $password=$data['password'];
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $row=$obj->query("select *from admin where email='$email'and password='$password' ");
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
                header("location:subadmin.php");
            }
        }
        else{
            echo"please enter valid details";
        }
    }

    function create_blog($data)
    {
        $error=$this->validation($data);
        if($error==0)
        {
            include('conn.php');
            $obj=new conn();
            $obj=$obj->conn();
            $title=$data['title'];
            $des=$data['des'];
            $obj->exec("insert into blogs(title,description) values('$title','$des')");
            echo"<b><br><br>BLOG CREATED SUCCESSFULLY</b>";
        }
    }
    function view_blog()
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $data=$obj->query("select * from blogs");
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        return $fetch;
    }
    function delete_blog($id)
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn(); 
        $obj->exec("delete from blogs where id='$id'"); 
        header('location:view_blog.php');
    }
}

class subadmin
{
    function create_sa($data)
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $email=$data['email'];
        $password=$data['password'];
        if(!empty($email) && !empty($password))
        {
            $obj->query("insert into admin(email,password,role)values('$email','$password',2)");
            echo"<h2>SUB ADMIN CREATED SUCCESSFULLY</h2>";
        }else
        {
            echo"Error : fields are mandatory";
        }    
    }
    function view_sa()
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $data=$obj->query("select *from admin where role='2'");
        $fetch=$data->fetchall(PDO::FETCH_ASSOC);
        return $fetch;
    }
    function delete_sa($id)
    {
        include('conn.php');
        $obj=new conn();
        $obj=$obj->conn();
        $obj->exec("delete from admin where id='$id' ");
        header('location:view_sa.php');
    }
}
