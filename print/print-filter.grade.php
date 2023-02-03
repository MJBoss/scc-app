<?php
include_once '../templates/header.php';
?>
    

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Grade Print Filter </h1>

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Select Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                        <form action="../admin/grade.print.php" method="post">

                            <div class="modal-body">


                                <?php

                                    include "../includes/connect.php"; // Database connection using PDO
                                    //$sql="SELECT name,id FROM student"; 
                                    $sql="SELECT * FROM tbl_sy"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>School Year</label>";
                                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                                    echo "<select name=sy value='' class='form-control'>School Year</option>"; // list box select command
                                    foreach ($conn->query($sql) as $row){//Array or records stored in $row
                                    echo "<option value=$row[sy_id]>$row[sy_desc]</option>"; 
                                    /* Option values are added by looping through the array */ 
                                    }
                                    echo "</select>";// Closing of list box

                                ?>
                                <br/>

                                <?php

                                    include "../includes/connect.php"; // Database connection using PDO
                                    //$sql="SELECT name,id FROM student"; 
                                    $sql="SELECT * FROM tbl_sem"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Semester</label>";
                                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                                    echo "<select name=sem value='' class='form-control'>Semester</option>"; // list box select command
                                    foreach ($conn->query($sql) as $row){//Array or records stored in $row
                                    echo "<option value=$row[sem_id]>$row[sem_desc]</option>"; 
                                    /* Option values are added by looping through the array */ 
                                    }
                                    echo "</select>";// Closing of list box

                                ?>
                                <br/>

                                <?php

                                    include "../includes/connect.php"; // Database connection using PDO
                                    //$sql="SELECT name,id FROM student"; 
                                    $sql="SELECT * FROM tbl_subject"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Subject</label>";
                                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                                    echo "<select name=subject value='' class='form-control'>Subject</option>"; // list box select command
                                    foreach ($conn->query($sql) as $row){//Array or records stored in $row
                                    echo "<option value=$row[sbj_id]>$row[sbj_desc]</option>"; 
                                    /* Option values are added by looping through the array */ 
                                    }
                                    echo "</select>";// Closing of list box

                                ?>
                                <br/>

                                <?php

                                    include "../includes/connect.php"; // Database connection using PDO
                                    //$sql="SELECT name,id FROM student"; 
                                    $sql="SELECT * FROM tbl_yr"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Year Level</label>";
                                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                                    echo "<select name=year value='' class='form-control'>Year Level</option>"; // list box select command
                                    foreach ($conn->query($sql) as $row){//Array or records stored in $row
                                    echo "<option value=$row[yr_id]>$row[yr_desc]</option>"; 
                                    /* Option values are added by looping through the array */ 
                                    }
                                    echo "</select>";// Closing of list box

                                ?>
                                <br/>

                                <?php

                                    include "../includes/connect.php"; // Database connection using PDO
                                    //$sql="SELECT name,id FROM student"; 
                                    $sql="SELECT * FROM tbl_section"; 
                                    echo "<label for='exampleFormControlInput1' class='form-label'>Section</label>";
                                    /* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */
                                    echo "<select name=sec value='' class='form-control'>Section</option>"; // list box select command
                                    foreach ($conn->query($sql) as $row){//Array or records stored in $row
                                    echo "<option value=$row[sec_id]>$row[sec_desc]</option>"; 
                                    /* Option values are added by looping through the array */ 
                                    }
                                    echo "</select>";// Closing of list box

                                ?>
                                <br/>




                        
                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" class="form-control"  name ="name" >
                                </div>

                                <div class="mb-3">
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
                            <a href="../admin/grade-table.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary" name ="submit">Import </button>
                            </div>
                        </form>
                </div>
            </div>

    </div>
    <!-- /.container-fluid -->

<?php
include_once '../templates/footer.php';
?>