<?php
include_once '../templates/header.php';

include "../includes/connect.php";
include "../includes/connection.php";

var_dump($_POST);

?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Day</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Section</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Day</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Section</th>
                    <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php
                    //include our connection
                
                    if(isset($_POST['submit'])){
                        $sid = $_POST['submit'];
                    }else{
                        $sid=0;
                    }
        
                    



                    $database = new Connection();
                    $db = $database->open();
                    try{	
                        $sql = "SELECT * FROM tbl_sched
                                INNER JOIN tbl_students
                                ON tbl_sched.course_id = tbl_students.course_id
                                INNER JOIN tbl_subject
                                ON tbl_sched.sbj_id = tbl_subject.sbj_id
                                INNER JOIN tbl_section
                                ON tbl_sched.sec_id = tbl_section.sec_id
                                INNER JOIN tbl_day
                                ON tbl_sched.day_id = tbl_day.day_id
                                WHERE tbl_students.s_id = '$sid'";
                        foreach ($db->query($sql) as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row["sbj_code"]?></td>
                                <td><?php echo $row["sbj_desc"]?></td>
                                <td><?php echo $row["day_desc"]?></td>
                                <td><?php echo date('h:i A', strtotime($row['start_time']))?></td>
                                <td><?php echo date('h:i A', strtotime($row['end_time']))?></td>
                                <td><?php echo $row["sec_desc"]?></td>
                                <td>
                       

                                    <form action="blank.php" method="post" style="float: left">
                                
                                    <button type="submit" name="submit" class="btn btn-success btn-sm" style="margin: 0 11px 0 0;" value="<?php echo $row["s_id"]?>"><i class="fas fa-plus fa-sm text-white-50"></i> Add</button>
                                    </form>
                                    <!-- <a href="#edit_< ?php echo $row['s_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editStudentModal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                    <a href="#delete_< ?php echo $row['s_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
                                </td>
                                <?php include('../modals/edit-student.modal.php'); ?>
                                <!-- < ?php include('../modals/user_edit_delete_modal.php'); ?> -->
                            </tr>
                            <?php 
                        }
                    }
                    catch(PDOException $e){
                        echo "There is some problem in connection: " . $e->getMessage();
                    }

                    //close connection
                    $database->close();

                ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    
</div>


    


    </div>

    <!-- /.container-fluid -->



<?php
include_once '../templates/footer.php';
?>