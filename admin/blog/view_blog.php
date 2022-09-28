<?php
include('controller.php');
if(isset($_SESSION['admin_login'])||isset($_SESSION['sub_a']))
{
$obj = new controller();
$record = $obj->view("blogs");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">   
    <title>view blog</title>
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
            EDIT
        </th>
        <th>
            DELETE
        </th>
        <th>
            ACTIVE
        </th>
        <th>
            INACTIVE
        </th>
        <th>
            STATUS
        </th>
        <tr>
            <?php foreach ($record as $key => $value) 
            { ?>
                <td>
                    <?php echo $value['title'] ?>
                </td>
                <td>
                    <?php echo $value['description'] ?>
                </td>
                <td style="background-color:lightcoral;">
                    <?php echo '<a href="edit.php?id=' . $record[$key]['id'] . '">EDIT</a>';  ?>
                </td>
                <td style="background-color:lightcoral;">
                    <?php echo '<a href="delete_blog.php?id=' . $record[$key]['id'] . '">DELETE</a>';  ?>
                </td>
                <td style="background-color:lightcoral;">
                    <?php echo '<a href="active_blog.php?id=' . $record[$key]['id'] . '&status=1">ACTIVE</a>';  ?>
                </td>
                <td style="background-color:lightcoral;">
                    <?php echo '<a href="active_blog.php?id=' . $record[$key]['id'] . '&status=0">INACTIVE</a>';  ?>
                </td>
                <td>
                    <?php echo $value['status'] ?>
                </td>
                </tr>
        <?php }
            if (isset($_SESSION['admin_login'])) 
            {
        ?>
                <b><a href='../main.php'>SWITCH TO MAIN PAGE </a></b>
        <?php
            } else 
            {
        ?>
        <b><a href='../subadmin.php'>SWITCH TO MAIN PAGE </a></b>
        <?php } ?>
    </table>
</body>
</html>
<?php
}
else{
    header('location:login.php');
}