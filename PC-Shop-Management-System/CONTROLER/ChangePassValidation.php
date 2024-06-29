<?php
session_start();
header('Location:../VIEW/ChangePassword.php');
function rawData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['submitted'] = true;
    $flag = true;
    $currantPass = rawData($_POST['currantPass']);
    $newPass = rawData($_POST['newPass']);
    $confirmPass = rawData($_POST['confirmPass']);
    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Select.php");
    include("../MODEL/Update.php");
    if (empty(!$currantPass)) {
        $_SESSION['currantPass_empty'] = false;
        $_SESSION['currantPass']=$currantPass;
        // $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE  password='$currantPass'";
        // $resultUser = mysqli_query($conn, $existSqlUser);
        // $numExistRowsUser = mysqli_num_rows($resultUser);
        $numExistRowsUser = machPass($currantPass);
        if ($numExistRowsUser > 0) {
            $_SESSION['passValid'] = true;
            header("Location:../VIEW/HomePage.php");

        } else {
            $_SESSION['passValid'] = false;
            $flag = false;
            header("Location:../VIEW/Login.php");
        }
        
    } else {
       
        $_SESSION['currantPass_empty'] =true ;
        $flag = false;
        header('Location:../VIEW/ChangePassword.php');

    }
    if (empty($newPass)) {
        $_SESSION['newPass_empty'] =true ;
        $flag = false;
        header('Location:../VIEW/ChangePassword.php');
    } else {
        $_SESSION['newPass_empty'] =false ;
        $_SESSION['newPass']=$newPass;
        header('Location:../VIEW/ChangePassword.php');

    }

    if (empty($confirmPass)) {
        $_SESSION['confirmPass_empty'] =true;
        header('Location:../VIEW/ChangePassword.php');
    } else {
        $_SESSION['confirmPass_empty'] = false;
        $_SESSION['confirmPass']=$confirmPass;
        if ($newPass === $confirmPass) {
            $_SESSION['newPassValid'] = true;
        } else {
            $_SESSION['newPassValid'] = false;
            $flag = false;
        }
    }
    if ($flag) {

        if(isset($_SESSION['loginUserName']))
        {
            $loginUserName= $_SESSION['loginUserName'];
        }
        if (isset($_SESSION['passValid'])) {
            if ($_SESSION['passValid']) {
                if (isset($_SESSION['newPassValid'])) {
                    if ($_SESSION['newPassValid']) {
                        // $sql = "UPDATE employee_info_tb SET password='$confirmPass' WHERE username = '$loginUserName'";
                        $result = passUpdate($loginUserName,$confirmPass);

                        if ($result === TRUE) {
                           
                            $_SESSION['passUpdate']=true;
                            setcookie('token', $hash, time() - 10,"/"); //10 seconds
                            
                        } 
                        else
                        {
                            $_SESSION['passUpdate']=false; 
                        }
                        

                    }

                }

            }
        }
    }
    header('Location:../VIEW/ChangePassword.php');
} else {
    $_SESSION['submitted'] = false;
}