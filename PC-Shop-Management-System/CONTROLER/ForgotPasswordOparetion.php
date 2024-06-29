<?php

session_start();
header("Location:../VIEW/ForgotPassword.php");
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
    $email = rawData($_POST['email']);
    include("../MODEL/MYsql Connect.php");
    if (empty($email)) {
        $_SESSION['email_empty'] = true;
        $flag = false;
        header("Location:../VIEW/ForgotPassword.php");
    } else {
        $_SESSION['email_empty'] = false;
        $_SESSION['email'] = $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailValid'] = true;
            $flag = false;
        } else {
            $_SESSION['emailValid'] = false;
            // $existSqlEmail = "SELECT * FROM `employee_info_tb` WHERE  email ='$email' ";
            // $resultEmail = mysqli_query($conn, $existSqlEmail);
            // $numExistRowsEmail = mysqli_num_rows($resultEmail);
            // $data = $resultEmail->fetch_assoc();
            $numExistRowsEmail =emailExist($email);
            $data = selectEmail($email);


            if ($numExistRowsEmail > 0) {
                $_SESSION['emailExist'] = true;
                $newPassword=rand(100000,999999);
                $userEmail = $data['email'];
                $to = "$userEmail";
                $subject = "Reset Password";
                $body = "Hi,There is your new password $newPassword.we recommend that after login change the password.";
                $headers = "From:ssicomputershop@gmail.com";

                if (mail($to, $subject, $body, $headers)) {
                    $_SESSION['mailSent']=true;
                    // $sql = "UPDATE employee_info_tb SET password='$newPassword' WHERE  email ='$email'";
                    // $conn->query($sql);
                    forgotPassUpdate($email,$newPassword);
                } else {
                    $_SESSION['mailSent']=false;
                }

            } else {
                $_SESSION['emailExist'] = false;
            }




        }

    }


    $conn->close();
    header("Location:../VIEW/ForgotPassword.php");
}



?>