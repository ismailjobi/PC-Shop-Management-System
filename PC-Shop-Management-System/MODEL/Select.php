<?php


function nidExist($Nid)
{
    require("MYsql Connect.php");
    
    $existSqlNid = "SELECT * FROM `employee_info_tb` WHERE nid_number = ? ";
    $stmt = $conn->prepare($existSqlNid);
    $stmt->bind_param("s", $Nidd);
    $Nidd=$Nid;
    $stmt->execute();
    $numExistRowsNid=$stmt->get_result()->num_rows;
    return  $numExistRowsNid;

}
function emailExist($email)
{
    require("MYsql Connect.php");
    
    $existSqlEmail = "SELECT * FROM `employee_info_tb` WHERE email = ? ";
    $stmt = $conn->prepare($existSqlEmail);
    $stmt->bind_param("s", $emaild);
    $emaild=$email;
    $stmt->execute();
    $numExistRowsEmail=$stmt->get_result()->num_rows;
    return  $numExistRowsEmail;

}
function userNameExist( $userName)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("s", $username);
    $username=$userName;
    $stmt->execute();
    $numExistRowsUser=$stmt->get_result()->num_rows;
    return  $numExistRowsUser;

}
function loginUserData( $userName,$passwordLogin)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = ? AND password= ? AND role = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("sss", $username,$password,$role);
    $username=$userName;
    $password=$passwordLogin;
    $role='Manager';
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}
function login( $userName,$passwordLogin)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = ? AND password= ? AND role = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("sss", $username,$password,$role);
    $username=$userName;
    $password=$passwordLogin;
    $role='Manager';
    $stmt->execute();
    $numExistRowsUser=$stmt->get_result()->num_rows;
    //$existUserData=$stmt->execute();;
    return  $numExistRowsUser;

}
function employeeData( )
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE  role = ? ORDER BY id DESC";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("s", $role);
    
    $role = 'Inventory Staff';
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    //$data = $result->fetch_assoc();
    return  $result;

}
function employeeDatajs( )
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT nid_number,email,username FROM `employee_info_tb`  ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}
function taskList()
{
    require("MYsql Connect.php");
    
    $existSqlTask = "SELECT * FROM `task_info_tb`  ORDER BY task_id DESC";
    $stmt = $conn->prepare($existSqlTask);
    //$stmt->bind_param("s", $role);
    
    //$role = 'Inventory Staff';
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    //$data = $result->fetch_assoc();
    return  $result;

}
function salarySheet()
{
    require("MYsql Connect.php");
    
    $existSqlSalary = "SELECT employee_info_tb.*, salary_info_tb.* FROM salary_info_tb, employee_info_tb WHERE  salary_info_tb.employee_id= employee_info_tb.id";
    $stmt = $conn->prepare($existSqlSalary);
    //$stmt->bind_param("s", $role);
    
    //$role = 'Inventory Staff';
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    //$data = $result->fetch_assoc();
    return  $result;

}
function attendanceCount($employeeId,$first_day_this_month,$last_day_this_month)
{
    require("MYsql Connect.php");
    
    $existSqlSalary = "select count(*) as total_count from attendance_info_tb where emplyee_id= ? AND date between ? and ? AND status= ?";
    $stmt = $conn->prepare($existSqlSalary);
    $stmt->bind_param("isss",$id,$fDate,$lDate, $status);
    
    $id=$employeeId;
    $fDate=$first_day_this_month;
    $lDate=$last_day_this_month;
    $status='Present';
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}

function selectUser($employeeId)
{
    require("MYsql Connect.php");
    
    $existSqlSelect = "SELECT * FROM `employee_info_tb` WHERE id = ?";
    $stmt = $conn->prepare($existSqlSelect);
    $stmt->bind_param("i", $id);
    $id=$employeeId;
    $stmt->execute();
    $numExistRows=$stmt->get_result()->num_rows;
    return  $numExistRows;

}
function selectUsersalaryData($employeeId)
{
    require("MYsql Connect.php");
    
    $existSqlSelect = "SELECT * FROM `salary_info_tb` WHERE employee_id = ? ";
    $stmt = $conn->prepare($existSqlSelect);
    $stmt->bind_param("i", $id);
    $id=$employeeId;
    $stmt->execute();
    $numExistRows=$stmt->get_result()->num_rows;
    return  $numExistRows;

}
function selectData()
{
    require("MYsql Connect.php");
    
    $existSqlSelect = "SELECT * FROM employee_info_tb";
    $stmt = $conn->prepare($existSqlSelect);
    //$stmt->bind_param("i", $id);
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    //$data = $result->fetch_assoc();
    return $result;
}
function attendanceInfo()
{
    require("MYsql Connect.php");
    
    $existSqlAttendance = "SELECT employee_info_tb.*, attendance_info_tb.* FROM attendance_info_tb, employee_info_tb WHERE  attendance_info_tb.emplyee_id= employee_info_tb.id ORDER BY date DESC";
    $stmt = $conn->prepare($existSqlAttendance);
    //$stmt->bind_param("s", $role);
    
    //$role = 'Inventory Staff';
    
    $stmt->execute();
    $result = $stmt->get_result(); 
    //$data = $result->fetch_assoc();
    return  $result;

}
function selectAttendance($employeeId,$today)
{
    require("MYsql Connect.php");
    
    $existSqlSelect = "SELECT * FROM `attendance_info_tb` WHERE emplyee_id = ? AND date = ?";
    $stmt = $conn->prepare($existSqlSelect);
    $stmt->bind_param("is", $id,$todayd);
    $id=$employeeId;
    $todayd=$today;
    $stmt->execute();
    $numExistRows=$stmt->get_result()->num_rows;
    return  $numExistRows;

}

function UserData($id)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE id = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("i", $idN);
    $idN=$id;
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}
function UserProfileData($loginUserName)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("s", $userName);
    $userName=$loginUserName;
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}
function selectEmail($email)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE  email = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("s", $emailN);
    $emailN=$email;
    $stmt->execute();
    $result = $stmt->get_result(); 
    $data = $result->fetch_assoc();
    return  $data;

}

function machPass($currantPass)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE  password=?";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("s", $currantPassN);
    $currantPassN=$currantPass;
    $stmt->execute();
    $numExistRows=$stmt->get_result()->num_rows;
    return  $numExistRows;

}
?>