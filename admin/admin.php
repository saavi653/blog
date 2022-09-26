<?php
session_start();
class admin 
{
    public $obj;
    function __construct()
    {
        include('conn.php');
        $obj=new connection();
        $this->obj=$obj->conn();
    }
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

    function create_blog($data)
    {
        $error=$this->validation($data);
        if($error==0)
        {
            $title=$data['title'];
            $des=$data['des'];
            $this->obj->exec("insert into blogs(title,description) values('$title','$des')");
            echo"<b><br><br>BLOG CREATED SUCCESSFULLY</b>";
        }
    }
    function view_blog()
    {
        $data=$this->obj->query("select * from blogs");
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        return $fetch;
    }
    function delete_blog($id)
    {
       
        $this->obj->exec("delete from blogs where id='$id'"); 
        header('location:view_blog.php');
    }
}

class subadmin
{
    function __construct()
    {
        
        include('conn.php');
        $obj=new connection();
        $this->obj=$obj->conn();
    }
    function create_sa($data)
    {
        
        $email=$data['email'];
        $password=$data['password'];
        if(!empty($email) && !empty($password))
        {
            $this->obj->query("insert into admin(email,password,role)values('$email','$password',2)");
            echo"<h2>SUB ADMIN CREATED SUCCESSFULLY</h2>";
        }else
        {
            echo"Error : fields are mandatory";
        }    
    }
    function view_sa()
    {
        
        $data=$this->obj->query("select *from admin where role='2'");
        $fetch=$data->fetchall(PDO::FETCH_ASSOC);
        return $fetch;
    }
    function delete_sa($id)
    {
       
        $this->obj->exec("delete from admin where id='$id' ");
        header('location:view_sa.php');
    }
}
