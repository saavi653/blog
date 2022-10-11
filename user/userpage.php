<?php
include('controller.php');
$obj=new controller();
$record=$obj->view("blogs");
$obj=new connection();
$obj1=$obj->conn();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">     
    <title>userpage</title>
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
               $data=$obj1-> query("SELECT *,(select sum(likes))as likescount,(SELECT sum(dislikes)) as dislikescount from blogs b inner join fun f on (b.id=f.blog_id)where b.id=$id");
              $data= $data->fetch(pdo::FETCH_ASSOC);
               echo $data['likescount'];
            ?>
            </td>   
            <td>
                <?php echo '<a href="like.php?id='.$value['id'].'&user_id='.$_SESSION['id'].'&dislikes=1">DISLIKE</a>';?>
            </td>
            <td>
            <?php   
                echo $data['dislikescount'];
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


