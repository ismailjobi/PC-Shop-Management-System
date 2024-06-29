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
    <title>Task Panel</title>
</head>

<body>
    <?php
    include("Header.php");
    include("Menu.php");
    ?>

    <br><br>
    <!-- <form action="Task_Panel.php" novalidate method="post">
    <p align="center"><input type="text"name="search" placeholder="Search"><button type="submit" name="searchTask" ><img
                src="https://cdn-icons-png.flaticon.com/512/1296/1296902.png" alt="ADD" height="14"></button></p>
    </form> -->


    <br><br><br><br><br>
    <div class="body_border">
        <div align="center">
            <table>
                <tbody>
                    <td>
                        
                    
                        
                        <table >

                                <thead>
                                    <tr align="center" class ="data">
                                        <th class ="data"><b>Status</b> </th>
                                        <th class ="data"><b>Task ID</b></th>
                                        <th class ="data"><b>Task Name</b></th>
                                        <th class ="data"><b>Task Description</b></th>
                                        

                                        
                                    </tr>
                                </thead>
                                <?php

                                include("../MODEL/MYsql Connect.php");
                                include("../MODEL/Select.php");
                                /*$existSqlTask= "SELECT * FROM `task_info_tb`  ORDER BY task_id DESC";
                                $resultTask = mysqli_query($conn, $existSqlTask);*/
                                $resultTask = taskList();
                               
                                ?>

                                <tbody>
                                    
                                    <?php foreach ($resultTask as $resultTask) : ?>
                                    <tr align="center" class ="data">
                                        
                                    <td class ="data"><input type="checkbox" <?php echo $resultTask["task_status"]; ?> >  </td>
                                    <td class ="data"><?php echo $resultTask["task_id"]; ?></td>
                                    <td class ="data"><?php echo $resultTask["task_name"]; ?></td>
                                    <td class ="data"><?php echo $resultTask["task_description"]; ?></td>
                                   
                                    </tr>
                                    <?php endforeach; ?>
                                    
                                </tbody>


                            </table>



                    </td>


                </tbody>
            </table>


        </div>
    </div>

</body>

</html>