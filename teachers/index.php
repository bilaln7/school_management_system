<?php
include('../config/db.php');
$query = "SELECT * from teachers_table";
$result = mysqli_query($conn, $query);

// print_r($result);
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
</head>

<body bgcolor="#eeccf8">
    <center>
        <font size="5">
            <h1>
                Teachers Menu
            </h1>
        </font>
    </center>
    <center>
        <font size="5"><a href="create.php">Add Teacher</a></font>
    </center>
    <br>

    <center>
        <table >
            <thead>
                <th>Sr.No</th>
                <th>Teacher Name</th>
                <th>Teacher Phone</th>
                <th>Teacher Salary</th>
                <th>Teacher Address</th>
                <th>Teacher Background Check</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($record = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record['teacher_name']; ?></td>
                        <td><?php echo $record['teacher_phone']; ?></td>
                        <td><?php echo $record['teacher_salary']; ?></td>
                        <td><?php echo $record['teacher_address']; ?></td>
                        <td><center><?php echo $record['teacher_background_check'] == 1 ? "YES": "NO"; ?></center></td>
                        <td>
                            <a href="edit.php?id=<?php echo $record['teacher_id']; ?>">Edit</a>
                            <a href="index.php?id=<?php echo $record['teacher_id']; ?>">Delete</a>
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
    $query = "DELETE from teachers_table WHERE teacher_id = '$id' ";
    if(mysqli_query($conn,$query)){
        header('Location: index.php');
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }

}


?>