<?php
include('admin.php');
if(isset($_SESSION['sub_a']))
{
$obj = new subadmin();
$data = $obj->view_sa();
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">      
    <title>
        subadmin panel
    </title>   
<style>
    table {
        margin: 5px;
        padding: 5px;
        width: 80%;
        border-radius: 20px;

    }

    tr,
    td {
        padding: 20px;
        font-size: 20px;
        border: 2px solid black;
    }
    
    a {
        text-decoration: none;

    }

    th {
        padding: 20px;
        border: 2px solid black;
        background: linear-gradient(to right, brown, lightcoral, pink, white);
    }
</style>
<table cellspacing=0>
    <h1>SUB-ADMIN'S DETAIL :</h1>
    <th>EMAIL</th>
    <th>PASSWORD</th>
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
        <?php
    } ?>
        </tr>
</table>
<b><a href='subadmin.php'>SWITCH TO MAIN PAGE </a></b>
</html>
<?php
}else
    {
        header('location:login.php');
    }
?>    