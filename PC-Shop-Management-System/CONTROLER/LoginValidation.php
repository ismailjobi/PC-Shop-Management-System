<?php

session_start();
//header("Location:../VIEW/Login.php");
function rawData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $flag = true;
    $_SESSION['submitLogin'] = true;
    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Select.php");


    $userName = rawData($_POST['userName']);
    $passwordLogin = rawData($_POST['password']);
    $check=$_POST['rememberMe'];


    if (empty($userName)) {
        $_SESSION['userName_empty'] = true;

        $flag = false;
        header("Location:../VIEW/Login.php");
    } else {
        $_SESSION['userName_empty'] = false;
        $_SESSION['UserName'] = $userName;


    }
    if (empty($passwordLogin)) {
        $_SESSION['password_empty'] = true;
        $flag = false;
        header("Location:../VIEW/Login.php");
    } else {
        $_SESSION['password_empty'] = false;
        $_SESSION['UserName'] = $passwordLogin;
    }


    if ($flag === true) {


       $existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$userName'AND password='$passwordLogin' AND role ='Manager' ";
        $resultUser = mysqli_query($conn, $existSqlUser);
        $data = $resultUser->fetch_assoc();
        $numExistRowsUser = mysqli_num_rows($resultUser);
        //$data=loginUserData( $userName,$passwordLogin);
        $loginFirstName = $data['first_name'];
        $loginLastName = $data['last_name'];
        $loginId = $data['id'];
        //$numExistRowsUser = login( $userName,$passwordLogin);

        if ($numExistRowsUser > 0) {
            $_SESSION['userExist'] = false;
            $_SESSION['loginName'] = $loginFirstName . " " . $loginLastName;
            $_SESSION['loginUserName'] = $userName;

            if (isset($_POST['rememberMe'])) {
                $hash = password_hash($loginId, PASSWORD_DEFAULT);
                setcookie('token', $hash, time() + 60 * 60,"/"); //1 hour

            } else {

                setcookie('token', $hash, time() - 10,"/"); //10 seconds
            }
            header("Location:../VIEW/HomePage.php");

        } else {
            $_SESSION['userExist'] = true;
            header("Location:../VIEW/Login.php");
        }


    }





}

?>