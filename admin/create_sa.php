<?php
include('admin.php');
if (isset($_SESSION['admin_login'])) 
{
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            h1 {
                background-color: lightcoral;
                border: 5px solid black;
                text-align: center;
            }

            ul {
                font-size: 30px;
            }

            body {
                background-color: lightseagreen;
            }
        </style>
    </head>

    <body>
        <form action="create_sa.php" method="post">
            <div>
                <h1>SUB-ADMIN PANEL </h1>
                <label>EMAIL</label>
                <input type='email' name='email' /><br><br>
                <label> PASSWORD</label>
                <input type='password' name='password' /><br><br>
                <input type="submit" value="SUBMIT" name="submit" />
            </div><br>
            <b><a href='main.php'>SWITCH TO MAIN PAGE </a></b>
        </form>
    </body>

    </html>
<?php
    if (isset($_POST['submit'])) {
        $obj1 = new user();
        $error = $obj1->validation($_POST);
        if ($error == 0) 
        {
            $obj = new subadmin($_POST);
            $obj->create_sa();
        }
    }
} else {
    header('location:login.php');
}
?>