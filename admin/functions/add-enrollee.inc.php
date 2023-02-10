<?php

if(isset($_POST["enroll"])){

    $stid = $_POST["stid"];
    $syid = $_POST["syid"];
    $semid = $_POST["semid"];
    $deptid = $_POST["deptid"];
    $yearid = $_POST["yearid"];
    $deptid = $_POST["deptid"];
    $secid = $_POST["secid"];
    
    // // $sql = "SELECT * FROM tbl_sched WHERE room_id = '$room' AND day_id = '$day' AND  ('$st' BETWEEN start_time AND end_time
    // //         OR '$en' BETWEEN start_time AND end_time OR '$st' >= end_time AND '$en' <= end_time)";
    // // $stmt = $dbs->query($sql);
    // // $result = $stmt->fetchAll();
    // // if(empty($result)){
    // // }else{
    // // }
    
    // try {
    //     $database = new Connection();
    //     $dbs = $database->open();
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "INSERT INTO `tbl_enrollees`(`sy_id`, `sem_id`, `s_id`, `course_id`, `yr_id`, `sec_id`) VALUES ('$syid','$semid','$stid','$deptid','$yearid', '$secid')";
    //     $conn->exec($sql);
    //     echo "New record created successfully";
    // } catch(PDOException $e) {
    //     echo $sql . "<br>" . $e->getMessage();
    // }
    
    // $conn = null;
    
    
    session_start();
    $_SESSION['s_id']=$stid;
    $_SESSION['sec_id']=$secid;
    header("location:../blank.php?error=success");
    
    
    
    }else{

        header("location:../student-table.php?error=nofile");
    }

?>