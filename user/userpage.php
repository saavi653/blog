<?php
include('../admin/admin.php');
$obj=new admin($_POST);
$record=$obj->view_blog();
$obj1=new pdo("mysql:host=localhost;dbname=blog;","root","");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../admin/style.css">     
    <title>Document</title>
</head>
<body>
    <table>
        <th>
            TITLE 
        </th>
        <th>
            BLOG'S
        </th> 
        <th>
            LIKE 
        </th>
        <th>
            TOTAL-LIKE
        </th> 
        <th>
            DISLIKE 
        </th>
        <th>
            TOTAL-DISLIKE
        </th> 

        <tr>
            <?php foreach($record as $key=>$value)
            { 
                if($value['status']==1)
                {?>
            <td>
                <?php echo $value['title'] ?>
            </td>
            <td>
                <?php echo $value['description'] ?>
            </td>
            <td>
                <?php echo '<a href="like.php?id='.$value['id'].'&user_id='.$_SESSION['id'].'&likes=1">LIKE</a>'; ?>
            </td>
            <td>
            <?php  
                $id=$value['id'];
                $data=$obj1->query("select sum(likes)from fun where blog_id=$id");
                $li=$data->fetch();
                echo $li[0];
            ?>
            </td>   
            <td>
                <?php echo '<a href="like.php?id='.$value['id'].'&user_id='.$_SESSION['id'].'&dislikes=1">DISLIKE</a>';?>
            </td>
            <td>
            <?php   
                $id=$value['id'];
                $data=$obj1->query("select sum(dislikes)from fun where blog_id=$id");
                $li=$data->fetch();
                echo $li[0];
                ?>
            </td>   
        </tr>  
        <?php
        }    }     
            ?> 
            <b ><a href='user_logout.php'>LOGOUT </a></b>
        </table>
    </body>
    </html>


