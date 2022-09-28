<?php
class validation 
{
    function validate_blog($data)
    {       
            if(strlen(trim($data['title']))<1 || strlen(trim($data['des']<1)))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }  

    }
    function validate_user($table,$data)
    {       
        if(strlen(trim($data['email']))<1 || strlen(trim($data['password']<1)))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }
            $obj=new connection();
            $obj=$obj->conn();
            $email=$data['email'];
            $data=$obj->query("select * from $table where email='$email' ");  
            $data=$data->fetch();
            if(!empty($data))
            {
                echo"ERROR:account already exist ";
                return 1;
            }     
    }
}
?>