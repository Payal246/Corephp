
<?php

error_reporting (E_ERROR);
include "connection.php";

$email_err="";
$pwd_err=$pwdn_err=$cpwd_err="";


if(isset($_POST['reset'])){
    
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $pwd1=md5($pwd);
    
    $pwdn=$_POST['pwdn'];
    $pwdn1=md5($pwdn);
    

    $cpwd=$_POST['cpwd'];
    $cpwd1=md5($cpwd);
   
    if(empty($email))
    {
        $email_err="Please Enter email";
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
      $email_err="Please enter your email You did not enter a valid email.";
      }
    if(empty($pwd))
    {
      $pwd_err="Please Enter Password and it must be at list 5 characters.";
    }
    if (!preg_match("/^[a-zA-Z0-9]\w{5,8}$/",$pwd))
    {
      $pwd_err="Please Enter Password and it must be at list 5 characters.";
    }
    if(empty($pwdn))
    {
      $pwdn_err="Please Enter Password and it must be at list 5 characters.";
    }
    if (!preg_match("/^[a-zA-Z0-9]\w{5,8}$/",$pwdn))
    {
      $pwdn_err="Please Enter Password and it must be at list 5 characters.";
    }
    if(empty($cpwd))
    {
      $cpwd_err="Please Enter Password and it must be at list 5 characters.";
    }
    if (!preg_match("/^[a-zA-Z0-9]\w{5,8}$/",$cpwd))
    {
      $cpwd_err="Please Enter Password and it must be at list 5 characters.";
    }
    if($pwdn!=$cpwd)
    {
      $cpwd_err="Enter same Password again..";
    }
    else{

        $sql=$link->prepare("select * from register where Email='$email' and Password='$pwd1'");
        $sql->execute();
        $cnt=$sql->fetch();
        $p=$cnt['Password'];
                 
        if($pwd1 == $p)
            {
                $sql=$link->prepare("UPDATE register SET Password= '$pwdn1', Cpassword='$cpwd1' where Email='$email'");
                $sql->execute();
                echo '<div class="alert alert-success " style="width:400px;position:relative;left:550px;top:20px;">
            <strong>Success!</strong>Your password has been changed successfully!</div>';
                header("location:login.php?msg=success");
                 }
                else{

                  echo '<div class="alert alert-danger">
                <strong>Sorry!</strong>Your Password has not been changed.</div>';
                    header("location:resetpassword.php?msg=error");
                }
                $link=null;
    }
}

?>


<html>
<head>
<title>Reset Password</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="js/reset-validation.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>


<body class="imageblur" style="background-image:url('join-background.jpg');">
<form class="loginf"  style="width:550px;text-align:center;padding:55px;position:relative;top:90px;left:450px;" action="" id="resetForm" method="POST" enctype='multipart/form-data' >

<div class="containerlogin"  >
  
      <!-- <div class="col-sm-6 ">
        <img class="side" src="pics.png"></img> 
      </div> -->
    
    <div class="centerlogin">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>RESET PASSWORD</h4>
          </div>

      
    <div class="input-group mb-2" >
      <input type="text" style="color:white;" name="email"  id="email" class="form-control"  placeholder="Enter Email">
     
    </div>
    <span class="text-danger"><?php echo $email_err; ?></span>
    
    <div class="input-group mb-2">
      <input type="password" style="color:white;" name="pwd"  id="pwd" class="form-control"  placeholder="Enter Old Password">
    </div>
    <span class="text-danger"><?php echo $pwd_err; ?></span>

    <div class="input-group mb-2" >
      <input type="password"  style="border-radius:10px;font-size: 13px; border-bottom-color: white;background: transparent;border-top: 0px;border-left: 0px;border-right: 0px;" name="pwdn"  id="pwdn" class="form-control"  placeholder="Enter New Password">
    </div>
    <span class="text-danger"><?php echo $pwdn_err; ?></span>

    <div class="input-group mb-2" >
      <input type="password" style="color:white;" name="cpwd"  id="cpwd" class="form-control"  placeholder="Confirm Password  ">
    </div>
    <span class="text-danger"><?php echo $cpwd_err; ?></span>
    
      <div class="md-2">
    <button class="button button-block" id="btn_reset" style="position:relative;top:30px;width:250px;" type="submit" name="reset"  value="btn_reset" class="btn btn-primary ">Reset Password</button>
      </div>

    </div>



</form>
</table>
</body>
</html>

