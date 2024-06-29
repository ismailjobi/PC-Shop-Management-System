<?php
session_start();

if (!isset($_SESSION["UserName"])) {

    header("location: Login.php");
    exit;
}
if (isset($_SESSION['loginUserName'])) {
    $loginUserName = $_SESSION['loginUserName'];
}
include("../MODEL/MYsql Connect.php");
$existSqlUser = "SELECT * FROM `employee_info_tb` WHERE username = '$loginUserName'";
$resultUser = mysqli_query($conn, $existSqlUser);
$data = $resultUser->fetch_assoc();
$loginFName = $data['first_name'];
$loginLName = $data['last_name'];
$loginFaName = $data['father_name'];
$loginUserName = $data['username'];
$loginMName = $data['mother_name'];
$loginGender = $data['gender'];
$loginNid = $data['nid_number'];
$logindob = $data['dob'];
$loginbog = $data['blood_group'];


$loginImage = $data['image'];
$_SESSION['$loginImage'] = $loginImage;
$loginEmail = $data['email'];
$loginPhone = $data['phone'];
$loginAdd = $data['address'];

$loginUserName = $data['username'];
$loginPassword = $data['password'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <title>Profile</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    ?>
    <br><br><br><br><br>
    <div class="body_border">
        <form action="../CONTROLER/ProfileOparetion.php" method="post" enctype="multipart/form-data" novalidate 
        onsubmit=" return isvalidateProfileForm(this)">
            <div align="center">
                <table>
                    <th>
                    <td>

                    </td>

                    <td>
                        <div>
                            <table>
                                <th>
                                <td>
                                    <fieldset>
                                        <legend>General Information :</legend>

                                        <table>
                                            <th>
                                            <td>
                                                <table align="center">
                                                    <th>
                                                        <tr>
                                                            <?php

                                                            if (isset($_SESSION['SubmitedReg'])) {
                                                                if ($_SESSION['SubmitedReg']) {
                                                                    if (isset($_SESSION['fName_empty']) || isset($_SESSION['Nid_empty']) || isset($_SESSION['lName_empty']) || isset($_SESSION['faName_empty']) || isset($_SESSION['mName_empty']) || isset($_SESSION['dob_empty']) || isset($_SESSION['email_empty']) || isset($_SESSION['phone_empty']) || isset($_SESSION['address_empty']) || isset($_SESSION['passwordRe_empty'])) {
                                                                        if ($_SESSION['fName_empty'] || $_SESSION['lName_empty'] || $_SESSION['faName_empty'] || $_SESSION['mName_empty'] || $_SESSION['dob_empty'] || $_SESSION['email_empty'] || $_SESSION['phone_empty'] || $_SESSION['address_empty'] || $_SESSION['passwordRe_empty']) {

                                                                            echo '<p align="center" class ="errorMsg"><b>Data filled cannot be empty.</b></p>';


                                                                        } else {
                                                                            if (isset($_SESSION['done'])) {
                                                                                if ($_SESSION['done']) {
                                                                                    echo '<p align="center"><b>Successfully Update Information.</b></p>';

                                                                                }

                                                                            }
                                                                        }
                                                                    }

                                                                }
                                                            }


                                                            ?>
                                                        </tr>

                                                        <tr>
                                                            <td><label for="fname"><b>First Name </b> </label></td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="text" name="fname" id="fname" value="<?php echo
                                                                    isset($loginFName) ? $loginFName : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="fname_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="lname"><b>Last Name</b> </label></td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="text" name="lname" id="lname" value="<?php echo
                                                                    isset($loginLName) ? $loginLName : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="lname_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="faname"><b> Father's Name</b> </label></td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="text" name="faname" id="faname" value="<?php echo
                                                                    isset($loginFaName) ? $loginFaName : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="faname_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="mname"><b>Mother's Name</b> </label></td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="text" name="mname" id="mname" value="<?php echo
                                                                    isset($loginMName) ? $loginMName : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="mname_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="gender"><b> Gender</b></label></label></td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="radio" name="gender" id="gender"
                                                                    value="Male" <?php if (isset($loginGender)) {
                                                                        if ($loginGender == 'Male') {
                                                                            echo 'checked';
                                                                        }
                                                                    } ?> disabled>
                                                                Male
                                                                <input type="radio" name="gender" id="gender"
                                                                    value="Female" <?php if (isset($loginGender)) {
                                                                        if ($loginGender == 'Female') {
                                                                            echo 'checked';
                                                                        }
                                                                    } ?> disabled>
                                                                Female<br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="gender_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="Nid"> <b>Nid Number</b> </label></label>
                                                            </td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="text" name="Nid" id="Nid" value="<?php echo
                                                                    isset($loginNid) ? $loginNid : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="nid_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                                <?php


                                                                if (isset($_SESSION['SubmitedReg'])) {
                                                                    if ($_SESSION['SubmitedReg']) {
                                                                        if (isset($_SESSION['nidExist'])) {
                                                                            if ($_SESSION['nidExist']) {
                                                                                echo '<span class ="errorMsg">*This Nid number Already Exists.</span>';

                                                                            }

                                                                        }
                                                                    }
                                                                }

                                                                ?>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td><label for="dob"> <b>Date of Birth</b> </label></label>
                                                            </td>
                                                            <td>
                                                                <b>:</b>
                                                                <input type="date" name="dob" id="dob" value="<?php echo
                                                                    isset($logindob) ? $logindob : "" ?>"><br>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span id="dob_msg" class="errorMsg"></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="bog"><b>Blood Group </b></label></label>
                                                            </td>
                                                            <td>
                                                                <b>:</b>
                                                                <select name="bog" id="bog">
                                                                    <option value="A+" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'A+') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>A+
                                                                    </option>
                                                                    <option value="A-" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'A-') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>A-
                                                                    </option>
                                                                    <option value="O+" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'O+') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>O+
                                                                    </option>
                                                                    <option value="O-" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'O-') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>O-
                                                                    </option>
                                                                    <option value="B+" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'B+') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>B+
                                                                    </option>
                                                                    <option value="B-" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'B-') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>B-
                                                                    </option>
                                                                    <option value="AB+" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'AB+') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>AB+
                                                                    </option>
                                                                    <option value="AB-" <?php if (isset($loginbog)) {
                                                                        if ($loginbog == 'AB-') {
                                                                            echo 'selected';
                                                                        }
                                                                    } ?>>AB-
                                                                    </option>
                                                                </select>
                                                            </td>

                                                        </tr>

                                                    </th>
                                                </table>
                                            </td>
                                            <td align="center">

                                                <img src="img/<?php echo $loginImage; ?>" alt="Profile"
                                                    height="100"><br><br>
                                                <label for="image"> </label>
                                                <input type="file" id="image" name="image"> <br>
                                                <?php

                                                if (isset($_SESSION['SubmitedReg'])) {
                                                    if ($_SESSION['SubmitedReg']) {
                                                        if (isset($_SESSION['Exist_img'])) {
                                                            if ($_SESSION['Exist_img']) {
                                                                echo '<span class ="errorMsg">*Image Does Not Exist.</span>';

                                                            }
                                                        } else {

                                                            if (isset($_SESSION['invalid_img'])) {
                                                                if ($_SESSION['invalid_img']) {
                                                                    echo '<span class ="errorMsg">*Invalid Image Extension.</span>';

                                                                }
                                                            } elseif (isset($_SESSION['invalid_size'])) {
                                                                if ($_SESSION['invalid_size']) {
                                                                    echo '<span class ="errorMsg">*Image Size Is Too Large.</span>';
                                                                }
                                                            } elseif (isset($_SESSION['valid_img'])) {
                                                                if ($_SESSION['valid_img']) {
                                                                    echo '<b>Successfully Added.</b>';
                                                                }
                                                            }


                                                        }

                                                    }
                                                }

                                                ?>


                                            </td>

                                            </th>
                                        </table>

                                    </fieldset>
                                    <fieldset>
                                        <legend>Contact Information :</legend>
                                        <table>
                                            <th>
                                                <tr>
                                                    <td><label for="email"> <b>Email </b> </label></td>
                                                    <td>
                                                        <b>:</b>
                                                        <input type="email" id="email" name="email" value="<?php echo
                                                            isset($loginEmail) ? $loginEmail : "" ?>"><br>

                                                    </td>
                                                    <td>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span id="email_msg" class="errorMsg"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <?php

                                                        if (isset($_SESSION['SubmitedReg'])) {
                                                            if ($_SESSION['SubmitedReg']) {
                                                                if (isset($_SESSION['emailValid'])) {
                                                                    if ($_SESSION['emailValid']) {
                                                                        echo '<span class ="errorMsg">*Please enter a valid email.</span>';

                                                                    }

                                                                }

                                                                if (isset($_SESSION['emailExist'])) {
                                                                    if ($_SESSION['emailExist']) {
                                                                        echo '<span class ="errorMsg">*This Email Already Exists.</span>';

                                                                    }

                                                                }


                                                            }
                                                        }

                                                        ?>
                                                    </td>


                                                </tr>
                                                <tr>
                                                    <td><label for="phone"><b> Phone/Mobile </b> </label></td>
                                                    <td>
                                                        <b>:</b>
                                                        <input type="text" id="phone" name="phone" value="<?php echo
                                                            isset($loginPhone) ? $loginPhone : "" ?>"><br>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span id="phone_msg" class="errorMsg"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="add"> <b>Address</b> </label> </td>
                                                    <td>
                                                        <b>:</b>
                                                        <textarea name="add" id="add" cols="30" rows="1"> <?php echo
                                                            isset($loginAdd) ? $loginAdd : "" ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span id="address_msg" class="errorMsg"></span></td>
                                                </tr>

                                            </th>
                                        </table>
                                    </fieldset>
                                    <fieldset>
                                        <legend>Account Information</legend>
                                        <table>
                                            <th>
                                                <tr>
                                                    <td>
                                                        <label for="userName"><b>UserName</b></label>

                                                    </td>
                                                    <td>
                                                        <b>:</b>

                                                        <input type="text" id="userName" name="userName" value="<?php echo
                                                            isset($loginUserName) ? $loginUserName : "" ?>" disabled>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span id="userName_msg" class="errorMsg"></span></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <?php


                                                        if (isset($_SESSION['usernameExist'])) {
                                                            if ($_SESSION['usernameExist']) {
                                                                echo '<span class ="errorMsg">*This Username Already Exists.</span>';

                                                            }

                                                        }


                                                        ?>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="userName"><b>Password</b> </label>

                                                    </td>
                                                    <td>
                                                        <b>:</b>

                                                        <input type="password" id="password" name="password" value="<?php echo
                                                            isset($loginPassword) ? $loginPassword : "" ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><span id="password_msg" class="errorMsg"></span></td>
                                                </tr>

                                            </th>
                                        </table>
                                    </fieldset>
                                    <table align="right">
                                        <th>
                                            <tr>
                                                <td>

                                                    <button type="submit" name="submit">
                                                        <table>
                                                            <th>
                                                                <tr>
                                                                    <td><img src="https://cdn-icons-png.flaticon.com/512/2550/2550280.png"
                                                                            height="15"></td>
                                                                    <td>Update</b></span>
                                                                    </td>
                                                                </tr>
                                                            </th>
                                                        </table>
                                                    </button>


                                                </td>
                                                <td>
                                                    <a href="HomePage.php" class="backButton">
                                                        <table>
                                                            <th>
                                                                <tr>
                                                                    <td><img src="https://cdn-icons-png.flaticon.com/512/9199/9199686.png"
                                                                            height="15"></td>
                                                                    <td><span><b>Cancel
                                                                            </b></span>
                                                                    </td>
                                                                </tr>
                                                            </th>
                                                        </table>

                                                    </a>
                                                </td>

                                            </tr>


                                        </th>
                                    </table>
                                </td>
                                </th>
                            </table>

                        </div>
                    </td>
                    <td>

                    </td>
                    </th>
                </table>

        </form>
    </div>

    <script src="ProfileValidation.js"></script>

</body>

</html>





<?php

unset($_SESSION['done'], $_SESSION['valid_img']);
unset($_SESSION['fName_empty'], $_SESSION['lName_empty'], $_SESSION['Nid_empty'], $_SESSION['faName_empty'], $_SESSION['mName_empty'], $_SESSION['dob_empty'], $_SESSION['email_empty'], $_SESSION['phone_empty'], $_SESSION['address_empty'],  $_SESSION['passwordRe_empty']);
unset($_SESSION['nidExist'], $_SESSION['Exist_img'], $_SESSION['invalid_img'], $_SESSION['invalid_size'], $_SESSION['valid_img'], $_SESSION['emailValid'], $_SESSION['emailExist'], $_SESSION['userRole'], $_SESSION['usernameExist']);
// include("Footer.php");

?>