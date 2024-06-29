<?php

session_start();
header("Location:../VIEW/Profile.php");
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
    //$gender = rawData($_POST['gender']);
    $Nid = rawData($_POST['Nid']);
    $dob = rawData($_POST['dob']);
    $bog = rawData($_POST['bog']);
    $email = rawData($_POST['email']);
    $phone = rawData($_POST['phone']);
    
    $add = rawData($_POST['add']);

    //$userName = rawData($_POST['userName']);
    $passwordUser = rawData($_POST['password']);
    if (isset($_SESSION['loginUserName'])) {
        $loginUserName = $_SESSION['loginUserName'];
    }

    $_SESSION['bog'] = $bog;

    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Select.php");
    include("../MODEL/Update.php");

    if (empty($fName)) {
        $_SESSION['fName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['fName_empty'] = false;


    }
    if (empty($lName)) {
        $_SESSION['lName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['lName_empty'] = false;


    }
    if (empty($faName)) {
        $_SESSION['faName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['faName_empty'] = false;


    }
    if (empty($mName)) {
        $_SESSION['mName_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['mName_empty'] = false;

    }
    if (empty($Nid)) {
        $_SESSION['Nid_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['Nid_empty'] = false;

        // $existSqlNid = "SELECT * FROM `employee_info_tb` WHERE  nid_number='$Nid' ";
        // $resultNid = mysqli_query($conn, $existSqlNid);
        // $numExistRowsNid = mysqli_num_rows($resultNid);
        

        // $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$loginUserName'";
        // $resultUser = mysqli_query($conn, $existSqlUser);
        // $data = $resultUser->fetch_assoc();
        $data = UserProfileData($loginUserName);
        $userCurrentNid = $data['nid_number'];
        if (!$userCurrentNid === $Nid) {
            $numExistRowsNid = nidExist($Nid);
            if ($numExistRowsNid > 0) {

                $_SESSION['nidExist'] = true;
                //echo "Username Already Exists";
                header("Location:../VIEW/Profile.php");
            } else {
                $_SESSION['nidExist'] = false;
            }

        }



    }
    if (empty($dob)) {
        $_SESSION['dob_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['dob_empty'] = false;


    }




    if (empty($email)) {
        $_SESSION['email_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['email_empty'] = false;

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailValid'] = true;
            $flag = false;
        } else {
            $_SESSION['emailValid'] = false;
            // $existSqlEmail = "SELECT * FROM `employee_info_tb` WHERE  email ='$email' ";
            // $resultEmail = mysqli_query($conn, $existSqlEmail);
            // $numExistRowsEmail = mysqli_num_rows($resultEmail);

            

            // $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$loginUserName'";
            // $resultUser = mysqli_query($conn, $existSqlUser);
            // $data = $resultUser->fetch_assoc();
            $data = UserProfileData($loginUserName);
            $userCurrentEmail = $data['email'];
            if (!($userCurrentEmail === $email)) {
                $numExistRowsEmail = emailExist($email);
                if ($numExistRowsEmail > 0) {
                    $_SESSION['emailExist'] = true;
                    //echo "Username Already Exists";
                    header("Location:../VIEW/Profile.php");
                } else {
                    $_SESSION['emailExist'] = false;
                }

            }


        }

    }

    if (empty($phone)) {
        $_SESSION['phone_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['phone_empty'] = false;


    }

    if (empty($add)) {
        $_SESSION['address_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['address_empty'] = false;


    }



    if (empty($passwordUser)) {
        $_SESSION['passwordRe_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Profile.php");
    } else {
        $_SESSION['passwordRe_empty'] = false;
    }

    if (isset($_SESSION['$loginImage'])) {
        $loginImage = $_SESSION['$loginImage'];
    }
    // $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$loginUserName'";
    // $resultUser = mysqli_query($conn, $existSqlUser);
    // $data = $resultUser->fetch_assoc();
    $data = UserProfileData($loginUserName);
    $userCurrentImage = $data['image'];




    if (isset($_POST["submit"])) {
        //$image = $_POST['image'];
        if (!empty($_FILES["image"]["name"])) {
            
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
                    $_SESSION['valid_img'] = true;
                    //$query = "INSERT INTO tb_upload VALUES('', '$name', '$newImageName')";
                    //mysqli_query($conn, $query);



                }
        } 


        }
        else {
            $newImageName = $userCurrentImage;

            }
    }

    if ($flag) {
        //$name = $fName ." ". $lName;

       /* $sql = "UPDATE employee_info_tb SET first_name ='$fName',last_name='$lName',father_name='$faName',mother_name='$mName',nid_number='$Nid',dob='$dob',blood_group='$bog',email='$email',address='$add',image='$newImageName',phone='$phone', password='$passwordUser' WHERE username = '$loginUserName'";

        $result = mysqli_query($conn, $sql);*/
        $result =  profileDataUpdate($loginUserName,$fName, $lName, $faName, $mName,  $Nid, $dob, $bog, $email, $phone, $add,  $passwordUser, $newImageName);
        if ($result) {
            $_SESSION['done'] = true;
        }
        header("Location:../VIEW/Profile.php");
    }





    $conn->close();
    header("Location:../VIEW/Profile.php");
}



?>