<?php
include('../config/db.php');
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
        <font size="5"><a href="index.php">List Of Teachers</a></font>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <label for="">
                <font size="4">Teacher name</font>
            </label>
            &nbsp;
            <font size="4">
                <input type="text" name="teacher_name" placeholder="teacher name" required>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher Phone</font>
            </label>
            <font size="4">
                <input type="number" name="teacher_phone" placeholder="teacher phone" required>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher Salary</font>
            </label>
            
            <font size="4">
                <input type="number" name="teacher_salary" placeholder="teacher salary" required>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher Address</font>
            </label>
            <font size="4">
                <textarea name="teacher_address" id="" required>

                </textarea>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Teacher Background Check</font>
            </label>
            <font size="4">
                <input type="checkbox" value="1" name="teacher_background_check">
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
    $teacher_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
    $teacher_phone = mysqli_real_escape_string($conn, $_POST['teacher_phone']);
    $teacher_salary = mysqli_real_escape_string($conn, $_POST['teacher_salary']);
    $teacher_address = mysqli_real_escape_string($conn, $_POST['teacher_address']);
    $teacher_background_check = mysqli_real_escape_string($conn, ($_POST['teacher_background_check']?? 0));

    $query = "INSERT into teachers_table(teacher_name,teacher_phone,teacher_salary,teacher_address,teacher_background_check)
    VALUES('$teacher_name','$teacher_phone','$teacher_salary','$teacher_address','$teacher_background_check')
    ";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "<center><p color:'green'>Teacher added successfully</p></center>";
    }
    else{
        echo "<center><p color:'red'>Error....</p></center>";
    }




}



?>