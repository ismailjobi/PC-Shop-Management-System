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
    <title>Salary Sheet</title>
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
            <a href="AddEmployeeSalaryInfo.php" class="linkButton">
                <table>
                    <th>
                        <tr>

                            <td><img src="https://cdn-icons-png.flaticon.com/512/1828/1828757.png" alt="ADD"
                                    height="30">
                            </td>
                            <td><span><b> ADD Salary Information</b></span></td>
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
                                            <th class ="data"><b>Per Day Salary</b></th>
                                            <th class ="data"><b>Attendance</b></th>
                                            <th class ="data"><b>Salary</b></th>


                                        </tr>
                                    </thead>
                                    <?php
                                    include("../MODEL/MYsql Connect.php");
                                    include("../MODEL/Select.php");
                                    
                                    /*$sql = "SELECT employee_info_tb.*, salary_info_tb.* FROM salary_info_tb, employee_info_tb WHERE  salary_info_tb.employee_id= employee_info_tb.id";
                                    //$sql = "SELECT * FROM employee_info_tb ";
                                    $resultratig = mysqli_query($conn, $sql);*/
                                    $resultratig = salarySheet();
                                    ?>
                                    <tbody>
                                        <?php foreach ($resultratig as $resultratig): ?>
                                            <?php
                                            $first_day_this_month = date('Y/m/01'); // hard-coded '01' for first day
                                            $last_day_this_month = date('Y/m/t');
                                            $employeeId=$resultratig["id"];
                                            /*$total_attendance = mysqli_query($conn,"select count(*) as total_count from attendance_info_tb where emplyee_id='$employeeId' AND date between '$first_day_this_month ' and '$last_day_this_month ' AND status='Present'");
                                            $res = mysqli_fetch_assoc($total_attendance);*/
                                            $res = attendanceCount($employeeId,$first_day_this_month,$last_day_this_month);
                                            $count = $res['total_count'];
                                            ?>
                                            <tr align="center" class ="data">
                                                <td class ="data">
                                                    <?php
                                                    echo $resultratig["id"] ?>
                                                </td>
                                                <td class ="data">
                                                    <?php
                                                    echo $resultratig["first_name"] . " " . $resultratig["last_name"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php
                                                    echo $resultratig["username"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php
                                                    echo $resultratig["salary"]; ?>
                                                </td>
                                                <td class ="data">
                                                    <?php
                                                    echo $count; ?>
                                                </td>

                                                <td class ="data">
                                                    <?php
                                                    echo $resultratig["salary"] * $count; ?>
                                                </td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>


                                </table>
                                <table align="right">
                                    <th>
                                        <tr>

                                            <td>

                                                <button type="submit" name="print">
                                                    <table>
                                                        <th>
                                                            <tr>
                                                                <td><img src="https://cdn-icons-png.flaticon.com/512/3022/3022313.png"
                                                                        height="15"></td>
                                                                <td><span><b><a href="Print.php">Print
                                                                                Sheet</a></b></span>
                                                                </td>
                                                            </tr>
                                                        </th>
                                                    </table>

                                                </button>

                                            </td>

                                        </tr>
                                    </th>
                                </table>

                            
                        </td>


                    </tbody>
                </table>


            </div>
            </div>
        
        

</body>

</html>
