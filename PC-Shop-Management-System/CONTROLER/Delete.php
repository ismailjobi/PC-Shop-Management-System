<?php
session_start();
header("Location:../VIEW/Employee_Management.php");
if (!isset($_SESSION["UserName"])) {

    header("location: ../VIEW/Login.php");
    exit;
}
 $id = $_GET['id'];
 include("../MODEL/MYsql Connect.php");
 $sql="DELETE FROM `employee_info_tb` WHERE `employee_info_tb`.`id` = '$id'";
 mysqli_query($conn, $sql);

?>