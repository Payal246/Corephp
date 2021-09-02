<?php
include "connection.php";

$start = $_POST['start'];
$end = $_POST['length'];
//echo $end;
$columnindex=$_POST['order'][0]['column'];
$columnname=$_POST['columns'][$columnindex]['data'];
$columnsortorder=$_POST['order'][0]['dir'];

$searchvalue=$_POST['search']['value'];

$stmt = $link->prepare("SELECT COUNT(*) AS allcount FROM register ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

$sql=$link->prepare("select r.*,c.c_name,s.s_name,ct.city_name from register r INNER JOIN countries c ON c.c_id=r.Country INNER JOIN states s ON s.s_id=r.State INNER JOIN cities ct ON ct.city_id=r.City WHERE Firstname like '%$searchvalue%' or Lastname like '%$searchvalue%' or Email like '%$searchvalue%' or Username like '%$searchvalue%' or Gender like '%$searchvalue%' or Country like '%$searchvalue%' or State like '%$searchvalue%' or City like '%$searchvalue%' ORDER BY Firstname ".$columnsortorder." LIMIT $start,$end");
$sql->execute();

$data=array();

while($row=$sql->fetch())
{
   $data[]=array(
      $row['Reg_id'],
      $row['Firstname'],
      $row['Lastname'],
      $row['Email'],
      $row['Username'],
      $row['Gender'],
      $row['c_name'],
      $row['s_name'],
      $row['city_name'],
      
      "<img height='50' width='50' src='image/".$row['Image']."'>",
      "<a class='btn btn-primary ' href='editform.php?userid=".$row['Reg_id']." '>Edit</a>
      <a class='btn btn-primary delete' style='color:red' id='".$row['Reg_id']."' name='delete'>Delete</a>",
    );
}
$response=array(
    "draw"=>$_POST['draw'],
    "totalRecords"=>$totalRecords,
    "recordsFiltered"=>$totalRecords,
    'data'=>$data,
);
echo json_encode($response);
?>