<?php

session_start();
header("Location:../VIEW/Take_Attendance.php");
function rawData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $flag = true;
    $_SESSION['Submited'] = true;


    $employeeId = rawData($_POST['employeeId']);
    $attendance = rawData($_POST['attendance']);

    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Select.php");
    include("../MODEL/Insert.php");
    include("../MODEL/Update.php");
    if (empty($attendance)) {
        $_SESSION['attendance_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Take_Attendance.php");
    } else {

        $_SESSION['attendance_empty'] = false;
        if ($attendance == "Present") {
            $_SESSION['attendance'] = "Present";
        } else if ($attendance == "Absent") {
            $_SESSION['attendance'] = "Absent";
        }

    }
    if (empty($employeeId)) {
        $_SESSION['employeeId_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Take_Attendance.php");
    } else {
        $_SESSION['employeeId_empty'] = false;
        $_SESSION['employeeId'] = $employeeId;
    }


    if ($flag) {

        $today = date("Y-m-d");
        /*$existSqlUser = "SELECT * FROM `employee_info_tb` WHERE id = '$employeeId' ";
        $resultUser = mysqli_query($conn, $existSqlUser);
        $numExistRowsUser = mysqli_num_rows($resultUser);*/
        $numExistRowsUser = selectUsersalaryData($employeeId);

        if ($numExistRowsUser > 0) {
            $_SESSION['userExist'] = true;
            /*$existSqlUser = "SELECT * FROM `attendance_info_tb` WHERE emplyee_id = '$employeeId' AND date = '$today'  ";
            $resultUser = mysqli_query($conn, $existSqlUser);
            $numExistRowssalaryid = mysqli_num_rows($resultUser);*/
            $numExistRowssalaryid = selectAttendance($employeeId,$today);
            if ($numExistRowssalaryid > 0) {
                /*$sql = "UPDATE attendance_info_tb SET status='$attendance' WHERE emplyee_id = '$employeeId' AND date = '$today' ";
                $result = mysqli_query($conn, $sql);*/
                $result = attendanceUpdate($employeeId,$today,$attendance);
                if ($result) {
                    $_SESSION['done'] = true;

                }
            } else {
                
                    /*$sql = "INSERT INTO `attendance_info_tb` (`attendance_id`, `emplyee_id`,`status` ,`date`) VALUES (NULL, '$employeeId', '$attendance',' $today') ;";
                    $result = mysqli_query($conn, $sql);*/
                    $result = attendance($employeeId,$today,$attendance);
                    if ($result) {
                        $_SESSION['done'] = true;
    
                    }
            }
            header("Location:../VIEW/Take_Attendance.php");

        }else {
            $_SESSION['userExist'] = false;
        } 
    }
}
$conn->close();
header("Location:../VIEW/Take_Attendance.php");
?>











?>