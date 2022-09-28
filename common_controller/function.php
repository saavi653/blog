<?php
class controller
{
    public $obj;
    function __construct()
    {
        $obj=new connection();
        $this->obj=$obj->conn();
    }
    function view($table)
    {
        if($table=="admin")
        {
            $data=$this->obj->query("select *from admin where role='2'");
        }else
        {
            $data=$this->obj->query("select * from $table ");
        }
        $fetch=$data->fetchall(pdo::FETCH_ASSOC);
        return $fetch;
    }
    function delete($field,$id)
    { 
        $this->obj->exec("delete from $field where id='$id'");   
    }
}    
?>