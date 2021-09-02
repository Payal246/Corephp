
<?php
session_start();
error_reporting (E_ERROR);
include "connection.php";

$email_err="";
$pwd_err="";
if(isset($_POST['login'])){
    
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $pwd1=md5($pwd);
    //echo $pwd1;
  if(empty($email))
    {
     $email_err="Please Enter email.";
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
   else{   
    $sql=$link->prepare("select * from register where Email='$email' and Password='$pwd1'");
    $sql->execute();
    
    $cnt=$sql->fetch();
    $p=$cnt['Password'];
               
          if($pwd1 == $p)
            {
                $_SESSION['userlogin']=$_POST['email'];
                if(isset($_REQUEST["remember"]))
                {
                      setcookie("email",$email,time()+3600);//one hr//(86400*30),"/"one day
                      setcookie("pwd",$pwd,time()+3600);//name,value,expire
                      header("location:dashboard.php?msg=success");
                }else {
                  header("location:login.php?msg=error");
                }
                 }
               $link=null;
      }
    
}

?>


<html>
<head>
<title>Login</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="js/login-validation.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>


<body class="imageblur" style="background-image:url('join-background.jpg');">

<form class="loginf" style="width:550px;text-align:center;padding:55px;position:relative;top:90px;left:450px;" action="" id="loginForm" method="POST" enctype='multipart/form-data' >

<div class="containerlogin"  >
  
      <!-- <div class="col-sm-6 ">
        <img class="side" src="pics.png"></img> 
      </div> -->
    
    <div class="centerlogin">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>SIGN IN</h4>
          </div>

      
    <div class="input-group mb-2" >
      <input type="text" style="color:white;" name="email" value="<?php if(isset($_COOKIE["email"])){echo $_COOKIE['email'];} ?>" id="email" class="form-control"  placeholder="Email">
      <!-- <span id="email_response" ></span>  -->
    </div>
    <span class="text-danger"><?php echo $email_err; ?></span>
    
    <div class="input-group mb-2">
      <input type="password" style="color:white;" name="pwd" value="<?php if(isset($_COOKIE["pwd"])){echo $_COOKIE['pwd'];} ?>" id="pwd" class="form-control"  placeholder="Password">
    </div>
    <span class="text-danger"><?php echo $pwd_err; ?></span>

    <div class="md-2" style="color:white;position:relative;right:150px;" id="term">
        <input  required class="form-check-input" type="checkbox" value="" name='remember'>
        <label  class="form-check-label" for="flexCheckDefault">
         Remember Me    
        </label>
      </div> 

    <div class="md-2" id="term" style="font-size: 15px;;">
       <a href="forgotpwd.php">Forgot Password ?</a>
      </div> 

      <div class="md-2" id="term" style="font-size: 15px;;">
       <a href="resetpassword.php">Reset Password.</a>
      </div> 

      <div class="md-2">
    <button class="button button-block" style="position:relative;top:30px;" type="submit" name="login" id="login" value="btn_login" class="btn btn-primary ">Login</button>
      </div>

    </div>



</form>
</table>
</body>
</html>

