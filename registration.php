
<?php
error_reporting (E_ERROR);
include "connection.php";
include "Corephp/vendor/autoload.php";

$fname_err=$lname_err=$email_err="";
$uname_err=$pwd_err=$cpwd_err="";
$gender_err=$country_err=$state_err=$city_err="";
$image_err="";

if(isset($_POST['submit'])){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['uname'];
    $pwd=$_POST['pwd'];
    $hash=md5($pwd);
    //$cpwd=$_POST['cpwd'];
    $gender=$_POST['gender'];
    $country=$_POST['country'];
   
     $state=$_POST['state'];
     $city=$_POST['city'];
    $img=$_POST['uploadfile'];
    if(empty($fname))
    {
      $fname_err="Please Enter Firstname.";
     
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$fname))
    {
      $fname_err="Only alphabets are allowed";
    }
    if(empty($lname))
    {
      $lname_err="Please Enter Lastname.";
      
    }
    if (!preg_match("/^[a-zA-Z ]*$/",$lname))
    {
      $lname_err="Only alphabets are allowed";
    }

    if(empty($email))
    {
  
      $email_err="Please Enter email.";
      
    }
    
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
      {
      $email_err="Please enter your email You did not enter a valid email.";
      }
    if(empty($username))
    {
      $uname_err="Please Enter Username.";
      

    }
    if (!preg_match("/^[a-zA-Z]*$/",$uname))
    {
      $uname_err="Only alphabets are allowed";
    }

    if(empty($hash))
    {
      $pwd_err="Please Enter Password.";
      
    }
    if (!preg_match("/^[a-zA-Z0-9]\w{5,8}$/",$hash))
    {
      $pwd_err="Please Enter Password and it must be at list 5 characters.";
    }
    
    if(empty($gender))
    {
      $gender_err="Please select gender.";
     
    }
    if(empty($country))
    {
      $country_err="Please select country.";
      
    }
    if(empty($state))
    {
      $state_err="Please select state.";
     
    }

    if(empty($city))
    {
      $city_err="Please select city.";
     
    }
    // if(empty($img))
    // {
    //   $image_err="Please Upload Profile.";
    //   $i++;
    
   else{   
    

      $filename=$_FILES["uploadfile"]["name"];
      $tempname=$_FILES["uploadfile"]["tmp_name"];
      $path="image/".$filename;
      $sql="insert into register(Firstname,Lastname,Email,Username,Password,Cpassword,Gender,Country,State,City,Image) values('$fname','$lname','$email','$username','$hash','$hash','$gender','$country','$state','$city','$filename')";
       //print_r($sql);
     //print_r("hello");
        if($link->query($sql)){
            move_uploaded_file($tempname,$path);


          header("location:login.php");
        }
        else{
          header("location:registration.php?msg=error");
        }
        $link=null;
        
    }
}

?>


<html>
<head>
<title>User Registration</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="js/form-validation.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>

<body class="imageblur" style="background-image:url('join-background.jpg');">
<form action="" id="regForm" method="POST" enctype='multipart/form-data' >

<div class="container">
  <div class="row">
      <div class="col-sm-6 ">
        <img class="side" src="pics.png"></img> 
      </div>
    <div class="col-sm-6">
    <div class="center ">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>SIGN UP</h4>
          </div>

      <div  class="input-group mb-2">
      <!-- <i class="fa fa-user icon"></i> -->
      <input  type="text"  name="fname" minlength="2"  id="fname" class="form-control"  placeholder="First Name">
      </div>
      <span class="text-danger"><?php echo $fname_err; ?></span>  

      <div class="input-group  mb-2">
        <input type="text" name="lname"  id="last" class="form-control"  placeholder="Last Name">
      </div>
    <span class="text-danger"><?php echo $lname_err; ?></span>

    <div class="input-group mb-2" >
      <input type="text" name="email"  id="email" class="form-control"  placeholder="Email">
      <span id="email_response" ></span> 
    </div>
    <span class="text-danger"><?php echo $email_err; ?></span>

    <div class="input-group mb-2" >
      <input  type="text" name="uname"  id="uname" class="form-control"  placeholder="Username">
      <span id="user_response"></span>
    </div>
    <span class="text-danger"><?php echo $uname_err; ?></span>

    <div class="input-group mb-2">
      <input type="password" name="pwd"  id="pwd" class="form-control"  placeholder="Password">
    </div>
    <span class="text-danger"><?php echo $pwd_err; ?></span>

      
      
      <div class="input-group mb-2">
              <div class=" rd">
                      <label  id="male" >Male</label>
                      <input  type="radio"  name="gender" value="male">
                    
                      <label  id="female" >Female</label>
                    <input id="ifemale" type="radio"  name="gender" value="female" >
              </div>
      </div>
        <span class="text-danger"><?php echo $gender_err; ?></span>  



      <div class="input-group mb-2">
          <select class="form-select" id="country" name="country">Country
                <option disabled selected hidden>Select Country</option>
                <?php
              include "connection.php";
              $sql=$link->prepare("select * from countries");
              $sql->execute();
              $fetch=$sql->fetchall();
              foreach($fetch as $cnt)
              {
                echo "<option value=   '".$cnt['c_id']."'   >"   . $cnt['c_name'].   "</option>";
                
              }

              
              ?>
          </select>
      </div>
      <span class="text-danger"><?php echo $country_err; ?></span>

      <div class="input-group mb-2">
        
          <select class="form-select" id="state" name="state">
            <option disabled selected hidden >Select State</option>
            </select>
      </div>  
      <span class="text-danger"><?php echo $state_err; ?></span>

      <div class="input-group mb-2">
        
        <select class="form-select" id="city" name="city">
          <option disabled selected hidden>Select City</option>
          </select>
      </div>
      <span class="text-danger"><?php echo $city_err; ?></span> 

      <div class="mb-2">
          <input type="file"  id="img" name="uploadfile" class="form-control"  >
      </div>
      <span class="text-danger"><?php echo $image_err; ?></span> 


      <div class="md-2" id="term">
        <input class="form-check-input" type="checkbox" value="" name='td' >
        <label  class="form-check-label" for="flexCheckDefault">
          I accept the terms of use.
        </label>
      </div> 

      <div class="md-2">
    <button class="button button-block" type="submit" name="submit" id="btn_submit" value="submit" class="btn btn-primary ">Register</button>
      </div>

</div>
</div>
</div>

</form>
</table>

<script>
// State by country...........................//
$(document).ready(function(){
$('#country').on('change',function(){
  
//alert("inside");
var country_id=this.value;
//alert(country_id);
  $.ajax({
        url:"selectstate.php" ,
      type:"POST",
      data:{countid:country_id},
      cache:false,
      success:function(result)
      {
      $('#state').html(result);
      $('#city').html('<option value="">select state first</option>');
      }
    });
  });
});


//City by state......................................//

$(document).ready(function(){
$('#state').on('change',function(){
  
//alert("inside");
var sid=this.value;
  $.ajax({
    //alert("inside");
        url:"selectcity.php" ,
      type:"POST",
      data:{stateid:sid},
      cache:false,
      success:function(result)
      {
        
      $('#city').html(result);
      
      }
    });
  });


//Check unique email and username...................................//

  $('#email').on('change',function(){
    //alert("inside");
    var varemail=$('#email').val();
    //alert(varemail);
    $.ajax({
        url:"checkemail.php",
        type:"POST",
        data:{email:varemail},
        success:function(response){
        if(response == "<span style='color:red'>Email already exist.</span>"){
          //alert("exist");
          $("#btn_submit").attr("disabled", true);  
        }
        else{
          //alert("new");
            $("#btn_submit").attr("disabled", false);  
          }
        $('#email_response').html(response);
        }
      });
    
  });



      $('#uname').on('change',function(){
          //alert("inside");
          var varunm=$('#uname').val();
          //alert(varunm);
          $.ajax({
              url:"checkuname.php",
              type:"POST",
              data:{username:varunm},
              success:function(response)
              {
                if(response == "<span style='color:red'>Username already exist.</span>"){
                //alert("exist");
                $("#btn_submit").attr("disabled", true);  
                }
             else{
                //alert("new");
                 $("#btn_submit").attr("disabled", false);  
                 }
                $('#user_response').html(response);  
              }
            });
          
        });
});

</script>
</body>
</html>

