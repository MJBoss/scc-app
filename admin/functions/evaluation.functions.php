<?php
include_once("../../includes/connect.php");
$connect = mysqli_connect("localhost", "root", "", "mike");

    
   if (isset($_POST["Import"])){

    if ($_FILES['file']['name'] == "")
    {
    header('location:../../upload/upload.evaluation.php?error=Nofile');
    exit();
    }else{

      $syid = $_POST["sy"];
      $semid = $_POST["sem"];
      // $sbjid = $_POST["subject"];
      //$semid = $_POST["sem"];
      // $sbjid = $_POST["subject"];



        if($_FILES['file']['name'])
{
$filename = explode(".", $_FILES['file']['name']);
if($filename[1] == 'csv'){

    $handle = fopen($_FILES['file']['tmp_name'], "r");

    while($data = fgetcsv($handle))//handling csv file 
    
    {
      
      $syids = mysqli_real_escape_string($connect, utf8_encode($syid));
      $semids = mysqli_real_escape_string($connect, utf8_encode($semid));
      $time = mysqli_real_escape_string($connect, utf8_encode($data[0]));
      $email = mysqli_real_escape_string($connect, utf8_encode($data[1]));
      $instructor = mysqli_real_escape_string($connect, utf8_encode($data[2]));

        $statement=$conn->prepare("SELECT * FROM tbl_instructor WHERE ins_name = '$instructor'");
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          $ins_id = $result["ins_id"];

        }else{

            $ins_id = "";
        }

        
        

      $q1 = mysqli_real_escape_string($connect, utf8_encode($data[3]));
      $q2 = mysqli_real_escape_string($connect, utf8_encode($data[4]));
      $q3 = mysqli_real_escape_string($connect, utf8_encode($data[5]));
      $q4 = mysqli_real_escape_string($connect, utf8_encode($data[6]));
      $q5 = mysqli_real_escape_string($connect, utf8_encode($data[7]));
      $q6 = mysqli_real_escape_string($connect, utf8_encode($data[8]));
      $q7 = mysqli_real_escape_string($connect, utf8_encode($data[9]));
      $q8 = mysqli_real_escape_string($connect, utf8_encode($data[10]));
      $q9 = mysqli_real_escape_string($connect, utf8_encode($data[11]));
      $q10 = mysqli_real_escape_string($connect, utf8_encode($data[12]));
      $q11 = mysqli_real_escape_string($connect, utf8_encode($data[13]));
      $q12 = mysqli_real_escape_string($connect, utf8_encode($data[14]));
      $q13 = mysqli_real_escape_string($connect, utf8_encode($data[15]));
      $q14 = mysqli_real_escape_string($connect, utf8_encode($data[16]));
      $q15 = mysqli_real_escape_string($connect, utf8_encode($data[17]));
      $q16 = mysqli_real_escape_string($connect, utf8_encode($data[18]));
      $q17 = mysqli_real_escape_string($connect, utf8_encode($data[19]));
      $q18 = mysqli_real_escape_string($connect, utf8_encode($data[20]));
      $q19 = mysqli_real_escape_string($connect, utf8_encode($data[21]));
      $q20 = mysqli_real_escape_string($connect, utf8_encode($data[22]));
      $q21 = mysqli_real_escape_string($connect, utf8_encode($data[23]));
      $q22 = mysqli_real_escape_string($connect, utf8_encode($data[24]));
      $q23 = mysqli_real_escape_string($connect, utf8_encode($data[25]));
      $q24 = mysqli_real_escape_string($connect, utf8_encode($data[26]));
      $q25 = mysqli_real_escape_string($connect, utf8_encode($data[27]));
      $q26 = mysqli_real_escape_string($connect, utf8_encode($data[28]));
      $q27 = mysqli_real_escape_string($connect, utf8_encode($data[29]));
      $q28 = mysqli_real_escape_string($connect, utf8_encode($data[30]));
      $q29 = mysqli_real_escape_string($connect, utf8_encode($data[31]));
      $q30 = mysqli_real_escape_string($connect, utf8_encode($data[32]));
      $q30 = mysqli_real_escape_string($connect, utf8_encode($data[32]));
      $comments = mysqli_real_escape_string($connect, utf8_encode($data[33]));
      $name = mysqli_real_escape_string($connect, utf8_encode($data[34]));
      $course = mysqli_real_escape_string($connect, utf8_encode($data[35]));

      // $item5 = password_hash(mysqli_real_escape_string($connect, utf8_encode($data[4])), PASSWORD_DEFAULT);



      // // $statement=$conn->prepare("SELECT * FROM tbl_students LEFT JOIN tbl_grades ON tbl_students.s_id=tbl_grades.s_id WHERE tbl_students.s_id = :stid");
      // $statement=$conn->prepare("SELECT s_id, sbj_id FROM tbl_grades WHERE s_id = '$item1' AND sbj_id = '$item2'");
      // // $statement->bindParam(':stid', $sid);
      // $statement->execute();
      // $result = $statement->fetch(PDO::FETCH_ASSOC);



    
        $query = "INSERT INTO tbl_evaluation (yr_id, sem_id, ins_id, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, b17, b18, b19, b20, b21, b22, b23, b24, b25, b26, b27, b28, b29, b30, eval_email, eval_comments, eval_name, eval_course, eval_date) 
        VALUES('$syids', '$semids', '$ins_id','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$q24','$q25','$q26','$q27','$q28','$q29','$q30', '$email', '$comments', '$name', '$course', '$time')";
        
  
      // if(!empty($result)){
      //   $query = "UPDATE tbl_grades SET prelim = '$item5', midterm = '$item6', prefinal = '$item7', final = '$item8' WHERE s_id = '$item1' AND sbj_id = '$item2'";
      // }else{
      //   $query = "INSERT into tbl_evaluation (yr_id, sem_id, ins_id, a1, a2, a3, a4, a5, a6, a7, a8, a9, a10, a11, a12, a13, a14, a15, a16, b17, b18, b19, b20, b21, b22, b23, b24, b25, b26, b27, b28, b29, b30, eval_email, eval_comments, eval_name, eval course, eval_date) 
      //   values('$syids', '$semids', '$ins_id','$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8','$q9','$q10','$q11','$q12','$q13','$q14','$q15','$q16','$q17','$q18','$q19','$q20','$q21','$q22','$q23','$q24','$q25','$q26','$q27','$q28','$q29','$q30', '$email', '$comments', '$name', '$course', '$time')";
        
      // }



      // $query = "INSERT into tbl_grades (s_id, sbj_id, sy_id, sem_id, prelim, midterm, prefinal,final) 
      // values('$item1', '$item2', '$item3','$item4','$item5','$item6','$item7','$item8')";

      mysqli_query($connect, $query);
}

}

fclose($handle);
header("location:../../upload/upload.evaluation.php?error=Uploaded");
     exit;

}


    // $filename=$_FILES["file"]["tmp_name"];    
    //  if($_FILES["file"]["size"] > 0)
    //  {
    //     $file = fopen($filename, "r");
    //       while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
    //        {
    //          $sql = "INSERT INTO tbl_user (user_id,firstName,lastName,email,password) 
    //                VALUES ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')
    //                ON DUPLICATE KEY UPDATE 
    //                    firstName='".$getData[1]."', lastName='".$getData[2]."', email='".$getData[3]."', password='".$getData[4]."'";
    //                $result = mysqli_query($connect, $sql);
    //     if(!isset($result))
    //     {
    //       echo "<script type=\"text/javascript\">
    //           alert(\"Invalid File:Please Upload CSV File.\");
    //           window.location = \"upload.php\"
    //           </script>";    
    //     }
    //     else {
    //         echo "<script type=\"text/javascript\">
    //         alert(\"CSV File has been successfully Imported.\");
    //         window.location = \"upload.php\"
    //       </script>";
    //     }
    //        }
      
    //        fclose($file);  
    //  }
    }
  } 


 ?>











