<?php
class validation{
    function validate_blog($data)
    {       
            if(strlen(trim($data['title']))<1 || strlen(trim($data['des']<1)))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }    
    }
    function validate_user($data)
    {       
        if(strlen(trim($data['email']))<1 || strlen(trim($data['password']<1)))
            {
                echo"<br>ERROR: fields are mandatory";
                return 1;
            }
    }
}
?>