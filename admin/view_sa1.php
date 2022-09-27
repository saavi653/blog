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