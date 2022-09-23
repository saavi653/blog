<?php
session_start();
class admin 
{
    public $admin,$obj;
    function __construct ($data=null)
    {
        $this->admin=$data;
        $this->obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
    }
    function validation($data)
    {       
            if(empty($data['title']) || empty($data['des']))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }
    }
    function login()
    {
       
        $row=$this->obj->query("select *from admin");
        $data=$row->fetchAll(pdo::FETCH_ASSOC);
        $count=0;
        foreach($data as $key=>$value)
        {
            if($value['email']==$this->admin['email']&& $value['password']==$this->admin['password'])
            {
                if($value['role']==1)
                {
                    $_SESSION['admin_login']=1;
                    header('location:main.php');
                }
                else
                {
                    header('location:subadmin.php');
                }    
            }
            else
            { 
                $count++;
            }
        }
        if($count>0)
        {
            echo "<br><center><b>ERROR : please enter valid details</b></center>";
        }
    }
    function create_blog()
    {
        $error=$this->validation($this->admin);
        if($error==0)
        {
            $title=$this->admin['title'];
            $des=$this->admin['des'];
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
        $obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
        $obj->exec("delete from blogs where id='$id'"); 
        header('location:view_blog.php');
    }
}
class user 
{
    public $admin,$obj;
    function __construct ($data=null)
    {
        $this->admin=$data;
        $this->obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
    }
    function create_user()
    {
        $email=$this->admin['email'];
        $password=$this->admin['password'];
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
    function user_login()
    {
        $email=$this->admin['email'];
        $password=$this->admin['password'];
        $data=$this->obj->query('select *from user');
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        $msg=0;$count=0;
        foreach($fetch as $key=>$value)
        {
            if($email==$value['email']&& $password==$value['password'])
            {
                $_SESSION['id']=$value['id'];
                if($value['status']==1)
                {
                    $_SESSION['user_login']=1;
                    header('location:userpage.php');
                }
                else{
                    $count++;
                }
            }
            else
            {
                $msg++;
            }   
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
class subadmin
{
    public $admin,$obj;
    function __construct ($data=null)
    {
        $this->admin=$data;
        $this->obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
    }
    function create_sa()
    {
        $email=$this->admin['email'];
        $password=$this->admin['password'];
        $this->obj->query("insert into admin(email,password,role)values('$email','$password',2)");
        echo"<h2>SUB ADMIN CREATED SUCCESSFULLY</h2>";
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
?>