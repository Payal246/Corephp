<?php
include "connection.php";

$country_id=$_POST["countid"];

$sql=$link->prepare("select * from states where c_id=$country_id");
$sql->execute();
$fetch=$sql->fetchall();
//echo "$fetch";
foreach($fetch as $cnt)
{
  echo "<option value='".$cnt['s_id']."'>". $cnt['s_name']."</option>";
  
}
?>