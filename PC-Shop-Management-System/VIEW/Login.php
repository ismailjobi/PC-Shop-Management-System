<?php
session_start();

include("../MODEL/MYsql Connect.php");
if (isset($_COOKIE['token'])) {
    $sql = "Select * from `employee_info_tb` ";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($row['id'], $_COOKIE['token'])) {
            $userName = $row['username'];
            $password = $row['password'];

        }


    }
} else {
    $userName = $password = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="StyleSheet.css">
    <title>Login</title>
</head>

<body>

    <h2>
        <p align="center"> Login</p>
    </h2>

    <div align="center">
        <form action="../CONTROLER/LoginValidation.php" novalidate method="post" onsubmit=" return isvalidateForm(this)">



            <table>
                <th>
                <td></td>
                <td>
                    <fieldset>
                        <legend>Login :</legend>
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
                        <table>
                            <th>
                                <tr>
                                    <?php

                                    if (isset($_SESSION['submitLogin'])) {
                                        if ($_SESSION['submitLogin']) {
                                            if (isset($_SESSION['userExist'])) {
                                                if ($_SESSION['userExist']) {
                                                    echo '<p align="center" class ="errorMsg"><b>Invalid Information.</b></p>';
                                                }
                                            }
                                        }
                                    }




                                    ?>
                                </tr>

                                <tr align="center">
                                    <td>
                                        <label for="userName"><b>UserName </b> </label>
                                    </td>
                                    <td>
                                        <b>:</b>
                                        <input type="text" id="userName" name="userName"
                                            value="<?php echo isset($userName) ? $userName : " " ?>"><br>
                                    </td>



                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="userName_msg" class ="errorMsg"></span></td>
                                    
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php

                                        if (isset($_SESSION['submitLogin'])) {
                                            if ($_SESSION['submitLogin']) {
                                                if ($_SESSION['userName_empty']) {
                                                    echo '<p class ="errorMsg">*Please enter the username.</p>';
                                                }
                                            }
                                        }

                                        ?>
                                    </td>
                                </tr>
                                <tr align="center">


                                    <td>
                                        <label for="password"><b>Password </b> </label>
                                    </td>
                                    <td>
                                        <b>:</b>
                                        <input type="password" id="password" name="password"
                                            value="<?php echo isset($password) ? $password : " " ?>"> <br>
                                    </td>

                                </tr>
                                <tr>
                                    <td></td>
                                    <td><span id="password_msg" class ="errorMsg"></span></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php
                                        if (isset($_SESSION['submitLogin'])) {
                                            if ($_SESSION['submitLogin']) {
                                                if ($_SESSION['password_empty']) {
                                                    echo '<p class ="errorMsg">*Please enter the password.</p>';

                                                }


                                            }
                                        }

                                        ?>
                                    </td>
                                </tr>


                                <tr>

                                    <td><input type="checkbox" name="rememberMe" <?php echo isset($_COOKIE['token']) ? 'checked' : " " ?>>Remember Me</td>
                                    <td align="right">
                                        <p align="right"><button type="submit">
                                                <table>
                                                    <th>
                                                        <tr>
                                                            <td><img src="https://cdn-icons-png.flaticon.com/512/1828/1828267.png"
                                                                    alt="Login" height="20"></td>
                                                            <td><span>
                                                                    <b>Login</b>
                                                                </span></td>
                                                        </tr>
                                                    </th>
                                                </table>
                                            </button></p>
                                    </td>


                                </tr>
                            </th>
                        </table>


                    </fieldset>

                </td>
                <td></td>
                </th>
            </table>




        </form>
        <p align="center"><a href="ForgotPassword.php">Forgoten Password ?</a></p>
        <p align="center">Don't have an account ? <a href="Registration.php">Registration.</a></p>


    </div>

    <script src="LoginValidation.js"></script>
</body>

</html>

<?php
unset($_SESSION['userExist']);

?>