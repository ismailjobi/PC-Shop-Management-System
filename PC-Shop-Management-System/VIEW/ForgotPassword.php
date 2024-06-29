<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <title>Forgot Password</title>
</head>

<body>

    <!-- <h2><p align="center"> Forgot Password </p></h2> -->

    <br><br><br>
    <div align="center">
        <form action="../CONTROLER/ForgotPasswordOparetion.php" novalidate method="post"
            onsubmit=" return isvalidateForgotPassForm(this)">



            <table>
                <th>
                <td></td>
                <td>
                    <fieldset>
                        <legend>Forgot Password :</legend>
                        <table align="center">
                            <th>
                                <tr>
                                    <td>
                                        <img src="https://cdn-icons-png.flaticon.com/128/2933/2933245.png" alt="Logo"
                                            height="50">
                                    </td>
                                    <td align="right">
                                        <p><i>SSI COMPUTER <br> SHOP</i></p><br>
                                    </td>

                                </tr>




                            </th>
                        </table>
                        <p align="center">
                        <h2>Reset the Password</h2>
                        </p>
                        <table align="center">
                            <th>
                                <tr>


                                    <?php

                                    if (isset($_SESSION['SubmitedReg'])) {
                                        if ($_SESSION['SubmitedReg']) {
                                            if (isset($_SESSION['email_empty'])) {
                                                if ($_SESSION['email_empty']) {
                                                    echo '<p align="center" class ="errorMsg"><b>Please enter the email.</b></p>';
                                                } else {
                                                    if (isset($_SESSION['emailValid'])) {
                                                        if ($_SESSION['emailValid']) {
                                                            echo '<p align="center" class ="errorMsg"><b>Please enter a valid email.</b></p>';

                                                        }
                                                    }
                                                }
                                            }
                                            if (isset($_SESSION['emailExist'])) {
                                                if (!$_SESSION['emailExist']) {
                                                    echo '<p align="center" class ="errorMsg"><b>Email is not found.</b></p>';

                                                } else {
                                                    if (isset($_SESSION['mailSent'])) {
                                                        echo '<p align="center" ><b>Email Sent.</b></p>';
                                                        unset($_SESSION['email']);
                                                    } else {
                                                        echo '<p align="center" class ="errorMsg"><b>Email Sent failed.</b></p>';
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    ?>
                                </tr>
                                <tr align="center">

                                    <label for="email"><b></b> </label>
                                    <p align="center"><input type="email" id="email" name="email" value="<?php echo
                                        isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>" placeholder="Email">
                                    </p>

                                </tr>
                                <tr>
                                    <span id="email_msg" class="errorMsg"></span>
                                </tr>


                                <tr>

                                    <td>
                                        <button type="submit" name="sentEmail"><span><b>Send Mail</b></span></button>
                                    </td>
                                    <td><a href="Login.php" class="backButton"><span><b>Cancel</b></span></a></td>



                                </tr>
                            </th>
                        </table>


                    </fieldset>

                </td>
                <td></td>
                </th>
            </table>




        </form>




    </div>

    <script src="forgotPassValidation.js"></script>
</body>

</html>

<?php
session_unset();
?>