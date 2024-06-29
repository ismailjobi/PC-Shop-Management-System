<?php
session_start();
if (!isset($_SESSION["UserName"])) {

    header("location: Login.php");
    exit;



}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <title>Change Password</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    ?>
    <br><br> <br><br> <br>
    <div class="body_border">
        <br> <br>
        <table align="center">
            <td></td>
            <td>
                <div align="center">
                    <form action="../CONTROLER/ChangePassValidation.php" method="POST" novalidate
                        onsubmit=" return isvalidateChangepassForm(this)">
                        <table>
                            <th>
                            <td>
                                <fieldset>
                                    <legend align="center"><b>Change Password</b> </legend>
                                    <table>
                                        <th>
                                            <tr>
                                                <td>
                                                    <label for="currantPass"><b>Currant Password </b></label>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                    <input type="password" name="currantPass" id="currantPass"
                                                        value="<?php echo isset($_SESSION['currantPass']) ? $_SESSION['currantPass'] : "" ?>"><br>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span id="currantPass_msg" class="errorMsg"></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <?php

                                                    if (isset($_SESSION['submitted'])) {
                                                        if ($_SESSION['submitted']) {
                                                            if (isset($_SESSION['currantPass_empty'])) {
                                                                if ($_SESSION['currantPass_empty']) {
                                                                    echo '<p class ="errorMsg">*Please enter the currant password.</p>';
                                                                } else {

                                                                    if (isset($_SESSION['passValid'])) {
                                                                        if (!$_SESSION['passValid']) {
                                                                            echo '<p class ="errorMsg">*Please enter the valid password.</p>' . '<br>';
                                                                        }
                                                                    }


                                                                }
                                                            }
                                                        }
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="newPass"><b>New Password </b> </label>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                    <input type="password" name="newPass" id="newPass"
                                                        value="<?php echo isset($_SESSION['newPass']) ? $_SESSION['newPass'] : "" ?>"><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span id="newPass_msg" class="errorMsg"></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <?php

                                                    if (isset($_SESSION['submitted'])) {
                                                        if ($_SESSION['submitted']) {
                                                            if (isset($_SESSION['newPass_empty'])) {
                                                                if ($_SESSION['newPass_empty']) {
                                                                    echo '<p class ="errorMsg">*Please enter the new password.</p>';
                                                                } else {
                                                                    echo ' ';
                                                                }
                                                            }


                                                        }
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label for="confirmPass"><b>Confirm Password </b></label>
                                                </td>
                                                <td>
                                                    <b>:</b>
                                                    <input type="password" name="confirmPass" id="confirmPass"
                                                        value="<?php echo isset($_SESSION['confirmPass']) ? $_SESSION['confirmPass'] : "" ?>"><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><span id="confirmPass_msg" class="errorMsg"></span></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <?php

                                                    if (isset($_SESSION['submitted'])) {
                                                        if ($_SESSION['submitted']) {
                                                            if (isset($_SESSION['confirmPass_empty'])) {
                                                                if ($_SESSION['confirmPass_empty']) {
                                                                    echo '<p class ="errorMsg">*Please re-enter the new password.</p>';
                                                                } else {
                                                                    echo ' ';
                                                                    if (isset($_SESSION['newPassValid'])) {
                                                                        if (!$_SESSION['newPassValid']) {
                                                                            echo '<p class ="errorMsg">*New password does not match.</p>' . '<br>';
                                                                        }
                                                                    }

                                                                }
                                                            }



                                                        }
                                                    }

                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td align="right">
                                                    <button type="submit"><b>Change Password</b> </button><br><br>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <a href="HomePage.php" class="backButton">
                                                        <table>
                                                            <th>
                                                                <tr>
                                                                    <td><img src="https://cdn-icons-png.flaticon.com/512/9823/9823106.png"
                                                                            alt="Profile" height="20"></td>
                                                                    <td><span><b><b>Go Back</b> </b>
                                                                        </span></td>
                                                                </tr>
                                                            </th>
                                                        </table>
                                                    </a>
                                                </td>
                                                <td></td>
                                            </tr>

                                            <tr>

                                                <?php
                                                if (isset($_SESSION['passUpdate'])) {
                                                    if ($_SESSION['passUpdate']) {

                                                        echo '<p align="center" class ="errorMsg"><b>Successfully Password Change.</b></p>' . '<br>';

                                                    } else {
                                                        echo '<p align="center" class ="errorMsg"><b> Password Change Failed.</b></p>' . '<br>';
                                                    }
                                                }
                                                ?>

                                            </tr>



                                        </th>
                                    </table>



                                </fieldset>
                            </td>
                            </th>
                        </table>
                    </form>

                </div>
            </td>
            <td></td>
        </table>
        <br><br> <br><br> <br><br><br> <br>

    </div>







    <script src="ChangePasswordValidation.js"></script>
</body>

</html>

<?php
unset($_SESSION['currantPass_empty'], $_SESSION['confirmPass_empty'], $_SESSION['newPass_empty'], $_SESSION['passUpdate']);
unset($_SESSION['currantPass'], $_SESSION['confirmPass'], $_SESSION['newPass']);
//session_destroy();
?>

