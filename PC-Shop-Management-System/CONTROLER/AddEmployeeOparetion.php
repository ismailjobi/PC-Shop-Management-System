<?php

session_start();
header("Location:../VIEW/AddEmployee.php");
function rawData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $flag = true;
    $_SESSION['SubmitedReg'] = true;

    $fName = rawData($_POST['fname']);
    $lName = rawData($_POST['lname']);
    $faName = rawData($_POST['faname']);
    $mName = rawData($_POST['mname']);
    $gender = rawData($_POST['gender']);
    $Nid = rawData($_POST['Nid']);
    $dob = rawData($_POST['dob']);
    $bog = rawData($_POST['bog']);
    $email = rawData($_POST['email']);
    $phone = rawData($_POST['phone']);

    $add = rawData($_POST['add']);

    $userRole = rawData($_POST['userRole']);
    $userName = rawData($_POST['userName']);
    $passwordUser = rawData($_POST['password']);

    $_SESSION['bog'] = $bog;
    $_SESSION['userRole'] = $userRole ;

    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Insert.php");
    include("../MODEL/Select.php");

    if (empty($fName)) {
        $_SESSION['fName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['fName_empty'] = false;
        $_SESSION['fName'] = $fName;

    }
    if (empty($lName)) {
        $_SESSION['lName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['lName_empty'] = false;
        $_SESSION['lName'] = $lName;

    }
    if (empty($faName)) {
        $_SESSION['faName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['faName_empty'] = false;
        $_SESSION['faName'] = $faName;

    }
    if (empty($mName)) {
        $_SESSION['mName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['mName_empty'] = false;
        $_SESSION['mName'] = $mName;

    }
    if (empty($Nid)) {
        $_SESSION['Nid_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['Nid_empty'] = false;
        $_SESSION['Nid'] = $Nid;
        /*$existSqlNid = "SELECT * FROM `employee_info_tb` WHERE  nid_number='$Nid' ";
        $resultNid = mysqli_query($conn, $existSqlNid);
        $numExistRowsNid = mysqli_num_rows($resultNid);*/
        $numExistRowsNid = nidExist( $Nid);

        if ($numExistRowsNid > 0) {
            $_SESSION['nidExist'] = true;
            //echo "Username Already Exists";
            $flag = false;
            header("Location:../VIEW/AddEmployee.php");
        } else {
            $_SESSION['nidExist'] = false;
        }

    }
    if (empty($dob)) {
        $_SESSION['dob_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['dob_empty'] = false;
        $_SESSION['dob'] = $dob;

    }

    if (empty($gender)) {
        $_SESSION['gender_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {

        $_SESSION['gender_empty'] = false;
        if ($gender == "Male") {
            $_SESSION['gender'] = "Male";
        } else if ($gender == "Female") {
            $_SESSION['gender'] = "Female";
        }

    }


    if (empty($email)) {
        $_SESSION['email_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['email_empty'] = false;
        $_SESSION['email'] = $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailValid'] = true;
            $flag = false;
        } else {
            $_SESSION['emailValid'] = false;
            /*$existSqlEmail = "SELECT * FROM `employee_info_tb` WHERE  email ='$email' ";
            $resultEmail = mysqli_query($conn, $existSqlEmail);
            $numExistRowsEmail = mysqli_num_rows($resultEmail);*/
            
            $numExistRowsEmail = emailExist( $email);
            if ($numExistRowsEmail > 0) {
                $_SESSION['emailExist'] = true;
                //echo "Username Already Exists";
                $flag = false;
                header("Location:../VIEW/AddEmployee.php");
            } else {
                $_SESSION['emailExist'] = false;
            }

        }

    }

    if (empty($phone)) {
        $_SESSION['phone_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['phone_empty'] = false;
        $_SESSION['phone'] = $phone;

    }

    if (empty($add)) {
        $_SESSION['address_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['address_empty'] = false;
        $_SESSION['address'] = $add;

    }

    if (empty($userName)) {
        $_SESSION['userNameRe_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['userNameRe_empty'] = false;
        $_SESSION['userNameRe'] = $userName;
        
        /*$existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$userName' ";
        $resultUser = mysqli_query($conn, $existSqlUser);
        $numExistRowsUser = mysqli_num_rows($resultUser);*/
        $numExistRowsUser=userNameExist( $userName);
        if ($numExistRowsUser > 0) {
            // $exists = true;

            $_SESSION['usernameExist'] = true;
            $flag = false;
            //echo "Username Already Exists";
            header("Location:../VIEW/AddEmployee.php");
        } else {
            $_SESSION['usernameExist'] = false;
        }

    }

    if (empty($passwordUser)) {
        $_SESSION['passwordRe_empty'] = true;
        $flag = false;
        header("Location:../VIEW/AddEmployee.php");
    } else {
        $_SESSION['passwordRe_empty'] = false;
        $_SESSION['passwordRe'] = $passwordUser;

    }
    if (isset($_POST["image"])) {

        if ($_FILES["image"]["error"] == 4) {
            $_SESSION['Exist_img'] = False;
            

        } else {
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));
            if (!in_array($imageExtension, $validImageExtension)) {
                $_SESSION['invalid_img'] = true;
                $flag = false;

            } else if ($fileSize > 5000000) {
                $_SESSION['invalid_size'] = true;
                $flag = false;

            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;


                move_uploaded_file($tmpName, '../VIEW/img/' . $newImageName);
                //$query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
                //mysqli_query($conn, $query);
                $_SESSION['valid_img'] = true;


            }
        }
    }

   if($flag)
   {
    //$name = $fName ." ". $lName;

    /*$sql = "INSERT INTO `employee_info_tb` (`id`, `first_name`,`last_name`, `father_name`, `mother_name`, `gender`, `nid_number`, `dob`, `blood_group`, `email`, `phone`, `address`, `username`, `password`, `image`, `role`, `created_date`) VALUES (NULL,'$fName' ,'$lName', '$faName', '$mName', '$gender', '$Nid', '$dob', '$bog', '$email', '$phone', '$add', '$userName', '$passwordUser', '$newImageName', '$userRole', current_timestamp());";
    $result = mysqli_query($conn, $sql);*/
    $result = addEmployee($fName, $lName, $faName, $mName, $gender, $Nid, $dob, $bog, $email, $phone, $add, $userName, $passwordUser, $newImageName,$userRole);
    if ($result) {
        $_SESSION['done'] = true;
    }
    header("Location:../VIEW/AddEmployee.php");
   }
    




    $conn->close();
    header("Location:../VIEW/AddEmployee.php");
}



?>