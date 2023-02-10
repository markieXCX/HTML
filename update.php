<?php 

include "connection.php";

    if (isset($_POST['update'])) {

        
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $course_sec = $_POST['course_sec'];
        $student_id = $_POST['student_id'];

        $sql = "UPDATE `students` SET `firstname`= '$first_name' ,`lastname`= '$last_name', `course_sec` = '$course_sec'  WHERE `student_id`= '$student_id' "; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {
            echo "Record updated successfully.";
        }else{
            echo "Error:" . $sql . "<br>" . $conn->connect_error;
        }

    } 

if (isset($_GET['student_id'])) {

    $student_id = $_GET['student_id']; 

    $sql = "SELECT * FROM `students` WHERE `student_id`='$student_id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];
            $last_name = $row['lastname'];
            $course_sec  = $row['course_sec'];
            $student_id = $row['student_id'];
        } 

    ?>

        <h2>Student Update Form</h2>
        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>
            First name:<br>
            <input type="text" name="firstname" value="<?php echo $first_name; ?>">
            <input type="hidden" name="student_id" value="<?php echo $student_id; ?>">
            <br>
            Last name:<br>
            <input type="text" name="lastname" value="<?php echo $last_name; ?>">
            <br>
            Course & Section:<br>
            <input type="text" name="course_sec" value="<?php echo $course_sec; ?>">
            <br>
            <input type="submit" value="Update" name="update">
          </fieldset>

        </form> 
        </body>
        </html> 
    <?php

    } else{ 
        header('Location: view.php');
    } 
}
?> 