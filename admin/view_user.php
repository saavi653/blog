<?php
include('../user/user.php');

$obj = new user();
$data = $obj->view_user();
?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
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
    <h1>USER'S DETAIL :</h1>
    <th>EMAIL</th>
    <th>PASSWORD</th>
    <th>EDIT</th>
    <th>DELETE</th>
    <th>ACTIVE</th>
    <th>INACTIVE</th>
    <th>STATUS</th>
    <?php
    foreach ($data as $key => $value) { ?>
        <tr>
            <td>
                <?php echo $value['email'] ?>
            </td>
            <td>
                <?php echo $value['password'] ?>
            </td>
            <td>
                <?php echo '<a href="edit_user.php?id=' . $value['id'] . '">EDIT</a>'; ?>
            </td>
            <td>
                <?php echo '<a href="delete_user.php?id=' . $value['id'] . '">DELETE</a>'; ?>
            </td>
            <td>
                <?php echo '<a href="active.php?id=' . $value['id'] . '&status=1">ACTIVE</a>'; ?>
            </td>
            <td>
                <?php echo '<a href="active.php?id=' . $value['id'] . '&status=0">INACTIVE</a>'; ?>
            </td>
            <td>
                <?php echo $value['status'] ?>
            </td>
        <?php
    } ?>
        </tr>
</table>
<?php
if (isset($_SESSION['admin_login'])) {
?>
    <b><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
<?php
} else {
?>
    <b><a href='subadmin.php'>SWITCH TO MAIN PAGE </a></b>
<?php } ?>

</html>