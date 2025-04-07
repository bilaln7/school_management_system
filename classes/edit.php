<?php
include('../config/db.php');
$id = $_GET['id'];
$query = "SELECT * from classes_table WHERE class_id = '$id'";
$result = mysqli_query($conn,$query);
$result = $result->fetch_assoc();


$teacher_query = "SELECT teacher_id,teacher_name from teachers_table";
$teacher_result = mysqli_query($conn, $teacher_query);
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
        <font size="5"><a href="index.php">List Of Teachers</a></font>
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
                    <option value="year_one"   <?php echo $result['class_name'] == "year_one" ? "selected" : "" ?> >Year One</option>
                    <option value="year_two"   <?php echo $result['class_name'] == "year_two" ? "selected" : "" ?>>Year Two</option>
                    <option value="year_three" <?php echo $result['class_name'] == "year_three" ? "selected" : "" ?>>Year three</option>
                    <option value="year_four"  <?php echo $result['class_name'] == "year_four" ? "selected" : "" ?>>Year Four</option>
                    <option value="year_five"  <?php echo $result['class_name'] == "year_five" ? "selected" : "" ?>>Year Five</option>
                    <option value="year_six"   <?php echo $result['class_name'] == "year_six" ? "selected" : "" ?>>Year Six</option>
                </select>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Class Capacity</font>
            </label>
            <font size="4">
                <input type="number" name="class_capacity" value="<?php echo $result['class_capacity']; ?>" placeholder="class capacity" required>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher</font>
            </label>
            <font size="4">
                <select name="teacher_id" id="" required>
                    <option value="">Select Teacher</option>
                    <?php while ($row= mysqli_fetch_assoc($teacher_result)) { ?>
                        <option value="<?php echo $row['teacher_id']; ?>"  <?php echo $row['teacher_id'] == $result['class_teacher_id'] ? "selected" : "" ?>  ><?php echo $row['teacher_name']; ?></option>
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

if(isset($_POST['submit'])){
    // print_r($_POST);
    // die;
    $class_name = mysqli_real_escape_string($conn, $_POST['class_name']);
    $class_capacity = mysqli_real_escape_string($conn, $_POST['class_capacity']);
    $class_teacher_id = mysqli_real_escape_string($conn, $_POST['teacher_id']);

    $query = "UPDATE classes_table SET class_name = '$class_name' , class_capacity = '$class_capacity', class_teacher_id = '$class_teacher_id'
     WHERE class_id = '$id'
    ";
    
    try{
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('Location: index.php');
        } else {
            echo "<center><p color:'red'>Error....</p></center>";
        }
    }
    catch(Exception $e){
        echo "<center><p color:'green'>".$e->getMessage()."</p></center>";
    }


}



?>