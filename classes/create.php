<?php
include('../config/db.php');
$query = "SELECT teacher_id,teacher_name from teachers_table";
$result = mysqli_query($conn, $query);
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
        <font size="5"><a href="index.php">List Of Classes</a></font>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <label for="">
                <font size="4">Class name</font>
            </label>
            &nbsp;
            <font size="4">
                <select name="class_name" id="" required>
                    <option value="">Select Class</option>
                    <option value="year_one">Year One</option>
                    <option value="year_two">Year Two</option>
                    <option value="year_three">Year three</option>
                    <option value="year_four">Year Four</option>
                    <option value="year_five">Year Five</option>
                    <option value="year_six">Year Six</option>
                </select>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Class Capacity</font>
            </label>
            <font size="4">
                <input type="number" name="class_capacity" placeholder="class capacity" required>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher</font>
            </label>

            <font size="4">
                <select name="teacher_id" id="" required>
                    <option value="">Select Teacher</option>
                    <?php while ($row= mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['teacher_name']; ?></option>
                    <?php
                    } ?>
                </select>

            </font>

            <br>
            <br>
            <input type="submit" name="submit">
        </form>
    </center>
    <br>
    <br>
    <center>
        <font size="5"><a href="../index.php">Back To Main Menu</a></font>
    </center>
</body>

</html>


<?php

if (isset($_POST['submit'])) {
    // print_r($_POST);
    // die;
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $class_capacity = mysqli_real_escape_string($conn, $_POST['class_capacity']);
    $class_teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);

    $query = "INSERT into classes_table(class_name,class_capacity,class_teacher_id)
    VALUES('$class_name','$class_capacity','$class_teacher_id')
    ";
    try{
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<center><p color:'green'>Class added successfully</p></center>";
        } else {
            echo "<center><p color:'red'>Error....</p></center>";
        }
    }
    catch(Exception $e){
        echo "<center><p color:'green'>".$e->getMessage()."</p></center>";
    }
}



?>