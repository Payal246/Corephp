
<?php
error_reporting (E_ERROR);
include "connection.php";
$pwdn_err=$cpwd_err="";

if(isset($_POST['reset'])){
    
    $email=$_REQUEST['email'];
    $pwdn=$_POST['pwdn'];
    $pwdn1=md5($pwdn);
    //echo $pwdn1;
    $cpwd=$_POST['cpwd'];
    $cpwd1=md5($cpwd);
   //echo $cpwd1
    
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
    if($cpwd!=""){
        $sql=$link->prepare("UPDATE register SET Password= '$pwdn1', Cpassword='$cpwd1' where Email='$email'");
        $sql->execute();
        
        //$_SESSION['useremail']=$_POST['Email'];

       // header("location:login.php?msg=success");
            echo '<div class="alert alert-success " style="width:400px;position:relative;left:550px;top:20px;">
            <strong>Success!</strong>Your password has been changed successfully!</div>';
          

        
    }
    $link=null;
}
?>
<html>
<head>
<title>Reset Password</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="js/resetpwd-validation.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>
<body class="imageblur" style="background-image:url('join-background.jpg');">



<form class="loginf"  style="width:550px;text-align:center;padding:55px;position:relative;top:90px;left:450px;" action="" id="resetForm" method="POST" enctype='multipart/form-data' >

<div class="containerlogin"  >
  <div class="centerlogin">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>RESET PASSWORD</h4>
          </div>

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


      <div class="md-2" id="term" style="color:white;">
       <a class="button button-block" style="position:relative;top:30px;width:200px;" href="login.php">Login</a>
      </div> 

    </div>
</form>
</table>
</body>
</html>

