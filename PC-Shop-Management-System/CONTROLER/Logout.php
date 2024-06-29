<?php

session_start();
if (!isset($_SESSION["UserName"])) {
  
    header("location: ../VIEW/Login.php");
    exit;
  
  
  
}
header("location: ../VIEW/Login.php");
session_unset();
session_destroy();

?>