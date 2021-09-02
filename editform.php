
<?php
error_reporting (E_ERROR);
include "connection.php";

$fname_err=$lname_err=$email_err="";
$uname_err=$pwd_err=$cpwd_err="";
$gender_err=$country_err=$state_err=$city_err="";
$image_err="";

if(isset($_REQUEST['userid'])){
    
    $rid=$_REQUEST['userid'];
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
    
    $sql=$link->prepare("select r.*,c.c_id,c.c_name,s.s_id,s.s_name,ct.city_id,ct.city_name from register r JOIN countries c ON c.c_id=r.Country JOIN states s ON s.s_id=r.State JOIN cities ct ON ct.city_id=r.City WHERE Reg_id='$rid'");
    // $sql=$link->prepare("select r.* from register r WHERE Reg_id='$rid'");
    $sql->execute();
    $row=$sql->fetch();
    //$sql1=$link->prepare("select s.s_id,s.s_name,c.c_id,c.c_name from countries c INNER JOIN states s ON s.c_id=c.c_id");
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
    elseif($filename!="")
    {
        $st=$link->prepare("UPDATE register SET Firstname='$fname',Lastname='$lname',Email='$email',Username='$uname',Gender='$gender',Country='$country',State='$state',City='$city',Image='$filename' where Reg_id='$rid'");
        $st->execute();
        //print_r($st);
    }
    else {
        $st=$link->prepare("UPDATE register SET Firstname='$fname',Lastname='$lname',Email='$email',Username='$uname',Gender='$gender',Country='$country',State='$state',City='$city' where Reg_id='$rid'");
        $st->execute();
        //print_r($st);
    }
}
    $sql=$link->prepare("select * from countries");
    $sql->execute();
    $fetch=$sql->fetchAll();
//  $sql2=$link->prepare("select * from states ");
// $sql2->execute();
// $fetch1=$sql2->fetchAll();

// $sql3=$link->prepare("select * from cities");
// $sql3->execute();
// $fetch2=$sql3->fetchAll();
    
?>
<html>
<head>
<title>User Update</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="js/editform-validation.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="css/style.css" >
</head>
<body class="imageblur" style="background-image:url('join-background.jpg');">
<form action="editdata.php" id="editForm" method="POST" enctype='multipart/form-data' >

<div class="container" style="padding:300px;position:relative;bottom:300px;">
  <div class="center ">
          <div class="mb-4">
            <img class="image" src="logo.jpg" ></img>
              <h4>UPDATE DATA</h4>
          </div>

          <input  type="hidden"  name="regid" value="<?php echo $row['Reg_id']; ?>"   class="form-control"   >
      <div  class="input-group mb-2">
      <!-- <i class="fa fa-user icon"></i> -->
      <input  type="text" style="color:white;" name="fname" value="<?php echo $row['Firstname']; ?>"  id="fname" Placeholder="Enter Firstname" class="form-control"   >
      </div>
      <span class="text-danger"><?php echo $fname_err; ?></span>
       

      <div class="input-group  mb-2">
        <input type="text" style="color:white;" name="lname" value="<?php echo $row['Lastname']; ?>" id="last" Placeholder="Enter Lastname" class="form-control"  >
      </div>
      <span class="text-danger"><?php echo $lname_err; ?></span>

    <div class="input-group mb-2" >
      <input type="text" style="color:white;" name="email" value="<?php echo $row['Email']; ?>"  id="email" class="form-control"  placeholder="Email">
      <span id="email_response" ></span> 
    </div>
    <span class="text-danger"><?php echo $email_err; ?></span>

    <div class="input-group mb-2" >
      <input  type="text" style="color:white;" name="uname" value="<?php echo $row['Username']; ?>" id="uname" class="form-control"  placeholder="Username">
      <span id="user_response"></span>
    </div>
    <span class="text-danger"><?php echo $uname_err; ?></span>

      
      <div class="input-group mb-2">
              <div class=" rd">
                      <label  id="male" >Male</label>
                      <input  type="radio"  name="gender" value="male" <?php if($row['Gender']!= "female") echo "checked" ; ?>>
                    
                      <label  id="female" >Female</label>
                    <input id="ifemale" type="radio" name="gender" value="female" <?php if($row['Gender']!= "male") echo "checked" ; ?> >
              </div>
      </div>
      <div class="input-group mb-2">
          <select  class="form-select" id="country" name="country">
            <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?> </option> 
            <?php
              foreach($fetch as $cnt)
              {?>
                <option value="<?php echo $cnt['c_id']; ?>" > <?php echo $cnt['c_name']; ?>   </option>
            <?php
              }
            ?>
          </select>
      </div>
      <span class="text-danger"><?php echo $country_err; ?></span>

      <div class="input-group mb-2">
        
          <select  class="form-select" id="state" name="state">
          <option> <?php echo $row['s_name']; ?></option> 
          
      </select>
      </div>
      <span class="text-danger"><?php echo $state_err; ?></span>
      

      <div class="input-group mb-2">
        
        <select class="form-select" id="city" name="city">
          <option > <?php echo $row['city_name']; ?></option>
          <?php //foreach($fetch as $row)
             // {?>
            <!-- <option value=" //echo $row['city_id']; ?> "// if($cnt2['city_id'] == $row['City']) echo "selected"; >// echo $row['city_name']; </option>  -->
          <?php
          //}
            ?>  
          </select>
      </div>
      <span class="text-danger"><?php echo $city_err; ?></span> 
      

      <div class="mb-2">
      
          <input type="file"  id="img" name="uploadfile" value="<?php echo $row['Image']; ?>"  class="form-control"  >
          <img src="image\<?php echo $row['Image']; ?> " height="55px" width="55px" ></img>
      </div>
     
      <div class="md-2">
    <button class="button button-block" type="submit" name="submit" id="btn_submit" value="submit" class="btn btn-primary ">UPDATE</button>
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

