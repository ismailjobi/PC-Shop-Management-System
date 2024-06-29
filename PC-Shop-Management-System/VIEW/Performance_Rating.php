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
    <title>Performance Rating</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");

    include("../MODEL/MYsql Connect.php");
    include("../MODEL/Select.php");
    //$sql = "SELECT employee_info_tb.*, performance_info_tb.* FROM performance_info_tb, employee_info_tb WHERE  performance_info_tb.username= employee_info_tb.username AND employee_info_tb.role='Inventory Staff'; ";
    /*$sql = "SELECT * FROM employee_info_tb ";
    $resultratig = mysqli_query($conn, $sql);*/
    $resultratig = selectData();
    //$data = $resultUser->fetch_assoc();
    //$userCurrentImage = $data['image'];
    ?>

    <br><br>
    <!-- <p align="center"><input type="text" placeholder="Search"><button type="submit"><img
                src="https://cdn-icons-png.flaticon.com/512/1296/1296902.png" alt="ADD" height="14"></button></p> -->

    <br><br><br><br><br>
    
<div class ="body_border">
<div align="center">
            <table>
                <tbody>
                    <td>
                        
                            <table >

                                <thead >
                                    <tr align="center" class ="data">
                                        <th class ="data"><b>ID</b> </th>
                                        <th class ="data"><b>Name</b></th>
                                        <th class ="data"><b>UserName</b></th>
                                        <th class ="data"><b>Performance Point</b></th>
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($resultratig as $resultratig): ?>
                                        <?php
                                            $first_day_this_month = date('Y/m/01'); // hard-coded '01' for first day
                                            $last_day_this_month = date('Y/m/t');
                                            $employeeId=$resultratig["id"];
                                            /*$total_attendance = mysqli_query($conn,"select count(*) as total_count from attendance_info_tb where emplyee_id='$employeeId' AND date between '$first_day_this_month' and '$last_day_this_month ' AND status='Present'");
                                            $res = mysqli_fetch_assoc($total_attendance);
                                            $count = $res['total_count'];*/
                                            $res = attendanceCount($employeeId,$first_day_this_month,$last_day_this_month);
                                            $count = $res['total_count'];
                                            ?>
                                        <tr align="center" class ="data">
                                            <td class ="data">
                                                <?php
                                                $id=$resultratig["id"]; echo$id  ?>
                                            </td>
                                            <td class ="data">
                                                <?php 
                                                $name=$resultratig["first_name"] . " " . $resultratig["last_name"];echo $name;  ?>
                                            </td>
                                            <td class ="data">
                                                <?php
                                                $userNamer=$resultratig["username"]; echo $userNamer;  ?>
                                            </td>
                                            <!-- <td>20</td> -->
                                            <td class ="data">
                                                <input type="text" name ="rating" value="<?php
                                                 echo $count*5.0;  ?>" disabled></td>
                                                
                                    <?php endforeach; ?>
                                </tbody>



                           

                        
                    </td>


                </tbody>
            </table>


        </div>
</div>
        
   


</body>

</html>