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
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <title>Employee Management</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    ?>

    <br><br>
    <!-- <p align="center"><input type="text" placeholder="Search"><button type="submit"><img
                src="https://cdn-icons-png.flaticon.com/512/1296/1296902.png" alt="ADD" height="14"></button></p> -->

    <br><br><br><br><br>
    <div class ="body_border">
       
            <a href="AddEmployee.php" class="linkButton">
                <table>
                    <th>
                        <tr>

                            <td><img src="https://cdn-icons-png.flaticon.com/512/1828/1828757.png" alt="ADD"
                                    height="30">
                            </td>
                            <td><span><b> ADD EMPLOYEE</b></span></td>

                        </tr>
                    </th>
                </table>
            </a>
            <div align="center" style="overflow-x:auto;" >
                <table  >
                    <tbody>
                        <td>
                            <br>
                            
                                <table >

                                    <thead>
                                        <tr align="center" class ="data">
                                            <th class ="data"><b>ID</b> </th>
                                            <th class ="data"><b>Name</b></th>
                                            <th class ="data"><b>Father's Name</b></th>
                                            <th class ="data"><b>Mother's Name</b></th>
                                            <th class ="data"><b>Gender</b></th>
                                            <th class ="data"><b>Nid Number</b></th>
                                            <th class ="data"><b>Date of Birth</b></th>
                                            <th class ="data"><b>Blood Group</b></th>
                                            <th class ="data"><b>Email</b></th>
                                            <th class ="data"><b>Phone</b></th>
                                            <th class ="data"><b>Address</b></th>
                                            <th class ="data"><b>UserRole</b></th>
                                            <th class ="data"><b>UserName</b></th>
                                            <th class ="data"><b>Password</b></th>
                                            <th class ="data"><b>Image</b></th>
                                            <th class ="data"><b>Creating Date</b></th>

                                            <th class ="data"><b>Action</b></th>
                                        </tr>
                                    </thead>
                                    <?php

                                    include("../MODEL/MYsql Connect.php");
                                    include("../MODEL/Select.php");
                                    /*$existSqlUser = "SELECT * FROM `employee_info_tb` WHERE role = 'Inventory Staff' ORDER BY id DESC";
                                    $resultUser = mysqli_query($conn, $existSqlUser);*/

                                    $resultUser = employeeData();
                                    //$data = $resultUser->fetch_assoc();
                                    ?>


                                    <tbody>

                                        <?php foreach ($resultUser as $resultUser): ?>
                                            <tr align="center" class ="data">

                                                <td class ="data">
                                                    <?php echo $resultUser["id"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["first_name"] . " " . $resultUser["last_name"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["father_name"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["mother_name"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["gender"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["nid_number"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["dob"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["blood_group"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["email"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $resultUser["phone"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["address"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["role"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultUser["username"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $resultUser["password"]; ?>
                                                </td>
                                                <td class ="data"><img src="img/<?php echo $resultUser["image"]; ?>" width="50"
                                                        title="<?php echo $resultUser['image']; ?>"></td>
                                                <td>
                                                    <?php echo $resultUser["created_date"]; ?>
                                                </td>

                                                <td class ="data"> 
                                                    
                                                <a href="Edit.php?id=<?php echo $resultUser["id"]; ?>">
                                                        <table>
                                                            <th>
                                                                <tr>
                                                                    <td><img src="https://cdn-icons-png.flaticon.com/512/9308/9308015.png"
                                                                            alt="Edit" height="20"></td>
                                                                    
                                                                </tr>
                                                            </th>
                                                        </table>
                                                        </a> <a href="../CONTROLER/Delete.php?id=<?php echo $resultUser["id"]; ?>">
                                                        <table>
                                                            <th>
                                                                <tr>
                                                                    <td><img src="https://cdn-icons-png.flaticon.com/512/3221/3221803.png"
                                                                            alt="Delete" height="20"></td>
                                                                    
                                                                </tr>
                                                            </th>
                                                        </table>
                                                        </a> </td>


                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>



                                </table>

                            
                        </td>


                    </tbody>
                </table>


            </div>
        

    </div>


</body>

</html>