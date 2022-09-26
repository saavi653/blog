<?php
include('admin.php');
    $obj = new subadmin();
    $data = $obj->view_sa();
    ?> 
    <html>
    <style>
            table{
                margin:5px;
                padding :5px;
                width :80%;
                border-radius: 20px;
                
            }
            tr,td{
                padding :20px;
                font-size: 20px;
                border:2px solid black;
            }
            body{
                background-color:lightseagreen;
            }
            h1{
                background-color:lightcoral;
                border:5px solid black;
                text-align:center;
            }
            a{
                text-decoration: none;
            
            }
            th{
                padding:20px;
                border:2px solid black;
                background:linear-gradient(to right,brown,lightcoral,pink,white);
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
        }?>
        </tr>
        </table>
        <b ><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
    </html>
