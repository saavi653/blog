<?php
include('../common_controller/function.php');
include('admin.php');
if(isset($_SESSION['admin_login']) || isset($_SESSION['sub_a']))
{
    $obj = new controller();
    $data = $obj->view("admin");
    ?> 
    <html>
    <link rel="stylesheet" type="text/css" href="../css/style.css">      
    <title>
        view subadmin
    </title>   
    <table cellspacing=0>
        <h1>SUB-ADMIN'S DETAIL :</h1>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <?php if(isset($_SESSION['admin_login'])){?>
            <th>DELETE</th>
        <?php
        }
        foreach ($data as $key => $value) 
        {
            ?>
            <tr>
                <td>
                    <?php echo $value['email'] ?>
                </td>
                <td>
                    <?php echo $value['password'] ?>
                </td>
                <?php if(isset($_SESSION['admin_login']))
                    { ?>
                    <td>
                       <?php 
                            echo '<a href="delete_sa.php?id='.$value['id'].'">DELETE</a>';?>
                    </td> 
                        <?php
                    }
        }        ?>
            </tr>
    </table>
    <?php
    if (isset($_SESSION['admin_login'])) 
    {
    ?>
        <b><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
    <?php
    } else 
    {
    ?>
        <b><a href='subadmin.php'>SWITCH TO MAIN PAGE </a></b>
    <?php } ?>
    </html>
<?php    
}else
    {
        header('location:login.php');
    }
?>    
