<?php


function registration($fName, $lName, $faName, $mName, $gender, $Nid, $dob, $bog, $email, $phone, $add, $userName, $passwordUser, $newImageName)
{
    require("MYsql Connect.php");
    
    $sql = "INSERT INTO `employee_info_tb` (`id`, `first_name`,`last_name`, `father_name`, `mother_name`, `gender`, `nid_number`, `dob`, `blood_group`, `email`, `phone`, `address`, `username`, `password`, `image`, `role`, `created_date`) VALUES (NULL,? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp());";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisssisssss", $firstname , $lastname,$fathername,$mothername,$genderd,$nidnumber,$dobd,$bloodgroup,$emaild,$phoned,$address,$username,$password,$image,$role);
    $firstname = $fName;
    $lastname = $lName;
    $fathername=$faName;
    $mothername = $mName;
    $genderd = $gender;
    $nidnumber=$Nid;
    $dobd=$dob;
    $bloodgroup =$bog;
    $emaild=$email;
    $phoned=$phone;
    $address=$add;
    $username=$userName;
    $password=$passwordUser;
    $image=$newImageName;
    $role="Manager";

    $result=$stmt->execute();
    return  $result;

}
function addEmployee($fName, $lName, $faName, $mName, $gender, $Nid, $dob, $bog, $email, $phone, $add, $userName, $passwordUser, $newImageName,$userRole)
{
    require("MYsql Connect.php");
    
    $sql = "INSERT INTO `employee_info_tb` (`id`, `first_name`,`last_name`, `father_name`, `mother_name`, `gender`, `nid_number`, `dob`, `blood_group`, `email`, `phone`, `address`, `username`, `password`, `image`, `role`, `created_date`) VALUES (NULL,? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, current_timestamp());";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisssisssss", $firstname , $lastname,$fathername,$mothername,$genderd,$nidnumber,$dobd,$bloodgroup,$emaild,$phoned,$address,$username,$password,$image,$role);
    $firstname = $fName;
    $lastname = $lName;
    $fathername=$faName;
    $mothername = $mName;
    $genderd = $gender;
    $nidnumber=$Nid;
    $dobd=$dob;
    $bloodgroup =$bog;
    $emaild=$email;
    $phoned=$phone;
    $address=$add;
    $username=$userName;
    $password=$passwordUser;
    $image=$newImageName;
    $role=$userRole;

    $result=$stmt->execute();
    return  $result;

}
function salaryData($salary,$employeeId)
{
    require("MYsql Connect.php");
    
    $sql = "INSERT INTO `salary_info_tb` (`salary_id`, `employee_id`, `salary`) VALUES (NULL, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $id, $salaryd );
    
    $salaryd=$salary;
    $id=$employeeId;

    $result=$stmt->execute();
    return  $result;

}
function attendance($employeeId,$today,$attendance)
{
    require("MYsql Connect.php");
    
    $sql = "INSERT INTO `attendance_info_tb` (`attendance_id`, `emplyee_id`,`status` ,`date`) VALUES (NULL, ?, ?,?) ;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $id, $attendanced ,$todayd);
    
    $todayd=$today;
    $id=$employeeId;
    $attendanced=$attendance;

    $result=$stmt->execute();
    return  $result;

}

?>