<?php
include('../config/db.php');
$pupil_id = $_GET['pupil_id'];
$parent_id = $_GET['parent_id'];

$pupil_parent_query = "SELECT * from pupils_parents_table WHERE pupil_id ='$pupil_id' and parent_id ='$parent_id'";
$pupil_parent_query_result = mysqli_query($conn,$pupil_parent_query);
$pupil_parent_query_result = $pupil_parent_query_result->fetch_assoc();

$pupil_query = "SELECT pupil_id,pupil_name from pupils_table";
$pupil_result = mysqli_query($conn,$pupil_query);


$parent_query = "SELECT parent_id,parent_name from parents_table";
$parent_result = mysqli_query($conn,$parent_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pupil - Parent</title>
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
        <font size="5"><a href="index.php">List Of Pupil Parent</a></font>
    </center>
    <br><br>
    <center>
        <form action="" method="POST">
            <label for="">
                <font size="4">Pupil name</font>
            </label>
            &nbsp;
            <font size="4">
                <select name="pupil_id" id="" required>
                    <option value="">Select Pupil</option>
                    <?php while($row = mysqli_fetch_assoc($pupil_result)){ ?>
                        <option value="<?php echo $row['pupil_id'] ?>" <?php  echo $row['pupil_id'] == $pupil_parent_query_result['pupil_id'] ? "selected": "" ?> ><?php echo $row['pupil_name'] ?></option>
                    <?php
                        }?>
                </select>
            </font>
            <br>
            <br>
            <label for="">
                <font size="4">Parent name</font>
            </label>
            <font size="4">
                <select name="parent_id" id="" required>
                    <option value="">Select Parent</option>
                    <?php while($row = mysqli_fetch_assoc($parent_result)){ ?>
                        <option value="<?php echo $row['parent_id'] ?>"   <?php  echo $row['parent_id'] == $pupil_parent_query_result['parent_id'] ? "selected": "" ?>><?php echo $row['parent_name'] ?></option>
                    <?php
                        }?>
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
    $pupil_id_get = mysqli_real_escape_string($conn, $_POST['pupil_id']);
    $parent_id_get = mysqli_real_escape_string($conn, $_POST['parent_id']);

    $query = "UPDATE  pupils_parents_table SET pupil_id = '$pupil_id_get' , parent_id = '$parent_id_get'
    WHERE pupil_id = '$pupil_id' and parent_id = '$parent_id'
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