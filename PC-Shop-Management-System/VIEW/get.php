<?php
include("../MODEL/MYsql Connect.php");

$sql = "SELECT * FROM `employee_info_tb` WHERE  role = ? ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$arr1 = array();

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
      $arr1[] = $row;
  }
} 

echo json_encode($arr1); 


?>