<?php
function salaryDataUpdate($salary,$employeeId)
{
    require("MYsql Connect.php");
    
    $sql = "UPDATE salary_info_tb SET salary= ? WHERE employee_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $salaryd , $id);
    
    $salaryd=$salary;
    $id=$employeeId;

    $result=$stmt->execute();
    return  $result;

}
function attendanceUpdate($employeeId,$today,$attendance)
{
    require("MYsql Connect.php");
    
    $sql = "UPDATE attendance_info_tb SET status= ? WHERE emplyee_id = ? AND date = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $attendanced , $id,$todayd);
    
    $todayd=$today;
    $id=$employeeId;
    $attendanced=$attendance;

    $result=$stmt->execute();
    return  $result;

}
function employeeDataUpdate($id,$fName, $lName, $faName, $mName,  $Nid, $dob, $bog, $email, $phone, $add,  $passwordUser, $newImageName)
{
    require("MYsql Connect.php");
    
    $sql = "UPDATE employee_info_tb SET first_name = ?,last_name= ?,father_name= ?,mother_name=?,nid_number=?,dob=?,blood_group=?,email=?,phone=?,address= ?,password=?,image=?  WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisssssisi", $firstname , $lastname,$fathername,$mothername,$nidnumber,$dobd,$bloodgroup,$emaild,$phoned,$address,$password,$image,$idN);
    $firstname = $fName;
    $lastname = $lName;
    $fathername=$faName;
    $mothername = $mName;
    $idN=$id;
    $nidnumber=$Nid;
    $dobd=$dob;
    $bloodgroup =$bog;
    $emaild=$email;
    $phoned=$phone;
    $address=$add;
    $password=$passwordUser;
    $image=$newImageName;
    

    $result=$stmt->execute();
    return  $result;

}

function profileDataUpdate($loginUserName,$fName, $lName, $faName, $mName,  $Nid, $dob, $bog, $email, $phone, $add,  $passwordUser, $newImageName)
{
    require("MYsql Connect.php");
    
    $sql = "UPDATE employee_info_tb SET first_name = ?,last_name= ?,father_name= ?,mother_name=?,nid_number=?,dob=?,blood_group=?,email=?,phone=?,address= ?,password=?,image=?  WHERE username= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssisssssiss", $firstname , $lastname,$fathername,$mothername,$nidnumber,$dobd,$bloodgroup,$emaild,$phoned,$address,$password,$image,$userName);
    $firstname = $fName;
    $lastname = $lName;
    $fathername=$faName;
    $mothername = $mName;
    $userName=$loginUserName;
    $nidnumber=$Nid;
    $dobd=$dob;
    $bloodgroup =$bog;
    $emaild=$email;
    $phoned=$phone;
    $address=$add;
    $password=$passwordUser;
    $image=$newImageName;
    

    $result=$stmt->execute();
    return  $result;

}
function passUpdate($loginUserName,$confirmPass)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "UPDATE employee_info_tb SET password=? WHERE username = ? ";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("ss",$confirmPassN ,$userName);
    $userName=$loginUserName;
    $confirmPassN=$confirmPass;
    
    $result = $stmt->execute();
   
    return   $result;

}
function forgotPassUpdate($email,$newPassword)
{
    require("MYsql Connect.php");
    
    $existSqlUser = "UPDATE employee_info_tb SET password=? WHERE  email =?";
    $stmt = $conn->prepare($existSqlUser);
    $stmt->bind_param("ss",$newPasswordN ,$emailN);
    $emailN=$email;
    $newPasswordN=$newPassword;
    
    $result = $stmt->execute();
   
    return   $result;

}
?>