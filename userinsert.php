<?php

include "connection.php";

$name_err="";

if (isset($_POST['submit']))
{
    
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $username=$_POST['uname'];
        $pwd=$_POST['pwd'];
        $cpwd=$_POST['cpwd'];
        $gender=$_POST['gender'];
        $country=$_POST['country'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $filename=$_FILES["uploadfile"]["name"];
        $tempname=$_FILES["uploadfile"]["tmp_name"];
        //echo "$filename";
        $path="image/".$filename;

        







        $sql="insert into register(Firstname,Lastname,Email,Username,Password,Cpassword,Gender,Country,State,City,Image) values('$fname','$lname','$email','$username','$pwd','$cpwd','$gender','$country','$state','$city','$filename')";
    
        if($link->query($sql)){
            move_uploaded_file($tempname,$path);
           header("location:registration.php?msg=success");
        }
        else{
            echo "Not inserted...";
        }
        $link=null;
        
    }

?>