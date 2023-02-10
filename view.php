<?php 

include "connection.php";

$sql = "SELECT * FROM students";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>

    <title>View</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Students</h2>

<table class="table">
    <thead>
        <tr>
        <th>Student ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Course & Section</th>
    </tr>
    </thead>
    <tbody> 
        <?php
            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>

                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['course_sec']; ?></td>
                    <td><a class="btn btn-info" href="update.php?student_id=<?php echo $row['student_id']; ?>">Update</a>&nbsp;<a class="btn btn-danger" href="Delete.php?student_id=<?php echo $row['student_id']; ?>">Delete</a></td>
                    </tr>                       
        <?php       }
            }
        ?>                
    </tbody>
</table>
    </div> 
</body>
</html>