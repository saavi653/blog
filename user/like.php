<?php
session_start();

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $user_id=$_GET['user_id'];
        $obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
        $fun_data=$obj->query("select *from fun");
        $fetch_fun=$fun_data->fetchAll(pdo::FETCH_ASSOC);
        if($_GET['likes']==1)
        {
            $count=0;
            foreach($fetch_fun as $k =>$v)
            { 
                if($id==$v['blog_id']&& $user_id==$v['user_id'])
                { 
                    $obj->exec("update fun set likes='1',dislikes='0' where blog_id='$id' and user_id= '$user_id' ");
                    header('location:userpage.php');  
                    $count++; 
                }
            }
            if($count==0)
            {
                $obj->query("insert into fun(blog_id,user_id,likes,dislikes)values('$id','$user_id',1,0)");
                header('location:userpage.php'); 
            }    
        }    
        else
        {   
            $count=0;
            foreach($fetch_fun as $k =>$v)
            { 
                if($id==$v['blog_id']&& $user_id==$v['user_id'])
                { 
                    $obj->exec("update fun set likes='0',dislikes='1'where blog_id='$id' and user_id='$user_id' ");
                    header('location:userpage.php');  
                    $count++; 
                }
            }
            if($count==0)
            {
                $obj->query("insert into fun(blog_id,user_id,likes,dislikes)values('$id','$user_id',0,1)");
                header('location:userpage.php'); 
            }        
        } 
    }
