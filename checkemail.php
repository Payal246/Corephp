<?php
include "connection.php";
$eml=$_POST['email'];
$sql1=$link->prepare("select * from register where Email='$eml'");
$sql1->execute();
$cnt=$sql1->fetch();

if($cnt>0){
   echo  "<span style='color:red'>Email already exist.</span>";
   //return false;
}
?>