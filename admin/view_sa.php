<?php
include('admin.php');
if(isset($_SESSION['admin_login']))
{
    $obj = new subadmin();
    $data = $obj->view_sa();
    ?> 
    <html>
    <link rel="stylesheet" type="text/css" href="style.css">      
    <title>
        view subadmin
    </title>   
    <table cellspacing=0>
        <h1>SUB-ADMIN'S DETAIL :</h1>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>DELETE</th>
        <?php
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
                <td>
                    <?php echo '<a href="delete_sa.php?id='.$value['id'].'">DELETE</a>';?>
                </td> 
                <?php
        }        ?>
            </tr>
    </table>
        <b ><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
    </html>
<?php    
}else
    {
        header('location:login.php');
    }
?>    
