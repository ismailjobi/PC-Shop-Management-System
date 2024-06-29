<?php

session_start();
header("Location:../VIEW/AddEmployeeSalaryInfo.php");
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

    $salary = rawData($_POST['salary']);
    $employeeId = rawData($_POST['employeeId']);


    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Insert.php");
    include("../MODEL/Update.php");
    include("../MODEL/Select.php");

    if (empty($salary)) {
        $_SESSION['salary_empty'] = true;

        $flag = false;
        header("Location:../VIEW/AddEmployeeSalaryInfo.php");
    } else {
        $_SESSION['salary_empty'] = false;
        $_SESSION['salary'] = $salary;


    }
    if (empty($employeeId)) {
        $_SESSION['employeeId_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployeeSalaryInfo.php");
    } else {
        $_SESSION['employeeId_empty'] = false;
        $_SESSION['employeeId'] = $employeeId;
    }


    if ($flag) {


        /*$existSqlUser = "SELECT * FROM `employee_info_tb` WHERE id = '$employeeId' ";
        $resultUser = mysqli_query($conn, $existSqlUser);
        $numExistRowsUser = mysqli_num_rows($resultUser);*/
        $numExistRowsUser = selectUser($employeeId);

        if ($numExistRowsUser > 0) {
            $_SESSION['userExist'] = true;
            /*$existSqlUser = "SELECT * FROM `salary_info_tb` WHERE employee_id = '$employeeId' ";
            $resultUser = mysqli_query($conn, $existSqlUser);
            $numExistRowssalaryid = mysqli_num_rows($resultUser);*/
            $numExistRowssalaryid = selectUsersalaryData($employeeId);
            if($numExistRowssalaryid > 0)
            {
               /* $sql = "UPDATE salary_info_tb SET salary='$salary' WHERE employee_id = '$employeeId' ";
                $result = mysqli_query($conn, $sql);*/
                $result = salaryDataUpdate($salary,$employeeId);
                if ($result) {
                    $_SESSION['done'] = true;
    
                }
            }
            else{

                /*$sql = "INSERT INTO `salary_info_tb` (`salary_id`, `employee_id`, `salary`) VALUES (NULL, '$employeeId', '$salary');";
                $result = mysqli_query($conn, $sql);*/
                $result = salaryData($salary,$employeeId);
                if ($result) {
                    $_SESSION['done'] = true;
    
                }
                
            }
            header("Location:../VIEW/AddEmployeeSalaryInfo.php");

        } else {
            $_SESSION['userExist'] = false;
        }
    }
}
$conn->close();
header("Location:../VIEW/AddEmployeeSalaryInfo.php");
?>