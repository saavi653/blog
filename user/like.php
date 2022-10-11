<?php
session_start();
include('../database/conn.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $user_id=$_GET['user_id'];
    $obj=new connection();
    $obj=$obj->conn();
    $data=$obj-> query("SELECT likes from blogs inner join fun on blogs.id=fun.blog_id where blogs.id=$id and fun.user_id=$user_id");
    $fun=$data->fetchAll(pdo::FETCH_ASSOC);
    if($_GET['likes']==1)
    {
        if(!empty($fun))
        { 
            $obj->exec("update fun set likes='1',dislikes='0' where blog_id='$id' and user_id= '$user_id' ");
            header('location:userpage.php');  
        }
        else
        {
            $obj->query("insert into fun(blog_id,user_id,likes,dislikes)values('$id','$user_id',1,0)");
            header('location:userpage.php'); 
        }
    }    
    else
    {
        if(!empty($fun))
        { 
            $obj->exec("update fun set likes='0',dislikes='1' where blog_id='$id' and user_id= '$user_id' ");
            header('location:userpage.php');  
        }
        else
        {
            $obj->query("insert into fun(blog_id,user_id,likes,dislikes)values('$id','$user_id',0,1)");
            header('location:userpage.php'); 
        }
    }   
}  
