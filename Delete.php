<?php 

include "connection.php"; 

if (isset($_GET['student_id'])) {

    $student_id = $_GET['student_id'];

    $sql = "DELETE FROM `students` WHERE `student_id`='$student_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->connect_error;

    }

} 

?>