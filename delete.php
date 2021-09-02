<?php
include "connection.php";
if(isset($_POST['rid']))
{
    $id=$_POST['rid'];
    //echo $id;
    $sql=$link->prepare("delete from register where Reg_id='$id'");
    $sql->execute();
}

?>