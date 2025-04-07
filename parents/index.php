<?php
include('../config/db.php');
$query = "SELECT * from parents_table";
$result = mysqli_query($conn, $query);

// print_r($result->fetch_assoc());
// die;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents</title>
</head>

<body bgcolor="#eeccf8">
    <center>
        <font size="5">
            <h1>
                Parent Menu
            </h1>
        </font>
    </center>
    <center>
        <font size="5"><a href="create.php">Add Parent</a></font>
    </center>
    <br>

    <center>
        <table >
            <thead>
                <th>Sr.No</th>
                <th>Parent Name</th>
                <th>Parent Address</th>
                <th>Parent Email</th>
                <th>Parent Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php $count = 1;
                while ($record = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $record['parent_name']; ?></td>
                        <td><?php echo $record['parent_address']; ?></td>
                        <td><?php echo $record['parent_email']; ?></td>
                        <td><?php echo $record['parent_phone']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $record['parent_id']; ?>">Edit</a>
                            <a href="index.php?id=<?php echo $record['parent_id']; ?>">Delete</a>
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
    $query = "DELETE from parents_table WHERE parent_id = '$id' ";
    if(mysqli_query($conn,$query)){
        header('Location: index.php');
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }

}


?>