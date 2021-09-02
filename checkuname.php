<?php
include "connection.php";
$user=$_POST['username'];
$sql1=$link->prepare("select * from register where Username='$user'");
$sql1->execute();
$cnt=$sql1->fetch();

if($cnt>0){
   
   echo  "<span style='color:red'>Username already exist.</span>";
}
?>