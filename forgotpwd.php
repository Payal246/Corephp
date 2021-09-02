<?php
error_reporting (E_ERROR);
include "connection.php";

$email_err="";
$pwd_err="";
if(isset($_REQUEST['fpwd'])){
    $emailto=$_POST['email'];

    if(empty($emailto))
    {
     $email_err="Please Enter email.";
    }
    if(!filter_var($emailto, FILTER_VALIDATE_EMAIL))
    {
      $email_err="Please enter your email You did not enter a valid email.";
    }
    else{
      $sql=$link->prepare("select * from register where Email='$emailto'");
      $sql->execute();
      $cnt=$sql->fetch();
      $p=$cnt['Email'];
      if($cnt>0){
        $subject="Forgot your password";
        
        $message="<html><head>FORGOT PASSWORD</head> \r\n";
        $message.="<body><h3> We have sent you this email in response to your request to reset your password";
        $message.="<h3>To reset your password.Please follow the link<a href='http://localhost/payal/Corephp/forgotform.php?email=".$p."'>click here to reset your password</a></h3> \r\n";
        $message.="<h3>If you did not request a password reset,you can safely ignore this email.Only a persone with access to your email can reset your account password.</h3>";
        $message.="</body></html> \r\n";
        $headers="From:demotesting0909@gmail.com \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
          if(mail($emailto,$subject,$message,$headers)){
           echo '<div class="alert alert-success " style="width:400px;position:relative;left:550px;top:20px;">
                  <strong>Success!</strong> Your Email has been sent.</div>';

          }else{
            echo '<div class="alert alert-danger">
                <strong>Sorry!</strong>Your Email has not been sent.</div>';
            } 

      }else {
        echo '<div class="alert alert-danger"style="width:400px;position:relative;left:550px;top:20px;">
              <strong>Sorry!</strong>No user is registered with this email address ! </div>';
        }
     }
 }
?>
<html>
<head>
<title>Forgot Password</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/forgotpwd-validation.js"></script>
<link src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css"></link>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css" >
</head>

<body class="imageblur" style="background-image:url('join-background.jpg');">
<form class="loginf" style="width:550px;text-align:center;padding:55px;position:relative;top:90px;left:450px;" action="" id="fpwdForm" method="POST" enctype='multipart/form-data' >

<div class="containerlogin"  >
  
    <div class="centerlogin">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>Forgot Your password </h4>
          </div>
  <div class="input-group mb-2" >
      <input type="text" style="color:white;" name="email"  id="email" class="form-control"  placeholder="Enter your Email">
      <span id="email_response" ></span> 
    </div>
    <span class="text-danger"><?php echo $email_err; ?></span>
    
    <div class="md-2">
    <button class="button button-block" style="position:relative;top:30px;width:200px;" type="submit" name="fpwd" id="login" value="btn_fpwd" class="btn btn-primary ">Send Email</button>
      </div>

      <div class="md-2" id="term" style="color:white;">
       <a class="button button-block" style="position:relative;top:30px;width:200px;" href="login.php">Login</a>
      </div> 

    </div>
</form>
</table>
</body>
</html>

<!-- <script>
    Swal.fire({
        title: 'Email sent',
        text: 'Email has been sent',
        icon: 'success',
        confirmButtonText: 'OK'
        }); 
    

</script>-->