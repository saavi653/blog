<?php
class conn
{
    function conn()
    {   
        $obj=new pdo("mysql:host=localhost;dbname=blog;","root","");
        return $obj;
    }
}