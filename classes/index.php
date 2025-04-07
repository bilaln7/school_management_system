<?php
include('../config/db.php');
$query = "SELECT * from classes_table INNER JOIN teachers_table on classes_table.class_teacher_id = teachers_table.teacher_id";
$result = mysqli_query($conn, $query);

// print_r($result->fetch);
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
</head>

<body bgcolor="#eeccf8">
    <center>
        <font size="5">
            <h1>
                Class Menu
            </h1>
        </font>
    </center>
    <center>
        <font size="5"><a href="create.php">Add Class</a></font>
    </center>
    <br>

    <center>
        <table >
            <thead>
                <th>Sr.No</th>
                <th>Class Name</th>
                <th>Class Capacity</th>
                <th>ClassTeacher</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($record = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo ucfirst(str_replace("_"," ",$record['class_name'])); ?></td>
                        <td><?php echo $record['class_capacity']; ?></td>
                        <td><?php echo $record['teacher_name']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $record['class_id']; ?>">Edit</a>
                            <a href="index.php?id=<?php echo $record['class_id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    $count++;
                }
                ?>
            </tbody>
        </table>
    </center>
    <br>
    <br>
    <center>
    <font size="5"><a href="../index.php">Back To Main Menu</a></font>
    </center>
</body>

</html>


<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE from classes_table WHERE class_id = '$id' ";
    if(mysqli_query($conn,$query)){
        header('Location: index.php');
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }

}


?>