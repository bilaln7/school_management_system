<?php
include('../config/db.php');
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
        <font size="5"><a href="index.php">List Of Parents</a></font>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <label for="">
                <font size="4">Parent name</font>
            </label>
            &nbsp;
            <font size="4">
                <input type="text" name="parent_name" required placeholder="parent name">
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Parent Address</font>
            </label>
            <font size="4">
                <textarea name="parent_address" required id="">

                </textarea>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Parent Email</font>
            </label>

            <font size="4">
            <input type="email" name="parent_email" required placeholder="parent email">
            </font>


            <br>
            <br>
            <label for="">
                <font size="4">Parent Phone</font>
            </label>

            <font size="4">
                <input type="text" name="parent_phone" required placeholder="parent phone">

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
    $parent_name = mysqli_real_escape_string($conn, $_POST['parent_name']);
    $parent_address = mysqli_real_escape_string($conn, $_POST['parent_address']);
    $parent_email = mysqli_real_escape_string($conn, $_POST['parent_email']);
    $parent_phone = mysqli_real_escape_string($conn, $_POST['parent_phone']);

    $query = "INSERT into parents_table(parent_name,parent_address,parent_email,parent_phone)
    VALUES('$parent_name','$parent_address','$parent_email','$parent_phone')
    ";
    try{
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<center><p color:'green'>Parent added successfully</p></center>";
        } else {
            echo "<center><p color:'red'>Error....</p></center>";
        }
    }
    catch(Exception $e){
        echo "<center><p color:'green'>".$e->getMessage()."</p></center>";
    }
}



?>