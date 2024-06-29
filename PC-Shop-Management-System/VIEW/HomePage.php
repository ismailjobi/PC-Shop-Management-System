<?php
session_start();

if (!isset($_SESSION["UserName"])) {

  header("location: Login.php");
  exit;



}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
</head>

<body>


  
  <?php
  include("Header.php");
  include("Menu.php");
  ?>


  <?php
  //include("Footer.php");
  ?>





</body>

</html>