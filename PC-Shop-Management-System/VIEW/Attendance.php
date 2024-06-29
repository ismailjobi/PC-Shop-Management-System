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
    <title>Attendance Sheet</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    $today = date("Y-m-d");
    

    ?>

    <form action="../CONTROLER/AttendanceOparetion.php" method="post" novalidate >

        <br><br>
        <!-- <p align="center"><input type="text" placeholder="Search"><button type="submit"><img
                    src="https://cdn-icons-png.flaticon.com/512/1296/1296902.png" alt="ADD" height="14"></button></p> -->

        <br><br><br><br><br>
        
            <div class ="body_border">
            <a href="Take_Attendance.php" class="linkButton">
                <table>
                    <th>
                        <tr>

                            <td><img src="https://cdn-icons-png.flaticon.com/512/1828/1828757.png" alt="ADD"
                                    height="30">
                            </td>
                            <td><span><b> Take Attendance</b></span></td>
                        </tr>
                    </th>
                </table>
                </a>
            
            <div align="center">
                <table>
                    <tbody>
                        <td>
                            
                            
                                <table >

                                    <thead>
                                        <tr align="center" class ="data">
                                            <th class ="data"><b>ID</b> </th>
                                            <th class ="data"><b>Name</b></th>
                                            <th class ="data"><b>UserName</b></th>
                                            <th class ="data"> <b>Date</b></th>
                                            <th class ="data"> <b>Status</b></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    include("../MODEL/MYsql Connect.php");
                                    include("../MODEL/Select.php");
                                   /* $sql = "SELECT employee_info_tb.*, attendance_info_tb.* FROM attendance_info_tb, employee_info_tb WHERE  attendance_info_tb.emplyee_id= employee_info_tb.id";
                                    //$sql = "SELECT * FROM  employee_info_tb ; ";
                                    $resultInfo = mysqli_query($conn, $sql);*/
                                    $resultInfo = attendanceInfo();
                                    ?>
                                    <tbody>
                                        <?php foreach ($resultInfo as $resultInfo): ?>
                                            <tr align="center" class ="data">
                                                <td class ="data">
                                                    <?php echo $resultInfo["id"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultInfo["first_name"] . " " . $resultInfo["last_name"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php echo $resultInfo["username"]; ?>
                                                </td>
                                                <td class ="data"> <?php echo $resultInfo["date"]; ?></td>
                                                <td class ="data"> <?php echo $resultInfo["status"]; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>


                                </table>
                                

                            
                        </td>


                    </tbody>
                </table>


            </div>
            </div>
        
        
       

    </form>
</body>

</html>