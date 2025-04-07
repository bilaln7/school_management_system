<?php
include('../config/db.php');
$query = "SELECT * from pupils_table INNER JOIN classes_table on pupils_table.pupil_class_id = classes_table.class_id";
$result = mysqli_query($conn, $query);

// print_r($result->fetch_assoc());
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupils</title>
</head>

<body bgcolor="#eeccf8">
    <center>
        <font size="5">
            <h1>
                Pupil Menu
            </h1>
        </font>
    </center>
    <center>
        <font size="5"><a href="create.php">Add Pupil</a></font>
    </center>
    <br>

    <center>
        <table >
            <thead>
                <th>Sr.No</th>
                <th>Pupil Name</th>
                <th>Pupil Address</th>
                <th>Pupil Medical Info</th>
                <th>Pupil Class</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($record = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record['pupil_name']; ?></td>
                        <td><?php echo $record['pupil_address']; ?></td>
                        <td><?php echo $record['pupil_medical_info']; ?></td>
                        <td><?php echo ucfirst(str_replace("_"," ",$record['class_name'])); ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $record['pupil_id']; ?>">Edit</a>
                            <a href="index.php?id=<?php echo $record['pupil_id']; ?>">Delete</a>
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
    $query = "DELETE from pupils_table WHERE pupil_id = '$id' ";
    if(mysqli_query($conn,$query)){
        header('Location: index.php');
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }

}


?>