<?php
session_start();
include('../admin/conn.php');
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $user_id=$_GET['user_id'];
    $obj=new connection();
    $obj=$obj->conn();
    if($_GET['likes']==1)
    {
        $data=$obj->query("select likes from fun where blog_id='$id' and user_id='$user_id'");
        $fun=$data->fetchAll(pdo::FETCH_ASSOC);
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
        $data=$obj->query("select likes from fun where blog_id='$id' and user_id='$user_id'");
        $fun=$data->fetchAll(pdo::FETCH_ASSOC);
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
