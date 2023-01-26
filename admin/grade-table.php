<?php
include_once '../templates/header.php';
include_once '../includes/connect.php';
include_once '../includes/connection.php';
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Student Id</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Prelim</th>
                                        <th>Midterm</th>
                                        <th>Prefinal</th>
                                        <th>Final</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Student Id</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Prelim</th>
                                        <th>Midterm</th>
                                        <th>Prefinal</th>
                                        <th>Final</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        //include our connection
                                    
                                        $database = new Connection();
                                        $db = $database->open();
                                        try{	
                                            $sql = 'SELECT
                                            *
                                            FROM tbl_grades
                                            INNER JOIN tbl_students
                                            ON tbl_grades.s_id=tbl_students.s_id
                                            INNER JOIN tbl_subject
                                            ON tbl_grades.sbj_id=tbl_subject.sbj_id 
                                            ORDER BY tbl_students.s_name ASC';
                                            foreach ($db->query($sql) as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $row["s_id"]?></td>
                                                    <td><?php echo $row["s_name"]?></td>
                                                    <td><?php echo $row["sbj_code"]?></td>
                                                    <td><?php echo $row["prelim"]?></td>
                                                    <td><?php echo $row["midterm"] ?></td>
                                                    <td><?php echo $row["prefinal"] ?></td>
                                                    <td><?php echo $row["final"] ?></td>
                                                    <td>
                                                        <a href="#edit_<?php echo $row['s_id']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                                        <a href="#delete_<?php echo $row['s_id']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                    </td>
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
