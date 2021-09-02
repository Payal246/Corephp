<?php
// include "connection.php";

// $sql1=$link->prepare("select c.c_name from countries c,register r where c.c_id=r.Country");
// $sql1->execute();
// $country=$sql1->fetchAll();

// print_r($country);
// echo "</br></br>";
// $r=array_column($country,'c_name');
// echo "</br></br>";
// echo "</br></br>";
// print_r($r);

// echo "</br></br>";

// $pwd=md5('xyz123');
//     $hash='613d3b9c91e9445abaeca02f2342e5a6';
    
//     //$verify=password_verify(,$hash);
//     echo $pwd;
//     echo "</br>";
//     // echo ($hash);
//     // $verify=password_verify($pwd,$hash);
//   //echo $verify;
//     if ($pwd == $hash) {
//       echo '</br> Verified!</br>';
//   } else {
//       echo '</br>Incorrect !</br>';
//   }

// echo "</br></br></br>";
// $country_code=101;
// $country_name=Mage::app()->getLocale()->getCountryTranslation($country_code);
// echo $country_name;



$to="ppatel6241996@gmail.com";
$subject="sample mail";
$message="Hii \r\n";
$message.=" hello \r\n";
$message.='I am payal';
$headers="From:demotesting0909@gmail.com";

if(mail($to,$subject,$message,$headers)){
  echo 'Your mail has been sent successfully.';
}else
  {
    echo 'Unable to send email. Please try again.';
  } 


 ?>