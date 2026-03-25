<?php
session_start();
$con = mysqli_connect("localhost","root","","phptutorials");

if(isset($_POST['insert_data']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $date = mysqli_real_escape_string($con, $_POST['birthdate']);
    $location = mysqli_real_escape_string($con, $_POST['locations']);
    $clothes= mysqli_real_escape_string($con, $_POST['clothes']);
    $marks = mysqli_real_escape_string($con, $_POST['marks']);
    $health = mysqli_real_escape_string($con, $_POST['health']);
    $reporter = mysqli_real_escape_string($con, $_POST['reporter']);
    $relation = mysqli_real_escape_string($con, $_POST['adrees']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $notes = mysqli_real_escape_string($con, $_POST['notes']);

    $query = "INSERT INTO near2 (name,birthdate,locations,clothes,marks,health,reporter, adrees,phone,notes) VALUES ('$name','$date','$location','$clothes','$marks','$health','$reporter','$relation','$phone','$notes') ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = " تم ارسال بيانات بنجاح عزيزي" ;
        header("Location: near2.php");
    }
    else
    {
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: near2.php");
    }
}

?>