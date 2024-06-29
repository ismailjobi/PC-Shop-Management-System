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
    <title>Salary Sheet</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    ?>
    <br><br><br><br><br><br>
    <div class="body_border">
        <form action="../CONTROLER/AttendanceOparetion.php" method="post" novalidate
            onsubmit=" return isvalidateattendanceForm(this)">

            <!-- <p align="center"><input type="text" placeholder="Search"><button type="submit"><img
                src="https://cdn-icons-png.flaticon.com/512/1296/1296902.png" alt="ADD" height="14"></button></p> -->


            <div align="center">
                <table>
                    <tbody>
                        <td>
                            <br><br><br><br><br><br>

                            <fieldset>


                                <table align="right">
                                    <th>
                                        <tr>
                                            <?php

                                            if (isset($_SESSION['Submited'])) {
                                                if ($_SESSION['Submited']) {
                                                    if (isset($_SESSION['userExist'])) {
                                                        if ($_SESSION['userExist']) {
                                                            if (isset($_SESSION['done'])) {
                                                                if ($_SESSION['done']) {
                                                                    echo '<p align="center"><b>Information Added.</b></p>';
                                                                    unset($_SESSION['employeeId'], $_SESSION['attendance']);
                                                                }
                                                            }
                                                        } else {
                                                            echo '<p align="center" class ="errorMsg"><b>Information Can not found.</b></p>';
                                                        }
                                                    }

                                                }
                                            }




                                            ?>
                                        </tr>
                                        <tr>

                                            <td><label for="employeeId"><b>Employee ID </b> </label></td>
                                            <td>
                                                <b>:</b>
                                                <input type="text" name="employeeId" id="employeeId"
                                                    value="<?php echo
                                                        isset($_SESSION['employeeId']) ? $_SESSION['employeeId'] : "" ?>"><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><span id="emoloyeeId_msg" class="errorMsg"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <?php

                                                if (isset($_SESSION['Submited'])) {
                                                    if ($_SESSION['Submited']) {
                                                        if (isset($_SESSION['employeeId_empty'])) {
                                                            if ($_SESSION['employeeId_empty']) {
                                                                echo '<p class ="errorMsg">*Please enter Employee ID.</p>';
                                                            }
                                                        }

                                                    }
                                                }

                                                ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <td><label for="attendance"><b> Attendance</b></label></label></td>
                                            <td>
                                                <b>:</b>
                                                <input type="radio" name="attendance" id="attendance" value="Present"
                                                    <?php if (isset($_SESSION['attendance'])) {
                                                        if ($_SESSION['attendance'] == 'Present') {
                                                            echo 'checked';
                                                        }
                                                    } ?>>Present
                                                <input type="radio" name="attendance" id="attendance" value="Absent"
                                                    <?php if (isset($_SESSION['attendance'])) {
                                                        if ($_SESSION['attendance'] == 'Absent') {
                                                            echo 'checked';
                                                        }
                                                    } ?>>Absent<br>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><span id="attendance_msg" class="errorMsg"></span></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <?php

                                                if (isset($_SESSION['Submited'])) {
                                                    if ($_SESSION['Submited']) {
                                                        if (isset($_SESSION['attendance_empty'])) {
                                                            if ($_SESSION['attendance_empty']) {
                                                                echo '<p class ="errorMsg">*Please enter attendance information.</p>';
                                                            }
                                                        }
                                                    }
                                                }

                                                ?>
                                            </td>
                                        </tr>


                                        <tr align="center">
                                            <br><br>

                                            <td>
                                                <button type="submit">
                                                    <table>
                                                        <th>
                                                            <tr>
                                                                <td><img src="https://cdn-icons-png.flaticon.com/512/2550/2550280.png"
                                                                        alt="Save" height="15"></td>
                                                                <td><span>
                                                                        <b>Save</b>
                                                                    </span></td>
                                                            </tr>
                                                        </th>
                                                    </table>
                                                </button>


                                            </td>

                                            <td>
                                                <a href="Attendance.php" class="backButton">
                                                    <table>
                                                        <th>
                                                            <tr>
                                                                <td><img src="https://cdn-icons-png.flaticon.com/512/9199/9199686.png"
                                                                        height="15"></td>
                                                                <td><span><b>Cancel</b></span>
                                                                </td>
                                                            </tr>
                                                        </th>
                                                    </table>
                                                </a>

                                            </td>


                                        </tr>
                                    </th>
                                </table>

                            </fieldset>


                        </td>


                    </tbody>
                </table>


            </div>


        </form>
        <br><br><br><br><br><br><br>

    </div>

    <script src="AttandanceValidation.js"></script>

</body>

</html>
<?php
unset($_SESSION['done'], $_SESSION['employeeId_empty'], $_SESSION['attendance'], $_SESSION['userExist'], $_SESSION['attendance_empty']);
?>