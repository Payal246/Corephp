<?php

include "connection.php";
if(isset($_REQUEST['regid']))
{
    $rid=$_REQUEST['regid'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
    $state=$_POST['state'];
    $city=$_POST['city'];

    $filename=$_FILES['uploadfile']['name'];
    $tempname=$_FILES['uploadfile']['tmp_name'];
    $path="image/".$filename;
    if($filename!="")
    {
        $st=$link->prepare("UPDATE register SET Firstname='$fname',Lastname='$lname',Email='$email',Username='$uname',Gender='$gender',Country='$country',State='$state',City='$city',Image='$filename' where Reg_id='$rid'");
        $st->execute();
        print_r($st);
    }
    else {
        $st=$link->prepare("UPDATE register SET Firstname='$fname',Lastname='$lname',Email='$email',Username='$uname',Gender='$gender',Country='$country',State='$state',City='$city' where Reg_id='$rid'");
        $st->execute();
        print_r($st);
    }
        header("location:dashboard.php");
}
?>