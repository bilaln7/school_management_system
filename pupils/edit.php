<?php
include('../config/db.php');
$id = $_GET['id'];
$query = "SELECT * from pupils_table WHERE pupil_id = '$id'";
$result = mysqli_query($conn,$query);
$result = $result->fetch_assoc();


$class_query = "SELECT class_id,class_name from classes_table";
$class_result = mysqli_query($conn, $class_query);
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
        <font size="5"><a href="index.php">List Of Pupils</a></font>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <label for="">
                <font size="4">Pupil name</font>
            </label>
            &nbsp;
            <font size="4">
                <input type="text" name="pupil_name" required value="<?php echo $result['pupil_name']; ?>">
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Pupil Address</font>
            </label>
            <font size="4">
                <textarea name="pupil_address" required id="">
                    <?php echo $result['pupil_address']; ?>
                </textarea>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Pupil Medical Info</font>
            </label>
            <font size="4">
                <textarea name="pupil_medical_info" required id="">
                    <?php echo $result['pupil_medical_info']; ?>
                </textarea>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Pupil Class</font>
            </label>
            <font size="4">
                <select name="pupil_class_id" id="">
                    <option value="">Select Class</option>
                    <?php while($row = mysqli_fetch_assoc($class_result)){?>
                        <option value="<?php echo $row['class_id']; ?>" <?php echo $row['class_id'] == $result['pupil_class_id'] ? "selected" : "" ?> ><?php echo ucfirst(str_replace("_"," ",$row['class_name'])); ?></option>
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
    $pupil_name = mysqli_real_escape_string($conn, $_POST['pupil_name']);
    $pupil_address = mysqli_real_escape_string($conn, $_POST['pupil_address']);
    $pupil_medical_info = mysqli_real_escape_string($conn, $_POST['pupil_medical_info']);
    $pupil_class_id = mysqli_real_escape_string($conn, $_POST['pupil_class_id']);

    $query = "UPDATE pupils_table SET pupil_name = '$pupil_name' , pupil_address = '$pupil_address', pupil_medical_info = '$pupil_medical_info'
,  pupil_class_id='$pupil_class_id'   WHERE pupil_id = '$id'
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