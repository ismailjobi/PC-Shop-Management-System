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
    <title>Salary Sheet</title>
</head>

<body>




    <br><br><br><br><br>



    <div align="center">
        <table>
            <tbody>
                <td>
                    <fieldset>
                        <table>
                            <th>
                            <td>

                                <table align="center">
                                    <th>
                                        <tr>
                                            <td>
                                                <img src="https://cdn-icons-png.flaticon.com/128/2933/2933245.png"
                                                    alt="Logo" height="50">
                                            </td>
                                            <td align="right">
                                                <p><i>SSI COMPUTER <br> SHOP</i></p><br>
                                            </td>

                                        </tr>
                                    </th>
                                </table>
                                <h4>
                                    <?php
                                    $first_day_this_month = date('Y/m/01'); // hard-coded '01' for first day
                                    $today = date("Y-m-d");

                                    ?>
                                    <p align="center"><b>Sallary Sheet<?php echo " ".$first_day_this_month." "."to"." ".$today; ?> </b></p>
                                </h4><br>
                                <table>

                                    <thead>
                                        <tr align="center">
                                            <td><b>ID</b> </td>
                                            <td><b>Name</b></td>
                                            <td><b>UserName</b></td>
                                            <td><b>Per Day Salary</b></td>
                                            <td><b>Attendance</b></td>
                                            <td><b>Salary</b></td>


                                        </tr>
                                    </thead>
                                    <?php
                                    include("../MODEL/MYsql Connect.php");
                                    $sql = "SELECT employee_info_tb.*, salary_info_tb.* FROM salary_info_tb, employee_info_tb WHERE  salary_info_tb.employee_id= employee_info_tb.id";
                                    $resultratig = mysqli_query($conn, $sql);
                                    ?>
                                    <tbody>
                                        <?php foreach ($resultratig as $resultratig): ?>
                                            <?php

                                            $employeeId = $resultratig["id"];
                                            $total_attendance = mysqli_query($conn, "select count(*) as total_count from attendance_info_tb where emplyee_id='$employeeId' AND date between '2023/03/10' and '2023/03/15' AND status='Present'");
                                            $res = mysqli_fetch_assoc($total_attendance);
                                            $count = $res['total_count'];
                                            ?>
                                            <tr align="center">
                                                <td>
                                                    <?php
                                                    echo $resultratig["id"] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $resultratig["first_name"] . " " . $resultratig["last_name"]; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $resultratig["username"]; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $resultratig["salary"]; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $count; ?>
                                                </td>

                                                <td>
                                                    <?php
                                                    echo $resultratig["salary"] * $count; ?>
                                                </td>

                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>


                                </table><br><br><br>


                    </fieldset>
                </td>


            </tbody>
        </table>


    </div>


</body>

</html>