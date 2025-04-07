<?php
include('../config/db.php');
$query = "SELECT * from pupils_parents_table INNER join pupils_table on pupils_parents_table.pupil_id = pupils_table.pupil_id
INNER JOIN parents_table on pupils_parents_table.parent_id = parents_table.parent_id
";
$result = mysqli_query($conn, $query);

// print_r($result->fetch_assoc());
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupil Parent</title>
</head>

<body bgcolor="#eeccf8">
    <center>
        <font size="5">
            <h1>
                Pupil Parent Menu
            </h1>
        </font>
    </center>
    <center>
        <font size="5"><a href="create.php">Link Pupil to Parent</a></font>
    </center>
    <br>

    <center>
        <table >
            <thead>
                <th>Sr.No</th>
                <th>Pupil Name</th>
                <th>Parent Name</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($record = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record['pupil_name']; ?></td>
                        <td><?php echo $record['parent_name']; ?></td>
                        <td>
                        <a href="edit.php?pupil_id=<?php echo $record['pupil_id']; ?>&parent_id=<?php echo $record['parent_id']; ?>">Edit</a>
                        <a href="index.php?pupil_id=<?php echo $record['pupil_id']; ?>&parent_id=<?php echo $record['parent_id']; ?>">Delete</a>
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
if(isset($_GET['pupil_id']) && isset($_GET['parent_id'])){
    $pupil_id = $_GET['pupil_id'];
    $parent_id = $_GET['parent_id'];
    $query = "DELETE from pupils_parents_table WHERE parent_id = '$parent_id' &&  pupil_id = '$pupil_id'";
    if(mysqli_query($conn,$query)){
        header('Location: index.php');
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }

}


?>