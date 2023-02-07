<?php
include_once '../templates/header.php';
include "../includes/connect.php";
include "../includes/connection.php";
var_dump($_POST);
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Schedule</h1>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                    </div>

                        <form action="" method="post">
                        <!-- <form action="functions/add-sched.inc.php" method="post"> -->

                            <div class="modal-body">
                                <?php
                                    $sql="SELECT * FROM tbl_sy"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>School Year</label>";
                                    echo "<select name=sy value='' class='form-control' required>School Year</option>"; 
                                    echo "<option value=''>Select</option>"; 
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[sy_id]>$row[sy_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_sem"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Semester</label>";
                                    echo "<select name=sem value='' class='form-control' required>Semester</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[sem_id]>$row[sem_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_instructor"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Instructor</label>";
                                    echo "<select name=ins value='' class='form-control' required>Instructor</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[ins_id]>$row[ins_name]</option>";
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_subject"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Subject</label>";
                                    echo "<select name=sbj value='' class='form-control' required>Subject</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[sbj_id]>$row[sbj_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_yr"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Year</label>";
                                    echo "<select name=year value='' class='form-control' required>Year</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[yr_id]>$row[yr_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_section"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Section</label>";
                                    echo "<select name=sec value='' class='form-control' required>Section</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[sec_id]>$row[sec_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_day"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Day</label>";
                                    echo "<select name=day value='' class='form-control' required>Day</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[day_id]>$row[day_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Time Start</label>
                                    <input type="time" class="form-control"  name ="stime" required>
                                </div>
                                <br/>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Time End</label>
                                    <input type="time" class="form-control"  name ="etime" required>
                                </div>
                                <br/>
                                <?php
                                    include "../includes/connect.php";
                                    $sql="SELECT * FROM tbl_room"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Room</label>";
                                    echo "<select name=room value='' class='form-control' required>Room</option>";
                                    echo "<option value=''>Select</option>";
                                    foreach ($conn->query($sql) as $row){
                                    echo "<option value=$row[room_id]>$row[room_desc]</option>"; 
                                    }echo "</select>";
                                ?>
                                <br/>

                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">quantity</label>
                                    <input type="number" class="form-control" name="quantity" >
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Unit</label>
                                    <input type="text" class="form-control"  name="unit">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                                    <input type="number" class="form-control"  name ="price">
                                </div> -->

                            </div>
                            <div class="modal-footer">
                            <a href="../admin/sched-table.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary" name ="submit">Import </button>
                            </div>
                        </form>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->


    

<?php
if(isset($_POST["submit"])){

    $day = $_POST["day"];
    $st = $_POST["stime"];
    $en = $_POST["etime"];
    $sbj = $_POST["sbj"];
    $rom = $_POST["room"];



    $database = new Connection();
        $dbs = $database->open();
  

        $sql = "SELECT * FROM tbl_sched WHERE room_id = '$rom' AND day_id = '$day' AND  ('$st' BETWEEN start_time AND end_time
                OR '$en' BETWEEN start_time AND end_time OR '$st' >= end_time AND '$en' <= end_time)";

        $stmt = $dbs->query($sql);
        $result = $stmt->fetchAll();

        if(empty($result)){

            
            // try {
            //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
                
               
              
              
            //     $conn->exec($sql);
            //     echo "New record created successfully";
            //   } catch(PDOException $e) {
            //     echo $sql . "<br>" . $e->getMessage();
            //   }
              
            //   $conn = null;
            
            echo 'success';
        }else{
            echo 'conflict';
        }


}else{

    
}


include_once '../templates/footer.php';
?>
